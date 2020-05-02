  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        History - Download Interface Data 
      </h1>
    </section> 
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
         <h5><i class=" fa fa-file-text"></i>&nbsp;&nbsp;Please select period date to find download history.</h5>


        <div class="box-body">
          <div class="row">
            <div class="col">
              
              <!-- <form action="http://192.168.161.102/excel_gen/csv/pu" class="novalidate" method="post" accept-charset="utf-8"> -->
                
             <?php echo form_open_multipart('Download_history/showhis/');?> 
                <!-- <?php  
                 // $flg = array_filter($data);


                  //echo $flg; exit;
                ?> -->

                <input type="hidden" id="frmEdit" name="frmEdit" value="<?php echo "23345326"; ?>">
                <div class="row">
                  <div class="col-lg-5 col-12"> 
                                <div class="form-group">
                                  <h5>  Select Start Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                      <input type="date" name="date_start" class="form-control" required data-validation-required-message="This field is required" value="<?php echo date('Y-m-d') ?>" id="dt1"> 
                                    </div>
                                  <!-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>                                          -->
                                </div>
                  </div>

                  <div class="col-lg-5 col-12"> 
                                <div class="form-group">
                                  <h5>  Select End Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                      <input type="date" name="date_end" class="form-control" required data-validation-required-message="This field is required" value="<?php echo date('Y-m-d') ?>"  id="dt2"> 
                                    </div>
                                  <!-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> -->
                                </div>                                     
                  </div>

                  <!-- <div class="col-lg-2 col-12">  -->
                  <div class="box-footer text-right">
                      <!-- <button  type="submit" class="btn btn-social btn btn-bitbucket pull-right mb-5" name="bu" value="1" ><i class="fa fa-search" ></i>Click for search</button> -->
                      <button  class="btn btn-social btn btn-bitbucket pull-right mb-5" data-original-title='search' ><i class="fa fa-search" ></i>Click for search</button>
                      <!-- <input type="hidden" name="action" value="<?php //echo base64_encode('searchType');?>"  /> -->
                  </div>
                  <!-- <div class="box-footer col-lg-12 col-lg-6 col-12 ">
                      <button  type="submit" class="btn btn-social btn btn-success mb-5" name="bu" value="1" ><i class="fa fa-file-excel-o"  ></i> EXPORT ALL DATA TO CSV FILE </button>
                  </div> -->
<!--             <div class="overlay">
              <i class="fa fa-circle-o-notch fa-spin"></i>
            </div> -->
                </div>              
          <?php echo form_close();?>
             <!-- </form> -->
             <?php if($frmEdit==FALSE){ ?>
             <div class="table-responsive">
                <table id="example6" class="table table-bordered table-hover display nowrap margin-top-10 w-p80">
                    <div class="form-group">
                      <thead>
                        <tr class="bg-secondary">
                          <th>NO.</th>
                          <th>INTERFACE DATA</th>
                          <th>TYPE</th>
                          <th>DOWNLOAD DATE AND TIME</th>           
                          <th>USER ID</th>
                          <th>USERNAME</th>
                          <th>FILE NAME</th>
                        </tr>
                      </thead>
                            <tr>
                              <td colspan="7">
                                <center><b>
                                <?php
                                  echo "-----  NO DATA AS YOU ARE SELECT THAT PERIOD TIME  -----";
                                ?>
                                </center></b>
                              </td>
                            </tr>
                      </tbody>
                </table>
              </div>

             <?php }else{?>
             <?php echo form_open_multipart('Download_history/showhis/');?> 
<!--               <?php 
                 // $list_his = array_filter($data);
                  //$flg = array_filter($dataf);
                ?> -->
              <div class="table-responsive">
                <table id="example6" class="table table-bordered table-hover display nowrap margin-top-10 w-p80">
                    <div class="form-group">
                      <thead>
                        <tr class="bg-secondary">
                          <th>NO.</th>
                          <th>INTERFACE DATA</th>
                          <th>TYPE</th>
                          <th>DOWNLOAD DATE AND TIME</th>           
                          <th>USER ID</th>
                          <th>USERNAME</th>
                          <th>FILE NAME</th>
                        </tr>
                      </thead>
                      <?php $i = 0;?>
                      <?php
                          if (!empty($history)) {
                                                    
                          foreach ($history as $down_his){
                        ?>
                      <tbody>
                        <tr>
                          <th><center>
                            <?php
                              $i = $i+1;
                              echo $i;
                            ?>
                          </th></center>
                          <th>
                            <?php echo ($down_his['DATA_TYPE'] == 1) ? "Purchase" : "Sales"; ?>
                          </th>
                          <th>
                            <?php echo ($down_his['FLG'] == 11) ? "All" : ( ($down_his['FLG'] == 22) ? "Domestics" : "Oversea" ); ?>
                          </th>
                          <th>
                            <?php date_default_timezone_set("Asia/Bangkok"); echo $down_his['DL_TIME'];?>
                          </th>
                          <th>
                            <?php echo $down_his['USER_CD'];?>
                          </th>
                          <th>
                            <?php echo $down_his['USER_NAME'];?> 
                          </th>
                          <th>
                             <a href="<?php $link = ($down_his['DATA_TYPE'] == 1) ? "filedownload-purc_his-" : "filedownload-sale_his-"; echo "http://192.168.161.102/excel_gen/download_file/index/" . $link . $down_his['FILE_NAME']; ?>" >
                             <i class="fa fa-download"></i>     <?php echo $down_his['FILE_NAME'];?></a>
                          </th>
                        </tr>
                         <?php }
                          }else if (empty($history) ){?>
                            <tr>
                              <td colspan="7">
                                <center><b>
                                <?php
                                  echo "-----  NO DATA AS YOU ARE SELECT THAT PERIOD TIME  -----";
                                ?>
                                </center></b>
                              </td>
                            </tr>
                        <?php }
                        ?>
                      </tbody>
                </table>
              </div>
              <?php echo form_close();?>
              <?}?>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  </div>
  
    <!-- /.content -->                           