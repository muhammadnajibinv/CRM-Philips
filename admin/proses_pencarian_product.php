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
                        <a href="list_customer.php">Customer</a>
                    </li>
                   <li class="dropdown active">
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
                            <li class="active">
                                <a href="list_product.php">List Product</a>
                            </li>
                        </ul>
                    </li>
					<li>
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

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" align="center">List Product</h1>
            </div>
		</div>
		
 <div class="row">
<div class="col-md-12">
            <form action="proses_pencarian_product.php" method="post" >
                <div class="input-group">
                    <input type="text" class="form-control" id="system-search" name="query" placeholder="Search" required autofocus>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" name="submit" value="cari"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
		
<?php
$query = $_POST['query'];

if ($_POST['submit']) {
	$query=mysql_query("select * from tbl_product_customer where id_product like '%$query%' OR nama_mag like '%$query%' OR nama_kategori like '%$query%' OR nama_product like '%$query%' OR barcode like '%$query%' OR harga like '%$query%' OR stok like '%$query%' OR dipesan like '%$query%' OR tanggal_masuk like '%$query%' order by id_product");
	$cek=mysql_num_rows($query);
	?>
 
 <div class="col-md-12">
    <div class="table-responsive">    
        <table id="mytable" class="table table-bordred table-striped">
            <thead>
                   <th>ID</th>
                   <th>Mag</th>
                   <th>Kategori</th>
				   <th>Nama Product</th>
                   <th>Barcode</th>
                   <th>Harga</th>
				   <th>Stok</th>
				   <th>Dipesan</th>
				   <th>Tanggal Masuk</th>
				   <th>Edit</th>
				   <th>Delete</th>
			</thead>

<?
	if($cek){
	
		while($hasil=mysql_fetch_array($query)){

$id_product=$hasil['id_product'];
$nama_mag=$hasil['nama_mag'];
$nama_kategori=$hasil['nama_kategori'];
$barcode=$hasil['barcode'];
$nama_product=$hasil['nama_product'];
$harga=$hasil['harga'];
$stok=$hasil['stok'];
$dipesan=$hasil['dipesan'];
$tanggal_masuk=$hasil['tanggal_masuk'];
?>
<tbody>
<tr>	
<td> <? echo"$id_product"; ?> </td>
<td> <? echo"$nama_mag"; ?> </td>
<td> <? echo"$nama_kategori"; ?> </td>
<td> <? echo"$nama_product"; ?> </td>
<td> <? echo"$barcode"; ?> </td>
<td> <? echo"Rp.$harga"; ?> </td>
<td> <? echo"$stok"; ?> </td>
<td> <? echo"$dipesan"; ?> </td>
<td> <? echo"$tanggal_masuk"; ?> </td>
<td><p data-placement="top" data-toggle="tooltip" title="Edit"><a class="btn btn-primary btn-xs" href="edit_product.php?id_product=<? echo $id_product;?>"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
<td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="javascript:if(confirm('Anda Yakin Akan Menghapus Product <? echo $nama_product ?> Ini ?')){document.location='delete_product.php?id_product=<?php echo $id_product; ?>';}">
<button class="btn btn-danger btn-xs" data-title="Delete"><span class="glyphicon glyphicon-trash"></span></button></p></a></td>
</tr>	
</tbody>	
	   
<?php
			
		}
		
	}else{
	?>
        
            <div class="col-lg-12">
                <h4 align="center">Not Found</h4>
            </div>
	
	<?
	}
	
}else{
	unset($_POST['submit']);
}
?>
</table><br />

<?php

?>
</table> 
		</div>	

 <?

echo"<div class='pagination pull-right'>";

	echo "<li><a href='list_product.php'><span class='glyphicon glyphicon-chevron-left'></span></a></li>";
	
echo"</div>";
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
	  