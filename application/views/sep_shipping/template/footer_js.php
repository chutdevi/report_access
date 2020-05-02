
                        </ul>


    <script src="<?php echo base_url(); ?>assets/elephant/js/vendor.min.js"></script>
    <!-- <script src="assets/vendor_components/jquery-3.3.1/jquery-3.3.1.min.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/elephant/js/elephant.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/elephant/js/application.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/elephant/js/demo.min.js"></script>
<!--     <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script> -->
<!--   <script src="assets/vendor_components/jquery-3.3.1/jquery-3.3.1.min.js"></script>
  <script src="assets/vendor_components/jquery-ui/jquery-ui.js"></script>
  <script src="assets/vendor_components/jquery-ui/jquery.blockUI.js"></script>
  <script src="assets/vendor_components/jquery-ui/download.js"></script>
  <script src="assets/vendor_components/datatable/datatables.min.js"></script>  -->   
<?php 

    $pageName = basename($_SERVER['PHP_SELF']);
    $paht = base_url();
    //echo $_SERVER['PHP_SELF']; exit;
    //echo $pageName; exit;
   if( $pageName == "scancomp" )
   {

    echo "<script src=\"{$paht}assets/elephant/js_page/searchCptag.min.js\"></script>";

   }
 ?>   
 <script src="<?= base_url() ?>assets/vendor_plugins/socket.io/dist/socket.io.js"></script>
 <script type="text/javascript"> 
   const username = "<?= $this->session->userdata("id"); ?>";
   const group = "<?= $this->session->userdata("group"); ?>";
   const page = "Compare Tag";
 </script>
 <script src="<?= base_url() ?>assets/js/scoket-io/report.access.js"></script> 
 <? if ( $this->session->userdata("group") == "0") { ?>
   <script src="<?= base_url() ?>assets/js/scoket-io/admin.js"></script>  
 <? } ?> 

	
  </body>
</html>