<?php
include "../database.php";

$hak_akses = $_POST['ganti_akses'];

if (isset($_GET[id_customer])) {
	$id_customer = $_GET[id_customer];
} else {
	die ("Error. Id Customer belum dipilih! ");	
}

if (!empty($id_customer)) {
$SQL = "update tbl_customer set hak_akses='$hak_akses' where id_customer='$id_customer'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terganti!<br>\n"; 
   } 
    echo "<script>window.history.back()</script>";
}

 ?>