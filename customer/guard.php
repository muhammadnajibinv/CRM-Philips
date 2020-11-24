<?php @session_start();

if (ISSET($_SESSION['username']) && ($_SESSION['hak_akses'] == "customer"))
{
}
else
{
unset($_SESSION['username']);
header("Location:../login.php");
}
?>