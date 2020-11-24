<?php
include "../database.php";


if (isset($_GET[id_product])) {
	$id_product = $_GET[id_product];
} else {
	die ("Error. Id Product belum dipilih! ");	
}

if (!empty($id_product)) {
$SQL = "delete from tbl_product_customer where id_product='$id_product'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:list_product.php");
}

 ?>