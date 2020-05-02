 $(document).ready(function(){
	 
	 
	 
	//$('wizard-circle a').click(function() {  
	
		$( '#csv_brake' ).on( 'click', function () {
			
							window.open('http://192.168.161.102/report_access/royalty_app/json_rep_rm/br', '_blank');

		} );  
		
		$( '#csv_pump' ).on( 'click', function () {
			
							window.open('http://192.168.161.102/report_access/royalty_app/json_rep_rm/sm', '_blank');

		} );  
		$( '#export_report' ).on( 'click', function () {
			
							window.open('http://192.168.161.102/report_access/royalty_app/json_rep_sm', '_blank');

		} );

		
} ); 