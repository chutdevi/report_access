  $(document).ready(function() 
  
  {
	var t_head, t_body, t_foot;  
	  
  $(function()
  {

   $('#sac_sm').click(function() 
   { 
	hidden_edit();
	//$("#view_tbsm" ).attr("hidden", true);	
	$("#view_tbbh" ).attr("hidden", true);
	$("#view_tbig" ).attr("hidden", true);
	$("#view_tbim" ).attr("hidden", true);
	$("#view_tbpl" ).attr("hidden", true);
	//sm_hide[1] = 0;
	bh_hide[1] = 0;
	ig_hide[1] = 0;
	im_hide[1] = 0;
	pl_hide[1] = 0;	
		if ( sm_hide[1] == 0 )			
			{

			   $("#view_tbsm" ).attr("hidden", false);
			   sm_hide[1] = 1;
			   
			   
			}			
		else		
			{
				console.clear();
				$("#view_tbsm" ).attr("hidden", true);
				sm_hide[1] = 0;	
			}

   });

   $('#sac_bh').click(function() 
   { 
 	hidden_edit();
	$("#view_tbsm" ).attr("hidden", true);	
	//$("#view_tbbh" ).attr("hidden", true);
	$("#view_tbig" ).attr("hidden", true);
	$("#view_tbim" ).attr("hidden", true);
	$("#view_tbpl" ).attr("hidden", true);
	sm_hide[1] = 0;
	//bh_hide[1] = 0;
	ig_hide[1] = 0;
	im_hide[1] = 0;
	pl_hide[1] = 0;	
		if ( bh_hide[1] == 0 )			
			{

			   $("#view_tbbh" ).attr("hidden", false);
			   bh_hide[1] = 1;
			   
			   
			}			
		else		
			{
				console.clear();
				$("#view_tbbh" ).attr("hidden", true);
				bh_hide[1] = 0;	
			}
			
   });

   $('#sac_ig').click(function()  
   { 
	hidden_edit();
	$("#view_tbsm" ).attr("hidden", true);	
	$("#view_tbbh" ).attr("hidden", true);
	//$("#view_tbig" ).attr("hidden", true);
	$("#view_tbim" ).attr("hidden", true);
	$("#view_tbpl" ).attr("hidden", true);
	sm_hide[1] = 0;
	bh_hide[1] = 0;
	//ig_hide[1] = 0;
	im_hide[1] = 0;
	pl_hide[1] = 0;	
		if ( ig_hide[1] == 0 )			
			{

			   $("#view_tbig" ).attr("hidden", false);
			   ig_hide[1] = 1;
			   
			   
			}			
		else		
			{
				console.clear();
				$("#view_tbig" ).attr("hidden", true);
				ig_hide[1] = 0;	
			}			
			
   });

   $('#sac_im').click(function() 
   { 
	hidden_edit();
	$("#view_tbsm" ).attr("hidden", true);	
	$("#view_tbbh" ).attr("hidden", true);
	$("#view_tbig" ).attr("hidden", true);
	//$("#view_tbim" ).attr("hidden", true);
	$("#view_tbpl" ).attr("hidden", true);
	sm_hide[1] = 0;
	bh_hide[1] = 0;
	ig_hide[1] = 0;
	//im_hide[1] = 0;
	pl_hide[1] = 0;	
		if ( im_hide[1] == 0 )			
			{

			   $("#view_tbim" ).attr("hidden", false);
			   im_hide[1] = 1;
			   
			   
			}			
		else		
			{
				console.clear();
				$("#view_tbim" ).attr("hidden", true);
				im_hide[1] = 0;	
			}		
			
   });

   $('#sac_pl').click(function()  
   { 
	hidden_edit();
	$("#view_tbsm" ).attr("hidden", true);	
	$("#view_tbbh" ).attr("hidden", true);
	$("#view_tbig" ).attr("hidden", true);
	$("#view_tbim" ).attr("hidden", true);
	//$("#view_tbpl" ).attr("hidden", true);
	sm_hide[1] = 0;
	bh_hide[1] = 0;
	ig_hide[1] = 0;
	im_hide[1] = 0;
	//pl_hide[1] = 0;		
		if ( pl_hide[1] == 0 )			
			{

			   $("#view_tbpl" ).attr("hidden", false);
			   pl_hide[1] = 1;
			   
			   
			}			
		else		
			{
				console.clear();
				$("#view_tbpl" ).attr("hidden", true);
				pl_hide[1] = 0;	
			}		
			
   });
   
  });

});
function currencyFormat(num) {
  return Number.parseFloat(num).toFixed(2).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
function hidden_edit()
{
	
	//console.log($("#modal_tbsm" ).val());
	$("#modal_tbsm" ).attr("hidden", true);	
	$("#modal_tbbh" ).attr("hidden", true);
	$("#modal_tbig" ).attr("hidden", true);
	$("#modal_tbim" ).attr("hidden", true);
	$("#modal_tbpl" ).attr("hidden", true);
	
	$("#hid_sm" ).attr("hidden", true);	
	$("#hid_bh" ).attr("hidden", true);
	$("#hid_ig" ).attr("hidden", true);
	$("#hid_im" ).attr("hidden", true);
	$("#hid_pl" ).attr("hidden", true);
	
	$("#bnt_sm" ).attr("hidden", false);	
	$("#bnt_bh" ).attr("hidden", false);
	$("#bnt_ig" ).attr("hidden", false);
	$("#bnt_im" ).attr("hidden", false);
	$("#bnt_pl" ).attr("hidden", false);	
	
}


