<?php
include "../database.php" ;

$id_product = $_POST["id_product"]; 
$nama_product = $_POST["nama_product"];
$barcode = $_POST["barcode"];
$harga = $_POST["harga"];
$stok = $_POST["stok"];

$query=mysql_query("UPDATE tbl_product_customer SET nama_product='$nama_product' , barcode='$barcode' , harga='$harga' , stok='$stok' WHERE id_product='$_POST[id_product]'")              
							or die (mysql_error());	

if($query){
			 header("location:list_product.php"); 
}?>
<?
$query2=mysql_query("SELECT * FROM tbl_kategori WHERE id_kategori='".$_POST['id_kategori']."'");
while($hasil2=mysql_fetch_array($query2))
{
$nama_kategori=$hasil2['nama_kategori']; 
$nama_mag=$hasil2['nama_mag']; 

$query3=mysql_query("UPDATE tbl_product_customer SET nama_mag='$nama_mag' , nama_kategori='$nama_kategori' , nama_product='$nama_product' , barcode='$barcode' , harga='$harga' , stok='$stok' WHERE id_product='$_POST[id_product]'")              
							or die (mysql_error());	
if($query3){
			 header("location:list_product.php"); 
}
}
		
?>

