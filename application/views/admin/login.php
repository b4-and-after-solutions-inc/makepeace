<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$this->config->item('website_name');?> | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?=base_url('assets/admin/');?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/admin/');?>css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/admin/');?>css/ionicons.min.css">

  <link rel="stylesheet" href="<?=base_url('assets/admin/');?>css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/admin/');?>css/google-apis.min.css">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url('');?>"><b><?=$this->config->item('website_big');?> </b><?=$this->config->item('website_small');?> </a><!-- TODO Add href (?) -->
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <div class="alert alert-danger display-hide" id="walert" style="display: none;">
        <button class="close" data-close="alert"></button>
        <span> Wrong Username or Password. </span>
    </div>
    
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email or Username" id="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="sign_in()">Sign In</button>
        </div>
      </div>

    <a href="#">I forgot my password</a><br><!-- TODO Forgot Password Functionality -->

  </div>

</div>

<script src="<?=base_url('assets/admin/');?>js/jquery.min.js"></script>
<script src="<?=base_url('assets/admin/');?>js/bootstrap.min.js"></script>
<script type="text/javascript">
  function sign_in(){
    $.ajax({
      url: '<?php echo base_url()?>Access/sign_in',
      type:'post',
      data:{username:$('#username').val(), password:$('#password').val()},
      async: false,
      success: function(d){
          if(d == 1){
            window.location.replace('<?php echo base_url()?>Admin');
          } else{
            $('#walert').show();
          }
      }
    });
  }
</script>
</body>
</html>
