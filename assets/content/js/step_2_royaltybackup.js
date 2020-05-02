  $(document).ready(function() 
  
  {
  $(function()
  
  {
   $('hid_sm').click(function() 
   
   { 
				$('#modal_tb').html("");
				head_col  =   '  <table class="table table-hover" >'  + "\r\n";
				head_col +=   '  <tr>                      '  + "\r\n";
                head_col +=   '    <th>CODE</th>           '  + "\r\n";
                head_col +=   '    <th>PART NO</th>        '  + "\r\n";
                head_col +=   '    <th>PART NAME</th>      '  + "\r\n";
                head_col +=   '    <th>MODEL</th>          '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >PRICE</th>          '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >QTY.</th>           '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >AMOUNT</th>         '  + "\r\n";
                head_col +=   '    <th style="text-align: center;" >OPTION</th>         '  + "\r\n";    
                head_col +=   '  </tr>                     '  + "\r\n";
				//$('#modal_tb').html(head_col)
				console.log( $('hid_sm').val() );
                                    for(var p in data_match[$('hid_sm').val()])
										
                                    {
										
										//console.log(p);
										//console.log( data_match[$('hid').val()][p]);
											head_col +=   ' <tr>                                                                            ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +currencyFormat(data_match[$('hid_sm').val()][p]["PRICE"] ) +'</td>                                                                    ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +formatNumber(  data_match[$('hid_sm').val()][p]["QTY"]   ) +'</td>                                                                    ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +currencyFormat(data_match[$('hid_sm').val()][p]["AMOUNT"]) +'</td>                                                                   ' + "\r\n";
											head_col +=   '	<td><button type="button" id="sac'+$('hid_sm').val() + p + '" value = "'+$('hid_sm').val()+'" class="btn btn-outline btn-primary mb-5"> <i class="fa  fa-search" > </i> </button>   ' + "\r\n";
											head_col +=   '		<button type="button" id="sav'+$('hid_sm').val() + p + '" value = "'+$('hid_sm').val()+'" class="btn btn-outline btn-success mb-5"> <i class="fa   fa-save" > </i>  </button>   ' + "\r\n";
											head_col +=   '	</td>' +    "\r\n";
											head_col +=   ' </tr>' +	"\r\n";	
											
									}
									
									head_col +=   '</table>' +	"\r\n";	
									$('#modal_tb').html(head_col);
			//console.log( head_col );				
			
   });

   $('hid_bh').click(function() 
   
   { 
				$('#modal_tb').html("");
				head_col  =   '  <table class="table table-hover" >'  + "\r\n";
				head_col +=   '  <tr>                      '  + "\r\n";
                head_col +=   '    <th>CODE</th>           '  + "\r\n";
                head_col +=   '    <th>PART NO</th>        '  + "\r\n";
                head_col +=   '    <th>PART NAME</th>      '  + "\r\n";
                head_col +=   '    <th>MODEL</th>          '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >PRICE</th>          '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >QTY.</th>           '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >AMOUNT</th>         '  + "\r\n";
                head_col +=   '    <th style="text-align: center;" >OPTION</th>         '  + "\r\n";    
                head_col +=   '  </tr>                     '  + "\r\n";
				//$('#modal_tb').html(head_col)
				console.log( $('hid_bh').val() );
                                    for(var p in data_match[$('hid_bh').val()])
										
                                    {
										
										//console.log(p);
										//console.log( data_match[$('hid').val()][p]);
											head_col +=   ' <tr>                                                                            ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +currencyFormat(data_match[$('hid_bh').val()][p]["PRICE"]  )+'</td>                                                                    ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +formatNumber(  data_match[$('hid_bh').val()][p]["QTY"]    )+'</td>                                                                    ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +currencyFormat(data_match[$('hid_bh').val()][p]["AMOUNT"] )+'</td>                                                                   ' + "\r\n";
											head_col +=   '	<td><button type="button" id="sac'+$('hid_bh').val() + '"value = "'+$('hid_bh').val()+'" class="btn btn-outline btn-primary mb-5"> <i class="fa  fa-search" > </i> </button>   ' + "\r\n";
											head_col +=   '		<button type="button" id="sav'+$('hid_bh').val() + '"value = "'+$('hid_bh').val()+'" class="btn btn-outline btn-success mb-5"> <i class="fa   fa-save" > </i>  </button>   ' + "\r\n";
											head_col +=   '	</td>' +    "\r\n";
											head_col +=   ' </tr>' +	"\r\n";	
											
									}
									
									head_col +=   '</table>' +	"\r\n";	
									$('#modal_tb').html(head_col);
			//console.log( head_col );				
			
   });

   $('hid_ig').click(function() 
   
   { 
				$('#modal_tb').html("");
				head_col  =   '  <table class="table table-hover" >'  + "\r\n";
				head_col +=   '  <tr>                      '  + "\r\n";
                head_col +=   '    <th>CODE</th>           '  + "\r\n";
                head_col +=   '    <th>PART NO</th>        '  + "\r\n";
                head_col +=   '    <th>PART NAME</th>      '  + "\r\n";
                head_col +=   '    <th>MODEL</th>          '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >PRICE</th>          '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >QTY.</th>           '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >AMOUNT</th>         '  + "\r\n";
                head_col +=   '    <th style="text-align: center;" >OPTION</th>         '  + "\r\n";    
                head_col +=   '  </tr>                     '  + "\r\n";
				//$('#modal_tb').html(head_col)
				console.log( $('hid_ig').val() );
                                    for(var p in data_match[$('hid_ig').val()])
										
                                    {
										
										//console.log(p);
										//console.log( data_match[$('hid').val()][p]);
											head_col +=   ' <tr>                                                                            ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +currencyFormat(data_match[$('hid_ig').val()][p]["PRICE"] )+'</td>                                                                    ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +formatNumber(  data_match[$('hid_ig').val()][p]["QTY"]   )+'</td>                                                                    ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +currencyFormat(data_match[$('hid_ig').val()][p]["AMOUNT"]) +'</td>                                                                   ' + "\r\n";
											head_col +=   '	<td><button type="button" id="sac'+$('hid_ig').val() + '" value = "'+$('hid_ig').val()+'" class="btn btn-outline btn-primary mb-5"> <i class="fa  fa-search" > </i> </button>   ' + "\r\n";
											head_col +=   '		<button type="button" id="sav'+$('hid_ig').val() + '" value = "'+$('hid_ig').val()+'" class="btn btn-outline btn-success mb-5"> <i class="fa   fa-save" > </i>  </button>   ' + "\r\n";
											head_col +=   '	</td>' +    "\r\n";
											head_col +=   ' </tr>' +	"\r\n";	
											
									}
									
									head_col +=   '</table>' +	"\r\n";	
									$('#modal_tb').html(head_col);
			//console.log( head_col );				
			
   });

   $('hid_im').click(function() 
   
   { 
				$('#modal_tb').html("");
				head_col  =   '  <table class="table table-hover" >'  + "\r\n";
				head_col +=   '  <tr>                      '  + "\r\n";
                head_col +=   '    <th>PART NO</th>        '  + "\r\n";
                head_col +=   '    <th>PART NAME</th>      '  + "\r\n";
                head_col +=   '    <th>MODEL</th>          '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >PRICE</th>          '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >QTY.</th>           '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >AMOUNT</th>         '  + "\r\n";
                head_col +=   '    <th style="text-align: center;" >OPTION</th>         '  + "\r\n";    
                head_col +=   '  </tr>                     '  + "\r\n";
				//$('#modal_tb').html(head_col)
				console.log( $('hid_im').val() );
                                    for(var p in data_match[$('hid_im').val()])
										
                                    {
										
										//console.log(p);
										//console.log( data_match[$('hid').val()][p]);
											head_col +=   ' <tr>                                                                            ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +currencyFormat(data_match[$('hid_im').val()][p]["PRICE"]) +'</td>                                                                    ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +formatNumber(  data_match[$('hid_im').val()][p]["QTY"]) +'</td>                                                                    ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +currencyFormat(data_match[$('hid_im').val()][p]["AMOUNT"]) +'</td>                                                                   ' + "\r\n";
											head_col +=   '	<td><button type="button" id="sac'+$('hid_im').val() + '" value = "'+$('hid_im').val()+'" class="btn btn-outline btn-primary mb-5"> <i class="fa  fa-search" > </i> </button>   ' + "\r\n";
											head_col +=   '		<button type="button" id="sav'+$('hid_im').val() + '" value = "'+$('hid_im').val()+'" class="btn btn-outline btn-success mb-5"> <i class="fa   fa-save" > </i>  </button>   ' + "\r\n";
											head_col +=   '	</td>' +    "\r\n";
											head_col +=   ' </tr>' +	"\r\n";	
											
									}
									head_col +=   '</table>' +	"\r\n";	
									$('#modal_tb').html(head_col);
			//console.log( head_col );				
			
   });

   $('hid_pl').click(function() 
   
   { 
				$('#modal_tb').html("");
				head_col  =   '  <table class="table table-hover" >'  + "\r\n";
				head_col +=   '  <tr>                      '  + "\r\n";
                head_col +=   '    <th>CODE</th>           '  + "\r\n";
                head_col +=   '    <th>PART NO</th>        '  + "\r\n";
                head_col +=   '    <th>PART NAME</th>      '  + "\r\n";
                head_col +=   '    <th>MODEL</th>          '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >PRICE</th>          '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >QTY.</th>           '  + "\r\n";
                head_col +=   '    <th style="text-align: right;" >AMOUNT</th>         '  + "\r\n";
                head_col +=   '    <th style="text-align: center;" >OPTION</th>         '  + "\r\n";    
                head_col +=   '  </tr>                     '  + "\r\n";
				//$('#modal_tb').html(head_col)
				console.log( $('hid_pl').val() );
                                    for(var p in data_match[$('hid_pl').val()])
										
                                    {
										
										//console.log(p);
										//console.log( data_match[$('hid').val()][p]);
											head_col +=   ' <tr>                                                                   ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td><input type="text" class="form-control" placeholder="" style="font-size: 10px;"></td>       ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +currencyFormat(data_match[$('hid_pl').val()][p]["PRICE"]  )+'</td>   ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +formatNumber(  data_match[$('hid_pl').val()][p]["QTY"]    )+'</td>   ' + "\r\n";
											head_col +=   '	<td style="text-align: right;" >' +currencyFormat(data_match[$('hid_pl').val()][p]["AMOUNT"] )+'</td>   ' + "\r\n";
											head_col +=   '	<td><button type="button" id="sac'+$('hid_pl').val() + '" value = "'+$('hid_pl').val()+'" class="btn btn-outline btn-primary mb-5"> <i class="fa  fa-search" > </i> </button>   ' + "\r\n";
											head_col +=   '		<button type="button" id="sav'+$('hid_pl').val() + '" value = "'+$('hid_pl').val()+'" class="btn btn-outline btn-success mb-5"> <i class="fa   fa-save" > </i>  </button>   ' + "\r\n";
											head_col +=   '	</td>' +    "\r\n";
											head_col +=   ' </tr>' +	"\r\n";	
											
									}
									head_col +=   '</table>' +	"\r\n";	
									$('#modal_tb').html(head_col);
			//console.log( head_col );				
			
   });
   

	   $('#sacsm1').click(function() 
   
		   { 
					console.log($('#sacsm1').val() + "Oor EiEi");		//$('#modal-detail').modal('toggle') ;
					$('#modal-fill').modal('toggle');
					console.log("เข้านะ");
					
		   });

 });

});
function currencyFormat(num) {
  return Number.parseFloat(num).toFixed(2).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
