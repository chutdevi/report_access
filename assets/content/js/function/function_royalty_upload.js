 $(document).ready(function(){
	 
	var files; 
	var Type_file = ["name","sur"];
    $('#file-roy').on('change', prepareUpload);
    function prepareUpload(event){
      files = event.target.files;
	     console.log($('#file-roy').val());
	if( $('#file-roy').val() == '' ){
		 $('#la-input').html( 'Seleccionar Archivo' );
	}else{
		$('#la-input').html( '<i id="l1" class="fa fa-file"  ></i>  ' + $('#file-roy').val() );
		console.log( files[0]["name"].split(".")  );
	    Type_file = files[0]["name"].split(".");
	}
	 
	}
			$( '#load1' ).click( function () {
			   		if ( Type_file[1] == "csv" )
					{	
						var formData = new FormData();        
						
						var i = 0 ;
						//$.each(files, function(key, value){
						  formData.append( 'file', $('#file-roy')[0].files[0] );
						  
						var fileName = $('#file-roy').val();  

						//});
							$.ajax({
							url: "http://192.168.161.102/report_access/royalty_app/upload_price", // Url to which the request is send
							type: "POST",             // Type of request to be send, called as method
							data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
							dataType : 'text',
							contentType: false,       // The content type used when sending data to the server.
							cache: false,             // To unable request pages to be cached
							processData:false,        // To send DOMDocument or non processed data file it is set to false
							success: function(data)   // A function to be called if request succeeds
							{
								 alert('Upload file:  "' + fileName +  '" Complete.');	

								 console.log(data);

								 $('#la-input').html( 'Seleccionar Archivo' );
								 	
								 Type_file[1] = "sur";
								 complete_page[2] = 1;
							},
							error: function(data){
								
								console.log("Error!")
								
								alert('Error :  ข้อมูลไม่ถูกต้อง');	
								}
							});	

					   
						//});

							  }
							else if ( Type_file[1] == "sur" )
							  {
								alert( 'กรุณา Browse File ก่อน' );
							  }
							else
							  {
									alert( 'กรุณาใช้ File CSV เท่านั้น' );
				
									download('"CUST_ANAME","ITEM_NO","ITEM_NAME","MODEL","PRICE"', "material_cost.csv");
									
									 $('#la-input').html( 'Seleccionar Archivo' );
								 
									 Type_file[1] = "sur";							  								  
									 
							  }

		  
		  					} );
} );   

 