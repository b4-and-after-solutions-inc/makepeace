
<div class="row m0">
  <div class="col-md-12">
      <h4 class="m0" style="padding-top: 15px">User Account</h4>
  </div>
</div>
<div class="row m0" style="padding: 20px">
  <div id="user_accoutn" class="m0 sp col-md-4 p0">
    <div class="col-md-12">
        <label class="form-control-label">Current Password</label>
        <input type="text" class="form-control">
    </div>
    <div class="col-md-12">
        <label class="form-control-label">New Password</label>
        <input type="text" class="form-control">
    </div>
    <div class="col-md-12">
        <label class="form-control-label">Retype New Password</label>
        <input type="text" class="form-control">
    </div>
  </div>

  <div id="user_accoutn" class="m0 sp col-md-4 p0">
    <div class="col-md-12">
        <label class="form-control-label">Email</label>
        <input type="text" class="form-control" value="ejwpascual@gmail.com" disabled="">
    </div>
    <div class="col-md-12">
        <label class="form-control-label">Email Password</label>
        <input type="text" class="form-control">
    </div>
  </div>
</div>

<div class="row m0">
  <div class="col-md-12">
      <h4 class="m0" style="padding-top: 15px">Home Slider</h4>
  </div>
</div>
<div id="parent" class="row m0 sp col-md-12 p0"> </div>

 <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 id="modal-title" class="modal-title">Default Modal</h4>
        </div>
        <form id="slide_form" method="post" action="<?php echo base_url()?>Admin/save_slide" enctype="multipart/form-data">
        <div class="modal-body" id="modal-body">
            <div class="row">
              <div class="col-md-6">
                <label class="form-control-label">Slide Title</label>
                <input class="form-control" type="text" id="slide_title">
              </div>
              <div class="col-md-6">
                <label class="form-control-label">Image</label>
                <input class="form-control" type="file" id="image">
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
    get_slider();
});

function edit_mode(id){
  $('#slide_id').val(id);
  $('#modal-default').modal('show');
  $.ajax({
    url: base_url + 'Admin/get_sliders',
    type:'post',
    data:{id:id},
    async: false,
    success: function(d){
      $('#slide').val(d.title);
      $('#slide_description').val(d.body);
      $('#slide_button').val(d.link_title);
      $('#link').val(d.link);
      $('#modal_title').text('Edit <b>' + d.title +'</b>');
      $('#status').show();
      if(d.id <= 3){
        $('#status').hide();
      }
      else {
        if(d.active == 0){
          $('#status').removeClass('btn-danger');
          $('#status').addClass('btn-success');
          $('#status').text('Activate');
          $('#status').attr('onclick', 'toggle_stat(1)');
        }
        else{
          $('#status').removeClass('btn-success');
          $('#status').addClass('btn-danger');
          $('#status').text('Deactivate');
          $('#status').attr('onclick', 'toggle_stat(0)');
        }
      }
    }
  });
}
function toggle_stat(act){
  $.ajax({
    url: base_url + 'Admin/save_slide',
    data:  {id: $('#slide_id').val(), active: act, action: $('#modal_action').val()},
    type: 'POST',
    async: false,
    success: function(){
      get_slider();
      $('#modal-default').modal('hide');
    }
  });
}

function get_slider(){
  $.ajax({
    url: base_url + 'Admin/get_sliders',
    async: false,
    success: function(d){
      $('#parent, #featured').empty();
      $.each(d, function(i, rs){
        a = rs.active == 0?'inactive':'';
        $('#parent').append(
          '<material class="m-results grid-desc '+a+'" onclick="edit_mode('+rs.id+')"><div class="m_image card card-small card-post card-post--1">'+
            '<div><div class="card-post__image" style="background-image: url(\''+base_url+'/uploads/slider/' +rs.picture+'\');">'+
              '<a href="#" class="card-post__category badge badge-pill badge-success">'+rs.link_title+'</a>'+
            '</div>'+
              '<div>'+
                '<div class="sp mcontent pb0 mb2"><h6 class="card-title nfilter mb0">'+rs.title+'</h6>'+
                  '<p class="card-text d-inline-block mb-3 ss">'+rs.body+'</p>'+
                '</div>'+
              '</div>'+
            '</div>'+
          '</material>'
        );
      });
    }
  });
}

$("#slide_form").on('submit',(function(e) {
  e.preventDefault();
  if($("#image").val() == 0 && $('#modal_action').val() == 'add'){
    alert('Please select an image file.');
  }
  else{
    var fd = new FormData();    
    fd.append('pic', $('#image')[0].files[0]);
    fd.append('name', $('#slide').val());
    fd.append('description', $('#description').val());
    fd.append('price', $('#slide_button').val());
    fd.append('category', $('#category').val());
    fd.append('id', $('#slide_id').val());
    fd.append('action', $('#modal_action').val());
    $.ajax({
      url: base_url + 'Admin/save_slider',
      data:  fd,
      type: 'POST',
      contentType: false,
      processData: false,
      async: false,
      success: function(){
        get_slides();
        $('#modal-default').modal('hide');
      }
    });
  }
}));
</script>
