  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Userlist
      </h1>
<!--       <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Examples</a></li>
        <li class="breadcrumb-item active">Userlist</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
    
    <div class="row">
      <div class="col-12">
      <div class="box">
        <div class="box-body">
          <div class="row">
          <div class="col-md-3 col-12">
            <a class="btn btn-outline btn-success btn-block text-left mb-5" href="javascript:void(0)">Online <span class="pull-right" id="online_sys" ><?php echo $user_sys[0]['OFFLINE_SYS']; ?></span></a>
          </div>  
          <div class="col-md-3 col-12">
            <a class="btn btn-outline btn-danger btn-block text-left mb-5" href="javascript:void(0)">Offline <span class="pull-right" id="offline_sys" ><?php echo $user_sys[0]['ONLINE_SYS']; ?></span></a>
          </div>
          <div class="col-md-3 col-12">
            <a class="btn btn-outline btn-info btn-block text-left mb-5" href="javascript:void(0)">Available <span class="pull-right" id="available_sys"><?php echo $user_sys[0]['AVAILABLE_SYS']; ?></span></a>
          </div>
          <div class="col-md-3 col-12">
            <a class="btn btn-outline btn-brown btn-block text-left mb-5" href="javascript:void(0)">Not Available <span class="pull-right" id="no_sys" ><?php echo $user_sys[0]['NO_SYS']; ?></span></a>
          </div>
          </div>
          <div class="row">         
          <div class="col-md-12 col-12">
            <a href="javascript:void(0)" id="bnt_user"  class="btn btn-success btn-block btn-lg mt-10" style="font-size:20px;"> <i class="mdi mdi-account-search" ></i> Search Account</a>

          </div>
          </div>
        </div>
            </div>
          <!-- /. box -->
        </div>  
        </div>
    
    <div class="row"> 
    
      <div class="col-12">    
        <div class="box">
          <div class="media-list media-list-divided media-list-hover" id="user_list">
    <?php 
      foreach ($user_list as $user_in => $value) 
      {
        # code...
          $usr = $value['USER_CD'];
          $nam = $value['USER_NAME'];
          $onl     = ( is_null( $value['LOGOUT_DATE'] ) ) ? "Online" : "Offline";
          $dot_onl = ( is_null( $value['LOGOUT_DATE'] ) ) ? "status-success" : "status-danger";
          $gup     = ( is_null( $value['GROUP_CD'] ) )    ? "badge-danger"   : "badge-success";

          echo 
          (
          '<div class="media align-items-center">'                . "\r\n"                        
          .'  <span class="badge badge-dot '. $gup. '"></span>'   . "\r\n"                
          .'  <a class="avatar avatar-lg '. $dot_onl . '" href="#">' . "\r\n"  
          .'  <img src="'. base_url()."assets/images/card/img_mem/"  . substr($usr,2,strlen($usr)) .'.jpg">'    . "\r\n"  
          .'  </a>'. "\r\n"  
          .'  <div class="media-body">'. "\r\n"  
          .'  <p>'. "\r\n"  
          .'   <a href="#"><strong>'.$nam.'</strong></a>'. "\r\n"  
          .'   <small class="sidetitle">' . $onl . '</small>'. "\r\n"  
          .'  </p>'. "\r\n"  
          .'  <p>Use latest system ' . $value['LAST_USE']  . ' </p>' . "\r\n"  
          .'</div>'. "\r\n" 

          . '<div class="media-right gap-items">'. "\r\n"
          . '<a class="media-action lead" data-toggle="tooltip" title="Permission"   id="pre' . $usr . '"><i class="mdi mdi-account-settings"></i></a>' . "\r\n"
          . '<a class="media-action lead" data-toggle="tooltip" title="Clear session"id="cls' . $usr . '"><i class="mdi mdi-account-off"></i></a>'      . "\r\n"
          . '<a class="media-action lead" data-toggle="tooltip" title="Remove user"  id="rem' . $usr . '"><i class="mdi mdi-account-remove"></i></a>'   . "\r\n"
          . '</div>'. "\r\n"

          .'</div>'. "\r\n" 
          );        
      }
    ?>
<!--           <div class="media align-items-center">
            <span class="badge badge-dot badge-success"></span>
                <a class="avatar avatar-lg status-danger">
                      <img src="http://192.168.161.102/report_access/assets/images/card/img_mem/00806.jpg">
                </a>
                  <div class="media-body">
                      <p><a href="#"><strong>Orawan Preedaphornphan</strong></a><small class="sidetitle">Offline</small></p>
                      <p>Use latest system 2019-10-05 10:33:27</p>
                   </div>
             <div class="media-right gap-items">
                 <a class="media-action lead" data-toggle="tooltip" title="Permission"   id="pre5100806"><i class="mdi mdi-account-settings"></i></a>
                 <a class="media-action lead" data-toggle="tooltip" title="Clear session"id="cls5100806"><i class="mdi mdi-account-off"></i></a>
                 <a class="media-action lead" data-toggle="tooltip" title="Remove user"  id="rem5100806"><i class="mdi mdi-account-remove"></i></a>
             </div>
          </div> -->



          </div>
          </div>     
          <nav class="mt-15 pb-10">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled" id="first_li">
            <a class="page-link" id="prev1"><span class="ion-ios-arrow-thin-left"></span></a>
            </li>


  <?php 

            $all_user = $user_sys[0]['AVAILABLE_SYS'] + $user_sys[0]['NO_SYS'];
            $page_use = ceil( ($all_user / 5) );


            foreach (range(1, $page_use) as $pag) 
            {
              if($pag == 1)
                echo ( '<li class="page-item active" id="l1"> <a class="page-link" id="link' . $pag . '">' . $pag . '</a></li> ' );
              else
                echo ( '<li class="page-item" id="l' . $pag . '"> <a class="page-link" id="link' . $pag . '">' . $pag . '</a></li> ' );
            }

   ?>
            <li class="page-item" id="last_li">
            <a class="page-link" id="next1">
              <span class="ion-ios-arrow-thin-right"></span>
            </a>
            </li>
          </ul>
          </nav>

    </section>
    <!-- /.content -->
  </div>

  <div id="myModal_user" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Account</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                  <div class="text-center col-md-12" >
                      <img src="http://192.168.161.102/report_access/assets/images/card/img_mem/nouser.png" class="avatar rounded-circle mb-15" style="width:180px; height:200px " >
                  </div>
                  <div class="form-group">
                      <label class="col-md-12">Name</label>
                      <div class="col-md-12">
                          <select class="form-control select2" style="width: 100%;" id="select_modal">
                            <option selected="selected" value="no_no" name="no" >Select Account.....</option>
                            <?php 
                              foreach ($user_all as $user_in => $value) 
                              {
                                echo(
                                  '<option value="' . $value['GROUP_CD']."_".$value['GROUP_NAME'] . '" name="' . $value['USER_CD'] . '">' . $value['USER_NAME'] . '</option>'
                                    );
                              }

                             ?>

<!--                             <option>Alaska</option>
                            <option disabled="disabled">California (disabled)</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option> -->
                          </select>
                      </div>
                      <label class="col-md-12" style="margin-top: 10px;">Group</label>
                      <div class="col-md-12" id="div1">
                          <h3 class="mb-5" id="label_gup" >No Group</h3>
                      </div>
                      <div class="col-md-12" id="div2" hidden="true">
                          <select class="form-control select2" style="width: 100%;" id="select_modal_Gup">
                            <!-- <option selected="selected" value="no_no" name="no" >Select Group.....</option> -->
                          </select>
                      </div>                      
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="modal_savUser" hidden="true"><span class="glyphicon glyphicon-floppy-disk"> Save</span></button>
                    <button type="button" class="btn btn-warning" id="modal_edtUser" disabled="true"><span class="glyphicon glyphicon-edit"> Edit</span></button>
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><span class="glyphicon glyphicon glyphicon-share"> Cancel</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
    </div>



  <!-- /.content-wrapper -->
<!--             <div class="media-right gap-items">
            <a class="media-action lead" href="#" data-toggle="tooltip" title="Orders"><i class="ti-shopping-cart"></i></a>
            <a class="media-action lead" href="#" data-toggle="tooltip" title="Receipts"><i class="ti-receipt"></i></a>

            <div class="btn-group">
              <a class="media-action lead" href="#" data-toggle="dropdown"><i class="ion-android-more-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                <a class="dropdown-item" href="#"><i class="fa fa-fw fa-comments"></i> Messages</a>
                <a class="dropdown-item" href="#"><i class="fa fa-fw fa-phone"></i> Call</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="fa fa-fw fa-remove"></i> Remove</a>
              </div>

            </div>
            </div>
 -->
  <script type="text/javascript">
    

$( document ).ready(function() {

  var dat_gup;
  $('#bnt_user').click(function()
  {

    $('#myModal_user').modal('toggle');


    ///$('#select_modal_Gup').hide();

    $('#select_modal').select2({
        dropdownParent: $('#myModal_user')
    });
    $('#select_modal_Gup').select2({
        dropdownParent: $('#myModal_user')
    });
    //$('#select_modal_Gup').hide();

  });

    $('#myModal_user #select_modal').change(function()  
    {

     //console.log(  );
     var img_name = $('#myModal_user select option:selected').attr("name").substring(2);
     var gup_user = $('#myModal_user select option:selected').attr("value");
     //var gup_name = $('#myModal_user select option:selected').attr("name");
      $('#div1').attr("hidden" ,false);
      //$('#select_modal_Gup').attr("hidden" ,"false");
      $('#div2').attr("hidden" ,true);

      $("#modal_edtUser").attr("hidden", false);
      $("#modal_savUser").attr("hidden", true);

      console.log(gup_user);

     dat_gup = gup_user.split("_");

      if(gup_user != "no_no")
      {
          $("#myModal_user img").attr("src","http://192.168.161.102/report_access/assets/images/card/img_mem/" + img_name + ".jpg");
          $("#modal_edtUser").attr("disabled", false);
          //console.log($("#modal_edtUser").attr("name"));
      }

      else
      {
          $("#myModal_user img").attr("src","http://192.168.161.102/report_access/assets/images/card/img_mem/nouser.png");
          $("#modal_edtUser").prop("disabled", true);
          $("#modal_edtUser").attr("hidden", false);
          $("#modal_savUser").attr("hidden", true);
          $("#div1").attr("hidden", false);
          $("#div2").attr("hidden", true);
      }

      if( dat_gup[1] != "no" && dat_gup[1] != "")
        $("#label_gup").html("[" + dat_gup[0] + "] : " + dat_gup[1]);
      else
        $("#label_gup").html('No Group');
      

    });


    $(".modal-footer #modal_edtUser").click(function()
     {

      $('#div1').attr("hidden" ,true);
      //$('#select_modal_Gup').attr("hidden" ,"false");
      $('#div2').attr("hidden" ,false);

      $("#modal_edtUser").attr("hidden", true);
      $("#modal_savUser").attr("hidden", false);

      $.ajax({
            url     : 'http://192.168.161.102/report_access/User_manage/ajax_user_group',
            type    : 'post',
            dataType: 'json',
            success : function(gup1)
            { 
              console.log(gup1);
              var sel_gup_str = '<option selected="selected" value="' + dat_gup[0] + '" name="'+dat_gup[1]+'" >' + "[" + dat_gup[0] + "] : " + dat_gup[1] + '</option>';
              for(var x in gup1)
              {
                if( gup1[x]['GROUP_CD'] != dat_gup[0] )
                sel_gup_str += '<option value="' + gup1[x]['GROUP_CD'] + '" name="'+gup1[x]['GROUP_NAME']+'" >' + "[" + gup1[x]['GROUP_CD'] + "] : " + gup1[x]['GROUP_NAME'] + '</option>';
              }
               //console.log(sel_gup_str);
               $('#div2 #select_modal_Gup').html( sel_gup_str  );
            },
            error : function(){  alert('asdasdasd'); }
          });
      $('#div2 #select_modal_Gup').change(function(){
        dat_gup[1] = $('#div2 #select_modal_Gup option:selected').attr("name");
        dat_gup[0] = $('#div2 #select_modal_Gup option:selected').attr("value");      
      });


     });

    $(".modal-footer #modal_savUser").click(function()
     {

      var user_gup = $('#select_modal option:selected').attr("name");
      //dat_gup[1] = $('#div2 #select_modal_Gup option:selected').attr("name");
      //dat_gup[0] = $('#div2 #select_modal_Gup option:selected').attr("value");    
      console.log(user_gup);
      $('#div2').attr("hidden" ,true);
      if( dat_gup[1] != "" ) 
        $('#div1 #label_gup').html( "[" + dat_gup[0] + "] : " + dat_gup[1] );
      else
        $("#div1 #label_gup").html('No Group');
      //$('#select_modal_Gup').attr("hidden" ,"false");
      $('#div1').attr("hidden" ,false);

      $("#modal_edtUser").attr("hidden", false);
      $("#modal_savUser").attr("hidden", true);

      $.ajax({
            url     : 'http://192.168.161.102/report_access/User_manage/ajax_set_group',
            type    : 'post',
            data    :  { "gup_cd" :  dat_gup[0] ,"user_cd"  :  user_gup } ,
            dataType: 'text',
            success : function(set_us)
            { 
              console.log(set_us);
              
            },
            error : function(){  alert('error'); }
          });


     });

    $('li .page-link').click(function()
    {

        var page_last = <?php  
                            $all_user = $user_sys[0]['AVAILABLE_SYS'] + $user_sys[0]['NO_SYS'];
                            $page_use = ceil( ($all_user / 5) );
                            echo  $page_use;
                         ?>;
        var id_link = $(this).attr("id");


        var page = $('#'+id_link).html();

        for(i=1 ; i <= page_last ; i++)
        {
            if ( i == page  ) $('#l' + i ).prop('class', 'page-item active');
            else $('#l' + i ).prop('class', 'page-item');
        }
        
           $.ajax({
            url     : 'http://192.168.161.102/report_access/User_manage/ajax_user_list',
            type    : 'post',
            dataType: 'json',
            data    :  { "data" : (page * 5)-5  } ,
            success : function(data1)
            { 

              var html_list = "";
              var manage_a;
              $('#user_list').html('');
              for(var x in data1)
                {

                  var onlineStatus = (data1[x]['LOGOUT_DATE'] == null ) ? "Online" : "Offline";
                  var dotStatus    = (data1[x]['LOGOUT_DATE'] == null ) ? "status-success" : "status-danger";
                  var allowStatus  = (data1[x]['GROUP_CD'] == null )    ? "badge-danger"   : "badge-success";

                  //console.log(data1);

                  //console.log(onlineStatus);
                  html_list = "";
                  html_list += '<div class="media align-items-center">'
                  html_list += '  <span class="badge badge-dot ' + allowStatus +'"></span>'
                  html_list += '    <a class="avatar avatar-lg ' + dotStatus   +'">'
                  html_list += '      <img src="http://192.168.161.102/report_access/assets/images/card/img_mem/' + data1[x]['USER_CD'].substring(2) + '.jpg">'
                  html_list += '    </a>'
                  html_list += '  <div class="media-body">'
                  html_list += '    <p><a href="#"><strong>' + data1[x]['USER_NAME'] +'</strong></a><small class="sidetitle">'+onlineStatus+'</small></p>'
                  html_list += '    <p>Use latest system ' + data1[x]['LAST_USE']   + '</p>'
                  html_list += '  </div>'
                  html_list += '  <div class="media-right gap-items">'
                  html_list += '    <a class="media-action lead" data-toggle="tooltip" title="Permission"   id="pre' + data1[x]['USER_CD']+ '"><i class="mdi mdi-account-settings"></i></a>'
                  html_list += '    <a class="media-action lead" data-toggle="tooltip" title="Clear session"id="cls' + data1[x]['USER_CD']+ '"><i class="mdi mdi-account-off"></i></a>'
                  html_list += '    <a class="media-action lead" data-toggle="tooltip" title="Remove user"  id="rem' + data1[x]['USER_CD']+ '"><i class="mdi mdi-account-remove"></i></a>'
                  html_list += '  </div>'
                  html_list += '</div>'

                   //console.log(html_list);
                   $('div #user_list').append(html_list);
                }

                $('[data-toggle="tooltip"]').tooltip();

                $('.gap-items a').click(function()

                {
                    manage_a  = $(this).attr("id");
                    alert(manage_a);
                }


                );

               // $('div #user_list').append(html_list);

            },
            error:function($ero)
            {
                console.log($ero["responseText"]);
            }



          });

        if( page != 1 ) $('#first_li').prop('class', 'page-item');
        else $('#first_li').prop( 'class', 'page-item disabled');


        if( page == page_last ) $('#last_li').prop('class', 'page-item disabled');
        else $('#last_li').prop('class', 'page-item');





        //if( page == page_last ) $('#last_li').prop('class', 'page-item');
       
        
        //console.log( $('#last_li').attr("class") );

    } );


                $('.gap-items a').click(function()

                {
                    manage_a  = $(this).attr("id");
                    alert(manage_a);
                }


                );


 });

















  </script>
