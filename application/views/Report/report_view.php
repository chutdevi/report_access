<!DOCTYPE html> 
<html lang="en" style="height:100%; width: 100%;">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" /> 

    <link rel="icon" href="<?php echo base_url(); ?>assets/images/ic_w4W_icon.ico">

    <title>PCS - <?php echo $setTitle; ?> </title> 
  
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor_components/bootstrap/dist/css/bootstrap.css"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-extend.css">  
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor_plugins/iCheck/all.css">  
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor_components/bootstrap-select/dist/css/bootstrap-select.css"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor_components/select2/dist/css/select2.min.css"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/master_style.css"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/horizontal_menu_style.css"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/skins/_all-skins.css">  
  <link href="<?php echo base_url() ?>assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url() ?>assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet">
  <?$pageName =  $this->router->fetch_method(); ?> 
  <? if( $pageName == "prd" ) { ?>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/Report/css/prd-style.css">  
  <? } ?>
  </head>
  <body class="hold-transition skin-blue layout-top-nav" style="height:100%; width:100%;"> 
    <div class="wrapper">	
          <? include( "home/$headder.php"  );?> 
          <? include( "home/$content.php" );?> 
          <? include( "home/$footter.php"  );?> 
    </div>

  <script src="<?php echo base_url() ?>assets/vendor_components/jquery-3.3.1/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor_components/jquery-ui/jquery-ui.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor_components/jquery-ui/jquery.blockUI.js"></script> 
  <script src="<?php echo base_url() ?>assets/vendor_components/datatable/datatables.min.js"></script>
  
  <script src="<?php echo base_url() ?>assets/vendor_components/popper/dist/popper.min.js"></script>  
  <script src="<?php echo base_url() ?>assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script> 
  <script src="<?php echo base_url() ?>assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> 
  <script src="<?php echo base_url() ?>assets/vendor_components/fastclick/lib/fastclick.js"></script> 
  <script src="<?php echo base_url() ?>assets/js/template.js"></script> 
  <script src="<?php echo base_url() ?>assets/js/demo.js"></script> 
  <script src="<?php echo base_url() ?>assets/js/horizontal-layout.js"></script> 
  <script src="<?php echo base_url() ?>assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script> 
  <script src="<?php echo base_url() ?>assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script> 
  <script src="<?php echo base_url() ?>assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script> 
  <script src="<?php echo base_url() ?>assets/vendor_components/select2/dist/js/select2.full.js"></script> 
  <script src="<?php echo base_url() ?>assets/vendor_components/moment/min/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script> 
  <script src="<?php echo base_url() ?>assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> 


  <script src="<?php echo base_url() ?>assets/js/pages/advanced-form-element.js"></script> 
  <script src="<?php echo base_url() ?>assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script> 
  <script src="<?php echo base_url() ?>assets/vendor_plugins/iCheck/icheck.min.js"></script>  
  <script src="<?php echo base_url() ?>assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script> 
  <script src="<?php echo base_url() ?>assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>  
  <script src="<?php echo base_url() ?>assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script> 
  <script src="<?= base_url() ?>assets/vendor_plugins/socket.io/dist/socket.io.js"></script>  
<? if( $pageName == "lpr"  ) { ?>    
    <script>
    $('.dpRece').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: "yyyy-mm-dd"
    });
    </script> 
<?}else if(  $pageName == "prd"  )  { ?>   
  <script type="text/javascript"> 
      const username = "<?= $this->session->userdata("id"); ?>";
      const group = "<?= $this->session->userdata("group"); ?>";
      const page = "Production Report"; 
  </script>
  <script src="<?= base_url() ?>assets/js/scoket-io/report.access.js"></script> 
  <? if ( $this->session->userdata("group") == "0") { ?>
      <script src="<?= base_url() ?>assets/js/scoket-io/admin.js"></script>  
  <? } ?>
  <script src="<?php echo base_url() ?>assets/Report/js/prd-script.js"></script>
<?} ?>
  </body>
</html>