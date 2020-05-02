  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Group Users
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
							  <select class="form-control" id="select_group_us">
							  	<option name="clear" >Select Group menu.</option>
							  <?php
							  	foreach ($group_user as $key => $value) 
							  	 {
							  	 	echo( '<option value="'.$value["GROUP_CD"].'" name="'. $value["GROUP_NAME"] .'">' ."[".$value["GROUP_CD"] . "]:" . $value["GROUP_NAME"] . '</option>' );
							  	 } 					  
							   ?>	

							  </select>
							</div>
							  <div class="col-md-2">
								  <button type="button" class="btn btn-primary mb-5" id="crt_gup_us" style="position:absolute; top:55%;">Create Group</button>
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

    <section class="content" id="sh_manage_gp" hidden="true">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" id="titel_menu_gp"></h3>

          <ul class="box-controls pull-right">
			<li><a class="box-btn-slide" href="#"></a></li>	
		  </ul>
        </div>
        <div class="box-body">
		  <div class="row">        
            <div class="col-md-12">
            	<div> <button type="button"  class="bnt btn-dark" id="add_menu_gp" style="margin-bottom:20px; padding: 0.5rem 0.8rem; font-size: 1rem; "  > <i class="fa  fa-plus-square-o" > </i> </button> <span> <p4>Add sub menu</p4></span></div>
				<div class="table-responsive">
				  <table class="table table-hover" id="menu_table">
				  	<thead>
					 <tr style="text-align: center;">
            <th style=" width: 21%; ">Menu name</th>
            <th style=" width: 21%; ">Sub menu name</th>
					  <th style=" width: 15%; ">Sub menu code</th>
					  <!-- <th style=" width: 20%; ">Link</th> -->
					  <th style=" width: 8%; ">Status</th>
					  <th style=" width: 15%; ">Option</th>
					</tr>
					</thead>
					<tbody>
					<tr>
					  <td> <select class="form-control"> </select> <option name="clear" >Select Group menu.</option> </td>
					  <td>Lorem Ipsum</td>
					  <td><span class="label label-danger">Disable</span></td>
					  <td>
                        <button type="button" id="trash_bt"  value = "pl" class="btn btn-outline btn-warning" style="margin-right: 6px;"  > <i class="fa  fa-trash-o" > </i> </button>
                        <!-- <button type="button" id="edit_bt"   value = "pl" class="btn btn-outline btn-pink" style="margin-right: 6px;" > <i class="fa  fa-pencil" style=" color: '#E91E63';"> </i> </button>                                     -->
                        <!-- <button type="button" id="power_bt"  value = "pl" class="btn btn-outline btn-success" style="margin-right: 6px;" > <i class="fa  fa-power-off" style=" color: '#FF9149';"> </i> </button> -->
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

        <div class="modal fade" id="modal-add-group-user">
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
                         <label for="modal_Newgroup">New Group User</label>
                         <input type="email" class="form-control" id="modal_Newgroup_us" placeholder="Group Name">
                        </div>    
                        <div class="col-md-3">
                          
                          <button type="submit" class="btn btn-primary btn-outline" id="bnt_crt_us" style="margin-top:28px; padding: 0.5rem 0.5rem; font-size: 0.9rem; "><i class="ti-save-alt"></i> Create </button>

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
   
  // $("#bn1").on  W

  $('#crt_gup_us').click(function() 
  {
      $('#modal-add-group-user').modal('toggle');

  });

          $('#bnt_crt_us').click(function()
              {

                if( $('#modal_Newgroup_us').val() != '' )
                {
                  $.ajax({
                      url     : 'http://192.168.161.102/report_access/Amn_manage/ajax_dupgroup_us',
                      type    : 'post',
                      data    :  { "gup_name" : $('#modal_Newgroup_us').val()  } ,
                      dataType: 'text',
                      success : function(upp)   
                                {
                                  
                                  //console.log(upp); 
                                  if( upp == '1')
                                  {
                                    if(confirm('Do you want to create main group')==true)
                                      $.ajax({
                                                url     : 'http://192.168.161.102/report_access/Amn_manage/ajax_new_group_user',
                                                type    : 'post',
                                                data    :  { "gup_name" : $('#modal_Newgroup_us').val()  } ,
                                                dataType: 'json',
                                                success : function(mnu)   
                                                          {
                                                            console.log( mnu);
                                                            $('#modal_Newgroup_us').val('');
                                                            $('#modal-add-group-user').modal('toggle');
                                                            //console.log(typeof mnu);

                                                            var op_str = '<option name="clear" >Select Group menu.</option>';       
                                                            for( var m in mnu )
                                                            {
                                                              
                                                              op_str += '<option value="' + mnu[m]["GROUP_CD"] + '" name="' + mnu[m]["GROUP_NAME"] + '">' +"["+ mnu[m]["GROUP_CD"] + "]:" + mnu[m]["GROUP_NAME"] + '</option>';

                                                            }

                                                            $('#select_group_us').html(op_str);
                                                          },
                                                error : function(er)
                                                          {
                                                            console.log(er);
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
  <script src="<?php echo base_url() ?>assets/content/js/table_manage_group.js"></script>



