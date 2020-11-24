<?php
session_start();

include "../database.php" ;



$query = mysql_query("insert into tbl_komentar (id_customer,nama_lengkap,username,email,pesan,hak_akses,tanggal_komentar) 
values('$_POST[id_customer]','$_POST[nama_lengkap]','$_POST[username]','$_POST[email]','$_POST[pesan]','$_POST[hak_akses]',NOW())");

if($query){
echo "<script>alert('Pesan Sukses Dikirim, Jawaban Pesan Anda Akan Dikirimkan Ke Email Anda . Terima Kasih !');javascript;</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";

}else{
echo "<script>alert('Pesan Gagal Dikirim, Anda Tidak Boleh Mengirim Pesan Yang Sama Dengan Pesan Sebelumnya !');javascript:history.go(-1);</script>";


}
?>
