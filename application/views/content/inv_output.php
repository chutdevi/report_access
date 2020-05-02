  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inventory
      </h1>
    </section> 

    <section class="content">
      <div class="row">
      <!-- SELECT2 EXAMPLE -->
    <div class="col-12">
      <!-- SELECT2 EXAMPLE -->
      <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title">Export file</h4>
        <ul class="box-controls pull-right">
          <li><a class="box-btn-close" href="#"></a></li>
          <li><a class="box-btn-slide" href="#"></a></li> 
        </ul>
      </div>

           

      <!-- /.box-header -->

      <div class="box-body pb-0">
        <div class="row">

           <div class="col-md-6 col-lg-12">
            <div class="box">
				<div class="box-header with-border">
              		<h5 class="box-title">Download Files</h5>

				</div>
				<div class="box-body p-0">
				  <div class="media-list media-list-divided">
					<div class="media media-single">
					  <span class="font-size-24 text-success"><i class="fa fa-file-text"></i></span>
					  <span class="title">Minus Inventory Reset Data Create</span>
					  <a class="font-size-18 text-gray hover-info" href="#" data-toggle="modal" data-target="#modal-default" ><i class="fa fa-download"></i></a>
					</div>

					<div class="media media-single">
					  <span class="font-size-24 text-primary"><i class="fa fa-file-text"></i></span>
					  <span class="title">Export Warehouse Master CSV</span>
					  <a class="font-size-18 text-gray hover-info" href="#" id="wh" data-toggle="modal" data-target="#modal-default-2"><i class="fa fa-download"></i></a>
					</div>

					<div class="media media-single">
					  <span class="font-size-24 text-warning"><i class="fa fa-file-text"></i></span>
					  <span class="title">Export Plant Item Master CSV</span>
					  <a class="font-size-18 text-gray hover-info" href="#" id="tm" data-toggle="modal" data-target="#modal-default-2"><i class="fa fa-download"></i></a>
					</div>

					<div class="media media-single">
					  <span class="font-size-24 text-danger"><i class="fa fa-file-text"></i></span>
					  <span class="title">Create Diff List CSV</span>
					  <a class="font-size-18 text-gray hover-info" href="#" data-toggle="modal" data-target="#modal-default-1" ><i class="fa fa-download"></i></a>
					</div>


				  </div>
			  </div>
            </div>
          </div>




      </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>




  </div>
    </section>
  </div>
					  <div class="modal fade" id="modal-default">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h4 class="modal-title">Minus Inventory Download</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span></button>
							  </div>
							  <div class="modal-body">
								<!-- <p>One fine body&hellip;</p> -->

									<div class="col-md-6 col-lg-12" id="in_data">
										<div class="form-group">
											<h5>Inventry Date <span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="date" name="date" class="form-control" id="date_inv" required data-validation-required-message="This field is required" value="<?php echo date('Y-m-d'); ?>">  </div>
											<div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>

										</div>
										<div class="form-group">
											<h5>Plant <span class="text-danger">*</span></h5>
											<div class="controls">
												<select name="select_ty" id="select_ty" required class="form-control">
													<!-- <option value="">Select Plant Code</option> -->
													<option value="51">51</option>
													<option value="52">52</option>
												</select>
											</div>
										</div>
									</div>		

									<div class="col-md-6 col-lg-12" id="in_dowload" style="display: none;">
              							<div class="progress">
								                <div class="progress-bar progress-bar-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="myBar">
								                  <span class="sr-only">100% Complete (warning)</span>
								                </div>

								        </div>
								     							<h4 style="text-align:center;" id="text_bar">0<span class="text-danger">%</span></h4>  
									</div>	
  		

							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" id="min_can" data-dismiss="modal" >Close</button>
								<button type="button" class="btn btn btn-cyan mb-5 float-right" id="min_lod"><i class="fa fa-download"></i> Download</button>
							  </div>
							</div>
							<!-- /.modal-content -->
						  </div>
						  <!-- /.modal-dialog -->
					  </div>
					  <!-- /.modal -->

					  <div class="modal fade" id="modal-default-1">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h4 class="modal-title">Diff Inventory Download</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span></button>
							  </div>
							  <div class="modal-body">
								<!-- <p>One fine body&hellip;</p> -->

									<div class="col-md-6 col-lg-12" id="in_data1">
										<div class="form-group">
											<h5>Inventry Date <span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="date" name="date" class="form-control" id="date_inv1" required data-validation-required-message="This field is required" value="<?php echo date ( 'Y-m-d', strtotime("- 1 day", strtotime(date('Y-m-t', strtotime("- 1 month", strtotime(date('01-m-Y') ) ) ) ) ) ) ; ?>">  </div>
											<div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>

										</div>
										<div class="form-group">
											<h5>Plant <span class="text-danger">*</span></h5>
											<div class="controls">
												<select name="select_ty" id="select_ty1" required class="form-control">
													<!-- <option value="">Select Plant Code</option> -->
													<option value="51">51</option>
													<option value="52">52</option>
												</select>
											</div>
										</div>
									</div>		

									<div class="col-md-6 col-lg-12" id="in_dowload1" style="display: none;">
              							<div class="progress">
								                <div class="progress-bar progress-bar-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="myBar1">
								                  <span class="sr-only">100% Complete (warning)</span>
								                </div>

								        </div>
								     			<h4 style="text-align:center;" id="text_bar1">0<span class="text-danger">%</span></h4>  
									</div>	
  		

							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" id="min_can1" data-dismiss="modal" >Close</button>
								<button type="button" class="btn btn btn-cyan mb-5 float-right" id="min_lod1"><i class="fa fa-download"></i> Download</button>
							  </div>
							</div>
							<!-- /.modal-content -->
						  </div>
						  <!-- /.modal-dialog -->
					  </div>

					  <div class="modal fade" id="modal-default-2">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h4 class="modal-title">Diff Inventory Download</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span></button>
							  </div>
							  <div class="modal-body">
								<!-- <p>One fine body&hellip;</p> -->

									<div class="col-md-6 col-lg-12" id="in_dowload1">
              							<div class="progress">
								                <div class="progress-bar progress-bar-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="myBar2">
								                  <span class="sr-only">100% Complete (warning)</span>
								                </div>

								        </div>
								     			<h4 style="text-align:center;" id="text_bar2">0<span class="text-danger">%</span></h4>  
									</div>	
  		

							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" id="min_can2" data-dismiss="modal" >Close</button>
								<!-- <button type="button" class="btn btn btn-cyan mb-5 float-right" id="min_lod1"><i class="fa fa-download"></i> Download</button> -->
							  </div>
							</div>
							<!-- /.modal-content -->
						  </div>
						  <!-- /.modal-dialog -->
					  </div>					  
					  <!-- /.modal -->
    <!-- /.content -->                           


<script type="text/javascript">
	

$( document ).ready(function() {



	document.getElementById("min_lod").onclick = function() { 

	var gob =  { sal : $('#select_ty').val(),  date_inv : $('#date_inv').val() };



	 document.getElementById("myBar").style.width = 0 + '%';	
	 $("#in_data").hide(1000); $("#in_dowload").show(1000);  document.getElementById("min_lod").disabled=true; 


		      console.log( gob );
		       $.ajax({
		        url     : 'http://192.168.161.102/report_access/Apps/minus_inv',
		        type    : 'post',
		        dataType: 'json',
		        data    : gob,
		        success : function(data1){ 

		        				console.log(data1);
							    var str2 = '';
							    var num = 0;
							    var pro_num = 0;
							    var fname = 'Inv_minus'+ $('#select_ty').val() +'.csv';
							    if(data1.length > 0)
							    {

							         $.each(data1[0], function(key, value){
							            str2 +=  '"' + key + '"' + ',';
							          });

							            str2 = str2.substring( 0 , str2.length - 1 ) + "\r\n";
							      
							       for(var p in data1)
							       { 
							         //str2 += '"' + (++num) + '",';
							         $.each(data1[p], function(key, value){
							         	if(value === null)
							            str2 +=  ',';
							        	else str2 +=  value + ',';

							          });

							         str2 = str2.substring( 0 , str2.length - 1 ) + "\r\n";


							         setTimeout( move( Math.ceil(parseFloat( ( (++num)*100 )/ data1.length  )) ), 1000);  

							         console.log(num);
							    	}


							    


								    if(num >= data1.length) 
								    setTimeout( download(str2, fname, "text/csv"), 500);  
								    //clearInterval(id);
			        				console.log(data1);

		       					 }
		       					 else
		       					 {
		       					 	 str2 = '"WH_CD","ITEM_CD","NUM","LOT","QTY"';
									setTimeout( move( 100 ), 1000);
								    setTimeout( download(str2, fname, "text/csv"), 500);  
								    //setTimeout( $('#modal-default').modal('toggle') , 30000);
								    
								    //clearInterval(id);
			        				console.log(data1);


		       					 }
		        } 
		       });
}
	document.getElementById("min_can").onclick = function() { 


	 document.getElementById("myBar").style.width = 0 + '%';	
	 move(0);
	 document.getElementById("min_lod").disabled=false;
      $("#in_dowload").hide(1000); $("#in_data").show(1000);

	};




	document.getElementById("min_lod1").onclick = function() { 

	var gob =  { sal : $('#select_ty1').val(),  date_inv : $('#date_inv1').val() };



	 document.getElementById("myBar1").style.width = 0 + '%';	
	 $("#in_data1").hide(1000); $("#in_dowload1").show(1000);  document.getElementById("min_lod1").disabled=true; 


		      //console.log( gob );
		       $.ajax({
		        url     : 'http://192.168.161.102/report_access/Apps/diff_inv',
		        type    : 'post',
		        dataType: 'json',
		        data    : gob,
		        success : function(data1){ 

							    var str2 = '';
							    var num = 0;
							    var pro_num = 0;
							    var fname = 'Inv_Diff'+ $('#select_ty1').val() +'.csv';
							    if(data1.length > 0)
							    {

							         $.each(data1[0], function(key, value){
							            str2 +=  '"'+key + '",';
							          });

							            str2 = str2.substring( 0 , str2.length - 1 ) + "\r\n";
							      
							       for(var p in data1)
							       { 
							         //str2 += '"' + (++num) + '",';
							         $.each(data1[p], function(key, value){
							         	if(value === null)
							            str2 +=  ',';
							        	else str2 +=  '"' + value + '",';

							          });
									 pro_num = Math.ceil(parseFloat( ( (++num)*100 )/ data1.length  ))
							         str2 = str2.substring( 0 , str2.length - 1 ) + "\r\n";
		
							         
							         //var idd = setInterval( upo, 1000);
							        // function upo(){

							        
							          document.getElementById("text_bar1").innerHTML = pro_num + '<span class="text-danger">%</span>';
							          document.getElementById("myBar1").style.width =  pro_num + '%';
									//  clearInterval(idd);
							//setTimeout(function() { },2200 );

							       // }
							         // move1( Math.ceil(parseFloat( ( (++num)*100 )/ data1.length  )) )

							         
							       //  console.log(num);
							        }

 									document.getElementById("text_bar1").innerHTML = 'Complete' + '<span class="font-size-24 text-success">   <i class="fa fa-check"></i></span>';
							    


							   // if(num >= data1.length) 
							    download(str2, fname, "text/csv") ;

							   
							    //clearInterval(id);
		        				

		       					 }


		       					 else
		       					 {
		       					 	str2 = '"Plant","Item_CD","Item_Name","InEx_typ","Source_CD","Source_Name","WH_CD","Location","Fbook-Stk","Act-Stk","Diff","Rate","Key_CD3"';
									setTimeout( move( 100 ), 1000);
								    setTimeout( download(str2, fname, "text/csv"), 500);  
								    setTimeout( $('#modal-default-1').modal('toggle') , 200);
			        				console.log(data1);


		       					 }		       					 
		        } 
		       });
}


	document.getElementById("min_can1").onclick = function() { 





	 document.getElementById("myBar1").style.width = 0 + '%';	
	 move1(0);
	 document.getElementById("min_lod1").disabled=false;
      $("#in_dowload1").hide(1000); $("#in_data1").show(1000);






	};
	document.getElementById("wh").onclick = function() { 

	//var gob =  { sal : $('#select_ty1').val(),  date_inv : $('#date_inv1').val() };


	 document.getElementById("text_bar2").innerHTML = 0 + '<span class="text-danger">%</span>'
	 document.getElementById("myBar2").style.width = 0 + '%';	
	 //$("#in_data1").hide(1000); $("#in_dowload1").show(1000);  document.getElementById("min_lod1").disabled=true; 


		      console.log("asdasdas" );
		       $.ajax({
		        url     : 'http://192.168.161.102/report_access/Apps/wh_inv',
		        type    : 'post',
		        dataType: 'json',
		        //data    : gob,
		        success : function(data1){ 
								console.log(data1);
							    var str2 = '';
							    var num = 0;
							    var pro_num = 0;
							    var fname = 'Inv_Warehouse_Master'+'.csv';
							    if(data1.length > 0)
							    {

							         $.each(data1[0], function(key, value){
							            str2 +=  '"'+key + '",';
							          });

							            str2 = str2.substring( 0 , str2.length - 1 ) + "\r\n";
							      
							       for(var p in data1)
							       { 
							         //str2 += '"' + (++num) + '",';
							         $.each(data1[p], function(key, value){
							         	if(value === null)
							            str2 +=  ',';
							        	else str2 +=  '"' + value + '",';

							          });
									 //pro_num = Math.ceil(parseFloat( ( (++num)*100 )/ data1.length  ))
							         str2 = str2.substring( 0 , str2.length - 1 ) + "\r\n";
		
							         
							         //var idd = setInterval( upo, 1000);
							        // function upo(){

							        
							          //document.getElementById("text_bar2").innerHTML = pro_num + '<span class="text-danger">%</span>';
							          //document.getElementById("myBar2").style.width =  pro_num + '%';
									//  clearInterval(idd);
							//setTimeout(function() { },2200 );

							       // }
							        // move2( Math.ceil(parseFloat( ( (++num)*100 )/ data1.length  )) )
							        setTimeout( move2( Math.ceil(parseFloat( ( (++num) * 100 )/ ( data1.length)  ) ) ), 500);  
							         //console.log(num);
							         
							       //  console.log(num);
							        }

 									//document.getElementById("text_bar1").innerHTML = 'Complete' + '<span class="font-size-24 text-success">   <i class="fa fa-check"></i></span>';
							    


							    if(num >= data1.length) 
							    download(str2, fname, "text/csv") ;

							   
							    //clearInterval(id);
		        				

		       					 }


		       					 else
		       					 {
		       					 	str2 = '"PLANT_CD","WH_CD","KEY_CD"';
									setTimeout( move1( 100 ), 1000);
								    setTimeout( download(str2, fname, "text/csv"), 500);  
								    //setTimeout( $('#modal-default-1').modal('toggle') , 200);
			        				console.log(data1);


		       					 }		       					 
		        } 
		       });
}

	document.getElementById("tm").onclick = function() { 

	//var gob =  { sal : $('#select_ty1').val(),  date_inv : $('#date_inv1').val() };



	 document.getElementById("text_bar2").innerHTML = 0 + '<span class="text-danger">%</span>'
	 document.getElementById("myBar2").style.width = 0 + '%';
	 //$("#in_data1").hide(1000); $("#in_dowload1").show(1000);  document.getElementById("min_lod1").disabled=true; 


		      //console.log("asdasdas" );
		       $.ajax({
		        url     : 'http://192.168.161.102/report_access/Apps/itm_inv',
		        type    : 'post',
		        dataType: 'json',
		        //data    : gob,
		        success : function(data1){ 
								console.log(data1);
							    var str2 = '';
							    var num = 0;
							    var pro_num = 0;
							    var fname = 'Inv_PlantItem_Master'+'.csv';
							    if(data1.length > 0)
							    {

							         $.each(data1[0], function(key, value){
							            str2 +=  '"'+key + '",';
							          });

							            str2 = str2.substring( 0 , str2.length - 1 ) + "\r\n";
							      
							       for(var p in data1)
							       { 
							         //str2 += '"' + (++num) + '",';
							         $.each(data1[p], function(key, value){
							         	if(value === null)
							            str2 +=  ',';
							        	else str2 +=  '"' + value + '",';

							          });
									// pro_num = Math.ceil(parseFloat( ( (++num)*100 )/ data1.length  ))
							         str2 = str2.substring( 0 , str2.length - 1 ) + "\r\n";
		
							         
							         //var idd = setInterval( upo, 1000);
							        // function upo(){

							        
							        //  document.getElementById("text_bar2").innerHTML = pro_num + '<span class="text-danger">%</span>';
							        //  document.getElementById("myBar2").style.width =  pro_num + '%';
									//  clearInterval(idd);
							//setTimeout(function() { },2200 );

							       // }
							        // move2( Math.ceil(parseFloat( ( (++num)*100 )/ data1.length  )) )
							         setTimeout( move2( Math.ceil(parseFloat( ( (++num) * 100 )/ ( data1.length)  ) ) ), 1000);  
							         //console.log(num);
							         
							       //  console.log(num);
							        }

 									//document.getElementById("text_bar1").innerHTML = 'Complete' + '<span class="font-size-24 text-success">   <i class="fa fa-check"></i></span>';
							    


							    if(num >= data1.length) 
							    download(str2, fname, "text/csv") ;

							   
							    //clearInterval(id);
		        				

		       					 }


		       					 else
		       					 {
		       					 	str2 = '"PLANT_CD","WH_CD","KEY_CD"';
									setTimeout( move1( 100 ), 1000);
								    setTimeout( download(str2, fname, "text/csv"), 500);  
								    //setTimeout( $('#modal-default-1').modal('toggle') , 200);
			        				console.log(data1);


		       					 }		       					 
		        } 
		       });
}
	document.getElementById("min_can2").onclick = function() { 





	 document.getElementById("myBar2").style.width = 0 + '%';	
	 //move1(0);
	 //document.getElementById("min_lod1").disabled=false;
	 document.getElementById("text_bar2").innerHTML = 0 + '<span class="text-danger">%</span>';
	 document.getElementById("myBar2").style.width =  0 + '%';
      $("#in_dowload1").hide(1000); $("#in_data1").show(1000);






	};
function move2(num_q) {
  var elem1 = document.getElementById("myBar2"); 
  var width = num_q;
  //var id = setInterval(frame, 10);
  //function frame() {

      document.getElementById("text_bar2").innerHTML = (width) + '<span class="text-danger">%</span>';
      //width++; 
       elem1.style.width = width + '%'; 
       console.log(width + '%');
       //clearInterval(id);
     //setTimeout(10);
 //}

  }


function move1(num_q) {
  var elem1 = document.getElementById("myBar1"); 
  var width = num_q;
  //var id = setInterval(frame, 10);
  //function frame() {

      document.getElementById("text_bar1").innerHTML = (width) + '<span class="text-danger">%</span>';
      //width++; 
       elem1.style.width = width + '%'; 
       console.log(width + '%');
       //clearInterval(id);
     //setTimeout(10);
 //}

  }


function move(num_q) {
  var elem = document.getElementById("myBar"); 
  var width = num_q;
  //var id = setInterval(frame, 10);
  //function frame() {

      document.getElementById("text_bar").innerHTML = (width) + '<span class="text-danger">%</span>';
      //width++; 
      elem.style.width = width + '%'; 
     //clearInterval(id);
  }
//

	
function move_temp(num_q) {
  var elem = document.getElementById("myBar"); 
  var width = num_q;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 101) {
      clearInterval(id);

      width = 0;

    } else {


      setTimeout( function(){document.getElementById("text_bar").innerHTML = (width) + '<span class="text-danger">%</span>'} ,10);
      width++; 
      elem.style.width = width + '%'; 
     
      
    }
  }
}


});

</script>
                                
 