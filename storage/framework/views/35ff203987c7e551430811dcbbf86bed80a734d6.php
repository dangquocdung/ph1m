<?php $__env->startSection('title',"Watch History"); ?>
<?php $__env->startSection('main-wrapper'); ?>
<br>
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
  <?php if(isset($pusheditems) && count($pusheditems) > 0 ): ?>
          <div class="genre-prime-block">
           
            
            <div class="container-fluid">
              <h5 class="section-heading"> <?php echo e($header_translations->where('key', 'watch history') ? $header_translations->where('key', 'watch history')->first->value->value : ''); ?> </h5>
              <a href="<?php echo e(url('account/watchhistory/delete')); ?>"><button class=" btn btn-danger">Clear All</button></a>
              <div class="">
                <?php if(isset($pusheditems)): ?>

            

                  <?php $__currentLoopData = $pusheditems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                   <?php if($auth && $subscribed==1): ?>
                  
                    <?php
                     if ($item->type == 'M') {
                      $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                          ['user_id', '=', $auth->id],
                                                                          ['movie_id', '=', $item->id],
                                                                         ])->first();
                     }

                    if ($item->type == 'S') {
                       $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                        ['user_id', '=', $auth->id],
                                                                        ['season_id', '=', $item->id],
                                                                      ])->first();
                    }
                    ?>
                      <?php endif; ?>
                    
                  
                  <?php if($item->type == "M"): ?>
                   <?php if($item->status == 1): ?>
                  <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                        <div class="cus_img">
                          
                        
                      <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block<?php echo e($item->id); ?>">
                        <a href="<?php echo e(url('movie/detail',$item->id)); ?>">
                          <?php if($item->thumbnail != null || $item->thumbnail != ''): ?>
                            <img src="<?php echo e(asset('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                          <?php else: ?>

                            <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                          <?php endif; ?>
                        </a>
                      </div>
                       <?php echo Form::open(['method' => 'DELETE', 'action' => ['WatchController@moviedestroy', $item->id]]); ?>

                    <?php echo Form::submit("Remove", ["class" => "btn btn-danger"]); ?>

                <?php echo Form::close(); ?>

                      <div id="prime-next-item-description-block<?php echo e($item->id); ?>" class="prime-description-block">
                        <div class="prime-description-under-block">
                          <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                          <div class="item-rating">Rating <?php echo e($item->rating); ?></div>
                          <ul class="description-list">
                            <li><?php echo e($item->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                            <li><?php echo e($item->publish_year); ?></li>
                            <li><?php echo e($item->maturity_rating); ?></li>
                            <?php if($item->subtitle == 1): ?>
                              <li>
                               <?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?>

                              </li>
                            <?php endif; ?>
                          </ul>
                          <div class="main-des">
                            <p><?php echo e($item->detail); ?></p>
                            <a href="<?php echo e(url('movie/detail',$item->id)); ?>">Read more</a>
                          </div>
                          <?php if($subscribed==1 && $auth): ?>
                          <div class="des-btn-block">
                            <?php if($item->video_link['iframeurl'] != null): ?>
                          
                            <a onclick="playoniframe('<?php echo e($item->video_link['iframeurl']); ?>','<?php echo e($item->id); ?>','movie')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                            </a>

                            <?php else: ?> 
                              <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                            <?php endif; ?>
                           
                            <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                
                            <a class="iframe btn btn-default" href="<?php echo e(route('watchTrailer',$item->id)); ?>">Watch Trailer</a>

                            <?php endif; ?>
                            <?php if(isset($wishlist_check->added)): ?>
                              <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                            <?php else: ?>
                              <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                            <?php endif; ?>
                          </div>
                          <?php else: ?>
                          <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                          <div class="des-btn-block"> 
                            <a class="iframe btn btn-default" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>">Watch Trailer</a>
                          </div>
                           

                            <?php endif; ?>
                          <?php endif; ?>
                        </div>
                      </div>
                      </div>
                       
                    </div>
                    <?php endif; ?>
                    <?php elseif($item->type == "S"): ?>
                    <?php if($item->tvseries->status == 1): ?>
                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                      <div class="cus_img">
                        
                      
                  <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                      <a href="<?php echo e(url('show/detail',$item->id)); ?>">
                        <?php if($item->tvseries->thumbnail != null || $item->tvseries->thumbnail != ''): ?>
                          <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                        <?php else: ?>

                          <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                        <?php endif; ?>
                      </a>

                    </div>
 <?php echo Form::open(['method' => 'DELETE', 'action' => ['WatchController@showdestroy', $item->tvseries->id]]); ?>

                    <?php echo Form::submit("Remove", ["class" => "btn btn-danger"]); ?>

                <?php echo Form::close(); ?>

                    
                    <div id="prime-next-item-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                        <h5 class="description-heading"><?php echo e($item->tvseries->title); ?></h5>
                        <div class="movie-rating"><?php echo e($home_translations->where('key', 'TMDB Rating')->first->value->value); ?> <?php echo e($item->tvseries->rating); ?></div>
                        <ul class="description-list">
                          <li><?php echo e($popover_translations->where('key', 'season')->first->value->value); ?> <?php echo e($item->season_no); ?></li>
                          <li><?php echo e($item->publish_year); ?></li>
                          <li><?php echo e($item->tvseries->age_req); ?></li>
                          <?php if($item->subtitle == 1): ?>
                            <li>
                              <?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?>

                            </li>
                          <?php endif; ?>
                        </ul>
                        <div class="main-des">
                          <?php if($item->detail != null || $item->detail != ''): ?>
                            <p><?php echo e($item->detail); ?></p>
                          <?php else: ?>
                            <p><?php echo e($item->tvseries->detail); ?></p>
                          <?php endif; ?>
                          <a href="#"></a>
                        </div>
                        <?php if($subscribed==1 && $auth): ?>
                        <div class="des-btn-block">
                          <?php if(isset($item->episodes[0])): ?>
                            
                            <?php if($item->episodes[0]->video_link['iframeurl'] !=""): ?>

                            <a href="#" onclick="playoniframe('<?php echo e($item->episodes[0]->video_link['iframeurl']); ?>','<?php echo e($item->tvseries->id); ?>','tv')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                             </a>

                            <?php else: ?>
                            <a href="<?php echo e(route('watchTvShow',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                            <?php endif; ?>
                           
                          <?php endif; ?>
                          <?php if(isset($wishlist_check->added)): ?>
                            <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                          <?php else: ?>
                            <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?>

                            </a>
                          <?php endif; ?>
                        </div>
                        
                        <?php endif; ?>
                      </div>
                    </div>
                   
                     
                  </div>
                    <?php endif; ?>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>
                
              </div>
             <div class="col-md-12">
                <div align="center">
                   <?php echo $pusheditems->links(); ?>

                </div>
             </div>


            </div>
           
          </div>
          
        <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>

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
 <script>

   

    var app = new Vue({
      el: '.des-btn-block',
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

</script>

 <script>
     function addWish(id, type) {
      app.addToWishList(id, type);
      setTimeout(function() {
        $('.addwishlistbtn'+id+type).text(function(i, text){
          return text == "<?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?>" ? "<?php echo e($popover_translations->where('key', 'remove from watchlist')->first->value->value); ?>" : "<?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?>";
        });
      }, 100);
    }

  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>