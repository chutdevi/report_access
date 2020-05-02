<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form controls &middot; Elephant Template &middot; The fastest way to build Modern Admin APPS for any platform, browser, or device.</title>

    <link rel="stylesheet" href="http://192.168.161.102/report_access/assets/css/styles_overlay.css" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />

    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/elephant/css/vendor.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/elephant/css/elephant.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/elephant/css/application.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/elephant/css/demo.min.css" />

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/> -->
    <?php 
        $pageName = basename($_SERVER['PHP_SELF']);
        $paht = base_url();
    ?>
        <!-- //echo $_SERVER['PHP_SELF']; exit; -->
        <!-- //echo $pageName; exit; -->
    <?php if( $pageName == "scanship" ) { ?>   
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/elephant/css_page/daterangepicker.css" />
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/elephant/css_page/loadding_Page.css" />
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/elephant/css_page/loadding_inPage.css" />          
    <?php } ?>   
    

  </head>
  <body class="layout layout-header-fixed">
    <?php include( "home/$header.php" );?>

    <div class="layout-main" >
      <div class="layout-load-in" style="position: fixed;width: 100%;height: 100%; z-index: 1;background: #000; /*display:none;*/" id="ldd">
          <div id="load">
            <div>G</div>
            <div>N</div>
            <div>I</div>
            <div>D</div>
            <div>A</div>
            <div>O</div>
            <div>L</div>  
          </div> 
      </div>   
      <div class="layout-load-tb" style="position: fixed;width: 100%;height: 100%; z-index: 1;background: #000; display:none;" id="tbd">
            <div id="loader-in">Please wait...</div>
      </div>
      <div class="layout-content-body" style="padding: 0px 15px 0px;">
          
          <div class="title-bar">
            <h1 class="title-bar-title"><span class="d-ib" style="margin-top: 0%; font-size: 20px; ";>Shiping scan detail</span><span class="d-ib"></span></h1>
          </div>

          <?php include( "home/$content.php" );?>
                <!-- <?php //include( "home/$footer.php" );?> -->
      </div>


      <div class="layout-footer" style="position: fixed; margin-left: 0px;">
        <div class="layout-footer-body">
          <small class="version">Version 1.4.0</small>   
        </div>
      </div>
   
      
    </div>
    <script src="<?php echo base_url(); ?>assets/elephant/js/vendor.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/elephant/js/elephant.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/elephant/js/application.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/elephant/js/demo.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor_plugins/socket.io/dist/socket.io.js"></script>
    <?php 

        $pageName = basename($_SERVER['PHP_SELF']);
        $paht = base_url();
    ?> 
    <?php  if( $pageName == "scancomp" ) { ?>   
       
        <script src="<?php echo base_url(); ?>assets/elephant/js_page/searchCptag.min.js"></script>
        
        <!-- echo "<script src=\"{$paht}assets/elephant/js_page/searchCptag.min.js\"></script>"; -->
    <?php  } elseif ( $pageName == "scanship"  ) { ?>

      
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/elephant/js_page/moment.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/elephant/js_page/daterangepicker.min.js"></script>

      <script type="text/javascript">
          $(function() {
                $('input[name="daterange"]').daterangepicker({
                  //opens: 'left',
                  minDate: '<?php  echo date('Y/m/d', strtotime("-2 Month", strtotime(date('Y/m/d')) )) ?>',
                  maxDate: '<?php  echo date('Y/m/d', strtotime("+1 Month", strtotime(date('Y/m/d')) )) ?>',
                 }) 
                });    
      </script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/elephant/js_page/filterShipping.js"></script>
      <script type="text/javascript"> 
        const username = "<?= $this->session->userdata("id"); ?>";
        const group = "<?= $this->session->userdata("group"); ?>";
        const page = "Shipping scan";
      </script>
      <script src="<?= base_url() ?>assets/js/scoket-io/report.access.js"></script> 
      <? if ( $this->session->userdata("group") == "0") { ?>
        <script src="<?= base_url() ?>assets/js/scoket-io/admin.js"></script>  
      <? } ?>
    <?php  }  ?>     
  </body>
</html>