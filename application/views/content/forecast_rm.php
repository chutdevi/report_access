  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-chevron-circle-down text-black"></i> FORECAST OF RAW MATERIAL 6 MONTHS
      </h1>
    </section> 
    <?php

      $date1 = date('M-Y');
      $strtime = strtotime($date1);

      $caldate2 = strtotime("+1 Month",$strtime);
      $date2 = date("M-Y", $caldate2);

      $caldate3 = strtotime("+2 Month",$strtime);
      $date3 = date("M-Y", $caldate3);

      $caldate4 = strtotime("+3 Month",$strtime);
      $date4 = date("M-Y", $caldate4);

      $caldate5 = strtotime("+4 Month",$strtime);
      $date5 = date("M-Y", $caldate5);

      $caldate6 = strtotime("+5 Month",$strtime);
      $date6 = date("M-Y", $caldate6);

    ?>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="box">
            <!-- <div class="box-header with-border">
              <div class="col-6">
                <h4 class="box-title">Please click button for see data.</h4>
                <ul class="box-controls pull-right"></ul>
              </div>
            </div> -->
            <?php echo form_open_multipart('Forecast/forecast_rm/');?> 
              <div class="box-body pb-0">
                <div class="row">
                  <div class="col-md-3 col-6">
                      <div class="form-group">
                      <label></label>
                        <div class="input-group">
                          <div class="clearfix">
                              <button class="btn btn-social btn-bitbucket"> <i class="fa fa-search"></i> CLICK HERE FOR SEE DATA </button>
                              <input type="hidden" name="action" value="<?php echo base64_encode('searchType');?>"  />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php echo form_close();?>
              <?php if ($frmEdit == TRUE){ ?>
                
                      <div class="col-12">
                        <div class="box">
                          <div class="box-header with-border">
                            <h4 class="box-title">View Data</h4>
                            <ul class="box-controls pull-right">
                              <li><a class="box-btn-fullscreen" href="#"></a></li>

                            <li><a class="box-btn-slide" href="#"></a></li> 
                            </ul>                
                          </div>
                          <div class="box-body">
                            <div class="clearfix">
                              <button type="button" class="btn btn-success mb-5" id="bn2" name="button2" value="b2" > <i class="fa fa-file-excel-o" ></i>CSV</button>
                            </div>
                            <div class="table-responsive">
                              <table class="table table-striped mb-0" id="table1" >
                                <thead class="thead-light">
                                <tr>
                                  <th  class="bx-2 bg-gray"scope="col">NO.</th>
                                  <th  class="bx-2 bg-gray"scope="col">ITEM CODE</th>
                                  <th  class="bx-2 bg-gray"scope="col">ITEM NAME</th>
                                  <th  class="bx-2 bg-gray"scope="col">MODEL</th>
                                  <th  class="bx-2 bg-gray"scope="col"><?php echo $date1;?></th>
                                  <th  class="bx-2 bg-gray"scope="col"><?php echo $date2;?></th>
                                  <th  class="bx-2 bg-gray"scope="col"><?php echo $date3;?></th>
                                  <th  class="bx-2 bg-gray"scope="col"><?php echo $date4;?></th>
                                  <th  class="bx-2 bg-gray"scope="col"><?php echo $date5;?></th>
                                  <th  class="bx-2 bg-gray"scope="col"><?php echo $date6;?></th>                                                       
                                </tr>
                                </thead>
                                <?php $i = 0;?>
                                <tbody>
                                  <?php
                                    $list = array_filter($forecast);
                                    if (!empty($list)) {              
                                      foreach ($list as $list_rm ){ ?>
                                        <tr>
                                          <th><center>
                                            <?php
                                              $i = $i+1;
                                              echo $i;
                                            ?>
                                          </th></center>
                                          <th><?php echo $list_rm['ITEM_CD'];?></th>
                                          <th><?php echo $list_rm['ITEM_NAME'];?></th>
                                          <th><?php echo $list_rm['MODEL'];?></th>
                                          <th><?php echo $list_rm['MONTH1'];?></th>
                                          <th><?php echo $list_rm['MONTH2'];?></th>
                                          <th><?php echo $list_rm['MONTH3'];?></th>
                                          <th><?php echo $list_rm['MONTH4'];?></th>
                                          <th><?php echo $list_rm['MONTH5'];?></th>
                                          <th><?php echo $list_rm['MONTH6'];?></th>
                                        </tr>
                                    <?php } } else { ?>    
                                      <tr>
                                        <td class="bg-pale-brown" colspan="10" scope="col">
                                         <center> ----- NO FORECAST DATA IN PERIOD 6 MONTHS ----- </center>
                                        </td>              
                                      </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                <?php } ?>
          </div>
        </div> 
      </div>
    </section>
  </div>

  <!-- <script src="<?php echo base_url() ?>assets/content/fluctuation_table.js"></script>                           
  <script src="<?php echo base_url() ?>assets/content/fluctuation_data.js"></script> -->
  <script type="text/javascript">
    $(document).ready(function() { 
      $('#bn2').click(function() { 
         
          $.blockUI({ css: { 
              border: 'none', 
              padding: '15px', 
              backgroundColor: '#000', 
              '-webkit-border-radius': '10px', 
              '-moz-border-radius': '10px', 
              opacity: .5, 
              color: '#fff' 
          } });

          $.ajax({
          url     : 'http://192.168.161.102/report_access/Forecast/get_csv',
          type    : 'post',
          dataType: 'json',
          success : out_csv
          //error   : out_csv
         });
           
      }); 

    });

    function out_csv(result)
    {
        var str2 = '"'+"NO"+'",';
        var num = 0;
        var fname = 'forecast_rm.csv';

        console.log(result);
        console.log(result.length);
        if(result.length > 0)
        {

             $.each(result[0], function(key, value){
                str2 += '"' + key + '",';
              });

                str2 = str2.substring( 0 , str2.length - 1 ) + "\r\n";
          
           for(var p in result)
           { 
             str2 += '"' + (++num) + '",';
             $.each(result[p], function(key, value){
                str2 += '"' + value + '",';
              });

             str2 = str2.substring( 0 , str2.length - 1 ) + "\r\n";
           }
        str2 = str2.substring( 0 , str2.length - 2 );
        download(str2, fname, "text/csv");  
        setTimeout($.unblockUI, 1000); 
        }
        else
        {
          alert('No! data');
          setTimeout($.unblockUI, 2000);
        }
           
          $("#button2").attr("disabled", true);
    }

  </script>

 <!--  <script src="<?php echo base_url() ?>assets/vendor_components/chart.js-master/Chart.bundle.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor_components/chart.js-master/utils.js"></script> -->

  <!-- SoftMaterial admin for Chart purposes -->
  <!-- <script src="<?php echo base_url() ?>assets/js/pages/widget-charts2.js"></script> -->

  <!-- <script src="<?php echo base_url() ?>assets/js/pages/data-table.js"></script>
  <script src="<?php echo base_url() ?>assets/js/pages/project-table.js"></script> -->
  <!-- jQuery 3 -->
  <!-- <script src="<?php echo base_url() ?>assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script> -->
  
  <!-- popper -->
  <!-- <script src="<?php echo base_url() ?>assets/vendor_components/popper/dist/popper.min.js"></script> -->
  
  <!-- Bootstrap 4.1-->
  <!-- <script src="<?php echo base_url() ?>assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
  
  <!-- SlimScroll -->
  <!-- <script src="<?php echo base_url() ?>assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
  
  <!-- FastClick -->
  <!-- <script src="<?php echo base_url() ?>assets/vendor_components/fastclick/lib/fastclick.js"></script> -->
  
  <!-- SoftMaterial admin App -->
  <!-- <script src="<?php echo base_url() ?>js/template.js"></script> -->
  
  <!-- SoftMaterial admin for demo purposes -->
  <!-- <script src="<?php echo base_url() ?>js/demo.js"></script> -->
  
  <!-- This is data table -->
  <!-- <script src="<?php echo base_url() ?>assets/vendor_components/datatable/datatables.min.js"></script> -->

                                
 