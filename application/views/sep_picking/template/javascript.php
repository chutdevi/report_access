<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().$this->config->item('template_path');?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().$this->config->item('template_path');?>bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().$this->config->item('template_path');?>dist/js/app.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url().$this->config->item('template_path');?>plugins/iCheck/icheck.min.js"></script>
<script src="<?= base_url() ?>assets/vendor_plugins/socket.io/dist/socket.io.js"></script>
<script type="text/javascript"> 
    const username = "<?= $this->session->userdata("id"); ?>";
    const group = "<?= $this->session->userdata("group"); ?>";
    const page = "Production Work Days";
</script>
<script src="<?= base_url() ?>assets/js/scoket-io/report.access.js"></script> 
<? if ( $this->session->userdata("group") == "0") { ?>
    <script src="<?= base_url() ?>assets/js/scoket-io/admin.js"></script>  
<? } ?>
</body>
</html>