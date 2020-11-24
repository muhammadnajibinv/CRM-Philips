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
					<li>
                        <a href="list_message.php">Message</a>
                    </li>
					<li class="active">
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
                <h1 class="page-header" align="center">List Pemesanan Product</h1>
            </div>
		</div>
        <!-- /.row -->	
		
 <div class="row">
<div class="col-md-12">
            <form action="proses_pencarian_pemesanan_product.php" method="post" >
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
                   <th>No. Order</th>
                   <th>Nama Pemesan</th>
                   <th>Tanggal Pemesanan</th>
                   <th>Jam</th>
                   <th>Status</th>
                   <th>Detail</th>
				   <th>Delete</th>
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
			  
$sql="SELECT * FROM tbl_orders ORDER BY id_orders DESC limit $posisi,$batas";
$query=mysql_query($sql);
$no=1;
while($hasil=mysql_fetch_array($query)){

$id_orders=$hasil['id_orders'];
$nama_pemesan=$hasil['nama_pemesan'];
$tgl_order=$hasil['tgl_order'];
$jam_order=$hasil['jam_order'];
$status_order=$hasil['status_order'];
?>
<tbody>
<tr>	
<td> <? echo"$id_orders"; ?> </td>
<td> <? echo"$nama_pemesan"; ?> </td>
<td> <? echo"$tgl_order"; ?> </td>
<td> <? echo"$jam_order"; ?> </td>
<td> <? echo"$status_order"; ?> </td>
<td>
	<p data-placement="top" data-toggle="tooltip" title="Detail Pemesanan">
	<a href="detail_pemesanan_product.php?id_orders=<?php echo $id_orders; ?>" class="btn btn-primary btn-xs" data-title="detail" name="detail" type="submit" id="detail" value="">
	<span class="glyphicon glyphicon-tags"></span></a>
	</p>
</td>
</form>
<td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="javascript:if(confirm('Anda Yakin Akan Menghapus Pemesanan Dari <? echo $nama_pemesan ?> Ini ?')){document.location='delete_pemesanan_product.php?id_orders=<?php echo $id_orders; ?>';}">
<button class="btn btn-danger btn-xs" data-title="Delete"><span class="glyphicon glyphicon-trash"></span></button></p></a></td>
</tr>	
</tbody>	
	   
<?}?>
</table> 
		</div>	

 <?
$query2=mysql_query("select * from tbl_orders");
$jumlah_data=mysql_num_rows($query2);
$jumlah_halaman=ceil($jumlah_data/$batas);
echo"<div class='pagination pull-right'>";
if (1 != $paging){//tanda != berarti perintah akan dijalankan jika $paging tidak sama dengan 1, copyright all teknik paging by go_blind_hacker, powered by V-boys_studio
	$back=$paging-1;
	echo "<li><a href='list_pemesanan_product.php?paging=$back'><span class='glyphicon glyphicon-chevron-left'></span></a></li>";
	}
	else{
	echo "<li class='disabled'><a href='#'><span class='glyphicon glyphicon-chevron-left'></span></a></li>";
	}
if ($paging != $jumlah_halaman){    
	$next=$paging+1;
	echo "<li><a href='list_pemesanan_product.php?paging=$next'><span class='glyphicon glyphicon-chevron-right'></span></a></li>";
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