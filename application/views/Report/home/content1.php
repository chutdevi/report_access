<div class="content-wrapper" style="margin-top: 0; padding-top: 110px;"> 
  <section class="content-header head-report">
      <div><h1>Production Report</h1></div>
      <!-- <div class="bnt-headdate">
        <div class="input-group">
          <button type="button" class="btn btn-default pull-right  bnt-date" id="daterange-btn">
           
              </i> <? //echo date('F 1, Y - F t, Y'); ?>
            </span>
            <i class="fa fa-caret-down"></i>
          </button>
        </div> 
      </div>  -->
   </section> 
   <div>
    <section class="content"> 
        <div class="box">
            <div class="box-header with-border" style="background: linear-gradient(to right,#0178bc 0,#00bdda 100%); color:bisque;">
              <h4 class="box-title">Production report list</h4>
              <div class="box-controls pull-right">
                <div class="lookup lookup-circle lookup-right">
                  <input type="text" name="s" autocomplete="off" style="border: solid 2px black; height: 35px; margin-top: 0px; color:black;">
                </div>
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-hover" id="tabprd-list">
                <thead>
                  <tr>
                    <th><i class="fa fa-file-excel-o"></i>  Report name</th> 
                    <th><i class="fa fa-user"></i>          User</th>
                    <th><i class="fa fa-calendar"></i>      Date</th> 
                    <th><i class="fa fa-info"></i>          Size</th>
                    <th><i class="fa fa-gear"></i>          Option</th>
                  </tr>
                </thead>
                <tbody>
                  <? foreach($dir as $inx => $v) {?>  
                  <tr> 
                    <td><?=$v["FILE_NAME"]?></td>
                    <td><?=$v["FILE_OWNER"]?></td>
                    <td><span class="text-muted"><i class="fa fa-clock-o"></i><?= date('F d, Y H:i:s', strtotime($v["FILE_CREATED"]))?></span> </td> 
                    <td><span class="label label-danger"><?=$v["FILE_SIZE"]. " KB"?></span></td>
                    <td>
                        <a class="adownload" onclick="reqfile('<?=$v['FILE_PATH']?>')" ><i class="fa fa-download"></i></a>
                    </td>
                  </tr> 
                  <?}?> 
                </tbody>  
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->  
    </section>
   </div>
</div>
    <!-- /.content -->                           




                                
 