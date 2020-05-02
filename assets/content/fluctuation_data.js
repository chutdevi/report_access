        var chart_label = [];
        var chart_data1  = [];
		var chart_data2  = [];
		var chart_data3  = [];
		var chart_data4  = [];
		var chart_data5  = [];
        var chart_key   = [];

		
		//alert('asdsadsad');
		//console.log($('form').serializeArray());

$(document).ready(function() { 
    $('#button2').click(function() { 
       
        $.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } });

        $.ajax({
        url     : 'http://192.168.161.102/report_access/Apps/get_csv',
        type    : 'post',
        data    : $('form').serializeArray(),
        dataType: 'json',
        success : out_csv
        //error   : setTimeout($.unblockUI, 500) 
       });
         
    }); 

});
$(document).ready(function() {
  $(function(){
    $('#select1').change(function(){

        if ($('#chart_info').is(':visible'))
        {

            $('#chart_info').toggle('hide');
                                    chart_label.length = 0;
                                    chart_data1.length = 0;
									chart_data2.length = 0;
									chart_data3.length = 0;
									chart_data4.length = 0;
									chart_data5.length = 0;
                                    chart_key.length = 0;
        }

      
       $.ajax({
        url     : 'http://192.168.161.102/report_access/Apps/in_item',
        type    : 'post',
        dataType: 'json',
        data    : "sel=" + $('#select1').val(),
        success : showResult
        
       });
    });
  });
});
        //chart_label = [];
        //chart_data  = [];
        //chart_key   = [];
function showResult(fg)
{
    console.log(fg);
    var str1 = '<option>'+'All'+'</option>' + "\r\n";
      for(var p in fg)
      {
        //alert( 'เลขที่สุ่มคือ : ' + result[p] );
    console.log(fg[p]['ITEM_CD']);
    str1 += '<option>'+fg[p]['ITEM_CD']+'</option>' + "\r\n";
        //break;
      }
    //console.log(str);
      $('#select2').html(str1);

}


function out_csv(result)
{

//
    var str2 = '"'+"NO"+'",';
    var num = 0;
    var fname = 'Fluctuation_data.csv';
    if(result.length > 0)
    {

         $.each(result[0], function(key, value){
            str2 += '"' + key + '",';
          });

            str2 = str2.substring( 0 , str2.length - 1 ) + "\r\n";
      
       for(var p in result)
       { 
         str2 += '"' + (++num) + '",';
         $.each(result[p], function(key, value){
            str2 += '"' + value + '",';
          });

         str2 = str2.substring( 0 , str2.length - 1 ) + "\r\n";
       }
	str2 = str2.substring( 0 , str2.length - 2 );
    download(str2, fname, "text/csv");  
    setTimeout($.unblockUI, 1000); 
    }
    else
    {
      alert('No! data');
      setTimeout($.unblockUI, 2000);
    }
//result = result.replace(/(\r\n|\n|\r)/gm,'');
//result = result.trim();
 
//      document.getElementById('my_iframe').src = "http://localhost/gen_excel/gen/write_file/"+result;
    
      
      //console.log(result);

       
      $("#button2").attr("disabled", true);
}

$(document).ready(function() {
  $(function(){
    $('#select2').change(function(){


        if ($('#chart_info').is(':visible'))
        {

            $('#chart_info').toggle('hide');
                                   // chart_label.length = 0;
                                   // chart_data.length = 0;
                                   // chart_key.length = 0;
        }
        
       });


    });
  });