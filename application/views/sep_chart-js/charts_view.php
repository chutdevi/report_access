<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PCS TOOL-WORKDAYS</title>

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
<?php } elseif( $pageName == "workdays" ) { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/elephant/css_page/loadding_Page.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/elephant/css_page/loadding_inPage.css" />     
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/elephant/css_page/morris.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/elephant/css/vendor.min.css" />          
<?php } elseif( $pageName == "tsd" ) { ?>
    <title>Bar Chart Multi Axis</title>

    <style>
    canvas {
      -moz-user-select: none;
      -webkit-user-select: none;
      -ms-user-select: none;
    }
    </style>


<?php } ?>
  </head>
  <body class="layout layout-header-fixed">
<?php include( "home/$header.php" );?>

    <div class="layout-main">
      <div id="myNav" class="overlay" style="display:none; background-color: rgba(0,0,0,0.4);  position: fixed;" >
        <div class="overlay-content-com" style="text-align:center; top: 20%; margin-left: -2%;">
          <span class="label label-danger" id="tm_mer" >00:00:00</span>
        </div>
      </div>
      <div class="layout-load-in" style="position: fixed;width: 100%;height: 100%; z-index: 1;background: #000; display:none;" id="ldd">
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
      <div class="layout-content" style="margin-left: 0.7456%;margin-top: 0%;">
            <div class="layout-content-body">
                <div class="row">
                  <div class="title-bar">
                    <h1 class="title-bar-title"><span class="d-ib" style="margin-top: 0%; font-size: 20px; ";>Production work days</span><span class="d-ib"></span></h1>
                  </div>
                </div>

                <?php include( "home/$content.php" );?>
                      <!-- <?php //include( "home/$footer.php" );?> -->
            </div>
      </div>
      <div class="layout-footer" style="margin-left: 0%;">
        <div class="layout-footer-body">
          <small class="version">Version 1.2.0</small>
          <small class="copyright"><?php echo date('Y'); ?> © TBKK (Thailand) Co., Ltd. <a href="http://192.168.161.102/report_access/">Made by PC System</a></small>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/elephant/js/vendor.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/elephant/js/elephant.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/elephant/js/application.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/elephant/js/demo.min.js"></script> 

    <script src="<?php echo base_url(); ?>assets/elephant/js_page/Datejs-master/src/core.js"></script> 
    <script src="<?php echo base_url(); ?>assets/elephant/js_page/Datejs-master/src/sugarpak.js"></script>    
<?php 

        $pageName = basename($_SERVER['PHP_SELF']);
        $paht = base_url();
?> 
<?php  if( $pageName == "workdays" ) { ?>      
    <script src="<?php echo base_url(); ?>assets/elephant/js_page/morris.js"></script>
    <script src="<?php echo base_url(); ?>assets/elephant/js_page/lib/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/elephant/js_page/searchworkDays.js"></script>
<!--     <script type="text/javascript">
    if( screen.width == 1366)
     document.windows.style.zoom = "69%"
    else
     document.windows.style.zoom = "90%"
     //alert("Your screen resolution is: " + new Date('2020-02-01').toString("yyyy/MM/dd") + " => " + new Date.today().add(-3).months().toString("yyyy/MM/dd") );
    </script>   -->  
<?php  } elseif ( $pageName == "charts"  ) { ?>
    <!-- <script src="../../../dist/Chart.min.js"></script> chaer_js.min-->
    <script src="<?php echo base_url(); ?>assets/elephant/js_page/tsd/chaer_js.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/elephant/js_page/tsd/utils.js"></script> -->
    <!-- <script src="<?php echo base_url(); ?>assets/elephant/js_page/tsd/tsd_charts.min.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/elephant/js_page/tsd/pdactual.js"></script>

<?php  }  ?>     
  </body>
</html>