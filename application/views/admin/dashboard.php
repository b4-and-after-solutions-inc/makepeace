<style type="text/css">
  .table td{
    font-size: 13px;
  }
  .badge-danger{
    background: #e02525;
  }
</style>
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Dashboard</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3> <?php echo $totalProductCount; ?>
          </h3>

          <p>Products</p>
        </div>
        <div class="icon">
          <i class="fa fa-cubes"></i>
        </div>
        <a a href="<?=base_url();?>Admin" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>

    </div>
    <div class="col-lg-3 col-xs-6">
      
      <div class="small-box bg-red">
        <div class="inner">
          <h3> <?php echo $totalCategoryCount; ?>
          </h3>

          <p>Category</p>
        </div>
        <div class="icon">
          <i class="fa fa-share-alt"></i>
        </div>
        <a a href="<?=base_url();?>Admin/delivery" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3> <?php echo $totalOrderCount; ?>
          </h3>

          <p>Orders</p>
        </div>
        <div class="icon">
          <i class="fa fa-cart-plus"></i>
        </div>
        <a a href="<?=base_url();?>Admin/orders" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      
    </div>

  </div>

  <div class="row">
    <section class="col-lg-6 connectedSortable">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Total Items Delivered Per Month</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="barChart" style="height:230px"></canvas>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>

    <section class="col-lg-6 connectedSortable">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Items Delivered</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="pieChart" style="height:230px"></canvas>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
  </div>

</section>

<script>
  $(document).ready(function(){
    $.ajax({
      type: 'GET',
      url: '<?php echo base_url('admin/get_sales_report');?>',
      returnType: 'json',
      success: function(data){
        console.log(data);
        if(data != ""){
          printChart(data);
        }
        else {
          $('.chart').append("<div class='row text-center h4'>No Records Founds.</div>")
        }
      }
    });
  });

function printChart(dataset){
    var chartLabels = new Array(),
        chartDatasets = new Array(),
        dataCeption = new Array();

    for(var i = 0; i < dataset.length; i++){
      chartLabels.push(dataset[i]['delivery_date']);
      chartDatasets.push(dataset[i]['qty']);

    }

    var areaChartData = {
      labels  : chartLabels,
      datasets: [
        {
          label               : 'Total',
          fillColor           : 'rgba(200, 200, 200, 1)',
          strokeColor         : 'rgba(200, 200, 200, 1)',
          pointColor          : 'rgba(200, 200, 200, 1)',
          pointStrokeColor    : 'rgba(200, 200, 200, 1)',
          pointHighlightFill  : 'rgba(200, 200, 200, 1)',
          pointHighlightStroke: 'rgba(200, 200, 200, 1)',
          data                : chartDatasets
        }
      ]
    };

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas   = $('#barChart').get(0).getContext('2d')
    var barChart         = new Chart(barChartCanvas)
    var barChartData     = areaChartData

    var barChartOptions  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions);
}

var productQty = [];
var productName = [];

$.ajax({
  type: 'GET',
  url: '<?php echo base_url('admin/get_product_report');?>',
  returnType: 'json',
  success: function(data){
    console.log(data);
    if(data != ""){
      $.each(data, function(key, value) {
      productQty.push(data[key]['qty']);
      productName.push(data[key]['product']);
    });
    printPie(productName, productQty);
    }
    else {

    }
  }
});

function printPie(labels, dataset){

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var pieChart       = new Chart(pieChartCanvas);
    var PieData = [];
      var color = ['#2778f9', '#ed4d44', '#44ed68', '#00a65a', '#E9967A', '#C0C0C0', '#FF00FF', '#CD5C5C', '#F0FF33', '#33FF60', '#BC33FF', '#D41C94', '#C81744', '#F0301D'];
      $.each(dataset,function(key,value){
          var obj = {
            'value': dataset[key],
            'label': labels[key],
            'color': color[key],
            'highlight': color[key]
          };
          PieData.push(obj);
      });
      console.log(PieData);
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
}


</script>