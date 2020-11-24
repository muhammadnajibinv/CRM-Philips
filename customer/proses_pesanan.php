<?
session_start();
include "../database.php";
?>
<html>


	<link rel="shortcut icon" href="../image/favicon.png">
   <title>PT. SUMBER TERANG RAYA PADANG (PHILIPS)</title>
</html>
<?php

				


function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}

// fungsi untuk mendapatkan isi keranjang belanja
function isi_keranjang(){
	$isikeranjang = array();
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM tbl_orders_temp WHERE id_session='$sid'");
	
	while ($r=mysql_fetch_array($sql)) {
		$isikeranjang[] = $r;
	}
	return $isikeranjang;
}

$tgl_skrg = date("Ymd");
$jam_skrg = date("H:i:s");

// simpan data pemesanan 
if(empty($_POST[telpon]) || empty($_POST[keterangan]))
{
echo "<script>alert('Anda Belum Lengkap Mengisikan Data Pemesanan, Isikan Terlebih Dahulu!');javascript:history.go(-1);</script>";
}else{
mysql_query("INSERT INTO tbl_orders(id_customer, nama_pemesan, nama_organisasi, alamat_lengkap, telpon, email, tgl_order, jam_order, keterangan) 
             VALUES('$_POST[id_customer]','$_POST[nama_pemesan]','$_POST[nama_organisasi]','$_POST[alamat_lengkap]','$_POST[telpon]','$_POST[email]','$tgl_skrg', '$jam_skrg', '$_POST[keterangan]')");
  
// mendapatkan nomor orders (id_orders dari tabel orders)
$id_orders=mysql_insert_id();

// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
$isikeranjang = isi_keranjang();
$jml          = count($isikeranjang);

// simpan data detail pemesanan  
for ($i = 0; $i < $jml; $i++){
  mysql_query("INSERT INTO tbl_orders_detail (id_orders, id_product, jumlah) 
               VALUES('$id_orders',{$isikeranjang[$i]['id_product']}, {$isikeranjang[$i]['jumlah']})");
}

// update/kurangi stok produk
for ($i = 0; $i < $jml; $i++) {
	mysql_query("UPDATE tbl_product_customer SET stok = stok - {$isikeranjang[$i]['jumlah']}
						    WHERE id_product = {$isikeranjang[$i]['id_product']}");
}

// update/tambahkan produk yang dibeli (best seller)
for ($i = 0; $i < $jml; $i++) {
	mysql_query("UPDATE tbl_product_customer SET dipesan = dipesan + {$isikeranjang[$i]['jumlah']}
						    WHERE id_product = {$isikeranjang[$i]['id_product']}");
}

// setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara
for ($i = 0; $i < $jml; $i++) {
  mysql_query("DELETE FROM tbl_orders_temp
	  	         WHERE id_orders_temp = {$isikeranjang[$i]['id_orders_temp']}");
}

// tampilkan data kustomer beserta ordernya di browser


$daftarproduk=mysql_query("SELECT * FROM tbl_orders_detail,tbl_product_customer 
                          WHERE tbl_orders_detail.id_product=tbl_product_customer.id_product 
                          AND id_orders='$id_orders'");

while ($d=mysql_fetch_array($daftarproduk)){

   $subtotal    = $d[harga] * $d[jumlah];
   $total       = $total + $subtotal;
   $subtotal_rp = format_rupiah($subtotal);    
   $total_rp    = format_rupiah($total);    
   $harga       = format_rupiah($d[harga]);

  
}
 echo "<script>alert('Terima Kasih Sudah Memesan Di Website Kami Mr./Mrs. $_POST[nama_pemesan] . Pemesanan Sukses, Harap Menunggu Konfirmasi Dari Admin . Nomor Pemesanan Anda : $id_orders , Total Pemesanan Anda Rp.$total_rp ');javascript;</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";




}
?>