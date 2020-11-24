<?php @session_start();

if (ISSET($_SESSION['name']))
{
}
else
{
unset($_SESSION['name']);
header("Location:index.php");
}
?>