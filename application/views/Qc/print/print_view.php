<!DOCTYPE html>
<html lang="en" style="height:100%; width:100%; float:left;">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>PCS TOOL - [QC] LIST PLAN RECEIVE PRINT</title>
  <?$pageName =  $this->router->fetch_method(); ?> 
  <link href="<? echo base_url(). "assets/"; ?>img/ic_tbkk.ico" rel="icon"> 
  <link href="<? echo base_url(). "assets/dashio/"; ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
  <link href="<? echo base_url(). "assets/dashio/"; ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" />  
  <link href="<? echo base_url(). "assets/dashio/"; ?>css/style_print.css" rel="stylesheet">
  <script type='text/javascript' src='<?php echo base_url(); ?>assets/elephant/js_page/Datejs-master/src/globalization/en-US.js'></script>
  <script type='text/javascript' src='<?php echo base_url(); ?>assets/elephant/js_page/Datejs-master/src/core.js'></script>
  <script type='text/javascript' src='<?php echo base_url(); ?>assets/elephant/js_page/Datejs-master/src/sugarpak.js'></script>
  <script type='text/javascript' src='<?php echo base_url(); ?>assets/elephant/js_page/Datejs-master/src/parser.js'></script>     

  <? if( $pageName == "printqc" ) { ?>  
    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo:300&display=swap" rel="stylesheet">
  <? } ?>
  </head>
  <body style="max-height: 100%; height:100%; width:100%;">
    <section id="container" class="sidebar-closed">
      <div class="grid-main">

        <? include( "home/$content.php" );?> 
        
      </div>  
    </section>
 
    <script src="<? echo base_url(). "assets/dashio/"; ?>lib/jquery/jquery-3.4.1.min.js"></script>
    <script src="<? echo base_url(). "assets/dashio/"; ?>lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="<? echo base_url(). "assets/dashio/"; ?>lib/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<? echo base_url(). "assets/dashio/"; ?>lib/jquery.ui.touch-punch.min.js"></script> 
    <script src="<? echo base_url(). "assets/dashio/"; ?>lib/jquery.scrollTo.min.js"></script>  
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

<? if( $pageName == "printqc"  ) { ?>   
  <script src="<? echo base_url(). "assets/js/"; ?>qrcodejs-master/qrcode.min.js"></script> 
    <script src="<? echo base_url(). "assets/dashio/"; ?>js/searchrec.min.js"></script>
    <script>
        $(document).ready(function(){  
            var daterec = new Date("<? echo $datapage["d"]; ?>").toString('yyyy-MM-dd');
            var p       = <? echo $datapage["t"]; ?>;  
            var opt={
                url:'http://192.168.161.102/api_system/api_recsys/recsys_planreceive/'
              ,mtyp : "post"
              ,dtyp : "json"
              ,parm : { d : daterec, plant:p }
              };
            const v = ajax_use(opt, function(e){
                console.log(e);   
                $('#dataPrint tbody').html('');

                for (const vu of e) {
                    $('#dataPrint tbody').append(`<tr>
                                                  <td>${vu["VEND_CD"]}</td>
                                                  <td>${vu["VEND_ANAME"]}</td>
                                                  <td>${vu["ITEM_CD"]}</td>
                                                  <td>${vu["MODEL"]}</td>
                                                  <td>${vu["QTY"]}</td>
                                                  <td id="${vu["PONUMBER"]}"></td>
                                                  </tr>
                                                  `);  
                    var qrcode = new QRCode(document.getElementById(vu["PONUMBER"]), {
                        text: `GD${vu["PONUMBER"]}`,
                        width: 80,
                        height: 80,
                        colorDark : "#000000",
                        colorLight : "#ffffff",
                        correctLevel : QRCode.CorrectLevel.H
                    });

                    
                } window.print();
            }); 
        });
    </script>
  
<?  }  ?>     
  </body>
</html>