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
                <h1 class="page-header" align="center">List Cart</h1>
            </div>
		</div>
        <!-- /.row -->	
	<?
		$sid = session_id();
	$sql = mysql_query("SELECT * FROM tbl_orders_temp, tbl_product_customer 
			                WHERE id_session='$sid' AND tbl_orders_temp.id_product=tbl_product_customer.id_product");
 $ketemu=mysql_num_rows($sql);
 if($ketemu < 1){
    echo "<p align='center'><a href='list_pesan_product.php'><img src='../image/cart_orang.png'></a><br>        
		<div class='row'>
            <div class='col-lg-12'>
                <h3 align='center'>Keranjang Kosong Komandan</h3>
            </div>
		</div></p>";
	
    }
  else{
    echo "<form method=post action=proses_cart.php?module=cart&act=update>
          <div class='row'>
			 <div class='col-md-12'>
				<div class='table-responsive'>    
					<table id='mytable' class='table table-bordred table-striped'>
						<thead>
							<th>No</th>
							<th>Nama Product</th>
							<th>Jumlah</th>
							<th>Harga Satuan</th>
							<th>Sub Total</th>
							<th>Delete</th>
						</thead>";  
  
  $no=1;
  while($r=mysql_fetch_array($sql)){
    $subtotal    = $r[harga] * $r[jumlah];
    $total       = $total + $subtotal;  
    $subtotal_rp = format_rupiah($subtotal);
    $total_rp    = format_rupiah($total);
    $harga       = format_rupiah($r[harga]);
    
    echo "<tbody>
		<tr><td>$no</td><input type=hidden name=id[$no] value=$r[id_orders_temp]>
              <td>$r[nama_product]</td>
              <td><input type=text name='jml[$no]' value=$r[jumlah] size=1></td>
              <td>Rp. $harga</td>
              <td>Rp. $subtotal_rp</td>
			  <td><p data-placement='top' data-toggle='tooltip' title='Delete'><a class='btn btn-danger btn-xs' href='proses_cart.php?module=cart&act=hapus&id=$r[id_orders_temp]'><span class='glyphicon glyphicon-trash'></span></button></p></td>
          </tr>
		  </tbody>
		  ";
    $no++; 

  }
  echo "<tbody>
		<tr><td colspan=4 align=right>Total</td><td>Rp. <b>$total_rp</b></td></tr>		
        <tr><td colspan=2 align=left><a class='btn btn-primary' href=list_pesan_product.php><span class='glyphicon glyphicon-shopping-cart'></a></td>
        <td colspan=2 align=center><button class='btn btn-primary'><input type='hidden' border=0><span class='glyphicon glyphicon-refresh'></span></button></td>
        <td colspan=2 align=right><a class='btn btn-primary' href=proses_pesan_product.php><input type='hidden' border=0><span class='glyphicon glyphicon-send'></a></td></tr></table></form>";
		}

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
