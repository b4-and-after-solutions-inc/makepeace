
<div class="row m0">
  <div class="sticky col-md-12">
    <ul class="navbar-nav flex-row">
      <li>
        <button type="button" class="btn btn-primary text-sm" data-toggle="modal" data-target="#modal-default" onclick="add_mode()"><i class="glyphicon glyphicon-plus"></i> Add Product</button>
      </li>
      <div class="controls">
          <li class="nav-item dropdown filter">
            <span class="text-uppercase page-subtitle ps">1 – <loaded>50</loaded> of <total>68</total></span>
          </li>
          <li class="nav-item dropdown filter">
            <a class="nav-link dropdown-toggle text-nowrap p0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
              <span class="d-none d-md-inline-block">Category: <span id="type_label">All <i class="glyphicon glyphicon-triangle-bottom" style="font-size:9px"></i></span></span>
            </a>
            <div class="dropdown-content">
              <?php foreach ($category as $cat) {
                echo '<a class="dropdown-item mtypes" href="#" typeid="'.$cat->id.'" onclick="toggle_select(this)">'.$cat->category.' &nbsp;</a>';
                }
              ?>              
            </div>
          </li>
      </div>
    </ul>
  </div>
</div>
<div id="parent" class="row m0 sp col-md-10"> </div>
<div class="m0 sp col-md-2" >
  <h5><i class="glyphicon glyphicon-star-empty"></i> <b>Featured Products</b></h5>
  <div class="row m0" id="featured" style="display: block;">
  </div>
</div>

 <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 id="modal-title" class="modal-title">Default Modal</h4>
        </div>
        <form id="product_form" method="post" action="<?php echo base_url()?>Admin/save_product" enctype="multipart/form-data">
        <div class="modal-body" id="modal-body">
            <div class="row">
              <div class="col-md-6">
                <label class="form-control-label">Product Name</label>
                <input class="form-control" type="text" id="product">
              </div>
              <div class="col-md-6">
                <label class="form-control-label">Image</label>
                <input class="form-control" type="file" id="image">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <label class="form-control-label">Description</label>
                <textarea class="form-control" id="description"></textarea>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <label class="form-control-label">Price</label>
                <input class="form-control" type="number" id="price">
              </div>
              <div class="col-md-6">
                <label class="form-control-label">Category</label>
                <select class="form-control" id="category">
                  <?php foreach ($category as $cat) {
                    echo '<option value="'.$cat->id.'">'.$cat->category.'</option>"';
                    }
                  ?>
                </select>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="product_id">
          <input type="hidden" id="modal_action" value="view">
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
    get_products();
});

let bread = {
  modal_head: function(e){
    $('#modal-title').html(e);
  },
  modal_action: function(e){
    $('#modal_action').val(e);
  },
  pcategory:function(e){ // wait ah hahaha
    switch(e){
      <?php foreach ($category as $cat) {
        echo 'case "'.$cat->id.'":
                b = "'.$cat->color_class.'";
                pt = "'.$cat->category.'";
              break;';
        }
      ?>
      /* default: b = 'bobo';
              pt = 'puta'; break; */
    }
    return '<a href="#" class="card-post__category badge badge-pill '+b+'">'+pt+'</a>';
  }
}

function toggle_select(ele){
  $(ele).toggleClass('on');
}
function add_mode(){
  bread.modal_head('Add Product');
  bread.modal_action('add');
  $('#product, #image, #description, #price').val('');
  $('#status').hide();
}
function edit_mode(id){
  $('#product_id').val(id);
  bread.modal_action('edit');
  $('#modal-default').modal('show');
  $.ajax({
    url: base_url + 'Admin/get_product',
    type:'post',
    data:{id:id},
    async: false,
    success: function(d){
      $('#product').val(d.name);
      $('#description').val(d.description);
      $('#price').val(d.price);
      $('#category').val(d.category);
      bread.modal_head('Edit <b>' + d.name +'</b>');
      $('#status').show();
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
  });
}
function toggle_stat(act){
  $.ajax({
    url: base_url + 'Admin/save_product',
    data:  {id: $('#product_id').val(), active: act, action: $('#modal_action').val()},
    type: 'POST',
    async: false,
    success: function(){
      get_products();
      $('#modal-default').modal('hide');
    }
  });
}
function toggle_feat(id, act){
  $.ajax({
    url: base_url + 'Admin/save_product',
    data:  {id: id, is_featured: act, action: 'edit'},
    type: 'POST',
    async: false,
    success: function(){
      get_products();
    }
  });
}

function get_products(){
  $.ajax({
    url: base_url + 'Admin/get_products',
    async: false,
    success: function(d){
      $('#parent, #featured').empty();
      $.each(d.products, function(i, rs){
        f = rs.is_featured == 1?'featured':'';
        isf = rs.is_featured == 1?0:1;
        a = rs.active == 0?'inactive':'';

        $('#parent').append(
          '<material class="m-results grid-desc '+a+'"><div class="m_image card card-small card-post card-post--1">'+
            '<div onclick="edit_mode('+rs.id+')"><div class="card-post__image" style="background-image: url(\''+base_url+'/uploads/products/' +rs.pic+'\');">'+
              bread.pcategory(rs.category_id)+
              '<span class="btext si-tru ss">Php '+rs.price+'</span>'+
            '</div>'+
              '<div>'+
                '<div class="sp mcontent pb0 mb2"><h6 class="card-title nfilter mb0">'+rs.name+'</h6>'+
                  '<p class="card-text d-inline-block mb-3 ss">'+rs.description+'</p>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="text-center f-box" onclick="toggle_feat('+rs.id+', '+isf+')"><i class="glyphicon glyphicon-star '+f+'"></i> FEATURE</div></div>'+
          '</material>'
        );
      });

      $.each(d.featured, function(i, rs){
        $('#featured').append('<div class="feature-box">'+rs.name+' <a onclick="toggle_feat('+rs.id+', 0)"href="#">X</a></div>');
      });
      $('loaded').text(d.products.length);
      $('total').text(d.count);
    }
  });
}

$("#product_form").on('submit',(function(e) {
  e.preventDefault();
  if($("#image").val() == 0 && $('#modal_action').val() == 'add'){
    alert('Please select an image file.');
  }
  else{
    var fd = new FormData();    
    fd.append('pic', $('#image')[0].files[0]);
    fd.append('name', $('#product').val());
    fd.append('description', $('#description').val());
    fd.append('price', $('#price').val());
    fd.append('category_id', $('#category').val());
    fd.append('id', $('#product_id').val());
    fd.append('action', $('#modal_action').val());
    $.ajax({
      url: base_url + 'Admin/save_product',
      data:  fd,
      type: 'POST',
      contentType: false,
      processData: false,
      async: false,
      success: function(){
        get_products();
        $('#modal-default').modal('hide');
      }
    });
  }
}));
</script>
