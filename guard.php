<?php
session_start();
if(!empty($_SESSION[username]) && ($_SESSION['hak_akses'] == "user")){
  header("Location:user/index.php");
}?>
<?php
session_start();
if(!empty($_SESSION[username]) && ($_SESSION['hak_akses'] == "customer")){
  header("Location:customer/index.php");
}?>
<?php
session_start();
if(!empty($_SESSION[name])){
  header("Location:admin/index.php");
}?>