  $(document).ready(function() 
  
  {
  $(function()
  
  {
	  //sm_bnte = 0;
	  
	  
   $('#bnt_sm').click(function() 
   
   { 
     hidden_show();
    $("#modal_tbsm" ).attr("hidden", true);	
	$("#modal_tbbh" ).attr("hidden", true);
	$("#modal_tbig" ).attr("hidden", true);
	$("#modal_tbim" ).attr("hidden", true);
	$("#modal_tbpl" ).attr("hidden", true);
	
	//$("#hid_sm" ).attr("hidden", true);	
	$("#hid_bh" ).attr("hidden", true);
	$("#hid_ig" ).attr("hidden", true);
	$("#hid_im" ).attr("hidden", true);
	$("#hid_pl" ).attr("hidden", true);
	
	//$("#bnt_sm" ).attr("hidden", false);	
	$("#bnt_bh" ).attr("hidden", false);
	$("#bnt_ig" ).attr("hidden", false);
	$("#bnt_im" ).attr("hidden", false);
	$("#bnt_pl" ).attr("hidden", false);
	//$('#modal_tbsm').html("");
	console.log( $('#bnt_sm').val() );
		if ( sm_hide[0] == 0 )
			
			{
				head_col  =   '  <table class="table table-hover" id="tabsm" >'  + "\r\n";
				head_col +=   '  <tr style="font-size: 11px; background-color: #017bbd;color: #FFFFFF;" >                      '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 120px;" >CODE</th>           '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >PART NO</th>        '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >PART NAME</th>      '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >MODEL</th>          '  + "\r\n";
                head_col +=   '    <th style = "text-align: right;  font-weight: bold; font-size: 10px; " >PRICE</th>          '  + "\r\n";
                head_col +=   '    <th style = "text-align: right;  font-weight: bold; font-size: 10px; " >QTY.</th>           '  + "\r\n";
                head_col +=   '    <th style = "text-align: center;  font-weight: bold; font-size: 10px; " >RATIO</th>         '  + "\r\n";
                head_col +=   '    <th style = "text-align: center; font-weight: bold; font-size: 10px; " >OPTION</th>         '  + "\r\n";    
                head_col +=   '  </tr>                     '  + "\r\n";
				//$('#modal_tb').html(head_col)
				console.log( $('#bnt_sm').val() );
				oi = 0 ;
				ri = 0 ;
				cust_get = '';
                                    for(var p in data_match[$('#bnt_sm').val()])
										
                                    {
										
										//console.log(p);
										//console.log( data_match[$('#bnt').val()][p]);
											head_col +=   ' <tr id="tr' + p + '">                                                                            ' + "\r\n";
											head_col +=   '	<td style = "width: 120px;" id="rw' + p +'" ></td> ' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px; width: 140px;">' + data_match[$('#bnt_sm').val()][p]["PART_NO"]   + '</td>' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px; width: 180px;">' + data_match[$('#bnt_sm').val()][p]["PART_NAME"] + '</td>' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px;">' + data_match[$('#bnt_sm').val()][p]["MODEL"]     + '</td>' + "\r\n";
											head_col +=   '	<td style = "text-align: right; font-size: 10px;" >' +currencyFormat(data_match[$('#bnt_sm').val()][p]["PRICE"] ) +'</td> ' + "\r\n";
											head_col +=   '	<td style = "text-align: right; font-size: 10px;" >' +formatNumber(  data_match[$('#bnt_sm').val()][p]["QTY"]   ) +'</td> ' + "\r\n";
											head_col +=   '	<td style = "width: 120px;" id="ratio' + p +'" >' + "\r\n" 
											         +'       <select class="form-control select2" style = "font-size: 10px;" id="slt_ratio'  + p +'">'  +  "\r\n" 
													 +'        <option value="0.01" >' + 0.01 + '</option>' + "\r\n" 
													 +'        <option value="0.03" >' + 0.03 + '</option>' + "\r\n" 
													 +'       </select>' + "\r\n"
													 +'     </td>'  +  "\r\n";
											head_col +=   '	<td style = "text-align: center; font-size: 10px;">                                                                                                                                   ' + "\r\n";
											head_col +=   '		<button type="button" id="sac'+ $('#bnt_sm').val() + p + '" value = "'+p+'" class="btn btn-outline btn-primary mb-5" data-toggle="modal"  data-target="#modal-in" > <i class="fa  fa-search" > </i> </button>   ' + "\r\n";
											head_col +=   '		<button type="button" id="sav'+ $('#bnt_sm').val() + p + '" value = "'+p+'" class="btn btn-outline btn-success mb-5"  > <i class="fa   fa-save" > </i>  </button>   ' + "\r\n";
											head_col +=   '	</td>' +    "\r\n";
											head_col +=   ' </tr>' +	"\r\n";	
									  cust_get = data_match[$('#bnt_sm').val()][p]["CUST_GRP_CD"];	
									  console.log( cust_get + " check " + p );	
									  th = '<select class="form-control select2" style = "font-size: 10px;" id="slt_ratio'  + (ri) +'">'  + "\r\n" 
											+'<option value="0.01" >' + 0.01 + '</option>' + "\r\n" 
											+'<option value="0.03" >' + 0.03 + '</option>' + "\r\n" 
											+'</select>' ;
									  
									 							   
									   
									   $.ajax({
										url     : 'http://192.168.161.102/report_access/royalty_app/json_getdata_cust_cd',
										type    : 'post',
										dataType: 'json',
										data    :  { custArray : cust_get  } ,
										success : function(cus)
												   {
										
													op = '<select class="form-control select2" style = "font-size: 10px;" id="slt' + oi +'">';
													for(var x in cus)
													  {
														op += '<option value="'+ cus[x]["CUST_ANMAE"] +'" >' + cus[x]["CUST_ANMAE"] + '</option>' + "\r\n";	
													  }
													op += '</select>' + "\r\n";	  
													$('#rw'+(oi++)).html(op);
												   },
													  
													  
										error : function(upp)

													{
													   $('#slt'+oi).html('<option>' + 'error' + '</option>');
													   console.log('error');

													}
									   });												
											

											
											
									}
									
									head_col +=   '</table>' +	"\r\n";	
									$('#modal_tbsm').html(head_col);
									

									$("#modal_tbsm" ).attr("hidden", false);
									$("#bnt_sm" ).attr("hidden", true);
									$("#hid_sm" ).attr("hidden", false);
									
									sm_hide[0] = 1;
									
			}

		else
			
			{
				
				$("#modal_tbsm" ).attr("hidden", false);
				$("#bnt_sm" ).attr("hidden", true);
				$("#hid_sm" ).attr("hidden", false);			
			}
			
								$( '#tabsm button' ).click(function() 
								   
								   { 
											console.log( $(this).attr("id").substring(0, 3) );
												if ( $(this).attr("id").substring(0, 3) == 'sav') 
													
													{ 
														 var currentRow=$(this).closest("tr"); 
						 
														 var col1=currentRow.find("td:eq(1)").text(); // get current row 1st TD value
														 var col2=currentRow.find("td:eq(2)").text(); // get current row 2nd TD
														 var col3=currentRow.find("td:eq(3)").text(); // get current row 3rd TD	
														
														// var col3=currentRow.find("td:eq(3)").text(); // get current row 3rd TD	
													
													
														var ins_nw = [];	
														ins_nw.push( $('#slt' +$('#' + $(this).attr("id") ).val()+ "  option:selected" ).attr('value') );
														ins_nw.push( col1 );
														ins_nw.push( col2 );
														ins_nw.push( col3 );
														
														ins_nw.push( $('#ratio' + $('#' + $(this).attr("id") ).val()+ "  option:selected" ).attr('value'));
													   $.ajax({
														url     : 'http://192.168.161.102/report_access/royalty_app/api_insert_master',
														type    : 'post',
														dataType: 'json',
														data    :  { "oor" : ins_nw, "table" : "ROYALTY_SM"  } ,
														success : function(cus)
																   {
														
																	console.log(cus);
																   },
																	  
																	  
														error : function(upp)

																	{
																	  
																	   console.log('error');

																	}
													   });																
														
														
														
														
														
														$( '#tr' + $('#' + $(this).attr("id") ).val() ).remove();
														console.log(ins_nw);
													//$("#tabsm tr:eq("+( $('#' + $(this).attr("id") ).val() + 1 )+")").remove();
													}
													
												else if ( $(this).attr("id").substring(0, 3) == 'sac' )
													
													{
														console.log( $('#' + $(this).attr("id") ).val() +  " OOR EiEi" );
														$('#cust_p').html( data_match[$('#bnt_sm').val()][$('#' + $(this).attr("id") ).val()]["PART_NO"] );
														$('#ownr_p').html( data_match[$('#bnt_sm').val()][$('#' + $(this).attr("id") ).val()]["EXK_PART"] );
														$('#name_p').html( data_match[$('#bnt_sm').val()][$('#' + $(this).attr("id") ).val()]["PART_NAME"] );
														$('#model_p').html( data_match[$('#bnt_sm').val()][$('#' + $(this).attr("id") ).val()]["MODEL"] );
														$('#price_p').html( currencyFormat(data_match[$('#bnt_sm').val()][$('#' + $(this).attr("id") ).val()]["PRICE"]  ) );
														$('#qty_p').html( formatNumber(  data_match[$('#bnt_sm').val()][$('#' + $(this).attr("id") ).val()]["QTY"]    ) );
														$('#amnt_p').html( currencyFormat(data_match[$('#bnt_sm').val()][$('#' + $(this).attr("id") ).val()]["AMOUNT"] ) );
														
													
														
													}
													
													

								   });  	
						//for(var p in data_match[$('#bnt_sm').val()])
						//				
                        //    {		   
                        //
						//		   
						//		$( "#sacsm" + p ).click(function() 
						//		   
						//		   { 
						//							console.log( '#sacsm' + p  );
						//							console.log( $("#sacsm1").val() + "OOR EiEi" );		//$('#modal-detail').modal('toggle') ;
						//							//	$('#modal-fill').modal('toggle');
						//							console.log("เข้านะ");
						//							
                        //
						//		   });							   
						//		   
						//		   
						//   }
			//console.log( head_col );				
			
   });

   $('#bnt_bh').click(function() 
   
   { 
 hidden_show();   
    $("#modal_tbsm" ).attr("hidden", true);	
	$("#modal_tbbh" ).attr("hidden", true);
	$("#modal_tbig" ).attr("hidden", true);
	$("#modal_tbim" ).attr("hidden", true);
	$("#modal_tbpl" ).attr("hidden", true);
	
	$("#hid_sm" ).attr("hidden", true);	
	//$("#hid_bh" ).attr("hidden", true);
	$("#hid_ig" ).attr("hidden", true);
	$("#hid_im" ).attr("hidden", true);
	$("#hid_pl" ).attr("hidden", true);
	
	$("#bnt_sm" ).attr("hidden", false);	
	//$("#bnt_bh" ).attr("hidden", false);
	$("#bnt_ig" ).attr("hidden", false);
	$("#bnt_im" ).attr("hidden", false);
	$("#bnt_pl" ).attr("hidden", false);
				//$('#modal_tbbh').html("");
				
			if ( bh_hide[0] == 0 )
			
			{
				head_col  =   '  <table class="table table-hover" id="tabbh" >'  + "\r\n";
				head_col +=   '  <tr style="font-size: 11px; background-color: #017bbd;color: #FFFFFF;" >               '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 120px;" >CODE</th>           '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >PART NO</th>        '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >PART NAME</th>      '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >MODEL</th>          '  + "\r\n";
                head_col +=   '    <th style = "text-align: right;  font-weight: bold; font-size: 10px; " >PRICE</th>          '  + "\r\n";
                head_col +=   '    <th style = "text-align: right;  font-weight: bold; font-size: 10px; " >QTY.</th>           '  + "\r\n";
                head_col +=   '    <th style = "text-align: center;  font-weight: bold; font-size: 10px; " >RATIO</th>         '  + "\r\n";
                head_col +=   '    <th style = "text-align: center; font-weight: bold; font-size: 10px; " >OPTION</th>         '  + "\r\n";    
                head_col +=   '  </tr>                     '  + "\r\n";
				//$('#modal_tb').html(head_col)
				console.log( $('#bnt_bh').val() );
				oi = 0 ;
				ri = 0 ;
				cust_get = '';
                                    for(var p in data_match[$('#bnt_bh').val()])
										
                                    {
										
										//console.log(p);
										//console.log( data_match[$('#bnt').val()][p]);
											head_col +=   ' <tr id="tr' + p + '">                                                                            ' + "\r\n";
											head_col +=   '	<td style = "width: 120px;" id="rw_bh' + p +'" ></td> ' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px; width: 140px;">' + data_match[$('#bnt_bh').val()][p]["PART_NO"]   + '</td>' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px; width: 180px;">' + data_match[$('#bnt_bh').val()][p]["PART_NAME"] + '</td>' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px;">' + data_match[$('#bnt_bh').val()][p]["MODEL"]     + '</td>' + "\r\n";
											head_col +=   '	<td style = "text-align: right; font-size: 10px;" >' +currencyFormat(data_match[$('#bnt_bh').val()][p]["PRICE"] ) +'</td> ' + "\r\n";
											head_col +=   '	<td style = "text-align: right; font-size: 10px;" >' +formatNumber(  data_match[$('#bnt_bh').val()][p]["QTY"]   ) +'</td> ' + "\r\n";
											head_col +=   '	<td style = "width: 120px;" id="ratio' + p +'" >' + "\r\n" 
											         +'       <select class="form-control select2" style = "font-size: 10px;" id="slt_ratio'  + p +'">'  +  "\r\n" 
													 +'        <option value="0.01" >' + 0.01 + '</option>' + "\r\n" 
													 +'        <option value="0.03" >' + 0.03 + '</option>' + "\r\n" 
													 +'       </select>' + "\r\n"
													 +'     </td>'  +  "\r\n";
											head_col +=   '	<td style = "text-align: center; font-size: 10px;">                                                                                                                                   ' + "\r\n";
											head_col +=   '		<button type="button" id="sac'+ $('#bnt_bh').val() + p + '" value = "'+p+'" class="btn btn-outline btn-primary mb-5" data-toggle="modal"  data-target="#modal-in" > <i class="fa  fa-search" > </i> </button>   ' + "\r\n";
											head_col +=   '		<button type="button" id="sav'+ $('#bnt_bh').val() + p + '" value = "'+p+'" class="btn btn-outline btn-success mb-5"  > <i class="fa   fa-save" > </i>  </button>   ' + "\r\n";
											head_col +=   '	</td>' +    "\r\n";
											head_col +=   ' </tr>' +	"\r\n";	
									  cust_get = data_match[$('#bnt_bh').val()][p]["CUST_GRP_CD"];	
									  console.log( cust_get + " check " + p );	
									  th = '<select class="form-control select2" style = "font-size: 10px;" id="slt_ratio'  + (ri) +'">'  + "\r\n" 
											+'<option value="0.01" >' + 0.01 + '</option>' + "\r\n" 
											+'<option value="0.03" >' + 0.03 + '</option>' + "\r\n" 
											+'</select>' ;
									  
									 							   
									   
									   $.ajax({
										url     : 'http://192.168.161.102/report_access/royalty_app/json_getdata_cust_cd',
										type    : 'post',
										dataType: 'json',
										data    :  { custArray : cust_get  } ,
										success : function(cus)
												   {
										
													op = '<select class="form-control select2" style = "font-size: 10px;" id="slt' + oi +'">';
													for(var x in cus)
													  {
														op += '<option value="'+ cus[x]["CUST_ANMAE"] +'" >' + cus[x]["CUST_ANMAE"] + '</option>' + "\r\n";	
													  }
													op += '</select>' + "\r\n";	  
													$('#rw_bh'+(oi++)).html(op);
												   },
													  
													  
										error : function(upp)

													{
													   $('#slt'+oi).html('<option>' + 'error' + '</option>');
													   console.log('error');

													}
									   });												
											

											
											
									}
									
									head_col +=   '</table>' +	"\r\n";	
									$('#modal_tbbh').html(head_col);
									

									$("#modal_tbbh" ).attr("hidden", false);
									$("#bnt_bh" ).attr("hidden", true);
									$("#hid_bh" ).attr("hidden", false);
									
									bh_hide[0] = 1;
									
			}

		else
			
			{
				
				$("#modal_tbbh" ).attr("hidden", false);
				$("#bnt_bh" ).attr("hidden", true);
				$("#hid_bh" ).attr("hidden", false);			
			}
			
								$( '#tabbh button' ).click(function() 
								   
								   { 
											console.log( $(this).attr("id").substring(0, 3) );
												if ( $(this).attr("id").substring(0, 3) == 'sav') 
													
													{
															
														 var currentRow=$(this).closest("tr"); 
						 
														 var col1=currentRow.find("td:eq(1)").text(); // get current row 1st TD value
														 var col2=currentRow.find("td:eq(2)").text(); // get current row 2nd TD
														 var col3=currentRow.find("td:eq(3)").text(); // get current row 3rd TD	
														
														// var col3=currentRow.find("td:eq(3)").text(); // get current row 3rd TD	
													
													
														var ins_nw = [];	
														ins_nw.push( $('#slt' +$('#' + $(this).attr("id") ).val()+ "  option:selected" ).attr('value') );
														ins_nw.push( col1 );
														ins_nw.push( col2 );
														ins_nw.push( col3 );
														
														ins_nw.push( $('#ratio' + $('#' + $(this).attr("id") ).val()+ "  option:selected" ).attr('value'));
													   $.ajax({
														url     : 'http://192.168.161.102/report_access/royalty_app/api_insert_master',
														type    : 'post',
														dataType: 'json',
														data    :  { "oor" : ins_nw, "table" : "ROYALTY_SM_BH"  } ,
														success : function(cus)
																   {
														
																	console.log(cus);
																   },
																	  
																	  
														error : function(upp)

																	{
																	  
																	   console.log('error');

																	}
													   });
														$( '#tr' + $('#' + $(this).attr("id") ).val() ).remove();
														console.log(ins_nw);
													//$("#tabsm tr:eq("+( $('#' + $(this).attr("id") ).val() + 1 )+")").remove();
													}
													
												else if ( $(this).attr("id").substring(0, 3) == 'sac' )
													
													{
														console.log( $('#' + $(this).attr("id") ).val() +  " OOR EiEi" );
														$('#cust_p').html( data_match[$('#bnt_bh').val()][$('#' + $(this).attr("id") ).val()]["PART_NO"] );
														$('#ownr_p').html( data_match[$('#bnt_bh').val()][$('#' + $(this).attr("id") ).val()]["EXK_PART"] );
														$('#name_p').html( data_match[$('#bnt_bh').val()][$('#' + $(this).attr("id") ).val()]["PART_NAME"] );
														$('#model_p').html( data_match[$('#bnt_bh').val()][$('#' + $(this).attr("id") ).val()]["MODEL"] );
														$('#price_p').html( currencyFormat(data_match[$('#bnt_bh').val()][$('#' + $(this).attr("id") ).val()]["PRICE"]  ) );
														$('#qty_p').html( formatNumber(  data_match[$('#bnt_bh').val()][$('#' + $(this).attr("id") ).val()]["QTY"]    ) );
														$('#amnt_p').html( currencyFormat(data_match[$('#bnt_bh').val()][$('#' + $(this).attr("id") ).val()]["AMOUNT"] ) );
														
														
														
													}
													
													

								   });  	
			
   });

   $('#bnt_ig').click(function() 
   
   { 
    hidden_show();
    $("#modal_tbsm" ).attr("hidden", true);	
	$("#modal_tbbh" ).attr("hidden", true);
	$("#modal_tbig" ).attr("hidden", true);
	$("#modal_tbim" ).attr("hidden", true);
	$("#modal_tbpl" ).attr("hidden", true); 

	$("#hid_sm" ).attr("hidden", true);	
	$("#hid_bh" ).attr("hidden", true);
	//$("#hid_ig" ).attr("hidden", true);
	$("#hid_im" ).attr("hidden", true);
	$("#hid_pl" ).attr("hidden", true);	
	
	$("#bnt_sm" ).attr("hidden", false);	
	$("#bnt_bh" ).attr("hidden", false);
	//$("#bnt_ig" ).attr("hidden", false);
	$("#bnt_im" ).attr("hidden", false);
	$("#bnt_pl" ).attr("hidden", false);
				//$('#modal_tbig').html("");
				if ( ig_hide[0] == 0 )
			
			{
				head_col  =   '  <table class="table table-hover" id="tabig" >'  + "\r\n";
				head_col +=   '  <tr style="font-size: 11px; background-color: #017bbd;color: #FFFFFF;" >               '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 120px;" >CODE</th>           '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >PART NO</th>        '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >PART NAME</th>      '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >MODEL</th>          '  + "\r\n";
                head_col +=   '    <th style = "text-align: right;  font-weight: bold; font-size: 10px; " >PRICE</th>          '  + "\r\n";
                head_col +=   '    <th style = "text-align: right;  font-weight: bold; font-size: 10px; " >QTY.</th>           '  + "\r\n";
                head_col +=   '    <th style = "text-align: center;  font-weight: bold; font-size: 10px; " >RATIO</th>         '  + "\r\n";
                head_col +=   '    <th style = "text-align: center; font-weight: bold; font-size: 10px; " >OPTION</th>         '  + "\r\n";    
                head_col +=   '  </tr>                     '  + "\r\n";
				//$('#modal_tb').html(head_col)
				console.log( $('#bnt_ig').val() );
				oi = 0 ;
				ri = 0 ;
				cust_get = '';
                                    for(var p in data_match[$('#bnt_ig').val()])
										
                                    {
										
										//console.log(p);
										//console.log( data_match[$('#bnt').val()][p]);
											head_col +=   ' <tr id="tr' + p + '">                                                                            ' + "\r\n";
											head_col +=   '	<td style = "width: 120px;" id="rw_ig' + p +'" ></td> ' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px; width: 140px;">' + data_match[$('#bnt_ig').val()][p]["PART_NO"]   + '</td>' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px; width: 180px;">' + data_match[$('#bnt_ig').val()][p]["PART_NAME"] + '</td>' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px;">' + data_match[$('#bnt_ig').val()][p]["MODEL"]     + '</td>' + "\r\n";
											head_col +=   '	<td style = "text-align: right; font-size: 10px;" >' +currencyFormat(data_match[$('#bnt_ig').val()][p]["PRICE"] ) +'</td> ' + "\r\n";
											head_col +=   '	<td style = "text-align: right; font-size: 10px;" >' +formatNumber(  data_match[$('#bnt_ig').val()][p]["QTY"]   ) +'</td> ' + "\r\n";
											head_col +=   '	<td style = "width: 120px;" id="ratio' + p +'" >' + "\r\n" 
											         +'       <select class="form-control select2" style = "font-size: 10px;" id="slt_ratio'  + p +'">'  +  "\r\n" 
													 +'        <option value="0.01" >' + 0.01 + '</option>' + "\r\n" 
													 +'        <option value="0.03" >' + 0.03 + '</option>' + "\r\n" 
													 +'       </select>' + "\r\n"
													 +'     </td>'  +  "\r\n";
											head_col +=   '	<td style = "text-align: center; font-size: 10px;">                                                                                                                                   ' + "\r\n";
											head_col +=   '		<button type="button" id="sac'+ $('#bnt_ig').val() + p + '" value = "'+p+'" class="btn btn-outline btn-primary mb-5" data-toggle="modal"  data-target="#modal-in" > <i class="fa  fa-search" > </i> </button>   ' + "\r\n";
											head_col +=   '		<button type="button" id="sav'+ $('#bnt_ig').val() + p + '" value = "'+p+'" class="btn btn-outline btn-success mb-5"  > <i class="fa   fa-save" > </i>  </button>   ' + "\r\n";
											head_col +=   '	</td>' +    "\r\n";
											head_col +=   ' </tr>' +	"\r\n";	
									  cust_get = data_match[$('#bnt_ig').val()][p]["CUST_GRP_CD"];	
									  console.log( cust_get + " check " + p );	
									  th = '<select class="form-control select2" style = "font-size: 10px;" id="slt_ratio'  + (ri) +'">'  + "\r\n" 
											+'<option value="0.01" >' + 0.01 + '</option>' + "\r\n" 
											+'<option value="0.03" >' + 0.03 + '</option>' + "\r\n" 
											+'</select>' ;
									  
									 							   
									   
									   $.ajax({
										url     : 'http://192.168.161.102/report_access/royalty_app/json_getdata_cust_cd',
										type    : 'post',
										dataType: 'json',
										data    :  { custArray : cust_get  } ,
										success : function(cus)
												   {
										
													op = '<select class="form-control select2" style = "font-size: 10px;" id="slt' + oi +'">';
													for(var x in cus)
													  {
														op += '<option value="'+ cus[x]["CUST_ANMAE"] +'" >' + cus[x]["CUST_ANMAE"] + '</option>' + "\r\n";	
													  }
													op += '</select>' + "\r\n";	  
													$('#rw_ig'+(oi++)).html(op);
												   },
													  
													  
										error : function(upp)

													{
													   $('#slt'+oi).html('<option>' + 'error' + '</option>');
													   console.log('error');

													}
									   });												
											

											
											
									}
									
									head_col +=   '</table>' +	"\r\n";	
									$('#modal_tbig').html(head_col);
									

									$("#modal_tbig" ).attr("hidden", false);
									$("#bnt_ig" ).attr("hidden", true);
									$("#hid_ig" ).attr("hidden", false);
									
									ig_hide[0] = 1;
									
			}

		else
			
			{
				
				$("#modal_tbig" ).attr("hidden", false);
				$("#bnt_ig" ).attr("hidden", true);
				$("#hid_ig" ).attr("hidden", false);			
			}
			
								$( '#tabig button' ).click(function() 
								   
								   { 
											console.log( $(this).attr("id").substring(0, 3) );
												if ( $(this).attr("id").substring(0, 3) == 'sav') 
													
													{
														 var currentRow=$(this).closest("tr"); 
						 
														 var col1=currentRow.find("td:eq(1)").text(); // get current row 1st TD value
														 var col2=currentRow.find("td:eq(2)").text(); // get current row 2nd TD
														 var col3=currentRow.find("td:eq(3)").text(); // get current row 3rd TD	
														
														// var col3=currentRow.find("td:eq(3)").text(); // get current row 3rd TD	
													
													
														var ins_nw = [];	
														ins_nw.push( $('#slt' +$('#' + $(this).attr("id") ).val()+ "  option:selected" ).attr('value') );
														ins_nw.push( col1 );
														ins_nw.push( col2 );
														ins_nw.push( col3 );
														
														ins_nw.push( $('#ratio' + $('#' + $(this).attr("id") ).val()+ "  option:selected" ).attr('value'));
													   $.ajax({
														url     : 'http://192.168.161.102/report_access/royalty_app/api_insert_master',
														type    : 'post',
														dataType: 'json',
														data    :  { "oor" : ins_nw, "table" : "ROYALTY_SM_BRAKE_IGCE"  } ,
														success : function(cus)
																   {
														
																	console.log(cus);
																   },
																	  
																	  
														error : function(upp)

																	{
																	  
																	   console.log('error');

																	}
													   });
														$( '#tr' + $('#' + $(this).attr("id") ).val() ).remove();
														console.log(ins_nw);
													}
													
												else if ( $(this).attr("id").substring(0, 3) == 'sac' )
													
													{
														console.log( $('#' + $(this).attr("id") ).val() +  " OOR EiEi" );
														$('#cust_p').html( data_match[$('#bnt_ig').val()][$('#' + $(this).attr("id") ).val()]["PART_NO"] );
														$('#ownr_p').html( data_match[$('#bnt_ig').val()][$('#' + $(this).attr("id") ).val()]["EXK_PART"] );
														$('#name_p').html( data_match[$('#bnt_ig').val()][$('#' + $(this).attr("id") ).val()]["PART_NAME"] );
														$('#model_p').html( data_match[$('#bnt_ig').val()][$('#' + $(this).attr("id") ).val()]["MODEL"] );
														$('#price_p').html( currencyFormat(data_match[$('#bnt_ig').val()][$('#' + $(this).attr("id") ).val()]["PRICE"]  ) );
														$('#qty_p').html( formatNumber(  data_match[$('#bnt_ig').val()][$('#' + $(this).attr("id") ).val()]["QTY"]    ) );
														$('#amnt_p').html( currencyFormat(data_match[$('#bnt_ig').val()][$('#' + $(this).attr("id") ).val()]["AMOUNT"] ) );
														
														
														
													}
													
													

								   });  	
			//console.log( head_col );				
			
   });

   $('#bnt_im').click(function() 
   
   { 
    hidden_show();
    $("#modal_tbsm" ).attr("hidden", true);	
	$("#modal_tbbh" ).attr("hidden", true);
	$("#modal_tbig" ).attr("hidden", true);
	$("#modal_tbim" ).attr("hidden", true);
	$("#modal_tbpl" ).attr("hidden", true);
	
	$("#hid_sm" ).attr("hidden", true);	
	$("#hid_bh" ).attr("hidden", true);
	$("#hid_ig" ).attr("hidden", true);
	//$("#hid_im" ).attr("hidden", true);
	$("#hid_pl" ).attr("hidden", true);
	
	$("#bnt_sm" ).attr("hidden", false);	
	$("#bnt_bh" ).attr("hidden", false);
	$("#bnt_ig" ).attr("hidden", false);
	//$("#bnt_im" ).attr("hidden", false);
	$("#bnt_pl" ).attr("hidden", false);
				//$('#modal_tbim').html("");
				if ( im_hide[0] == 0 )
			
			{
				head_col  =   '  <table class="table table-hover" id="tabim" >'  + "\r\n";
				head_col +=   '  <tr style="font-size: 11px; background-color: #017bbd;color: #FFFFFF;" >                      '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 120px;" >CODE</th>           '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >PART NO</th>        '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >PART NAME</th>      '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >MODEL</th>          '  + "\r\n";
                head_col +=   '    <th style = "text-align: right;  font-weight: bold; font-size: 10px; " >PRICE</th>          '  + "\r\n";
                head_col +=   '    <th style = "text-align: right;  font-weight: bold; font-size: 10px; " >QTY.</th>           '  + "\r\n";
                head_col +=   '    <th style = "text-align: center;  font-weight: bold; font-size: 10px; " >RATIO</th>         '  + "\r\n";
                head_col +=   '    <th style = "text-align: center; font-weight: bold; font-size: 10px; " >OPTION</th>         '  + "\r\n";    
                head_col +=   '  </tr>                     '  + "\r\n";
				//$('#modal_tb').html(head_col)
				console.log( $('#bnt_im').val() );
				oi = 0 ;
				ri = 0 ;
				cust_get = '';
                                    for(var p in data_match[$('#bnt_im').val()])
										
                                    {
										
										//console.log(p);
										//console.log( data_match[$('#bnt').val()][p]);
											head_col +=   ' <tr id="tr' + p + '">                                                                            ' + "\r\n";
											head_col +=   '	<td style = "width: 120px;" id="rw_im' + p +'" ></td> ' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px; width: 140px;">' + data_match[$('#bnt_im').val()][p]["PART_NO"]   + '</td>' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px; width: 180px;">' + data_match[$('#bnt_im').val()][p]["PART_NAME"] + '</td>' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px;">' + data_match[$('#bnt_im').val()][p]["MODEL"]     + '</td>' + "\r\n";
											head_col +=   '	<td style = "text-align: right; font-size: 10px;" >' +currencyFormat(data_match[$('#bnt_im').val()][p]["PRICE"] ) +'</td> ' + "\r\n";
											head_col +=   '	<td style = "text-align: right; font-size: 10px;" >' +formatNumber(  data_match[$('#bnt_im').val()][p]["QTY"]   ) +'</td> ' + "\r\n";
											head_col +=   '	<td style = "width: 120px;" id="ratio' + p +'" >' + "\r\n" 
											         +'       <select class="form-control select2" style = "font-size: 10px;" id="slt_ratio'  + p +'">'  +  "\r\n" 
													 +'        <option value="0.01" >' + 0.01 + '</option>' + "\r\n" 
													 +'        <option value="0.03" >' + 0.03 + '</option>' + "\r\n" 
													 +'       </select>' + "\r\n"
													 +'     </td>'  +  "\r\n";
											head_col +=   '	<td style = "text-align: center; font-size: 10px;">                                                                                                                                   ' + "\r\n";
											head_col +=   '		<button type="button" id="sac'+ $('#bnt_im').val() + p + '" value = "'+p+'" class="btn btn-outline btn-primary mb-5" data-toggle="modal"  data-target="#modal-in" > <i class="fa  fa-search" > </i> </button>   ' + "\r\n";
											head_col +=   '		<button type="button" id="sav'+ $('#bnt_im').val() + p + '" value = "'+p+'" class="btn btn-outline btn-success mb-5"  > <i class="fa   fa-save" > </i>  </button>   ' + "\r\n";
											head_col +=   '	</td>' +    "\r\n";
											head_col +=   ' </tr>' +	"\r\n";	
									  cust_get = data_match[$('#bnt_im').val()][p]["CUST_GRP_CD"];	
									  console.log( cust_get + " check " + p );	
									  th = '<select class="form-control select2" style = "font-size: 10px;" id="slt_ratio'  + (ri) +'">'  + "\r\n" 
											+'<option value="0.01" >' + 0.01 + '</option>' + "\r\n" 
											+'<option value="0.03" >' + 0.03 + '</option>' + "\r\n" 
											+'</select>' ;
									  
									 							   
									   
									   $.ajax({
										url     : 'http://192.168.161.102/report_access/royalty_app/json_getdata_cust_cd',
										type    : 'post',
										dataType: 'json',
										data    :  { custArray : cust_get  } ,
										success : function(cus)
												   {
										
													op = '<select class="form-control select2" style = "font-size: 10px;" id="slt' + oi +'">';
													for(var x in cus)
													  {
														op += '<option value="'+ cus[x]["CUST_ANMAE"] +'" >' + cus[x]["CUST_ANMAE"] + '</option>' + "\r\n";	
													  }
													op += '</select>' + "\r\n";	  
													$('#rw_im'+(oi++)).html(op);
												   },
													  
													  
										error : function(upp)

													{
													   $('#slt'+oi).html('<option>' + 'error' + '</option>');
													   console.log('error');

													}
									   });												
											

											
											
									}
									
									head_col +=   '</table>' +	"\r\n";	
									$('#modal_tbim').html(head_col);
									

									$("#modal_tbim" ).attr("hidden", false);
									$("#bnt_im" ).attr("hidden", true);
									$("#hid_im" ).attr("hidden", false);
									
									im_hide[0] = 1;
									
			}

		else
			
			{
				
				$("#modal_tbim" ).attr("hidden", false);
				$("#bnt_im" ).attr("hidden", true);
				$("#hid_im" ).attr("hidden", false);			
			}
			
								$( '#tabim button' ).click(function() 
								   
								   { 
											console.log( $(this).attr("id").substring(0, 3) );
												if ( $(this).attr("id").substring(0, 3) == 'sav') 
													
													{
														 var currentRow=$(this).closest("tr"); 
						 
														 var col1=currentRow.find("td:eq(1)").text(); // get current row 1st TD value
														 var col2=currentRow.find("td:eq(2)").text(); // get current row 2nd TD
														 var col3=currentRow.find("td:eq(3)").text(); // get current row 3rd TD	
														
														// var col3=currentRow.find("td:eq(3)").text(); // get current row 3rd TD	
													
													
														var ins_nw = [];	
														ins_nw.push( $('#slt' +$('#' + $(this).attr("id") ).val()+ "  option:selected" ).attr('value') );
														ins_nw.push( col1 );
														ins_nw.push( col2 );
														ins_nw.push( col3 );
														
														ins_nw.push( $('#ratio' + $('#' + $(this).attr("id") ).val()+ "  option:selected" ).attr('value'));
													   $.ajax({
														url     : 'http://192.168.161.102/report_access/royalty_app/api_insert_master',
														type    : 'post',
														dataType: 'json',
														data    :  { "oor" : ins_nw, "table" : "ROYALTY_SM_BRAKE_IMCT"  } ,
														success : function(cus)
																   {
														
																	console.log(cus);
																   },
																	  
																	  
														error : function(upp)

																	{
																	  
																	   console.log('error');

																	}
													   });
														$( '#tr' + $('#' + $(this).attr("id") ).val() ).remove();
														console.log(ins_nw);
													}
													
												else if ( $(this).attr("id").substring(0, 3) == 'sac' )
													
													{
														console.log( $('#' + $(this).attr("id") ).val() +  " OOR EiEi" );
														$('#cust_p').html( data_match[$('#bnt_im').val()][$('#' + $(this).attr("id") ).val()]["PART_NO"] );
														$('#ownr_p').html( data_match[$('#bnt_im').val()][$('#' + $(this).attr("id") ).val()]["EXK_PART"] );
														$('#name_p').html( data_match[$('#bnt_im').val()][$('#' + $(this).attr("id") ).val()]["PART_NAME"] );
														$('#model_p').html( data_match[$('#bnt_im').val()][$('#' + $(this).attr("id") ).val()]["MODEL"] );
														$('#price_p').html( currencyFormat(data_match[$('#bnt_im').val()][$('#' + $(this).attr("id") ).val()]["PRICE"]  ) );
														$('#qty_p').html( formatNumber(  data_match[$('#bnt_im').val()][$('#' + $(this).attr("id") ).val()]["QTY"]    ) );
														$('#amnt_p').html( currencyFormat(data_match[$('#bnt_im').val()][$('#' + $(this).attr("id") ).val()]["AMOUNT"] ) );
														
														
														
													}
													
													

								   });  
			//console.log( head_col );				
			
   });

   $('#bnt_pl').click(function() 
   
   { 
    hidden_show();
	$("#modal_tbsm" ).attr("hidden", true);	
	$("#modal_tbbh" ).attr("hidden", true);
	$("#modal_tbig" ).attr("hidden", true);
	$("#modal_tbim" ).attr("hidden", true);
	$("#modal_tbpl" ).attr("hidden", true);
	
	$("#hid_sm" ).attr("hidden", true);	
	$("#hid_bh" ).attr("hidden", true);
	$("#hid_ig" ).attr("hidden", true);
	$("#hid_im" ).attr("hidden", true);
	//$("#hid_pl" ).attr("hidden", true);
	
	$("#bnt_sm" ).attr("hidden", false);	
	$("#bnt_bh" ).attr("hidden", false);
	$("#bnt_ig" ).attr("hidden", false);
	$("#bnt_im" ).attr("hidden", false);
	//$("#bnt_pl" ).attr("hidden", false);
				//$('#modal_tbpl').html("");
				if ( pl_hide[0] == 0 )
			
			{
				head_col  =   '  <table class="table table-hover" id="tabpl" >'  + "\r\n";
				head_col +=   '  <tr style="font-size: 11px; background-color: #017bbd;color: #FFFFFF;" >                      '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 120px;" >CODE</th>           '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >PART NO</th>        '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >PART NAME</th>      '  + "\r\n";
                head_col +=   '    <th style = "font-size: 10px; font-weight: bold; width: 140px;" >MODEL</th>          '  + "\r\n";
                head_col +=   '    <th style = "text-align: right;  font-weight: bold; font-size: 10px; " >PRICE</th>          '  + "\r\n";
                head_col +=   '    <th style = "text-align: right;  font-weight: bold; font-size: 10px; " >QTY.</th>           '  + "\r\n";
                head_col +=   '    <th style = "text-align: center;  font-weight: bold; font-size: 10px; " >RATIO</th>         '  + "\r\n";
                head_col +=   '    <th style = "text-align: center; font-weight: bold; font-size: 10px; " >OPTION</th>         '  + "\r\n";    
                head_col +=   '  </tr>                     '  + "\r\n";
				//$('#modal_tb').html(head_col)
				console.log( $('#bnt_pl').val() );
				oi = 0 ;
				ri = 0 ;
				cust_get = '';
                                    for(var p in data_match[$('#bnt_pl').val()])
										
                                    {
										
										//console.log(p);
										//console.log( data_match[$('#bnt').val()][p]);
											head_col +=   ' <tr id="tr' + p + '">                                                                            ' + "\r\n";
											head_col +=   '	<td style = "width: 120px;" id="rw_pl' + p +'" ></td> ' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px; width: 140px;">' + data_match[$('#bnt_pl').val()][p]["PART_NO"]   + '</td>' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px; width: 180px;">' + data_match[$('#bnt_pl').val()][p]["PART_NAME"] + '</td>' + "\r\n";
											head_col +=   '	<td style = "font-size: 10px;">' + data_match[$('#bnt_pl').val()][p]["MODEL"]     + '</td>' + "\r\n";
											head_col +=   '	<td style = "text-align: right; font-size: 10px;" >' +currencyFormat(data_match[$('#bnt_pl').val()][p]["PRICE"] ) +'</td> ' + "\r\n";
											head_col +=   '	<td style = "text-align: right; font-size: 10px;" >' +formatNumber(  data_match[$('#bnt_pl').val()][p]["QTY"]   ) +'</td> ' + "\r\n";
											head_col +=   '	<td style = "width: 120px;" id="ratio' + p +'" >' + "\r\n" 
											         +'       <select class="form-control select2" style = "font-size: 10px;" id="slt_ratio'  + p +'">'  +  "\r\n" 
													 +'        <option value="0.01" >' + 0.01 + '</option>' + "\r\n" 
													 +'        <option value="0.03" >' + 0.03 + '</option>' + "\r\n" 
													 +'       </select>' + "\r\n"
													 +'     </td>'  +  "\r\n";
											head_col +=   '	<td style = "text-align: center; font-size: 10px;">                                                                                                                                   ' + "\r\n";
											head_col +=   '		<button type="button" id="sac'+ $('#bnt_pl').val() + p + '" value = "'+p+'" class="btn btn-outline btn-primary mb-5" data-toggle="modal"  data-target="#modal-in" > <i class="fa  fa-search" > </i> </button>   ' + "\r\n";
											head_col +=   '		<button type="button" id="sav'+ $('#bnt_pl').val() + p + '" value = "'+p+'" class="btn btn-outline btn-success mb-5"  > <i class="fa   fa-save" > </i>  </button>   ' + "\r\n";
											head_col +=   '	</td>' +    "\r\n";
											head_col +=   ' </tr>' +	"\r\n";	
									  cust_get = data_match[$('#bnt_pl').val()][p]["CUST_GRP_CD"];	
									  //console.log( cust_get + " check " + p );	
									  th = '<select class="form-control select2" style = "font-size: 10px;" id="slt_ratio'  + (ri) +'">'  + "\r\n" 
											+'<option value="0.01" >' + 0.01 + '</option>' + "\r\n" 
											+'<option value="0.03" >' + 0.03 + '</option>' + "\r\n" 
											+'</select>' ;
									   $.ajax({
										url     : 'http://192.168.161.102/report_access/royalty_app/json_getdata_cust_cd',
										type    : 'post',
										dataType: 'json',
										data    :  { custArray : data_match[$('#bnt_pl').val()][oi]["CUST_GRP_CD"]  } ,
										success : function(cus)
												   {
													op = '<select class="form-control select2" style = "font-size: 10px;" id="slt' + oi +'">';
													for(var x in cus)
													  {
														op += '<option value="'+ cus[x]["CUST_ANMAE"] +'" >' + cus[x]["CUST_ANMAE"] + '</option>' + "\r\n";	
													  }
													op += '</select>' + "\r\n";	  
													$('#rw_pl'+(oi++)).html(op);
												   },
										error : function(upp)
													{
													   $('#slt'+oi).html('<option>' + 'error' + '</option>');
													   console.log('error');
													}
									   });												
											

											
											
									}
									
									head_col +=   '</table>' +	"\r\n";	
									$('#modal_tbpl').html(head_col);
									

									$("#modal_tbpl" ).attr("hidden", false);
									$("#bnt_pl" ).attr("hidden", true);
									$("#hid_pl" ).attr("hidden", false);
									
									pl_hide[0] = 1;
									
			}

		else
			
			{
				
				$("#modal_tbpl" ).attr("hidden", false);
				$("#bnt_pl" ).attr("hidden", true);
				$("#hid_pl" ).attr("hidden", false);			
			}
			
								$( '#tabpl button' ).click(function() 
								   
								   { 
											//console.log( $(this).attr("id").substring(0, 3) );
												if ( $(this).attr("id").substring(0, 3) == 'sav') 
													
													{
														 var currentRow=$(this).closest("tr"); 
						 
														 var col1=currentRow.find("td:eq(1)").text(); // get current row 1st TD value
														 var col2=currentRow.find("td:eq(2)").text(); // get current row 2nd TD
														 var col3=currentRow.find("td:eq(3)").text(); // get current row 3rd TD	
														
														// var col3=currentRow.find("td:eq(3)").text(); // get current row 3rd TD	
													
													
														var ins_nw = [];	
														ins_nw.push( $('#slt' +$('#' + $(this).attr("id") ).val()+ "  option:selected" ).attr('value') );
														ins_nw.push( col1 );
														ins_nw.push( col2 );
														ins_nw.push( col3 );
														
														ins_nw.push( $('#ratio' + $('#' + $(this).attr("id") ).val()+ "  option:selected" ).attr('value'));
													   $.ajax({
														url     : 'http://192.168.161.102/report_access/royalty_app/api_insert_master',
														type    : 'post',
														dataType: 'json',
														data    :  { "oor" : ins_nw, "table" : "ROYALTY_SM_PCL"  } ,
														success : function(cus)
																   {
														
																	console.log(cus);
																   },
																	  
																	  
														error : function(upp)

																	{
																	  
																	   console.log('error');

																	}
													   });
														$( '#tr' + $('#' + $(this).attr("id") ).val() ).remove();
														console.log(ins_nw);
													}
													
												else if ( $(this).attr("id").substring(0, 3) == 'sac' )
													
													{
														//console.log( $('#' + $(this).attr("id") ).val() +  " OOR EiEi" );
														$('#cust_p').html( data_match[$('#bnt_pl').val()][$('#' + $(this).attr("id") ).val()]["PART_NO"] );
														$('#ownr_p').html( data_match[$('#bnt_pl').val()][$('#' + $(this).attr("id") ).val()]["EXK_PART"] );
														$('#name_p').html( data_match[$('#bnt_pl').val()][$('#' + $(this).attr("id") ).val()]["PART_NAME"] );
														$('#model_p').html( data_match[$('#bnt_pl').val()][$('#' + $(this).attr("id") ).val()]["MODEL"] );
														$('#price_p').html( currencyFormat(data_match[$('#bnt_pl').val()][$('#' + $(this).attr("id") ).val()]["PRICE"]  ) );
														$('#qty_p').html( formatNumber(  data_match[$('#bnt_pl').val()][$('#' + $(this).attr("id") ).val()]["QTY"]    ) );
														$('#amnt_p').html( currencyFormat(data_match[$('#bnt_pl').val()][$('#' + $(this).attr("id") ).val()]["AMOUNT"] ) );
														
														

													}
													
													
										//close_model
								   });  
			//console.log( head_col );				
			
   });
   
$('#modal-in').on('shown.bs.modal', function () {
	
  //console.log( $(this).attr("id") );
	 $('#close_model').click(function()
	 {
		 console.log( $(this).attr("id") );
		 
		 $('#modal-in').modal('toggle');
		 
	 });
})
 
   
  });

});
function currencyFormat(num) {
  return Number.parseFloat(num).toFixed(2).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
function hidden_show()
{
	
	//console.log($("#modal_tbsm" ).val());
	$("#view_tbsm" ).attr("hidden", true);	
	$("#view_tbbh" ).attr("hidden", true);
	$("#view_tbig" ).attr("hidden", true);
	$("#view_tbim" ).attr("hidden", true);
	$("#view_tbpl" ).attr("hidden", true);
	sm_hide[1] = 0;
	bh_hide[1] = 0;
	ig_hide[1] = 0;
	im_hide[1] = 0;
	pl_hide[1] = 0;
	//$("#hid_sm" ).attr("hidden", true);	
	//$("#hid_bh" ).attr("hidden", true);
	//$("#hid_ig" ).attr("hidden", true);
	//$("#hid_im" ).attr("hidden", true);
	//$("#hid_pl" ).attr("hidden", true);
	//
	//$("#bnt_sm" ).attr("hidden", false);	
	//$("#bnt_bh" ).attr("hidden", false);
	//$("#bnt_ig" ).attr("hidden", false);
	//$("#bnt_im" ).attr("hidden", false);
	//$("#bnt_pl" ).attr("hidden", false);	
	
}