  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data interface to A.S.I.A (Sales)    
      </h1>
    </section> 
    <section class="content">
     
     <!-- Basic Forms -->
          <div class="row">
    
  <div class="col-12 ">      
      <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">ALL DATA</h4>
            </div>
      

     <div class="box-body">
        <form action="http://192.168.161.102/excel_gen/csv/sa" class="novalidate"  id="f1" method="post" accept-charset="utf-8" onsubmit="myAll()">

               <p id="use_ex1"><?php echo $mes['all'] ?></p>
               <?php echo br(2); ?>

               <input type="text" id="txt_name" name="lt_data" value="<?php echo $his['all'][0]['LT_DATA']; ?>" hidden>
               <input type="text" id="txt_name" name="nm_data" value="<?php echo $usr; ?>" hidden>
               <input type="text" id="txt_name" name="ty_data" value="<?php echo "11"; ?>" hidden>
               <button  id="button1" type="submit" class="btn btn-social btn btn-success mb-5" name="but" value="11"  <?php echo $us['all']; ?> ><i class="fa fa-file-excel-o"  ></i>
                EXPORT ALL DATA TO CSV FILE
               </button>



        </form>
      </div>
    </div>
  </div>


<!--   <div class="col-4 ">      
      <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">DOMESTICS DATA</h4>
            </div>
      


     <div class="box-body">
        <form action="http://192.168.161.102/excel_gen/csv/sa" class="novalidate"  id="f2"  method="post" accept-charset="utf-8" onsubmit="myDom()">

               <p id="use_ex2"><?php echo $mes['dom'] ?></p>
               <?php echo br(2); ?>

               <input type="text" id="txt_name" name="lt_data" value="<?php echo $his['dom'][0]['LT_DATA'] ?>" <?php echo "hidden"; ?> >
               <input type="text" id="txt_name" name="nm_data" value="<?php echo $usr ?>" hidden>
               <input type="text" id="txt_name" name="ty_data" value="<?php echo "22"; ?>" hidden>
               <button  id="button2" type="submit" class="btn btn-social btn btn-primary mb-5" name="bu" value="22" <?php echo $us['dom']; ?> ><i class="fa fa-file-excel-o"  ></i>
                EXPORT DOMESTICS DATA TO CSV FILE
               </button>



        </form>
      </div>
    </div>
  </div>


  <div class="col-4 ">      
      <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">OVERSEA DATA</h4>
            </div>
      


     <div class="box-body">
        <form action="http://192.168.161.102/excel_gen/csv/sa" class="novalidate"  id="f3"  method="post" accept-charset="utf-8" onsubmit="myOve()">

               <p id="use_ex3"><?php echo $mes['ove'] ?> </p>
               <?php echo br(2); ?>
              
               <input type="text" id="txt_name" name="lt_data" value="<?php echo $his['ove'][0]['LT_DATA'] ?>" hidden>
               <input type="text" id="txt_name" name="nm_data" value="<?php echo $usr ?>" hidden>
               <input type="text" id="txt_name" name="ty_data" value="<?php echo "33"; ?>" hidden>
               <button  id="button3" type="submit" class="btn btn-social btn btn-pink mb-5" name="bu" value="33" <?php echo $us['ove']; ?> ><i class="fa fa-file-excel-o"  ></i>
                EXPORT OVERSEA DATA TO CSV FILE
               </button>



        </form>
      </div>
    </div>
  </div> -->
</div>
    </section>
  </div>
  
    <!-- /.content -->                           
<script type="text/javascript" >




      function myAll(){

		   alert("คุณสามารถโหลดได้แค่ 1 ครั้งเท่านั้น "+"\n"+"ถ้าต้องการโหลดอีกครั้ง กรุณาโหลดที่เมนู History - Download Interface Data");
		            //$('#button1').prop('disabled', true);
            //document.getElementById('button').style.display = 'none';

           document.getElementById("button1").disabled = true;
           document.getElementById("use_ex1").innerHTML = '<span class="badge badge-pill badge-success" ><i class="fa  fa-check  faa-shake animated"></i></span>  Export completed.';


           return true;
            
      }
      function myDom(){

      	 alert("คุณสามารถโหลดได้แค่ 1 ครั้งเท่านั้น "+"\n"+"ถ้าต้องการโหลดอีกครั้ง กรุณาโหลดที่เมนู History - Download Interface Data");

			            //document.getElementById('button').style.display = 'none';
            //$('#button1').prop('disabled', true);
           // $("#f2").submit();


            document.getElementById("button2").disabled = true;
            document.getElementById("use_ex2").innerHTML = '<span class="badge badge-pill badge-success" ><i class="fa  fa-check  faa-shake animated"></i></span>  Export completed.';

             return true;
      }
      function myOve(){

			alert("คุณสามารถโหลดได้แค่ 1 ครั้งเท่านั้น "+"\n"+"ถ้าต้องการโหลดอีกครั้ง กรุณาโหลดที่เมนู History - Download Interface Data"); 


            //document.getElementById('button').style.display = 'none';
            //$('#button3').prop('disabled', true);
           document.getElementById("button3").disabled = true;
           document.getElementById("use_ex3").innerHTML = '<span class="badge badge-pill badge-success" ><i class="fa  fa-check  faa-shake animated"></i></span>  Export completed.';

           return true;
      }     
</script>



