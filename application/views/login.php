<!DOCTYPE html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/ic_w4W_icon.ico">

  <title>PCS - Log in </title>

  <!-- Bootstrap 4.1-->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
  
  <!-- Bootstrap extend-->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-extend.css"> 
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/master_style.css">

  <!-- SoftMaterial admin skins -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/skins/_all-skins.css"> 

    <!-- toast CSS -->
  <link href="<?php echo base_url();?>assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet">  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head> 
<body class="hold-transition bg-img" style="background-image: url(<? echo base_url()."assets/images/gallery/full/login3.jpg";?>); margin-top: 9%;  width: 100%; height: 100%; overflow: hidden;">

  
  <div class="container h-p100" >
    <div class="row align-items-center justify-content-md-center h-p100" >
     
      <div class="col-lg-5 col-md-8 col-12">
        <?php echo $alert; ?>
        <div class="content-top-agile">

          <h2>PCS SYSTEM TOOL SUPPORT</h2>
          <p class="text-white">Sign in to start your session</p>
        </div>
        <div class="p-40 mt-10 bg-white content-bottom">
          <?php echo form_open('login/home',array('class'=>'novalidate', 'method' => "post"));?>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-danger border-danger"><i class="ti-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Username" name="username">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-danger border-danger"><i class="ti-lock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Password" name="password">
              </div>
            </div>
              <div class="row">
              <div class="col-6">
                <div class="checkbox">
                  <input type="checkbox" id="basic_checkbox_1" >
                  <label for="basic_checkbox_1">Remember Me</label>
                </div>
              </div>
              <div class="col-6">
               <div class="fog-pwd text-right">
                <!-- <a href="javascript:void(0)"><i class="ion ion-locked"></i> Forgot pwd?</a><br> -->
                </div>
              </div>

              <div class="col-12 text-center">
                <!-- <input type="hidden" class="btn btn-danger btn-block margin-top-10" name=''  >  -->
                <button type="submit" class="btn btn-danger btn-block margin-top-10">SIGN IN</button>



                <!-- <button type="submit" id="but1" class="btn btn-danger btn-block margin-top-10">SIGN IN</button> -->
              </div>
              <!-- /.col -->
             </div> 
          <?php echo form_close();?>
<!--           <div class="text-center">
            <p class="mt-20">- OR -</p>
            <p class="gap-items-2 mb-20">
              <a class="btn btn-social-icon btn-outline btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
              <a class="btn btn-social-icon btn-outline btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
              <a class="btn btn-social-icon btn-outline btn-google" href="#"><i class="fa fa-google-plus"></i></a>
              <a class="btn btn-social-icon btn-outline btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
            </p>  
          </div> -->


<!--           <div class="text-center">
            <p class="mb-0">Don't have an account? <a href="register.html" class="text-info ml-5">Sign Up</a></p>
          </div> -->
        </div>
      </div>
      
     
    </div>
  </div>



  <!-- jQuery 3 -->
  <script src="<?php echo base_url();?>assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
  
  <!-- popper -->
  <script src="<?php echo base_url();?>assets/vendor_components/popper/dist/popper.min.js"></script>
  
  <!-- Bootstrap 4.1-->
  <script src="<?php echo base_url();?>assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- toast -->
  <script src="<?php echo base_url();?>assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>
  <script src="<?php echo base_url();?>assets/js/pages/toastr.js"></script>
  
  <script src="<?php echo base_url();?>assets/js/pages/notification.js"></script>






</body>
</html>
