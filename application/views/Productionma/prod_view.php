<!DOCTYPE html>
<html style="height:100%" lang="">
  <?php 
        $pageName = basename($_SERVER['PHP_SELF']);
        $paht = base_url();
  ?>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PCS TOOL-PRODUCTION</title>
    <meta name="description" content="">
    
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />

    <link rel="shortcut icon" type="image/x-icon" href="<? echo base_url(). "assets/"; ?>img/ic_tbkk.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>css/font-awesome.min.css">

    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>css/meanmenu/meanmenu.min.css">
    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>css/animate.css">
    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>css/normalize.css">
    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>css/datapicker/datepicker3.css">
    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>css/bootstrap-select/bootstrap-select.css">
    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>css/chosen/chosen.css">
    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>css/notika-custom-icon.css">
    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>css/main.css">
    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>css/wave/waves.min.css">
    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>css/responsive.css">

    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>style1.css">
    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>jquery.scrollbar.css">

    <script src="<? echo base_url(). "assets/notika/"; ?>js/vendor/modernizr-2.8.3.min.js"></script>
    <style type="text/css">
        .mainpage{
          position: relative;
          width: 100%;
          height: auto;
          min-height: 100%;
          padding-top: 30px;
          background: #0b0e19; 
        } 
        .contentpage, .contentbody{ height: 100%;}
        .contentpage{
          width: 100%;
          padding: 10px;
          margin-left: 0;
          position: relative;          
        }
        .contentbody{
          padding: 10px 5px 1px;
          margin-bottom: 5px;
        }
        .footpage{
          position: absolute;
          bottom: 0;
          width: 100%;
          margin-left: 0;
        }
        .pdtital{
          background: rgb(11, 14, 25);
          border: 1px solid #00c9ff2b;
          height: 295px;
          text-align: center;
          margin: 3px;
          padding: 1%;
          font-family: 'Exo', 'Roboto', sans-serif;
        }
        .overload{
          position: absolute;
          width: 100%;
          height: 100%;
          background: #0a0404d9;
          z-index: 1;
          top: 0;
          left: 0;
    /* padding-top: 15px; */          
        } 
    </style>



  </head>
<?php if( $pageName == "prd" ) { ?> 
  <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>loadde.css">
  <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>hourglass.css">
  <link href="https://fonts.googleapis.com/css?family=Exo:300&display=swap" rel="stylesheet">
<?php } elseif( $pageName == "workdays" ) { ?>
    <!-- /* */ -->
<?php } ?>
  </head>
  <body style="max-height: 100%; height:100%; width:100%;">

      <?include( "home/$header.php" );?>
      <?// include( "home/$menu.php"   );?>

    <div class="mainpage">
       <div class="contentpage">
          <div class="overload">
            <div class="loader">
              Loading
              <span></span>
            </div>
           </div>       
          <div class="contentbody">
             <? include( "home/$content.php");?>
           </div>
      </div>
      
      <div class="footpage">
           <? include( "home/$footer.php" );?>
      </div>
    </div>
    <? include( "home/{$modal[0]}.php");?>
    <? include( "home/{$modal[1]}.php");?>
    <? include( "home/{$modal[2]}.php");?>
    <!-- </div> --> 
    <script src="<? echo base_url(). "assets/notika/"; ?>js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/bootstrap.min.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/wow.min.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/jquery-price-slider.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/owl.carousel.min.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/jquery.scrollUp.min.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/meanmenu/jquery.meanmenu.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/counterup/jquery.counterup.min.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/counterup/waypoints.min.js"></script> 
    <script src="<? echo base_url(). "assets/notika/"; ?>js/counterup/counterup-active.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/datapicker/bootstrap-datepicker.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/datapicker/datepicker-active.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/sparkline/sparkline-active.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/graphh.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/piegraph.js"></script>

    <script src="<? echo base_url(). "assets/notika/"; ?>jquery.scrollbar.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/bootstrap-select/bootstrap-select.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/chosen/chosen.jquery.js"></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/elephant/js_page/Datejs-master/src/globalization/en-US.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/elephant/js_page/Datejs-master/src/core.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/elephant/js_page/Datejs-master/src/sugarpak.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/elephant/js_page/Datejs-master/src/parser.js'></script>  
    <script src="<?= base_url() ?>assets/vendor_plugins/socket.io/dist/socket.io.js"></script>

    <script src="<? echo base_url(). "assets/notika/"; ?>js/todo/jquery.todo.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/plugins.js"></script>
    <script src="<? echo base_url(). "assets/notika/"; ?>js/main.js"></script>


   <script> 
// jQuery(document).ready(function($) {
//             $('.counter').counterUp({
//                 delay: 10,
//                 time: 1000
//             });
//         });
  
   </script> 

<?php if( $pageName == "prd" ||  $pageName == "prdudate"  ) { ?>   
  <script type="text/javascript">
    var udate = new Date("<? echo $udate; ?>").toString("yyyy-MM-dd");
    //alert(udate);
    $('#data_select .input-group.date').datepicker({
      todayBtn: "linked",
      keyboardNavigation: false,
      forceParse: false,
      calendarWeeks: true,
      autoclose: true,
      format: "yyyy-mm-dd"
    }); 
  </script>   
  <script type="text/javascript"> 
    const username = "<?= $this->session->userdata("id"); ?>";
    const group = "<?= $this->session->userdata("group"); ?>";
    const page = "Production data"; 
  </script>
  <script src="<?= base_url() ?>assets/js/scoket-io/report.access.js"></script> 
  <? if ( $this->session->userdata("group") == "0") { ?>
    <script src="<?= base_url() ?>assets/js/scoket-io/admin.js"></script>  
  <? } ?>    
  <script src="<? echo base_url(). "assets/notika/"; ?>js-control/setdetailpd.js"></script>
 
<?php  } elseif ( $pageName == "scanship"  ) { ?>

      <!-- /**/ -->

<?php  }  ?>     
  </body>
</html>