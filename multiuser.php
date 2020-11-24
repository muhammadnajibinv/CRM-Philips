<?php

session_start();

if ($_SESSION['hak_akses'] == "user")
{
		header("Location:user/welcome.php");
}
else if ($_SESSION['hak_akses'] == "customer")
{
		header("Location:customer/welcome.php");
}

?>