  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sale Report
      </h1>
    </section> 

    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h6 class="box-subtitle">Data Export to Excel</h6>
<!-- -->
        <div class="box-body">
          <div class="row">
            <div class="col">
              <form action="http://localhost/gen_excel/gen/sal" class="novalidate" method="post" accept-charset="utf-8">
              <!-- <form acction="http://localhost/Gen_excel/gen/sal" class = "novalidate" method="post">  -->
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

                      <button  type="submit" class="btn btn-social btn btn-success mb-5"><i class="fa fa-file-excel-o"  ></i> Export Report Sale  </button>

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




                                
 