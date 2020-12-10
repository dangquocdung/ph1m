
<!DOCTYPE html>
<!--
**********************************************************************************************************
    Copyright (c) 2019 .
    **********************************************************************************************************  -->
<!--
Template Name: Next Hour - Movie Tv Show & Video Subscription Portal Cms
Version: 2.7.0
Author: Media City
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<html lang="en">
<!-- <![endif]-->
<!-- head -->
<head>
<meta name="google-site-verification" content="googleeacc2166ce777ac3.html" />
  <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e($w_title); ?></title>
  <meta charset="utf-8" />
  
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta name="Description" content="<?php echo e($description); ?>" />
  <meta name="keyword" content="<?php echo e($w_title); ?>, <?php echo e($keyword); ?>">
  <meta name="MobileOptimized" content="320" />    
  <?php echo $__env->yieldContent('custom-meta'); ?>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"><!-- CSRF Token -->

  <link rel="icon" type="image/icon" href="<?php echo e(asset('images/favicon/favicon.png')); ?>"> <!-- favicon icon -->
  <link href="<?php echo e(asset('css/starrating.css')); ?>" rel="stylesheet" type="text/css"/> 
  <!-- Star Rating -->
  <!-- theme style -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> <!-- google font -->
  <link href="<?php echo e(asset('css/videojs-icons.css')); ?>" rel="stylesheet" type="text/css"/> <!-- google font -->
  <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
  <link href="https://vjs.zencdn.net/6.6.0/video-js.css" rel="stylesheet"> <!-- videojs css -->
  <link href="<?php echo e(asset('css/menumaker.css')); ?>" type="text/css" rel="stylesheet"> <!-- menu css -->
  <link href="<?php echo e(asset('css/owl.carousel.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- owl carousel css -->
  <link href="<?php echo e(asset('css/owl.theme.default.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- owl carousel css -->
  <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- fontawsome css -->
  <link href="<?php echo e(asset('css/popover.css')); ?>" rel="stylesheet" type="text/css"/> <!-- bootstrap popover css -->
  <link href="<?php echo e(asset('css/layers.css')); ?>" rel="stylesheet" type="text/css"/> <!-- revolution css -->
  <link href="<?php echo e(asset('css/navigation.css')); ?>" rel="stylesheet" type="text/css"/> <!-- revolution css -->
  <link href="<?php echo e(asset('css/pe-icon-7-stroke.css')); ?>" rel="stylesheet" type="text/css"/> <!-- revolution css -->
  <link href="<?php echo e(asset('css/settings.css')); ?>" rel="stylesheet" type="text/css"/> <!-- revolution css -->
  <link href="<?php echo e(asset('css/videojs-playlist-ui.vertical.css')); ?>" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="<?php echo e(url('css/colorbox.css')); ?>">
  <link rel="manifest" href="<?php echo e(asset('/manifest.json')); ?>"> <!-- bootstrap css -->

  
  
  <!-- videojs playlist ui css -->
  
  <?php if($color=='default'): ?>
  <?php if($color_dark==1): ?>
  
  <link href="<?php echo e(asset('css/style-light.css')); ?>" rel="stylesheet" type="text/css"/>
  <?php else: ?>
  <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css"/>
  
  <?php endif; ?>
  <?php elseif($color=='green'): ?>
  <?php if($color_dark==1): ?>
  
    <link href="<?php echo e(asset('css/style-light-green.css')); ?>" rel="stylesheet" type="text/css"/>
  <?php else: ?>
  
   <link href="<?php echo e(asset('css/style-green.css')); ?>" rel="stylesheet" type="text/css"/>
  <?php endif; ?>
  <?php elseif($color=='orange'): ?>
  <?php if($color_dark==1): ?>
  
     <link href="<?php echo e(asset('css/style-light-orange.css')); ?>" rel="stylesheet" type="text/css"/>
  <?php else: ?>
  
   <link href="<?php echo e(asset('css/style-orange.css')); ?>" rel="stylesheet" type="text/css"/>
  <?php endif; ?>
  <?php elseif($color=='yellow'): ?>
  <?php if($color_dark==1): ?>
  
    <link href="<?php echo e(asset('css/style-light-yellow.css')); ?>" rel="stylesheet" type="text/css"/>
  <?php else: ?>
  
   <link href="<?php echo e(asset('css/style-yellow.css')); ?>" rel="stylesheet" type="text/css"/>
  <?php endif; ?>
   <?php elseif($color=='red'): ?>
  <?php if($color_dark==1): ?>
  
    <link href="<?php echo e(asset('css/style-light-red.css')); ?>" rel="stylesheet" type="text/css"/>
  <?php else: ?>
  
   <link href="<?php echo e(asset('css/style-red.css')); ?>" rel="stylesheet" type="text/css"/>
  <?php endif; ?>
  <?php elseif($color=='pink'): ?>
  <?php if($color_dark==1): ?>
  
   <link href="<?php echo e(asset('css/style-light-pink.css')); ?>" rel="stylesheet" type="text/css"/>
  <?php else: ?>
  
    <link href="<?php echo e(asset('css/style-pink.css')); ?>" rel="stylesheet" type="text/css"/>
  <?php endif; ?>
  <?php endif; ?>
  
  <link href="<?php echo e(asset('css/custom-style.css')); ?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo e(asset('css/goto.css')); ?>" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="<?php echo e(asset('content/global.css')); ?>"><!-- go to top css -->
  <script src="https://js.stripe.com/v3/"></script> <!-- stripe script -->
  <script type="text/javascript" src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('java/FWDUVPlayer.js')); ?>"></script> <!-- jquery library js -->

   <script>

if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('<?php echo e(url('sw.js')); ?>')
        .then((reg) => {
          console.log('Service worker registered.', reg);
        });
  });
}
</script>
  <script>
    window.Laravel =  <?php echo json_encode([
      'csrfToken' => csrf_token(),
      ]); ?>
    </script>
    <script type="text/javascript" src="<?php echo e(asset('js/app.js')); ?>"></script> <!-- app library js -->
    <!-- notification icon style -->
    <style type="text/css">
     #ex4 .p1[data-count]:after{
      position:absolute;
      right:10%;
      top:8%;
      content: attr(data-count);
      font-size:40%;
      padding:.2em;
      border-radius:50%;
      line-height:1em;
      color: white;
      background:#c0392b;
      text-align:center;
      min-width: 1em;
      //font-weight:bold;
    }
  </style>
  <!-- end theme style -->

  <?php echo $__env->yieldContent('player-sc'); ?>

</head>
<!-- end head -->
<!--body start-->
<body>
  <!-- preloader -->
  <?php if($preloader == 1): ?>
  <div class="loading">
    <div class="logo">
      <img src="<?php echo e(asset('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>">
    </div>
    <div class="loading-text">
      <span class="loading-text-words">L</span>
      <span class="loading-text-words">O</span>
      <span class="loading-text-words">A</span>
      <span class="loading-text-words">D</span>
      <span class="loading-text-words">I</span>
      <span class="loading-text-words">N</span>
      <span class="loading-text-words">G</span>
    </div>
  </div>
  <?php endif; ?>
  <!-- end preloader -->
  <div class="body-overlay-bg"></div>

  <?php if(Session::has('added')): ?>
  <div id="sessionModal" class="sessionmodal rgba-green-strong z-depth-2">
    <i class="fa fa-check-circle"></i> <p><?php echo e(session('added')); ?></p>
  </div>
  <?php elseif(Session::has('updated')): ?>
  <div id="sessionModal" class="sessionmodal rgba-cyan-strong z-depth-2">
    <i class="fa fa-exclamation-triangle"></i> <p><?php echo e(session('updated')); ?></p>
  </div>
  <?php elseif(Session::has('deleted')): ?>
  <div id="sessionModal" class="sessionmodal rgba-red-strong z-depth-2">
    <i class="fa fa-window-close"></i> <p><?php echo e(session('deleted')); ?></p>
  </div>
  <?php endif; ?>
  <!-- preloader -->
  <div class="preloader">
    <div class="status">
      <div class="status-message">
      </div>
    </div>
  </div>

  <?php
  $subscribed = null;
  $withlogin= App\Config::findOrFail(1)->withlogin;
  $catlog = App\Config::findOrFail(1)->catlog;    
  if (isset($auth)) {
    $ps=App\PaypalSubscription::where('user_id',$auth->id)->first();

    if (isset($ps)) {

      $current_date = Illuminate\Support\Carbon::now();
      if (date($current_date) <= date($ps->subscription_to)) {
        if ($ps->package_id==0) {
          $nav_menus=App\Menu::all();
          $subscribed=1;
        }

      }

    }


    $current_date = date("d/m/y");

    $auth = Illuminate\Support\Facades\Auth::user();
    if ($auth->is_admin == 1) {
      $subscribed = 1;
      $nav_menus=App\Menu::orderBy('position','ASC')->get();
    } else if ($auth->stripe_id != null) {
      Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      $customer = Stripe\Customer::retrieve($auth->stripe_id);
      $invoices = $customer->invoices()->data[0];
      if(isset($invoices) && $invoices != null) 
      {
        $user_plan_end_date = date("d/m/y", $invoices->lines->data[0]->period->end);
        $plans = App\Package::all();
        foreach ($plans as $key => $plan) {
          if ($auth->subscribed($plan->name) && !$auth->subscription($plan->name)->cancelled()){

            if($current_date <= $user_plan_end_date)
            {
             if($auth->is_admin==0){
              $planmenus= DB::table('package_menu')->where('package_id', $plan->plan_id)->get();
             if(isset($planmenus)){ 
              foreach ($planmenus as $key => $value) {
                $menus[]=$value->menu_id;
              }
            }
            if(isset($menus)){ 
              $nav_menus=App\Menu::whereIn('id',$menus)->get();
            }
          }
          $subscribed = 1;
        }
      }
    } 
  }
} else if (isset($auth->paypal_subscriptions)) {  
//Check Paypal Subscription of user
  $last_payment = $auth->paypal_subscriptions->last();
  if (isset($last_payment) && $last_payment->status == 1) {
//check last date to current date
    $current_date = Illuminate\Support\Carbon::now();
    if (date($current_date) <= date($last_payment->subscription_to)) {
      $subscribed = 1;
      if($auth->is_admin==0){

        $packageid=App\PaypalSubscription::select('package_id')->where('user_id',$auth->id)->get();
        foreach($packageid as $package){
          $packagename=App\Package::select('plan_id')->where('id',$package->package_id)->get();
        }
        if(isset($packagename)){ foreach($packagename as $pn){
          $planmenus= DB::table('package_menu')->where('package_id', $pn->plan_id)->get();

        }}
        if(isset($planmenus)){ 
          foreach ($planmenus as $key => $value) {
            $menus[]=$value->menu_id;
          }
        }
        if(isset($menus)){ 
          $nav_menus=App\Menu::whereIn('id',$menus)->get();
        }
      }
    }
  }
}

}
$menuh=App\Menu::orderBy('position','ASC')->get();
$config=App\Config::first();
?>
<!-- end preloader -->
<!-- navigation -->
<div class="navigation">
  <div class="container-fluid nav-container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-2">
        <div class="nav-logo">

      
          <?php if($catlog==1 && $subscribed!=1): ?>
          <?php if(isset($logo) != null): ?>
          <?php $__currentLoopData = $menuh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(isset($menus) ? route('guests', strtolower($menus->slug)) : '#'); ?>" title="<?php echo e($w_title); ?>"><img src="<?php echo e(asset('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>"></a>
          <?php break; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
          <?php else: ?>

          <?php if(isset($nav_menus) && count($nav_menus) > 0): ?>
          <?php $__currentLoopData = $nav_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(isset($logo) != null): ?>

          <a href="<?php echo e(isset($menu) ? route('home', strtolower($menu->slug)) : '#'); ?>" title="<?php echo e($w_title); ?>"><img src="<?php echo e(asset('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>"></a>
          <?php break; ?>
          <?php else: ?>
          <a href="<?php echo e(route('home', $menu->slug)); ?>" title="<?php echo e($w_title); ?>"><img src="<?php echo e(asset('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>"></a>
          <?php break; ?>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
          <?php endif; ?>
          <?php if(($catlog==0 && $subscribed!=1) || ($catlog==0 && !Auth::user())): ?>

           <a href="#" title="<?php echo e($w_title); ?>"><img src="<?php echo e(asset('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>"></a>
          <?php endif; ?>
        </div>
      </div>

      
     <div class="col-md-4">
       <?php if($withlogin==1 && $catlog==1 && $subscribed!=1): ?>
        <div id="cssmenu">

          <?php if(isset($menuh) ): ?>
          <ul>
            <?php $__currentLoopData = $menuh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a class="<?php echo e(Nav::hasSegment($menus['slug'])); ?>" href="<?php echo e(url('/guest', $menus['slug'])); ?>"  title="<?php echo e($menus['name']); ?>">
              <?php echo e($menus->name); ?>

            </a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          <?php endif; ?>
        </div>


        <?php endif; ?>
        <?php if(auth()->guard()->check()): ?>
        <?php if($withlogin==0 && $catlog==1 && $subscribed!=1): ?>
        <div id="cssmenu">

          <?php if(isset($menuh) ): ?>
          <ul>
            <?php $__currentLoopData = $menuh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>
                <a class="<?php echo e(Nav::hasSegment($menus['slug'])); ?>" href="<?php echo e(url('/', $menus['slug'])); ?>"  title="<?php echo e($menus['name']); ?>">
                   <?php echo e($menus->name); ?>

                </a>
              </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          <?php endif; ?>

        </div>

        <?php else: ?>
        <?php if($subscribed == 1): ?>
          <div id="cssmenu">
            <?php if(isset($nav_menus) && count($nav_menus) > 0): ?>
            <ul>
              <?php $__currentLoopData = $nav_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                  <a class="<?php echo e(Nav::hasSegment($menu->slug)); ?>" href="<?php echo e(url('/', $menu->slug)); ?>"  title="<?php echo e($menu->name); ?>">
                     <?php echo e($menu->name); ?>

                  </a>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <?php endif; ?>
        <?php endif; ?>
     </div>

    
      <div class="col-sm-12 col-md-12 col-lg-6 pull-right">
        <div class="login-panel-main-block">
          <ul>
            <?php if(auth()->guard()->check()): ?>
            <?php if($subscribed == 1): ?>
            <li class="prime-search-block">
              <?php echo Form::open(['method' => 'GET', 'action' => 'HomeController@search', 'class' => 'search_form']); ?>

              <div class="aa-input-container" id="aa-input-container">
                <?php echo Form::text('search', null, ['class' => 'search-input', 'placeholder' => 'Search','required']); ?>

                <button type="submit" class="search-button"><i class="fa fa-search"></i>
                </button>
              </div>
              <?php echo Form::close(); ?>

            </li>
            <!-- notificaion -->
            <li> <div id="ex4" class="dropdown prime-dropdown">

              <span class="p1 fa-stack fa-2x has-badge dropdown-toggle" type="button" data-toggle="dropdown" data-count="<?php echo e(auth()->user()->unreadnotifications->count()); ?>">

                <i class="p3 fa fa-bell fa-stack-1x xfa-inverse" data-count="4b"></i>

              </span>

              <ul class="dropdown-menu prime-dropdown-menu">


                <?php $__currentLoopData = auth()->user()->unreadnotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <li>
                  <?php
                  $tv=null;$movie=null;$tvname=null;$moviename=null;
                  if(isset($n->tv_id) && !is_null($n->tv_id)){
                    $season=App\Season::where('id',$n->tv_id)->first();
                    if(isset($season)){
                      $tv=App\TvSeries::findOrFail($season->tv_series_id);
                    }
                  }
                  if(isset($n->movie_id) && !is_null($n->movie_id)){
                    $movie=App\Movie::where('id',$n->movie_id)->get();
                    if(isset($movie)){
                      foreach($movie as $m){
                        $moviename=$m->title;
                      }

                    }
                  }
                  ?>
                  <div id="notification_id" onclick="readed('<?php echo e($n->id); ?>')" class="card" style="padding: 6px;" >
                    <p style="color: #2980b9; font-size: 17px; padding: 3px;"><b> <?php echo e($n->title); ?></b></p>
                    <p style="margin-top: -6px; font-size: 16px;"> <?php echo e($n->data['data']); ?> &nbsp 
                      <?php if(isset($tv)): ?>
                      <a type="button" href="<?php echo e(url('show/detail',$season->id)); ?>" style="font-size: 16px; color:  #a9ea81">
                        <b> "<?php echo e($tv->title); ?>"</b></a>
                        <?php endif; ?> 
                        &nbsp
                        <?php if(isset($moviename)): ?>
                        <a type="button" href="<?php echo e(url('movie/detail', $n->movie_id)); ?>" style="font-size: 16px;color: #a9ea81">
                          <b> "<?php echo e($moviename); ?>"</b>
                        </a> <?php endif; ?> 
                      </p>

                    </div>
                    <hr style="margin-top: 1px;">
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div> 
            </li>
            <?php endif; ?>
            <?php if(isset($languages) && count($languages) > 0): ?>

                  <?php if(count($languages)!=1): ?>
            <li class="sign-in-block language-switch-block">
              <div class="dropdown prime-dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-globe"></i> <?php echo e(Session::has('changed_language') ? ucfirst(Session::get('changed_language')) : ''); ?></button>
                <span class="caret caret-one"></span></button>
                <ul class="dropdown-menu prime-dropdown-menu">
                
                   <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <li>

                    <a href="<?php echo e(route('languageSwitch', $language->local)); ?>">
                      <?php echo e($language->name); ?> 
                    </a>
                  </li>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </ul>
              </div>
            </li>
            <?php endif; ?>
            <?php endif; ?>
            <li class="sign-in-block">
              <div class="dropdown prime-dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-user-circle"></i> <?php if(Session::has('nickname')): ?> <?php echo e(Session::get('nickname')); ?> <?php else: ?> <?php echo e($auth ? $auth->name : ''); ?> <?php endif; ?>
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu prime-dropdown-menu">
                    <?php if($auth->is_admin == 1): ?>
                    <li><a href="<?php echo e(url('admin')); ?>" target="_blank">Admin <?php echo e($header_translations->where('key', 'dashboard') ? $header_translations->where('key', 'dashboard')->first->value->value : ''); ?></a></li>
                    
                    <?php endif; ?>
                     <?php if($auth->is_assistant == 1): ?>
                    <li>

                      <a href="<?php echo e(url('admin/movies')); ?>" target="_blank">Manager <?php echo e($header_translations->where('key', 'dashboard') ? $header_translations->where('key', 'dashboard')->first->value->value : ''); ?></a>
                     </li>
                    
                    <?php endif; ?>
                    <?php if(isset($nav_menus)): ?>
                    <?php if($catlog==1): ?>
                    <?php if($subscribed == 1): ?>
                     <?php $__currentLoopData = $nav_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a href="<?php echo e(url('account/watchlist', $menu->slug)); ?>" class="active"><?php echo e($header_translations->where('key', 'watchlist')->first->value->value); ?></a></li>
                    <?php break; ?>;
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <li><a href="<?php echo e(route('watchhistory')); ?>" ><?php echo e($header_translations->where('key', 'watch history') ? $header_translations->where('key', 'watch history')->first->value->value : ''); ?></a></li>
                    <?php else: ?>
                    <li><a href="<?php echo e(url('account/purchaseplan')); ?>">Subscribe</a></li>
                    <?php endif; ?>
                    <?php else: ?>
                    <li><a href="<?php echo e(url('account/watchlist', $menu->slug)); ?>" class="active"><?php echo e($header_translations->where('key', 'watchlist')->first->value->value); ?></a></li>
                     <li><a href="<?php echo e(route('watchhistory')); ?>" ><?php echo e($header_translations->where('key', 'watch history') ? $header_translations->where('key', 'watch history')->first->value->value : ''); ?></a></li>
                    <?php endif; ?>

                    <?php endif; ?>
                    <li><a href="<?php echo e(url('account')); ?>"><?php echo e($header_translations->where('key', 'dashboard') ? $header_translations->where('key', 'dashboard')->first->value->value : ''); ?></a></li>
                     <?php if(isset(Auth::user()->paypal_subscriptions) && $subscribed == 1 && $config->blog==1): ?>
                    <li><a href="<?php echo e(url('account/blog')); ?>">Blog</a></li>
                 <?php endif; ?>
                    <?php if(isset(Auth::user()->paypal_subscriptions) && $subscribed == 1): ?>
                    <li><a href="<?php echo e(url('/manageprofile/mus/'.Auth::user()->id)); ?>">Manage Profiles</a></li>
                    <?php endif; ?>
                    <?php
                    $data=App\Config::findOrFail(1);
                    $donation= $data->donation;
                    $donation_link=$data->donation_link;
                    ?>
                    <?php if(!is_null($donation) && !is_null($donation_link) && $donation==1): ?>
                    <li><a target="_blank" href="<?php echo e($donation_link); ?>"><?php echo e($header_translations->where('key', 'donation') ? $header_translations->where('key', 'donation')->first->value->value : ''); ?></a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo e(url('faq')); ?>"><?php echo e($header_translations->where('key', 'faqs') ? $header_translations->where('key', 'faqs')->first->value->value : ''); ?></a></li>
                    <li>
                      <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       <?php echo e($header_translations->where('key', 'sign out') ? $header_translations->where('key', 'sign out')->first->value->value : ''); ?>

                     </a>
                     <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                      <?php echo e(csrf_field()); ?>

                    </form>
                  </li>
                </ul>
              </div>
            </li>
            <?php else: ?>

            <li class="sign-in-block sign-in-block-one sign-in-block-two mrgn-rt-20"><a class="sign-in" href="<?php echo e(url('login')); ?>"><i class="fa fa-sign-in"></i> <?php echo e($header_translations->where('key', 'sign in') ? $header_translations->where('key', 'sign in')->first->value->value : ''); ?></a></li>
            <li class="sign-in-block sign-in-block-one "><a class="sign-in" href="<?php echo e(url('register')); ?>"><i class="fa fa-user-plus"></i> <?php echo e($header_translations->where('key', 'register') ? $header_translations->where('key', 'register')->first->value->value : ''); ?></a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div>
 <?php if($auth): ?>
 <?php if($subscribed!=1): ?>
 <div style="
 position: -webkit-sticky;
 position: sticky;
 top: 0;
 width: 100%;
 background-color: #c0392b;
 color: white;
 text-align: center;" >
 <p>Please Subscribe to a Plan. &nbsp<a href="<?php echo e(url('account/purchaseplan')); ?>" style="color: #1B1464;">Click Here</a></p>
</div>
<?php endif; ?>
<?php endif; ?>



<!-- end navigation -->
<?php echo $__env->yieldContent('main-wrapper'); ?>
<!-- footer -->
<?php if($prime_footer == 1): ?>
<footer id="prime-footer" class="prime-footer-main-block">
  <div class="container-fluid">
    <div style="height:0px;">
      <a id="back2Top" title="Back to top" href="#">&#10148;</a>
    </div>
    <div class="logo">
      <img src="<?php echo e(asset('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>">
    </div>

    <div class="text-center">
      <?php
      $si = App\SocialIcon::first();
      ?>
      <div class="footer-widgets social-widgets social-btns">
        <ul>
          <li><a href="<?php echo e($si->url1); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li><a href="<?php echo e($si->url2); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <li><a href="<?php echo e($si->url3); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
        </ul>
      </div>
    </div>
    <?php
    $config=App\Config::first();
    $isplay=$config->is_playstore;
    $isappstore=$config->is_appstore;
    $appstore=$config->appstore;
    $playstore=$config->playstore;
    ?>
    <div class="text-center">
      <div class="footer-widgets social-widgets social-btns">
        <ul>
         <?php if($isappstore==1): ?>
         <li> <a href="<?php echo e($appstore); ?>" target="_blank"> <img width="12%" height="12%" src="<?php echo e(asset('images/app_store_download.png')); ?>"></a></li>
         <?php endif; ?>
         <?php if($isplay==1): ?>
         <li>
           <a href="<?php echo e($playstore); ?>"  target="_blank"> <img  width="12%" height="12%" src="<?php echo e(asset('images/google_play_download.png')); ?>"></a>
         </li>
         <?php endif; ?>
       </ul>
     </div>
   </div>

   <div class="copyright">
    <ul>
      <li>
        <?php if(isset($copyright)): ?>
        &copy;<?php echo e(date('Y')); ?> <?php echo $copyright; ?>

        <?php endif; ?>
      </li>
    </ul>
    <ul>
      <li><a href="<?php echo e(url('terms_condition')); ?>"><?php echo e($footer_translations->where('key', 'terms and condition') ? $footer_translations->where('key', 'terms and condition')->first->value->value : ''); ?></a></li>
      <li><a href="<?php echo e(url('privacy_policy')); ?>"><?php echo e($footer_translations->where('key', 'privacy policy') ? $footer_translations->where('key', 'privacy policy')->first->value->value : ''); ?></a></li>
      <li><a href="<?php echo e(url('refund_policy')); ?>"><?php echo e($footer_translations->where('key', 'refund policy') ? $footer_translations->where('key', 'refund policy')->first->value->value : ''); ?></a></li>
      <li><a href="<?php echo e(url('faq')); ?>"><?php echo e($footer_translations->where('key', 'help') ? $footer_translations->where('key', 'help')->first->value->value : ''); ?></a></li>
      <li><a href="<?php echo e(url('contactus')); ?>">Contact us</a></li>



    </ul>




  </div>
</div>
</div>
</footer>
<?php else: ?>
<footer id="footer-main-block" class="footer-main-block">
  <div class="pre-footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="footer-logo footer-widgets">
            <?php if(isset($logo)): ?>
            <img src="<?php echo e(asset('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>">
            <?php endif; ?>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="footer-widgets">
            <div class="row">
              <div class="col-md-6">
                <div class="footer-links-block">
                  <h4 class="footer-widgets-heading"><?php echo e($footer_translations->where('key', 'corporate') ? $footer_translations->where('key', 'corporate')->first->value->value : ''); ?></h4>
                  <ul>
                    <li><a href="<?php echo e(url('terms_condition')); ?>"><?php echo e($footer_translations->where('key', 'terms and condition') ? $footer_translations->where('key', 'terms and condition')->first->value->value : ''); ?></a></li>
                    <li><a href="<?php echo e(url('privacy_policy')); ?>"><?php echo e($footer_translations->where('key', 'privacy policy') ? $footer_translations->where('key', 'privacy policy')->first->value->value : ''); ?></a></li>
                    <li><a href="<?php echo e(url('refund_policy')); ?>"><?php echo e($footer_translations->where('key', 'refund policy') ? $footer_translations->where('key', 'refund policy')->first->value->value : ''); ?></a></li>
                    <li><a href="<?php echo e(url('faq')); ?>"><?php echo e($footer_translations->where('key', 'help') ? $footer_translations->where('key', 'help')->first->value->value : ''); ?></a></li>

                  </ul>
                </div>
              </div>
              <div class="col-md-6">
                <div class="footer-links-block">
                  <h4 class="footer-widgets-heading"><?php echo e($footer_translations->where('key', 'sitemap') ? $footer_translations->where('key', 'sitemap')->first->value->value : ''); ?></h4>
                  <ul>
                   
                    <?php
                      $memu = App\Menu::all();
                    ?>
                    <?php if(isset($memu)): ?>
                      <?php $__currentLoopData = $memu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($value->slug != null ||$value->slug != ''): ?>  
                              <?php $mySlug = $value->slug; ?>
                               <li><a href="<?php echo e(url($mySlug)); ?>"><?php echo e($value->name); ?></a></li>
                        <?php endif; ?>      
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="footer-widgets subscribe-widgets">
            <h4 class="footer-widgets-heading"><?php echo e($footer_translations->where('key', 'subscribe') ? $footer_translations->where('key', 'subscribe')->first->value->value : ''); ?></h4>
            <p class="subscribe-text"><?php echo e($footer_translations->where('key', 'subscribe text') ? $footer_translations->where('key', 'subscribe text')->first->value->value : ''); ?></p>
            <?php echo Form::open(['method' => 'POST', 'action' => 'emailSubscribe@subscribe']); ?>

            <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <input type="email" name="email" class="form-control subscribe-input" placeholder="Enter your e-mail">
              <button type="submit" class="subscribe-btn"><i class="fa fa-long-arrow-alt-right"></i></button>
            </div>
            <?php echo Form::close(); ?>

          </div>
        </div>
        <div class="col-md-2">
          <?php
          $si = App\SocialIcon::first();
          ?>
          <div class="footer-widgets social-widgets social-btns">
            <ul>
              <li><a href="<?php echo e($si->url1); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="<?php echo e($si->url2); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="<?php echo e($si->url3); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
              <?php
              $config=App\Config::first();
              $isplay=$config->is_playstore;
              $isappstore=$config->is_appstore;
              $appstore=$config->appstore;
              $playstore=$config->playstore;
              ?>
              
              <?php if($isappstore==1): ?>
              <li> <a href="<?php echo e($appstore); ?>" target="_blank"> <img width="72%" height="72%" src="<?php echo e(asset('images/app_store_download.png')); ?>"></a></li>
              <?php endif; ?>
              <?php if($isplay==1): ?>
              <li>
               <a href="<?php echo e($playstore); ?>"  target="_blank"> <img  width="72%" height="72%" src="<?php echo e(asset('images/google_play_download.png')); ?>"></a>
             </li>
             <?php endif; ?>
             
           </ul>
         </div>
       </div>
     </div>
   </div>

 </div>

 <div class="container-fluid">
  <div class="copyright-footer">
    <?php if(isset($copyright)): ?>
   &copy;<?php echo e(date('Y')); ?> <?php echo $copyright; ?>

    <?php endif; ?>
  </div>
</div>
</footer>
<?php endif; ?>
<!-- end footer -->
<!-- jquery -->
<script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script> <!-- bootstrap js -->
<script type="text/javascript" src="<?php echo e(asset('js/playlist.js')); ?>"></script> <!-- playlist js -->
<script type="text/javascript" src="<?php echo e(asset('js/youtube-videojs.min.js')); ?>"></script> <!-- youtube video js -->
<script type="text/javascript" src="<?php echo e(asset('js/videojs-hls.js')); ?>"></script> <!-- videojs hls js -->
<script type="text/javascript" src="<?php echo e(asset('js/vimeo.min.js')); ?>"></script> <!-- vimeo video js -->
<script type="text/javascript" src="<?php echo e(asset('js/jquery.popover.js')); ?>"></script> <!-- bootstrap popover js -->
<script type="text/javascript" src="<?php echo e(asset('js/menumaker.js')); ?>"></script> <!-- menumaker js -->
<script type="text/javascript" src="<?php echo e(asset('js/jquery.curtail.min.js')); ?>"></script> <!-- menumaker js -->
<script type="text/javascript" src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script> <!-- owl carousel js -->
<script type="text/javascript" src="<?php echo e(asset('js/jquery.scrollSpeed.js')); ?>"></script> <!-- owl carousel js -->
<script type="text/javascript" src="<?php echo e(asset('js/TweenMax.min.js')); ?>"></script> <!-- animation gsap js -->
<script type="text/javascript" src="<?php echo e(asset('js/ScrollMagic.min.js')); ?>"></script> <!-- custom js -->
<script type="text/javascript" src="<?php echo e(asset('js/videojs-playlist-ui.min.js')); ?>"></script> <!-- videojs playlist js -->
<script type="text/javascript" src="<?php echo e(asset('js/animation.gsap.min.js')); ?>"></script> <!-- animation gsap js -->
<script type="text/javascript" src="<?php echo e(asset('js/debug.addIndicators.min.js')); ?>"></script> <!-- debug addIndicators js -->
<script type="text/javascript" src="<?php echo e(asset('js/modernizr-custom.js')); ?>"></script> <!-- debug addIndicators js -->
<script type="text/javascript" src="<?php echo e(asset('js/theme.js')); ?>"></script> <!-- custom js -->
<script type="text/javascript" src="<?php echo e(asset('js/custom-js.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/colorbox.js')); ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
<!-- end jquery -->
<?php echo $__env->yieldContent('custom-script'); ?>
<script>

if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('<?php echo e(url('sw.js')); ?>')
        .then((reg) => {
          console.log('Service worker registered.', reg);
        });
  });
}
</script>
<script>
  (function($) {
// Session Popup
$('.sessionmodal').addClass("active");
setTimeout(function() {
  $('.sessionmodal').removeClass("active");
}, 7000);

if (window.location.hash == '#_=_'){
  history.replaceState
  ? history.replaceState(null, null, window.location.href.split('#')[0])
  : window.location.hash = '';
}
})(jQuery);
</script>

<?php if($google): ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo e($google); ?>', 'auto');
  ga('send', 'pageview');

</script>
<?php endif; ?>
<?php if($fb): ?>
<!-- facebook pixel -->
<script>
  !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
      document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '<?php echo e($fb); ?>');
    fbq('track', 'PageView');
  </script>
  <!--End facebook pixel -->
  <?php endif; ?>

  <?php if($rightclick == 1): ?>
  <script type="text/javascript" language="javascript">
// Right click disable
$(function() {
  $(this).bind("contextmenu", function(inspect) {
    inspect.preventDefault();
  });
});
// End Right click disable
</script>
<?php endif; ?>

<?php if($inspect == 1): ?>
<script type="text/javascript" language="javascript">
//all controller is disable
$(function() {
  var isCtrl = false;
  document.onkeyup=function(e){
    if(e.which == 17) isCtrl=false;
  }

  document.onkeydown=function(e){
    if(e.which == 17) isCtrl=true;
    if(e.which == 85 && isCtrl == true) {
      return false;
    }
  };
  $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
          return false;
        }
      else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
        return false;
      }
    });
});
// end all controller is disable
</script>
<?php endif; ?>


<?php if($goto==1): ?>
<script type="text/javascript">
 // go to top
 $(window).scroll(function() {
  var height = $(window).scrollTop();
  if (height > 100) {
    $('#back2Top').fadeIn();
  } else {
    $('#back2Top').fadeOut();
  }
});
 $(document).ready(function() {
  $("#back2Top").click(function(event) {
    event.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
  });

});
// end go to top
</script>
<?php endif; ?>
<script type="text/javascript">
 function readed(id){

   $.ajax({
    type : 'GET',
    data : { id:id },
    url  : '<?php echo e(url('/user/notification/read')); ?>/'+id,
    success :function(data){
      console.log(data);
    }
  });
 }
 
</script>
<?php echo $__env->yieldContent('script'); ?>
</body>
<!--body end -->
</html>
