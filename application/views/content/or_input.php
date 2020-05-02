  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fluctuation Order
      </h1>
    </section> 

    <section class="content">
      <div class="row">
      <!-- SELECT2 EXAMPLE -->
    <div class="col-12">
      <!-- SELECT2 EXAMPLE -->
      <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title">Source Data</h4>
        <ul class="box-controls pull-right">
          <li><a class="box-btn-close" href="#"></a></li>
          <li><a class="box-btn-slide" href="#"></a></li> 
        </ul>
      </div>

           

      <!-- /.box-header -->
      <form>
      <div class="box-body pb-0">
        <div class="row">

        <div class="col-md-3 col-12">
          <div class="form-group">
          <label>CUSTOMER CODE</label>
          <select class="form-control select2" style="width: 100%;" id="select1" name="select1">
            <option selected="selected">All</option>
            <?php 

                foreach ($cust as $key => $value) 
                {
                  echo '<option>'.$value['CUST_CD'].'</option>';

                  //exit;
                }

             ?>
          </select>
          </div>
          <!-- /.form-group -->
        </div>

        <div class="col-md-3 col-12">
          <div class="form-group">
          <label>PART CODE</label>
          <select class="form-control select2" style="width: 100%;" id="select2" name="select2">
            <option selected="selected">All</option>
            <?php 

                foreach ($item as $key => $value) 
                {
                  echo '<option>'.$value['ITEM_CD'].'</option>';
                }

             ?>            
          </select>
          </div>
          <!-- /.form-group -->
        </div>

        <div class="col-md-3 col-6">
              <div class="form-group">
                <label>Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation" id="date1" name="date1" >


                 </div>
                 
                <!-- /.input group -->
              </div>
        </div>
          <div class="col-md-3 col-6">
              <div class="form-group">
            <label></label>
                <div class="input-group">
                  <div class="clearfix">
                      <!-- <button  type="submit" class="btn btn-social btn btn-bitbucket pull-right mb-5" name="bu" value="1" ><i class="fa fa-search" ></i>Click for search</button> -->
                      <!-- <button  class="btn btn-social btn btn-bitbucket pull-right mb-5" data-original-title='search' ><i class="fa fa-search" ></i>Click for search</button> -->
                      <button type="button" class="btn btn-dark mb-5" id="button1" name="button1" value="b1"><i class="fa fa-search"></i>  search</button>
                      <!-- <iframe id="my_iframe" style="display:none;"></iframe> -->
                      

                      <!-- <input type="hidden" name="action" value=""  /> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</form>

      </div>
 </div> 
     <div class="col-12 col-lg-12" style="display: none;" id="chart_info">
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">View Chart</h4>
              <ul class="box-controls pull-right">
                <li><a class="box-btn-fullscreen" href="#"></a></li>

              <li><a class="box-btn-slide" href="#"></a></li> 
              </ul>                
            </div>
            <!-- /.box-header -->
       <div class="box-body">

        <div class="col-12">
          <div class="row">
            <div class="box-body text-center col-lg-12">
              <h4 id="kla">ITEM </h4>
<!--               <canvas id="canvas-1" height="100"></canvas> -->
              <canvas id="chart_9" height="100"></canvas>
            </div>
<!--             <div class="box-body text-center col-lg-6">
              <canvas id="canvas-1" height="100"></canvas>
              <canvas id="chart_9A" height="100"></canvas>
            </div> -->
          </div>
        </div>
       </div>
    </div>
  </div> 
    <div class="col-12">
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">View Data</h4>
              <ul class="box-controls pull-right">
                <li><a class="box-btn-fullscreen" href="#"></a></li>

              <li><a class="box-btn-slide" href="#"></a></li> 
              </ul>                
            </div>
            <!-- /.box-header -->
       <div class="box-body">
         <div class="clearfix">

          <button type="button" class="btn btn-success mb-5" id="button2" name="button2" value="b2" disabled  > <i class="fa fa-file-excel-o" ></i>   CSV</button>

<!--               <div class="progress">
                <div class="progress-bar progress-bar-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                  <span class="sr-only"> 45% Complete (warning) </span>
                </div>
              </div> -->


         </div>



        <div class="table-responsive">
          <table class="table table-striped mb-0" id="table1" >
            <thead class="thead-light">
            <tr>
              <th  class="bx-2 bg-gray"scope="col">#</th>
              <th  class="bx-2 bg-gray"scope="col">DATE COLLECT</th>
              <th  class="bx-2 bg-gray"scope="col">CUST CD</th>
              <th  class="bx-2 bg-gray"scope="col">CUST NAME</th>
              <th  class="bx-2 bg-gray"scope="col">CUST ITEM CD</th>
              <th  class="bx-2 bg-gray"scope="col">ITEM CD</th>
              <th  class="bx-2 bg-gray"scope="col">MODEL</th>
              <th  class="bx-2 bg-gray"scope="col">Po.</th>
              <th  class="bx-2 bg-gray"scope="col">DELIVERY DATE</th>
              <th  class="bx-2 bg-gray"scope="col">Qty</th>                                                       
            </tr>
            </thead>
            <tbody>
            <tr>
              <td class="bg-pale-brown" colspan="10" scope="col">
               <center> ----- NO DATA AS YOU ARE SELECT THAT PERIOD TIME ----- </center>
              </td>              
<!--               <th scope="row" >1</th>
              <td class="bx-2">Mark</td>
              <td class="bx-2">Otto</td>
              <td class="bx-2">@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td class="bx-2">Jacob</td>
              <td class="bx-2">Thornton</td>
              <td class="bx-2">@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td class="bx-2">Larry</td>
              <td class="bx-2">the Bird</td>
              <td class="bx-2">@twitter</td> -->
            </tr>
            </tbody>
          </table>
        </div>



      </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>




  </div>
    </section>
  </div>


<!--   <script type="text/javascript"> alert( $('#select1').val() ); </script> -->

    <!-- /.content --> 
  <script src="<?php echo base_url() ?>assets/content/fluctuation_table.js"></script>                           
  <script src="<?php echo base_url() ?>assets/content/fluctuation_data.js"></script>

  <script src="<?php echo base_url() ?>assets/vendor_components/chart.js-master/Chart.bundle.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor_components/chart.js-master/utils.js"></script>

  <!-- SoftMaterial admin for Chart purposes -->
  <script src="<?php echo base_url() ?>assets/js/pages/widget-charts2.js"></script>

                                
 