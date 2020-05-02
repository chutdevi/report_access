  <header class="main-header">
    <div class="inside-header"> 
        <a class="logo" href=<?php echo base_url().'login/menu/'.$usr; ?> > 
          <b class="logo-mini">
              <span class="light-logo"><img src="<?php echo base_url() ?>assets/images/tbk.png" alt="logo"></span> 
          </b> 
          <span class="logo-lg">
              <img src="<?php echo base_url() ?>assets/images/tbk.png" alt="logo"> 
          </span>
        </a> 
        <nav class="navbar navbar-static-top"> 
          <ul class="navbar-nav mr-auto mt-mb-0">    
            <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                <div class="dropdown-menu scale-up-down bg-pale-secondary ">
                    <ul class="mega-dropdown-menu row">
                      <? foreach($menu['menu'] as $idx => $value) { ?>
                          <li class="col-lg-3 col-md-3 col-12 m-b-30"> 
                              <span><h5 class="m-b-20"  style="border-style:solid;  border-color:#666EE8; background-color: #666EE8; color: #ffffff;"><stong style="margin-left:10px;"><? echo $value['MENU_NAME']; ?></stong></h5></span>
                          <ul class="list-style-none">
                            <?foreach($menu['subm'] as $ind => $dat) { ?>
                            <? if( $value['MENU_NAME'] == $dat['MENU_NAME'] ) { ?>

                                <li><a href="<? echo base_url() . $dat['LINK']; ?>"><? echo $dat['SUB_MENU_NAME']; ?></a></li>

                              <?}?>
                            <?}?>
                          </ul>
                          </li>                        
                     <? } ?>  
                  </ul>
                </div>
              </li> 
        </ul>   

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">   
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/images/card/img_mem/<?php echo substr($usr,2,strlen($usr)); ?>.jpg" class="user-image rounded-circle" alt="User Image">
                </a>
                <ul class="dropdown-menu scale-up"> 
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/images/card/img_mem/<?php echo substr($usr,2,strlen($usr)); ?>.jpg" class="float-left rounded-circle" alt="User Image">

                    <p>
                      <?php echo $usr; ?>
                      <small class="mb-5">  <?php echo substr($uid,0,strpos($uid," ")) . substr($uid,strpos($uid," "),2)."." ; ?></small>
                      <small class="mb-5">  <?php echo $add; ?></small>
                      <!-- <a href="#" class="btn btn-danger btn-sm btn-rounded">View Profile</a> -->
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="row no-gutters"> 
                    <div role="separator" class="divider col-12"></div>
                      <div class="col-12 text-left">
                        <a href="<?php echo base_url(); ?>login/log_in/2"><i class="fa fa-power-off"></i>Logout</a>
                      </div>                
                    </div> 
                  </li>
                </ul>
              </li>  
            </ul>
          </div>
        </nav>  
    </div> 
  </header>  