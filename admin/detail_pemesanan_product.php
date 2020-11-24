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
                <h1 class="page-header" align="center">Detail Pemesanan Product</h1>
            </div>
		</div>
        <!-- /.row -->	

		
<?php
$id_orders=$_GET['id_orders']; 
$sql="select * from tbl_orders where id_orders='$id_orders'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
$tanggal=($data['tgl_order']);
?>
<div class="row">
 <div class="col-md-12">
    <div class="table-responsive">    
        <table id="mytable" class="table table-bordred table-striped" border="1">
				     <tr>
                      <td colspan="2" bgcolor="#606060"><div align="center"><strong><font color="white">Data Pemesanan </font></strong></div></td>
                    </tr>
                    <tr>
                      <td width="508" align="left">No Order </td>
                      <td align="left"> <strong> <?php echo $data['id_orders']; ?></strong></td>
                    </tr>
                    <tr>
                      <td align="left">Tgl &amp; Jam Pemesanan </td>
                      <td align="left"> <?php echo $tanggal; ?> pukul <?php echo $data['jam_order']; ?></td>
                    </tr>
                    <tr>
                      <td align="left">Status Pemesanan </td>
                      <td align="left"><form action="proses_ganti_status_pemesanan_product.php?id_orders=<?php echo $id_orders; ?>" method="post" >
						<select name="status_order">
						<option value="Baru" <?php if($data['status_order']=="Baru") { echo "selected"; } ?>>Baru</option>
						<option value="Konfirmasi" <?php if($data['status_order']=="Konfirmasi") { echo "selected"; } ?>>Konfirmasi</option>
						</select>
                        <label>
                           <input name="ganti" type="submit" id="ganti" value="Ubah Status" />
                         </label>
                      </form>
					  </td>
                    </tr>
                  </table>


   
        <table id="mytable" class="table table-bordred table-striped" border="1">
                    <tr bgcolor="#606060">
						<td bgcolor="#606060"><div align="center"><strong><font color="white">Barcode</font></strong></div></td>
                      <td bgcolor="#606060"><div align="center"><strong><font color="white">Nama Product</font></strong></div></td>
                      <td bgcolor="#606060"><div align="center"><strong><font color="white">Jumlah</font></strong></div></td>
                      <td bgcolor="#606060"><div align="center"><strong><font color="white">Harga Satuan</font></strong></div></td>
                      <td bgcolor="#606060"><div align="center"><strong><font color="white">Sub Total</font></strong></div></td>
                    </tr>
					<?php
				  $sql2="SELECT * FROM tbl_orders_detail,tbl_product_customer WHERE tbl_orders_detail.id_product=tbl_product_customer.id_product AND id_orders='$_GET[id_orders]'";
				 $query2=mysql_query($sql2);
				while($data=mysql_fetch_array($query2)){
				  ?>
                    <tr>
					 <td align="center"><?php echo $data['barcode']; ?></td>
                      <td align="center"><?php echo $data['nama_product']; ?></td>
                      <td align="center"><?php echo $data['jumlah']; ?></td>
                      <td align="center">Rp. <?php echo $data['harga']; ?></td>
                      <td align="center">Rp. <?php echo $data['harga']*$data['jumlah']; ?></td>
                    </tr>
					<?php } ?>
					<tr bgcolor="#FFCC66">
					<td colspan=4 align="right" bgcolor="#606060"><strong><font color="white">Total Harga</font></strong></td>
					<td align="center" bgcolor="#606060"><strong><font color="white">Rp. 
					    <?php $a=mysql_query("select sum(harga*jumlah) as tot from tbl_orders_detail,tbl_product_customer WHERE tbl_orders_detail.id_product=tbl_product_customer.id_product AND id_orders='$_GET[id_orders]'");
		  $b=mysql_fetch_array($a);
		  echo $b['tot'];
		  ?>
					  </font></strong></td>
					</tr>
                  </table>
   
        <table id="mytable" class="table table-bordred table-striped" width="494" bgcolor="ffffff" border="1" align="center" cellpadding="1" cellspacing="0">

                    <tr bgcolor="#FFFF99">
                      <td colspan="2" bgcolor="#606060"><div align="center"><strong><font color="white">Data Pemesan </font></strong></div></td>
                    </tr>
					<?php
		  $id_orders=$_GET['id_orders']; 
		  $sql="select * from tbl_orders where id_orders='$id_orders'";
		  $query=mysql_query($sql);
		  $data=mysql_fetch_array($query);
		  ?>
                    <tr>
                      <td width="508" align="left">ID Pemesan</td>
                      <td  align="left"> <?php echo $data['id_customer']; ?></td>
                    </tr>
					<tr>
                      <td align="left">Nama Pemesan</td>
                      <td align="left"> <?php echo $data['nama_pemesan']; ?></td>
                    </tr>
                    <tr>
                      <td align="left">Alamat</td>
                      <td align="left"> <?php echo $data['alamat_lengkap']; ?></td>
                    </tr>
					<tr>
                      <td align="left">Nama Organisasi</td>
                      <td align="left"> <?php echo $data['nama_organisasi']; ?></td>
                    </tr>
                    <tr>
                      <td align="left">Telp.</td>
                      <td align="left"> <?php echo $data['telpon']; ?></td>
                    </tr>
                    <tr>
                      <td align="left">Email</td>
                      <td align="left"> <?php echo $data['email']; ?></td>
                    </tr>
					<tr>
                      <td align="left">Keterangan Pemesanan</td>
                      <td align="left"> <?php echo $data['keterangan']; ?></td>
                    </tr>
                  </table>
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