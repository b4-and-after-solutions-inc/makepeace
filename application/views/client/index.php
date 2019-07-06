<style type="text/css">
  @import url("https://fonts.googleapis.com/css?family=Roboto:900");
/**
  * style variables
*/
/**
  * Control & indicator mixin
*/
.carousel {
  height: 300px;
  overflow: hidden;
  text-align: center;
  position: relative;
  padding: 0;
  list-style: none;
}

.carousel__indicators {
  /*position: absolute;*/
  bottom: 20px;
  width: 100%;
  text-align: center;
}
.carousel__indicator {
  height: 80px;
  width: 80px;
  display: inline-block;
  z-index: 2;
  cursor: pointer;
  opacity: 0.35;
  margin: 0 2.5px 0 2.5px;
}
.carousel__indicator:hover {
  opacity: 0.75;
}
.carousel--scale .carousel__slide {
  -webkit-transform: scale(0);
          transform: scale(0);
}
.carousel__slide {
  height: 100%;
  position: absolute;
  display: flex;
  opacity: 0;
  transition: opacity 0.5s, -webkit-transform 0.5s;
  transition: opacity 0.5s, transform 0.5s;
  transition: opacity 0.5s, transform 0.5s, -webkit-transform 0.5s;
}
/**
  * Theming
*/
.carousel-container {
  display: block;
  padding-top: 25px;
  height: 500px;
}
.my-carousel {
  border-radius: 5px;
  margin: 30px;
}
.carousel__slide {
 /* overflow: hidden;
  width: 1000px;*/
}
.carousel--thumb .carousel__indicator {
  height: 50px;
  width: 50px;
}
.carousel__indicator {
  background-color: #fafafa;
  background-size: cover;
}
.carousel__slide,
.carousel--thumb .carousel__indicators .carousel__indicator{
  background-size: cover;
  background-position: center;
}
.product_image{
  min-width:400px;
  max-width:400px;
}
.product_details{
  padding: 25px;
  padding-top: 0;
  text-align: left;
}
.product_details p{
}
.shown{
  opacity: 1 !important;
}

.product_details > span{
  font-size:35px;
}
strong {
  position: relative;
}
strong::after {
  content: '';
  position: absolute;
  bottom: -0.35rem;
  left: -0.2rem;
  right: -0.2rem;
  height: 0.75rem;
  z-index: 0;
  background-image: url("underline.svg");
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
<!-- Swiper-->
      <section class="section swiper-container swiper-slider swiper-slider-2 swiper-slider-3" data-loop="true" data-autoplay="5000" data-simulate-touch="false" data-slide-effect="fade">
        <div class="swiper-wrapper text-sm-left">

          <?php
          foreach ($slides as $s) {
              if(!isset($s->link_title)){
                $link = '<a class="button button-lg button-primary button-winona button-shadow-2" href="'.$s->link.'" data-caption-animate="fadeInUp" data-caption-delay="300">'. $s->link_title.'</a>';
              }
              else {
                $link = '';
              }
                echo
                '<div class="swiper-slide context-dark" data-slide-bg="'. base_url('uploads/slider/') . $s->picture.'">
                  <div class="swiper-slide-caption section-md">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-9 col-md-8 col-lg-7 col-xl-7 offset-lg-1 offset-xxl-0">
                          <h1 class="oh swiper-title">
                              <span class="d-inline-block" data-caption-animate="slideInUp" data-caption-delay="0">'. $s->title.'</span>
                          </h1>
                          <p class="big swiper-text" data-caption-animate="fadeInLeft" data-caption-delay="300">'. $s->body.'</p>'.
                          $link .
                        '</div>
                      </div>
                    </div>
                  </div>
                </div>';
          }
          ?>

        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination" data-bullet-custom="true"></div>
        <!-- Swiper Navigation-->
        <div class="swiper-button-prev">
          <div class="preview">
            <div class="preview__img"></div>
          </div>
          <div class="swiper-button-arrow"></div>
        </div>
        <div class="swiper-button-next">
          <div class="swiper-button-arrow"></div>
          <div class="preview">
            <div class="preview__img"></div>
          </div>
        </div>
      </section>
      <!-- What We Offer-->
      <section class="section section-md bg-default" style=": #eaf0f5;">
        <div class="container">
          <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">Featured Products</span></h3>
          <a href="<?php echo base_url()?>Bakery/products">View all Products</a>
          <div class="row row-md row-30">

          </div>
        </div>

        <div class="carousel-container">
          <div class="carousel my-carousel carousel--thumb" style="max-width: 1000px;margin: auto;">
            <?php
            $ct= 0;
              foreach($featured as $feat){
                if($ct == 0){
                  $s = 'shown';
                }
                else{ $s = '';}
                $ct = 1;
                echo '<div class="carousel__slide '.$s.'" id="'. $feat->id .'">
                  <div class="product_image">
                      <img width="500px" src="'. base_url('uploads/products/'). $feat->pic .'">
                  </div>
                  <div class="product_details">
                    <span>'. $feat->name .'</span>
                    <p>'.$feat->description.'</p>
                  </div>
                </div>';
              }
            ?>
          </div>

          <div class="carousel__indicators">
            <?php
              foreach($featured as $feat){
                echo '<label class="carousel__indicator" onclick="featured('. $feat->id .')"
                style="background-image: url(\''. base_url('uploads/products/'). $feat->pic .'\');"></label>';
              }
            ?>
          </div>
        </div>
      </section>
      <!-- Section CTA-->
      <section class="primary-overlay section parallax-container" data-parallax-img="<?=base_url('assets/client/');?>images/banner-4.png">
        <div class="parallax-content section-xl context-dark text-md-left">
          <div class="container">
            <div class="row justify-content-end">
              <div class="col-sm-8 col-md-7 col-lg-5">
                <div class="cta-modern">
                  <h3 class="cta-modern-title wow fadeInRight">About Us</h3>
                  <p class="lead">We are not just a team but also a family!</p>
                  <p class="cta-modern-text oh-desktop" data-wow-delay=".1s"><span class="cta-modern-decor wow slideInLeft"></span><span class="d-inline-block wow slideInDown">Yok & Angie, Founder</span></p><a class="button button-md button-secondary-2 button-winona wow fadeInUp" href="#" data-wow-delay=".2s">View Our Members</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- What We Offer-->
      <section class="section section-xl bg-default">
        <div class="container">
          <h3 class="wow fadeInLeft">What People Say</h3>
        </div>
        <div class="container container-style-1">
          <div class="owl-carousel owl-style-12" data-items="1" data-sm-items="2" data-lg-items="3" data-margin="30" data-xl-margin="45" data-autoplay="true" data-nav="true" data-center="true" data-smart-speed="400">
            <!-- Quote Tara-->
            <article class="quote-tara">
              <div class="quote-tara-caption">
                <div class="quote-tara-text">
                  <p class="q">TheMakePeace Bakery is the best place in the city and is well run and staffed. Prices are great and allow me to keep coming back.</p>
                </div>
                <div class="quote-tara-figure"><img src="<?=base_url('assets/client/')?>images/Testimonies/Ej.png" alt="" width="115" height="115"/>
                </div>
              </div>
              <h6 class="quote-tara-author">Elisha John Pascual</h6>
              <div class="quote-tara-status">Client</div>
            </article>
            <!-- Quote Tara-->
            <article class="quote-tara">
              <div class="quote-tara-caption">
                <div class="quote-tara-text">
                  <p class="q">I am a real bread addict, and even when I’m home I prefer your breads to all others. They taste awesome and are very affordable.</p>
                </div>
                <div class="quote-tara-figure"><img src="<?=base_url('assets/client/')?>images/Testimonies/Felmar.png" alt="" width="115" height="115"/>
                </div>
              </div>
              <h6 class="quote-tara-author">Felmar Llano</h6>
              <div class="quote-tara-status">Client</div>
            </article>
            <!-- Quote Tara-->
            <article class="quote-tara">
              <div class="quote-tara-caption">
                <div class="quote-tara-text">
                  <p class="q">TheMakePeace Bakery has amazing breads. Not only do you get served with a great attitude, you also get delicious breads at a great price!</p>
                </div>
                <div class="quote-tara-figure"><img src="<?=base_url('assets/client/')?>images/Testimonies/Tong.jpg" alt="" width="115" height="115"/>
                </div>
              </div>
              <h6 class="quote-tara-author">Gyrome Tomas</h6>
              <div class="quote-tara-status">Client</div>
            </article>
            <!-- Quote Tara-->
            <article class="quote-tara">
              <div class="quote-tara-caption">
                <div class="quote-tara-text">
                  <p class="q">TheMakePeace Bakery has great pandesal. Not only do you get served with a great attitude and delivered delicious breads, you get a great price.</p>
                </div>
                <div class="quote-tara-figure"><img src="<?=base_url('assets/client/')?>images/Testimonies/Tata.png" alt="" width="115" height="115"/>
                </div>
              </div>
              <h6 class="quote-tara-author">John Darren Comador</h6>
              <div class="quote-tara-status">Client</div>
            </article>
          </div>
        </div>
      </section>

      <!-- Section Services  Last section-->
      <section class="section section-sm bg-default">
        <div class="container">
          <div class="owl-carousel owl-style-11 dots-style-2" data-items="1" data-sm-items="1" data-lg-items="2" data-xl-items="4" data-margin="30" data-dots="true" data-mouse-drag="true" data-rtl="true">
            <article class="box-icon-megan wow fadeInUp">
              <div class="box-icon-megan-header">
                <div class="box-icon-megan-icon linearicons-bag"></div>
              </div>
              <h5 class="box-icon-megan-title"><a href="#">Free Delivery</a></h5>
              <p class="box-icon-megan-text">If you order more than 3 pizzas, we will gladly deliver them to you for free.</p>
            </article>
            <article class="box-icon-megan wow fadeInUp" data-wow-delay=".05s">
              <div class="box-icon-megan-header">
                <div class="box-icon-megan-icon linearicons-map2"></div>
              </div>
              <h5 class="box-icon-megan-title"><a href="#">Convenient Location</a></h5>
              <p class="box-icon-megan-text">Our pizzeria is situated in the downtown and is very easy to reach even on weekends.</p>
            </article>
            <article class="box-icon-megan wow fadeInUp" data-wow-delay=".1s">
              <div class="box-icon-megan-header">
                <div class="box-icon-megan-icon linearicons-radar"></div>
              </div>
              <h5 class="box-icon-megan-title"><a href="#">Free Wi-Fi</a></h5>
              <p class="box-icon-megan-text">We have free Wi-Fi available to all clients and visitors of our pizzeria.</p>
            </article>
            <article class="box-icon-megan wow fadeInUp" data-wow-delay=".15s">
              <div class="box-icon-megan-header">
                <div class="box-icon-megan-icon linearicons-thumbs-up"></div>
              </div>
              <h5 class="box-icon-megan-title"><a href="#">Best Service</a></h5>
              <p class="box-icon-megan-text">The client is our #1 priority as we deliver top-notch customer service.</p>
            </article>
          </div>
        </div>
      </section>
<script>
function featured(id){
        $('.shown').removeClass('shown');
        $('#'+id).addClass('shown');
      }
</script>
