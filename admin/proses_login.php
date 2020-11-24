<?php
include "../database.php";
$name=$_POST[name];
$password=md5($_POST[password]);
$login=sprintf("SELECT * FROM tbl_admin WHERE name='$name' AND password='$password'", mysql_real_escape_string($name), mysql_real_escape_string($password));
$cek_lagi=mysql_query($login);
$ketemu=mysql_num_rows($cek_lagi);
$r=mysql_fetch_array($cek_lagi);
// Apabila name dan password ditemukan
if ($ketemu > 0){
  session_start();
  session_register("name");

  $_SESSION[name] = $r[name];

	echo "<meta http-equiv='refresh' content='0; url=home_admin.php'>";
}
else{
?>
	<script type="text/javascript">
		alert("Username / Password Anda Salah ! Mohon Periksa Kembali!");
	</script>
<?php
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
?>