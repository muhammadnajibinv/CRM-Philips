<?php
include "../database.php" ;
$keterangan = $_POST['keterangan'];
$lokasi_file=$_FILES['fupload']['tmp_name'];
if(empty($lokasi_file))
{
$query=mysql_query("update tbl_product_view set nama_view='$_POST[nama_view]', keterangan='$keterangan' where id_view='".$_GET['id_view']."'") or die (mysql_error());
echo "<script>alert('Data View Product Berhasil Diubah!');javascript:history.go(-2);</script>";
}
else{
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];
move_uploaded_file($lokasi_file,"../images_product/$nama_file");
$query=mysql_query("update tbl_product_view set nama_view='$_POST[nama_view]', keterangan='$keterangan' , gambar='$nama_file' where id_view='".$_GET['id_view']."'") or die (mysql_error());
echo "<script>alert('Data View Product Berhasil Diubah!');javascript:history.go(-2);</script>";
}
?>
