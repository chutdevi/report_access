  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <ul class="box-controls pull-right">
			<li><a class="box-btn-close" href="#"></a></li>
			<li><a class="box-btn-slide" href="#"></a></li>	
			<li><a class="box-btn-fullscreen" href="#"></a></li>
		  </ul>
        </div>
        <div class="box-body">
          <button>อ่านค่าสุมตัวเลขจากฝั่งserver</button>
        </div>


       <div class="col-xl-3 col-md-6 col-12 ">
            <div class="box">
              <div class="box-body">
                <div class="flexbox">
                  <h5>Visits</h5>
                </div>

                <div class="text-left my-2">
                  <div class="font-size-30 mb-15" id="showData" name="fg" value="<?php echo $num; ?>"><?php echo $num; ?></div>
                  
                </div>
              </div>
            </div>
        </div>

        <div class="col-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Line charts</h3>

              <ul class="box-controls pull-right">
          <li><a class="box-btn-close" href="#"></a></li>
          <li><a class="box-btn-slide" href="#"></a></li> 
          <li><a class="box-btn-fullscreen" href="#"></a></li>
        </ul>
            </div>
            <div class="box-body text-center">
              <canvas id="canvas-1" height="100"></canvas>
              <canvas id="chart_9" height="100"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->      
    </div>

        <!-- /.col -->

        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>
  
  $(function(){
    $('button').click(function(){
       $.ajax({
        url: '<?php echo base_url().'Apps/random_num'?>',
        success:showResult
       });
    });
  });

function showResult(result){
    alert( 'เลขที่สุ่มคือ : ' + result );
}
</script>

<script>
  
$(function(){
    setInterval(function(){
        var Num = document.getElementById( "showData" ).innerText;
        //alert(Num);
        // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
        // 1 วินาที่ เท่า 1000
        // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:'<?php echo base_url().'Apps/exceltest'?>',
                data:"rev="+Num,
                async:false,
                success:function(getData){
                    $("div#showData").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
    },1000);    
});




</script>


