<?php
session_start();

include "../database.php" ;
?>
<?
$query2=mysql_query("SELECT * FROM tbl_kategori WHERE id_kategori='".$_POST['id_kategori']."'");
while($hasil2=mysql_fetch_array($query2))
{
$nama_kategori=$hasil2['nama_kategori']; 
$nama_mag=$hasil2['nama_mag']; 
?>
<?

$query = mysql_query("insert into tbl_product_customer (nama_kategori,nama_mag,barcode,nama_product,harga,stok,tanggal_masuk) 
values('$nama_kategori','$nama_mag','$_POST[barcode]','$_POST[nama_product]','$_POST[harga]','$_POST[stok]',NOW())");

if($query){
echo "<script>alert('Data Product Berhasil Disimpan!');javascript;</script>";
echo "<meta http-equiv='refresh' content='0; url=input_product.php'>";
}else{
echo "<script>alert('Data Product Gagal Disimpan!');javascript:history.go(-1);</script>";


}
?>
<?}?>