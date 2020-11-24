<?php
include "../database.php";

$blokir = $_POST['blokir'];

if (isset($_GET[id_customer])) {
	$id_customer = $_GET[id_customer];
} else {
	die ("Error. Id Customer belum dipilih! ");	
}

if (!empty($id_customer)) {
$SQL = "update tbl_customer set blokir='$blokir' where id_customer='$id_customer'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terblokir!<br>\n"; 
   } 
    header("location:list_customer.php");
}

 ?>