<?php @session_start();
include "guard.php"?>
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
					<li class="active">
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
                <h1 class="page-header" align="center">List Product</h1>
            </div>
		</div>
        <!-- /.row -->	
<div class="row">
<div class="col-md-12">
            <form action="proses_pencarian_product.php" method="post" >
                <div class="input-group">
                    <input type="text" class="form-control" id="system-search" name="query" placeholder="Search" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" name="submit" value="cari"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>

 
 <div class="col-md-12">
    <div class="table-responsive">    
        <table id="mytable" class="table table-bordred table-striped">
            <thead>
                   <th>Mag</th>
                   <th>Kategori</th>
				   <th>Nama Product</th>
                   <th>Harga</th>
				   <th>Pesan</th>
			</thead>

<?
$batas=5;
$paging=$_GET['paging'];
if(empty($paging))
	{
	$posisi=0;
	$paging=1;
	}

else{
	$posisi=($paging-1) * $batas;
	}
$query=mysql_query("SELECT * FROM tbl_product_customer order by id_product desc limit $posisi,$batas");
While($hasil=mysql_fetch_array($query))
{
$id_product=$hasil['id_product'];
$nama_mag=$hasil['nama_mag'];
$nama_kategori=$hasil['nama_kategori'];
$barcode=$hasil['barcode'];
$nama_product=$hasil['nama_product'];
$harga=$hasil['harga'];
$tanggal_masuk=$hasil['tanggal_masuk'];
?>
<tbody>
<tr>	
<td> <? echo"$nama_mag"; ?> </td>
<td> <? echo"$nama_kategori"; ?> </td>
<td> <? echo"$nama_product"; ?> </td>
<td> <? echo"Rp.$harga"; ?> </td>
<td><?if($hasil[stok]=="0"){echo "<p data-placement='top' data-toggle='tooltip' title='Stok Habis'><a class='btn btn-danger btn-xs' href='proses_cart.php?module=cart&act=tambah&id=$id_product'><span class='glyphicon glyphicon-alert'></span></a></p>";
	  }else{
	  echo "<p data-placement='top' data-toggle='tooltip' title='Add To Cart'><a class='btn btn-primary btn-xs' href='proses_cart.php?module=cart&act=tambah&id=$id_product'><span class='glyphicon glyphicon-shopping-cart'></span></button></p>"; 
	}?>
</td>
</tr>	
</tbody>	
	   
<?}?>
</table> 
		</div>	

 <?
$query2=mysql_query("select * from tbl_product_customer");
$jumlah_data=mysql_num_rows($query2);
$jumlah_halaman=ceil($jumlah_data/$batas);
echo"<div class='pagination pull-right'>";
if (1 != $paging){//tanda != berarti perintah akan dijalankan jika $paging tidak sama dengan 1, copyright all teknik paging by go_blind_hacker, powered by V-boys_studio
	$back=$paging-1;
	echo "<li><a href='list_pesan_product.php?paging=$back'><span class='glyphicon glyphicon-chevron-left'></span></a></li>";
	}
	else{
	echo "<li class='disabled'><a href='#'><span class='glyphicon glyphicon-chevron-left'></span></a></li>";
	}
if ($paging != $jumlah_halaman){    
	$next=$paging+1;
	echo "<li><a href='list_pesan_product.php?paging=$next'><span class='glyphicon glyphicon-chevron-right'></span></a></li>";
	}
	else
	{
	echo "<li class='disabled'><a href='#'><span class='glyphicon glyphicon-chevron-right'></span></a></li>";
	}
echo"</div>";
?>			

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
