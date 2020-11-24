<?php
session_start();
include "../database.php" ;

	$nama_file   = $_FILES['fupload']['name'];
	$lokasi_file = $_FILES['fupload']['tmp_name'];
	
	if(!empty($lokasi_file)){
		move_uploaded_file($lokasi_file, "../images_product/$nama_file");				

$keterangan = nl2br($_POST['keterangan']);
		
$query = mysql_query("insert into tbl_product_view (nama_view,keterangan,gambar) 
values('$_POST[nama_mag]','$keterangan','$nama_file')");

if($query){
echo "<script>alert('Data View Product Berhasil Disimpan!');javascript;</script>";
echo "<meta http-equiv='refresh' content='0; url=input_view_product.php'>";
}else{
echo "<script>alert('Data View Product Gagal Disimpan, Data View Sudah Ada!');javascript:history.go(-1);</script>";
}
}
?>

