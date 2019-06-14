<!-- Breadcrumbs -->
      <section class="bg-gray-7">
        <div class="breadcrumbs-custom box-transform-wrap context-dark">
          <div class="container">
            <h3 class="breadcrumbs-custom-title"><?=$nav?></h3>
            <div class="breadcrumbs-custom-decor"></div>
          </div>
          <div class="box-transform" style="background-image: url(<?=base_url('assets/');?>images/bg-1.jpg);"></div>
        </div>
        <div class="container">
          <ul class="breadcrumbs-custom-path">
            <li><a href="index.html">Home</a></li>
            <li class="active"><?=$nav?></li>
          </ul>
        </div>
      </section>

	  <!-- Our Shop-->
      <section class="section section-lg bg-default">
        <div class="container">
			<ul class="nav nav-tabs justify-content-center" id="productTab" role="tablist">
			  <li class="nav-item">
				<a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab">All</a>
			  </li>
			  <!--Category Tabs-->
			  <?php
				foreach($category_list as $catlist){
					echo '
					  <li class="nav-item">
						<a class="nav-link" id="'.$catlist->category.'-tab" data-toggle="tab" href="#cat'.$catlist->id.'" role="tab">'.$catlist->category.'</a>
					  </li>
					';
				}
			  ?>
			</ul>
			<div class="tab-content" id="productTabContent">
			  <!--All Breads-->
			  <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
				<div class="row row-lg row-30">
				<?php
					foreach($product_list as $list){
						echo '
							<div class="col-sm-6 col-lg-4 col-xl-3">
							  <!-- Product-->
							  <article class="product wow fadeInLeft" data-wow-delay=".15s">
								<div class="product-figure"><img src="'. base_url() .'uploads/products/'.$list->pic.'" alt="" height="175" width="200"/>
								</div>
								<h6 class="product-title">'.$list->name.'</h6>
								<div class="product-price-wrap">
								  <div class="product-price">'.$list->price.'</div>
								</div>
								<div class="product-button">
								  <div class="button-wrap"><button id="view_product" class="button button-xs button-primary button-winona" value="'.$list->id.'">View Product</button></div>
								</div>
							  </article>
							</div>
						';
					}
				?>
				</div>
			  </div>
			  <!--Per Category panel-->
			  <?php

				foreach($category_list as $catlist){
          $match= 0;
					echo '
						<div class="tab-pane fade" id="cat'.$catlist->id.'" role="tabpanel" aria-labelledby="'.$catlist->category.'-tab"><div class="row row-lg row-30">
					';
					foreach($product_list as $list){
						if($catlist->id == $list->category_id){
              $match = 1;
							echo '
								<div class="col-sm-6 col-lg-4 col-xl-3">
								  <!-- Product-->
								  <article class="product  fadeInLeft" >
									<div class="product-figure"><img src="'. base_url() .'uploads/products/'.$list->pic.'" alt="" width="200" height="175"/>
									</div>
									<h6 class="product-title">'.$list->name.'</h6>
									<div class="product-price-wrap">
									  <div class="product-price">'.$list->price.'</div>
									</div>
									<div class="product-button">
									  <div class="button-wrap"><button id="view_product" class="button button-xs button-primary button-winona" value="'.$list->id.'">View Product</button></div>
									</div>
								  </article>
								</div>
							';
						}
					}
          if($match == 0) echo '<p style="text-align: center;width: 100%; padding: 4rem;">There no items to show.</p>';
					echo '</div></div>';
				}
			  ?>
			</div>
        </div>
      </section>
<!-- Modal: modal -->
<div class="modal fade" id="product_description" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-title">Product Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-5">
						<!--product picture-->
						<img src="#" id="product-pic" width="370" height="278"/>
					</div>
					<div class="col-lg-7">
						<h4 class="h2-responsive">
							<strong id="product-name">Pandesal</strong>
						</h4>
						<h6 class="h4-responsive">
							<span class="green-text">
								<strong id="product-price">$49</strong>
							</span>
						</h6>
						<p id="product-desc"></p>
            <p>Quantity:</p>
						<div class="row" style="margin-top:0;">
              <div class="row" style="margin:auto">
  							<div class="def-number-input number-input safari_only">
  							  <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
  							  <input type="number" id="product-quantity" value="1" min="1"/>
  							  <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
  							</div>
              </div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				<button class="btn btn-primary btn-sm" id="product-add" value="">Add to Cart
					<i class="fas fa-cart-plus ml-2" aria-hidden="true"></i>
				</button>
			</div>
		</div>
	</div>
</div>


<script>
	var product_list = <?php echo json_encode($product_list);?>;
	var cart = new Array();


	$(document).on('click', '#view_product',function(){

		var id = $(this).val();
		var index = product_list.findIndex(product_list => product_list.id == id);

		var prod_name = product_list[index]['name'],
			prod_price = product_list[index]['price'],
			description = product_list[index]['description'],
			picture = "<?=base_url('uploads/products/')?>"+product_list[index]['pic'];

		//modal values
		$('#product-name').text(prod_name);
		$('#product-price').text(prod_price);
		$('#product-desc').text(description);
		$('#product-pic').attr('src', picture);
		$('#product-quantity').val(1);
		$('#product-add').val(id);

		$('#product_description').modal('show');


	});

	$(document).on('click', '#product-add',function(){
		var id = $(this).val();

		var index = product_list.findIndex(product_list => product_list.id == id);
		var check_cart = cart.findIndex(cart => cart.product_details.id == id);

		var quantity = $('#product-quantity').val();

		if(check_cart == -1){
			cart.push({product_details: product_list[index], quantity: quantity});
			print_cart(product_list, quantity, index);
		}
		$('#product_description').modal('hide');
	});

	function print_cart(cart, quantity, index){
		var cart_item = "<div class='col-12 row'><div class='col-6 text-left'>"+cart[index]['name']+"</div><div class='col-3 text-left'>"+quantity+"</div><div class='col-3'><button type='button' class='close' value='"+cart[index]['id']+"'><span aria-hidden='true'>&times;</span></button></div></div>";

		$('.cart-list').append(cart_item);
	}


	$(document).on('click', '.close', function(){
		var id = $(this).val();

		var check_cart = cart.findIndex(cart => cart.product_details.id == id);

		cart.splice(check_cart, 1);

		$(this).closest('.row').remove();

		console.log(cart);
	});
</script>
