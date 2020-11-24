<?php @session_start();
include "guard.php"?>

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
                    <li  class="active">
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="product.php">Product</a>
                    </li>
					<li>
                        <a href="list_pesan_product.php">List Product</a>
                    </li>
					<li>
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
                                <a href="logout.php">Logout</a>
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
                <h1 class="page-header" align="center">About</h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="../image/struktur-organisasi.jpg" alt="">
            </div>
            <div class="col-md-6" align="justify">
                <h2>PT. Sumber Terang Raya Padang</h2>
                <p>PT. Sumber Terang Raya Padang merupakan perusahaan yang bergerak dalam bidang distributor produk Philips beralamatkan di Jl. Damar No. 11 Padang. Perusahaan ini didirikan pada tanggal 21 juli 1994 dengan nama awal PT. Sumber Setamurni. Berbekal pengetahuan dan pengalaman dilingkup lokal perusahaan ini bergerak sebagai distributor spesialis perdagangan alat-alat listrik bermerk Philips. Pada tahun 2008 PT. Sumber Setamurni berganti nama dengan PT. Sumber Terang Raya Padang. Pencapaian target pertumbuhan yang maksimal bagi perusahaan ini mencerminkan dinamika bisnis perdagangan yang berpredikat sehat kepada konsumen. Hal ini semakin menantang optimisme PT. Sumber Terang Raya Padang untuk tetap eksis demi meraih peluang-peluang dalam hal perdagangan barang alat-alat listrik khusus bermerk Philips.</p>
				<p>Saat ini, PT. Sumber Terang Raya Padang merupakan perusahaan yang sangat kompetitif yang dijalankan oleh tim manajer yang efisien dan staff serta kru dengan tingkat keahlian yang tinggi. Dalam mengantisipasi pesatnya perdangangan umum, perusahaan ini akan terus memperbesar dan memperluas layanannya.</p>
            </div>
        </div>
		</div>
        <!-- /.row -->

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

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
