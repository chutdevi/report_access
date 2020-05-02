  
  	  var group_cd;
	  var group_nm;
	  var data0 ;
	  var data1 ;
	  var data2 ;
	  var data3 ;
	  var subDetail;
	  var maxNum;
  $(document).ready(function()   
  {
	  //sm_bnte = 0;

	  
	  //var currentRow;
   $('#select_group_us').change(function() 
   { 
			group_nm = $('#select_group_us option:selected').attr("name");
		    group_cd = $('#select_group_us option:selected').attr("value");
		$('#menu_table tbody').html('');
		
		var sub_head  = '<tr  style="text-align: center;">' + "\r\n" ;
			sub_head += '<td style=" width: 21%;">' + "MENU_NAME" + "</td>" + "\r\n" ;
			sub_head += '<td style=" width: 21%;">' + "Sub menu name" + "</td>" + "\r\n" ;
			sub_head += '<td style=" width: 15%;">'  + "Sub menu code" + "</td>" + "\r\n" ;
		    
		    sub_head += '<td style=" width: 8%;">'  + "Status"        + "</td>" + "\r\n" ;
			sub_head += '<td style=" width: 15%;">' + "Option"        + "</td>" + "\r\n" ;
			sub_head += "</tr>" + "\r\n" ;
 
 
 
		//console.log(menu_gp);
 		if( group_nm != 'clear' )
		{
			$( "#sh_manage_gp" ).attr("hidden", false);
			$( '#add_menu_gp' ).attr("disabled",false);
			$( '#titel_menu_gp' ).html(group_nm);
				$.ajax({
				url     : 'http://192.168.161.102/report_access/amn_manage/ajax_getmenu_forgroup',
				type    : 'post',
				dataType: 'json',
				data    :  { "gup" : group_cd  } ,
				success : function(cus)
							{
							var subt = "";
							
							subDetail = cus;
							//console.log(cus);
							for(var x in cus)
							  {
								subt += '<tr value="'+ cus[x]["NUM"] +'">' + "\r\n" ;
								subt += '<td style="text-align: center;">' + cus[x]["MENU_NAME"]   + "</td>" + "\r\n" ;
								
								subt += '<td style="text-align: center;">' + cus[x]["SUB_MENU_NAME"] + "</td>" + "\r\n" ;
								subt += '<td style="text-align: center;">' + cus[x]["SUB_MENU_CD"]   + "</td>" + "\r\n" ;
								
								if   ( cus[x]["STATUSD"] == 1 ) 
									  subt += '<td style="text-align: center;"><span class="label label-success" name="1" id="status' + cus[x]["SUB_MENU_CD"] + '">Enable </span></td>' + "\r\n" ; 
								else  
									  subt += '<td style="text-align: center;"><span class="label label-danger"  name="0" id="status' + cus[x]["SUB_MENU_CD"] + '">Disable</span></td>' + "\r\n" ;
								 
								subt += '<td style="text-align: center;">' + "\r\n" ;
								subt += '<button type="button" id="' + "rmg"+group_cd+cus[x]["SUB_MENU_CD"] +'" value = "'+ cus[x]["SUB_MENU_CD"] +'" class="btn btn-outline btn-warning" style="margin-right: 6px;" > <i class="fa  fa-trash-o"  > </i> </button>' + "\r\n" ;
								subt += "</td>" + "\r\n" ;
								subt += "</tr>" + "\r\n" ;
								
								maxNum = cus[x]["NUM"];
							  }
							  $('#menu_table > tbody').append(subt);






							  
								$( '#menu_table button' ).click(function() 
								{ 
											var currentRow = $(this).closest("tr"); 
											//console.log(currentRow.attr("value"));
											//var col0 = currentRow.find("td:eq(0)").text();
											//var col1 = currentRow.find("td:eq(1)").text(); // get current row 1st TD value
											//var col2 = currentRow.find("td:eq(2)").text(); // get current row 2nd TD
		
											var str_ck = $(this).attr("id").substring(0, 3);
											manage_action( currentRow, str_ck );
									
								});							  
							  
							  
							},

				error   : function(upp)
							{
							   console.log('error');

							}
							
				});	
			n=0;

			 
			 
			 
			 
			 
		}else{ console.log(group_cd); $("#sh_manage_gp" ).attr("hidden", true); }
			
   });

		$( '#add_menu_gp' ).click(function() 
		{
				
				$( '#add_menu_gp' ).attr("disabled",true);
				$.ajax({
				url     : 'http://192.168.161.102/report_access/amn_manage/ajax_getmainmenu',
				type    : 'post',
				dataType: 'json',
				success : function(cus)
							{	
								
								//console.log(cus);
								var str_add  = "";
								//var new_cd   = menu_cd + "s" + cus;
								var inp1;
								var inp2;									 
							
								str_add += '<tr style="text-align: center;">' + "\r\n" ;
								
								str_add += '<td>' ;
								str_add += '<select class="form-control" id="select_menu_tb" style="font-size: 12px;">' ;
								str_add += '<option name="clear" >Select Menu name.</option>' ;
								for(var ng in cus)
								{
									str_add += '<option value="' + cus[ng]["MENU_CD"] +'">' + cus[ng]["MENU_NAME"] + '</option>' + "\r\n";
								}
								
								str_add += '</select>' ;
								str_add += '</td>' + "\r\n" ;
								
								str_add += '<td style="text-align: center;">' +  "</td>" + "\r\n" ;
								str_add += '<td style="text-align: center;">' + "</td>" + "\r\n" ;
								str_add += '<td style="text-align: center;"></td>' + "\r\n" ;
								str_add += '<td style="text-align: center;">' + "\r\n" ;
								//str_add += '<button type="button" id="' + "rmg_gp" +group_cd+ '" class="btn btn-outline btn-warning" style="margin-right: 6px;" hidden = "true"> <i class="fa  fa-trash-o"  > </i> </button>' + "\r\n" ;

								str_add += '<button type="button" id="' + "san_gp" + '" class="btn btn-outline btn-purple"  style="margin-right: 6px;" > <i class="fa  fa-save"> </i> </button>' + "\r\n" ;
								str_add += '<button type="button" id="' + "can_gp" + '" class="btn btn-outline btn-danger"  style="margin-right: 6px;" > <i class="fa  fa-close" > </i> </button>' + "\r\n" ;		
								//str_add += '<button type="button" id="' + "onf" + new_cd + '" class="btn btn-outline btn-success" style="margin-right: 6px;" hidden = "true"> <i class="fa  fa-power-off"> </i> </button>' + "\r\n" ;					
								str_add += "</td>" + "\r\n" ;
								str_add += "</tr>" + "\r\n" ;		
									
								$('#menu_table > tbody').append(str_add);
								
								$( '#menu_table #select_menu_tb' ).change(function() 
								{ 
											var curRow = $(this).closest("tr"); 
											var str_sub_menu = '<option name="clear" >Select Submenu name.</option>' + "\r\n";
											curRow.closest("tr").find("td:eq(2)").html('');
											curRow.closest("tr").find("td:eq(3)").html('');
											
											if( $('#select_menu_tb option:selected').html() ==  'Select Menu name.' )
												{
													curRow.closest("tr").find("td:eq(1)").html('');
												}
											
								     		$.ajax({
								     		url     : 'http://192.168.161.102/report_access/amn_manage/ajax_getsubmenu_forgroup',
								     		type    : 'post',
								     		dataType: 'json',
								     		data    :  { "menu_cd" : $('#select_menu_tb option:selected').attr("value")  } ,
								     		success : function(sub)
								     					{
															for(var sm in sub)
															{
																if( chk_duplicate(subDetail, 'SUB_MENU_NAME', sub[sm]["SUB_MENU_NAME"]) )
																	str_sub_menu += '<option value="' + sub[sm]["SUB_MENU_CD"] +'">' + sub[sm]["SUB_MENU_NAME"] + '</option>' + "\r\n";
															}
															
															curRow.closest("tr").find("td:eq(1)").html('<select class="form-control" id="select_submenu_tb" style="font-size: 12px;">' + str_sub_menu + '</select>');	
														
														

															$( '#menu_table #select_submenu_tb' ).change(function()
															{

																
																if( $('#select_submenu_tb option:selected').html() ==  'Select Menu name.' )
																	{
																		curRow.closest("tr").find("td:eq(2)").html('');
																		curRow.closest("tr").find("td:eq(3)").html('');
																	}																
																
																
																
																$.ajax({
																url     : 'http://192.168.161.102/report_access/amn_manage/ajax_getsubdetail_forgroup',
																type    : 'post',
																dataType: 'json',
																data    :  { "sub_cd" : $('#select_submenu_tb option:selected').attr("value")  } ,
																success : function(dl)
																			{
																				///console.log(dl);
																				curRow.closest("tr").find("td:eq(2)").html(dl[0]['SUB_MENU_CD']);
																				
																				if( dl[0]['SUB_MENU_CD'] == 0 ) 
																					curRow.closest("tr").find("td:eq(3)").html('<span class="label label-danger"   name="0" >Disable</span>');
																				else
																					curRow.closest("tr").find("td:eq(3)").html('<span class="label label-success"  name="1" >Enable </span>');
																			}

																});																																
															});
														
														
														
														
														}

											});
											
											//var col0 = currentRow.find("td:eq(0)").text();
											//var col1 = currentRow.find("td:eq(1)").text(); // get current row 1st TD value
											//var col2 = currentRow.find("td:eq(2)").text(); // get current row 2nd TD
		
											//var str_ck = $(this).attr("id").substring(0, 3);
											//manage_action( currentRow, str_ck );
									
								});	
								
								$( '#menu_table #can_gp' ).click(function() 
								{									
									$( $(this).closest("tr") ).remove();
																			
									$( '#add_menu_gp' ).attr("disabled",false);
									
								});
								
								$( '#menu_table #san_gp' ).click(function() 
								{ 			
								
									var td_srt = $(this).closest("tr");
									data0 = group_cd;
									data1 = $('#select_menu_tb option:selected').attr("value");
									data2 = $('#select_menu_tb option:selected').html();
									data3 = $(this).closest("tr").find("td:eq(2)").text();
									
									
									
									//var stu = $(this).closest("tr").find("td:eq(2)").text();
									
									
									
								//	inp1 = $('#' + new_cd + '1' ).val().trim();
								//	inp2 = $('#' + new_cd + '2' ).val().trim();
	                            //
								//	inp0 = $(this).closest("tr").find("td:eq(0)").text();
								//	var this_tr = $(this).closest("tr");
								//	if( check_sve( $(this).closest("tr"), inp1 , inp2) == true )
								//	{
								//	//console.log( inp1.indexOf(' ') >= 0);
	                            //
								//		
										$.ajax({
										url     : 'http://192.168.161.102/report_access/amn_manage/ajax_setgroup_user',
										type    : 'post',
										dataType: 'text',
										data    :  { "gup_cd" : data0, "menu_cd" : data1, "menu_name" : data2, "sub_cd" : data3  } ,
										success : function(flg)
													{
														
														console.log(flg);
														if(flg == 0)
														{
															$('#modal-error h5').html('Error Duplicate data');
															
															$('#modal-error .modal-body p').html(' Save does not have some data to be duplicate.');
															
															//this_tr.find("td:eq(1)").html('<input type="text" id="' + inp0 +'1" ' + 'class="form-control-edit" value="'+ inp1  + '" style="font-size: 12px; color:#FF00FF">');
															//this_tr.find("td:eq(2)").html('<input type="text" id="' + inp0 +'2" ' + 'class="form-control-edit" value="'+ inp2  + '" style="font-size: 12px; color:#FF0000">');
															
															$('#modal-error').modal('toggle');
														}
														else
														{
															td_srt.find("td:eq(0)").html(data2);
															td_srt.find("td:eq(1)").html( $('#select_submenu_tb option:selected').html() );
															td_srt.find("td:eq(4)").html( '<button type="button" id="' + "rmg_gp" +group_cd+data3+'" class="btn btn-outline btn-warning" style="margin-right: 6px;"> <i class="fa  fa-trash-o"  > </i> </button>' );
															
															

															
															
															subDetail.push({ NUM : (++maxNum).toString(), MENU_CD : data1, MENU_NAME : data2, SUB_MENU_CD : data3, SUB_MENU_NAME : td_srt.find("td:eq(1)").text(), GROUP_CD: data0, STATUSD:1,  CREATE_DATE: null, UPDATE_DATE: null, UPDATE_BY:null  });
															
															console.log(subDetail);
															$( '#menu_table #san_gp' ).attr("hidden", true);
															$( '#menu_table #can_gp' ).attr("hidden", true);	
                                
															$( '#add_menu_gp' ).attr("disabled",false);
														}
													}
										});
										
									//	$( '#edt'+ inp0 ).click(function() 
									//	{
									//		var currentRow1 = $(this).closest("tr"); 
                                    //
									//		var str_ck1 = $(this).attr("id").substring(0, 3);
									//		manage_action(currentRow1, str_ck1);
									//	});								
									//	$( '#sav'+ inp0 ).click(function() 
									//	{
									//		var currentRow1 = $(this).closest("tr"); 
                                    //
									//		var str_ck1 = $(this).attr("id").substring(0, 3);
									//		manage_action(currentRow1, str_ck1);
									//	});
									//	$( '#rem'+ inp0 ).click(function() 
									//	{
									//		var currentRow1 = $(this).closest("tr"); 
                                    //
									//		var str_ck1 = $(this).attr("id").substring(0, 3);
									//		manage_action(currentRow1, str_ck1);
									//	});										
									//	$( '#onf'+ inp0 ).click(function() 
									//	{
									//		var currentRow1 = $(this).closest("tr"); 
                                    //
									//		var str_ck1 = $(this).attr("id").substring(0, 3);
									//		manage_action(currentRow1, str_ck1);
									//	});										
										
										
										
									//}										
								});
																		
									
									
									
									
									//$( '#add_menu' ).attr("disabled",false);
																	
							}
	
				});				 
		}); 



   
//$('#modal-in').modal('toggle');				  
  });
 
function chk_duplicate(main_data, index, str_chk)
{
	for( let g in main_data)
	{
		if( main_data[g][index] == str_chk)
			return false;
	}
	
	return true;
}

 
function manage_action(env_tr, env_id)
{
		data0 = env_tr.find("td:eq(0)").text();
		data1 = env_tr.find("td:eq(1)").text();	
		data2 = env_tr.find("td:eq(2)").text();	
		
		var num_rem = env_tr.attr("value");
		switch ( env_id )
		{
		case "rmg" : 
					console.log("delect");
					$.ajax({
					url     : 'http://192.168.161.102/report_access/amn_manage/ajax_rmgroup_us',
					type    : 'post',
					dataType: 'text',
					data    :  { "num" : num_rem } ,
					success : function(flg)
								{
									console.log(flg);
									console.log(typeof flg);
									if(flg == 1)
									{
										$( env_tr ).remove();
                    
									}
									else
									{
											$('#modal-error h5').html('Error remove data');
											
											$('#modal-error .modal-body p').html('Remove does not have some data to be error.');
											
											$('#modal-error').modal('toggle');
									}
								}
					});						
					break;
		case 'edt' :
					$("#sav"+data0 ).attr("hidden", false);
					$("#edt"+data0 ).attr("hidden", true);
					

					
					env_tr.find("td:eq(1)").html('<input type="text" id="' + data0 + '1"' +'class="form-control-edit" value="'+ data1  + '" style="font-size: 12px;">');
					env_tr.find("td:eq(2)").html('<input type="text" id="' + data0 + '2"' +'class="form-control-edit" value="'+ data2  + '" style="font-size: 12px;">');
					
					console.log(data1);
					console.log(data2);					
					
					
					break;														
	    }


}


function check_sve(ck_tr, p1, p2)
{
	
	id_fun = ck_tr.find("td:eq(0)").text();
	
	if( p1 != "" && p2 != "" && p2.indexOf(' ') < 0 )
	{
		console.log("Is save");
	    ck_tr.find("td:eq(1)").html(p1);
	    ck_tr.find("td:eq(2)").html(p2);	
		
		return true;
	}
	else if ( p2.indexOf(' ') >= 0 ) 
	{
		$('#modal-error h5').html('Error spaces data');
		
		$('#modal-error .modal-body p').html(' Save does not have some data to be spaces.');
		
		ck_tr.find("td:eq(2)").html('<input type="text" id="' + id_fun +'2" ' + 'class="form-control-edit" value="'+ p2  + '" style="font-size: 12px; color:#FF0000">');
		
		
		$('#modal-error').modal('toggle');
		//console.log(p2 + ' R ' + p2.indexOf(' ') );
		return false;
	}
	else
	{
		
		$('#modal-error').modal('toggle');
		$('#modal-error h5').html('Error Empty data');
		
		
		console.log(p1 + ' R ' + p2.indexOf(' ') );
		return false;
	
	}
}	
  
  

function currencyFormat(num) {
  return Number.parseFloat(num).toFixed(2).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
