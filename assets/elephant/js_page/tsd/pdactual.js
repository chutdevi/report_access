$(document).ready(function(){
    window.tdsdate = $('#tdsdate').val();
    pdactu_worldays();
  });



function pdactu_worldays(){
  $.ajax({
    url     : 'http://192.168.161.102/api_system/Api_workdays/workdays_acmonth',
    type    : 'post',
    dataType: 'json',
    data    :  { "dates" : '2020-01-01'   } ,
    success : function(it){
                console.log(it);
                window.cpda = it;

                chart_on_pdactual();
              },
    error   : function(it){
              console.log(it);   
              }
        });   
}


function chart_on_pdactual(){

    var cht = document.getElementById('canvas-1').getContext('2d');
    var datalabel = window.cpda["label"];
    var dataaxis  = window.cpda["data"];
  
    console.log(datalabel);
    var realArray = $.makeArray( dataaxis )
    var x  =  [];
    var y  =  [];
    var z  =  [];
    var by =  [];
    var bz =  [];
    var dy =  [];
    var dz =  [];
    //var y = [];
    //var z = []; 
    // Now it can be used reliably with $.map()
    $.map( dataaxis, function( val, i ) {
     x.push( val["PD"]   );
     y.push( val["PLAN"] );
     z.push( val["ACTU"] );
     by.push( 'rgba(255, 99, 132, 0.2)' );
     bz.push( 'rgba(255, 159, 64, 0.2)' );
     dy.push( 'rgba(255, 99, 132, 1)' );
     dz.push( 'rgba(255, 159, 64, 1)' );
    });

    console.log(x);
    var mc  = new Chart(cht, {
    type: 'bar',
    data: {
        labels: x,
        datasets: [{
            label: "Plan",
            data:  y ,
            backgroundColor: by,
            borderColor: dy,
            borderWidth: 1
            // barPercentage: 0.5,
            // barThickness: 45,
            // maxBarThickness: 45,
            // minBarLength: 5            
        },
        {
            label: "Actual",
            data:  z ,
            backgroundColor: bz,
            borderColor: dz,
            borderWidth: 1
            // barPercentage: 0.5,
            // barThickness: 45,
            // maxBarThickness: 45,
            // minBarLength: 5 
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    min: 0,
                    max: 35                    
                },
                display: true,
                scaleLabel: {
                              display: true,
                              labelString: 'Month'
                            }                
            }]
        }
    }

    });




}