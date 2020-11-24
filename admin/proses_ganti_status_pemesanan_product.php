<?php
session_start();

include "../database.php" ;
?>
<?
if(isset($_POST['ganti'])){
$status_order=$_POST['status_order'];
$a="Update tbl_orders set status_order='$status_order' where id_orders='$_GET[id_orders]'";
$b=mysql_query($a);

$id_orders=$_GET['id_orders']; 
$sql="select * from tbl_orders where id_orders='$id_orders'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);

if($b){
echo "<script>alert('Status Berhasil Diubah!');javascript;</script>";
echo "<meta http-equiv='refresh' content='0; url=list_pemesanan_product.php'>";

}else{
echo "<script type='text/javascript'>
	onload =function(){
	alert('Status Pesanan Gagal Diubah!');
	}
	</script>";
	}
	}

?>