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
                <h1 class="page-header" align="center">Edit Product</h1>
            </div>
		</div>

<?php
$query=mysql_query("SELECT * FROM tbl_product_customer WHERE id_product='".$_GET['id_product']."'");
while($hasil=mysql_fetch_array($query))
{
$id_product=$hasil['id_product'];
$nama_product=$hasil['nama_product']; 
$barcode=$hasil['barcode']; 
$harga=$hasil['harga']; 
$stok=$hasil['stok']; 
}
?>	
		
 		<form method="post" action="proses_edit_product.php">
			<div class="row">
                    <div class="col-md-12">
                  		<div class="form-group">
						<label>Nama Product</label>
                            <input type="text" class="form-control" id="nama_product" name="nama_product" value="<? echo"$nama_product"; ?>" maxlength="50" required autofocus>
                  		</div>
						<div class="form-group">
						<label>Kategori</label>
						<select class="form-control" name='id_kategori' id='id_kategori' required>
					    <?$query=mysql_query("SELECT * FROM tbl_product_customer WHERE id_product='".$_GET['id_product']."'");
						while($hasil=mysql_fetch_array($query))
						{ 
						echo '<option>'.$hasil['nama_kategori'].'</option>';
						}
						?>
						<?php
						$sql = mysql_query("SELECT * FROM tbl_kategori ORDER BY nama_kategori ASC");
						if(mysql_num_rows($sql) != 0){
						while($row = mysql_fetch_assoc($sql)){
						$pilih = ($baris['id_kategori']==$row['id_kategori'])?"selected" : "";
						echo "<option value=\"$row[id_kategori]\" $pilih>$row[nama_kategori]</option>";
						}
						}
						?>

                            </select>
                        </div>
						<div class="form-group">
						<label>Barcode</label>
                            <input type="text" class="form-control" id="barcode" name="barcode" value="<? echo"$barcode"; ?>" onkeypress="return hanyaAngka(event, false)"onkeypress="return hanyaAngka(event, false)" maxlength="20" required>
                  		</div>
						<div class="form-group">
						<label>Harga Product</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<? echo"$harga"; ?>" onkeypress="return hanyaAngka(event, false)"onkeypress="return hanyaAngka(event, false)" maxlength="10" required>
                  		</div>
						<div class="form-group">
						<label>Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok" value="<? echo"$stok"; ?>" onkeypress="return hanyaAngka(event, false)"onkeypress="return hanyaAngka(event, false)" maxlength="5" required>
                  		</div>
						<input type="hidden" class="form-control" id="id_product" name="id_product" value=<?php echo"$id_product";?>>
						
					</div>
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary btn-xs">
                                <span class="glyphicon glyphicon-ok"></span> Update
                            </button>
                        </div>
					</div>
           </div>
		</form>
	
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
	  