<?php
session_start();
error_reporting(0);
include "../database.php";
include "../library.php";


$module=$_GET[module];
$act=$_GET[act];

if ($module=='cart' AND $act=='tambah'){

	$sid = session_id();

	$sql2 = mysql_query("SELECT stok FROM tbl_product_customer WHERE id_product='$_GET[id]'");
	$r=mysql_fetch_array($sql2);
	$stok=$r[stok];
  
  if ($stok == 0){
        echo "<script>window.alert('Stok Barang Ini Habis , Harap Konfirmasi Untuk Pemesanan Dengan Cara Mengirimkan Pesan Di Menu Message');
        window.history.back()</script>";
  }
  else{
	// check if the product is already
	// in cart table for this session
	$sql = mysql_query("SELECT id_product FROM tbl_orders_temp
			WHERE id_product='$_GET[id]' AND id_session='$sid'");
	$ketemu=mysql_num_rows($sql);
	if ($ketemu==0){
		// put the product in cart table
		mysql_query("INSERT INTO tbl_orders_temp (id_product, jumlah, id_session, tgl_order_temp, jam_order_temp,stok_temp)
				VALUES ('$_GET[id]', 1, '$sid', '$tgl_sekarang', '$jam_sekarang','$stok')");
	} else {
		// update product quantity in cart table
		mysql_query("UPDATE tbl_orders_temp 
		        SET jumlah = jumlah + 1
				WHERE id_session ='$sid' AND id_product='$_GET[id]'");		
	}	
	deleteAbandonedCart();
	header('Location:cart.php');
  }				
}

elseif ($module=='cart' AND $act=='hapus'){
	mysql_query("DELETE FROM tbl_orders_temp WHERE id_orders_temp='$_GET[id]'");
	header('Location:cart.php');				
}

elseif ($module=='cart' AND $act=='update'){
  $id       = $_POST[id];
  $jml_data = count($id);
  $jumlah   = $_POST[jml]; // quantity
  for ($i=1; $i <= $jml_data; $i++){
    $sql2 = mysql_query("SELECT stok_temp FROM tbl_orders_temp	WHERE id_orders_temp='".$id[$i]."'");
	while($r=mysql_fetch_array($sql2)){
    if ($jumlah[$i] > $r[stok_temp]){
        echo "<script>window.alert('Jumlah Yang Dipesan Melebihi Stok Yang Ada');
        window.location=('cart.php')</script>";
    }
    else{
    mysql_query("UPDATE tbl_orders_temp SET jumlah = '".$jumlah[$i]."'
                                      WHERE id_orders_temp = '".$id[$i]."'");
	header('Location:cart.php');				
}
}
  }
  
}
/*
	Delete all cart entries older than one day
*/
function deleteAbandonedCart(){
	$kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
	mysql_query("DELETE FROM tbl_orders_temp 
	        WHERE tgl_order_temp < '$kemarin'");
}
?>