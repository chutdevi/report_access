
 $(document).ready(function() { 
  $(function(){
    $('#button1').click(function(){
                     

       $.blockUI({ css: { 
           border: 'none', 
           padding: '15px', 
           backgroundColor: '#000', 
           '-webkit-border-radius': '10px', 
           '-moz-border-radius': '10px', 
           opacity: .5, 
           color: '#fff' 
       } });

        date_ck = $('#date1').val();
       $.ajax({
        url     : 'http://192.168.161.102/report_access/Apps/get_data',
        type    : 'post',
        dataType: 'json',
        data    : $('form').serializeArray(),
        success : function(data){ //console.log(data.length); 
                                  //console.log(data); return 0;
                                  var str = '';
                                         str += '<thead class="thead-light">'                                        + "\r\n";
                                         str +=   '<tr>'                                                             + "\r\n";
                                         str +=   '<th  class="bx-2 bg-gray"scope="col">#</th>'                      + "\r\n";
                                         str +=   '<th  class="bx-2 bg-gray"scope="col">DATE COLLECT</th>'           + "\r\n";
                                         str +=   '<th  class="bx-2 bg-gray"scope="col">CUST CD</th>'                + "\r\n";
                                         str +=   '<th  class="bx-2 bg-gray"scope="col">CUST NAME</th>'              + "\r\n";
                                         str +=   '<th  class="bx-2 bg-gray"scope="col">CUST ITEM CD</th>'           + "\r\n";
                                         str +=   '<th  class="bx-2 bg-gray"scope="col">ITEM CD</th>'                + "\r\n";
                                         str +=   '<th  class="bx-2 bg-gray"scope="col">MODEL</th>'                  + "\r\n";
                                         str +=   '<th  class="bx-2 bg-gray"scope="col">Po.</th>'                    + "\r\n";
                                         str +=   '<th  class="bx-2 bg-gray"scope="col">DELIVERY DATE</th>'          + "\r\n";
                                         str +=   '<th  class="bx-2 bg-gray"scope="col">QTY</th>'                    + "\r\n";
                                         str += '</tr>'                                                              + "\r\n";
                                         str += '</thead>'                                                           + "\r\n";
                                         str += '<tbody>'                                                            + "\r\n";
                                  var nm = 0;

                                  //console.log(data.length); 

                                  if(data.length > 0)
                                  {
                                    for(var p in data)
                                    {

                                        str += '<tr>' + "\r\n";
                                        str += '<td   class="bx-2" scope="col">'+(++nm)+'</td>' + "\r\n";
                                        str += '<td   class="bx-2">'+data[p]['DATE_COLLECT']+'</td>' + "\r\n";
                                        str += '<td   class="bx-2">'+data[p]['CUST_CD']+'</td>' + "\r\n";
                                        str += '<td   class="bx-2">'+data[p]['CUST_NAME']+'</td>' + "\r\n";
                                        str += '<td   class="bx-2">'+data[p]['CUST_ITEM_CD']+'</td>' + "\r\n";
                                        str += '<td   class="bx-2">'+data[p]['ITEM_CD']+'</td>' + "\r\n";
                                        str += '<td   class="bx-2">'+data[p]['MODEL']+'</td>' + "\r\n";
                                        str += '<td   class="bx-2">'+data[p]['PO_NUMBER']+'</td>' + "\r\n";
                                        str += '<td   class="bx-2">'+data[p]['DELIVERY_DATE']+'</td>' + "\r\n";
                                        str += '<td   class="bx-2">'+data[p]['QTY']+'</td>' + "\r\n";
                                        str += '</tr>' + "\r\n";
                                      //break;
                                    }

                                    str += '</tbody>' + "\r\n";
                                    $('#table1').html(str);
                                    $("#button2").attr("disabled", false);
                                  }
                                  else
                                  {
                                        str += '<tr>' + "\r\n";
                                        str +=      '<td class="bg-pale-brown" colspan="10" scope="col">' + "\r\n";
                                        str +=         '<center> ----- NO DATA AS YOU ARE SELECT THAT PERIOD TIME ----- </center>' + "\r\n";
                                        str +=     '</td>'  + "\r\n"; 
                                        str += '</tr>' + "\r\n";

                                      str += '</tbody>' + "\r\n";
                                      $('#table1').html(str);
                                      $("#button2").attr("disabled", true);
                                  }

                                  //str += '</tbody>' + "\r\n";
                                  //console.log($('#select2').val());
                                  if( $('#select2').val() != 'All')
                                  {
									grt = $('form').serializeArray();
									
                                    chart_label.length = 0;
                                    chart_data1.length = 0;
									chart_data2.length = 0;
									chart_data3.length = 0;
									chart_data4.length = 0;
									chart_data5.length = 0;
                                    chart_key.length = 0;
                                            var cl = [];
                                            var cd = [];
                                            var ck = [];
			
                                    //     $.ajax({
                                    //            url     : 'http://192.168.161.102/report_access/Apps/get_chart',
                                    //            type    : 'post',
                                    //            dataType: 'json',
                                    //            data    :  { selt1 : $('#select1').val(), selt2 : $('#select2').val(), dat1 : $('#date1').val() },
                                    //            success : function(val){
                                    //
                                    //                    for(p in val)
                                    //                    {
									//						  
                                    //                        chart_label.push( val[p]['DATE_COLLECT'] );
                                    //                        chart_data1.push( val[p]['QTY_M1'] );
									//						  chart_data2.push( val[p]['QTY_M2'] );
									//						  chart_data3.push( val[p]['QTY_M3'] );
									//						  chart_data4.push( val[p]['QTY_M4'] );
									//						  chart_data5.push( val[p]['QTY_M5'] );
                                    //                    }
                                    //                    chart_key.push($('#select2').val()) ;
                                    //
                                    //              // if ( $('#chart_info').is(':hidden') )
                                    //              //       {
									//						document.getElementById("kla").innerHTML = "ITEM CODE : "+$('#select2').val();
									//				if ($('#chart_info').is(':visible')) $('#chart_info').toggle('show');
									//					
									//				$('#chart_info').toggle('show');
		//}                         //
                                    //               
                                                    setTimeout($.unblockUI, 500); 
                                    //            },
									//			error : console.log(grt)
                                    //            
                                    //           });
                                    //
                              
                                     //console.log(ob);
                                   
                                  }
                                  else
                                  {
                                    console.log($('#select2').val());
                                    setTimeout($.unblockUI, 1000);
                                    //$('#chart_info').toggle('hide');
                                  }

        },
        error   : function(data1){ 
                                console.log(data1);
                                var str3 = '';
                                       str3 += '<thead class="thead-light">'                                        + "\r\n";
                                       str3 +=   '<tr>'                                                             + "\r\n";
                                       str3 +=   '<th  class="bx-2 bg-gray"scope="col">#</th>'                      + "\r\n";
                                       str3 +=   '<th  class="bx-2 bg-gray"scope="col">DATE COLLECT</th>'           + "\r\n";
                                       str3 +=   '<th  class="bx-2 bg-gray"scope="col">CUST CD</th>'                + "\r\n";
                                       str3 +=   '<th  class="bx-2 bg-gray"scope="col">CUST NAME</th>'              + "\r\n";
                                       str3 +=   '<th  class="bx-2 bg-gray"scope="col">CUST ITEM CD</th>'           + "\r\n";
                                       str3 +=   '<th  class="bx-2 bg-gray"scope="col">ITEM CD</th>'                + "\r\n";
                                       str3 +=   '<th  class="bx-2 bg-gray"scope="col">MODEL</th>'                  + "\r\n";
                                       str3 +=   '<th  class="bx-2 bg-gray"scope="col">Po.</th>'                    + "\r\n";
                                       str3 +=   '<th  class="bx-2 bg-gray"scope="col">DELIVERY DATE</th>'          + "\r\n";
                                       str3 +=   '<th  class="bx-2 bg-gray"scope="col">QTY</th>'                    + "\r\n";
                                       str3 += '</tr>'                                                              + "\r\n";
                                       str3 += '</thead>'                                                           + "\r\n";
                                       str3 += '<tbody>'                                                            + "\r\n";

                                      str3 += '<tr>' + "\r\n";
                                      str3 +=      '<td class="bg-pale-brown" colspan="10" scope="col">' + "\r\n";
                                      str3 +=         '<center> ----- NO DATA AS YOU ARE SELECT THAT PERIOD TIME ----- </center>' + "\r\n";
                                      str3 +=     '</td>'  + "\r\n"; 
                                      str3 += '</tr>' + "\r\n";

                                    str3 += '</tbody>';
                                    $('#table1').html(str3);
                                    $("#button2").attr("disabled", true);
                                

                                //str += '</tbody>' + "\r\n";
                                //sconsole.log(str3);

          alert("Data Empty"); 
          setTimeout($.unblockUI, 500);
        }

       });
    });
  });


});