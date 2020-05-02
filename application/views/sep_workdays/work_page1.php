<div id="myNav" class="overlay" style="display:none; background-color: rgba(0,0,0,0.4);  position: fixed;" ><div class="overlay-content-com" style="text-align:center; top: 20%; margin-left: -2%;"><span class="label label-danger" id="tm_mer" >00:00:00</span></div></div>

           

<div class="layout-main">
<!--    <div id="myNav" class="overlay" style="display:none;" >                
        <div class="overlay-content-com" style="text-align:center;">
          <span><i class="fa fa-spinner fa-spin" style="font-size:180px; color:red;"></i></span>            
        </div>
    </div>  -->
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Production Work days</span>
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
                    <label class="col-md-1 control-label" for="form-control-1">Select month</label>
                    <div class="col-md-2">
                      <div class="input-with-icon">
                        <input class="form-control form-control-1 from" type="text" data-date-viewmode="months" placeholder="Start month"  id="work-date1" style="width: 60%; ">
                        <span class="icon icon-calendar input-icon"></span>

                      </div>

                    </div>
                     <label style="position: absolute; text-align: center; margin-top: 7px; margin-left:-5%;">To</label>
                    <div class="col-md-2" style="margin-left: -3%;">
                      <div class="input-with-icon">
                        <input class="form-control form-control-2 to" type="text" data-date-viewmode="months" placeholder="End month" id="work-date2" style="width: 60%; " >
                        <span class="icon icon-calendar input-icon"></span>
                      </div>
                    </div>   
                    <div class="col-md-1" style="margin-left: -6%;">
                    <button class="btn btn-primary" type="button" id="workBnt-sea">
                      <span id="com-sea" class="icon icon-search"></span>
                      <span id="com-wai" class="spinner spinner-inverse pos-r sq-32" style="height: 10px; width: 30px; display: none;"></span>
                        Search
                    </button>
                    </div> 

                    </div> 
                   </form>                                     
                  </div>

                      

              </div>
            </div>
            <div class="col-md-12" style="margin-top: -42px;" id="vWork-table" hidden="true" >
                  <table id="demo-datatables-work" class="table table-striped table-nowrap dataTable" cellspacing="0" width="100%">
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
