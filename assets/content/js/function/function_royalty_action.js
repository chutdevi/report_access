 $(document).ready(function(){
	 
	 
	 
	//$('wizard-circle a').click(function() {  
	
		$( '.wizard-circle a' ).on( 'click', function () {
			
			$("div .row").attr("hidden", false);
			if( $(this).html() == "Next")
			{
				
				var pag = $('#steps-uid-0-t-'+indx+' .step').html();
				//alert( pag );
				switch( pag ) {
				  case "1":
					if( complete_page[0] == 1 ) indx++;
					//alert( $(this).html() + " - " +  $('#steps-uid-0-t-'+indx+' .step').html()  + " - " + indx );
					break;
				  case "2":
					if( complete_page[1] == 1 ) indx++;
					break;
				  case "3":
					if( complete_page[2] == 1 ) indx++;
					break;
				  case "4":
					if( complete_page[3] == 1 ) indx++;
					break;
				  case "5":
					if( complete_page[4] == 1 ) indx++;
					break;					
				  default:
					// code block
				}				
				
			}
			else if( $(this).html() == "Previous")
			{
				imop = 0;
				if( indx > 0)
				indx--;
			}
		} );  
} );   

 