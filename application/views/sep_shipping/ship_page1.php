

<div id="myNav" class="overlay" style="display:none; background-color: rgba(0,0,0,0.4);  position: fixed;" ><div class="overlay-content-com" style="text-align:center; top: 20%;"><span class="label label-danger" id="tm_mer">00:00:00</span></div></div>

           

<div class="layout-main">
<!--    <div id="myNav" class="overlay" style="display:none;" >                
        <div class="overlay-content-com" style="text-align:center;">
          <span><i class="fa fa-spinner fa-spin" style="font-size:180px; color:red;"></i></span>            
        </div>
    </div>  -->
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Shipping Compare tag customer</span>
              <span class="d-ib">
                <!-- <a class="title-bar-shortcut" href="#" title="Add to shortcut list" data-container="body" data-toggle-text="Remove from shortcut list" data-trigger="hover" data-placement="right" data-toggle="tooltip"> -->
                  <!-- <span class="sr-only">Add to shortcut list</span> -->
                <!-- </a> -->
              </span>
            </h1>
            <!-- <p class="title-bar-description"> -->
              <!-- <small>In addition to the basic styling that Bootstrap offers for every element of a form, we have expanded this styling with custom <code>selects</code>, <code>checkboxes</code>, <code>radios</code>, <code>switches</code> and a few additional classes. -->
                <!-- <span class="nowrap">Please see <a href="toggles.html">Toggles page</a></span>.</small> -->
            <!-- </p> -->
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="demo-form-wrapper">
                <form class="form form-horizontal">
                  <div class="form-group">
                    <label class="col-md-1 control-label" for="form-control-1">Date scan</label>
                    <div class="col-md-2">
                      <div class="input-with-icon">
                        <input class="form-control" type="text" data-provide="datepicker" data-date-today-btn="linked" id="com-date1" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d'); ?>">
                        <span class="icon icon-calendar input-icon"></span>

                      </div>

                    </div>
                     <label style="position: absolute; text-align: center; margin-top: 7px; margin-left:-7px">To</label>
                    <div class="col-md-2">
                      <div class="input-with-icon">
                        <input class="form-control" type="text" data-provide="datepicker" data-date-today-btn="linked" id="com-date2" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d'); ?>">
                        <span class="icon icon-calendar input-icon"></span>
                      </div>

                    </div>   
                    <div class="col-md-1" style="padding-right: 1%;">
                    <button class="btn btn-primary" type="button" id="comBnt-sea">
                      <span id="com-sea" class="icon icon-search" style=""></span>
                      <span id="com-wai" class="spinner spinner-inverse pos-r sq-32" style="height: 10px; width: 30px; display: none;"></span>
                        Search
                    </button>
                    </div>
                      <div class="col-md-2 btn-group dropdown" style="margin-left: 0px;" id="exp-com">
                         <button class="btn btn-warning" type="button"  disabled="true">
                            <span class="icon icon-download"></span>
                            Export
                          </button>
                          <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" type="button"  disabled="true">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="#" id="exc-com">
                              <div class="media">
                                <div class="media-left">
                                  <span class="icon icon-file-excel-o"></span>
                                </div>
                                <div class="media-body">
                                  <span class="d-b">Export file to .xlsx</span>
                                  <!-- <small>People can sync and edit.</small> -->
                                </div>
                              </div>
                            </a>
                          </li>
                          <li>
                            <a href="#" id="csv-com">
                              <div class="media">
                                <div class="media-left">
                                  <span class="icon icon-file-text-o"></span>
                                </div>
                                <div class="media-body">
                                  <span class="d-b">Export file to .csv</span>
                                  <!-- <small>People can view.</small> -->
                                </div>
                              </div>
                            </a>
                          </li>



                      </div>
                    </div>                                      
                  </div>

                      
                </form>
              </div>
            </div>
            <div class="col-md-12" style="margin-top: -42px;" id="vCom-table" hidden="true" >
                  <table id="demo-datatables-com" class="table table-striped table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead style="background-color: #0288d1; color:#ffffff;">
                      <tr>
                        <th style="width:10%;">TERM_NO</th>
                        <th style="width:15%;">EXEC_DATE</th>
                        <th style="width:15%;">ITEM_CD</th>
                        <th style="width:30%;">DATA1</th>
                        <th style="width:30%;">DATA2</th>
                      </tr>
                    </thead>
                    <tfoot  style="background-color: #0288d1; color:#ffffff;">
                      <tr>
                        <th style="width:10%;">TERM_NO</th>
                        <th style="width:15%;">EXEC_DATE</th>
                        <th style="width:15%;">ITEM_CD</th>
                        <th style="width:30%;">DATA1</th>
                        <th style="width:30%;">DATA2</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                  </table>              
            </div>
          </div>

          </div>

  



  



    </div> 
         <div class="layout-footer" style="position: fixed; margin-left: 0px;">
        <div class="layout-footer-body">
          <small class="version">Version 1.4.0</small>   
        </div>
      </div>
