<style type="text/css">
    .header-top-area, .footer-copyright-area{
	    background: #129696;
    }
    .conttital{
        height: 35px;
        margin-bottom: 1px;
        background: #0d213a;
        border: 1px solid #36839a7a;
    }
    .contfadtal{
        text-align: left;
        margin-bottom: 2px;
        padding: 0;
        background: #010810;
        width: 49.5%;
        margin-right: 0.5%;
    }
    .contejdtal{
        text-align: left;
        margin-bottom: 2px;
        padding: 0;
        background: #02071b; 
        width: 49.5%;
        margin-left: 0.5%;     
    }
    .tabledtal{
        width: 100%;
        font-family:'exo', 'Roboto', sans-serif;
        padding-left: 3px;
        border: 1px solid #032f45;
    } 
    .tabledtal tr { height: 30px; border-bottom: solid 1px #115056; }
    .tabledtal tr > *:nth-child(1) { background:#0d213a57;color:whitesmoke; width:60%;padding-left: 5px;padding-top: 2px; }
    .tabledtal tr > *:nth-child(2) { color: #19ec00; width:30%; text-align: right; padding-right:15px; }
    .tabledtal tr > *:nth-child(3) { color: #ffd400;width:10%; }
    .modaller{
        cursor: pointer;
    }       
</style>

<div class="notika-status-area" style="margin-bottom: 35px;">
            <div class="row">
                <?php foreach(range(1,6) as $i ) { ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-right: 0; padding-left: 0;">
                        <div class="col-12 pdtital">
                            <div class="col-lg-12 col-xs-12 conttital modaller"  type="button" onclick='detailline("pd0<?echo $i;?>")' data-keyboard="false" data-toggle="modal" data-target="#myModal-pd0<?echo $i;?>">
                                <h2 style="color: white; font-size: 24px; margin-top: 5px;">PD0<?echo $i;?></h2>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 contfadtal">
                                <h4 style="color: #0ece14;margin: 5px;border-bottom: solid 2px #00c50e;font-size: 17px;">FA DETAIL  <? echo $udate; ?></h4>
                                <div class="col-lg-12 col-xs-12" style="padding: 2px 2px;">
                                    <table class="tabledtal" id="<?echo "FA-PD0".$i;?>">
                                        <tr>
                                            <th>PLAN  TOTAL</th>
                                            <th>0</th>
                                            <th>pcs.</th>
                                        </tr>
                                        <tr>
                                            <th>ACTU. TOTAL</th>
                                            <th>0</th>
                                            <th>pcs.</th>
                                        </tr>  
                                        <tr>
                                            <th>DIFF. TOTAL</th>
                                            <th style="color:#ff0000;">0</th>
                                            <th>pcs.</th>
                                        </tr> 
                                        <tr>
                                            <th>PROD. %</th>
                                            <th>0</th>
                                            <th>%.</th>
                                        </tr>
                                        <tr>
                                            <th>PLAN CURENT</th>
                                            <th>0</th>
                                            <th>pcs.</th>
                                        </tr>
                                        <tr>
                                            <th>ACTU. CURENT</th>
                                            <th>0</th>
                                            <th>pcs.</th>
                                        </tr>  
                                        <tr>
                                            <th>DIFF. CURENT</th>
                                            <th style="color:#ff0000;">0</th>
                                            <th>pcs.</th>
                                        </tr>                                                                                                                                                               
                                    </table>                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 contejdtal">
                            <h4 style="margin: 5px;border-bottom: solid 2px #ff5e09;font-size: 17px;color: white;">EJ DATAIL  <? echo $udate; ?></h4>
                                <div class="col-lg-12 col-xs-12" style="padding: 2px 2px;">
                                    <table class="tabledtal" id="<?echo "EJ-K1PD0".$i;?>">
                                        <tr>
                                            <th>PLAN DAY</th>
                                            <th>0</th>
                                            <th>pcs.</th>
                                        </tr>
                                        <tr>
                                            <th>ACTU. DAY</th>
                                            <th>0</th>
                                            <th>pcs.</th>
                                        </tr>  
                                        <tr>
                                            <th>DIFF. DAY</th>
                                            <th style="color:#ff0000;">0</th>
                                            <th>pcs.</th>
                                        </tr>
                                     
                                        <tr>
                                            <th>PLAN ACCM.</th>
                                            <th>0</th>
                                            <th>pcs.</th>
                                        </tr>
                                        <tr>
                                            <th>ACTU. ACCM.</th>
                                            <th>0</th>
                                            <th>pcs.</th>
                                        </tr>  
                                        <tr>
                                            <th>DIFF. ACCM.</th>
                                            <th style="color:#ff0000;">0</th>
                                            <th>pcs.</th>
                                        </tr>  
                                        <tr>
                                            <th>PROD. %</th>
                                            <th>0</th>
                                            <th>%.</th>
                                        </tr>                                                                                                                    
                                    </table>                                    
                                </div>
                            </div>                                                       
                        </div>
                    </div>
                <?}?>                                
            </div>
    </div>
    