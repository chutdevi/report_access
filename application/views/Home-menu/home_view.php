<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCS TOOL - <?=$title;?></title>
    
    <link rel="icon" href="<?=base_url(); ?>assets/images/ic_w4W_icon.ico"> 
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/home/css/style.css">
    <script type="text/javascript">
        const username = "<?= $this->session->userdata("id"); ?>";
        const page = "Home";
        var   id = "<?= base64_encode( $this->session->userdata("id") ); ?>"
    </script>
</head>
<body>
    <div class="home-container container-background">
    <? include( "home/$header.php" );?>
    <? include( "home/$content.php" );?>
    <? include( "home/$footer.php" );?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
      
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>  --> 
    <script type="text/javascript">


       function myFunction(x) {
             x.classList.toggle("change");
             $(".dropdown-menu-chutdet").toggle(); 
             $(".main-content").toggle();
             $(".dropdown-menu-chutdet").toggleClass("hidelist-menu");
             $(".dropdown-menu-chutdet").toggleClass("showlist-menu");  
        }
    </script>

    <script src="<?= base_url() ?>assets/vendor_plugins/socket.io/dist/socket.io.js"></script>
    <script src="<?= base_url() ?>assets/js/scoket-io/report.access.js"></script>
</body> 
</html>