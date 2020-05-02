<style type="text/css">
 
    .dateselect{
        float: right;
        margin: 5px;
        
               
    }
    .inputdateselect{
        width: 50%;
        background: #129696;
        text-align: center;
        font-size: 17px;
        font-weight: 600;
        color: white; 
        margin: 10px 15px 3px 1px;
        margin-left: 30%;
        cursor: pointer;        
    }





</style>

 
<div class="header-top-area" style="position:fixed; top:0; width: 100%; z-index:3; height: 46px">
        <div class="container" style="margin:0; float:left; width:100%">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    <div class="logo-area" style="padding: 8px 0px;">
                        <a href="<? echo base_url() . "login/menu/" .  $this->session->userdata('sessUsr') ; ?>">
                        <img src="<? echo base_url()."assets/"; ?>img/tbk.png" alt=""></a> 
                    </div> 
                </div>
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6"> 
                    <div class="form-group nk-datapk-ctm form-elet-mg dateselect" id="data_select"> 
                        <div class="input-group date nk-int-st">
                            <span class="input-group-addon"></span>
                            <input type="text" class="inputdateselect" value="<?echo $udate;?>" onchange="redirectdate()" readonly>
                        
                        <a data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" onclick="redirectdate()">
                            <span><i class="notika-icon notika-search" style="font-weight: 800; color: white;"></i></span>
                        </a>
                     </div>                        
                    </div> 
                </div>
            </div>
        </div>
</div>


