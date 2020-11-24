<?php
session_start();

include "../database.php";


if (isset($_GET[id_orders])) {
	$id_orders = $_GET[id_orders];
} else {
	die ("Error. Id Order belum dipilih! ");	
}

if (!empty($id_orders)) {
$SQL = "delete from tbl_orders where id_orders='$id_orders'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:list_pemesanan_product_baru.php");
}

 ?>
