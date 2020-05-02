  $(document).ready(function() 
  
  {
  $(function()
  
  {
   $('#hid_sm').click(function() 
   
   { 
    
     $("#modal_tbsm" ).attr("hidden", true);

	 $("#bnt_sm" ).attr("hidden", false);
	// $("#bnt_sm" ).attr("hidden", true);
	 $("#hid_sm" ).attr("hidden", true);
			
   });

   $('#hid_bh').click(function() 
   
   { 
   
    	
	$("#modal_tbbh" ).attr("hidden", true);

	 $("#bnt_bh" ).attr("hidden", false);
	// $("#bnt_bh" ).attr("hidden", true);
	 $("#hid_bh" ).attr("hidden", true);
	
   });

   $('#hid_ig').click(function() 
   
   { 

	$("#modal_tbig" ).attr("hidden", true);

	 $("#bnt_ig" ).attr("hidden", false);
	
	 $("#hid_ig" ).attr("hidden", true);

			
   });

   $('#hid_im').click(function() 
   
   { 

	$("#modal_tbim" ).attr("hidden", true);

	 $("#bnt_im" ).attr("hidden", false);
	
	 $("#hid_im" ).attr("hidden", true);
	
			
   });

   $('#hid_pl').click(function() 
   
   { 

	$("#modal_tbpl" ).attr("hidden", true);

	 $("#bnt_pl" ).attr("hidden", false);
	
	 $("#hid_pl" ).attr("hidden", true);
			
   });
   

 
   
  });

});
function currencyFormat(num) {
  return Number.parseFloat(num).toFixed(2).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
