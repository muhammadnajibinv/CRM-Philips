<?php
session_start();

include "../database.php" ;



$query = mysql_query("insert into tbl_kategori (nama_mag,nama_kategori) 
values('$_POST[nama_mag]','$_POST[nama_kategori]')");

if($query){
header("location:kategori.php");
}else{
echo "<script>alert('Data Kategori Gagal Disimpan!');javascript:history.go(-1);</script>";


}
?>
