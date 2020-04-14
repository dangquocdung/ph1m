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
              <li><a href="https://www.behance.net/alexdevero" target="_blank"><fa class="fa fa-behance"></fa></a></li>
              <li><a href="https://github.com/alexdevero" target="_blank"><i class="fa fa-github"></i></a></li>
              <li><a href="https://twitter.com/alexdevero" target="_blank"><i class="fa fa-twitter"></i></a></li>
            </ul>
          </div> -->
          <div class="signup__overlay"></div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 pad-0">
        <div class="container__child signup__form">
          <form method="POST" action="<?php echo e(route('password.request')); ?>">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="token" value="<?php echo e($token); ?>">
            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
              <label for="email">Email</label>
              <input id="email" type="text" class="form-control" name="email" placeholder="Please Enter Your Email" value="<?php echo e($email or old('email')); ?>" required autofocus>
              <?php if($errors->has('email')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
              <?php endif; ?>
            </div>
            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
              <label for="password">New Password</label>
              <input id="password" type="password" class="form-control" name="password" placeholder="Please Enter Your New Password" required>
              <?php if($errors->has('password')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="password-confirm">Repeat Password</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Please Enter Your Password Again" required>
            </div>
            <div class="m-t-lg">
              <input class="btn btn--form btn--form-login" type="submit" value="Reset Password" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script> <!-- bootstrap js -->
  <script type="text/javascript" src="<?php echo e(asset('js/videojs-playlist-ui.min.js')); ?>"></script> <!-- videojs playlist js -->
  <script type="text/javascript" src="<?php echo e(asset('js/youtube-videojs.min.js')); ?>"></script> <!-- youtube video js -->
  <script type="text/javascript" src="<?php echo e(asset('js/jquery.popover.js')); ?>"></script> <!-- bootstrap popover js -->
  <script type="text/javascript" src="<?php echo e(asset('js/menumaker.js')); ?>"></script> <!-- menumaker js -->
  <script type="text/javascript" src="<?php echo e(asset('js/jquery.curtail.min.js')); ?>"></script> <!-- menumaker js -->
  <script type="text/javascript" src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script> <!-- owl carousel js -->
  <script type="text/javascript" src="<?php echo e(asset('js/jquery.scrollSpeed.js')); ?>"></script> <!-- owl carousel js -->
  <script type="text/javascript" src="<?php echo e(asset('js/TweenMax.min.js')); ?>"></script> <!-- animation gsap js -->
  <script type="text/javascript" src="<?php echo e(asset('js/ScrollMagic.min.js')); ?>"></script> <!-- custom js -->
  <script type="text/javascript" src="<?php echo e(asset('js/animation.gsap.min.js')); ?>"></script> <!-- animation gsap js -->
  <script type="text/javascript" src="<?php echo e(asset('js/debug.addIndicators.min.js')); ?>"></script> <!-- debug addIndicators js -->
  <script type="text/javascript" src="<?php echo e(asset('js/theme.js')); ?>"></script> <!-- custom js -->

  <script type="text/javascript" src="<?php echo e(asset('js/custom-js.js')); ?>"></script>
</body>
</html>
