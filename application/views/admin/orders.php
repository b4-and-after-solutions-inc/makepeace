

<div class="row m0">
  <div class="col-md-12">
      <h4 class="m0" style="padding-top: 15px">Orders</h4>
  </div>
</div>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Table With Full Features</h3>
    </div>
     <!-- /.box-header -->
    <div class="box-body">
      <table id="orders_table" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>Date</th>
            <th>Client</th>
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
          <h4 id="modal-title" class="modal-title">Default Modals</h4>
        </div>
        <form id="slide_form" method="post" action="<?php echo base_url()?>Admin/save" enctype="multipart/form-data">
        <div class="modal-body" id="modal-body">
            <div class="row">
              <div class="col-md-6">
                <label class="form-control-label">Slide Title</label>
                <input class="form-control" type="text" id="slide_title">
              </div>
              <div class="col-md-6">
                <label class="form-control-label">Image</label>
                <input class="form-control" type="file" accept="image/png, image/jpeg" id="image">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <label class="form-control-label">Body</label>
                <textarea class="form-control" id="slide_description"></textarea>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <label class="form-control-label">Button (Optional)</label>
                <input class="form-control" type="text" id="slide_button">
              </div>
              <div class="col-md-6">
                <label class="form-control-label">Link</label>
                <input class="form-control" type="text" id="link">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="slide_id">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" id="status">Deactivate</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
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
    type: 'POST',
    async: false,
    success: function(d){
      $.each(d, function(i, rs){
          $('#orders').append('<tr><td></td><td></td><td></td><td>Pending</td><td>Mark as Paid</td></tr>');
      });
      $('#orders_table').dataTable();
    }
  });
}
</script>
