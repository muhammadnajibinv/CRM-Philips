<?php @session_start();
include "guard.php"?>
<?include "../database.php"?>
<?php

if (isset($_GET[id_komentar])) {
	$id_komentar = $_GET[id_komentar];
} else {
	die ("Error. Id Komentar belum dipilih! ");	
}

if (!empty($id_komentar)) {
$SQL = "update tbl_komentar set status='Read' where id_komentar='$id_komentar'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terbaca!<br>\n"; 
   } 
}

 ?>
 
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
                    <li>
                        <a href="list_customer.php">Customer</a>
                    </li>
                   <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Product<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="mag.php">Mag</a>
                            </li>
							<li>
                                <a href="kategori.php">Kategori</a>
                            </li>
                            <li>
                                <a href="input_product.php">Input Product</a>
                            </li>
							
                            <li>
                                <a href="list_product.php">List Product</a>
                            </li>
							<li>
                                <a href="input_view_product.php">Input View Product</a>
                            </li>
							<li>
                                <a href="view_product.php">View Product</a>
                            </li>
                        </ul>
                    </li>
					<li class="active">
                        <a href="list_message.php">Message</a>
                    </li>
					<li>
                        <a href="list_pemesanan_product.php">Pemesanan</a>
                    </li>
					<li class="dropdown">
					<?php
					include "../database.php";
					$sql = "select * from tbl_admin where name='".$_SESSION['name']."'";
					$result=mysql_query($sql)or die('Error');
					while($data=mysql_fetch_array($result))
					{
					$name = $data['name'];
					}
					?>                 
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Hello, Admin <?php echo"$name";?><b class="caret"></b></a>
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
	
	       <?php
		  $id_komentar=$_GET['id_komentar']; 
		  $sql="select * from tbl_komentar where id_komentar='$id_komentar'";
		  $query=mysql_query($sql);
		  $data=mysql_fetch_array($query);
		  $subject='PT. SUMBER TERANG RAYA PADANG (DISTRIBUTOR PHILIPS)';
		  ?>
		  
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" align="center">Detail Message</h1>
            </div>
		</div>
	   
        <!-- /.row -->		
<div class="col-lg-12">
		<form role="form" id="contact-form" class="contact-form">
                    <div class="row">
                		<div class="col-md-6">
                  		<div class="form-group">
						<label class="control-label">Nama Pengirim</label>
                            <input type="text" class="form-control" placeholder="<? echo $data['nama_lengkap'];?>" readonly>
                  		</div>
                  	</div>
                    	<div class="col-md-6">
                  		<div class="form-group">
						<label class="control-label">Email</label>
                            <input type="text" class="form-control" placeholder="<? echo $data['email'];?>" readonly>
                  		</div>
                  	</div>
                  	</div>
                  	<div class="row">
                  		<div class="col-md-12">
                  		<div class="form-group">
						<label class="control-label">Pesan</label>
                            <textarea class="form-control textarea" rows="8" placeholder="<? echo $data['pesan'];?>" readonly></textarea>
                  		</div>
						<a href="mailto:<?echo $data['email'];?>?subject=<?echo $subject?>&body=Kepada : Mr./Mrs. <?echo $data['nama_lengkap'];?> , Pesan Anda : <?echo $data['pesan'];?>" type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-envelope"></span> REPLY MESSAGE</a>
                  	</div>
					
                    </div>
</div>
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
