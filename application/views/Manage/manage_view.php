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
  
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor_components/bootstrap/dist/css/bootstrap.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/home/css/style.css">
  <?$pageName =  $this->router->fetch_method(); ?> 
  <? if( $pageName == "mnm" ) { ?>
    <!-- <link href='https://fonts.googleapis.com/css?family=Viga' rel='stylesheet'>  -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>  -->
    <link rel="stylesheet" href="<?=base_url() ?>assets/Manage/css/mnm-style.css"> 
    <script type="text/javascript">
        const username = "<?= $this->session->userdata("id"); ?>";
        const group = "<?= $this->session->userdata("group"); ?>";
        const page = "Manage member"; 
        var   id = "<?= base64_encode( $this->session->userdata("id") ); ?>"
    </script>
  <? } ?>
  </head>
  <body> 
    <div class="home-container container-background">	
          <? include( dirname(__FILE__, 2)."/Home-menu/home/$header.php"  );?> 
          <? include( dirname(__FILE__, 2)."/Manage/home/$content.php" );?>  
          <? include( dirname(__FILE__, 2)."/Home-menu/home/$footer.php"  );?>  
    </div>

  <script src="<?php echo base_url() ?>assets/vendor_components/jquery-3.3.1/jquery-3.3.1.min.js"></script> 
  <script src="<?php echo base_url() ?>assets/vendor_components/datatable/datatables.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor_plugins/socket.io/dist/socket.io.js"></script>
  <script type="text/javascript">
    var url_img = "<?php echo base_url() ?>assets/images/card/img_mem/";
    function myFunction(x) {
              x.classList.toggle("change");
              $(".dropdown-menu-chutdet").toggle();
              $(".main-content").toggle(); 
              $(".dropdown-menu-chutdet").toggleClass("hidelist-menu");
              $(".dropdown-menu-chutdet").toggleClass("showlist-menu");  
          }
  </script>
  <!-- <script>
    const port = "3000";
    const ipAddress = "192.168.161.102"
    const socketIoAddress = `http://${ipAddress}:${port}`;
    const username = "<?//= //$uid; ?>";
    var socket = undefined;
  </script> -->
<? if( $pageName == "mnm"  ) { ?> 
  <script type="text/javascript"> 

  </script>
  <script src="<?= base_url() ?>assets/js/scoket-io/report.access.js"></script>
  <script src="<?=base_url() ?>assets/Manage/js/mnm-control.js"></script>
<? if ( $this->session->userdata("group") == "0") { ?>
      <script src="<?= base_url() ?>assets/js/scoket-io/admin.js"></script>  
<? } ?>  
  <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script> -->
  <!-- <script src="<? // echo base_url() ?>assets/vendor_plugins/socket.io/dist/socket.io.js"></script>      
  <script src="<? // echo base_url() ?>assets/Manage/js/mnm-script.js"></script>  -->
  
  <!-- ` -->
<?}else if(  $pageName == "prd"  )  { ?>   
  <script src="<?php echo base_url() ?>assets/vendor_plugins/socket.io/dist/socket.io.js"></script>
<?} ?>

    

  </body>
</html>