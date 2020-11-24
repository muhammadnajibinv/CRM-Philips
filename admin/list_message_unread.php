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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Hello, Admin <?php echo"$name";?> <b class="caret"></b></a>
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
                <h1 class="page-header" align="center">List Message Unread</h1>
            </div>
       </div>
        <!-- /.row -->	
		
 <div class="row">
<div class="col-md-12">
    <div class="table-responsive">    
        <table id="mytable" class="table table-bordred table-striped">
            <thead>
				   <th>Status</th>
				   <th>Tanggal Pesan Masuk</th>
				   <th>Dari</th>
                   <th>Nama Pengirim</th>
				   <th>Pesan</th>
				   <th>Read</th>
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
$query=mysql_query("SELECT * FROM tbl_komentar WHERE status='Unread' order by id_komentar  desc limit $posisi,$batas");
While($hasil=mysql_fetch_array($query))
{
$id_komentar=$hasil['id_komentar'];
$id_customer=$hasil['id_customer'];
$nama_lengkap=$hasil['nama_lengkap'];
$username=$hasil['username'];
$email=$hasil['email'];
$pesan=$hasil['pesan'];
$status=$hasil['status'];
$hak_akses=$hasil['hak_akses'];
$tanggal_komentar=$hasil['tanggal_komentar'];
$CharacterLimit=90;

?>
<tbody>
<tr>
<td> <? echo"$status"; ?> </td>
<td> <? echo"$tanggal_komentar"; ?> </td>
<td> <? echo"$hak_akses"; ?> </td>
<td> <? echo"$nama_lengkap"; ?> </td>
<td> <? $ColumnLimit = substr($pesan, 0, $CharacterLimit); echo "$ColumnLimit"; ?></td>
<td><p data-placement="top" data-toggle="tooltip" title="Read"><a class="btn btn-primary btn-xs" href="detail_message.php?id_komentar=<? echo $id_komentar;?>"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
<td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="javascript:if(confirm('Anda Yakin Akan Menghapus Pesan Dari <? echo $nama_lengkap ?> Ini ?')){document.location='delete_message_unread.php?id_komentar=<?php echo $id_komentar; ?>';}">
<button class="btn btn-danger btn-xs" data-title="Delete"><span class="glyphicon glyphicon-trash"></span></button></p></a></td>
</tr>	
</tbody>	
	   
<?}?>
</table> 
		</div>	

 <?
$query2=mysql_query("select * from tbl_komentar WHERE status='Unread'");
$jumlah_data=mysql_num_rows($query2);
$jumlah_halaman=ceil($jumlah_data/$batas);
echo"<div class='pagination pull-right'>";
if (1 != $paging){//tanda != berarti perintah akan dijalankan jika $paging tidak sama dengan 1, copyright all teknik paging by go_blind_hacker, powered by V-boys_studio
	$back=$paging-1;
	echo "<li><a href='list_message_unread.php?paging=$back'><span class='glyphicon glyphicon-chevron-left'></span></a></li>";
	}
	else{
	echo "<li class='disabled'><a href='#'><span class='glyphicon glyphicon-chevron-left'></span></a></li>";
	}
if ($paging != $jumlah_halaman){    
	$next=$paging+1;
	echo "<li><a href='list_message_unread.php?paging=$next'><span class='glyphicon glyphicon-chevron-right'></span></a></li>";
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