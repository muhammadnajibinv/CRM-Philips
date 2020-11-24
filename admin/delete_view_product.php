<?php
include "../database.php";


if (isset($_GET[id_view])) {
	$id_view = $_GET[id_view];
} else {
	die ("Error. Id View belum dipilih! ");	
}

if (!empty($id_view)) {

$a=mysql_query("select * from tbl_product_view where id_view='$id_view' ");
 
$cek=mysql_fetch_array($a);
 
$folder="../images_product/$cek[gambar]";

unlink($folder);
 
$SQL = "delete from tbl_product_view where id_view='$id_view'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:view_product.php");

}

 ?>

 