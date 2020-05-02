       
    <div class="row gutter-xs">
                <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <div class="card-actions">
                            <button type="button" class="card-action card-toggler" title="Collapse"></button>
                            <!-- <button type="button" class="card-action card-reload" title="Reload"></button> -->
                            <!-- <button type="button" class="card-action card-remove" title="Remove"></button> -->
                          </div>
                          <strong>Activity Feed</strong>
                        
                        </div>                        
                        <div class="card-body">
                            <div class="col-md-10">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label  class="form-label">Delivery Date</label>
                                        <!-- <div class="input-with-icon col-xs-1"> -->
                                               
                                            <input class="form-control" id="dateship" type="text" name="daterange" value="<?php  echo date('Y/m/d',strtotime('-1 day', strtotime(date('Y-m-d') ) ) ) .' - '. date('Y/m/d');   ?>" style="padding: 2px 25px;" />
                                            <!-- <input class="form-control" type="text" data-provide="datepicker" data-date-today-btn="linked" id="com-date1" data-date-format="yyyy-mm-dd" value="<?php //echo date('Y-m-d'); ?>"> -->
                                            <span class="icon icon-calendar input-icon" style=" left: 12px; line-height: 84px; "></span>
                                        <!-- </div> -->
                                        <!-- <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" /> -->
                                    </div>
                                </div>                              
                                <div class="col-xs-4">
                                    <div class="form-group">
                                            <label for="demo-select2-10" class="form-label">Item cd</label>
                                            <select id="demo-select2-10" class="form-control">
                                            </select>
                                    </div>
                                </div>
                                                                                
                                <div class="col-xs-4">
                                    <div class="form-group">
                                            <label for="demo-select2-13" class="form-label">Invoice number</label>
                                            <select id="demo-select2-13" class="form-control">
                                            </select>
                                    </div>
                                </div> 
                                 
                                <div class="col-xs-4">
                                    <div class="form-group">
                                            <label for="demo-select2-14" class="form-label">Customers code</label>
                                            <select id="demo-select2-14" class="form-control">
                                            </select>                                        
                                    </div>
                                </div>  
                                <div class="col-xs-4">
                                    <div class="form-group">
                                            <label for="lotship" class="form-label">Lot number</label>
                                            <input class="form-control" type="text" id="lotship" placeholder="Lot input.">
                                    </div>
                                </div>                                                                                 
                        </div>
                        <div class="col-md-2">
                                <div class="col-md-12" style=" padding-left: 20%; padding-right: 26%;">
                                    <button class="btn btn-primary" type="button" id="bnt-shipFind" style="position: relative;margin-top: 1%;border-radius: 65px;padding: 37px 40px;left: 50%;margin-left: -50px; top: 50%;margin-top: 0px; "> <!--/*style="left: 8%;margin-top: 1%;border-radius: 65px;-->
                                        <span class="icon icon-search" style="font-size: 50px;" ></span>
                                    </button>
                                </div>
                        </div>                          
                  </div>
                </div>

              </div>
             
    </div>
    <div class="row gutter-xs" id="shtable" style="display: none;" >
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                    <strong>Activity Feed</strong>
                    <button class="btn btn-success btn-sm btn-labeled" type="button"   name="button-shipping" id="bntship-excel" style="width:80px;float: right; left: 0px;">
                        <span class="btn-label">
                                <span class="icon icon-file-excel-o icon-lg icon-fw"></span>
                        </span>
                        <span style="margin-left: -6px;">EXCEL</span>
                    </button>
                    <button class="btn btn-danger btn-sm btn-labeled" type="button"    name="button-shipping" id="bntship-csv" style="width:80px;float: right; left: -5px;">
                        <span class="btn-label">
                            <span class="icon icon-file-text icon-lg icon-fw"></span>
                        </span>
                        <span style="margin-left: 0px;">CSV</span>  
                    </button>                     
                </div> 
                <div class="card-body">
                  <!-- <table id="demo-datatables-scroller-2" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
                  <table id="indt-datatables" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" style="background-color: #e6deaf; width:100%">
                    <thead style="background: #0288d1; color: yellow;"> 
                      <tr>
                        <th style=" text-align: center;">ITEM CD</th>
                        <th style=" text-align: center;">LOT NUMBER</th>
                        <th style=" text-align: center;">INVOICE NO</th>
                        <th style=" text-align: center;">DELIVERY DATE</th>
                        <th style=" text-align: center;">SHIPPING DATE</th>
                        <th style=" text-align: right; ">SHIP QTY</th>
                        <th style=" text-align: center;">SLIP CD</th>
                        <th style=" text-align: center; width:120px;">CREATED DATE</th>
                        <th style=" text-align: center;">PO NUMBER</th>
                        <th style=" text-align: center;">CUST CD</th>
                        <th style=" text-align: right;" >TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>                                      
                    </tbody>  
                    <tfoot>
                      <tr>
                        <th style=" text-align: center;">ITEM CD</th>
                        <th style=" text-align: center;">LOT NUMBER</th>
                        <th style=" text-align: center;">INVOICE NO</th>
                        <th style=" text-align: center;">DELIVERY DATE</th>
                        <th style=" text-align: center;">SHIPPING DATE</th>
                        <th style=" text-align: right; ">SHIP QTY</th>
                        <th style=" text-align: center;">SLIP CD</th>
                        <th style=" text-align: center;width:120px;">CREATED DATE</th>
                        <th style=" text-align: center;">PO NUMBER</th>
                        <th style=" text-align: center;">CUST CD</th>
                        <th style=" text-align: right; " >TOTAL</th>
                      </tr>
                    </tfoot>                                     
                  </table>
                </div>
              </div>
            </div>
    </div>



