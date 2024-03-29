<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

  <head>
    <title><?=$nav?></title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="<?=base_url('uploads/logo/icon.ico')?>" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    <link rel="stylesheet" href="<?=base_url('assets/client/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/client/css/fonts.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/client/css/style.css')?>">

    <!--Cart Notification Style-->
  	<style>
  		.fa-stack[data-count]:after{
  		  position:absolute;
  		  right:-20%;
  		  top:-40%;
  		  content: attr(data-count);
  		  font-size: 60%;
  		  padding:.6em;
  		  border-radius:999px;
  		  line-height:.75em;
  		  color: white;
  		  background:rgba(255,0,0,.85);
  		  text-align:center;
  		  min-width:2em;
  		  font-weight:bold;
  		}

      .def-number-input{
         display:flex;
       }
       .def-number-input button{
         height: 100%;
       }
  	</style>

	<script src="<?=base_url('assets/admin/js/jquery.min.js');?>"></script>


    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="preloader">
      <div class="wrapper-triangle">
        <div class="pen">
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="56px" data-xl-stick-up-offset="56px" data-xxl-stick-up-offset="56px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-inner-outer" style="background:#cde3f3;">
              <div class="rd-navbar-inner">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand" href="index.html"><img class="brand-logo-dark" src="<?=$header_logo?>" alt="" width="198" height="66"/></a></div>
                </div>
                <div class="rd-navbar-right rd-navbar-nav-wrap">
                  <div class="rd-navbar-aside">
                    <ul class="rd-navbar-contacts-2">
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                          <div class="unit-body"><a class="phone" href="tel:#">+1 234-567-890</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                          <div class="unit-body"><a class="address" href="#">GK Enchanted Farm Pandi-Angat Rd, Angat, Bulacan</a></div>
                        </div>
                      </li>
                    </ul>
                    <ul class="list-share-2">
                      <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                      <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                      <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                      <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                    </ul>
                  </div>
                  <div class="rd-navbar-main">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item <?php echo ($nav == "Home") ? "active" : " ";?>"><a class="rd-nav-link" href="<?=base_url()?>">Home</a>
                      </li>
                      <li class="rd-nav-item <?php echo ($nav == "About Us") ? "active" : " ";?>"><a class="rd-nav-link" href="<?=base_url('Bakery/about_us')?>">About us</a>
                      </li>
                      <li class="rd-nav-item <?php echo ($nav == "Products") ? "active" : " ";?>"><a class="rd-nav-link" href="<?=base_url('Bakery/products')?>">Products</a>
                      </li>
                      <li class="rd-nav-item <?php echo ($nav == "Contacts") ? "active" : " ";?>"><a class="rd-nav-link" href="<?=base_url('Bakery/contacts')?>">Contacts</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <?php
                  echo ($nav != "Checkout Form") ?
                  '<div class="rd-navbar-project-hamburger rd-navbar-project-hamburger-open rd-navbar-fixed-element-1 mr-3" data-multitoggle=".rd-navbar-inner" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate">
                    <span class="fa-stack has-badge">
                      <div class="project-hamburger"><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span>
                      </div>
          				  </span>
                  </div>
                  ' : '';
                ?>
                <div class="rd-navbar-project" style="padding-top: 1rem;">
                  <div class="rd-navbar-project-header" style="display:flex">
                    <div class="rd-navbar-project-hamburger rd-navbar-project-hamburger-close" data-multitoggle=".rd-navbar-inner" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate">
                      <div class="project-close"><span></span><span></span></div>
                    </div>
                    <h5 class="rd-navbar-project-title">Cart</h5>
                    <button type="button" class="btn btn-primary btn-sm" id="checkout" style="position:fixed; right:20px; padding: .5em 1.5rem;" onclick="window.location.href='<?=base_url('Bakery/checkout')?>'">Checkout</button>
                  </div>
                  <div class="rd-navbar-project-content rd-navbar-content">
                    <table id="cart" class="table table-hover .table-responsive text-left">
              				<thead class="text-center">
            						<tr>
                          <th></th>
                          <th>Quantity</th>
              						<th>Product</th>
            						</tr>
            					</thead>
            					<tbody id="cart-list">

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <?php
        if($nav != "Home"){
          if($nav == "About Us"){
            $img ='banner-3.png';
          }
          else if($nav == 'Products'){
            $img ='bg-1.jpg';
          } else {
              $img ='';
          }
          ?>

          <!-- Breadcrumbs -->
          <section class="bg-gray-7">
            <div class="breadcrumbs-custom box-transform-wrap context-dark">
              <div class="container">
                <h3 class="breadcrumbs-custom-title"><?=$nav;?></h3>
                <div class="breadcrumbs-custom-decor"></div>
              </div>
              <div class="box-transform" style="background-image: url(<?=base_url('assets/images/' . $img);?>); opacity:0.2"></div>

            </div>
            <div class="container">
              <ul class="breadcrumbs-custom-path">
                <li><a href="<?=base_url();?>">Home</a></li>
                <li class="active"><?=$nav;?></li>
              </ul>
            </div>
          </section>
      <?php
        }
      ?>
