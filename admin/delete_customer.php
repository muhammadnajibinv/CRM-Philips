<?php
include "../database.php";


if (isset($_GET[id_customer])) {
	$id_customer = $_GET[id_customer];
} else {
	die ("Error. Id Customer belum dipilih! ");	
}

if (!empty($id_customer)) {
$SQL = "delete from tbl_customer where id_customer='$id_customer'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:list_customer.php");
}

 ?>
 <?
 if (isset($_GET[id_customer])) {
	$id_customer = $_GET[id_customer];
} else {
	die ("Error. Id Customer belum dipilih! ");	
}

if (!empty($id_customer)) {
$SQL = "delete from tbl_komentar where id_customer='$id_customer'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:list_customer.php");
}

 ?>