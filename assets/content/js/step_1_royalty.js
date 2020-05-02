  $(document).ready(function() {
  $(function(){
   $('#but1').click(function() { 

       date_sale = [$('#wdate1').val(), $('#wdate2').val() ];

		erro = 0
        $("#sm1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #000000;"><i class="fa  fa-spinner fa-spin"></i></h6>');
        $("#bh1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #000000;"><i class="fa  fa-spinner fa-spin"></i></h6>');
        $("#pl1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #000000;"><i class="fa  fa-spinner fa-spin"></i></h6>');
        $("#ig1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #000000;"><i class="fa  fa-spinner fa-spin"></i></h6>');
        $("#im1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #000000;"><i class="fa  fa-spinner fa-spin"></i></h6>');
       
        $("#sm" ).attr("hidden", false);
        $("#sm1").attr("hidden", false);
        $("#bh" ).attr("hidden", false);
        $("#bh1").attr("hidden", false);
        $("#ig" ).attr("hidden", false);
        $("#ig1").attr("hidden", false);
        $("#pl" ).attr("hidden", false);
        $("#pl1").attr("hidden", false);
        $("#im" ).attr("hidden", false);
        $("#im1").attr("hidden", false);            

       $.ajax({
        url     : 'http://192.168.161.102/report_access/royalty_app/json_getdata_sm',
        type    : 'post',
        dataType: 'text',
        data    :  { kvcArray : $('#wdate1').val(), kvcArray2 : $('#wdate2').val() },
        success : function(upp)
		
                      {
                      fg = upp;
                      if ( fg == '"complete"' )

                      {

                      $("#sm1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #06D73E;"><i class="fa  fa  fa-check"></i> Complete! </h6>');
					   
						
                      }

                      else

                      {

                      $("#sm1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #FF9149;"><i class="fa  fa  fa-exclamation"></i> No data! </h6>');

                      }
					  erro ++;
                      console.log(fg);
					  myFunction();					  
                     },
        error : function(upp)

                    {
                       $("#sm1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #FF4999;"><i class="fa  fa  fa-close"></i> Error! </h6>');
					   erro --;
                      console.log('error');

                    }
       });

       $.ajax({
        url     : 'http://192.168.161.102/report_access/royalty_app/json_getdata_bh',
        type    : 'post',
        dataType: 'text',
        data    :  { kvcArray : $('#wdate1').val(), kvcArray2 : $('#wdate2').val() },
        success : function(upp)

                      {
                      fg = upp;
                      //$('#but1').removeClass('btn btn-primary').addClass('btn btn-rounded btn-success');
                      if (fg == '"complete"')

                      {
                        
                       $("#bh1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #06D73E;"><i class="fa  fa  fa-check"></i> Complete! </h6>');

                      }

                      else

                      {

                       $("#bh1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #FF9149;"><i class="fa  fa  fa-exclamation"></i> No data! </h6>');

                      }
					  erro ++;
                      console.log(upp); 
					  myFunction();					  
                     },
        error : function(upp)
					
                    {
						console.log(upp)
                       $("#bh1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #FF4999;"><i class="fa  fa  fa-close"></i> Error! </h6>');
					   erro --;
                      console.log('error');

                    }
       });

       $.ajax({
        url     : 'http://192.168.161.102/report_access/royalty_app/json_getdata_pl',
        type    : 'post',
        dataType: 'text',
        data    :  { kvcArray : $('#wdate1').val(), kvcArray2 : $('#wdate2').val() },
        success : function(upp)

                      {
                      fg = upp;
                      //$('#but1').removeClass('btn btn-primary').addClass('btn btn-rounded btn-success');
                      if (fg == '"complete"')

                      {

                      $("#pl1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #06D73E;"><i class="fa  fa  fa-check"></i> Complete! </h6>');

                      }

                      else

                      {

                      $("#pl1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #FF9149;"><i class="fa  fa  fa-exclamation"></i> No data! </h6>');

                      }
					  erro ++;
                      console.log(fg);
					  myFunction();					  
                     },
        error : function(upp)

                    {
                       $("#pl1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #FF4999;"><i class="fa  fa  fa-close"></i> Error! </h6>');
					   erro --;
                      console.log('error');

                    }

       });

       $.ajax({
        url     : 'http://192.168.161.102/report_access/royalty_app/json_getdata_ig',
        type    : 'post',
        dataType: 'text',
        data    :  { kvcArray : $('#wdate1').val(), kvcArray2 : $('#wdate2').val() },
        success : function(upp)

                      {
                      fg = upp;
                      //$('#but1').removeClass('btn btn-primary').addClass('btn btn-rounded btn-success');
                      if (fg == '"complete"')

                      {

                      $("#ig1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #06D73E;"><i class="fa  fa  fa-check"></i> Complete! </h6>');

                      }

                      else

                      {

                      $("#ig1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #FF9149;"><i class="fa  fa  fa-exclamation"></i> No data! </h6>');
					  

                      }
                      //$('#i1').removeClass('fa  fa-spinner fa-spin').addClass('fa  fa-check');

                      erro ++;
                      console.log(fg);
					  myFunction();					  
                     },
        error : function(upp)

                    {
                       $("#ig1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #FF4999;"><i class="fa  fa  fa-close"></i> Error! </h6>');
					   erro --;
                      console.log('error');


                    }

       });


       $.ajax({
        url     : 'http://192.168.161.102/report_access/royalty_app/json_getdata_im',
        type    : 'post',
        dataType: 'text',
        data    :  { kvcArray : $('#wdate1').val(), kvcArray2 : $('#wdate2').val() },
        success : function(upp){
                      fg = upp;
                      //$('#but1').removeClass('btn btn-primary').addClass('btn btn-rounded btn-success');
                      if (fg == '"complete"')

                      {

                      $("#im1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #06D73E;"><i class="fa  fa  fa-check"></i> Complete! </h6>');

                      }

                      else

                      {

                      $("#im1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #FF9149;"><i class="fa  fa  fa-exclamation"></i> No data! </h6>');
                      
                      }
					  

					  
					  
					  
					  
					  
					  erro ++;
                      console.log(fg);
					  myFunction();
					  
                    },
        error : function(upp)

                    {

                       $("#im1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #FF4999;"><i class="fa  fa  fa-close"></i> Error! </h6>');
					   erro --;
                       console.log('error');

                    }

       });

  
	   
   });

});

});
