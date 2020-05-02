  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data interface to A.S.I.A (Sale)
      </h1>
    </section> 
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h6 class="box-subtitle">Data Export to CSV </h6>


        <div class="box-body">
          <div class="row">
            <div class="col">
              <form action="http://192.168.161.102/excel_gen/csv/sa" class="novalidate" method="post" accept-charset="utf-8">
                <div class="row">
                  <div class="col-lg-6 col-12"> 
                                <div class="form-group">
                                  <h5>  Enter Start Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                      <input type="date" name="date_start" class="form-control" required data-validation-required-message="This field is required"> 
                                    </div>
                                  <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>                                         
                                </div>
                  </div>

                  <div class="col-lg-6 col-12"> 
                                <div class="form-group">
                                  <h5>  Enter End Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                      <input type="date" name="date_end" class="form-control" required data-validation-required-message="This field is required"> 
                                    </div>
                                  <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>
                                </div>                                     
                  </div>



                  <div class="box-footer col-lg-12 col-12 ">
                      
                      <button  type="submit" class="btn btn-social btn btn-success mb-5" name="ty_data" value="1" ><i class="fa fa-file-excel-o"  ></i> EXPORT ALL DATA TO CSV FILE </button>

                      <button  type="submit" class="btn btn-social btn btn-primary mb-5" name="ty_data" value="2" ><i class="fa fa-file-excel-o"  ></i> EXPORT DOMESTICS DATA TO CSV FILE </button>

                      <button  type="submit" class="btn btn-social btn btn-pink mb-5"    name="ty_data" value="3" ><i class="fa fa-file-excel-o"  ></i> EXPORT OVERSEA DATA TO CSV FILE </button>


                  </div>
<!--             <div class="overlay">
              <i class="fa fa-circle-o-notch fa-spin"></i>
            </div> -->

                </div> 
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  </div>
  
    <!-- /.content -->                           




                                
 