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
          $clean_name = explode(" ", $catlist->category, 2);
					echo '
					  <li class="nav-item">
						<a class="nav-link" id="'.$catlist->category.'-tab" data-toggle="tab" href="#'.$clean_name[0].'" role="tab">'.$catlist->category.'</a>
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
							  <article class="product">
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
				?>
				</div>
			  </div>
			  <!--Per Category panel-->
			  <?php

				foreach($category_list as $catlist){
          			$clean_name = explode(" ", $catlist->category, 2);
					echo '
						<div class="tab-pane fade" id="'.$clean_name[0].'" role="tabpanel" aria-labelledby="'.$catlist->category.'-tab"><div class="row row-lg row-30">
					';
					$m =0;
					foreach($product_list as $list){
						if($catlist->id == $list->category_id){
							$m = 1;
							echo '
								<div class="col-sm-6 col-lg-4 col-xl-3">
								  <!-- Product-->
								  <article class="product">
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
					if($m == 0) echo '<p style="width:100%; padding-top:60px"> There are no items to show.</p>';
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
						<div>
							<div>Quantity:</div>
							<div class="row" style="margin-top:0;">
								<div class="def-number-input number-input safari_only" style="margin-left:auto; margin-right: auto;">
								  <button class="minus"></button>
								  <input type="number" id="product-quantity" value="1" min="1"/>
								  <button class="plus"></button>
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
<script type="text/javascript">

  $(document).on('click', '#view_product',function(){
    var id = $(this).val();
    var index = product_list.findIndex(product_list => product_list.id == id);

    var prod_name = product_list[index]['name'],
      prod_price = product_list[index]['price'],
      description = product_list[index]['description'],
      picture = "<?=base_url('uploads/products/')?>"+product_list[index]['pic'];

    //setting the modal values
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
      set_cart_session();
      print_cart(product_list, quantity, index);
    }
    check_notification();
    $('#product_description').modal('hide');
  });
</script>
