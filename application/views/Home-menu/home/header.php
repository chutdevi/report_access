<header class="main-header">
    <div class="container-menu">
        <div class="logo-menu">
            <a class="logo" href="<?=base_url()?>pcstools/home" > 
            <span class="logo-lg">
                <img src="<?php echo base_url() ?>assets/images/logo_tbkk.png" alt="logo" style="width:300px; height:45px"> 
            </span>
            </a>   
        </div>
        <div class="dropdown-chudet"> 
            <div class="bnt-menu menu-toggle"  onclick="myFunction(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            
           <div class="dropdown-menu-chutdet hidelist-menu" style="display: none;">
                <div class="tng-point"></div>
                <div class="dropdown-menu-content">
                <?foreach($pcsmenu["menu"] as $k => $val){?><div class="menulist">
                    <h2><?=$val["MENU_NAME"]?></h2>
                    <ul><?foreach($pcsmenu["sub"] as $ind => $v){if( $val["MENU_NAME"] == $v["MENU_NAME"]){?> 
                    <li><a href="#" onclick="myLink('<?=base_url().$v['LINK'];?>')"><?=$v["SUB_MENU_NAME"];?></a></li><?}?><?}?> 
                    </ul>
                </div>
                <?}?>
                </div>
            </div>           
        </div>
    </div>
 </header>


