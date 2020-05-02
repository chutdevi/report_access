function myFunction() 

{
	
				  //
				  if ( erro == 5 )
					  {
						console.clear();	
						console.log( erro );
						complete_page[0] = 1;
						   $.ajax({
							url     : 'http://192.168.161.102/report_access/royalty_app/json_get_boi',
							type    : 'post',
							dataType: 'text',
							data    :  { kvcArray : $('#wdate1').val(), kvcArray2 : $('#wdate2').val() },
							success : function(){	}				  
							});
		   
						  $.ajax({
							url     : 'http://192.168.161.102/report_access/royalty_app/json_get_tbk_rm',
							type    : 'post',
							dataType: 'text',
							data    :  { kvcArray : $('#wdate1').val(), kvcArray2 : $('#wdate2').val() },
							success : function(){
										   $.ajax({
											url     : 'http://192.168.161.102/report_access/royalty_app/json_getdata_match_cnt',
											type    : 'post',
											dataType: 'json',
											success : function(cnt){
														  fg = cnt;
														  data_match = fg; 
														  ct = cnt['sm'].length + cnt['bh'].length +  cnt['ig'].length + cnt['im'].length + cnt['pl'].length;
														 console.log(  ct );
														  
														if ( ct == 0 )
														{
														   $("#mch_cnt").html( '<h6 style="font-family: Arial; font-style: oblique; font-size: 42px; margin-top: 12px; color: #06D73E;"><i class="fa  fa  fa-check-circle-o"></i></h6>');
														   $("#mch_cnt5").html('<h5 style="font-family: Arial; font-style: oblique; font-size: 33px; margin-top: 18px; color: #06D73E;">Data is correct.</h5>');
															
														}
														else $("#mch").attr("hidden", true);
														  
														  $("#sm_cnt").html(' Found data is not compatible with Master ' + cnt['sm'].length + ' item.');
														  $("#bh_cnt").html(' Found data is not compatible with Master ' + cnt['bh'].length + ' item.');
														  $("#ig_cnt").html(' Found data is not compatible with Master ' + cnt['ig'].length + ' item.');
														  $("#im_cnt").html(' Found data is not compatible with Master ' + cnt['im'].length + ' item.');
														  $("#pl_cnt").html(' Found data is not compatible with Master ' + cnt['pl'].length + ' item.');
														  
														if ( cnt['sm'].length > 0 ) $("#a_sm").attr("hidden", false);
														if ( cnt['bh'].length > 0 ) $("#a_bh").attr("hidden", false);
														if ( cnt['ig'].length > 0 ) $("#a_ig").attr("hidden", false);
														if ( cnt['im'].length > 0 ) $("#a_im").attr("hidden", false);
														if ( cnt['pl'].length > 0 ) $("#a_pl").attr("hidden", false);
														complete_page[1] = 1;
														},
											error : function(upp)
														{
														   console.log('error');
														}
										   });
							}				  
							}); 						
						



					  }
  
}