<?include "guard.php"?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="image/favicon.png">

    <title>PT. Sumber Terang Raya Padang</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                        <a href="register.php">Register</a>
                    </li>
					<li>
                        <a href="login.php">Login</a>
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
                <h1 class="page-header" align="center">Register</h1>
            </div>
        </div>
        <!-- /.row -->
	
	<!-- Register -->
<form action="proses_register.php" method="post">
	<div class="row">			
			<div class="col-md-6">
				<div class="form-group col-lg-12">
					<div class="control-group">
					<label>Nama Lengkap</label>
					<div class="controls">
					<input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="" maxlength="25" required autofocus>
					</div>
				</div>
				</div>
				
				<div class="form-group col-lg-6">
					<div class="control-group">
					<label>Username</label>
					<div class="controls">
					<input type="text" name="username" class="form-control" id="username" value="" maxlength="25" required>
					</div>
				</div>
				</div>
				
				<div class="form-group col-lg-6">
					<div class="control-group">
					<label>Password</label>
					<div class="controls">
					<input type="password" name="password" class="form-control" id="password" value="" maxlength="20" required>
					</div>
				</div>
				</div>
				
				<div class="form-group col-lg-6">
				  <div class="control-group">
					<label>Email</label>
					<div class="controls">
					<input type="email" name="email" class="form-control" id="email" value="" maxlength="30" required>
					</div>
				</div>
				</div>
				
				<div class="form-group col-lg-6">
					<div class="control-group">
					<label>Nama Organisasi</label>
					<div class="controls">
					<input type="text" name="nama_organisasi" class="form-control" id="nama_organisasi" value="" maxlength="40" required>
					</div>
				</div>
				</div>	
					
				<div class="form-group col-lg-12">
					<div class="control-group">
					<label>Alamat Lengkap</label>
					<div class="controls">
					<input type="text" name="alamat_lengkap" class="form-control" id="alamat_lengkap" value="" maxlength="100" required>
					</div>
				</div>
				</div>
				
			
				
			</div>
		
			<div class="col-md-6" align="justify">
				<h3 class="dark-grey">Syarat dan Ketentuan</h3>
				<p>
					Dengan mengklik "Register" Anda setuju dengan Syarat dan Ketentuan di PT. Sumber Terang Raya Padang.
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
				
				<button type="submit" class="btn btn-primary">Register</button>
			</div>
		</div>


</div>
</div>
		</form>
<!-- /Register -->
		
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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
	<script>
	$(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
	</script>

</body>

</html>