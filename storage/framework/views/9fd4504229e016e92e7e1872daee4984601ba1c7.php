<?php $__env->startSection('title',"Search result for $searchKey"); ?>
<?php $__env->startSection('main-wrapper'); ?>
  <!-- main wrapper -->
  <?php
 $withlogin= App\Config::findOrFail(1)->withlogin;
           $auth=Auth::user();
             $subscribed = null;
           if(isset($auth)){
          
           
            
           
            
            if (isset($auth)) {

              $current_date = date("d/m/y");
                  
              $auth = Illuminate\Support\Facades\Auth::user();
              if ($auth->is_admin == 1) {
                $subscribed = 1;
              } else if ($auth->stripe_id != null) {
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                if(isset($invoices) && $invoices != null && count($invoices->data) > 0)
                
                {
                $user_plan_end_date = date("d/m/y", $invoice->lines->data[0]->period->end);
                $plans = App\Package::all();
                foreach ($plans as $key => $plan) {
                  if ($auth->subscriptions($plan->plan_id)) {
                   
                  if($current_date <= $user_plan_end_date)
                  {
                  
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
                  }
                }
              }
            }
         }
?>
  <section class="main-wrapper main-wrapper-single-movie-prime">
    <?php if(isset($filter_video)): ?>
      <?php if(count($filter_video) > 0): ?>

        <div class="container-fluid movie-series-section search-section">
           <?php if(isset($actor)): ?>
                       <div class="movie-series-block">
                <div class="row">
                  <div class="col-sm-3">

                    <div class="movie-series-img">
                      <?php if(!is_null($actor->image)): ?>
                        <img src="<?php echo e(asset('images/actors/'.$actor->image)); ?>" class="img-responsive actor_image" alt="genre-image">
                      <?php else: ?>
                        <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive actor_image" alt="genre-image">
                     
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-sm-7 pad-0">
                    <h5 class="movie-series-heading movie-series-name">
                        
                        <?php echo e($actor->name); ?>

                    
                    </h5>
                      <p>
                       <?php echo e($home_translations->where('key', 'Actor DOB')->first->value->value); ?>- <?php echo e($actor->DOB); ?> </p>
                    <p>
                       <?php echo e($home_translations->where('key', 'Actor Place Of Birth')->first->value->value); ?>- <?php echo e($actor->place_of_birth); ?> </p>
                   
                   
                    <p>
                    
                        <?php echo e($actor->biography); ?>

                    
                    </p>
                  </div>
                </div>
              </div>
          <h5 class="movie-series-heading"><?php echo e(count($filter_video)); ?> <?php echo e($home_translations->where('key', 'found for')->first->value->value); ?> "<?php echo e($searchKey); ?>"</h5>
          <div>
         
    
            <?php endif; ?>
            <?php $__currentLoopData = $filter_video->unique('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <?php
              
              if($subscribed==1 && $auth){
                if ($item->type == 'M')
                {
                  $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['movie_id', '=', $item->id],
                                                                           ])->first();
                } else {
                  $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['season_id', '=', $item->id],
                                                                           ])->first();
                }
              }
              ?>

            
              <div class="movie-series-block">
                <div class="row">
                  <div class="col-sm-3">

                    <div class="movie-series-img">
                      <?php if($item->type == 'M' && $item->thumbnail != null): ?>
                        <img src="<?php echo e(asset('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                      <?php elseif($item->type == 'M' && $item->thumbnail == null): ?>
                        <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                      <?php elseif($item->type == 'S'): ?>
                        <?php if($item->thumbnail != null): ?>
                          <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                        <?php elseif($item->tvseries->thumbnail != null): ?>
                          <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                        <?php else: ?>
                          <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                        <?php endif; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-sm-7 pad-0">
                    <h5 class="movie-series-heading movie-series-name">
                      <?php if($item->type == 'M'): ?>
                        <a href="<?php echo e(url('movie/detail', $item->id)); ?>"><?php echo e($item->title); ?></a>
                      <?php elseif($item->type == 'S'): ?>
                        <a href="<?php echo e(url('show/detail', $item->id)); ?>"><?php echo e($item->tvseries->title); ?></a>
                      <?php endif; ?>
                    </h5>
                    <ul class="movie-series-des-list">
                      <?php if($item->type == 'M'): ?>
                        <li><?php echo e($home_translations->where('key', 'TMDB Rating')->first->value->value); ?> <?php echo e($item->rating); ?></li>
                      <?php endif; ?>
                      <?php if($item->type == 'S'): ?>
                        <li><?php echo e($home_translations->where('key', 'TMDB Rating')->first->value->value); ?> <?php echo e($item->tvseries->rating); ?></li>
                      <?php endif; ?>
                      <li>
                        <?php if($item->type == 'M'): ?>
                          <?php echo e($item->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?>

                        <?php else: ?>
                         <?php echo e($popover_translations->where('key', 'season')->first->value->value); ?> <?php echo e($item->season_no); ?>

                        <?php endif; ?>
                      </li>
                      <?php if($item->type == 'M'): ?>
                        <li><?php echo e($item->released); ?></li>
                      <?php else: ?>
                        <li><?php echo e($item->publish_year); ?></li>
                      <?php endif; ?>
                      <li>
                        <?php if($item->type == 'M'): ?>
                          <?php echo e($item->maturity_rating); ?>

                        <?php else: ?>
                          <?php echo e($item->tvseries->maturity_rating); ?>

                        <?php endif; ?>
                      </li>
                      <?php if($item->subtitle == 1): ?>
                        <li>
                          <?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?>

                        </li>
                      <?php endif; ?>
                    </ul>
                    <p>
                      <?php if($item->type == 'M'): ?>
                        <?php echo e(str_limit($item->detail, 360)); ?>

                      <?php else: ?>
                        <?php if($item->detail != null || $item->detail != ''): ?>
                          <?php echo e($item->detail); ?>

                        <?php else: ?>
                          <?php echo e(str_limit($item->tvseries->detail, 360)); ?>

                        <?php endif; ?>
                      <?php endif; ?>
                    </p>
                     <?php if($subscribed==1 && $auth): ?>
                    <div class="des-btn-block des-in-list">
                      <?php if($item->type == 'M'): ?>
                       <?php if($item->video_link['iframeurl'] != null): ?>
                          
                              <a onclick="playoniframe('<?php echo e($item->video_link['iframeurl']); ?>','<?php echo e($item->id); ?>','movie')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                              </a>

                             <?php else: ?> 

                             <a href="<?php echo e(route('watchmovie', $item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                             </a>

                        <?php endif; ?>
                        <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                          
                          <a href="<?php echo e(route('watchTrailer',$item->id)); ?>" class="iframe btn btn-default">Watch Trailer</a>
                        <?php endif; ?>
                        <div id="wishlistelement">
                          <?php if(isset($wishlist_check->added)): ?>
                            <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                          <?php else: ?>
                            <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                          <?php endif; ?>
                        </div>

                      <?php else: ?>
                        <?php if(isset($item->episodes[0])): ?>
                           <?php if($item->episodes[0]->video_link->iframeurl !=""): ?>

                            <a href="#" onclick="playoniframe('<?php echo e($item->episodes[0]->video_link->iframeurl); ?>','<?php echo e($item->id); ?>','tv')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                             </a>

                             <?php else: ?> 
                            <a href="<?php echo e(route('watchTvShow', $item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                            <?php endif; ?>
                          <?php endif; ?>
                        <?php if(isset($wishlist_check->added)): ?>
                          <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                        <?php else: ?>
                  <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                        <?php endif; ?>
                      <?php endif; ?>
                    </div>
                    <?php else: ?>
                     <div class="des-btn-block des-in-list">
 <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                          
                          <a href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>" class="iframe btn btn-default">Watch Trailer</a>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      <?php else: ?>
        <div class="container-fluid movie-series-section search-section">
          <h5 class="movie-series-heading">0 <?php echo e($home_translations->where('key', 'found for')->first->value->value); ?> "<?php echo e($searchKey); ?>"</h5>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </section>
  <!-- end main wrapper -->
 



<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
  <script>
  var app = new Vue({
    el: '#wishlistelement',
    data: {
      result: {
        id: '',
        type: '',
      },
    },
    methods: {
      addToWishList(id, type) {
        this.result.id = id;
        this.result.type = type;
        this.$http.post('<?php echo e(route('addtowishlist')); ?>', this.result).then((response) => {
        }).catch((e) => {
          console.log(e);
        });
        this.result.item_id = '';
        this.result.item_type = '';
      }
    }
  });

    

    
    function playTrailer(url) {
      $('.video-player').css({
        "visibility" : "visible",
        "z-index" : "99999",
      });
      $('body').css({
        "overflow": "hidden"
      });
      $('#my_video').show();
      $('.vjs-control-bar').removeClass('hide-visible');
      let str = url;
      let youtube_slice_1 = str.slice(0, 14);
      let youtube_slice_2 = str.slice(0, 20);
      if (youtube_slice_1 == "https://youtu." || youtube_slice_2 == "https://www.youtube.")
      {
        $('.vjs-control-bar').addClass('hide-visible');
        player.src({ type: "video/youtube", src: url});
      } else {
        player.src({ type: "video/mp4", src: url});
      }

      setTimeout(function(){
        player.play();
      }, 300);
    }

    

    function addWish(id, type) {
      app.addToWishList(id, type);
      setTimeout(function() {
        $('.addwishlistbtn'+id+type).text(function(i, text){
          return text == "<?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?>" ? "<?php echo e($popover_translations->where('key', 'remove from watchlist')->first->value->value); ?>" : "<?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?>";
        });
      }, 100);
    }

</script>

<script>
      $(document).ready(function(){
        
        $(".group1").colorbox({rel:'group1'});
        $(".group2").colorbox({rel:'group2', transition:"fade"});
        $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
        $(".group4").colorbox({rel:'group4', slideshow:true});
        $(".ajax").colorbox();
        $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
        $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
        $(".iframe").colorbox({iframe:true, width:"100%", height:"100%"});
        $(".inline").colorbox({inline:true, width:"50%"});
        $(".callbacks").colorbox({
          onOpen:function(){ alert('onOpen: colorbox is about to open'); },
          onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
          onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
          onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
          onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
        });

        $('.non-retina').colorbox({rel:'group5', transition:'none'})
        $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
        
        
        $("#click").click(function(){ 
          $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
          return false;
        });
      });
    </script>

    <script>

      function playoniframe(url,id,type){
   $(document).ready(function(){
    var SITEURL = '<?php echo e(URL::to('')); ?>';
       $.ajax({
            type: "get",
            url: SITEURL + "/user/watchhistory/"+id+'/'+type,
            success: function (data) {
             console.log(data);
            },
            error: function (data) {
               console.log(data)
            }
        });
  
  });       
        $.colorbox({ href: url, width: '100%', height: '100%', iframe: true });
      }
      
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>