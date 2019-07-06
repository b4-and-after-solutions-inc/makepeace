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
        <!--for Bar Graph-->
        <div id="bar" style="width: 600px;height:400px;"></div>
        
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>

    <section class="col-lg-6 connectedSortable">
      <div class="box box-success">
        <!--for Bar Graph-->
        <div id="pie" style="width: 600px;height:400px;"></div>
        
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
  </div>

</section>
<script type="text/javascript">
var delivery_date = [];
var quantity = [];

$.ajax({
  type: 'GET',
  url: '<?php echo base_url('admin/get_sales_report');?>',
  returnType: 'json',
  success: function(data){
    console.log(data);
    if(data != ""){
      $.each(data, function(key, value) {
      delivery_date.push(data[key]['delivery_date']);
      quantity.push(data[key]['qty']);
    });
    bargraph(delivery_date, quantity);
    }
    else {

    }
  }
});


function bargraph(labels, dataset){
  // based on prepared DOM, initialize echarts instance
  var myChart = echarts.init(document.getElementById('bar'));

  // specify chart configuration item and data
  var option = {
      title: {
          text: 'Total Items Delivered'
      },
      tooltip: {},
      legend: {
          data:['Delivered']
      },
      xAxis: {
          data: labels
      },
      yAxis: {},
      series: [{
          name: 'Delivered',
          type: 'bar',
          data: dataset 
      }]
  };

  // use configuration item and data specified to show chart
  myChart.setOption(option);

}


var productName = [],
    productQty = [];

$.ajax({
  type: 'GET',
  url: '<?php echo base_url('admin/get_product_report');?>',
  returnType: 'json',
  success: function(data){
    console.log(data);
    if(data != ""){
      $.each(data, function(key, value) {
        productName.push(data[key]['product']);
        productQty.push(data[key]['qty']);
      });
      piegraph(productName, productQty);
    }
    else {
      alert("no data");
    }
  }
});

function piegraph(product, quantity){
  //initialize
  var chart_data = [];

  $.each(product, function(key, value) {
    //assign ng data per row dun sa format ng chart data 
    var row = {value: quantity[key], name: product[key]};
    //push yung data na na-format na tatanggapin ng chart
    chart_data.push(row);
  });
  console.log(chart_data);
  var dom = document.getElementById("pie");
  var myChart = echarts.init(dom);
  var app = {};
  option = null;
  app.title = 'Product';

  option = {
      tooltip: {
          trigger: 'item',
          formatter: "{a} <br/>{b}: {c} ({d}%)"
      },
      legend: {
          orient: 'vertical',
          x: 'left',
          data: product
      },
      series: [
          {
              name:'Product',
              type:'pie',
              radius: ['50%', '70%'],
              avoidLabelOverlap: false,
              label: {
                  normal: {
                      show: false,
                      position: 'center'
                  },
                  emphasis: {
                      show: true,
                      textStyle: {
                          fontSize: '30',
                          fontWeight: 'bold'
                      }
                  }
              },
              labelLine: {
                  normal: {
                      show: false
                  }
              },
              //bigay value dun sa data
              data: chart_data
          }
      ]
  };
  ;
  if (option && typeof option === "object") {
      myChart.setOption(option, true);
  }
}
</script>