       
            <div class="row">
                <div class="col-md-6" style="margin-bottom: 20px;height: 35px;">
                    <div class="" style="height: 100%;margin-right: -20%;width: 20%;position: absolute;">
                        <label class="control-label" for="form-control-1" style="margin-top: 0.5%;position: absolute;">Select month</label>
                    </div>
                    <div class="" style="height: 100%;width: 40%;margin-left: 12%;position: absolute;">
                        <div class="input-with-icon" style="width: 81%;/* left: 98px; *//* bottom: 25px; */height: 100%;margin-left: 25px;">
                            <input class="form-control form-control-1 from" type="text" data-date-viewmode="months" placeholder="Start month" id="work-date1" style="margin-top: -6px;margin-bottom: 1px;/* width: 85%; */position:absolute;" value="<?php echo date('Y-m') ?>">
                            <span class="icon icon-calendar input-icon" style="top: -5px;margin-left: 5px;"></span>
                        </div>
                    </div>
                    <div class="" style="top: -5px;height: 100%;margin-left: 51%;position: absolute;">
                        <button class="btn btn-primary" type="button" id="workBnt-sea" style="top: 0%;/* left: 80%; */">
                            <span id="com-sea" class="icon icon-search" style=""></span>
                            <span id="com-wai" class="spinner spinner-inverse pos-r sq-32" style="height: 10px; width: 30px; display: none;"></span>
                            Search
                        </button>
                        <button class="btn btn-success" type="button" id="workBnt-exl" style="top: 0%;/* left: 80%; margin-left: 95px;*/">
                            <span id="com-exl" class="icon icon-file-excel-o" style=""></span>
                            Excel file
                        </button>         
                    </div>
                </div>
            </div>
  
            <div class="row">
                <div class="col-md-4" style="margin-bottom: 10px;">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title" style="text-align: center;">Summary Work days of PD</h4>
                           <div id="hero-bar"></div>
                        </div>
                      </div>
                </div>
                <div class="col-md-8"  style="margin-bottom: 10px;">
                      <div class="card" >                      
                        <div class="card-body">                              
                          <h4 class="card-title" style="text-align: center;" name="headchaer2">Line fo PD Working  per day</h4>
                          <div id="online-bar"><h5 class="card-title" style="text-align: center;">Click Bar chart on Summary Work days of PD to view data Line fo PD Working  per day. </h5></div>
                        </div>
                      </div>                     
                </div> 
            </div>
            <div class="row"> 
                <div class="col-md-12"  style="margin-bottom: 10px;">
                      <div class="card" >
                        <div class="card-body">
                          <h4 class="card-title" style="text-align: center;">Work days of Line</h4>
                          <div id="online-bar2"><h5 class="card-title" style="text-align: center;">Click Bar chart on Summary Work days of PD to view data Work days of Line. </h5></div>
                        </div>
                      </div>                      
                </div>                                       
            </div>



