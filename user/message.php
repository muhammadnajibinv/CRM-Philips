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
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="product.php">Product</a>
                    </li>
					<li>
                        <a href="contact.php">Contact</a>
                    </li>
					<li class="active">
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
                <h1 class="page-header" align="center">Message</h1>
            </div>
        </div>
        <!-- /.row -->

 <!-- Message -->
	<?php
	include "../database.php";
	$sql = "select * from tbl_customer where username='".$_SESSION['username']."'";
	$result=mysql_query($sql)or die('Error');
	while($data=mysql_fetch_array($result))
	{
	$id_customer = $data['id_customer'];
	$username = $data['username'];
	$nama_lengkap = $data['nama_lengkap'];
	$email = $data['email'];
	$hak_akses = $data['hak_akses'];
	}
	?>
	
        <div class="row">				
			<div class="col-md-6">
				<form action="proses_message.php" method="post">
				<div class="form-group col-lg-12">
					<div class="control-group">
					<label class="control-label">Nama</label>
					<div class="controls">
					<input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="<?php echo "".$nama_lengkap."";?>" maxlength="25" required readonly>
					</div>
				</div>
				</div>
				
				<div class="form-group col-lg-12">
				  <div class="control-group">
					<label class="control-label">Email</label>
					<div class="controls">
					<input type="email" name="email" class="form-control" id="email" value="<?php echo "".$email."";?>" required readonly>
					</div>
				</div>
				</div>
	
				
				<!-- Hidden Message -->
				
				<div class="control-group">
				<div class="controls">
				<input type="hidden" name="id_customer" class="form-control" id="id_customer" value="<?php echo "".$id_customer."";?>" required readonly>
				</div>
				</div>
				
				<div class="control-group">
				<div class="controls">
				<input type="hidden" name="username" class="form-control" id="username" value="<?php echo "".$username."";?>" required readonly>
				</div>
				</div>
								
				<div class="control-group">
				<div class="controls">
				<input type="hidden" name="hak_akses" class="form-control" id="hak_akses" value="<?php echo "".$hak_akses."";?>" required readonly>
				</div>
				</div>
				
				<!-- /Hidden Message -->
				
				<div class="form-group col-lg-12">
                  	<div class="col-md-14">
					<label class="control-label">Pesan</label>
                  	<div class="form-group">
                    <textarea class="form-control counted" rows="5" name="pesan" id="pesan" placeholder="Masukan pertanyaan, keluhan, saran, serta kritikan anda disini !" required autofocus></textarea>
                  	<h6 class="pull-center" id="counter">200 characters remaining</h6>
					</div>
                </div>
                </div>
				
			</div>
		
			<div class="col-md-6" align="justify">
				<h3 class="dark-grey">Syarat dan Ketentuan</h3>
				<p>
					Dengan mengklik "Kirim" Anda setuju dengan Syarat dan Ketentuan di PT. Sumber Terang Raya Padang.
				</p>
				<p>
					Anda dapat mengajukan pertanyaan, keluhan, saran, serta kritikan tentang pelayanan kami disini.
				</p>
				<p>
					Pertanyaan, keluhan, saran, serta kritikan anda akan kami jawab melalui email resmi kami.
				</p>
				<p>
					Kami tidak akan membalas jika anda mengirim pesan melalui email dan akan memblokir username anda jika pertanyaan anda tidak sesuai dengan topik (SPAM).
				</p>
				
				<button type="submit" class="btn btn-primary btn-xs">
                                <span class="glyphicon glyphicon-send"></span> Kirim
                </button>
			</div>
		</div>
		</div>
		</form>
	</section>
</div>
<!-- /Message -->

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
	<script src="../js/remain_message.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
