<?php
include "../database.php" ;


$id_mag = $_POST["id_mag"]; 
$nama_mag = $_POST["nama_mag"];

$query=mysql_query("UPDATE tbl_mag SET nama_mag='$nama_mag' WHERE id_mag='$_POST[id_mag]'")              
							or die (mysql_error());	

if($query){
			 header("location:mag.php"); 
		}else{
			echo "<script>alert('Gagal Edit Data ! ');javascript:history.go(-1);</script>"; 
		}
		
?>

