<style>
   
    #chartdiv {
        width: 100%;
        height: 370px;
    }								
    .wrap {
        width: 300px;
        margin: 50px auto;
    }
    .wrap p {
        text-align: center;
        font-weight: 600;
        font-size: 18px;
    }
    .wrapper {
        margin: 1em auto;
        border: 1px solid #fff;
        width: 100%;
        height: 375px;
        position: relative;
    }
    p{text-align:center;} 
    .modallayoutdetail{
        position: relative;
        width: 100%;
        margin: 0;
        /* padding: 5% 30% 5%; */
        height: 100%;      
    }  
    .headerr{
        position: relative;
        width: 100%;
        /* height: 80px; */
        border-bottom: 4px solid white;
    }
    .headerrall{
        position: relative;
        /* width: 100%; */
        height: 86px;
        border-bottom: 4px solid white;
    }
    .headerrh{
        position: relative;
        /* width: 50%; */
        height: 80px;
        /* border-bottom: 4px solid white; */
    }
    .headerrg{
        position: relative;
        /* width: 25%; */
        height: 80px;
        /* border-bottom: 4px solid white; */
    }
    .headerrg1{
        position: relative;
        /* width: 25%; */
        height: 80px;
        /* border-bottom: 4px solid white; */
    }
    .headerrg1{
        position: relative;
        /* width: 25%; */
        height: 80px;
        /* border-bottom: 4px solid white; */
    }
    .datailp{
         position: relative;
         margin: 0% 0%;
         width: 100%;
         height: 349px;
         border: 1px solid white;
    }
   .modell{
        position: relative;
        padding: 9px;
        top: 0;
        border-right: 3px solid white;
        height: 347px;
   }
   .modelll{
        position: relative;
        margin: 0px 0px;
        padding: 8px 32px;
        height: auto;
        border-right: 3px solid white;
   }
    .controll{
        padding-left:0px !important;
    }
    .modal-footer {
         position: relative;
         bottom: 0;
         padding: 15px;
         text-align: right;
         border-top: 1px solid #e5e5e5;
       
    }
    #chartdiv1 {
        width: 100%;
        height: 332px;
    }

}


  
</style>

    <div class="modal animated shake controll" id="myModaldetail1" role="dialog">
        <div class="modallayoutdetail">
            <div class="modal-content" style="background: linear-gradient(#0f2639, #101e32, #03080c);height: auto;border-radius: 0px;">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!-- <div class="headerr">                                                                                                                                               headerr"> -->
                                <h1 style="background: #00000059;padding: 16px 18px 1px;font-size: 250%;color: white;border-bottom: 1px solid white;">PRODUCTION LINE :</p></h1>
                            <!-- </div> -->
                            <div class="headerrall">
                                <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12  headerrh">
                                    <h1 style="font-weight: 700;font-size: 180%;float: left;font-family: inherit;margin: 0;margin-top: 36px;color: #0ff900;">TRANSECTION PRODUCTION</h1>
                                </div>
                                <div class="col-lg-3 col-md-1 col-sm-1 col-xs-12  headerrg">
                                    <h1 style="font-weight: 700;font-size: 180%;float: left;font-family: inherit;margin: 0;margin-top: 36px;color: white;">LOSS TIME : </h1>
                                </div>  
                                <div class="col-lg-2 col-md-1 col-sm-1 col-xs-12  headerrg1">
                                    <h1 style="font-weight: 700;font-size: 180%;float: left;font-family: inherit;margin: 0;margin-top: 36px;color: white;">PLAN : </h1>
                                </div>  
                                <div class="col-lg-2 col-md-1 col-sm-1 col-xs-12  headerrg2">                
                                    <h1 style="font-weight: 700;font-size: 180%;float: left;font-family: inherit;margin: 0;margin-top: 36px;color: white;">ACTUAL : </h1>  
                                </div>                                   -
                            </div>     
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="wrapper">                              
                                    <div id="chartdiv"></div>
                                </div>                                                                      
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="datailp">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12 modell">
                                        <div class="modeldetail">
                                            <h1 style="padding: 3% 1%;font-size: 25px;color: white;border-bottom: 3px solid white;">Detail Production</h1>
                                            <h1 style="padding: 1.7% 1%;font-size: 20px;color: white;border-bottom: 1px solid white;">Part No.</h1>
                                            <h1 style="padding: 1.7% 1%;font-size: 20px;color: white;border-bottom: 1px solid white;">Part name</h1>
                                            <h1 style="padding: 1.7% 1%;font-size: 20px;color: white;border-bottom: 1px solid white;">Model</h1>
                                            <h1 style="padding: 1.7% 1%;font-size: 20px;color: white;border-bottom: 1px solid white;">SEQ.</h1>
                                            <h1 style="padding: 1.7% 1%;font-size: 20px;color: white;border-bottom: 1px solid white;">LOT</h1>
                                        </div>
                                    </div>   
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 modelll">    
                                        <div id="chartdiv1"></div>
                                    </div>
                                </div>
                            </div>                                                                             `
                        </div> 
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="modal-footer" style="position: relative; bottom: 0; left: 0; height: 50px; width: 100%;padding: 15px;">
                                <button type="button" class="btn btn-success" data-dismiss="modal" style="margin-right: 1%; float: right;">Close</button>
                            </div> 
                            </div>
                     </div>                      
                 </div>                
            </div>
        </div>
    </div>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
 <script src="https://www.amcharts.com/lib/4/charts.js"></script>
 <script src="https://www.amcharts.com/lib/4/themes/dark.js"></script>
 <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>