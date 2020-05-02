  <header class="main-header">
    <div class="inside-header">
        <!-- Logo -->
        <!-- <a class="logo" href=<?php //echo base_url().'login/menu/'.$usr; ?> > -->
        <a class="logo" href="<?= base_url().'pcstools/home'; ?>" >
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <b class="logo-mini">
              <span class="light-logo"><img src="<?php echo base_url() ?>assets/images/tbk.png" alt="logo"></span>
              <!-- <span class="dark-logo"><img src="<?php echo base_url() ?>assets/images/logo-dark.png" alt="logo"></span> -->
          </b>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
              <img src="<?php echo base_url() ?>assets/images/tbk.png" alt="logo">
              <!-- <img src="<?php echo base_url() ?>assets/images/logo-dark-text.png" alt="logo" class="dark-logo"> -->
          </span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
<!--           <a href="#" class="sidebar-toggle d-block d-lg-none" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a> -->
          <ul class="navbar-nav mr-auto mt-mb-0">       
            <!-- .Megamenu -->
            <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                <div class="dropdown-menu scale-up-down bg-pale-secondary ">
                    <ul class="mega-dropdown-menu row">
                      <?php  
                     
                      foreach($menu['menu'] as $idx => $value)
                      {
                          echo '    <li class="col-lg-3 col-md-3 col-12 m-b-30">'   . "\r\n"; 
                          echo '        <span><h5 class="m-b-20"  style="border-style:solid;  border-color:#666EE8; background-color: #666EE8; color: #ffffff;"><stong style="margin-left:10px;">'. $value['MENU_NAME'] .'</stong></h5></span>'. "\r\n";
                          echo '    <ul class="list-style-none">'. "\r\n";
                        foreach($menu['subm'] as $ind => $dat)
                        {
                          if( $value['MENU_NAME'] == $dat['MENU_NAME'] )
                          {
                            echo '        <li><a href="#" onClick="myLink(\'' . base_url() . $dat['LINK'] . '\')">'. $dat['SUB_MENU_NAME'] .'</a></li>'. "\r\n";
                          }
                        }
                          echo '    </ul>' . "\r\n";
                          echo '    </li>' . "\r\n";                        
                      }
                    
                      ?>

                  </ul>
                </div>
              </li>
            <!-- /.Megamenu -->
        </ul>   

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">       

              <!-- Messages -->

              <!-- User Account -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/images/card/img_mem/<?php echo substr($usr,2,strlen($usr)); ?>.jpg" class="user-image rounded-circle" alt="User Image">
                </a>
                <ul class="dropdown-menu scale-up">
                  <!-- User image -->
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
                        <!-- <a href="<?// echo base_url(); ?>login/log_in/2"><i class="fa fa-power-off"></i>Logout</a> -->
                        <a href="<?= base_url().'pcstools/login'; ?>"><i class="fa fa-power-off"></i>Logout</a>
                      </div>                
                    </div>
                    <!-- /.row -->
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->

            </ul>
          </div>
        </nav>  
    </div> 
  </header>  