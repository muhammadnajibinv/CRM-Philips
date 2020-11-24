<?php
include "../database.php";


if (isset($_GET[id_komentar])) {
	$id_komentar = $_GET[id_komentar];
} else {
	die ("Error. Id Komentar belum dipilih! ");	
}

if (!empty($id_komentar)) {
$SQL = "delete from tbl_komentar where id_komentar='$id_komentar'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:list_message_unread.php");
}

 ?>