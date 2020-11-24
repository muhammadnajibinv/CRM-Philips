<?php @session_start();
include "guard.php";?>
<?include "fungsi_rupiah.php"?>
<?include "../database.php"?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="../image/favicon.png">

    <title>PT. Sumber Terang Raya Padang</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script language="javascript">
    function hanyaAngka(e, decimal) {
    var key;
    var keychar;
     if (window.event) {
         key = window.event.keyCode;
     } else
     if (e) {
         key = e.which;
     } else return true;
   
    keychar = String.fromCharCode(key);
    if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
        return true;
    } else
    if ((("0123456789").indexOf(keychar) > -1)) {
        return true;
    } else
    if (decimal && (keychar == ".")) {
        return true;
    } else return false;
    }
	</script>
	
</head>

<body>

       <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">PHILIPS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="product.php">Product</a>
                    </li>
					<li>
                        <a href="list_pesan_product.php">List Product</a>
                    </li>
					<li class="active">
                        <a href="cart.php">Cart</a>
                    </li>
					<li>
                        <a href="contact.php">Contact</a>
                    </li>
					<li>
                        <a href="message.php">Message</a>
                    </li>
					<li class="dropdown">
					<?php
					include "../database.php";
					$sql = "select * from tbl_customer where username='".$_SESSION['username']."'";
					$result=mysql_query($sql)or die('Error');
					while($data=mysql_fetch_array($result))
					{
					$username = $data['username'];
					}
					?>                 
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Hello, <?php echo"$username";?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="logout.php"><i class="icon-off"></i>Logout</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
			
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

 	
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" align="center">Data Pemesanan</h1>
            </div>
		</div>
        <!-- /.row -->	
<?php

  $sql = "select * from tbl_customer where username='".$_SESSION['username']."'";
  $result=mysql_query($sql)or die('Error');
  while($data=mysql_fetch_array($result))
  {
		$username = $data['username'];
		$id_customer = $data['id_customer'];
		$nama_lengkap = $data['nama_lengkap'];
		$email = $data['email'];
		$nama_organisasi = $data['nama_organisasi'];
		$alamat_lengkap = $data['alamat_lengkap'];
		}
?>
<?php
echo "<form method=POST action=proses_pesanan.php>
 <div class='row'>
                    <div class='col-md-12'>
						<input type='hidden' class='form-control' id='id_customer' name='id_customer' value='$id_customer' required readonly>
                  		<div class='form-group'>
						<label>Nama</label>
                            <input type='text' class='form-control' id='nama_pemesan' name='nama_pemesan' value='$nama_lengkap' required readonly>
                  		</div>
						<div class='form-group'>
						<label>Email</label>
                            <input type='text' class='form-control' id='email' name='email' value='$email' required readonly>
                  		</div>
						<div class='form-group'>
						<label>Nama Organisasi</label>
                            <input type='text' class='form-control' id='nama_organisasi' name='nama_organisasi' value='$nama_organisasi' required readonly>
                  		</div>
						<div class='form-group'>
						<label>Alamat Lengkap</label>
                            <input type='text' class='form-control' id='alamat_lengkap' name='alamat_lengkap' value='$alamat_lengkap' required readonly>
                  		</div>
						<div class='form-group'>
						<label>Telp.</label>
                            <input type='text' class='form-control' id='telpon' name='telpon' placeholder='Masukan Nomor Telp. Yang Dapat Dihubungi Disini' onkeypress='return hanyaAngka(event, false)'onkeypress='return hanyaAngka(event, false)' maxlength='12' required autofocus>
                  		</div>
				  		<div class='form-group'>
						<label>Pesan</label>
                            <textarea class='form-control textarea' rows='4' id='keterangan' name='keterangan' placeholder='Masukan Keterangan Pemesanan Anda Disini' maxlength='200' required></textarea>
                  		</div>
																	
					</div>
                    <div class='form-group'>
                        <div class='col-sm-12 text-right'>
                            <button type='submit' class='btn btn-primary btn-xs'>
                                <span class='glyphicon glyphicon-send'></span> Pesan
                            </button>
                        </div>
					</div>
           </div>
		</form>";
?>
</div>
</div>
    <!-- Page Content -->
    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; PT. Sumber Terang Raya Padang 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
	<script src="../js/table.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>


</body>

</html>