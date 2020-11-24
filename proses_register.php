<?php
session_start();

include "database.php" ;



$query = mysql_query("insert into tbl_customer (nama_lengkap,username,password,email,nama_organisasi,alamat_lengkap,tanggal_daftar) 
values('$_POST[nama_lengkap]','$_POST[username]',md5('$_POST[password]'),'$_POST[email]','$_POST[nama_organisasi]','$_POST[alamat_lengkap]',NOW())");

if($query){
echo "<script>alert('Register Sukses , Silahkan Login');javascript;</script>";
	echo "<meta http-equiv='refresh' content='0; url=login.php'>";

}else{
echo "<script>alert('Register Gagal , Email Sudah Digunakan !');javascript:history.go(-1);</script>";


}
?>
