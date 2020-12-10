<!DOCTYPE html>
<html>
<head>
  <title><?php echo e($w_title); ?></title>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta name="Description" content="<?php echo e($description); ?>" />
  <meta name="keyword" content="<?php echo e($w_title); ?>, <?php echo e($keyword); ?>">
  <meta name="MobileOptimized" content="320" />
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <link rel="icon" type="image/icon" href="<?php echo e(asset('images/favicon/favicon.png')); ?>"> <!-- favicon-icon -->
  <!-- theme style -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> <!-- google font -->
  <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
  <link href="https://vjs.zencdn.net/6.6.0/video-js.css" rel="stylesheet"> <!-- videojs css -->
  <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- fontawsome css -->
  <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css"/> <!-- custom css -->
  <link href="<?php echo e(asset('css/custom-style.css')); ?>" rel="stylesheet" type="text/css"/>
</head>
<body class="bg-black">
  <div class="signup__container container sign-in-main-block">
    <div class="row">
      <div class="col-sm-6 col-md-offset-2 col-md-4 pad-0">
        <div class="container__child signup__thumbnail" style="background-image: url(<?php echo e(asset('images/login/'.$auth_customize->image)); ?>);">
          <div class="thumbnail__logo">
            <?php if($logo != null): ?>
              <a href="<?php echo e(url('/')); ?>" title="<?php echo e($w_title); ?>"><img src="<?php echo e(asset('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>"></a>
            <?php endif; ?>
          </div>
          <div class="thumbnail__content text-center">
            <?php echo $auth_customize->detail; ?>

          </div>
          <!-- <div class="thumbnail__links">
            <ul class="list-inline m-b-0 text-center">
              <li><a href="#" target="_blank"><i class="fa fa-globe"></i></a></li>
              <li><a href="https://www.behance.net/" target="_blank"><fa class="fa fa-behance"></fa></a></li>
              <li><a href="https://github.com/" target="_blank"><i class="fa fa-github"></i></a></li>
              <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
            </ul>
          </div> -->
          <div class="signup__overlay"></div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 pad-0">
        <div class="container__child signup__form">
          <?php if(Session::has('success')): ?>
            
            <div class="alert alert-success">
              <?php echo e(Session::get('success')); ?>

            </div>

           <?php endif; ?>
            <?php if(Session::has('deleted')): ?>
            
            <div class="alert alert-danger">
              <?php echo e(Session::get('deleted')); ?>

            </div>

           <?php endif; ?>
          <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
              <label for="email">Email</label>
              <input id="email" type="text" class="form-control" name="email" placeholder="Please Enter Your Email" value="<?php echo e(old('email')); ?>" required autofocus>
              <?php if($errors->has('email')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
              <?php endif; ?>
            </div>
            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
              <label for="password">Password</label>
              <input id="password" type="password" class="form-control" name="password" placeholder="Please Enter Your Password" value="<?php echo e(old('password')); ?>">
              <?php if($errors->has('password')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
              <?php endif; ?>
            </div>
            <div class="remember form-group<?php echo e($errors->has('remember') ? ' has-error' : ''); ?>">
             <label><input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me</label>
            </div>
            <div class="m-t-lg">
              <input class="btn btn--form btn--form-login" type="submit" value="Login" />
              <?php
              $config=App\Config::first();
              ?>
              <div class="social-login">
                <?php if($config->fb_login==1): ?>
                <a href="<?php echo e(url('/auth/facebook')); ?>" class="btn btn--form btn--form-login fb-btn" title="Login With Facebook"><i class="fa fa-facebook-f"></i> Login With Facebook</a>
                <?php endif; ?>
                  <?php if($config->google_login==1): ?>
                <a href="<?php echo e(url('/auth/google')); ?>" class="btn btn--form btn--form-login gplus-btn" title="Login With Google"><i class="fa fa-google"></i> Login With Google</a>
                <?php endif; ?>
                  <?php if($config->gitlab_login==1): ?>
                 <a style="background: linear-gradient(270deg, #48367d 0%, #241842 100%);" href="<?php echo e(url('/auth/gitlab')); ?>" class="btn btn--form btn--form-login" title="Login With Gitlab"><i class="fa fa-gitlab"></i> Login With GitLab</a>
                 <?php endif; ?>
              </div>
              <a class="signup__link pull-left" href="<?php echo e(route('password.request')); ?>">Forgot Your Password?</a>
              <a class="signup__link pull-right" href="<?php echo e(url('register')); ?>">Not a Member ? Register Here</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <script type="text/javascript" src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script> <!-- bootstrap js -->
  <script type="text/javascript" src="<?php echo e(asset('js/jquery.popover.js')); ?>"></script> <!-- bootstrap popover js -->
  <script type="text/javascript" src="<?php echo e(asset('js/jquery.curtail.min.js')); ?>"></script> <!-- menumaker js -->
  <script type="text/javascript" src="<?php echo e(asset('js/jquery.scrollSpeed.js')); ?>"></script> <!-- owl carousel js -->
  <script type="text/javascript" src="<?php echo e(asset('js/custom-js.js')); ?>"></script>
</body>
</html>
