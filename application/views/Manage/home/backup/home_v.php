      <div class="content-page">
    
          <!-- Start content -->
          <div class="content">
              
               <div class="container-fluid">

          <div class="row">
              <div class="col-xl-12">
                  <div class="breadcrumb-holder">

                      <h1 class="main-title float-left"><i class="fa fa-fw fa-home"></i>Home</h1>
                      <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item active">Home</li>
                      </ol>
                      <div class="clearfix"></div>
                  </div>
              </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">            
               <div class="card mb-3">
                 <div class="card-header">
                    <i class="fa fa-bar-chart-o"></i> Order Kubota
                 </div>                    
                         <div class="card-body">
                            <canvas id="comboBarLineChart1"></canvas>
                         </div>              
                         <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
              </div><!-- end card-->          
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">            
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fa fa-bar-chart-o"></i> Order Isuzu
                  </div>
                    
                  <div class="card-body">
                    <canvas id="comboBarLineChart2"></canvas>
                  </div>              
                  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div><!-- end card-->          
              </div>

           <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">            
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fa fa-bar-chart-o"></i> Order Mitsubichi
                  </div>
                    
                  <div class="card-body">
                    <canvas id="comboBarLineChart3"></canvas>
                  </div>              
                  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div><!-- end card-->          
           </div>

          </div>
</div>
     </div>
         </div>
<script src="<?php echo base_url() ?>assets/js/chart/Chart/Chart.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>-->
<script>
// comboBarLineChart
  var ctx1 = document.getElementById("comboBarLineChart1").getContext('2d');
  var ctx2 = document.getElementById("comboBarLineChart2").getContext('2d');
  var ctx3 = document.getElementById("comboBarLineChart3").getContext('2d');

  addChart(ctx1); 
  addChart(ctx2); 
  addChart(ctx3);



  function addChart(id){
  var comboBarLineChart = new Chart(id, {
    type: 'bar',
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
          type: 'line',
          label: 'TARGET FIX',
          borderColor: '#2400ff',
          borderWidth: 1,
          fill: false,
          data: [4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4],
        }, {
          type: 'line',
          label: 'TARGET FORCAST',
          borderColor: '#ff000f',
          borderWidth: 1,
          fill: false,
          data: [10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10],
        }, {
          type: 'bar',
          label: 'FIX',
          backgroundColor: '#eb99e2',
          data: [8, 5, 5, 5, 9, 5, 2, 1, 0, 3, 7, 3],
          borderColor: 'white',
          borderWidth: 0
        }, {
          type: 'bar',
          label: 'FORCAST',
          backgroundColor: '#9dedf2',
          data: [10, 11, 7, 5, 9, 13, 10, 16, 7, 8, 12, 5],
        }], 
        borderWidth: 1
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });}

</script>