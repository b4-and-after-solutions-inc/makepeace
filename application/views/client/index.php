
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
      <section class="section section-md bg-default">
        <div class="container">
          <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">Our Menu</span></h3>
          <div class="row row-md row-30">
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Services Terri-->
                <article class="services-terri wow slideInUp">
                  <div class="services-terri-figure"><img src="<?=base_url('assets/client/')?>images/pandesal-1.png" alt="" width="370" height="278"/>
                  </div>
                  <div class="services-terri-caption"><span class="services-terri-icon linearicons-bread"></span>
                    <h5 class="services-terri-title"><a href="#">Breads</a></h5>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Services Terri-->
                <article class="services-terri wow slideInDown">
                  <div class="services-terri-figure"><img src="<?=base_url('assets/client/')?>images/cookies-2.png" alt="" width="370" height="278"/>
                  </div>
                  <div class="services-terri-caption"><span class="services-terri-icon linearicons-hamburger"></span>
                    <h5 class="services-terri-title"><a href="#">Cookies</a></h5>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Services Terri-->
                <article class="services-terri wow slideInUp">
                  <div class="services-terri-figure"><img src="<?=base_url('assets/client/')?>images/choco-cake-3.png" alt="" width="370" height="278"/>
                  </div>
                  <div class="services-terri-caption"><span class="services-terri-icon linearicons-cake"></span>
                    <h5 class="services-terri-title"><a href="#">Cakes</a></h5>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </section>

       <section class="section section-last bg-default">
        <div class="container-fluid container-inset-0 isotope-wrap">
          <div class="row row-10 gutters-10 isotope" data-isotope-layout="masonry" data-isotope-group="gallery" data-lightgallery="group">
            <div class="col-xs-6 col-sm-4 col-xl-2 isotope-item oh-desktop">
              <!-- Thumbnail Mary-->
              <article class="thumbnail thumbnail-mary thumbnail-mary-2 wow slideInLeft"><a class="thumbnail-mary-figure" href="images/gallery-1-1200x800-original.jpg" data-lightgallery="item"><img src="<?=base_url('assets/client/')?>images/gallery-1-310x585.jpg" alt="" width="310" height="585"/></a>
                <div class="thumbnail-mary-caption">
                  <div>
                    <h6 class="thumbnail-mary-title"><a href="#">Best Ingredients</a></h6>
                    <div class="thumbnail-mary-location">Tasty Pizza</div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-xs-6 col-sm-8 col-xl-4 isotope-item oh-desktop">
              <!-- Thumbnail Mary-->
              <article class="thumbnail thumbnail-mary thumbnail-mary-big wow slideInRight"><a class="thumbnail-mary-figure" href="images/gallery-2-1200x800-original.jpg" data-lightgallery="item"><img src="<?=base_url('assets/client/')?>images/gallery-2-631x587.jpg" alt="" width="631" height="587"/></a>
                <div class="thumbnail-mary-caption">
                  <div>
                    <h6 class="thumbnail-mary-title"><a href="#">Comfortable interior</a></h6>
                    <div class="thumbnail-mary-location">Modern Design</div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-xs-6 col-sm-4 col-xl-2 isotope-item oh-desktop">
              <!-- Thumbnail Mary-->
              <article class="thumbnail thumbnail-mary thumbnail-mary-2 wow slideInDown"><a class="thumbnail-mary-figure" href="images/gallery-3-1200x800-original.jpg" data-lightgallery="item"><img src="<?=base_url('assets/client/')?>images/gallery-3-311x289.jpg" alt="" width="311" height="289"/></a>
                <div class="thumbnail-mary-caption">
                  <div>
                    <h6 class="thumbnail-mary-title"><a href="#">quality Dishware</a></h6>
                    <div class="thumbnail-mary-location">Top-notch utensils</div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-xs-6 col-sm-8 col-xl-4 isotope-item oh-desktop">
              <!-- Thumbnail Mary-->
              <article class="thumbnail thumbnail-mary wow slideInUp"><a class="thumbnail-mary-figure" href="images/gallery-4-1200x800-original.jpg" data-lightgallery="item"><img src="<?=base_url('assets/client/')?>images/gallery-4-631x289.jpg" alt="" width="631" height="289"/></a>
                <div class="thumbnail-mary-caption">
                  <div>
                    <h6 class="thumbnail-mary-title"><a href="#">Refreshing cocktails</a></h6>
                    <div class="thumbnail-mary-location">Exclusive selection</div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-xs-6 col-sm-4 col-xl-2 isotope-item oh-desktop">
              <!-- Thumbnail Mary-->
              <article class="thumbnail thumbnail-mary thumbnail-mary-2 wow slideInUp"><a class="thumbnail-mary-figure" href="images/gallery-5-1200x800-original.jpg" data-lightgallery="item"><img src="<?=base_url('assets/client/')?>images/gallery-5-311x289.jpg" alt="" width="311" height="289"/></a>
                <div class="thumbnail-mary-caption">
                  <div>
                    <h6 class="thumbnail-mary-title"><a href="#">Exotic Salads</a></h6>
                    <div class="thumbnail-mary-location">Summer Taste</div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-xs-6 col-sm-4 col-xl-2 isotope-item oh-desktop">
              <!-- Thumbnail Mary-->
              <article class="thumbnail thumbnail-mary thumbnail-mary-2 wow slideInRight"><a class="thumbnail-mary-figure" href="images/gallery-6-1200x800-original.jpg" data-lightgallery="item"><img src="<?=base_url('assets/client/')?>images/gallery-6-311x289.jpg" alt="" width="311" height="289"/></a>
                <div class="thumbnail-mary-caption">
                  <div>
                    <h6 class="thumbnail-mary-title"><a href="#">All Types of pizza</a></h6>
                    <div class="thumbnail-mary-location">Special Recipes</div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-xs-6 col-sm-4 col-xl-2 isotope-item oh-desktop">
              <!-- Thumbnail Mary-->
              <article class="thumbnail thumbnail-mary thumbnail-mary-2 wow slideInLeft"><a class="thumbnail-mary-figure" href="images/gallery-7-1200x800-original.jpg" data-lightgallery="item"><img src="<?=base_url('assets/client/')?>images/gallery-7-311x289.jpg" alt="" width="311" height="289"/></a>
                <div class="thumbnail-mary-caption">
                  <div>
                    <h6 class="thumbnail-mary-title"><a href="#">Diverse menu</a></h6>
                    <div class="thumbnail-mary-location">Pick Your Favorite dish</div>
                  </div>
                </div>
              </article>
            </div>
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

     

      <!-- Tell-->
      <section class="section section-sm section-first bg-default">
        <div class="container">
          <h3 class="heading-3">Book your Table</h3>
          <form class="rd-form rd-mailform form-style-1" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
            <div class="row row-20 gutters-20">
              <div class="col-md-6 col-lg-4 oh-desktop">
                <div class="form-wrap wow slideInDown">
                  <input class="form-input" id="contact-your-name-6" type="text" name="name" data-constraints="@Required">
                  <label class="form-label" for="contact-your-name-6">Your Name*</label>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 oh-desktop">
                <div class="form-wrap wow slideInUp">
                  <input class="form-input" id="contact-email-6" type="email" name="email" data-constraints="@Email @Required">
                  <label class="form-label" for="contact-email-6">Your E-mail*</label>
                </div>
              </div>
              <div class="col-lg-4 oh-desktop">
                <div class="form-wrap wow slideInDown">
                  <!--Select 2-->
                  <select class="form-input" data-minimum-results-for-search="Infinity" data-constraints="@Required">
                    <option value="1">Select a Service</option>
                    <option value="2">Dine-In</option>
                    <option value="3">Carry-Out</option>
                    <option value="4">Event Catering</option>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div class="form-wrap wow fadeIn">
                  <label class="form-label" for="contact-message-6">Message</label>
                  <textarea class="form-input textarea-lg" id="contact-message-6" name="message" data-constraints="@Required"></textarea>
                </div>
              </div>
            </div>
            <div class="group-custom-1 group-middle oh-desktop">
              <button class="button button-lg button-primary button-winona wow fadeInRight" type="submit">Send message</button>
              <!-- Quote Classic-->
              <article class="quote-classic quote-classic-3 wow slideInDown">
                <div class="quote-classic-text">
                  <p class="q">Please reserve your table at least 1 day in advance.</p>
                </div>
              </article>
            </div>
          </form>
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