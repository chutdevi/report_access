<link href="https://fonts.googleapis.com/css?family=Mitr&display=swap" rel="stylesheet">
        <div id="myNav" class="overlay" style="display:none;  " >
                <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
                <div class="overlay-content" style="text-align:center;">
                        <span><i class="fa fa-spinner fa-spin" style="font-size:180px; color:red;"></i></span>            
                </div>
        </div>


        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="<?php  echo base_url().'login/menu/'.$this->session->userdata('sessUsr') ?>">Home</a></li>
                <li class="active">Traceability</li>
            </ol>

            <h1>Traceability</h1>
            <div class="options">
                <div class="btn-toolbar">
                    <div class="btn-group hidden-xs">
                        <a href='#' class="btn btn-default dropdown-toggle" data-toggle='dropdown'><i class="fa fa-cloud-download"></i><span class="hidden-sm"> Export as </span><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:;" id="csv">CSV   File (*.csv )</a></li>
                            <li><a href="javascript:;" id="excel">Excel File (*.xlsx)</a></li>
                            <!-- <li style="pointer-events: none; display: inline-block; color:#d0c8c8;"><a disabled="true" href="#" id="excel">Excel File (*.xlsx)</a></li> -->
                        </ul>
                    </div>
                    <!-- <a href="#" class="btn btn-default"><i class="fa fa-cog"></i></a> -->
                </div>
            </div>
        </div>
<div>
    <div id='wrap'>
        <div class="container">

        <div class="panel panel-midnightblue">
            <div class="panel-heading">
                <h4>Search option</h4>
                <div class="options">
                    <a href="javascript:;" id="back-to-bottom"><i class="fa fa-arrow-down"></i></a>   
 <!--                    <a href="javascript:;"><i class="fa fa-cog"></i></a>
                    <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                    <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a> -->
                </div>
            </div>
            <div class="panel-body collapse in">
            <div class="form-group col-sm-12" >
                <label class="col-sm-1 control-label" id="la-search" style="margin-top: 6px;">Wi number.</label>

                <div class="col-sm-4" id="sea-1">
                 
                    <select id="e3" style="width:100%" class="populate" >
                        <option value="none">Please select work instruction number.</option>
                       <?php 

                            foreach ($wi as $key => $value) 
                            {
                                echo (

                                     '<option value="' . $value['WI'] . '">' . $value['WI'] .  '</option>'

                                     );
                            }
                        ?>     
                    </select>
                                      
                    <!-- <p class="help-block">Supports a minimum input setting which is useful for large remote datasets where short search terms are not very useful</p> -->
                </div>
<!--                 <div class="col-sm-4" id="sea-2" hidden="true">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" id="daterangepicker1" value="<?php //echo date('Y/m/d') . ' - ' . date('Y/m/d'); ?>">
                            <div class="input-group-btn"><button id="bt-sea" class="btn btn-default"><i class="fa fa-search"></i></button></div>
                        </div>   
                </div> -->
                <div class="col-sm-4" id="sea-3" hidden="true">
                    <!-- <div class="col-sm-6"> -->
                            <select id="e1" style="width:40%; float: left;" class="populate">
                                <option value="none">Please select pd.</option>
                                <option value="K1PD01">K1PD01</option>
                                <option value="K1PD02">K1PD02</option>
                                <option value="K1PD03">K1PD03</option>
                                <option value="K1PD04">K1PD04</option>
                                <option value="K1PD05">K1PD05</option>
                                <option value="K2PD06">K2PD06</option>
                                <option value="K1PL00">K1PL00</option>
                            </select>
                    <!-- </div> -->
                    <!-- <div class="col-sm-6"> -->
                            <select id="e3r" style="width:50%; float: right;" class="populate" >
                                <option value="none">Please select line.</option>
                            </select>
                    <!-- </div>                            -->
                </div>                              
                    <!-- <p class="help-block">Supports a minimum input setting which is useful for large remote datasets where short search terms are not very useful</p> -->
                                            
                <div class="col-sm-7">
                    <a id="bt-wi" class="btn btn-primary" disabled="true"><i class="fa fa-search"></i> Wi number</a>
                    <!-- <a id="bt-it" class="btn btn-success"><i class="fa fa-search"></i> Item number</a> -->
                    <!-- <a id="bt-pd" class="btn btn-warning"><i class="fa fa-search"></i> Prod. Date </a> -->
                    <a id="bt-ln" class="btn btn-magenta"><i class="fa fa-search"></i> Line & Item </a>
                    <!-- <a id="bt-al" class="btn btn-brown"  ><i class="fa fa-search"></i> All (not recommended) </a> -->
                </div>
                
            </div> 
           <div class="form-group col-sm-12" id="supp-sea" hidden="true">
             <label class="col-sm-1 control-label" style="margin-top: 6px;">Item Prod.</label>
                <div class="col-sm-4">
                                   
     
                            <select id="e1p" style="width:100%; float: left;" class="populate" disabled="true">
                                <option value="none">Please select Production item.</option>
                            </select>
                            <!-- <button class="btn btn-inverse btn-label" style="float: right;"><i class="fa fa-search"></i> Search</button> -->
                            <!-- <div class="input-group-btn"><button id="bt-sea" class="btn btn-default"><i class="fa fa-search"></i></button></div> -->
                                     
                    <!-- <p class="help-block">Supports a minimum input setting which is useful for large remote datasets where short search terms are not very useful</p> -->
                </div>
                <div class="col-sm-7" style="margin-top: 7px;">
                    <label class="checkbox-inline">
                      <input type="checkbox" id="in1" value="option1" disabled="true"> Enable search item production.
                    </label>                                    
                </div>                
           </div>
           <div class="form-group col-sm-12" id="sect-sea" hidden="true">
             <label class="col-sm-1 control-label" style="margin-top: 6px;">Item supply.</label>
                <div class="col-sm-4">
                            <select id="e1s" style="width:100%; float: left;" class="populate" disabled="true">
                                <option value="none">Please select Supply item.</option>
                            </select>
                </div>
                <div class="col-sm-7" style="margin-top: 7px;">
                    <label class="checkbox-inline">
                      <input type="checkbox" id="in2" value="option1" disabled="true"> Enable search item supply.
                    </label>                                    
                </div>
           </div>                       
           <div class="form-group col-sm-12" id="date-sea" hidden="true">
             <label class="col-sm-1 control-label" style="margin-top: 6px;">Prod date.</label>
                <div class="col-sm-4">
                                   
                  <div  class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" id="daterangepicker1" value="<?php echo date('Y/m/d') . ' - ' . date('Y/m/d'); ?>" style="width:60%">
                            <button class="btn btn-inverse btn-label" style="float: right;" id="bt-sea" disabled="true"><i class="fa fa-search"></i> Search</button>
                            <!-- <div class="input-group-btn"><button id="bt-sea" class="btn btn-default"><i class="fa fa-search"></i></button></div> -->
                  </div>                    
                    <!-- <p class="help-block">Supports a minimum input setting which is useful for large remote datasets where short search terms are not very useful</p> -->
                </div>
           </div>


            </div>
            </div>
         <div class="panel panel-midnightblue">
                    <div class="panel-heading">
                        <h4>View data</h4>
                        <div class="options">
                            
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- <p>For basic styling—light padding and only horizontal dividers—add the base class <code>.table</code> to any <code>&lt;table&gt;</code>.</p> -->
                        <div class="table-responsive">
                        <table class="table" id="test_tb">
                          <thead >
                            <tr style="text-align-last: center;">
                              <th style="width:6%; ">PD</th>
                              <th style="width:6%;">LINE CD</th>
                              <th style="width:8%;">ITEM CD</th>
                              <th style="width:14%;">MODEL</th>                              
                              <th style="width:6%;">Scan Qty</th>
                              <th style="width:8%;">WI CD</th>                              
                              <th style="width:6%;">Lot</th>
                              <th style="width:8%;">Location</th>
                              <th style="width:12%;">Scan Date</th>
                              <th style="width:6%;">Scan by</th>
                              <th style="width:8%;">Prod. item</th>
                              <th style="width:12%;">Prod. Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td colspan="12" style="background:#999; text-align: center; color:#FFF;">Data Empty.</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                    </div>
        </div>
           
        </div>


        </div>

        </div> 
         <!-- container -->
         
                <footer role="contentinfo"  style="margin-left: 0; position: fixed; left:0; right:0; bottom: 0;" >
                    <div class="clearfix">
                        <ul class="list-unstyled list-inline pull-left">
                            <li>AVANT &copy; 2015</li>
                        </ul>
                        <button class="pull-right btn btn-inverse-alt btn-xs hidden-print" id="back-to-top" ><i class="fa fa-arrow-up"></i></button>
                    </div>
                </footer> 


        <div class="modal" id="modal-detail">
          <div class="modal-dialog">
            <div class="modal-content" style="width: 250px; margin: auto;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Modal title</h4>
              </div>
              <div class="modal-body">
                <p>One fine body…</p>
              </div>
              <div class="modal-footer" style="padding: 2px;">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->






<script>

var data_ex;
var item_sea;

$(window).load( function(){


$('#bt-wi').click(function()
{

     $('#bt-wi').attr("disabled",true);
     $('#bt-it').attr("disabled",false);
     $('#bt-pd').attr("disabled",false);
     $('#bt-al').attr("disabled",false);
     $('#bt-ln').attr("disabled",false);

     $('#sea-1').attr("hidden", false);
     $('#sea-2').attr("hidden", true);
     $('#sea-3').attr("hidden", true);

      $('#date-sea').attr("hidden", true);
      $('#supp-sea').attr("hidden", true);
      $('#sect-sea').attr("hidden", true);
       on();
                $.ajax({
                url     : 'http://192.168.161.102/report_access/sep_pick/get_wi',
                type    : 'post',
                dataType: 'json',
                data    :  { "q" : ''  } ,
                success : function(it)
                            {
                                $('#la-search').html('Wi number.');
                                $('#sea-1 #e3').html('');
                                $('#sea-1 .select2-chosen').html('Please select work instruction number.');        
                                //console.log(it);
                                var str_option = '<option value="none">Please select work instruction number.</option>';
                                for(var i in it)
                                {
                                    str_option  += '<option value"' + it[i]['WI'] + '" >' + it[i]['WI'] + '</option>';
                                }

                                $('#sea-1 #e3').append(str_option);
                                off();
                            },
                error : function(it)
                    {
                        console.log(it);   
                    }
                });    

});
$('#bt-it').click(function()
{

     $('#bt-wi').attr("disabled",false);
     $('#bt-it').attr("disabled",true);
     $('#bt-pd').attr("disabled",false);
     $('#bt-al').attr("disabled",false);
     $('#bt-ln').attr("disabled",false);

     $('#sea-1').attr("hidden", false);
     $('#sea-2').attr("hidden", true);
     $('#sea-3').attr("hidden", true);

      on();
     //$('#select_menu option:selected').attr("value");



                $.ajax({
                url     : 'http://192.168.161.102/report_access/sep_pick/get_item',
                type    : 'post',
                dataType: 'json',
                data    :  { "q" : ''  } ,
                success : function(it)
                            {
                                $('#la-search').html('Item number.');
                                $('#sea-1 #e3').html('');
                                $('#sea-1 .select2-chosen').html('Please select item number.');        
                                //console.log(it);
                                var str_option = '<option value="none">Please select item number.</option>';
                                for(var i in it)
                                {
                                    str_option  += '<option value"' + it[i]['item_cd'] + '" >' + it[i]['item_cd'] + '</option>';
                                }

                                $('#sea-1 #e3').append(str_option);
                                off();
                            },
                error : function(it)
                    {
                        console.log(it);   
                    }
                });    



       
       //setTimeout(off, 2000);


});
$('#bt-pd').click(function()
{

     $('#bt-wi').attr("disabled",false);
     $('#bt-it').attr("disabled",false);
     $('#bt-pd').attr("disabled",true);
     $('#bt-al').attr("disabled",false);
     $('#bt-ln').attr("disabled",false);

     $('#sea-1').attr("hidden", true);
     $('#sea-2').attr("hidden", false);
     $('#sea-3').attr("hidden", true);
     $('#la-search').html('Prod. Date.');


});
$('#bt-ln').click(function()
{

     $('#bt-wi').attr("disabled",false);
     $('#bt-it').attr("disabled",false);
     $('#bt-pd').attr("disabled",false);
     $('#bt-al').attr("disabled",false);
     $('#bt-ln').attr("disabled",true);

     $('#sea-1').attr("hidden", true);
     $('#sea-2').attr("hidden", true);
     $('#sea-3').attr("hidden", false);

     $('#date-sea').attr("hidden", false);
     $('#supp-sea').attr("hidden", false);
     $('#sect-sea').attr("hidden", false);

     $('#la-search').html('Section.');
     $('#bt-sea').attr("disabled", true);
     $('#e1p').attr("disabled", true);
     $('#e1s').attr("disabled", true);
     $('#in1').attr("disabled", true);
     $('#in2').attr("disabled", true);

     $('#s2id_e1  .select2-chosen').html('Please select pd.');
     $('#s2id_e3r .select2-chosen').html('Please select line.');
     $('#s2id_e1p .select2-chosen').html('Please select Production item.');
     $('#s2id_e1s .select2-chosen').html('Please select Supply item.');

     $('#in1').prop('checked', false);
     $('#in2').prop('checked', false);


     $('#sea-3 #e3r').html('');
     $('#e1p').html('');
     $('#e1s').html('');


});


$('#in1').click(function(){


    if (this.checked) {
        $('#e1p').prop('disabled', false); // If checked enable item       
    } else {
        $('#e1p').prop('disabled', true); // If checked disable item                   
    }

});



$('#in2').click(function(){


    if (this.checked) {
        $('#e1s').prop('disabled', false); // If checked enable item       
    } else {
        $('#e1s').prop('disabled', true); // If checked disable item                   
    }

});






$('#csv').click(function()
{
    on();
    //console.log(JSON.parse(JSON.stringify(data_ex) ));
                $.ajax({
                url     : 'http://192.168.161.102/report_access/sep_pick/ajax_csv',
                type    : 'post',
                dataType: 'text',
                data    :   {"q" : JSON.stringify(data_ex) } ,
                success : function(it)
                            {
                                 //console.log(it);
                                 console.log('http://192.168.161.102/report_access/' + it);
                                 window.location.href = 'http://192.168.161.102/report_access/' +it;
                                 
                                 setTimeout( off(),100 );


                                // console.clear();
                                //$('#test_tb tbody').append(str_table);
                            },
                error : function(it)
                    {
                        console.log( it + 'error' );   
                    }
                });  
});

$('#excel').click(function()
{
    on();
    //console.log(JSON.parse(JSON.stringify(data_ex) ));
                $.ajax({
                url     : 'http://192.168.161.102/report_access/sep_pick/ajax_excel',
                type    : 'post',
                dataType: 'text',
                data    :   {"q" : JSON.stringify(data_ex), "tm" : item_sea } ,
                success : function(it)
                            {
                                 //console.log(it);
                                 //return false;
                                 console.log('http://192.168.161.102/report_access/' + it);
                                 window.location.href = 'http://192.168.161.102/report_access/' +it;
                                 
                                 setTimeout( off(),100 );


                                 //console.clear();
                                //$('#test_tb tbody').append(str_table);
                            },
                error : function(it)
                    {
                        console.log( it + 'error' ); 

                        $('#myNav span').html('Error');

                        //setTimeout( off(),1000 );  
                    }
                });  
});

$('#sea-1 #e3').change( function()
{

      on();
      var url_sea;
      item_sea = $('#e3 option:selected').val();
      if ( $('#la-search').html() == 'Wi number.' ) 
        url_sea = 'http://192.168.161.102/report_access/sep_pick/ajax_wi';
      else 
        url_sea = 'http://192.168.161.102/report_access/sep_pick/ajax_item';


                $.ajax({
                url     :  url_sea,
                type    : 'post',
                dataType: 'json',
                data    :  { "q" : $('#e3 option:selected').val()  } ,
                success : function(it)
                            {
                                data_ex = it;
                                
                                $('#test_tb tbody').html('');

                                
                                var str_table = '';
                                for(var i in it)
                                {

                   
                                        $('#test_tb tbody').append( '<tr>' + 
                                                                        '<td style="text-align: center;">' + it[i]['PD']        + '</td>' +
                                                                        '<td style="text-align: center;">' + it[i]['LINE_CD']   + '</td>' +
                                                                        '<td style="text-align: center;">' + it[i]['item_cd']   + '</td>' +
                                                                        '<td style="text-align: center;">' + it[i]['MODEL']     + '</td>' +  
                                                                        '<td style="text-align: right;">'  + it[i]['SCAN_QTY']  + '</td>' +                                                                                                                                     
                                                                        '<td style="text-align: center;">' + '<a class="awi" href="avascript:;">' + it[i]['WI']       + '</a>'  + '</td>' +                                                                    
                                                                        '<td style="text-align: center;">' + it[i]['SCAN_LOT']  + '</td>' +
                                                                        '<td style="text-align: center;">' + it[i]['LOCATION_PART']   + '</td>' +
                                                                        '<td style="text-align: center;">' + it[i]['UPDATE_DATE']     + '</td>' +
                                                                        '<td style="text-align: center;">' + '<a class="aus" href="avascript:;">' + it[i]['UPDATE_BY'] + '</a>' + '</td>' + 
                                                                        '<td style="text-align: center;">' + it[i]['PROD_ITEM']     + '</td>' +
                                                                        '<td style="text-align: center;">' + it[i]['WORK_ODR_DLV_DATE'] + '</td>' + 
                                                                    '</tr>'
                                                              );

                                }
                                 setTimeout( off(),100 );
                                //$('#test_tb tbody').append(str_table);

                                $('#test_tb tbody .aus').click( function(){ modal_us( $(this).text() ); });
                                $('#test_tb tbody .awi').click( function(){ modal_wi( $(this).text() ); });
                                },
                error : function(it)
                    {
                        console.log( it + 'error' );   
                    }
                });      

});



$('#bt-sea').click(function()
{

      //alert( $('#test_tb tbody tr:nth-child(even)').css( "background" ) );
      i

      on();
      var str_date = $('#daterangepicker1').val().split(" - ");
      var str_line = $('#e3r option:selected').val();

      var str_itmp = $('#e1p option:selected').val(); //Production Item
      var str_itms = $('#e1s option:selected').val(); //Supply Item
      item_sea = str_line;
      if( str_itmp == 'none'  ||  $('#in1').is(':checked') == false )  str_itmp = '';
      if( str_itms == 'none'  ||  $('#in2').is(':checked') == false )  str_itms = '';
      //console.log(str_line + '#' + str_itmp + '#' + str_itms);
                $.ajax({
                url     : 'http://192.168.161.102/report_access/sep_pick/ajax_adv',
                type    : 'post',
                dataType: 'json',
                data    :  { "ln" : str_line, "st" : str_date[0], "en" : str_date[1], "tp" : str_itmp, "ts" : str_itms  } ,
                success : function(it)
                            {
                                data_ex = it;

                                $('#test_tb tbody').html('');

                                //console.log(it);
                                //return false;
                                var str_table = '';
                                if ( it.length  > 0)
                                    for(var i in it)
                                        {
                                            
                                            $('#test_tb tbody').append( '<tr>' + 
                                                                                '<td style="text-align: center;">' + it[i]['PD']                + '</td>' +
                                                                                '<td style="text-align: center;">' + it[i]['LINE_CD']           + '</td>' +
                                                                                '<td style="text-align: center;">' + it[i]['item_cd']           + '</td>' +
                                                                                '<td style="text-align: center;">' + it[i]['MODEL']             + '</td>' +  
                                                                                '<td style="text-align: right;">'  + it[i]['SCAN_QTY']          + '</td>' +                                                                                                                                     
                                                                                '<td style="text-align: center;">' + '<a class="awi" href="avascript:;">' + it[i]['WI']       + '</a>'  + '</td>' +                                                                    
                                                                                '<td style="text-align: center;">' + it[i]['SCAN_LOT']          + '</td>' +
                                                                                '<td style="text-align: center;">' + it[i]['LOCATION_PART']     + '</td>' +
                                                                                '<td style="text-align: center;">' + it[i]['UPDATE_DATE']       + '</td>' +
                                                                                '<td style="text-align: center;">' + '<a class="aus" href="avascript:;">' + it[i]['UPDATE_BY'] + '</a>'  + '</td>' + 
                                                                                '<td style="text-align: center;">' + it[i]['PROD_ITEM']         + '</td>' +
                                                                                '<td style="text-align: center;">' + it[i]['WORK_ODR_DLV_DATE'] + '</td>' + 
                                                                        '</tr>'
                                                                      );                                            
                                        }
                                else
                                    {
                                        $('#test_tb tbody').append( '<tr> <td colspan="12" style="background:#999; text-align: center; color:#FFF;">Data Empty.</td> </tr>'  );

                                        console.log(it.length + " na");
                                    }
                                setTimeout( off(),100 );
                                //$('#test_tb tbody').append(str_table);

                                $('#test_tb tbody .aus').click( function(){ modal_us( $(this).text() ); });
                                $('#test_tb tbody .awi').click( function(){ modal_wi( $(this).text() ); });
                            },
                error : function(it)
                    {
                        console.log( it + 'error' );   
                        $('#myNav span').html('Error');
                        setTimeout( off(), 10000 );
                    }
                });   


});

function modal_us(val){

  $('#modal-detail').toggle();
  $('#modal-detail .modal-header h4').html('Employee Detail');
  $('#modal-detail .modal-content').css('width', '300px');
  $('#modal-detail .modal-dialog').css('width', '300px');
  
  $('#modal-detail .modal-body').html('');
  on();
                $.ajax({
                url     : 'http://192.168.161.102/report_access/sep_pick/img_mem',
                type    : 'post',
                dataType: 'json',
                data    :  { "img" : val  } ,
                success : function(im)
                            {
                              $('#modal-detail .modal-body').append(
                                              '<div>'+
                                              ' <div class="text-center" >'+
                                              '    <img src="http://192.168.161.102/report_access/assets/images/card/img_mem/'  + val + '.jpg"' + ' class="avatar rounded-circle mb-15" style="width:180px; height:200px " >'+
                                              '    <p style="font-family: Mitr, sans-serif;font-size: 14px;font-weight: 300;margin: 7px 0px 10px;">' + val + '</p>'+
                                              '    <p style="font-family: Mitr, sans-serif;font-size: 14px;font-weight: 300;margin: 7px 0px 10px;">' + im[0]['NameTH'] + '</p>'+
                                              '    <p style="font-family: Mitr, sans-serif;font-size: 14px;font-weight: 300;margin: 7px 0px 10px;">' + im[0]['DeptName'] + '</p>'+
                                              '</div>' +
                                              '</div>'
                                              );  
                              off();
                            },
                error : function(it)
                    {
                        console.log(it);   
                    }
                });     
}

function modal_wi(val){

  $('#modal-detail').toggle();
  $('#modal-detail .modal-header h4').html('Wi Detail');
  
  $('#modal-detail .modal-body').html('');
  $('#modal-detail .modal-content').css('width', '1200px');
  $('#modal-detail .modal-dialog').css('width', '1200px');
  on();
                $.ajax({
                url     : 'http://192.168.161.102/report_access/sep_pick/get_wi_detail',
                type    : 'post',
                dataType: 'json',
                data    :  { "wi" : val  } ,
                success : function(it)
                            {
                              
                                var num = 1;
                                var act = 0;
                                var pln = 0;
                              opt_srt = (
                                              '<div>'+
                                              ' <p>Data <code>Work instruction</code> references data from <code>Fa system</code></p>' +
                                              '    <table class="table table-bordered" id="table-wi">' +
                                              '    <thead  style="font-size: 11px;font-weight: 700; text-align-last:center; background-color: steelblue; color: white;">'+
                                              '      <tr>'+
                                              '        <th style="width:5%;"  >#</th>'          +
                                              '        <th style="width:5%;"   >LINE</th>'       +
                                              '        <th style="width:10%;" >PLAN DATE</th>'  +
                                              '        <th style="width:5%;"  >SEQ</th>'        +
                                              '        <th style="width:5%;"  >LOT</th>'        +
                                              '        <th style="width:10%;" >ITEM CD</th>'    +
                                              '        <th style="width:20%;" >ITEM NAME</th>'  +
                                              '        <th style="width:10%;" >PLAN QTY</th>'   +
                                              '        <th style="width:10%;" >ACTU QTY</th>'   +
                                              '        <th style="width:10%;" >START DATE</th>' +
                                              '        <th style="width:10%;" >END DATE</th>'   +
                                              '     </tr>' +
                                              '   </thead>'+
                                              '   <tbody style="font-size: 10px;font-weight: 600;>"' 
                                        );      

                                        //console.log(opt_srt);                        
                            for(var i in it)
                            {
                              num += parseInt(i);
                              pln += parseInt(it[i]['PROD_PLAN']);
                              act += parseInt(it[i]['PROD_ACTU']);
                             opt_srt += ( '<tr>' + 
                                            '<td style="text-align: center;">' + num                 + '</td>' +
                                            '<td style="text-align: center;">' + it[i]['LINE_CD']      + '</td>' +
                                            '<td style="text-align: center;">' + it[i]['PLAN_DATE']    + '</td>' +
                                            '<td style="text-align: center;">' + it[i]['PLAN_SEQ']     + '</td>' +
                                            '<td style="text-align: center;">' + it[i]['LOT_CD']     + '</td>' +  
                                            '<td style="text-align: center;">'  + it[i]['ITEM_CD']     + '</td>' +                                                                                                                                     
                                            '<td style="text-align: center;">' + it[i]['ITEM_NAME']    + '</td>' +                                                                    
                                            '<td style="text-align: center;">' + it[i]['PROD_PLAN']    + '</td>' +
                                            '<td style="text-align: center;">' + it[i]['PROD_ACTU']    + '</td>' +
                                            '<td style="text-align: center;">' + it[i]['DATE_ST']      + '</td>' +
                                            '<td style="text-align: center;">' + it[i]['DATE_EN']      + '</td>' +
                                          '</tr>'
                                        );                                
                            }
                             opt_srt += ( '<tr>' + 
                                            '<td colspan="7" style="background:#999; text-align: center; font-weight: 700; font-size:13px; color:#FFF;">' + 'Total' + '</td>' +
                                                                   
                                            '<td style="text-align: center;">' + pln + '</td>' +
                                            '<td style="text-align: center;">' + act + '</td>' +
                                          '</tr>'
                                        );


                             opt_srt += ( '</tbody>' + '</table>' + '</div>' );  


                              $('#modal-detail .modal-body').append(opt_srt);
                              off();
                            },
                error : function(it)
                    {
                        console.log(it);   
                    }
                });     
}

$('#sea-3 #e1').change( function()
{

      on();
      var str_pd = $('#e1 option:selected').val();

     $('#e1p').attr("disabled", true);
     $('#e1s').attr("disabled", true);
     $('#in1').attr("disabled", true);
     $('#in2').attr("disabled", true);

     $('#s2id_e3r .select2-chosen').html('Please select line.');
     $('#s2id_e1p .select2-chosen').html('Please select Production item.');
     $('#s2id_e1s .select2-chosen').html('Please select Supply item.');

     $('#in1').prop('checked', false);
     $('#in2').prop('checked', false);
     console.log(str_pd);

    //alert(  $('#e3 option:selected').val() );
                $.ajax({
                url     :  'http://192.168.161.102/report_access/sep_pick/get_line',
                type    : 'post',
                dataType: 'json',
                data    :  { "q" : str_pd  } ,
                success : function(it)
                            {


                                $('#sea-3 #e3r').html('');
                                $('#s2id_e3r .select2-chosen').html('Please select line.');        
                                //console.log(it);
                                var str_option = '<option value="none">Please select line.</option>';
                                for(var i in it)
                                {
                                    str_option  += '<option value"' + it[i]['LINE_CD'] + '" >' + it[i]['LINE_CD'] + '</option>';
                                }

                                $('#sea-3 #e3r').append(str_option);


                                $('#bt-sea').attr("disabled", false);
                                off();
                                //$('#test_tb tbody').append(str_table);
                            },
                error : function(it)
                    {
                        console.log( it + 'error' );   
                    }
                });    
});

$('#sea-3 #e3r').change( function()
{
    $('#in1').attr("disabled",false);
    $('#s2id_e1p .select2-chosen').html('Please select Production item.');
    $('#s2id_e1s .select2-chosen').html('Please select Supply item.');
    $('#in2').attr("disabled", true);
    $('#in2').prop('checked', false);
    $('#e1s').attr("disabled", true);
      on();
      var str_ln = $('#e3r option:selected').val();

                $.ajax({
                url     :  'http://192.168.161.102/report_access/sep_pick/get_line_proditem',
                type    : 'post',
                dataType: 'json',
                data    :  { "q" : str_ln  } ,
                success : function(it)
                            {

                                $('#e1p').html('');
                                $('#s2id_e1p .select2-chosen').html('Please select Production item.');        
                                //console.log(it);
                                var str_option = '<option value="none">Please select Production item.</option>';
                                for(var i in it)
                                {
                                    str_option  += '<option value"' + it[i]['PARENT_ITEM_CD'] + '" >' + it[i]['PARENT_ITEM_CD'] + '</option>';
                                }

                                $('#e1p').append(str_option);


                                $('#bt-sea').attr("disabled", false);
                                off();

                                //$('#test_tb tbody').append(str_table);
                            },
                error : function(it)
                    {
                        console.log( it + 'error' );   
                    }
                });


});

$('#e1p').change(function(){

    $('#in2').attr("disabled",false);
      on();
      var str_ip = $('#e1p option:selected').val();

                $.ajax({
                url     :  'http://192.168.161.102/report_access/sep_pick/get_line_suppitem',
                type    : 'post',
                dataType: 'json',
                data    :  { "q" : str_ip  } ,
                success : function(it)
                            {

                                $('#e1s').html('');
                                $('#s2id_e1s .select2-chosen').html('Please select Supply item.');        
                                //console.log(it);
                                var str_option = '<option value="none">Please select Production item.</option>';
                                for(var i in it)
                                {
                                    if ( str_ip != it[i]['ITEM_CD'] )
                                    str_option  += '<option value"' + it[i]['ITEM_CD'] + '" >' + it[i]['ITEM_CD'] + '</option>';
                                }

                                $('#e1s').append(str_option);

                                off();

                                //$('#test_tb tbody').append(str_table);
                            },
                error : function(it)
                    {
                        console.log( it + 'error' );   

                        $('#myNav span').html('Error');
                        setTimeout( off(),1000 );
                    }
                });




});

$('#modal-detail .modal-footer button').click(function(){


  $('#modal-detail').toggle();


});

});
function on() {
    document.getElementById("myNav").style.width     = "100%";
    document.getElementById("myNav").style.display   = "";

}

function off() {
    document.getElementById("myNav").style.width     = "0%";
    document.getElementById("myNav").style.display   = "none";

}
</script>