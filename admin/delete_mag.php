<?php
include "../database.php";


if (isset($_GET[id_mag])) {
	$id_mag = $_GET[id_mag];
} else {
	die ("Error. Id Mag belum dipilih! ");	
}

if (!empty($id_mag)) {
$SQL = "delete from tbl_mag where id_mag='$id_mag'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:mag.php");
}

 ?>