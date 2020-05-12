<?php

$min_year = 2018;
$min_year_month = 3;
$cur_year = date("Y");
$cur_month = date("m");

$months = array(
      'JANUARY',
      'FEBRUARY',
      'MARCH',
      'APRIL',
      'MAY',
      'JUNE',
      'JULY ',
      'AUGUST',
      'SEPTEMBER',
      'OCTOBER',
      'NOVEMBER',
      'DECEMBER',
  ); 

?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-truck"></i> DELIVERY PLAN OF MTA
      </h1>
    </section> 
    <section class="content">
      <div class="row">
        <div class="col-12">
        	<form method="GET" action="http://192.168.161.102/excel_gen/Del_plan/del_plan_report?year=year&month=month" enctype="multipart/form-data">
            <div class="box">
            <!-- <div class="box-header with-border">
              <div class="col-6">
                <h4 class="box-title">Please click button for see data.</h4>
                <ul class="box-controls pull-right"></ul>
              </div>
            </div> -->
	            <div class="box-body pb-0">
	                <div class="box-header with-border">
	                  <h4 class="box-title"><i class="  fa fa-file-text"></i> Please select period time to export the report.</h4>
	                  <!-- <ul class="box-controls pull-right">Please select period time for export the report.</ul>                 -->
	                  <ul class="box-controls pull-right">Report > Delivery Plan of MTA</ul>  
	                </div>
	                <?php //echo form_open_multipart('http://192.168.161.102/excel_gen/Del_plan/del_plan_report?year=year&month=month');?>
	                <div class="box-body">
	                  	<div class="row">
	                    	<div class="col-lg-5 col-12"> 
	                      		<div class="form-group">
	                        		<h5>Select Year : <span class="text-danger">*</span></h5>
	                        		<!-- <div class="controls">
	                          		<input type="date" name="date_start" class="form-control" required data-validation-required-message="This field is required" value="<?php echo date('Y-m-d') ?>" id="dt1"> 
	                        		</div> -->
	                        		<!-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>-->
	                        		<div class="dropdown">
				                        <?php 
				                          $strdate = 2018;
				                          $current = date("Y");
				                          // $cur_month = 12;
				                          $period = $current - $strdate;
				                        ?>
		                          		<select class="selectpicker" id="year" name="year" required="">
		                            		<option value="" disabled selected>--- Select Year ---</option>
		                            		<?php 
		                            			if( $cur_month == '12' )
		                            			{
		                            				$next_year = $current+1;
		                            				$loop = $next_year - $strdate;

		                            				for ($i = 0; $i <= $loop; $i++){
		                            		?>
		                            					<option>
			                              				<?php
				                                      		if($i == "0"){
				                                        		echo $next_year;
				                                      		}else{
				                                        		$next_year = $next_year - 1;
				                                        		echo $next_year;
				                                      		}
				                                   		?>
			                             				</option>
		                            		<?php 
		                        					} 
		                        				} else {
			                            			for ($i = 0; $i <= $period; $i++){
			                            	?>
			                              				<option>
			                              				<?php
			                                      			if($i == "0"){
			                                        			echo $current;
			                                      			}else{
			                                        			$current = $current - 1;
			                                        			echo $current;
			                                      			}
			                                   			?>
			                              				</option>
		                            			<?php } } ?>
		                          		</select>
	                        		</div>
	                      		</div>
	                    	</div>
		                    <div class="col-lg-5 col-12"> 
		                      	<div class="form-group">
		                        	<h5>Select Month : <span class="text-danger">*</span></h5>
		                        	<div class="dropdown">
		                          		<select id="month" name="month" required="">
		                                	<option value="0" disabled selected>--- Select Month ---</option>
		                            	</select>
		                        	</div>                                   
		                    	</div>
		                    </div>
	                    	<!-- <div class="box-footer text-right"> -->
	                    	<!-- <button  type="submit" class="btn btn-social btn btn-bitbucket pull-right mb-5" name="bu" value="1" ><i class="fa fa-search" ></i>Click for search</button> -->
	                    	<!-- <input type="hidden" name="action" value="<?php //echo base64_encode('searchType');?>"  /> -->
		                    <!-- </div> -->
		                  	<div class="col-lg-2 col-12"> 
		                  		<div class="form-group">
		                  			<h5 class="text-right" style="color:white">CLICK HERE</h5>
		                  			<button class="btn btn-social btn btn-bitbucket pull-right mb-5" data-original-title='DOWNLOAD' type='submit'><i class="fa fa-arrow-circle-o-down" ></i>DOWNLOAD</button>
		                  			<!--  onclick="download_data();" -->
		                  			<!-- <input type="hidden" name="action" value="<?php echo base64_encode('searchType');?>"  /> -->
		                  		</div>
		                  	</div>
	                  		<div class="box-footer text-right">
	                  		</div>
	                	</div>
	                </div>
	                <?php //echo form_close(); ?>
	          	</div>
	        </div> 
	    	</form>
      	</div>
   	</section>
</div>

 <script type="text/javascript">

    var sel_month = undefined;

    $("body").attr("style", "overflow:hidden");

    $(document).ready(function () 
    {
      sel_month = $("#month").selectpicker();

      $("#year").change(function () 
      {
          var val = $(this).val();
          var cur_year = <?php echo $cur_year; ?>;
          var min_year = <?php echo $min_year; ?>;
          var cur_month = <?php echo $cur_month; ?>;

          var mon = ["1: JANUARY", "2: FEBRUARY", "3: MARCH", "4: APRIL", "5: MAY", "6: JUNE", "7: JULY", "8: AUGUST", "9: SEPTEMBER", "10: OCTOBER", "11: NOVEMBER", "12: DECEMBER"]; 
  
          //$('.selectpicker').selectpicker();

          if ( val == cur_year ) {
              // $("#month").html("<option value='0' disabled selected>--- Select Month ---</option><option value='test'>item1: test 1</option><option value='test2'>item1: test 2</option>");
            //$('#month').selectpicker();
            $('#month').html("<option value='0' disabled selected>--- Select Month ---</option>");

            for (var i = 1; i <= cur_month+1; i++) {
                // console.log(mon[i-1]);
              $('#month').append($("<option></option>").attr("value",i).text(mon[i-1]));
            }
            // console.log(sel_month);
            if (sel_month === undefined) { $("#month").selectpicker() } else { sel_month.selectpicker('destroy'); $("#month").selectpicker()}

          } else if ( val == min_year ) {
            $("#month").html("<option value='0' disabled selected>--- Select Month ---</option><option value='3'>3: MARCH</option><option value='4'>4: APRIL</option><option value='5'>5: MAY</option><option value='6'>6: JUNE</option><option value='7'>7: JULY</option><option value='8'>8: AUGUST</option><option value='9'>9: SEPTEMBER</option><option value='10'>10: OCTOBER</option><option value='11'>11: NOVEMBER</option><option value='12'>12: DECEMBER</option>");
            if (sel_month === undefined) { $("#month").selectpicker() } else { sel_month.selectpicker('destroy'); $("#month").selectpicker()}
          } else if ( val == cur_year+1 ) {
            $("#month").html("<option value='0' disabled selected>--- Select Month ---</option><option value='1'>1: JANUARY</option>");
            if (sel_month === undefined) { $("#month").selectpicker() } else { sel_month.selectpicker('destroy'); $("#month").selectpicker()}
          } else if (val == "0") {
              $("#month").html("<option value='0' disabled selected>--- Select Month ---</option>");
              // $("#month").addClass('selectpicker')
          } else {
              $("#month").html("<option value='0' disabled selected>--- Select Month ---</option><option value='1'>1: JANUARY</option><option value='2'>2: FEBRUARY</option><option value='3'>3: MARCH</option><option value='4'>4: APRIL</option><option value='5'>5: MAY</option><option value='6'>6: JUNE</option><option value='7'>7: JULY</option><option value='8'>8: AUGUST</option><option value='9'>9: SEPTEMBER</option><option value='10'>10: OCTOBER</option><option value='11'>11: NOVEMBER</option><option value='12'>12: DECEMBER</option>");
            if (sel_month === undefined) { $("#month").selectpicker() } else { sel_month.selectpicker('destroy'); $("#month").selectpicker()}
          }
      });
    });

 //    function download_data()
 //    {
	// 	var year = $("#year").val();			 
	// 	var month = $("#month").val();

	// 	if( year != null && month != null )
	// 	{
	// 		// alert(year);
	// 		// alert(month);
	// 		setTimeout(function(){
	// 			$.ajax({ //start ajax
	// 				type: "POST",
	// 				url: "http://192.168.161.102/excel_gen/Del_plan/del_plan_report",
	// 				data: {
	// 					'year':year,
	// 					'month':month
	// 				},
	// 				success : function(data){
	// 					alert("OK!");
	// 					location.reload();
	// 				}
	// 			}); 
	// 		},500);//end ajax
	// 	}
	// 	else if( year != null && month == null )
	// 	{
	// 		alert('Please select month!!!');
	// 	}
	// 	else
	// 	{
	// 		alert('Please select year and month!!!');
	// 	}
	// 	// if(name!="" && act!=0 && grp!=0){
	// 	// 	setTimeout(function(){
	// 	// 		$.ajax({ //start ajax
	// 	// 			type: "POST",
	// 	// 			url: "http://192.168.161.102/ManageMail/Manage_mail/update_data",
	// 	// 			data: {
	// 	// 				'name':name,
	// 	// 				'action':act,
	// 	// 				'group':grp,
	// 	// 				'id_edit':id_edit
	// 	// 			},
	// 	// 			success : function(data){
	// 	// 				alert("Data edited successfully !");
	// 	// 				location.reload();
	// 	// 			},
	// 	// 		}); 
	// 	// 	},500);//end ajax
	// 	// }else{
	// 	// 	alert('Please fill all the field !');
	// 	// 	// $("#btn_submit_add").removeAttr("disabled");
	// 	// }
	// }

 </script>

                                
 