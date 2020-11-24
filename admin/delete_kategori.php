<?php
include "../database.php";


if (isset($_GET[id_kategori])) {
	$id_kategori = $_GET[id_kategori];
} else {
	die ("Error. Id Kategori belum dipilih! ");	
}

if (!empty($id_kategori)) {
$SQL = "delete from tbl_kategori where id_kategori='$id_kategori'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:kategori.php");
}

 ?>