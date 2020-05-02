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

        <div class="col-md-6 col-12">
          <div class="form-group">
          <label>CUSTOMER NAME</label>
          <select class="form-control select2" style="width: 100%;" id="select-cust1" name="cust_Name">
            <option selected="selected">All</option>
          </select>
          </div>
          <!-- /.form-group -->
        </div>

        <div class="col-md-2 col-12">
          <div class="form-group">
          <label>CUSTOMER ANAME</label>
          <select class="form-control select2" style="width: 100%;" id="select-cust2" name="cust_Aname">
            <option selected="selected">All</option>           
          </select>
          </div>
          <!-- /.form-group -->
        </div>

        <div class="col-md-2 col-6">
              <div class="form-group">
                <label>Date Delivery:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker_picking" value="<?php echo date('Y/m/d'); ?>" name="date1" >


                 </div>
                 
                <!-- /.input group -->
              </div>
        </div>
          <div class="col-md-1 col-6">
              <div class="form-group">
            <label></label>
                <div class="input-group">
                  <div class="clearfix">
                      <!-- <button  type="submit" class="btn btn-social btn btn-bitbucket pull-right mb-5" name="bu" value="1" ><i class="fa fa-search" ></i>Click for search</button> -->
                      <!-- <button  class="btn btn-social btn btn-bitbucket pull-right mb-5" data-original-title='search' ><i class="fa fa-search" ></i>Click for search</button> -->
                      <button type="button" class="btn btn-dark mb-5" id="picking_button1" name="picking_button1" value="b1"><i class="fa fa-search"></i>  search</button>
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




    <div class="col-12">
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Sheets Download</h4>
            </div>
            <!-- /.box-header -->
     <div class="box-body" id="table_picking">
        <div class="table-responsive-sm">
          <table class="table mb-0" >
          <thead style="font-size: 11px; ">
            <tr>
            <center></center>       
               
            </tr>
          </thead >
          <tbody>
            <tr>
              <td class="bg-pale-brown" colspan="10" scope="col">
               <center> ----- NO DATA AS YOU ARE SELECT THAT PERIOD TIME ----- </center>
              </td> 
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>




  </div>
    </section>
  </div>



<script type="text/javascript">
  
$(document).ready(function() {
  $(function(){
      //console.log($('#datepicker_picking').val());
       $.ajax({
        url     : 'http://192.168.161.102/report_access/Api_tool/api_picking_custName',
        type    : 'post',
        dataType: 'json',
        data    : "sal=" + $('#datepicker_picking').val(),
        success : function(picking_result){

                            for(pk in picking_result){  
                            $("#select-cust1").append('<option value="'+picking_result[pk]['CUST_NAME']+'" >'+picking_result[pk]['CUST_NAME']+'</option>');              
                            }
                      console.log(picking_result);
                    }
        //error  : console.log($('#datepicker_picking').val())
        
       });

       $.ajax({
        url     : 'http://192.168.161.102/report_access/Api_tool/api_picking_custAname',
        type    : 'post',
        dataType: 'json',
        data    : "sal=" + $('#datepicker_picking').val(),
        success : function(picking_result_1){

                            for(pk1 in picking_result_1){  
                            $("#select-cust2").append('<option value="'+picking_result_1[pk1]['CUST_ANAME']+'" >'+picking_result_1[pk1]['CUST_ANAME']+'</option>');              
                            }
                      console.log(picking_result_1);
                    }
        //error  : console.log($('#datepicker_picking').val())
        
       });






    $('#picking_button1').click(function() { 
       
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
        url     : 'http://192.168.161.102/report_access/Api_tool/api_picking_listDownload',
        type    : 'post',
        dataType: 'json',
        data    : "sal=" + $('#datepicker_picking').val(),
        success : function(picking_result_2){
                var table_pk = '';
                var indx  = 1;
                var tmp;
                var str_link;
                if(picking_result_2.length > 0) {
                tmp = picking_result_2[0]['CUST_NAME'];
                    table_pk +=   '       <div class="table-responsive-sm">                                                     '
                                + '         <table class="table mb-0" >                                                         '
                                + '         <thead>                                                                             '
                                + '           <tr>                                                                              '
                                + '           <th scope="col" colspan="2" align="left" width="50%" >'+ picking_result_2[0]['CUST_NAME'] +'</th>'
                                + '           </tr>                                                                             '
                                + '         </thead>                                                                            '
                                + '         </thead>                                                                            '
                                + '         <tbody>                                                                             ';                                                
                    for(pk2 in picking_result_2){  
                     
                        if( tmp != picking_result_2[pk2]['CUST_NAME']){
                        table_pk       +=   '         </tbody>                                                                            '
                                          + '         </table>                                                                            '
                                          + '       </div>                                                                                '
                                          + '       <div class="table-responsive-sm">                                                     '
                                          + '         <table class="table mb-0" >                                                         '
                                          + '         <thead>                                                                             '
                                          + '           <tr>                                                                              '
                                          + '           <th scope="col" colspan="2" align="left" width="50%">'+ picking_result_2[pk2]['CUST_NAME'] +'</th>'
                                          + '           </tr>                                                                             '
                                          + '         </thead>                                                                            '
                                          + '         <tbody>                                                                             ';
                                          indx  = 1;
                                          tmp = picking_result_2[pk2]['CUST_NAME'];
                        }
                        str_link = $('#datepicker_picking').val().replace("/", "-").replace("/", "-");
                        table_pk +=   '           <tr>                                                                              '
                                    + '           <td  align="left" width="50%" >'+ picking_result_2[pk2]['CUST_ANAME'] +'</td>     '
                                    + '           <td  align="left" width="50%" ><a href="'+"http://192.168.161.102/excel_gen/picking/pk/"+str_link+"--"+picking_result_2[pk2]['CUST_ANAME']+'" class="btn btn-primary mb-5"><i class="fa fa-download"></i> Download</a></td>'
                                    + '           </tr>                                                                             ';
 //fa-check-circle
                    }

                            console.log( "http://192.168.161.102/excel_gen/picking/pk/"+'"'+$('#datepicker_picking').val().replace("/", "-")+" "+picking_result_2[pk2]['CUST_ANAME']+'"' );

                            $( "#table_picking" ).html( table_pk );

                            setTimeout($.unblockUI, 1000);
                    }else{
                            console.log(table_pk);

                            $( "#table_picking" ).html( ''         
                                                       +'    <div class="table-responsive-sm">                                                  '
                                                       +'        <table class="table mb-0" >                                                    '
                                                       +'        <thead>                                                                        '
                                                       +'          <tr>                                                                         '
                                                       +'          <th scope="col">#</th>                                                       '
                                                       +'          <th  colspan="10" scope="col"></th>                                          '
                                                       +'                                                                                       '
                                                       +'          </tr>                                                                        '
                                                       +'        </thead>                                                                       '
                                                       +'        <tbody>                                                                        '
                                                       +'          <tr>                                                                         '
                                                       +'            <td class="bg-pale-brown" colspan="10" scope="col">                        '
                                                       +'             <center> ----- NO DATA AS YOU ARE SELECT THAT PERIOD TIME ----- </center> '
                                                       +'            </td>                                                                      '
                                                       +'          </tr>                                                                        '
                                                       +'        </tbody>                                                                       '
                                                       +'        </table>                                                                       '
                                                       +'      </div>                                                                           '
                        );

                            setTimeout($.unblockUI, 1000);





                    }
              }


        //error  : console.log($('#datepicker_picking').val())
        
       });
         
    }); 




    });
  });










</script>
    <!-- /.content -->                           
<!--   <script src="<?php echo base_url() ?>assets/content/fluctuation_data.js"></script>
  <script src="<?php echo base_url() ?>assets/content/fluctuation_table.js"></script>
 -->

                                
 