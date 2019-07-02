<style type="text/css">
  .table td{
    font-size: 13px;
  }
</style>
<section class="content container-fluid ">
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Schedule of Deliveries for the date of </h3>
      <input type="date" id="deliver_date" value="<?php echo date('Y-m-d'); ?>" onchange="get_orders()">
    </div>
     <!-- /.box-header -->
    <div class="box-body">
      <table id="orders_table" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
            <th>Order Date</th>
            <th>Client</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Delivery Date</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody id="orders"></tbody>
      </table>
    </div>
</div>

<script>
base_url = '<?php echo base_url()?>';

$(document).ready(function(){
    get_orders();
});

function get_orders(act){
  $.ajax({
    url: base_url + 'Admin/get_orders',
    type:'post',
    data:{ action: 'for_delivery', deliver_date: $('#deliver_date').val()},
    async: false,
    success: function(d){
      $('#orders').empty();
      if(d ==''){
         $('#orders').append('<tr class="txet-center"><td colspan="6"> Nothing to show. </td></tr>');
      }
      else {
        $.each(d, function(i, rs){
            $('#orders').append('<tr class="txet-center">'+
              '<td>'+rs.odate+'</td>'+
              '<td>'+rs.customer_name+'</td>' +
              '<td>'+rs.email_address+'</td>' +
              '<td>'+rs.contact_number+'</td>' +
              '<td>'+rs.delivery_date+'</td>' +
              '<td>'+rs.address+'</td>'+
              '</tr>');
        });
      }
    }
  });
}
</script>
