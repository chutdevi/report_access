<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/ic_w4W_icon.ico">

    <title>PCS - First Log in</title>
  
	<!-- Bootstrap 4.1-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-extend.css">	
	
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/master_style.css">

	<!-- SoftMaterial admin skins -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/skins/_all-skins.css">	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body class="hold-transition">
	<div style="position: relative;">
	<section class="bg-img h-p100" style="background-image: url(<?php echo base_url();?>assets/images/gallery/full/login.jpg); width: 100%; position: fixed;" data-overlay="3">
		<div class="container h-p100">
		  <div class="row h-p100 align-items-center justify-content-center">
			 
			<div class="col-12">
				<h1 class="error-title my-30">>> YOUR ACCOUNT IS FIRST TIME TO LOGIN. <<</h1>
				<div class="main-agileits bg-img" style="background-image: url(<?php echo base_url();?>assets/images/gallery/full/login.jpg);" data-overlay="7">
					
					 <h1 class="font-size-80"><i class="fa fa-clock-o fa-spin text-white"></i></h1>
					<h2 class="font-size-80">FOR THE FIRST TIME, YOU HAVE NOT PERMISSION TO USE.</h2>
					<h3>PLEASE CONTACT PC SYSTEM TEAM TO ALLOW PERMISSION TO YOUR ACCOUNT.</h3>
				</div>
				
				<footer class="main-footer bg-transparent text-white ml-0 text-center no-border">
					&copy; <?php echo date('Y');  ?> Pc system TBKK Thailand.
				</footer>
			</div>			  
			
		  </div>
		</div>
	</section>

	</div>
	<!-- jQuery 3 -->
	<script src="<?php echo base_url();?>assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
	
	<!-- popper -->
	<script src="<?php echo base_url();?>assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.1-->
	<script src="<?php echo base_url();?>assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>


</body>
</html>