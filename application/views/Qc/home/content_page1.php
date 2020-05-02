<style type="text/css" >
    .inpdate{
        height: 100%;
        width: 100%;
        float: left;
        font-size: 30px;
        border: 3px solid black;  
        background-color: inherit !important;     
    }
    .bntdate{ 
        height: 100%;
        width: 54px;
        font-size: 31px;
        position: relative;
        margin-top: -80px;
        padding: 3px;   
    }
    .bntck{ 
        border: 2px solid #00000094;
        background: black;
        padding: 1px 10px 15px;
        margin-left: 0px !important;  
        font-size: 31px;
        height: 100% !important;
        width: 100%; 
        border-radius:0;
    }
    .bntsearch{
        color: black;
        font-size: 20px;
        height: 68px;
        border: 3px solid black;
        font-family: "Ruda", "sans-serif" !important;
        background: #00000024;
        z-index: 1;
    }
    .bntprint{
        height: 22px;
        padding: 0px 9px;
        border: 2px solid black;
        background: #00000024;
        /* color:white; */
    }
    .datepicker{
        font-size: 18px !important;
        color: black !important;
        background: #efd99f !important;
    }
    .datepicker thead>tr>.prev, .datepicker thead>tr>.switch, .datepicker thead>tr>.next { 
        background: #cdba89 !important;
    }

    .bnmg{
        margin-bottom: 5px;
    }
    .bnmgc{
        margin-bottom: 10px;
    }
    .pnh{
        height: 300px;
        background: #efd99f !important;
    }
    .pnd{
        height: 600px;
        background: #efd99f !important;
    }
    .qch{
        height: 73px !important; 
        background: #00000024 !important;
    }
    .cn .btn:hover  {
        background: #efd99f !important;
        border:2px solid black;
        color: #000;
    }
    .cn .bntprint:hover  {
        background: #efd99f !important;
        border:2px solid black;
        color: #000;
    }    
    .ld{
            position: absolute;
            width: 100%;
            height: 100%;
            min-width: 100%;
            background: #000000bd;
            z-index: 900;
            border-radius: 7px;
            left: 0;
            top: 0;
            display: none;    
        }

    .nm  {  text-align: right; padding-right: 3% !important; }
    .tabdetail{ width: 100%; color:black; font-size: 24px;}
    .tabdetail thead tr{ padding: 3px 2px 0px; line-height: 1; height: 36px;}
    .tabdetail thead th{ font-weight: 500 !important; }
    .tabdetail thead th{ margin: 5px; }
    .tabdetail thead tr>*:nth-child(1){ width: 50%; }
    .tabdetail thead tr>*:nth-child(2){ width: 10%; }
    .tabdetail thead tr>*:nth-child(3){ width: 5%;  }
    .tabdetail thead tr>*:nth-child(4){ width: 35%; }

    .tabrowh{ border-bottom:3px solid black; line-height: 1;}
    .tabcolh{ border-bottom:2px solid black; padding: 2% 2px 0px; }
    .tabrowc th{ padding: 7px 2px 3px; font-size: 18px;}



    @media (max-width: 1400px){ .pnh .qch h2 { font-size: 24px; } } 
    @media (max-width: 1200px){ .pnh .qch h2 { margin-top: 10px;} .bntsearch{ font-size: 15px;}  }
    @media (max-height: 760px){ .pnd { height: 500px; } }

 </style>

 

<section id="main-content" style="margin-left: 0px;">
        <div class="ld" name="acload">  </div>
      <section class="wrapper"> 
        <div class="row cn" style="margin-top: 5px;">
            <div class="col-lg-12 bnmgc"> 
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12 bnmg">
                        <div class="darkblue-panel pn pnh" >
                            <div class="darkblue-header qch" >
                                <h2 style="color: #4c3c3cf0; font-weight: 600; "> LIST PLAN RECEIVE SELECT DATE </h2>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                    <div class="input-append date dpRece" data-date="<?echo date('Y-m-d');?>" style="height: 80px;">
                                    <input type="text" name="recdate" readonly="" value="<?echo date('Y-m-d');?>" size="23" class="form-control inpdate"> 
                                    <span class="input-group-btn add-on bntdate">
                                        <button class="btn btn-theme bntck" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                    </div> 
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12"> 
                                    <div style="margin-top: 30px; float: left; width: 100%;">
                                        <button class="btn btn-theme bntsearch" type="button" onclick="qcsearchbnt();">
                                            <i class="fa fa-search"></i>
                                             Search data receive to day
                                        </button>
                                     </div> 
                                 </div>                                
                            </div> 
                        </div> 
                    </div>
                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-12 bnmg">
                        <div class="darkblue-panel pn pnd">
                            <div class="darkblue-header qch" >
                                <h2 style="color: #4c3c3cf0; font-weight: 600; "> LIST PLAN RECEIVE DETAIL SUMMARY </h2>
                            </div>
                            <div style="background: wheat;">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                    <table class="tabdetail" id="tabble-recoverall">
                                        <thead>
                                            <tr class="tabrowh">
                                                <th>Plan receive to day</th>
                                                <th class="nm">0</th>
                                                <th>po.</th>
                                            </tr>
                                            <tr>
                                                <th class="tabcolh">Plan receive to day of Phase 10</th> 
                                            </tr>
                                            <tr class="tabrowc">
                                                <th>Po number</th>
                                                <th class="nm">0</th>
                                                <th>po.</th>
                                            </tr>
                                            <tr class="tabrowc">
                                                <th>Vendor</th>
                                                <th class="nm">0</th>
                                                <th>vendor</th>
                                            </tr>
                                            <tr class="tabrowc">
                                                <th>Print data list Phase 10</th>
                                                <th><button type="button" class="btn bntprint" onclick="modalpnt(51);"><i class="fa fa-print"></i> Print</button></th> 
                                            </tr>                                            
                                            <tr>
                                                <th  class="tabcolh" >Plan receive to day of Phase 08</th>
                                            </tr>
                                            <tr class="tabrowc">
                                                <th>Po number</th>
                                                <th class="nm">0</th>
                                                <th>po.</th>
                                            </tr>   
                                            <tr class="tabrowc">
                                                <th>Vendor</th>
                                                <th class="nm">0</th>
                                                <th>vendor</th>
                                            </tr>
                                            <tr class="tabrowc">
                                                <th>Print data list Phase 08</th>
                                                <th ><button type="button" class="btn bntprint" onclick="modalpnt(52);"><i class="fa fa-print"></i> Print</button></th> 
                                            </tr>                                                                                                                                                                                                                                                                                                                   
                                        </thead>
                                    </table>
                                </div>
                            </div>                             
                        </div> 
                    </div>                    
                </div>
             </div>
        </div>
      </section> 
 </section>