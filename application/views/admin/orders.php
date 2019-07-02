<style type="text/css">
  .table td{
    font-size: 13px;
  }
  .badge-danger{
    background: #e02525;
  }
</style>
<section class="content container-fluid ">
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Orders</h3>
    </div>
     <!-- /.box-header -->
    <div class="box-body">
      <table id="orders_table" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
            <th>Date</th>
            <th>Client</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Total Ordered</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="orders"></tbody>
      </table>
    </div>
</div>

 <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <input type="hidden" id="order_id">
          <h4 id="modal-title" class="modal-title"></h4>
        </div>
        <div class="modal-body" id="modal-body">
            <div class="row" style="margin-bottom: 1rem;">
              <div class="col-md-6">
                <b>Address:</b> <p id="address">asd</p>
              </div>
              <div class="col-md-6">
                <b>Contact:</b> <p id="contact">09123</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <table class="text-center" style="width: 100%" border='1' cellpadding='0' cellspacing='0'>
                 <thead>
                  <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                  </tr>
                 </thead>
                 <tbody id="ordered"></tbody>
               </table>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="slide_id">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="o_action btn btn-danger">Cancel Order</button>
          <button type="submit" class="o_action btn btn-primary" id="markpay" >Mark as Paid</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="mark_paid">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="delivery_action">Mark as Paid</h4>
        </div>
        <div class="modal-body" id="modal-body">
            <span>Delivery Date:</span>
            <input type="date" id="delivery_date"><br>
            <div id="reason" class="row" style="padding: 1.4rem;padding-bottom: 0;">
              This would'nt notify the client. You have to do it manually.
              <!-- <div class="col-md-12">
                <label class="form-control-label">Reason:</label>
                <textarea class="form-control" id="reason"></textarea>
              </div> -->
            </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="slide_id">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" onclick="pay_received()">Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

<script>
base_url = '<?php echo base_url()?>';

$(document).ready(function(){
    get_orders();
});

function get_orders(act){
  $.ajax({
    url: base_url + 'Admin/get_orders',
    async: false,
    success: function(d){
      $('#orders').empty();
      stat='';
      
      $.each(d, function(i, rs){
        actions = '<li><a href="#" onclick="view_order('+rs.id+');mark_paid('+rs.id+', 0)">Mark as Paid</a></li>'+
                '<li><a href="#" onclick="canel_order('+rs.id+')">Cancel</a></li>';
        switch(rs.order_status){
          case '0':
           stat = '<span class="badge badge-info">Pending</span>';
          break;
          case '1':
           stat = '<span class="badge badge-success">Paid</span>';
           actions = '<li><a href="#" onclick="view_order('+rs.id+');mark_paid('+rs.id+', 1)">Reschedule Delivery</a></li>'
          break;
          case '2':
           stat = '<span class="badge badge-danger">Cancelled</span>';
           actions = '';
          break;
          case '3':
           stat = '<span class="badge badge-danger">Rejected</span>';
          break;
        }
          $('#orders').append('<tr class="txet-center">'+
            '<td>'+rs.odate+'</td>'+
            '<td>'+rs.customer_name+'</td>' +
            '<td>'+rs.email_address+'</td>' +
            '<td>'+rs.contact_number+'</td>' +
            '<td>₱'+rs.order_total+'</td>' +
            '<td>'+stat+'</td>'+
            '<td>'+
              '<div class="btn-group">'+
                  '<button type="button" class="btn btn-default" dropdown-toggle" data-toggle="dropdown">Actions</button>'+
                  '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">'+
                    '<span class="caret"></span>'+
                    '<span class="sr-only">Toggle Dropdown</span>'+
                  '</button>'+
                  '<ul class="dropdown-menu" role="menu">'+
                    '<li><a href="#" onclick="view_order('+rs.id+')">View Transaction</a></li>'+
                    actions+
                  '</ul>'+
                '</div>'+
            '</td></tr>');
      });
      $('#orders_table').dataTable();
    }
  });
}
function canel_order(id){
  var txt;
  var r = confirm("Are you sure?");
  if (r == true) {
      $.ajax({
        url: base_url + 'Bakery/cancel',
        type: 'POST',
        data:{id:id},
        async: false,
        success: function(d){
          location.reload();
        }
      });
  }
}
function view_order(id){
  $('#modal-default').modal('show');
  $('#order_id').val(id);
  $.ajax({
    url: base_url + 'Admin/get_order',
    type: 'POST',
    data:{id:id},
    async: false,
    success: function(d){
      $('#modal-title').text(d.customer_name +' - ' + d.odate);
      $('#address').text(d.address);
      $('#contact').text(d.contact_number);
      $('#ordered').empty();
      if(d.order_status == 2){
        $('.o_action').hide();
      }
      else {
        $('.o_action').show(); 
      }
      grand = 0;
      $.each(d.products, function(i, rs){
        total = rs.quantity * rs.price;
        grand += total;
        $('#ordered').append('<tr class="txet-center">'+
            '<td>'+rs.item+'</td>'+
            '<td>'+rs.quantity+'</td>' +
            '<td>'+rs.price+'</td>'+
            '<td>'+total.toFixed(2)+'</td></tr>');
        $('#markpay').attr('onclick', "mark_paid("+id+")");
      });
      $('#ordered').append('<tr class="txet-center">'+
            '<td colspan="4" style="text-align:right !important; padding-right:1rem;"><b>Total: '+grand+'</b></td></tr>');
    }
  });
}

function mark_paid(id, action){
  $('#mark_paid').modal('show');
  if(action == 1){
      $('#delivery_action').text('Reschedule Delivery');
      $('#reason').show();
  }
  else {
      $('#delivery_action').text('Mark as Paid');
      $('#reason').hide();
  }
}
function pay_received(){
  id = $('#order_id').val();
  id = $('#order_id').val();
  $.ajax({
    url: base_url + 'Bakery/paid',
    type: 'POST',
    data:{id:id, ddate: $('#delivery_date').val(), delivery_action: $('#delivery_action').text()},
    async: false,
    success: function(d){
      location.reload();
    }
  });
}
</script>
