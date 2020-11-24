<?php
include "database.php";
$username=$_POST[username];
$password=md5($_POST[password]);
$login=sprintf("SELECT * FROM tbl_customer WHERE username='$username' AND password='$password'", mysql_real_escape_string($username), mysql_real_escape_string($password));
$cek_lagi=mysql_query($login);
$ketemu=mysql_num_rows($cek_lagi);
$r=mysql_fetch_array($cek_lagi);
$blokir=$r['blokir'];
// Apabila username dan password ditemukan
if ($ketemu > 0 && $blokir == "n"){
  session_start();
  session_register("username");

  $_SESSION[username] = $r[username];
   $_SESSION[hak_akses] = $r[hak_akses];

		header("Location:multiuser.php");
	
}
else if ($ketemu > 0 && $blokir == "y"){
	?>
	<script type="text/javascript">
		alert("Username Anda Telah Di BLokir Oleh Admin! Anda Telah Melanggar Peraturan Pada PT. Sumber Terang Raya Padang!");
	</script>
<?php
	echo "<meta http-equiv='refresh' content='0; url=login.php'>";
}
else{
?>
	<script type="text/javascript">
		alert("Username / Password Anda Salah ! Mohon Periksa Kembali!");
	</script>
<?php
	echo "<meta http-equiv='refresh' content='0; url=login.php'>";
}
?>
