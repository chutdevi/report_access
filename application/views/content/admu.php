  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Menu System
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Group Menu</h3>

          <ul class="box-controls pull-right">
			<li><a class="box-btn-slide" href="#"></a></li>	
		  </ul>
        </div>
        <div class="box-body">
						<div class="row">
						  


							<div class="col-md-10">
								<h4 class="box-title text-info"><i class="ti-save mr-15"></i> Requirements</h4>
								<hr class="my-15">
							  <select class="form-control" id="select_menu">
							  	<option name="clear" >Select Group menu.</option>
							  <?php
							  	foreach ($main_menu as $key => $value) 
							  	 {
							  	 	echo( '<option value="'.$value["MENU_CD"].'" name="'. $value["MENU_NAME"] .'">' .$value["MENU_CD"] . " " . $value["MENU_NAME"] . '</option>' );
							  	 } 					  
							   ?>	

							  </select>
							</div>
							  <div class="col-md-2">
								  <button type="button" class="btn btn-primary mb-5" id="crt_gup" style="position:absolute; top:55%;">Create Group</button>
							  </div>
						 


						</div>          
        </div>
        <!-- /.box-body -->
<!--         <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>

    <section class="content" id="sh_manage" hidden="true">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" id="titel_menu"></h3>

          <ul class="box-controls pull-right">
			<li><a class="box-btn-slide" href="#"></a></li>	
		  </ul>
        </div>
        <div class="box-body">
		  <div class="row">        
            <div class="col-md-12">
            	<div> <button type="button"  class="bnt btn-dark" id="add_menu" style="margin-bottom:20px; padding: 0.5rem 0.8rem; font-size: 1rem; "  > <i class="fa  fa-plus-square-o" > </i> </button> <span> <p4>Add sub menu</p4></span></div>
				<div class="table-responsive">
				  <table class="table table-hover" id="sub_table">
				  	<thead>
					 <tr style="text-align: center;">
					  <th style=" width: 10%; ">Sub menu code</th>
					  <th style=" width: 20%; ">Sub menu name</th>
					  <th style=" width: 20%; ">Link</th>
					  <th style=" width: 10%; ">Status</th>
					  <th style=" width: 20%; ">Option</th>
					</tr>
					</thead>
					<tbody>
					<tr>
					  <td style="text-align: center;"><a href="javascript:void(0)">Order #123456</a></td>
					  <td>Lorem Ipsum</td>
					  <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
					  <td style="text-align: center;"><span class="label label-danger">Disable</span></td>
					  <td style="text-align: center;">
                        <button type="button" id="trash_bt"  value = "pl" class="btn btn-outline btn-warning" style="margin-right: 6px;"  > <i class="fa  fa-trash-o" > </i> </button>
                        <button type="button" id="edit_bt"   value = "pl" class="btn btn-outline btn-pink" style="margin-right: 6px;" > <i class="fa  fa-pencil" style=" color: '#E91E63';"> </i> </button>                                    
                        <button type="button" id="power_bt"  value = "pl" class="btn btn-outline btn-success" style="margin-right: 6px;" > <i class="fa  fa-power-off" style=" color: '#FF9149';"> </i> </button>
					  </td>
					</tr>
					</tbody>
				  </table>
				</div>
            </div>
        </div>
    	</div>
        <!-- /.box-body -->
      	</div>
      <!-- /.box -->
    </section>

<!-- <i class="mdi mdi-account-settings"></i> -->

        <div class="modal fade" id="modal-add-group">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Create Group</h5>
                      <button type="button" class="close" data-dismiss="modal" >
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

              <div class="modal-body form-element">      

                    <div class="form-group col-md-12">
                      <div class="row">
                        <div class="col-md-9">
                         <label for="modal_Newgroup">New Group Menu</label>
                         <input type="email" class="form-control" id="modal_Newgroup" placeholder="Group Name">
                        </div>    
                        <div class="col-md-3">
                          
                          <button type="submit" class="btn btn-primary btn-outline" id="bnt_crt" style="margin-top:28px; padding: 0.5rem 0.5rem; font-size: 0.9rem; "><i class="ti-save-alt"></i> Create </button>

                        </div>              
                      </div>

                    </div>   

              </div>
<!--               <div class="modal-footer">
                 <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
              </div> -->
             </div>
            </div>
        </div> 






        <div class="modal fade" id="modal-error">
              <div class="modal-dialog" role="document">
                <div class="modal-content hjk">
                    <div class="modal-header">
                      <h5 class="modal-title">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" >
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

		         	<div class="modal-body">	       
                    <p> Save does not have some data to be blank.</p>
					    </div>
			        <div class="modal-footer">
			           <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
			        </div>
    	       </div>
  		      </div>
	      </div> 




    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <script type="text/javascript">
   
  // $("#bn1").on  
  echo = 0;
  $('#add_bn1').click(function() 
  {
           $.ajax({
                    url     : 'http://192.168.161.102/report_access/Amn_manage/ajax_addmenu',
                    type    : 'post',
                    dataType: 'text',
                    success : function(upp)   
                              {
                                console.log(upp); 
                                console.log(echo++);          
                              },
                    error : function(upp)
                              {
                                //$("#sm1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #FF4999;"><i class="fa  fa  fa-close"></i> Error! </h6>');
                                //erro --;
                                console.log('error');

                              }
                   });
  });

  $('#crt_gup').click(function() 
  {
      $('#modal-add-group').modal('toggle');

  });

          $('#bnt_crt').click(function()
              {

                if( $('#modal_Newgroup').val() != '' )
                {
                  $.ajax({
                      url     : 'http://192.168.161.102/report_access/Amn_manage/ajax_dupgroup',
                      type    : 'post',
                      data    :  { "gup_name" : $('#modal_Newgroup').val()  } ,
                      dataType: 'text',
                      success : function(upp)   
                                {
                                   
                                  if( upp == '1')
                                  {
                                    if(confirm('Do you want to create main group')==true)
                                      $.ajax({
                                                url     : 'http://192.168.161.102/report_access/Amn_manage/ajax_insgroup',
                                                type    : 'post',
                                                data    :  { "gup_name" : $('#modal_Newgroup').val()  } ,
                                                dataType: 'json',
                                                success : function(mnu)   
                                                          {

                                                            $('#modal_Newgroup').val('');
                                                            $('#modal-add-group').modal('toggle');
                                                            //console.log(typeof mnu);

                                                            var op_str = '<option name="clear" >Select Group menu.</option>';       
                                                            for( var m in mnu )
                                                            {
                                                              //console.log( mnu[0]["MENU_CD"]);
                                                              op_str += '<option value="' + mnu[m]["MENU_CD"] + '" name="' + mnu[m]["MENU_NAME"] + '">' + mnu[m]["MENU_CD"] + " " + mnu[m]["MENU_NAME"] + '</option>';

                                                            }

                                                            $('#select_menu').html(op_str);
                                                          }
                                              });
                                  }
                                  else
                                  {
                                    $('#modal-error h5').html('Error Duplicate data');
                                    $('#modal-error .modal-body p').html(' Save does not have some data to be duplicate.');
                                    $('#modal-error').modal('toggle');
                                  }
                                  //console.log(echo++);          
                                },
                      error : function(upp)
                                {
                                  //$("#sm1").html('<h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: #FF4999;"><i class="fa  fa  fa-close"></i> Error! </h6>');
                                  //erro --;
                                  console.log(upp);

                                }
                     });
                }else{
                  $('#modal-error h5').html('Error Empty data');
                  $('#modal-error').modal('toggle');
                }

              });


  </script>
  <script src="<?php echo base_url() ?>assets/content/js/table_manage.js"></script>



