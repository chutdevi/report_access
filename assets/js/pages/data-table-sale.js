//[Data Table Javascript]


$(function () {
    "use strict";

    $('#example1').DataTable();
	$('#example8').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
	
	
	$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	} );
	
	$('#tickets').DataTable({
	  'paging'      : true,
	  'lengthChange': false,
	  'searching'   : false,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : false,
	});
	
	//--------Individual column searching
	
    // Setup - add a text input to each footer cell
	
    $('#example5 tfoot th').each( function () {
		//console.log( $('#example5 tfoot th').data() );
		//console.log($(this).text());
        var title = $(this).text();
        //$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		$(this).html( '<input type="text" />' );
    } );
 
    // DataTable
    var table = $('#example5').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
	
	$( '#example5 tbody').on( 'click','.bnt-edit',  function () {
		
			var table = $('#example5').DataTable();
			var indd = $(this).attr("id").substring(5, $(this).attr("id").length );
		    //var tbk = '<select class="form-control-edit select2 sec-edit" style = "font-size: 10px;" id="slt_ratio'  + p +'">'  + 
			//          '<option value="0.01" >' + 0.01 + '</option>' + 
			//          '<option value="0.03" >' + 0.03 + '</option>' + 
            //          '</select>' 

			
		if ( $(this).attr("id") == ( "m_sme" + indd ) )
		{
			//old_da = table.row( indd ).data();
			//console.log(table.row( indd ).data());
			old_da = [];
			$( "#m_sme" + indd ).attr("hidden", true);
			$( "#m_smc" + indd ).attr("hidden", false);
			$( "#m_smk" + indd ).attr("hidden", false);
			
			//sold_da = $("#tr"+indd).serializeArray()  ;
			
			for ( var i = 1 ; i < (table.row( indd ).data().length - 1) ; i++ )
			{
				old_da.push( table.cell(table.row( indd ).index(), i).data() );
				//console.log(old_da);
				var td = table
						.cell(table.row( indd ).index(), i)
						.focus()
						.data('<input type="text" class="form-control-edit inp-edit'+indd+'" value="'+ table.row( indd ).data()[i]  + '" style="font-size: 10px;" id="inp_' + indd + "_" + i + '" name="'+ table.row( indd ).data()[i] +'">')
						.draw(false);
			}
		}
	
		else if( $(this).attr("id") == ( "m_smc" + indd ) )
		{
			$( "#m_sme" + indd ).attr("hidden", false);
			$( "#m_smc" + indd ).attr("hidden", true);
			$( "#m_smk" + indd ).attr("hidden", true);		

				
			for ( var i = 1 ; i < (old_da.length+1) ; i++ )
			{
				
				//console.log( old_da[i] );
					var tdr = table
						.cell(table.row( indd ).index(), i)
						.focus()
						.data( old_da[i-1] )
						.draw(false);
			}
			
		}
		else if( $(this).attr("id") == ( "m_smk" + indd ) )
		{
			$( "#m_sme" + indd ).attr("hidden", false);
			$( "#m_smc" + indd ).attr("hidden", true);
			$( "#m_smk" + indd ).attr("hidden", true);		

			//var item_tr = {"tr" : "", "tr2" : "", "tr3" : "", "tr4" : "", "tr5" : "", "tr6" : ""};	
			var item_tr = [ table.row( indd ).data()[0] ];
			//console.log( table.$('.inp-edit'+indd).serializeArray()[0]["value"] );
			for ( var i = 1 ; i < (table.row( indd ).data().length - 1) ; i++ )
			{
					item_tr.push( $("#inp_" + indd + "_" + i ).val() ) ;
					var td = table
						.cell(table.row( indd ).index(), i)
						.focus()
						.data( $("#inp_" + indd + "_" + i ).val() )
						.draw(false);
				
				
			
			}
			console.log( item_tr );
									   $.ajax({
										url     : 'http://192.168.161.102/report_access/royalty_app/api_update_master',
										type    : 'post',
										dataType: 'json',
										data    :  {"oor": item_tr, "table" : "ROYALTY_SM"},
										success : function(ins)
												   {
										
													console.log(ins);
													
												   },
													  
													  
										error : function(upp)
													{
													   //$('#slt'+oi).html('<option>' + 'error' + '</option>');
													   console.log('error');
													}
									   });
		}		
	} );		
	
	
	//---------------Form inputs
	//var table = $('#example6').DataTable();
 
    //$('button').click( function() {
    //    var data = table.$('input, select').serialize();
    //    //alert(
    //    //    "The following data would have been submitted to the server: \n\n"+
    //    //    data.substr( 0, 120 )+'...'
    //    //);
    //    return false;
    //} );
	
	
	
	
  }); // End of use strict


	
  $(function () {
    "use strict";
		var table = $('#example1').DataTable();

		$('#example1 tbody').on( 'click', 'tr', function () {
			$(this).toggleClass('selected');
		} );

		$('#row-count').click( function () {
			alert( table.rows('.selected').data().length +' row(s) selected' );
		} );
	  
	  
	} );// End of use strict


	
  $(function () {
    "use strict";
		var table = $('#example').DataTable();
 
		$('#example tbody').on( 'click', 'tr', function () {
			if ( $(this).hasClass('selected') ) {
				$(this).removeClass('selected');
			}
			else {
				table.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
			}
		} );

		$('#row-remove').click( function () {
			table.row('.selected').remove().draw( false );
		} );
	  
	  
	} );// End of use strict






















