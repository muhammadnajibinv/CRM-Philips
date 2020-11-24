<?php
session_start();

include "../database.php" ;



$query = mysql_query("insert into tbl_mag (nama_mag) 
values('$_POST[nama_mag]')");

if($query){
header("location:mag.php");
}else{
echo "<script>alert('Data Mag Gagal Disimpan!');javascript:history.go(-1);</script>";


}
?>
