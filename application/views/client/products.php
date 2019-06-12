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
						<a class="nav-link" id="'.$catlist->category.'-tab" data-toggle="tab" href="#'.$catlist->category.'" role="tab">'.$catlist->category.'</a>
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
								<div class="product-figure"><img src="images/admin/'.$list->pic.'" alt="" width="161" height="162"/>
								</div>
								<div class="product-rating"><span class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span class="mdi mdi-star text-gray-13"></span>
								</div>
								<h6 class="product-title">'.$list->name.'</h6>
								<div class="product-price-wrap">
								  <div class="product-price">'.$list->price.'</div>
								</div>
								<div class="product-button">
								  <div class="button-wrap"><a class="button button-xs button-primary button-winona" href="#">Add to cart</a></div>
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
					echo '
						<div class="tab-pane fade" id="'.$catlist->category.'" role="tabpanel" aria-labelledby="'.$catlist->category.'-tab"><div class="row row-lg row-30">
					';
					foreach($product_list as $list){
						if($catlist->id == $list->category_id){
							echo '
								<div class="col-sm-6 col-lg-4 col-xl-3">
								  <!-- Product-->
								  <article class="product wow fadeInLeft" data-wow-delay=".15s">
									<div class="product-figure"><img src="images/admin/'.$list->pic.'" alt="" width="161" height="162"/>
									</div>
									<div class="product-rating"><span class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span class="mdi mdi-star text-gray-13"></span>
									</div>
									<h6 class="product-title">'.$list->name.'</h6>
									<div class="product-price-wrap">
									  <div class="product-price">'.$list->price.'</div>
									</div>
									<div class="product-button">
									  <div class="button-wrap"><a class="button button-xs button-primary button-winona" href="#">Add to cart</a></div>
									</div>
								  </article>
								</div>
							';
						}
					}
					echo '</div></div>';
				}
			  ?>
			</div>
        </div>
      </section>