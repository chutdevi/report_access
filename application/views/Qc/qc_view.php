<!DOCTYPE html>
<html lang="en" style="height:100%; width:100%; float:left;">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>PCS TOOL - [QC] LIST PLAN RECEIVE</title>
  <?$pageName =  $this->router->fetch_method(); ?> 
  <link href="<? echo base_url(). "assets/"; ?>img/ic_tbkk.ico" rel="icon"> 
  <link href="<? echo base_url(). "assets/dashio/"; ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
  <link href="<? echo base_url(). "assets/dashio/"; ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" /> 
  <link href="<? echo base_url(). "assets/dashio/"; ?>css/style.css" rel="stylesheet">
  <link href="<? echo base_url(). "assets/dashio/"; ?>css/style-responsive.css" rel="stylesheet">
  <link href="<? echo base_url(). "assets/dashio/"; ?>css/style_print.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<? echo base_url(). "assets/dashio/"; ?>lib/bootstrap-datepicker/css/datepicker.css" />  
  <? if( $pageName == "lpr" ) { ?> 
    <link rel="stylesheet" href="<? echo base_url(). "assets/notika/"; ?>hourglass.css">
    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo:300&display=swap" rel="stylesheet">
  <? } ?>
  </head>
  <body style="max-height: 100%; height:100%; width:100%;">
    <section id="container" class="sidebar-closed">
      <div style="height: auto; min-height: 100%; width: 100%; float: left; position: relative; background: darkslategrey;">
        <? include( "home/$header.php"  );?> 
        <? include( "home/$content.php" );?> 
        <? include( "home/$footer.php"  );?>
      </div>  
    </section>
        <? include( "home/{$modal[0]}.php"  );?>  
    <script src="<? echo base_url(). "assets/dashio/"; ?>lib/jquery/jquery-3.4.1.min.js"></script>
    <script src="<? echo base_url(). "assets/dashio/"; ?>lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="<? echo base_url(). "assets/dashio/"; ?>lib/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<? echo base_url(). "assets/dashio/"; ?>lib/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="<? echo base_url(). "assets/dashio/"; ?>lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<? echo base_url(). "assets/dashio/"; ?>lib/jquery.scrollTo.min.js"></script>
    <script src="<? echo base_url(). "assets/dashio/"; ?>lib/jquery.nicescroll.js" type="text/javascript"></script> 
    <script src="<? echo base_url(). "assets/dashio/"; ?>lib/common-scripts.js"></script>
    <script src="<?= base_url() ?>assets/vendor_plugins/socket.io/dist/socket.io.js"></script>
  
    <script type="text/javascript" src="<? echo base_url(). "assets/dashio/"; ?>lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<? echo base_url(). "assets/dashio/"; ?>js/html2canvas.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

<? if( $pageName == "lpr"  ) { ?>   
    <script src="<? echo base_url(). "assets/js/"; ?>qrcodejs-master/qrcode.min.js"></script> 
    <script src="<? echo base_url(). "assets/dashio/"; ?>js/searchrec.min.js"></script>
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
    <script type="text/javascript"> 
      const username = "<?= $this->session->userdata("id"); ?>";
      const group = "<?= $this->session->userdata("group"); ?>";
      const page = "List plan receive"; 
    </script>
    <script src="<?= base_url() ?>assets/js/scoket-io/report.access.js"></script> 
    <? if ( $this->session->userdata("group") == "0") { ?>
      <script src="<?= base_url() ?>assets/js/scoket-io/admin.js"></script>  
    <? } ?>   
<?  }  ?>     
  </body>
</html>