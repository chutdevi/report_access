  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customer Order Sheet
      </h1>
    </section> 

    <section class="content">
      <div class="row">
      <!-- SELECT2 EXAMPLE -->
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
            <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
          <table id="example5" class="table table-bordered table-striped" style="width:200%" >

          <thead >
            <tr>
              <th style="width: 5px; ">#</th>
              <th style="width: 50px;">CUST CD</th>
              <th style="width: 180px;">CUST ANAME</th>
              <th style="width: 100px;">ITEM CD</th>
              <th style="width: 100px;">PO.</th>
              <th style="width: 100px;">PO. PRICE</th>
              <th style="width: 100px;">SYS PRICE</th>
              <!-- <th>PRICE</th> -->
              <th style="width: 100px;">DELV. DATE</th>
              <th style="width: 100px;">SHIP. DATE</th>
              <th style="width: 100px;">UPDATE</th>
              <!-- <th>BY_ORDER_UPDATE</th> -->
              <th style="width: 180px;">USER NAME</th>
              <th style="width: 100px;">PRICE USE</th>
              <!-- <th>EFF_PHASE_OUT_DATE</th> -->
              <th style="width: 100px;">SALE UPDATE</th>
              <!-- <th>BY_SALE_UPDATE</th> -->
              <th style="width: 150px;">SALE NAME</th>

            </tr>
          </thead>
          
          <tbody>
            
      <?php
        $ind = 1; 
        foreach ($cmp as $r => $value) 
        {
          echo (
             '<tr>'
                    .  '<td>'   . $ind++                       .  '</td>'
                    .  '<td>'   . $value['CUST_CD']            .  '</td>'
                    .  '<td>'   . $value['CUST_ANAME']         .  '</td>'
                    .  '<td>'   . $value['ITEM_CD']            .  '</td>'
                    .  '<td>'   . $value['CUST_ODR_NO']        .  '</td>'
                    .  '<td>'   . $value['UNIT_PRICE']         .  '</td>'
                    .  '<td>'   . $value['SALES_UNIT_COST']    .  '</td>'                
                    .  '<td>'   . $value['DESINATED_DLV_DATE'] .  '</td>'
                    .  '<td>'   . $value['SHIP_PLAN_DATE']     .  '</td>'
                    .  '<td>'   . $value['DATE_ORDER_UPDATE']  .  '</td>'              
                    .  '<td>'   . $value['USER_NAME']          .  '</td>'
                    .  '<td>'   . $value['EFF_PHASE_IN_DATE']  .  '</td>'
                    .  '<td>'   . $value['DATE_SALE_UPDATE']   .  '</td>'
                    .  '<td>'   . $value['USER_NAME_SALE']     .  '</td>'
            .'</tr>'
               );
          }
      ?>
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>

            </tr>
          </tfoot>
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





  <!-- This is data table -->
  
  
  <!-- SoftMaterial admin for Data Table -->
  <script src="<?php echo base_url() ?>assets/js/pages/data-table.js"></script>
  <!-- <script src="<?php echo base_url() ?>assets/js/pages/project-table.js"></script> -->

    <!-- /.content -->                           
<!--   <script src="<?php echo base_url() ?>assets/content/fluctuation_data.js"></script>
  <script src="<?php echo base_url() ?>assets/content/fluctuation_table.js"></script>
 -->

                                
 