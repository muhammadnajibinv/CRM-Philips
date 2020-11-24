<?php
include "../database.php" ;


$id_kategori = $_POST["id_kategori"]; 
$nama_mag = $_POST["nama_mag"];
$nama_kategori = $_POST["nama_kategori"];

$query=mysql_query("UPDATE tbl_kategori SET nama_kategori='$nama_kategori' , nama_mag='$nama_mag' WHERE id_kategori='$_POST[id_kategori]'")              
							or die (mysql_error());	

if($query){
			 header("location:kategori.php"); 
		}else{
			echo "<script>alert('Gagal Edit Data ! ');javascript:history.go(-1);</script>"; 
		}
		
?>

