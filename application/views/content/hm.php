  <!-- Content Wrapper. Contains page content -->
    <?php //var_dump($subm); exit; ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home
      </h1>
    </section>

    <!-- Main content -->
    <!-- <section class="content"> -->

      <!-- Default box -->
<!--       <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <ul class="box-controls pull-right">
			<li><a class="box-btn-close" href="#"></a></li>
			<li><a class="box-btn-slide" href="#"></a></li>	
			<li><a class="box-btn-fullscreen" href="#"></a></li>
		  </ul>
        </div>
        <div class="box-body">
          This is some text within a card block.
        </div>
  
        <div class="box-footer">
          Footer
        </div>
      
      </div> -->
      <!-- /.box -->

    <!-- </section> -->


<section class="content">


<div class="row">

  <?php 
  $col_ha  = array('bg-primary-gradient', 'bg-success-gradient', 'bg-danger-gradient', 'bg-info-gradient', 'bg-warning-gradient', 'bg-success', 'bg-danger');
  $flg_nul = 0;
  foreach ($menu as $key => $value) 
  { 
   
    echo '<div class="col-12">  <h3 class="page-header">'. $value['MENU_NAME'] . '</h3> </div>'. "\r\n"; 

     foreach ($subm as $ind => $dat) 
     { 
         //var_dump($subm[$ind]); 
         if( $value['MENU_NAME'] == $dat['MENU_NAME'] ) 
         { 
                     echo '   <div class="col-xl-4 col-md-3 col-12">' . "\r\n"; 
                     echo '     <div class="box '. $col_ha[ ($key % count($col_ha) )] .' box-solid bg-primary">'. "\r\n";   
                     echo '       <div class="box-header with-border">'. "\r\n";     
                     echo '         <h5 class="box-title">'. $dat['SUB_MENU_NAME'] . '</h5>'. "\r\n";      
                     echo '       </div>'. "\r\n";        

                     echo '   <div class="box-body">'. "\r\n";        
                     echo '     <a href=' . base_url().$dat['LINK'] . '> Click Here </a>'. "\r\n";            
                     echo '   </div>'. "\r\n";       
                     echo '   </div>'. "\r\n";    
                     echo '   </div>'. "\r\n";
                      $flg_nul = 1;
         } 
     } 
         if ( $flg_nul == 0 )
         {

                     echo '     <h6 class="col-12 box-title">No Content '. $value['MENU_NAME'] . '</h6>'. "\r\n";   

                     $flg_nul = 0;   

         }
     $flg_nul = 0;
  }  
  ?> 

</div>


</section>

</div>
    <!-- /.content -->
  <!-- </div> -->

  <!-- /.content-wrapper -->
