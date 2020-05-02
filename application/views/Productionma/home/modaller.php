<style type="text/css">
    .modalcontmain{
        position: fixed;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0px !important;}
    .conbox {
        background: #11283459;
        padding: 2px 2px;
        border-radius: 7px;
    }
    .conbox1{
        /* background: #00000040; */
        width: 100%;
        height: 300px;
        /* border: 1px solid #345473; */
    }
    .conbox2{
        /* background: #a5daff6e; */
        background: #000000d1;
        width: 49%;
        height: 147px;
        margin: 1px 0.5%;
        padding: 2px 2px 1px 2px;
        border-radius: 3px;
    }
    .conbox3{
        /* background: #a5daff6e; */
        background: #000000d1;
        width: 99%;
        height: 149px;
        margin: 1px 0.5%;
        padding: 2px 2px 1px 2px;
        border-radius: 3px;
    }
    .conheader{
        /* background: #a5daff6e; */
        width:  100%;
        height: 27px;
        padding: 1px;
        border-bottom: solid 2px #bbbbc5;
        margin-bottom: 3px;
        color: wheat;
    }
    .conbody{
        /* background: #a5daff6e; */
        width:  100%;
        height: 40px;
        padding: 1px;
        border-bottom: solid 1px #bbbbc5;
        margin-bottom: 3px;
    }
    .conbody2{
        /* background: #a5daff6e; */
        width:  100%;
        height: 70px;
        padding: 1px;
        /* border-bottom: solid 1px #bbbbc5; */
        margin-bottom: 3px;
    }
    .point{
        width: 45px;
        height: 43px;
        border-radius: 50%;
        box-shadow: 0px 0px 22px -1px #00ff13;
        background: lime;
        color: #00ffd0;
        padding-left: 45px;
        margin: 10px;
    }
    .pointsmall{
        position: relative;
        border-radius: 100%;
        background: #22d217;
        width : 15px;
        height: 15px;
        top: 0;
        min-height: 1px;
        float: left;
        margin:5px;
    }
    h4{
        color: wheat;
        font-size: 99%;
        margin-top: 6px;
    }

    h7{
        font-weight: 700;
        font-size: 250%;
        float: left;
        font-family: inherit;
        margin: 0;
        margin-top: -8px;
        color: #70bcf9;
    }
    h8{
        font-weight: 700;
        font-size: 60px;
        float: right;
        font-family: inherit;
        margin: 0;
        margin-top: -7px;
        margin-right: -3%;
        color: #fcff36;
    }
    .hcur-asof{
        float: left;
        font-size: 10px;
        margin: 0;
        margin-top: 3px;
        margin-left: 2%;
        border-bottom: solid 1px; 
        color: wheat;
    }
    .hcur-date{
        margin-top: 20px;
        font-size: 11px;
        margin-left: -59px;
        color: #33ef98;
        float: left;        
    }
    .modalspan{
        font-size: 9px;
        background: #fd0808;
        color: wheat;
        padding: 4px;
        border-radius: 5px;
        float: left;
        margin-left: 20%;
        margin-top: 2%;     
    }  
    
    .ld{
        position: absolute;
        width: 100%;
        height: 100%;
        min-width: 100%;
        background: #000000bd;
        z-index: 1;
        border-radius: 7px;
        left: 0;
        top: 0;
        
    }

    .clock:before{
        content: "";
        position: absolute;
        background-color: #fff;
        top:6px;
        left: 48%;
        height: 35px;
        width: 4px;
        border-radius: 5px;
        -webkit-transform-origin: 50% 94%;
                transform-origin: 50% 94%;
        -webkit-animation: ptAiguille 12s linear infinite;
                animation: ptAiguille 12s linear infinite;
    }

    @-webkit-keyframes ptAiguille{
        0%{-webkit-transform:rotate(0deg);}
        100%{-webkit-transform:rotate(360deg);}
    }

    @keyframes ptAiguille{
        0%{transform:rotate(0deg);}
        100%{transform:rotate(360deg);}
    }     
    @media (max-height: 690px) {  .modalheight {  height: auto;    }}
    @media (max-width : 1366px){  .modalspan   {  margin-left:  5%;  }}
    @media (max-width : 1250px){  .modalspans  {  margin-left: -2%; font-size: 6px; margin-top: 0%;  }}
    @media (max-width : 1400px){  .modalspan6  {  margin-left: 3%; font-size: 7px;  margin-top: 5%;  }}
    @media (max-width : 1900px){ 
         .modalspan4  {  margin-left: 6%;  font-size:  9px; margin-top: 1%;   }
         .modalspan6  {  margin-left: 13%; font-size: 6px;  margin-top: 5%;  }
        
        }
    @media (max-width : 969px){   h8 {  margin-right: 2%;  }}
    @media (max-width : 1200px){  h8 {  margin-right: -5%;  }}
   
        
    .tablemodal{
        width: 100%;
        font-family: 'exo', 'Roboto', sans-serif;
        padding-left: 3px;
        font-size: 12px;
        /* border: 1px solid #032f45; */
    }
    .tablemodal tr { height: 22px; border-bottom: solid 1px #115056; }
    .tablemodal tr  > *:nth-child(1)  { color:whitesmoke; width:60%; padding-left: 5px;padding-top: 2px;/*background:#0d213a57;*/} 
    .tablemodal  tr > *:nth-child(2)  { color: #19ec00; width:30%; text-align: right; padding-right:15px; font-weight: 700;}
    .tablemodal  tr > *:nth-child(3)  { color: #ffd400; width:10%; } 

    .lname{ color: #FF9800; cursor: pointer; } 
 </style>
<? foreach($data as $inx => $v)  {  ?>
<div class="modal fade modalcontmain" id="myModal-<? echo strtolower($inx);?>" role="dialog"> 
    <div class="modal-dialog modals-default" style="position: relative; width: 100%; margin: 0; padding: 20px 20px 5px; height: 100%;  ">
        <div class="modal-content modalheight" style="position: relative;background-color: #002f31; padding: 5px; min-height: 100%; width: 100%; border-radius: 7px;">  
        <div class="ld" name="load-<?echo strtolower($inx);?>">
            <div id="hourglass" class="fa-stack fa-4x" style="width: 100%; left: 0; font-size:7rem;">
                <i class="fa fa-stack-1x fa-hourglass-start"></i>
                <i class="fa fa-stack-1x fa-hourglass-half"></i>
                <i class="fa fa-stack-1x fa-hourglass-end"></i>
                <i class="fa fa-stack-1x fa-hourglass-end"></i>
                <i class="fa fa-stack-1x fa-hourglass-o"></i>
            </div>
        </div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="z-index:1;">&times;</button>
            </div>
            <div class="row" style="position: relative;height: 100%;padding: 1px;margin-right: 0;margin-left: 0;">
            <?php foreach( $v as $i ) { ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" name="<?echo $i["LINE_CD"];?>" style="position: relative;margin-bottom: 2px;padding: 1px;">               
                        <div class="conbox">
                            <div class="conbox1">
                                <div class="col-xs-12 conbox2 cr">
                                    <div class="col-xs-12 conheader" >
                                        <div class="pointsmall"></div>
                                        <h4>Current Production</h4>
                                    </div>                                
                                    <div class="col-xs-12 conbody" > 
                                        <h7>0%</h7>
                                        <span class="modalspan modalspan6" style="background:#1708fd;">Production progress</span>
                                    </div>
                                    <div class="col-xs-12 conbody2" >
                                        <table class="tablemodal" id="<?echo "linecur-".strtoupper($i["LINE_CD"]);?>">
                                            <tbody>
                                                <tr>
                                                    <th>CURRENT PLAN</th>
                                                    <th>0</th>
                                                    <th>pcs.</th>
                                                </tr>
                                                <tr>
                                                    <th>CURRENT ACTU.</th>
                                                    <th>0</th>
                                                    <th>pcs.</th>
                                                </tr>
                                                <tr>
                                                    <th>CURRENT REMAIN</th>
                                                    <th style="color:#ff0000;">0</th>
                                                    <th>pcs.</th>
                                                </tr>
                                            </tbody>                                                                                                                                                             
                                        </table>   
                                    </div> 
                                 </div>
                                <div class="col-xs-12 conbox2 tt">
                                    <div class="col-xs-12 conheader">
                                        <div class="pointsmall"></div>
                                        <h4>Total Production</h4>
                                     </div>                                
                                    <div class="col-xs-12 conbody" >
                                         <h7>0%</h7>
                                         <span class="modalspan  modalspan6" style="background:#5f5305;">Production progress</span>
                                     </div>
                                    <div class="col-xs-12 conbody2" >
                                        <table class="tablemodal" id="<?echo "linetol-".strtoupper($i["LINE_CD"]);?>">
                                            <tbody>
                                                <tr>
                                                    <th>TOTAL PLAN</th>
                                                    <th>0</th>
                                                    <th>pcs.</th>
                                                </tr>
                                                <tr>
                                                    <th>TOTAL ACTU.</th>
                                                    <th>0</th>
                                                    <th>pcs.</th>
                                                </tr>  
                                                <tr>
                                                    <th>TOTAL REMAIN</th>
                                                    <th style="color:#ff0000;">0</th>
                                                    <th>pcs.</th>
                                                </tr>
                                            </tbody>                                                                                                                                                             
                                        </table>   
                                     </div> 
                                 </div>  
                                <div class="col-xs-12 conbox3 cy">
                                    <div class="col-xs-12 conheader">
                                        <div class="pointsmall"></div>
                                        <h4>Standard Production</h4>
                                     </div>                                
                                    <div class="col-xs-12 conbody">
                                        <h7 class="lname" onclick="showdetailLine('<? echo $i['LINE_CD']; ?>','<? echo $i['PD']; ?>')"><? echo $i["LINE_CD"]; ?></h7>
                                        <h5 class="hcur-asof">Current as of </h5>
                                        <h5 class="hcur-date"><? echo date('Y-m-d H:i:s');?></h5>
                                        <span class="modalspan  modalspans modalspan4">Production in power</span>
                                     </div>
                                    <div class="col-xs-12 conbody2">
                                        <div style="width: 49%; float: left; position: relative;">
                                            <table class="tablemodal" id="<?echo "linecyl-".strtoupper($i["LINE_CD"]);?>">
                                                <tbody>
                                                    <tr>
                                                        <th>STD. PROD.</th>
                                                        <th>0</th>
                                                        <th>pcs.</th>
                                                    </tr>
                                                    <tr>
                                                        <th>STD. ACTU.</th>
                                                        <th>0</th>
                                                        <th>pcs.</th>
                                                    </tr>  
                                                    <tr>
                                                        <th>REMAIN</th>
                                                        <th style="color:#ff0000;">0</th>
                                                        <th>pcs.</th>
                                                    </tr>
                                                </tbody>                                                                                                                                                             
                                            </table>
                                         </div> 
                                        <div style="width: 49%;  float: left;  position: relative;">
                                            <h8>0%</h8>
                                         </div>                                           
                                     </div> 
                                 </div>    
                            </div>  
                        </div>
                     </div>
             <?} //exit;?>
            </div>
         </div>
     </div>
 </div>
<? } ?>
