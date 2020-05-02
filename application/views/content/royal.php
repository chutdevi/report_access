
  <!-- <form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo"></frame> -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       	Royalty
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <!-- Validation wizard -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h4 class="box-title">Step wizard with validation</h4>
          <h6 class="box-subtitle">You can us the validation like what we did</h6>
      
      <ul class="box-controls pull-right">
        <li><a class="box-btn-close" href="#"></a></li>
        <li><a class="box-btn-slide" href="#"></a></li> 
        <li><a class="box-btn-fullscreen" href="#"></a></li>
      </ul>
        </div>
        <!-- /.box-header -->
        <div class="box-body wizard-content">
      <form action="#" class="validation-wizard wizard-circle" method="post" name="fileinfo">
        <!-- Step 1 -->
        <h6 hidden="true">Step</h6>
        <section>
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label for="wdate1">Date Start :</label>
                <input type="date" class="form-control required" id="wdate1" name="date_st"  value="<?php echo $d_st; ?>"> </div>
            </div>

            <div class="col-md-5">
              <div class="form-group">
                <label for="wdate2">Date End  :</label>
                <input type="date" class="form-control required" id="wdate2" name="date_ed"  value="<?php echo $d_en; ?>"> 
              </div>
            </div>
            <!-- <div class="col-md-1"> -->
              <!-- <div class="form-group"> -->
                <!-- <label for="wdate2">Date of Birth :</label> -->
                <!-- <label for="wdate2" hidden="true">Date End  :</label> -->
                <!-- <input type="hidden" class="form-control required" id="hid1" name="date_ed"  >  -->

              <!-- </div> -->
            <!-- </div>     -->
            <div class="col-md-2">
              <div class="form-group">
                <!-- <label for="wdate2">Date of Birth :</label> -->
                <button type="button" class="btn btn-primary" id="but1" style="padding: 10px; margin-top: 22px;">Get Data Sale  <i id="i1" class="fa  fa-get-pocket"></i></button>

              </div>
            </div>    



            <div class="col-md-5" id="sm" hidden="true" >  <h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: '#000000';"> Process get data sale from Explanner to create sheet TBK (SM) </h6>  </div>
            <div class="col-md-7" id="sm1"hidden="true" >  <h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: '#000000';"><i id="i1" class="fa  fa-spinner fa-spin"></i> </h6> </div>

            <div class="col-md-5" id="bh" hidden="true" >  <h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: '#000000';"> Process get data sale from Explanner to create sheet TBK (BH) </h6>  </div>
            <div class="col-md-7" id="bh1" hidden="true" > <h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: '#000000';"><i id="i1" class="fa  fa-spinner fa-spin"></i> </h6></div>

            <div class="col-md-5" id="ig" hidden="true" >  <h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: '#000000';"> Process get data sale from Explanner to create sheet TBK (IGCE) </h6>  </div>
            <div class="col-md-7" id="ig1"hidden="true" >  <h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: '#000000';"><i id="i1" class="fa  fa-spinner fa-spin"></i> </h6></div>

            <div class="col-md-5" id="im" hidden="true" >  <h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: '#000000';"> Process get data sale from Explanner to create sheet TBK (IMCT) </h6>  </div>
            <div class="col-md-7" id="im1"hidden="true" >  <h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: '#000000';"><i id="i1" class="fa  fa-spinner fa-spin"></i> </h6></div>

            <div class="col-md-5" id="pl" hidden="true" >  <h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: '#000000';"> Process get data sale from Explanner to create sheet TBK (PCL) </h6>  </div>
            <div class="col-md-7" id="pl1"hidden="true" >  <h6 style="font-family: Arial; font-style: oblique; font-size: 15px; color: '#000000';"><i id="i1" class="fa  fa-spinner fa-spin"></i> </h6></div>                                               
            <!-- <div class="col-md-2"> -->
                <!-- <label for="wdate2">Date of Birth :</label> -->
                <!-- <button type="button" class="btn btn-purple" style="padding: 10px; margin-top: 22px;">Compare Data  <i id="i2" class="fa  fa-spinner fa-spin"></i></button> -->

            </div>                                    
         
        </section>
        <!-- Step 2 -->
        <h6 hidden="true">Step</h6>
        <section>
          <div class="row" hidden="true">
          <div class="col-md-12 col-lg-12">
                    <div class="box">
                <div class="box-header with-border">
                          <h5 class="box-title">Data does not match the master data</h5>
                </div>
                <div class="box-body p-0">

                  <div class="media-list media-list-hover">
                  <a id="mch">
                    <!-- <h4 class="w-50 text-gray font-weight-500">MACTCH DATA</h4> -->
                        <div class="media-body pl-15 bl-5 rounded border-primary">
                          <div class="col-md-12 col-lg-12"> 
                            <div class="row">
                                <div  class="col-md-12" >
                                    <h6 id="mch_cnt"  style="font-family: Arial; font-style: normal; font-size: 42px; margin-top: 12px;text-align: center; "><i class="fa  fa-spinner fa-spin"></i></h6>
                                    <h5 id="mch_cnt5" style="font-family: Arial; font-style: normal; font-size: 33px; margin-top: 18px; text-align: center; ">Please wait to check the accuracy of data.</h5>
                                </div>
                            </div>
                          </div>                                     
                        </div>  
                  </a>

                  <a class="media media-single" style="color:'#FF9149';" id="a_sm" hidden="true">
                    <h4 class="w-50 text-gray font-weight-500">SM</h4>
                        <div class="media-body pl-15 bl-5 rounded border-primary">
                          <div class="col-md-12 col-lg-12"> 
                            <div class="row">
                                <div  class="col-md-8" >
                                    <h6 id="sm_cnt" style="font-family: Arial; font-style: normal; font-size: 15px; margin-top: 18px; ">  </h6>
                                </div>
                                <div  class="col-md-4">
									<button type="button" id="hid_sm"  value = "sm" class="btn btn-outline btn-warning mb-5" style="margin-right: 22px; float: right;" hidden="true" > <i class="fa  fa-angle-up" > </i> </button>
                                    <button type="button" id="bnt_sm"  value = "sm" class="btn btn-outline btn-pink mb-5"    style="margin-right: 22px; float: right;"  > <i class="fa  fa-pencil" > </i> </button>                                    
                                    <button type="button" id="sac_sm"  value = "sm" class="btn btn-outline btn-success mb-5" style="margin-right: 22px; float: right;"  > <i class="fa  fa-search" > </i> </button>                                                         
                                </div>
                            </div>
                          </div> 
                          <div class="col-md-12 col-lg-12" > 
                            <div class="row">
                                <div  class="col-md-12">
                                	 <div class="box-body no-padding">
				                        <div class="table-responsive" hidden="true" id="modal_tbsm">
				                              <table class="table table-hover" ></table>				                              
				                        </div>
				                    </div>
                                </div>
                            </div>
                          </div>  

                          <div class="col-md-12  col-lg-12"  hidden="true" id="view_tbsm" > 
                            <div class="row">
                                <div  class="col-md-12">
                                	 <div class="box-body no-padding">
				                        <div class="table-responsive" >
											<table id="example5" class="table" >
												<thead  style="font-size: 11px; background-color: #017bbd;color: #FFFFFF;" >
													<tr>
														<th style="width: 8px; text-align: center;">NO</th>
														<th style="width: 30px;  text-align: center;">CODE</th>
														<th style="width: 100px; text-align: center;">PAER NO</th>
														<th style="width: 150px; text-align: center;">PART NAME</th>
														<th style="width: 80px;  text-align: center;">MODEL</th>
														<th style="width: 20px; text-align: center;">RATIO TBK</th>
														<th style="width: 20px; text-align: center;">RATIO HIT</th>
														<th style="width: 100px; text-align: center;">OPTION</th>
													</tr>
												</thead>
												<tbody style="font-size: 10px;">
													      <?php
													        $ind = 0; 
													        foreach ($master_sm as $r => $value) 
													        {
													          echo (
													             '<tr id="tre'.$ind.'" >'
													             		.  '<td>'   . $value['INDEX_ROW']  .  '</td>'
													                    .  '<td>'   . $value['CODE_GP']  .  '</td>'
													                    .  '<td>'   . $value['PART_NO']  .  '</td>'
													                    .  '<td>'   . $value['PART_NAME'].  '</td>'
													                    .  '<td>'   . $value['MODEL']    .  '</td>'
													                    .  '<td>'   . $value['TBK']      .  '</td>'
													                    .  '<td>'   . $value['HIT']      .  '</td>'                
													                    .  '<td>' 
													                    .  '<span><button type="button" class="btn btn-cyan bnt-edit mb-2"   style="height :28px;  width:26px;" id="m_sme' . $ind . '" ><i class="fa fa-edit"></i> </button></span>    '
					                                                    .  '<span><button type="button" class="btn btn-danger bnt-edit mb-2"  style="height :28px; width:26px;" id="m_smc' . $ind . '" hidden=true ><i class="fa fa-ban"></i></button></span>    '
					                                                    .  '<span><button type="button" class="btn btn-success bnt-edit mb-2" style="height :28px; width:26px;" id="m_smk' . $ind . '" hidden=true ><i class="fa fa-book"></i></button></span>    '
					                                                    .  '</td>'
													            .'</tr>'
													               );
													          $ind++;
													        }
													      ?>
											   </tbody>
												<tfoot>
													<tr>
														<th>NO</th>
														<th>Name</th>
														<th>Position</th>
														<th>Office</th>
														<th>Age</th>
														<th>Start date</th>
														<th>Salary</th>
														<th>Option</th>
													</tr>
												</tfoot>
											</table>
				                              
				                        </div>
				                    </div>
                                </div>
                            </div>
                          </div> 

                          <div class="col-md-12  col-lg-12"> 
                            <div class="row">
                                <div  class="col-md-8">
                                    <!-- <h6 id="bh_cnt" style="font-family: Arial; font-style: normal; font-size: 15px; color: '#FF0000'; margin-top: 18px; "></h6> -->
                                </div>
                                <div  class="col-md-4">
                                  
                                    <!-- <button type="button" id="bnt_bh"  value = "bh" class="btn btn-outline btn-pink mb-5"    style="margin-right: 22px; float: right;  color: '#E91E63';" data-toggle="modal"  data-target="#modal-fill"> <i class="fa  fa-pencil" > </i> </button>                                     -->
                                    <!-- <button type="button" id="sac_bh"  value = "bh" class="btn btn-outline btn-success mb-5" style="margin-right: 22px; float: right;" data-toggle="modal"  data-target="#modal-fill"> <i class="fa  fa-search" style=" color: '#FF9149';"> </i> </button> -->
                                         
                                </div>
                            </div>
                          </div>                                      
                        </div>  
                  </a>

                  <a class="media media-single" id="a_bh" hidden="true">
                    <h4 class="w-50 text-gray font-weight-500">BH</h4>
                    <div class="media-body pl-15 bl-5 rounded border-success">
                          <div class="col-md-12  col-lg-12"> 
                            <div class="row">
                                <div  class="col-md-8">
                                    <h6 id="bh_cnt" style="font-family: Arial; font-style: normal; font-size: 15px; color: '#FF0000'; margin-top: 18px; "></h6>
                                </div>
                                <div  class="col-md-4">
                                    <button type="button" id="hid_bh"  value = "bh" class="btn btn-outline btn-warning mb-5" style="margin-right: 22px; float: right;" hidden="true" > <i class="fa  fa-angle-up" > </i> </button>
                                    <button type="button" id="bnt_bh"  value = "bh" class="btn btn-outline btn-pink mb-5"    style="margin-right: 22px; float: right;  color: '#E91E63';"> <i class="fa  fa-pencil" > </i> </button>                                    
                                    <button type="button" id="sac_bh"  value = "bh" class="btn btn-outline btn-success mb-5" style="margin-right: 22px; float: right;"> <i class="fa  fa-search" style=" color: '#FF9149';"> </i> </button>
                                         
                                </div>
                            </div>
                          </div>  
                          <div class="col-md-12  col-lg-12" > 
                            <div class="row">
                                <div  class="col-md-12">
                                	 <div class="box-body no-padding  ">
				                        <div class="table-responsive" hidden="true" id="modal_tbbh">
				                              <table class="table table-hover" ></table>				                              
				                        </div>
				                    </div>
                                </div>
                            </div>
                          </div>  
                          
                          <div class="col-md-12  col-lg-12"> 
                            <div class="row">
                                <div  class="col-md-8">
                                    <!-- <h6 id="bh_cnt" style="font-family: Arial; font-style: normal; font-size: 15px; color: '#FF0000'; margin-top: 18px; "></h6> -->
                                </div>
                                <div  class="col-md-4">
                                  
                                    <!-- <button type="button" id="bnt_bh"  value = "bh" class="btn btn-outline btn-pink mb-5"    style="margin-right: 22px; float: right;  color: '#E91E63';" data-toggle="modal"  data-target="#modal-fill"> <i class="fa  fa-pencil" > </i> </button>                                     -->
                                    <!-- <button type="button" id="sac_bh"  value = "bh" class="btn btn-outline btn-success mb-5" style="margin-right: 22px; float: right;" data-toggle="modal"  data-target="#modal-fill"> <i class="fa  fa-search" style=" color: '#FF9149';"> </i> </button> -->
                                         
                                </div>
                            </div>
                          </div>                                                      
                    </div>
                  </a>

                  <a class="media media-single" id="a_ig" hidden="true">
                    <h4 class="w-50 text-gray font-weight-500">IGCE</h4>
                    <div class="media-body pl-15 bl-5 rounded border-info">
                          <div class="col-md-12  col-lg-12"> 
                            <div class="row">
                                <div  class="col-md-8">
                                    <h6 id="ig_cnt" style="font-family: Arial; font-style: normal; font-size: 15px; color: '#000000'; margin-top: 18px; "></h6>
                                </div>
                                <div  class="col-md-4">
                                   <button type="button" id="hid_ig"  value = "ig" class="btn btn-outline btn-warning mb-5" style="margin-right: 22px; float: right;" hidden="true" > <i class="fa  fa-angle-up" > </i> </button>
                                    <button type="button" id="bnt_ig"  value = "ig" class="btn btn-outline btn-pink mb-5" style="margin-right: 22px; float: right;" > <i class="fa  fa-pencil" style=" color: '#E91E63';"> </i> </button>                                    
                                    <button type="button" id="sac_ig"  value = "ig" class="btn btn-outline btn-success mb-5" style="margin-right: 22px; float: right;" > <i class="fa  fa-search" style=" color: '#FF9149';"> </i> </button>
                                       
                                </div>
                            </div>
                          </div> 

                          <div class="col-md-12  col-lg-12" > 
                            <div class="row">
                                <div  class="col-md-12">
                                	 <div class="box-body no-padding ">
				                        <div class="table-responsive" hidden="true" id="modal_tbig">
				                              <table class="table table-hover" ></table>				                              
				                        </div>
				                    </div>
                                </div>
                            </div>
                          </div>  
                          
                          <div class="col-md-12  col-lg-12"> 
                            <div class="row">
                                <div  class="col-md-8">
                                    <!-- <h6 id="bh_cnt" style="font-family: Arial; font-style: normal; font-size: 15px; color: '#FF0000'; margin-top: 18px; "></h6> -->
                                </div>
                                <div  class="col-md-4">
                                  
                                    <!-- <button type="button" id="bnt_bh"  value = "bh" class="btn btn-outline btn-pink mb-5"    style="margin-right: 22px; float: right;  color: '#E91E63';" data-toggle="modal"  data-target="#modal-fill"> <i class="fa  fa-pencil" > </i> </button>                                     -->
                                    <!-- <button type="button" id="sac_bh"  value = "bh" class="btn btn-outline btn-success mb-5" style="margin-right: 22px; float: right;" data-toggle="modal"  data-target="#modal-fill"> <i class="fa  fa-search" style=" color: '#FF9149';"> </i> </button> -->
                                         
                                </div>
                            </div>
                          </div>                              
                    </div>
                  </a>

                  <a class="media media-single" id="a_im" hidden="true">
                    <h4 class="w-50 text-gray font-weight-500">IMCT</h4>
                    <div class="media-body pl-15 bl-5 rounded border-danger">
                          <div class="col-md-12  col-lg-12"> 
                            <div class="row">
                                <div  class="col-md-8">
                                    <h6 id="im_cnt" style="font-family: Arial; font-style: normal; font-size: 15px; color: '#000000'; margin-top: 18px; "></h6>
                                </div>
                                <div  class="col-md-4">
                                    <button type="button" id="hid_im"  value = "im" class="btn btn-outline btn-warning mb-5" style="margin-right: 22px; float: right;" hidden="true" > <i class="fa  fa-angle-up" > </i> </button>
                                    <button type="button" id="bnt_im"  value = "im" class="btn btn-outline btn-pink mb-5" style="margin-right: 22px; float: right;" > <i class="fa  fa-pencil" style=" color: '#E91E63';"> </i> </button>                                    
                                    <button type="button" id="sac_im"  value = "im" class="btn btn-outline btn-success mb-5" style="margin-right: 22px; float: right;" data-toggle="modal"  data-target="#modal-default"> <i class="fa  fa-search" style=" color: '#FF9149';"> </i> </button>
                                           
                                </div>
                            </div>
                          </div> 
                          <div class="col-md-12  col-lg-12" > 
                            <div class="row">
                                <div  class="col-md-12">
                                	 <div class="box-body no-padding ">
				                        <div class="table-responsive" hidden="true" id="modal_tbim">
				                              <table class="table table-hover" ></table>				                              
				                        </div>
				                    </div>
                                </div>
                            </div>
                          </div>  
                          
                          <div class="col-md-12  col-lg-12"> 
                            <div class="row">
                                <div  class="col-md-8">
                                    <!-- <h6 id="bh_cnt" style="font-family: Arial; font-style: normal; font-size: 15px; color: '#FF0000'; margin-top: 18px; "></h6> -->
                                </div>
                                <div  class="col-md-4">
                                  
                                    <!-- <button type="button" id="bnt_bh"  value = "bh" class="btn btn-outline btn-pink mb-5"    style="margin-right: 22px; float: right;  color: '#E91E63';" data-toggle="modal"  data-target="#modal-fill"> <i class="fa  fa-pencil" > </i> </button>                                     -->
                                    <!-- <button type="button" id="sac_bh"  value = "bh" class="btn btn-outline btn-success mb-5" style="margin-right: 22px; float: right;" data-toggle="modal"  data-target="#modal-fill"> <i class="fa  fa-search" style=" color: '#FF9149';"> </i> </button> -->
                                         
                                </div>
                            </div>
                          </div>                              
                    </div>
                  </a>
                    
                  <a class="media media-single" id="a_pl" hidden="true">
                    <h4 class="w-50 text-gray font-weight-500">PCL</h4>
                    <div class="media-body pl-15 bl-5 rounded border-warning">
                          <div class="col-md-12  col-lg-12"> 
                            <div class="row">
                                <div  class="col-md-8">
                                    <h6 id="pl_cnt" style="font-family: Arial; font-style: normal; font-size: 15px; color: '#000000'; margin-top: 18px; "></h6>
                                </div>
                                <div  class="col-md-4">
                                    <button type="button" id="hid_pl"  value = "pl" class="btn btn-outline btn-warning mb-5" style="margin-right: 22px; float: right;" hidden="true" > <i class="fa  fa-angle-up" > </i> </button>
                                    <button type="button" id="bnt_pl"  value = "pl" class="btn btn-outline btn-pink mb-5" style="margin-right: 22px; float: right;" > <i class="fa  fa-pencil" style=" color: '#E91E63';"> </i> </button>                                    
                                    <button type="button" id="sac_pl"  value = "pl" class="btn btn-outline btn-success mb-5" style="margin-right: 22px; float: right;" > <i class="fa  fa-search" style=" color: '#FF9149';"> </i> </button>
                                            
                                </div>
                            </div>
                          </div>  
                          <div class="col-md-12  col-lg-12" > 
                            <div class="row">
                                <div  class="col-md-12">
                                	 <div class="box-body no-padding">
				                        <div class="table-responsive" hidden="true" id="modal_tbpl">
				                              <table class="table table-hover" ></table>				                              
				                        </div>
				                    </div>
                                </div>
                            </div>
                          </div>  
                          
                          <div class="col-md-12  col-lg-12"> 
                            <div class="row">
                                <div  class="col-md-8">
                                    <!-- <h6 id="bh_cnt" style="font-family: Arial; font-style: normal; font-size: 15px; color: '#FF0000'; margin-top: 18px; "></h6> -->
                                </div>
                                <div  class="col-md-4">
                                  
                                    <!-- <button type="button" id="bnt_bh"  value = "bh" class="btn btn-outline btn-pink mb-5"    style="margin-right: 22px; float: right;  color: '#E91E63';" data-toggle="modal"  data-target="#modal-fill"> <i class="fa  fa-pencil" > </i> </button>                                     -->
                                    <!-- <button type="button" id="sac_bh"  value = "bh" class="btn btn-outline btn-success mb-5" style="margin-right: 22px; float: right;" data-toggle="modal"  data-target="#modal-fill"> <i class="fa  fa-search" style=" color: '#FF9149';"> </i> </button> -->
                                         
                                </div>
                            </div>
                          </div>    

                    </div>
                  </a>
                    
                  </div>

                </div>
                    </div>
        </div>
</div>
        </section>      
        <!-- Step 3 -->
        <h6 hidden="true">Step</h6>
        <section>
	          <div class="row"  hidden="true">
	            <div class="col-md-8">
						<div class="form-group">
							<h5>File Input Field <span class="text-danger">*</span></h5>
							<div class="input-group">
							  <div class="input-group-prepend">
	    							<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
	  						  </div>
							  <div class="custom-file">
							    <input type="file" class="custom-file-input" id="file-roy" lang="es" aria-describedby="inputGroupFileAddon01" style="padding: 10px; margin-top: 23px;">
							    <label class="custom-file-label" for="file-roy" id="la-input">Seleccionar Archivo</label>
							  </div>
							</div>
						</div>
				</div>
	            <div class="col-md-4">
						<div class="form-group">
								<button type="button" class="btn btn-success" id="load1" style="padding: 10px; margin-top: 23px;">Upload  <i id="l1" class="fa   fa-upload"></i></button>
						</div>
				</div>	
	            <div class="col-md-12">
	            	<a href="#" id="csv_brake" style="color: #0000ff;"><u>Export material cost brake file upload</u></a><br><br>
				</div>	
	            <div class="col-md-12"> 
	            	<a href="#" id="csv_pump" style="color: #0000ff;"><u>Export material cost pump file upload</u></a>
				</div>	




			</div>
        </section>      
        <!-- Step 4 -->
       <h6 hidden="true">Step</h6>
        <section>
          <div class="row"  hidden="true">
            <div class="col-md-12">

            <!-- </div> -->
            <!-- <div class="col-md-6"> -->
            	<center><button type="button" id="export_report" class="btn btn-outline btn-success btn-lg mb-5"><p style="padding: 1em 20em; margin-bottom: 0rem; font-size: 20px"><i class="fa fa-file-excel-o" style="font-size: 5em"></i><br>Export Royalty Report</p></button></center>
            </div>
          </div>
        </section>         
      </form>
        </div>
        <!-- /.box-body -->
      </div>

      <!-- /.box -->
<!-- <br><br><br>&emsp;  Export Royalty Report  &emsp;<br><br><br><br> -->
    </section>
    <!-- /.content -->
    <!-- <a href="http://192.168.161.102/report_access/file_price_mat/csv_file/material_cost.csv" id="link_a">eweqweqwe</a> -->
  </div>
  <!-- /.content-wrapper -->
        <!-- Modal -->
        <div class="modal modal-fill fade" data-backdrop="false" id="modal-fill" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" >
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>

	         	<div class="modal-body">
	       
	                <div class="col-12">
	                  <div class="box">
	                    <div class="box-header with-border">
	                      <h4 class="box-title">Responsive Hover Table</h4>
	                    </div>
	                    <!-- /.box-header -->
	                    <div class="box-body no-padding  form-element">
	                    </div>
	                        <!-- /.box-body -->
	                 </div>
	                      <!-- /.box -->
	                </div>
				</div>
		        <div class="modal-footer">
		                      <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
		                      <button type="button" class="btn btn-bold btn-pure btn-primary float-right" id="save_modal_tb">Save changes</button>
		       </div>
    	       </div>
  		      </div>
	     </div> 
        <!-- /.modal -->

					  <div class="modal modal-content_chd fade" id="modal-in">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h4 class="modal-title">Default Modal</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_model">
								  <span aria-hidden="true">&times;</span></button>
							  </div>
							  <div class="modal-body">
							      <div class="col-12">
							            <div class="box">
											<div class="box-header with-border">
							              		<h5 class="box-title">Viwe data in Explanner</h5>
											</div>
											<div class="box-body p-0">
											  <div class="media-list media-list-divided">
												<div class="media media-single">
												  <span class="font-size-24 text-info"><i class="fa  fa-info-circle"></i></span>
												  <span class="title" style="font-weight: bold">Part Number Customer in Explanner</span>
												  <span class="title" id="cust_p" style="text-align: right; margin-right:10% ">Deeveloper Manual</span>
												  <a class="font-size-18 text-gray hover-info" href="#"><i class="fa fa-plug"></i></a>
												</div>

												<div class="media media-single">
												  <span class="font-size-24 text-info"><i class="fa  fa-info-circle"></i></span>
												  <span class="title" style="font-weight: bold">Part Number Owner in Explanner</span>
												  <span class="title" id="ownr_p" style="text-align: right; margin-right:10%" >Deeveloper Manual</span>												  
												  <a class="font-size-18 text-gray hover-info" href="#"><i class="fa fa-plug"></i></a>
												</div>

												<div class="media media-single">
												  <span class="font-size-24 text-info"><i class="fa  fa-info-circle"></i></span>
												  <span class="title" style="font-weight: bold">Part Name in Explanner</span>
												  <span class="title" id="name_p" style="text-align: right; margin-right:10%" >Deeveloper Manual</span>												  
												  <a class="font-size-18 text-gray hover-info" href="#"><i class="fa fa-plug"></i></a>
												</div>

												<div class="media media-single">
												  <span class="font-size-24 text-info"><i class="fa  fa-info-circle"></i></span>
												  <span class="title" style="font-weight: bold">Model in Explanner</span>
												  <span class="title" id="model_p" style="text-align: right; margin-right:10%" >Deeveloper Manual</span>												  
												  <a class="font-size-18 text-gray hover-info" href="#"><i class="fa fa-plug"></i></a>
												</div>

												<div class="media media-single">
												  <span class="font-size-24 text-info"><i class="fa  fa-info-circle"></i></span>
												  <span class="title" style="font-weight: bold">Price</span>
												  <span class="title" id="price_p" style="text-align: right; margin-right:10%" >Deeveloper Manual</span>												  
												  <a class="font-size-18 text-gray hover-info" href="#"><i class="fa fa-plug"></i></a>
												</div>

												<div class="media media-single">
												  <span class="font-size-24 text-info"><i class="fa  fa-info-circle"></i></span>
												  <span class="title" style="font-weight: bold">Qty.</span>
												  <span class="title" id="qty_p" style="text-align: right; margin-right:10%" >Deeveloper Manual</span>												  
												  <a class="font-size-18 text-gray hover-info" href="#"><i class="fa fa-plug"></i></a>
												</div>

												<div class="media media-single">
												  <span class="font-size-24 text-info"><i class="fa  fa-info-circle"></i></span>
												  <span class="title" style="font-weight: bold">Amount</span>
												  <span class="title" id="amnt_p" style="text-align: right; margin-right:10%" >Deeveloper Manual</span>												  
												  <a class="font-size-18 text-gray hover-info" href="#"><i class="fa fa-plug"></i></a>
												</div>																								
											  	</div>
										  </div>
							            </div>


							          <!-- /.box -->
							        </div>
							        <!-- ./col -->
							  		</div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary float-right">Save changes</button>
							  </div>
							</div>
							<!-- /.modal-content -->
						  </div>
						  <!-- /.modal-dialog -->
					  </div>
					  <!-- /.modal -->




<script type="text/javascript"> 

	erro = 0; 
	sm = 0; 
	bh = 0; 
	ig = 0; 
	im = 0; 
	pl = 0;  
	imop = 0;
	up_clk = 0;
	indx = 0;
	var data_match = []; 
	var old_da = [];

	complete_page = [0, 0, 0, 1, 1, 1];
	//var table5 = $('#example5').DataTable();
	sm_hide = [ 0, 0 ];
	bh_hide = [ 0, 0 ];
	ig_hide = [ 0, 0 ];
	im_hide = [ 0, 0 ];
	pl_hide = [ 0, 0 ]; 


</script>
	<!-- SoftMaterial admin for Data Table -->
<script src="<?php echo base_url() ?>assets/js/pages/data-table-sale.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/vendor_components/datatable/datatables.min.js"></script> -->

<!-- <script src="<?php echo base_url() ?>assets/js/pages/project-table.js"></script> -->

<script src="<?php echo base_url() ?>assets/content/js/step_1_royalty.js"></script>

<script src="<?php echo base_url() ?>assets/content/js/function/function_royalty_action.js"></script>
<script src="<?php echo base_url() ?>assets/content/js/function/function_royalty.js"></script>
<script src="<?php echo base_url() ?>assets/content/js/function/function_royalty_upload.js"></script>
<script src="<?php echo base_url() ?>assets/content/js/function/function_royalty_export.js"></script>

<script src="<?php echo base_url() ?>assets/content/js/step_2_royalty.js"></script>
<script src="<?php echo base_url() ?>assets/content/js/step_2_royalty_show.js"></script>
<script src="<?php echo base_url() ?>assets/content/js/step_2_royalty_hid.js"></script>




