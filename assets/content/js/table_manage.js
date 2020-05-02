  
  	  var menu_cd;
	  var menu_gp;
	  var data0 ;
	  var data1 ;
	  var data2 ;
  
  $(document).ready(function()   
  {
	  //sm_bnte = 0;

	  
	  //var currentRow;
   $('#select_menu').change(function() 
   { 
			menu_gp = $('#select_menu option:selected').attr("name");
		    menu_cd = $('#select_menu option:selected').attr("value");
		$('#sub_table tbody').html('');
		
		var sub_head  = '<tr  style="text-align: center;">' + "\r\n" ;
			sub_head += '<td style=" width: 10%;">' + "Sub menu code" + "</td>" + "\r\n" ;
		    sub_head += '<td style=" width: 20%;">' + "Sub menu name" + "</td>" + "\r\n" ;
		    sub_head += '<td style=" width: 20%;">' + "Link"          + "</td>" + "\r\n" ;
		    sub_head += '<td style=" width: 10%;">' + "Status"        + "</td>" + "\r\n" ;
			sub_head += '<td style=" width: 20%;">' + "Option"        + "</td>" + "\r\n" ;
			sub_head += "</tr>" + "\r\n" ;
 
 
 
		//console.log(menu_gp);
 		if( menu_gp != 'clear' )
		{
			$( "#sh_manage" ).attr("hidden", false);
			$( '#add_menu' ).attr("disabled",false);
			$( '#titel_menu' ).html(menu_gp);
				$.ajax({
				url     : 'http://192.168.161.102/report_access/amn_manage/ajax_getmenu',
				type    : 'post',
				dataType: 'json',
				data    :  { "menu" : menu_cd  } ,
				success : function(cus)
							{
							var subt = "";
							//console.log(cus);
							for(var x in cus)
							  {
								subt += '<tr>' + "\r\n" ;
								subt += '<td style="text-align: center;">' + cus[x]["SUB_MENU_CD"]   + "</td>" + "\r\n" ;
								subt += "<td>" + cus[x]["SUB_MENU_NAME"] + "</td>" + "\r\n" ;
								subt += "<td>" + cus[x]["LINK"] 		 + "</td>" + "\r\n" ;
								
								if   ( cus[x]["STATUSD"] == 1 ) 
									  subt += '<td style="text-align: center;"><span class="label label-success" name="1" id="status' + cus[x]["SUB_MENU_CD"] + '">Enable </span></td>' + "\r\n" ; 
								else  
									  subt += '<td style="text-align: center;"><span class="label label-danger"  name="0" id="status' + cus[x]["SUB_MENU_CD"] + '">Disable</span></td>' + "\r\n" ;
								 
								subt += '<td style="text-align: center;">' + "\r\n" ;
								subt += '<button type="button" id="' + "rem"+cus[x]["SUB_MENU_CD"] +'" value = "'+ cus[x]["SUB_MENU_CD"] +'" class="btn btn-outline btn-warning" style="margin-right: 6px;" > <i class="fa  fa-trash-o"  > </i> </button>' + "\r\n" ;
								subt += '<button type="button" id="' + "edt"+cus[x]["SUB_MENU_CD"] +'" value = "'+ cus[x]["SUB_MENU_CD"] +'" class="btn btn-outline btn-pink"    style="margin-right: 6px;" > <i class="fa  fa-pencil"   > </i> </button>' + "\r\n" ;
								subt += '<button type="button" id="' + "sav"+cus[x]["SUB_MENU_CD"] +'" value = "'+ cus[x]["SUB_MENU_CD"] +'" class="btn btn-outline btn-purple"  style="margin-right: 6px;" hidden = "true"> <i class="fa  fa-save"> </i> </button>' + "\r\n" ;
								subt += '<button type="button" id="' + "onf"+cus[x]["SUB_MENU_CD"] +'" value = "'+ cus[x]["SUB_MENU_CD"] +'" class="btn btn-outline btn-success" style="margin-right: 6px;" > <i class="fa  fa-power-off"> </i> </button>' + "\r\n" ;							
								subt += "</td>" + "\r\n" ;
								subt += "</tr>" + "\r\n" ;
								
								
							  }
							  //console.log(sub_head + subt);
							  
							  $('#sub_table > tbody').append(subt);
							  
								$( '#sub_table button' ).click(function() 
								{ 
											var currentRow = $(this).closest("tr"); 
						 
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

			 
			 
			 
			 
			 
		}else{ console.log(menu_gp); $("#sh_manage" ).attr("hidden", true); }
			
   });

		$( '#add_menu' ).click(function() 
		{
				console.log(n++);
				$( '#add_menu' ).attr("disabled",true);
				$.ajax({
				url     : 'http://192.168.161.102/report_access/amn_manage/ajax_newcode',
				type    : 'post',
				dataType: 'text',
				data    :  { "menu" : menu_cd  } ,
				success : function(cus)
							{	
							
								console.log(cus);
								var str_add  = "";
								var new_cd   = menu_cd + "s" + cus;
								var inp1;
								var inp2;									 
							
								str_add += '<tr>' + "\r\n" ;
								str_add += '<td style="text-align: center;">' + new_cd + "</td>" + "\r\n" ;
								str_add += "<td>" + '<input type="text" id="' + new_cd + '1" class="form-control-edit" style="font-size: 12px;">' + "</td>" + "\r\n" ;
								str_add += "<td>" + '<input type="text" id="' + new_cd + '2" class="form-control-edit" style="font-size: 12px;">' + "</td>" + "\r\n" ;
								
								str_add += '<td style="text-align: center;"><span class="label label-danger"  name="0" id="status' + new_cd + '">Disable</span></td>' + "\r\n" ;
								str_add += '<td style="text-align: center;">' + "\r\n" ;
								str_add += '<button type="button" id="' + "rem" + new_cd + '" class="btn btn-outline btn-warning" style="margin-right: 6px;" hidden = "true"> <i class="fa  fa-trash-o"  > </i> </button>' + "\r\n" ;
								str_add += '<button type="button" id="' + "edt" + new_cd + '" class="btn btn-outline btn-pink"    style="margin-right: 6px;" hidden = "true"> <i class="fa  fa-pencil"   > </i> </button>' + "\r\n" ;
								str_add += '<button type="button" id="' + "sav" + new_cd + '" class="btn btn-outline btn-purple"  style="margin-right: 6px;" hidden = "true"> <i class="fa  fa-save"> </i> </button>' + "\r\n" ;
								str_add += '<button type="button" id="' + "san" + new_cd + '" class="btn btn-outline btn-purple"  style="margin-right: 6px;" > <i class="fa  fa-save"> </i> </button>' + "\r\n" ;
								str_add += '<button type="button" id="' + "can" + new_cd + '" class="btn btn-outline btn-danger"  style="margin-right: 6px;" > <i class="fa  fa-close" > </i> </button>' + "\r\n" ;		
								str_add += '<button type="button" id="' + "onf" + new_cd + '" class="btn btn-outline btn-success" style="margin-right: 6px;" hidden = "true"> <i class="fa  fa-power-off"> </i> </button>' + "\r\n" ;					
								str_add += "</td>" + "\r\n" ;
								str_add += "</tr>" + "\r\n" ;		
									
								$('#sub_table > tbody').append(str_add);
							
								$( 'table #can'+new_cd ).click(function() 
								{									
									$( $(this).closest("tr") ).remove();
																			
									$( '#add_menu' ).attr("disabled",false);
									
								});
								
								$( 'table #san'+new_cd ).click(function() 
								{ 			
									inp1 = $('#' + new_cd + '1' ).val().trim();
									inp2 = $('#' + new_cd + '2' ).val().trim();
	
									inp0 = $(this).closest("tr").find("td:eq(0)").text();
									var this_tr = $(this).closest("tr");
									if( check_sve( $(this).closest("tr"), inp1 , inp2) == true )
									{
									//console.log( inp1.indexOf(' ') >= 0);
	
										
										$.ajax({
										url     : 'http://192.168.161.102/report_access/amn_manage/ajax_addsub',
										type    : 'post',
										dataType: 'text',
										data    :  { "menu_cd" : menu_cd, "menu_name" : menu_gp, "sub_cd" : inp0, "sub_name" : inp1, "link" : inp2  } ,
										success : function(flg)
													{
														if(flg == 0)
														{
															$('#modal-error h5').html('Error Duplicate data');
															
															$('#modal-error .modal-body p').html(' Save does not have some data to be duplicate.');
															
															this_tr.find("td:eq(1)").html('<input type="text" id="' + inp0 +'1" ' + 'class="form-control-edit" value="'+ inp1  + '" style="font-size: 12px; color:#FF00FF">');
															this_tr.find("td:eq(2)").html('<input type="text" id="' + inp0 +'2" ' + 'class="form-control-edit" value="'+ inp2  + '" style="font-size: 12px; color:#FF0000">');
															
															$('#modal-error').modal('toggle');
														}
														else
														{
															$("#rem"+inp0 ).attr("hidden", false);
															$("#edt"+inp0 ).attr("hidden", false);
															$("#onf"+inp0 ).attr("hidden", false);
															
															$( "#san"+inp0 ).attr("hidden", true);
															$( "#can"+inp0 ).attr("hidden", true);	

															$( '#add_menu' ).attr("disabled",false);
														}
													}
										});
										
										$( '#edt'+ inp0 ).click(function() 
										{
											var currentRow1 = $(this).closest("tr"); 

											var str_ck1 = $(this).attr("id").substring(0, 3);
											manage_action(currentRow1, str_ck1);
										});								
										$( '#sav'+ inp0 ).click(function() 
										{
											var currentRow1 = $(this).closest("tr"); 

											var str_ck1 = $(this).attr("id").substring(0, 3);
											manage_action(currentRow1, str_ck1);
										});
										$( '#rem'+ inp0 ).click(function() 
										{
											var currentRow1 = $(this).closest("tr"); 

											var str_ck1 = $(this).attr("id").substring(0, 3);
											manage_action(currentRow1, str_ck1);
										});										
										$( '#onf'+ inp0 ).click(function() 
										{
											var currentRow1 = $(this).closest("tr"); 

											var str_ck1 = $(this).attr("id").substring(0, 3);
											manage_action(currentRow1, str_ck1);
										});										
										
										
										
									}										
								});
																		
									
									
									
									
									//$( '#add_menu' ).attr("disabled",false);
																	
							}
	
				});				 
		}); 



   
//$('#modal-in').modal('toggle');				  
  });
  
function manage_action(env_tr, env_id)
{
		data0 = env_tr.find("td:eq(0)").text();
		data1 = env_tr.find("td:eq(1)").text();	
		data2 = env_tr.find("td:eq(2)").text();	
		
		switch ( env_id )
		{
		case "rem" : 
					console.log("delect");
					break;
		case 'edt' :
					$("#sav"+data0 ).attr("hidden", false);
					$("#edt"+data0 ).attr("hidden", true);
					

					
					env_tr.find("td:eq(1)").html('<input type="text" id="' + data0 + '1"' +'class="form-control-edit" value="'+ data1  + '" style="font-size: 12px;">');
					env_tr.find("td:eq(2)").html('<input type="text" id="' + data0 + '2"' +'class="form-control-edit" value="'+ data2  + '" style="font-size: 12px;">');
					
					console.log(data1);
					console.log(data2);					
					
					
					break;
		case 'onf' :
					console.log( $('#status' + data0 ).attr("name") + menu_cd + menu_gp );
					$.ajax({
					url     : 'http://192.168.161.102/report_access/amn_manage/ajax_upstatus',
					type    : 'post',
					dataType: 'text',
					data    :  { "sub_cd" : data0, "status" : $('#status' + data0 ).attr("name")  } ,
					success : function(flg)
								{
									if(flg == 1)
									{
										env_tr.find("td:eq(3)").html('<span class="label label-success" name="1" id="status' + data0 + '">Enable </span>' );

									}
									else
									{
										env_tr.find("td:eq(3)").html('<span class="label label-danger"  name="0" id="status' + data0 + '">Disable</span>' );
									}
								}
					});					
					break;	
		case 'sav' :
					inp1 = $('#' + data0 + '1' ).val().trim();
					inp2 = $('#' + data0 + '2' ).val().trim();					
					console.log(data0 + " : " + inp1 + " : " + inp2);
					if( check_sve( env_tr, inp1 , inp2) == true )
					{					
						$.ajax({
						url     : 'http://192.168.161.102/report_access/amn_manage/ajax_upsub',
						type    : 'post',
						dataType: 'text',
						data    :  { "sub_cd" : data0, "sub_name" : inp1, "link" : inp2  } ,
						success : function(flg)
									{
										console.log(flg);
										if(flg == 0)
										{
											$('#modal-error h5').html('Error Duplicate data');
											
											$('#modal-error .modal-body p').html(' Save does not have some data to be duplicate.');
											
											env_tr.find("td:eq(1)").html('<input type="text" id="' + data0 +'1" ' + 'class="form-control-edit" value="'+ inp1  + '" style="font-size: 12px; color:#FF00FF">');
											env_tr.find("td:eq(2)").html('<input type="text" id="' + data0 +'2" ' + 'class="form-control-edit" value="'+ inp2  + '" style="font-size: 12px; color:#FF0000">');
											
											$('#modal-error').modal('toggle');
										}
										else
										{
											alert('Oor');
											env_tr.find("td:eq(1)").html( $( '#' + data0 + '1' ).val() );
											env_tr.find("td:eq(2)").html( $( '#' + data0 + '2' ).val() );										
											$("#sav"+data0 ).attr("hidden", true);
											$("#edt"+data0 ).attr("hidden", false);
											
										}
									}
						});			

					}
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
