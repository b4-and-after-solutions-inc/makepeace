<!DOCTYPE html>
<html>

<head>

<link rel="shortcut icon" href="favicon.ico">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?=$this->config->item('website_name');?></title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="author" content="JDC, FDRL, EJWP">
<meta name="application-name" content="<?=$this->config->item('website_name');?>">

<!-- LINKS Start -->

<link rel="stylesheet" href="<?=base_url('assets/admin/');?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url('assets/admin/');?>css/font-awesome.min.css">
<link rel="stylesheet" href="<?=base_url('assets/admin/');?>css/ionicons.min.css">

<link rel="stylesheet" href="<?=base_url('assets/admin/');?>css/select2.min.css">

<link rel="stylesheet" href="<?=base_url('assets/admin/');?>css/AdminLTE.min.css">
<link rel="stylesheet" href="<?=base_url('assets/admin/');?>css/skin-black-light.css">
<link rel="stylesheet" href="<?=base_url('assets/admin/');?>css/google-apis.min.css">

<link rel="stylesheet" href="<?=base_url('assets/admin/');?>css/dataTables.bootstrap.min.css">

<!-- LINKS End -->

<!-- SCRIPTS Start -->

<script src="<?=base_url('assets/admin/');?>js/jquery.min.js"></script>

<script src="<?=base_url('assets/admin/');?>js/bootstrap.min.js"></script>

<script src="<?=base_url('assets/admin/');?>js/select2.full.min.js"></script>

<script src="<?=base_url('assets/admin/');?>js/adminlte.min.js"></script>

<script src="<?=base_url('assets/admin/');?>js/jquery.slimscroll.min.js"></script>
<script src="<?=base_url('assets/admin/');?>js/fastclick.min.js"></script>

<script src="<?=base_url('assets/admin/');?>js/jquery.dataTables.min.js"></script>

<script src="<?=base_url('assets/admin/');?>js/dataTables.bootstrap.min.js"></script>

<script src="<?=base_url('assets/admin/');?>js/Chart.min.js"></script>

<script>
// NOTE What is this shit?
function logOut() { // TODO LogOut Session Destroy (?) Functionality and Redirect to Login
	//$.get("loginQuery.php?logout", function( data ) {
	//	if(data["status"] == "true") {
			window.location = "<?=base_url('makepeace/access/login/');?>";
	//	}
	//});
}
</script>

<!-- SCRIPTS End -->

<head>

<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">

<!-- HEADER Start -->
<?php // TODO Create Session Redirect when No User was Logged In
// if($_SESSION[$WebsiteName] == null)
// 	header("location: login.php");
?>

<header class="main-header">
	<a href="<?=base_url();?>Admin" class="logo">
		<span class="logo-mini"><b><?=$this->config->item('website_big');?></b></span>
		<span class="logo-lg"><b><?=$this->config->item('website_big');?></b><?=$this->config->item('website_small');?></span>
	</a>

	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav p0">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url('assets/admin/img/users/'); ?>JDC.png" class="user-image" alt="User Image">
						<span class="hidden-xs"><?=$this->session->userdata('name');?></span><!-- TODO Change to Logged In Name -->
					</a>

				<ul class="dropdown-menu">
					<li class="user-header">
						<img src="<?php echo base_url('assets/admin/img/users/'.'JDC.png'); ?>" class="img-circle" alt="User Image">
						<p><?=$this->session->userdata('name');?> <small>Administrator</small></p><!-- TODO Change User Information to get via SESSION -->
					</li>

					<li class="user-footer">
					<div class="pull-left">
					<a href="#" class="btn btn-default btn-flat">Profile</a>
					</div>
					<div class="pull-right">
					<a href="<?php echo base_url()?>Access/sign_out/" class="btn btn-default btn-flat">Sign out</a>
          <!-- TODO Change onclick Function -->
					</div>
					</li>
				</ul>
				</li>
			<!-- Removed Control Sidebar Toggle -->
			</ul>
		</div>
	</nav>
</header>
<!-- HEADER End -->


<style type="text/css">
	material{
        display: block;
    }
    material:hover{
        cursor: pointer;
        box-shadow: 0 1px 20px #999;
        border-radius: 10px;
    }
    .controls{
    	position: absolute;
    	right: 50px;
    }
    .row{
    	display: flex;
    }
    .m0{
    	margin:0!important;
    }
    .grid-desc{
        width: 200px;
        margin:10px;
      }
    .grid-desc div.mcontent {
	    max-height: 168px;
	    min-height: 168px;
	    overflow: hidden;
	}
	.mb2 {
	    margin-bottom: 2px;
	}
	.pb0 {
	    padding-bottom: 0;
	}
	.sp {
	    padding: 10px;
	}
      .card-post__image {
	    position: relative;
	    min-height: 15.3125rem;
	    border-top-left-radius: 0.625rem;
	    border-top-right-radius: 0.625rem;
	    background-size: cover;
	    background-position: center;
	    background-repeat: no-repeat;
	}

	.card-post--1 .card-post__category {
	    top: 0.9375rem;
	    right: 0.9375rem;
	    position: absolute;
	    text-transform: uppercase;
	}
	.card {
	    position: relative;
	    display: -ms-flexbox;
	    display: flex;
	    -ms-flex-direction: column;
	    flex-direction: column;
	    min-width: 0;
	    word-wrap: break-word;
	    background-color: #fff;
	    background-clip: border-box;
	    border: 1px solid rgba(0,0,0,.125);
	    border-radius: .25rem;
	}
	.card-small {
    box-shadow: 0 2px 0 rgba(90, 97, 105, 0.11), 0 4px 8px rgba(90, 97, 105, 0.12), 0 10px 10px rgba(90, 97, 105, 0.06), 0 7px 70px rgba(90, 97, 105, 0.1);
	}

	.card {
	    background-color: #fff;
	    border: none;
	    border-radius: 0.625rem;
	    box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
	}
	.si-tru {
    	background: #10101047;
    	font-weight: 900;
	}
	.btext {
	    bottom: 0;
	    position: absolute;
	    width: 100%;
	    color: white;
	    padding-left: 10px;
	}
	.ss {
	    font-size: 12px;
	}
	.mb0 {
	    margin-bottom: 0px;
	}
	.card-title {
	    line-height: 20px;
	}
	.card-title {
	    font-weight: 500;
	    margin-bottom: 0.75rem;
	}
	.card-title {
	    margin: 0;
	}
	.sticky {
	    position: -webkit-sticky;
	    position: sticky;
	    top: 60px;
	    z-index: 1;
	    background: #f5f6f8;
	    padding-left: 20px;
	}
	.border-left {
    border-left: 1px solid #e1e5eb !important;
	}
	.border-left {
	    border-left: 1px solid #e1e5eb !important;
	}
	.flex-row {
	    -ms-flex-direction: row!important;
	    flex-direction: row!important;
	}
	.border-left {
	    border-left: 1px solid #dee2e6!important;
	}
	.navbar-nav {
	    display: -ms-flexbox;
	    display: flex;
	    -ms-flex-direction: column;
	    flex-direction: column;
	    padding:10px;
	    margin-bottom: 0;
	    list-style: none;
	}
	.filter a.on{
        background: #ececec;
    }
    .filter a.on::after {
      content:'✔';
      color: green;
    }
	.p0{
		padding:0 !important;
	}
	.filter {
	    position: relative;
	    display: inline-block;
	}
	.filter > a{
		font-size: 13px;
		margin-left: 20px;
	}
	.dropdown, .dropleft, .dropright, .dropup {
	    position: relative;
	}
	.navbar-nav .nav-link {
	    padding-right: 0;
	    padding-left: 0;
	}
	.filter > a {
	    color: #67696f;
	    padding: 0.375rem 0.875rem;
	}
	.nav-link {
	    font-size: 0.8125rem;
	    font-weight: 400;
	}
	.nav-link {
	    padding: 0.625rem 0.625rem;
	    transition: all 250ms cubic-bezier(0.27, 0.01, 0.38, 1.06);
	}
	.text-nowrap {
	    white-space: nowrap!important;
	}
	.pl-3, .px-3 {
	    padding-left: 1rem!important;
	}
	.pr-3, .px-3 {
	    padding-right: 1rem!important;
	}
	.nav-link {
	    display: block;
	    padding: .5rem 1rem;
	}
	a {
	    color: #007bff;
	}
	a {
	    color: #007bff;
	    text-decoration: none;
	}
	a {
	    color: #007bff;
	    text-decoration: none;
	    background-color: transparent;
	    -webkit-text-decoration-skip: objects;
	}
	.filter .dropdown-content {
	    display: none;
	    position: absolute;
	    background-color: #f9f9f9;
	    min-width: 135px;
	    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	    font-size: 11px;
	    z-index: 1;
	}
	 .dropdown:hover .dropdown-content {
        display: block;
      }
      .dropdown:hover .tags {
        display: flex !important;
      }
      .filter a.dropdown-item {
	    font-size: 12px;
	}
	.dropdown-item {
	    padding: 0.5rem 1.25rem;
	    font-weight: 300;
	    color: #212529;
	    font-size: 0.9375rem;
	    transition: background-color 250ms cubic-bezier(0.27, 0.01, 0.38, 1.06), color 250ms cubic-bezier(0.27, 0.01, 0.38, 1.06);
	}
	.dropdown-item {
	    display: block;
	    width: 100%;
	    padding: .25rem 1.5rem;
	    clear: both;
	    font-weight: 400;
	    color: #212529;
	    text-align: inherit;
	    white-space: nowrap;
	    background-color: transparent;
	    border: 0;
	}
	.skin-black-light .sidebar a {
	    color: #ffff;
	}
	.is-f{
		text-align: right;
		padding-right: 8px;
	}
	.featured{
		color: #e09a40;
	}
	.inactive{
		opacity: .6;
	}
	.badge-info{
		background:#2196f3;
	}
	.badge-warning{
		background: #ff9800;
	}
	.badge-success{
		background:#009688;
	}
	.f-box{
		border-top: 1px solid #e0e0e0;
		border-bottom-left-radius: 6.25px;
		border-bottom-right-radius: 6.25px;
	}
	.f-box:hover{
		background:#ececec;
	}
	.feature-box{
		background: #fff;
	    border: 1px solid #ececec;
	    padding: 10px;
	    font-weight: 600;
	}
	.feature-box a{
		float: right;
	    font-size: 12px;
	    font-weight: bold;
	    color: #F44336;
	}
</style>
<!-- SIDEBAR Start -->
<aside class="main-sidebar" style="
    background: url('<?php echo base_url() ."/assets/admin/img/sb-bg.jpg"?>');
    background-size: cover;
"></aside>
<aside class="main-sidebar" style="background: #01070ad6;">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
		<li class="header">MAIN MENU</li><!-- TODO Dynamic Highlighting of Menu -->
			<li class="<?=($Menu1=='orders'?'active':'');?>"><a href="<?=base_url();?>Admin/orders"><i class="glyphicon glyphicon-shopping-cart"></i> <span>Orders</span></a></li>
			<li class="<?=($Menu1=='Delivery'?'active':'');?>"><a href="<?=base_url();?>Admin/delivery"><i class="glyphicon glyphicon-send"></i> <span>Deliveries</span></a></li>
			<li class="<?=($Menu1=='Dashboard'?'active':'');?>"><a href="<?=base_url();?>Admin"><i class="glyphicon glyphicon-apple"></i> <span>Products</span></a></li>

			<li class="<?=($Menu1=='settings'?'active':'');?>"><a href="<?=base_url();?>Admin/settings"><i class="glyphicon glyphicon-wrench"></i> <span>Settings</span></a></li>

		</ul>
	</section>
</aside>
<!-- SIDEBAR End -->

<div class="content-wrapper">
