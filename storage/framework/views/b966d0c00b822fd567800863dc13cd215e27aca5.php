 <?php
 
  $withlogin= App\Config::findOrFail(1)->withlogin;
   $configs= App\Config::findOrFail(1);
           $auth=Auth::user();
             $subscribed = null;
         
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
         
 ?>
<?php if(isset($movie)): ?>
<?php $__env->startSection('custom-meta'); ?>
<meta name="Description" content="<?php echo e($movie->description); ?>" />
<meta name="keyword" content="<?php echo e($movie->title); ?>, <?php echo e($movie->keyword); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',"$movie->title"); ?>
<?php elseif($season): ?>

<?php
 $title = $season->tvseries->title;
 ?>
<?php $__env->startSection('custom-meta'); ?>
<meta name="Description" content="<?php echo e($season->tvseries->description); ?>" />
<meta name="keyword" content="<?php echo e($season->tvseries->title); ?>, <?php echo e($season->tvseries->keyword); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title',"$title"); ?>

<?php endif; ?>
<?php $__env->startSection('main-wrapper'); ?>
<!-- main wrapper -->
  <section class="main-wrapper main-wrapper-single-movie-prime">
    <div class="background-main-poster-overlay">
      
<!-- Modal -->
<div id="ageModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header text-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Age Restricted Video</h4>
      </div>
       <?php echo Form::open(['method' => 'POST', 'action' => 'UsersController@update_age']); ?>

      <div class="modal-body">
        <h6 style="color: #e74c3c">This is an Age Restricted Video. Please Provide Your Date of Birth</h6><br>
  
              
           <div class="search form-group<?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
                <?php echo Form::label('dob', 'Date Of Birth'); ?>


                <input type="date" class="form-control"  name="dob"  />   
                <small class="text-danger"><?php echo e($errors->first('dob')); ?></small>
              </div>
            
            
        
      </div>
      <div class="modal-footer">
        <div class="pull-right">      
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
      </div>
     <?php echo Form::close(); ?>

    </div>

  </div>
</div>
<!-- Modal -->
<div id="ageWarningModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header text-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Age Restricted Video</h4>
      </div>
      <div class="modal-body">
        <h5 style="color: #c0392b">Sorry! This is Age Restricted Video. You are Not Allowed to Wactch</h5>
      </div>


      </div>
      <div class="modal-footer">
       
      </div>
     <?php echo Form::close(); ?>

    </div>

  </div>

      <?php if(isset($movie)): ?>
        <?php if($movie->poster != null): ?>
          <div class="background-main-poster col-md-offset-4 col-md-6" style="background-image: url('<?php echo e(asset('images/movies/posters/'.$movie->poster)); ?>');">
        <?php else: ?>
          <div class="background-main-poster col-md-offset-4 col-md-6" style="background-image: url('<?php echo e(asset('images/default-poster.jpg')); ?>');">
        <?php endif; ?>
      <?php endif; ?>
      <?php if(isset($season)): ?>
        <?php if($season->poster != null): ?>
          <div class="background-main-poster col-md-offset-4 col-md-6" style="background-image: url('<?php echo e(asset('images/tvseries/posters/'.$season->poster)); ?>');">
        <?php elseif($season->tvseries->poster != null): ?>
          <div class="background-main-poster col-md-offset-4 col-md-6" style="background-image: url('<?php echo e(asset('images/tvseries/posters/'.$season->tvseries->poster)); ?>');">
        <?php else: ?>
          <div class="background-main-poster col-md-offset-4 col-md-6" style="background-image: url('<?php echo e(asset('images/default-poster.jpg')); ?>');">
        <?php endif; ?>
      <?php endif; ?>
      </div>
      <div class="overlay-bg gredient-overlay-right"></div>
      <div class="overlay-bg"></div>
    </div>
    <div id="full-movie-dtl-main-block" class="full-movie-dtl-main-block">
      <div class="container-fluid">
        <?php if(isset($movie)): ?>
          <?php
            $subtitles = collect();
            if ($movie->subtitle == 1) {
              $subtitle_list = explode(',', $movie->subtitle_list);
              for($i = 0; $i < count($subtitle_list); $i++) {
                try {
                  $subtitle = \App\AudioLanguage::find($subtitle_list[$i])->language;
                  $subtitles->push($subtitle);
                } catch (Exception $e) {
                }
              }
            }
            $a_languages = collect();
            if ($movie->a_language != null) {
              $a_lan_list = explode(',', $movie->a_language);
              for($i = 0; $i < count($a_lan_list); $i++) {
                try {
                  $a_language = \App\AudioLanguage::find($a_lan_list[$i])->language;
                  $a_languages->push($a_language);
                } catch (Exception $e) {
                }
              }
            }
 if(isset($auth)){
            $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                        ['user_id', '=', $auth->id],
                                                                        ['movie_id', '=', $movie->id],
                                                                       ])->first();
                                                                     }
            // Directors list of movie from model
            $directors = collect();
            if ($movie->director_id != null) {
              $p_directors_list = explode(',', $movie->director_id);
              for($i = 0; $i < count($p_directors_list); $i++) {
                try {
                  $p_director = \App\Director::find($p_directors_list[$i])->name;
                  $directors->push($p_director);
                } catch (Exception $e) {

                }
              }
            }

            // Actors list of movie from model
            $actors = collect();
            if ($movie->actor_id != null) {
              $p_actors_list = explode(',', $movie->actor_id);
              for($i = 0; $i < count($p_actors_list); $i++) {
                try {
                  $p_actor = \App\Actor::find($p_actors_list[$i])->name;
                  $actors->push($p_actor);
                } catch (Exception $e) {

                }
              }
            }

            // Genre list of movie from model
            $genres = collect();
            if (isset($movie->genre_id)){
              $genre_list = explode(',', $movie->genre_id);
              for ($i = 0; $i < count($genre_list); $i++) {
                try {
                  $genre = \App\Genre::find($genre_list[$i])->name;
                  $genres->push($genre);
                } catch (Exception $e) {

                }
              }
            }

          ?>
          <div class="row">
            <div class="col-md-8">
              <div class="full-movie-dtl-block">
                <h2 class="section-heading"><?php echo e($movie->title); ?></h2>
                <div class="imdb-ratings-block">
                  <ul>
                    <li><?php echo e($movie->publish_year); ?></li>
                     <?php if($movie->live!=1): ?>
                    <li><?php echo e($movie->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                    <?php endif; ?>
                    <li><?php echo e($movie->maturity_rating); ?></li>
                     <?php if($movie->live!=1): ?>
                    <li><?php echo e($home_translations->where('key', 'TMDB Rating')->first->value->value); ?> <?php echo e($movie->rating); ?></li>
                    <?php endif; ?>
                    <?php if($movie->subtitle == 1 && isset($subtitles)): ?>
                      <li>CC</li>
                      <li>
                        <?php for($i = 0; $i < count($subtitles); $i++): ?>
                          <?php if($i == count($subtitles)-1): ?>
                            <?php echo e($subtitles[$i]); ?>

                          <?php else: ?>
                            <?php echo e($subtitles[$i]); ?>,
                          <?php endif; ?>
                        <?php endfor; ?>
                      </li>
                    <?php endif; ?>

                    <li><i title="views" class="fa fa-eye"></i> <?php echo e(views($movie)
                      ->unique()
                      ->count()); ?></li>
                  </ul>
                </div>
                 <?php if(auth()->guard()->check()): ?>
                  <?php if($configs->user_rating==1): ?>
                <?php
                $uid=Auth::user()->id;
                $rating=App\UserRating::where('user_id',$uid)->
                where('movie_id',$movie->id)->first();
                $avg_rating=App\UserRating::where('movie_id',$movie->id)->avg('rating');
                ?>
                   <h6><?php echo e($header_translations->where('key', 'average rating') ? $header_translations->where('key', 'average rating')->first->value->value : ''); ?>  <span style="margin-left: 10px;"><?php echo e(number_format($avg_rating, 2)); ?></span></h6>
                    <?php echo Form::open(['method' => 'POST', 'id'=>'formrating', 'action' => 'UserRatingController@store']); ?>

                  <input type="text" hidden="" name="movie_id" value="<?php echo e($movie->id); ?>">
                    <input type="text" hidden="" name="user_id" value="<?php echo e($auth->id); ?>">
                  <input id="rating" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" onmouseover="mouseoverrating()" value="<?php echo e(isset($rating)? $rating->rating: 2); ?>">
                  <button type="submit" hidden="" id="submitrating"> Submit Rating</button>
                  <?php echo Form::close(); ?> 
                  <a href="javascript:video(0)" onclick="myrate()">Give Rating</a>
                  <button onclick="myrate()">Click me</button>
                  <?php endif; ?>
                 <?php endif; ?>
                <p>
                  <?php echo e($movie->detail); ?>

                </p>
              </div>
              <div class="screen-casting-dtl">
                <ul class="casting-headers">
                   <?php if($movie->live!=1): ?>
                  <li><?php echo e($home_translations->where('key', 'directors')->first->value->value); ?></li>
                  <li><?php echo e($home_translations->where('key', 'starring')->first->value->value); ?></li>
                  <?php endif; ?>
                  <li><?php echo e($home_translations->where('key', 'genres')->first->value->value); ?></li>
                  <li><?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?></li>
                  <li><?php echo e($home_translations->where('key', 'audio languages')->first->value->value); ?></li>
                </ul>
                <ul class="casting-dtl">
                   <?php if($movie->live!=1): ?>
                  <li>
                    <?php if(count($directors) > 0): ?>
                      <?php for($i = 0; $i < count($directors); $i++): ?>
                        <?php if($i == count($directors)-1): ?>
                          <a href="<?php echo e(url('video/detail/director_search', trim($directors[$i]))); ?>"><?php echo e($directors[$i]); ?></a>
                        <?php else: ?>
                          <a href="<?php echo e(url('video/detail/director_search', trim($directors[$i]))); ?>"><?php echo e($directors[$i]); ?></a>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if(count($actors) > 0): ?>
                      <?php for($i = 0; $i < count($actors); $i++): ?>
                        <?php if($i == count($actors)-1): ?>
                          <a href="<?php echo e(url('video/detail/actor_search', trim($actors[$i]))); ?>"><?php echo e($actors[$i]); ?></a>
                        <?php else: ?>
                          <a href="<?php echo e(url('video/detail/actor_search', trim($actors[$i]))); ?>"><?php echo e($actors[$i]); ?></a>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </li>
                  <?php endif; ?>
                  <li>
                    <?php if(count($genres) > 0): ?>
                      <?php for($i = 0; $i < count($genres); $i++): ?>
                        <?php if($i == count($genres)-1): ?>
                          <a href="<?php echo e(url('video/detail/genre_search', trim($genres[$i]))); ?>"><?php echo e($genres[$i]); ?></a>
                        <?php else: ?>
                          <a href="<?php echo e(url('video/detail/genre_search', trim($genres[$i]))); ?>"><?php echo e($genres[$i]); ?></a>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if(count($subtitles) > 0): ?>
                      <?php if($movie->subtitle == 1 && isset($subtitles)): ?>
                        <?php for($i = 0; $i < count($subtitles); $i++): ?>
                          <?php if($i == count($subtitles)-1): ?>
                            <?php echo e($subtitles[$i]); ?>

                          <?php else: ?>
                            <?php echo e($subtitles[$i]); ?>,
                          <?php endif; ?>
                        <?php endfor; ?>
                      <?php else: ?>
                        -
                      <?php endif; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if(count($a_languages) > 0): ?>
                      <?php if($movie->a_language != null && isset($a_languages)): ?>
                        <?php for($i = 0; $i < count($a_languages); $i++): ?>
                          <?php if($i == count($a_languages)-1): ?>
                            <?php echo e($a_languages[$i]); ?>

                          <?php else: ?>
                            <?php echo e($a_languages[$i]); ?>,
                          <?php endif; ?>
                        <?php endfor; ?>
                      <?php else: ?>
                        -
                      <?php endif; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </li>
                </ul>
              </div>
              <div id="wishlistelement" class="screen-play-btn-block">
                
               <?php if($subscribed==1): ?>
                 <?php if($age>=str_replace('+', '',$movie->maturity_rating)): ?>
              <?php if($movie->video_link['iframeurl'] != null): ?>
                  
                  <a href="#" onclick="playoniframe('<?php echo e($movie->video_link['iframeurl']); ?>','<?php echo e($movie->id); ?>','movie')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                 </a>

                <?php else: ?>
                  <a href="<?php echo e(route('watchmovie',$movie->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                </a>
              <?php endif; ?>
              <?php else: ?>
                 <a onclick="myage(<?php echo e($age); ?>)" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                 </a>
              <?php endif; ?>

<?php endif; ?>
              
              <?php if($movie->trailer_url != null || $movie->trailer_url != ''): ?>
                            <a href="<?php echo e(route('watchTrailer',$movie->id)); ?>" class="iframe btn-default"><?php echo e($popover_translations->where('key', 'watch trailer')->first->value->value); ?></a>
                          <?php endif; ?>
              <?php if($config->download ==1 && $movie->video_link['upload_video']!=''): ?>
                  <a href="<?php echo e(route('movie.download',$movie->video_link['upload_video'])); ?>" class="btn-default"><i class="fa fa-download" aria-hidden="true"></i> <?php echo e($popover_translations->where('key', 'Download')->first->value->value); ?></a>
                   <?php endif; ?>
                

              </div>

        </div>
  
        
              <div class="col-md-4">
              <div class="poster-thumbnail-block">
                <?php if($movie->thumbnail != null || $movie->thumbnail != ''): ?>
                  <img src="<?php echo e(asset('images/movies/thumbnails/'.$movie->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                <?php else: ?>
                  <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                <?php endif; ?>
              </div>
            </div>
            </div>

          </div>

        <?php elseif(isset($season)): ?>
          <?php
            $subtitles = collect();

            if ($season->subtitle == 1) {
              $subtitle_list = explode(',', $season->subtitle_list);
              for($i = 0; $i < count($subtitle_list); $i++) {
                try {
                  $subtitle = App\AudioLanguage::find($subtitle_list[$i])->language;
                  $subtitles->push($subtitle);
                } catch (Exception $e) {
                }
              }
            }
            $a_languages = collect();
            if ($season->a_language != null) {
              $a_lan_list = explode(',', $season->a_language);
              for($i = 0; $i < count($a_lan_list); $i++) {
                try {
                  $a_language = \App\AudioLanguage::find($a_lan_list[$i])->language;
                  $a_languages->push($a_language);
                } catch (Exception $e) {
                }
              }
            }
             if(isset($auth)){
            $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                          ['user_id', '=', $auth->id],
                                                                          ['season_id', '=', $season->id],
                                                                         ])->first();
                                                                       }
            // Actors list of movie from model
            $actors = collect();
            if ($season->actor_id != null) {
              $p_actors_list = explode(',', $season->actor_id);
              for($i = 0; $i < count($p_actors_list); $i++) {
                try {
                  $p_actor = \App\Actor::find(trim($p_actors_list[$i]))->name;
                  $actors->push($p_actor);
                } catch (Exception $e) {
                }
              }
            }

            // Genre list of movie from model
            $genres = collect();
            if ($season->tvseries->genre_id != null){
              $genre_list = explode(',', $season->tvseries->genre_id);
              for ($i = 0; $i < count($genre_list); $i++) {
                try {
                  $genre = \App\Genre::find($genre_list[$i])->name;
                  $genres->push($genre);
                } catch (Exception $e) {
                }
              }
            }
          ?>
          <div class="row">
            <div class="col-md-8">
              <div class="full-movie-dtl-block">
                <h2 class="section-heading"><?php echo e($season->tvseries->title); ?></h2>
                 <br/>
                <select style="width:20%;-webkit-box-shadow: none;box-shadow: none;color: #FFF;background: #000;display: block;clear: both;border: 1px solid #666;border-radius: 0;" name="" id="selectseason" class="form-control">
                  <?php $__currentLoopData = $season->tvseries->seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allseason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option <?php echo e($season->id == $allseason->id ? "selected" : ""); ?> value="<?php echo e($allseason->id); ?>">Season <?php echo e($allseason->season_no); ?></option>
                  
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <br>
                <div class="imdb-ratings-block">
                  <ul>
                    <li><?php echo e($season->publish_year); ?></li>
                    <li><?php echo e($season->season_no); ?> <?php echo e($popover_translations->where('key', 'season')->first->value->value); ?></li>
                    <li><?php echo e($season->tvseries->age_req); ?></li>
                    <li><?php echo e($home_translations->where('key', 'TMDB Rating')->first->value->value); ?> <?php echo e($season->tvseries->rating); ?></li>
                    <?php if(isset($subtitles)): ?>
                      <li>CC</li>
                      <li>
                        <?php for($i = 0; $i < count($subtitles); $i++): ?>
                          <?php if($i == count($subtitles)-1): ?>
                            <?php echo e($subtitles[$i]); ?>

                          <?php else: ?>
                            <?php echo e($subtitles[$i]); ?>,
                          <?php endif; ?>
                        <?php endfor; ?>
                      </li>
                      <li> <li><i title="views" class="fa fa-eye"></i> <?php echo e(views($season)
                        ->unique()
                        ->count()); ?></li></li>
                    <?php endif; ?>
                  </ul>
                </div>
                    <?php if(auth()->guard()->check()): ?>
                  <?php if($configs->user_rating==1): ?>
                   <?php
                $uid=Auth::user()->id;
                $rating=App\UserRating::where('user_id',$uid)->
                where('tv_id',$season->tvseries->id)->first();
                $avg_rating=App\UserRating::where('tv_id',$season->tvseries->id)->avg('rating');
                ?>
                  <h6><?php echo e($header_translations->where('key', 'average rating') ? $header_translations->where('key', 'average rating')->first->value->value : ''); ?>  <span style="margin-left: 10px;"> <?php echo e(number_format($avg_rating, 2)); ?></span></h6>
                    <?php echo Form::open(['method' => 'POST', 'id'=>'formratingtv', 'action' => 'UserRatingController@store']); ?>

                  <input type="text" hidden="" name="tv_id" 
                  value="<?php echo e($season->tvseries->id); ?>">
                    <input type="text" hidden="" name="user_id" value="<?php echo e($auth->id); ?>">
                  <input id="rating" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" onmouseover ="mouseoverratingtv()" 
                  value="<?php echo e(isset($rating)? $rating->rating: 2); ?>">
                  <button type="submit" hidden="" id="submitrating"> Submit Rating</button>
                  <?php echo Form::close(); ?>

                  <a href="javascript:video(0)" onclick="myrateTv()">Give Rating</a>
                  <button onclick="myrateTv()">Click me</button>
                  <?php endif; ?>
                 <?php endif; ?>
                <p>
                  <?php if($season->detail != null || $season->detail != ''): ?>
                    <?php echo e($season->detail); ?>

                  <?php else: ?>
                    <?php echo e($season->tvseries->detail); ?>

                  <?php endif; ?>
                </p>
              </div>
              <div class="screen-casting-dtl">
                <ul class="casting-headers">
                  <li><?php echo e($home_translations->where('key', 'starring')->first->value->value); ?></li>
                  <li><?php echo e($home_translations->where('key', 'genres')->first->value->value); ?></li>
                  <li><?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?></li>
                  <li><?php echo e($home_translations->where('key', 'audio languages')->first->value->value); ?></li>
                </ul>
                <ul class="casting-dtl">
                  <li>
                    <?php if(count($actors) > 0): ?>
                      <?php for($i = 0; $i < count($actors); $i++): ?>
                        <?php if($i == count($actors)-1): ?>
                          <a href="<?php echo e(url('video/detail/actor_search', trim($actors[$i]))); ?>"><?php echo e($actors[$i]); ?></a>
                        <?php else: ?>
                          <a href="<?php echo e(url('video/detail/actor_search', trim($actors[$i]))); ?>"><?php echo e($actors[$i]); ?></a>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if(count($genres) > 0): ?>
                      <?php for($i = 0; $i < count($genres); $i++): ?>
                        <?php if($i == count($genres)-1): ?>
                          <a href="<?php echo e(url('video/detail/genre_search', trim($genres[$i]))); ?>"><?php echo e($genres[$i]); ?></a>
                        <?php else: ?>
                          <a href="<?php echo e(url('video/detail/genre_search', trim($genres[$i]))); ?>"><?php echo e($genres[$i]); ?></a>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if(count($subtitles) > 0): ?>
                      <?php for($i = 0; $i < count($subtitles); $i++): ?>
                        <?php if($i == count($subtitles)-1): ?>
                          <?php echo e($subtitles[$i]); ?>

                        <?php else: ?>
                          <?php echo e($subtitles[$i]); ?>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if($season->a_language != null && isset($a_languages)): ?>
                      <?php for($i = 0; $i < count($a_languages); $i++): ?>
                        <?php if($i == count($a_languages)-1): ?>
                          <?php echo e($a_languages[$i]); ?>

                        <?php else: ?>
                          <?php echo e($a_languages[$i]); ?>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </li>
                </ul>
              </div>
              <div class="screen-play-btn-block">
                <?php if(isset($season->episodes[0])): ?>
                   <?php if($age>=str_replace('+', '',$season->tvseries->age_req)): ?>
                            <?php if($season->episodes[0]->video_link['iframeurl'] !=""): ?>

                            <a href="#" onclick="playoniframe('<?php echo e($season->episodes[0]->video_link['iframeurl']); ?>','<?php echo e($season->tvseries->id); ?>','tv')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                             </a>
                            <?php else: ?>
                <a href="<?php echo e(route('watchTvShow',$season->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
               <?php endif; ?>
               <?php else: ?>
                <a  onclick="myage(<?php echo e($age); ?>)" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                             </a>
               <?php endif; ?>
               <?php endif; ?>
                <?php if($subscribed==1): ?>
                <div id="wishlistelement" class="btn-group btn-block">
                  <div>
                    <?php if(isset($wishlist_check->added)): ?>
                      <a onclick="addWish(<?php echo e($season->id); ?>,'<?php echo e($season->type); ?>')" class="addwishlistbtn<?php echo e($season->id); ?><?php echo e($season->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                    <?php else: ?>
                      <a onclick="addWish(<?php echo e($season->id); ?>,'<?php echo e($season->type); ?>')" class="addwishlistbtn<?php echo e($season->id); ?><?php echo e($season->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                    <?php endif; ?>
                  </div>
                </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="poster-thumbnail-block">
                <?php if($season->thumbnail != null): ?>
                  <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$season->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                <?php elseif($season->tvseries->thumbnail != null): ?>
                  <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$season->tvseries->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                <?php else: ?>
                  <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>

<?php if(isset($movie)): ?>
 <?php if($configs->comments==1): ?>
    <div class="container">
   <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#showcomment" aria-controls="showcomment" role="tab" data-toggle="tab">Comments</a></li>
    <li role="presentation"><a href="#postcomment" aria-controls="postcomment" role="tab" data-toggle="tab">Post Comment</a></li>
  </ul>
  <br/>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="showcomment">
      <h4 class="title" style="color:#B1B1B1;"><span class="glyphicon glyphicon-comment"></span> <?php echo e($movie->comments->count()); ?> Comments </h4> <br/>
         
          <?php $__currentLoopData = $movie->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <div class="comment">
                <div class="author-info">
                  <img src="<?php echo e("https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->name))). "?s=50&d=monsterid"); ?>" class="author-image">
                  <div class="author-name">
                    <h4><?php echo e($comment->name); ?></h4>
                    <p class="author-time"><?php echo e(date('F nS, Y - g:i a',strtotime($comment->created_at))); ?></p>
                  </div>
                </div>

                <div class="comment-content">
                 <?php echo e($comment->comment); ?>

                </div>
              </div>
              <div>
                  <button type="button" class="btn-danger btn-floating pull-right" data-toggle="modal" data-target="#<?php echo e($comment->id); ?>deleteModal">Reply </button>
                    <!-- Modal -->
                  
                   
              </div>

               <?php $__currentLoopData = $comment->subcomments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcomment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <div class="comment" style="margin-left:50px;">
                  <div class="author-info">
                    <img src="<?php echo e("https://www.gravatar.com/avatar/" . md5(strtolower(trim($subcomment->name))). "?s=50&d=monsterid"); ?>" class="author-image">
                    <div class="author-name">
                      <?php
                         $name=App\User::where('id',$subcomment->user_id)->first();
                       ?>
                      <h5><?php echo e($name->name); ?></h5>
                      <p class="author-time"><?php echo e(date('F nS, Y - g:i a',strtotime($subcomment->created_at))); ?></p>
                    </div>
                  </div>

                  <div class="comment-content">
                   <?php echo e($subcomment->reply); ?>

                  </div>
                </div>
              
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <div id="<?php echo e($comment->id); ?>deleteModal" class="modal fade" role="dialog"  style="margin-top: 20px;">
                      <div class="modal-dialog modal-md" style="margin-top:70px;">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                             
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="delete-icon"></div>
                           <h4 style="color:#B1B1B1;"> Reply for <?php echo e($comment->name); ?></h4>
                          </div>
                          <div class="modal-body text-center">
                             
                              <form action="<?php echo e(route('movie.comment.reply', ['cid' =>$comment->id])); ?>" method ="POST">
                                <?php echo e(csrf_field()); ?>

                              <?php echo e(Form::label('reply','Your Reply:')); ?>

                              <?php echo e(Form::textarea('reply', null, ['class' => 'form-control', 'rows'=> '5','cols' => '10'])); ?> 
                              <br/>
                                <button type="submit" class="btn btn-danger">Submit</button>
                           </form>
                          </div>
                          <div class="modal-footer">
                           
                          </div>
                        </div>
                      </div>
                    </div>
              

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          

    </div>
    <?php if(auth()->guard()->check()): ?>
    <div role="tabpanel" class="tab-pane fade" id="postcomment">
        <div style="width: 90%;color:#B1B1B1;" class=" " >
            <h3>Post Comment:</h3><br/>
             
                <?php echo e(Form::open( ['route' => ['movie.comment.store', $movie->id], 'method' => 'POST'])); ?>

                <?php echo e(Form::label('name', 'Name:')); ?>

                <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

                <br/>
                <?php echo e(Form::label('email', 'Email:')); ?>

                 <?php echo e(Form::email('email', null, ['class' => 'form-control'])); ?>

                <br/>
                <?php echo e(Form::label('comment','Comment:')); ?>

                <?php echo e(Form::textarea('comment', null, ['class' => 'form-control', 'rows'=> '5','cols' => '10'])); ?>

                <br/>
                <?php echo e(Form::submit('Add Comment', ['class' => 'btn btn-md btn-primary'])); ?>

        </div>

    </div>
    <?php endif; ?>
  </div>
</div>
<?php endif; ?>
<?php endif; ?>
    <!-- movie series -->
    <?php if(isset($movie->movie_series) && $movie->series != 1): ?>
      <?php if(count($movie->movie_series) > 0): ?>
        <div class="container-fluid movie-series-section search-section">
          <h5 class="movie-series-heading">Series <?php echo e(count($movie->movie_series)); ?></h5>
          <div>
            <?php $__currentLoopData = $movie->movie_series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $series): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $single_series = \App\Movie::where('id', $series->series_movie_id)->first();
                 if(isset($auth)){
                $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['movie_id', '=', $single_series->id],
                                                                           ])->first();
                                                                         }
              ?>
              <div class="movie-series-block">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="movie-series-img">
                      <?php if($single_series->thumbnail != null || $single_series->thumbnail != ''): ?>
                        <img src="<?php echo e(asset('images/movies/thumbnails/'.$single_series->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-sm-7 pad-0">
                    <h5 class="movie-series-heading movie-series-name"><a href="<?php echo e(url('movie/detail', $single_series->id)); ?>"><?php echo e($single_series->title); ?></h5>
                    <ul class="movie-series-des-list">
                      <li><?php echo e($home_translations->where('key', 'TMDB Rating')->first->value->value); ?> <?php echo e($single_series->rating); ?></li>
                      <li><?php echo e($single_series->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                      <li><?php echo e($single_series->publish_year); ?></li>
                      <li><?php echo e($single_series->maturity_rating); ?></li>
                      <?php if($single_series->subtitle == 1): ?>
                        <li><?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?></li>
                      <?php endif; ?>
                    </ul>
                    <p>
                      <?php echo e($single_series->detail); ?>

                    </p>
                     <?php if($subscribed==1): ?>
                    <div class="des-btn-block des-in-list">
                      <a href="<?php echo e(route('watchmovie',$single_series->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                      <?php if($single_series->trailer_url != null || $single_series->trailer_url != ''): ?>
                        <a href="<?php echo e(route('watchTrailer',$single_series->id)); ?>" class="btn-default"><?php echo e($popover_translations->where('key', 'watch trailer')->first->value->value); ?></a>
                      <?php endif; ?>
                      <?php if(isset($wishlist_check->added)): ?>
                        <a onclick="addWish(<?php echo e($single_series->id); ?>,'<?php echo e($single_series->type); ?>')" class="addwishlistbtn<?php echo e($single_series->id); ?><?php echo e($single_series->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                      <?php else: ?>
                        <a onclick="addWish(<?php echo e($single_series->id); ?>,'<?php echo e($single_series->type); ?>')" class="addwishlistbtn<?php echo e($single_series->id); ?><?php echo e($single_series->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                      <?php endif; ?>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <?php if(isset($filter_series) && $movie->series == 1): ?>
      <?php if(count($filter_series) > 0): ?>
        <div class="container-fluid movie-series-section search-section">
          <h5 class="movie-series-heading"><?php echo e($home_translations->where('key', 'series')->first->value->value); ?> <?php echo e(count($filter_series)); ?></h5>
          <div>
            <?php $__currentLoopData = $filter_series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $series): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
               if(isset($auth)){
                $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['movie_id', '=', $series->id],
                                                                           ])->first();
                                                                         }
              ?>
              <div class="movie-series-block">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="movie-series-img">
                      <?php if($series->thumbnail != null): ?>
                        <img src="<?php echo e(asset('images/movies/thumbnails/'.$series->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-sm-7 pad-0">
                    <h5 class="movie-series-heading movie-series-name"><a href="<?php echo e(url('movie/detail', $series->id)); ?>"><?php echo e($series->title); ?></a></h5>
                    <ul class="movie-series-des-list">
                      <li><?php echo e($home_translations->where('key', 'TMDB Rating')->first->value->value); ?> <?php echo e($series->rating); ?></li>
                      <li><?php echo e($series->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                      <li><?php echo e($series->publish_year); ?></li>
                      <li><?php echo e($series->maturity_rating); ?></li>
                      <?php if($series->subtitle == 1): ?>
                        <li><?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?></li>
                      <?php endif; ?>
                    </ul>
                    <p>
                      <?php echo e($series->detail); ?>

                    </p>
                     <?php if($subscribed==1): ?>
                    <div class="des-btn-block des-in-list">
                       <?php if($age>=str_replace('+', '',$series->maturity_rating)): ?>
                      <a onclick="playVideo(<?php echo e($series->id); ?>, '<?php echo e($series->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                      <?php else: ?>
                       <a onclick="myage(<?php echo e($age); ?>)" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                      <?php endif; ?>
                      <?php if($series->trailer_url != null || $series->trailer_url != ''): ?>
                        <a onclick="playTrailer('<?php echo e($series->trailer_url); ?>')" class="btn-default"><?php echo e($popover_translations->where('key', 'watch trailer')->first->value->value); ?></a>
                      <?php endif; ?>
                      <?php if(isset($wishlist_check->added)): ?>
                        <a onclick="addWish(<?php echo e($series->id); ?>,'<?php echo e($series->type); ?>')" class="addwishlistbtn<?php echo e($series->id); ?><?php echo e($series->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                      <?php else: ?>
                        <a onclick="addWish(<?php echo e($series->id); ?>,'<?php echo e($series->type); ?>')" class="addwishlistbtn<?php echo e($series->id); ?><?php echo e($series->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                      <?php endif; ?>
                    </div>

                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <!-- end movie series -->

 <?php if(isset($season)): ?>
 <?php if($configs->comments==1): ?>
    <div class="container">
   <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#showcomment" aria-controls="showcomment" role="tab" data-toggle="tab">Comments</a></li>
    <li role="presentation"><a href="#postcomment" aria-controls="postcomment" role="tab" data-toggle="tab">Post Comment</a></li>
  </ul>
  <br/>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="showcomment">
      <h4 class="title" style="color:#B1B1B1;"><span class="glyphicon glyphicon-comment"></span> <?php echo e($season->tvseries->comments->count()); ?> Comments </h4> <br/>
         
          <?php $__currentLoopData = $season->tvseries->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <div class="comment">
                <div class="author-info">
                  <img src="<?php echo e("https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->name))). "?s=50&d=monsterid"); ?>" class="author-image">
                  <div class="author-name">
                    <h4><?php echo e($comment->name); ?></h4>
                    <p class="author-time"><?php echo e(date('F jS, Y - g:i a',strtotime($comment->created_at))); ?></p>
                  </div>
                </div>

                <div class="comment-content">
                 <?php echo e($comment->comment); ?>

                </div>
              </div>
              <div>
                  <button type="button" class="btn-danger btn-floating pull-right" data-toggle="modal" data-target="#<?php echo e($comment->id); ?>deleteModal">Reply </button>
                    <!-- Modal -->
                   
                    <div id="<?php echo e($comment->id); ?>deleteModal" class="delete-modal modal fade" role="dialog"  style="margin-top: 20px;">
                      <div class="modal-dialog modal-md" style="margin-top:70px;">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                             
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="delete-icon"></div>
                           <h4 style="color:#B1B1B1;"> Reply for <?php echo e($comment->name); ?></h4>
                          </div>
                          <div class="modal-body text-center">
                             
                              <form action="<?php echo e(route('tv.comment.reply', ['cid' =>$comment->id])); ?>" method ="POST">
                                <?php echo e(csrf_field()); ?>

                              <?php echo e(Form::label('reply','Your Reply:')); ?>

                              <?php echo e(Form::textarea('reply', null, ['class' => 'form-control', 'rows'=> '5','cols' => '10'])); ?> 
                              <br/>
                                <button type="submit" class="btn btn-danger">Submit</button>
                           </form>
                          </div>
                          <div class="modal-footer">
                           
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
               <?php $__currentLoopData = $comment->subcomments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcomment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                  <div class="comment" style="margin-left:50px;">
                  <div class="author-info">
                    <img src="<?php echo e("https://www.gravatar.com/avatar/" . md5(strtolower(trim($subcomment->name))). "?s=50&d=monsterid"); ?>" class="author-image">
                    <div class="author-name">
                      <?php
                         $name=App\User::where('id',$subcomment->user_id)->first();
                       ?>
                      <h5><?php echo e($name->name); ?></h5>
                      <p class="author-time"><?php echo e(date('F jS, Y - g:i a',strtotime($subcomment->created_at))); ?></p>
                    </div>
                  </div>

                  <div class="comment-content">
                   <?php echo e($subcomment->reply); ?>

                  </div>
                </div>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
              

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          

    </div>
    <?php if(auth()->guard()->check()): ?>
    <div role="tabpanel" class="tab-pane fade" id="postcomment">
        <div style="width: 90%;color:#B1B1B1;" class=" " >
            <h3>Post Comment:</h3><br/>
          
                <?php echo e(Form::open( ['route' => ['tv.comment.store', $season->tvseries->id], 'method' => 'POST'])); ?>

                <?php echo e(Form::label('name', 'Name:')); ?>

                <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

                <br/>
                <?php echo e(Form::label('email', 'Email:')); ?>

                 <?php echo e(Form::email('email', null, ['class' => 'form-control'])); ?>

                <br/>
                <?php echo e(Form::label('comment','Comment:')); ?>

                <?php echo e(Form::textarea('comment', null, ['class' => 'form-control', 'rows'=> '5','cols' => '10'])); ?>

                <br/>
                <?php echo e(Form::submit('Add Comment', ['class' => 'btn btn-md btn-primary'])); ?>

        </div>

    </div>
    <?php endif; ?>
  </div>
</div>
<?php endif; ?>
<?php endif; ?>
    <!-- episodes -->
    <?php if(isset($season->episodes)): ?>
      <?php if(count($season->episodes) > 0): ?>
        <div class="container-fluid movie-series-section search-section">
          <h5 class="movie-series-heading"><?php echo e($home_translations->where('key', 'episodes')->first->value->value); ?> <?php echo e(count($season->episodes)); ?></h5>
          <div>
            <?php $__currentLoopData = $season->episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



              <div class="movie-series-block">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="movie-series-img">
                      <?php if($episode->thumbnail != null): ?>
                        <img src="<?php echo e(asset('images/tvseries/episodes/'.$episode->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                      <?php elseif($episode->thumbnail != null): ?>
                        <img src="<?php echo e(asset('images/tvseries/episodes/'.$episode->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                      <?php else: ?>
                        <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                      <?php endif; ?>
                    </div>
                  </div>
                    <?php if($subscribed==1): ?>
                  <div class="col-sm-7 pad-0">
                     <?php if($age>=str_replace('+', '',$episode->seasons->tvseries->maturity_rating)): ?>
                     <?php if($episode->video_link['iframeurl'] !=""): ?>
                       <a onclick="playoniframe('<?php echo e($episode->video_link['iframeurl']); ?>','<?php echo e($episode->seasons->tvseries->id); ?>','tv')" class="btn btn-play btn-sm-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><h5 class="movie-series-heading movie-series-name"><?php echo e($key+1); ?>. <?php echo e($episode->title); ?></h5></span></a>
                    <?php else: ?>
                       <a href="<?php echo e(route('watch.Episode', $episode->id)); ?>" class="iframe btn btn-play btn-sm-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><h5 class="movie-series-heading movie-series-name"><?php echo e($key+1); ?>. <?php echo e($episode->title); ?></h5></span></a>
                  <?php endif; ?>
                  <?php else: ?>
                    <a onclick="myage(<?php echo e($age); ?>)" class="btn btn-play btn-sm-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><h5 class="movie-series-heading movie-series-name"><?php echo e($key+1); ?>. <?php echo e($episode->title); ?></h5></span></a>
                  <?php endif; ?>
                    <ul class="movie-series-des-list">
                      <li><?php echo e($episode->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                      <li><?php echo e($episode->released); ?></li>
                      <li><?php echo e($episode->seasons->tvseries->maturity_rating); ?></li>
                      <li>
                        <?php if($episode->subtitle == 1): ?>
                         <?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?>

                        <?php endif; ?>
                      </li>
                    </ul>
                    <?php
                    $subtitles = collect();
           
            $a_languages = collect();
           
                    if ($episode->subtitle==1) {
                        $subtitle_list = explode(',', $episode->subtitle_list);
                         for($i = 0; $i < count($subtitle_list); $i++) {
                try {
                  $subtitle = \App\AudioLanguage::find($subtitle_list[$i])->language;
                  $subtitles->push($subtitle);
                } catch (Exception $e) {
                }
              }
                    }
                     if ($episode->a_language != null) {
              $a_lan_list = explode(',', $episode->a_language);
              for($i = 0; $i < count($a_lan_list); $i++) {
                try {
                  $a_language = \App\AudioLanguage::find($a_lan_list[$i])->language;
                  $a_languages->push($a_language);
                } catch (Exception $e) {
                }
              }
            }
                    ?>
                    <ul class="casting-headers">
                  
                  <li><?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?></li>
                  <li><?php echo e($home_translations->where('key', 'audio languages')->first->value->value); ?></li>
                </ul>
               <ul class="casting-dtl">
                 <li>
                  <?php if(isset($subtitles)): ?>
                    <?php if(count($subtitles) > 0): ?>
                      <?php for($i = 0; $i < count($subtitles); $i++): ?>
                        <?php if($i == count($subtitles)-1): ?>
                          <?php echo e($subtitles[$i]); ?>

                        <?php else: ?>
                          <?php echo e($subtitles[$i]); ?>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if($episode->a_language != null && isset($a_languages)): ?>
                      <?php for($i = 0; $i < count($a_languages); $i++): ?>
                        <?php if($i == count($a_languages)-1): ?>
                          <?php echo e($a_languages[$i]); ?>

                        <?php else: ?>
                          <?php echo e($a_languages[$i]); ?>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </li>
               </ul>
                 </br>

                    <p>
                      <?php echo e($episode->detail); ?>

                    </p>
                    <br>
                     <?php if($config->download ==1 && $episode->video_link['upload_video']!=''): ?>
                  <a href="<?php echo e(route('season.download',$episode->video_link['upload_video'])); ?>" class="btn-default btn-sm"><i class="fa fa-download" aria-hidden="true"></i> <?php echo e($popover_translations->where('key', 'Download')->first->value->value); ?></a>
                   <?php endif; ?>
                  </div>


                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>

      
    <!-- end episodes -->
    <?php if($prime_genre_slider == 1): ?>
      <?php
        $all = collect();
        $all_fil_movies = App\Movie::all();
        $all_fil_tv = App\TvSeries::all();
        if (isset($movie)) {
          $genres = explode(',', $movie->genre_id);
        } elseif (isset($season)) {
          $genres = explode(',', $season->tvseries->genre_id);
        }
        for($i = 0; $i < count($genres); $i++) {
          foreach ($all_fil_movies as $fil_movie) {
            $fil_genre_item = explode(',', trim($fil_movie->genre_id));
            for ($k=0; $k < count($fil_genre_item); $k++) {
              if (trim($fil_genre_item[$k]) == trim($genres[$i])) {
                if (isset($movie)) {
                  if ($fil_movie->id != $movie->id) {
                    $all->push($fil_movie);
                  }
                } else {
                  $all->push($fil_movie);
                }
              }
            }
          }
        }
        if (isset($movie)) {
          $all = $all->except($movie->id);
        }

        for($i = 0; $i < count($genres); $i++) {
          foreach ($all_fil_tv as $fil_tv) {
            $fil_genre_item = explode(',', trim($fil_tv->genre_id));
            for ($k=0; $k < count($fil_genre_item); $k++) {
              if (trim($fil_genre_item[$k]) == trim($genres[$i])) {
                $fil_tv = $fil_tv->seasons;
                if (isset($season)) {
                  $all->push($fil_tv->except($season->id));
                } else {
                  $all->push($fil_tv);
                }
              }
            }
          }
        }
        $all = $all->unique();
        $all = $all->flatten();
      ?>
      <?php if(isset($all) && count($all) > 0): ?>
        <div class="genre-prime-block">
          <div class="container-fluid">
            <h5 class="section-heading"><?php echo e($home_translations->where('key', 'customers also watched')->first->value->value); ?></h5>
            <div class="genre-prime-slider owl-carousel">
              <?php if(isset($all)): ?>
                <?php $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                   if(isset($auth)){
                    if ($item->type == 'S') {
                       $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                        ['user_id', '=', $auth->id],
                                                                        ['season_id', '=', $item->id],
                                                                       ])->first();
                    } elseif ($item->type == 'M') {
                      $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                        ['user_id', '=', $auth->id],
                                                                        ['movie_id', '=', $item->id],
                                                                       ])->first();
                    }

                  }
                  ?>
                  <?php if($item->type == 'M'): ?>
                    <?php if(isset($movie)): ?>
                    <div class="genre-prime-slide">
                      <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?>">
                        <a href="<?php echo e(url('movie/detail',$item->id)); ?>">
                          <?php if($item->thumbnail != null): ?>
                            <img src="<?php echo e(asset('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                          <?php endif; ?>
                        </a>
                      </div>
                      <div id="prime-mix-description-block<?php echo e($item->id); ?>" class="prime-description-block">
                        <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                        <div class="movie-rating"><?php echo e($home_translations->where('key', 'TMDB Rating')->first->value->value); ?> <?php echo e($item->rating); ?></div>
                        <ul class="description-list">
                          <li><?php echo e($item->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                          <li><?php echo e($item->publish_year); ?></li>
                          <li><?php echo e($item->maturity_rating); ?></li>
                          <?php if($item->subtitle == 1): ?>
                            <li>CC</li>
                            <li>
                             <?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?>

                            </li>
                          <?php endif; ?>
                        </ul>
                        <div class="main-des">
                          <p><?php echo e($item->detail); ?></p>
                          <a href="#"></a>
                        </div>
                        <?php if($subscribed!=1): ?>
                         <div class="des-btn-block">
                         <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                            <a href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>" class="iframe btn-default"><?php echo e($popover_translations->where('key', 'watch trailer')->first->value->value); ?></a>
                          </div>
                          <?php endif; ?>
                        <?php endif; ?>
                          <?php if($subscribed==1): ?>
                        <div class="des-btn-block">
                           <?php if($age>=str_replace('+', '',$item->maturity_rating)): ?>
                           <?php if($item->video_link['iframeurl'] != null): ?>
                              
                              <a onclick="playoniframe('<?php echo e($item->video_link['iframeurl']); ?>','<?php echo e($item->id); ?>','tv')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                              </a>

                             <?php else: ?> 
                          <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                          <?php endif; ?>
                          <?php else: ?>

                              <a onclick="myage(<?php echo e($age); ?>)" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                              </a>
                          <?php endif; ?>
                          <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                            <a href="<?php echo e(route('watchTrailer',$item->id)); ?>" class="iframe btn-default"><?php echo e($popover_translations->where('key', 'watch trailer')->first->value->value); ?></a>
                          <?php endif; ?>
                          <?php if(isset($wishlist_check->added)): ?>
                            <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                          <?php else: ?>
                            <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                          <?php endif; ?>
                        </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  <?php endif; ?>

                  <?php if($item->type == "S"): ?>
                    <?php if(!isset($movie)): ?>
                    <div class="genre-prime-slide">
                      <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                        <a href="<?php echo e(url('show/detail',$item->id)); ?>">
                          <?php if($item->thumbnail != null): ?>
                            <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                          <?php elseif($item->tvseries->thumbnail != null): ?>
                            <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                          <?php else: ?>
                            <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                          <?php endif; ?>
                        </a>
                      </div>
                      <div id="prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                        <h5 class="description-heading"><?php echo e($item->tvseries->title); ?></h5>
                        <div class="movie-rating"><?php echo e($home_translations->where('key', 'TMDB Rating')->first->value->value); ?> <?php echo e($item->tvseries->rating); ?></div>
                        <ul class="description-list">
                          <li>Season <?php echo e($item->season_no); ?></li>
                          <li><?php echo e($item->publish_year); ?></li>
                          <li><?php echo e($item->tvseries->age_req); ?></li>
                          <?php if($item->subtitle == 1): ?>
                            <li>CC</li>
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
                          <?php if($subscribed==1): ?>
                        <div class="des-btn-block">
                          <?php if(isset($item->episodes[0])): ?>
                           <?php if($age>=str_replace('+', '',$item->tvseries->age_req)): ?>
                           <?php if($item->episodes[0]->video_link['iframeurl'] !=""): ?>

                            <a href="#" onclick="playoniframe('<?php echo e($item->episodes[0]->video_link['iframeurl']); ?>','<?php echo e($item->tvseries->id); ?>','tv')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                             </a>
                             
                            <?php else: ?>
                          <a href="<?php echo e(route('watchTvShow',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                          <?php endif; ?>
                          <?php else: ?>

                            <a onclick="myage(<?php echo e($age); ?>)" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                             </a>
                          <?php endif; ?>
                          <?php endif; ?>
                          <?php if(isset($wishlist_check->added)): ?>
                            <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                          <?php else: ?>
                            <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                          <?php endif; ?>
                        </div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php else: ?>
      <?php
        $all = collect();
        $all_fil_movies = App\Movie::all();
        $all_fil_tv = App\TvSeries::all();
        if (isset($movie)) {
          $genres = explode(',', $movie->genre_id);
        } elseif (isset($season)) {
          $genres = explode(',', $season->tvseries->genre_id);
        }
        for($i = 0; $i < count($genres); $i++) {
          foreach ($all_fil_movies as $fil_movie) {
            $fil_genre_item = explode(',', trim($fil_movie->genre_id));
            for ($k=0; $k < count($fil_genre_item); $k++) {
              if (trim($fil_genre_item[$k]) == trim($genres[$i])) {
                if (isset($movie)) {
                  if ($fil_movie->id != $movie->id) {
                    $all->push($fil_movie);
                  }
                } else {
                  $all->push($fil_movie);
                }
              }
            }
          }
        }
        if (isset($movie)) {
          $all = $all->except($movie->id);
        }

        for($i = 0; $i < count($genres); $i++) {
          foreach ($all_fil_tv as $fil_tv) {
            $fil_genre_item = explode(',', trim($fil_tv->genre_id));
            for ($k=0; $k < count($fil_genre_item); $k++) {
              if (trim($fil_genre_item[$k]) == trim($genres[$i])) {
                $fil_tv = $fil_tv->seasons;
                if (isset($season)) {
                  $all->push($fil_tv->except($season->id));
                } else {
                  $all->push($fil_tv);
                }
              }
            }
          }
        }
        $all = $all->unique();
        $all = $all->flatten();
      ?>
      <?php if(isset($all) && count($all) > 0): ?>
        <div class="genre-main-block">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <div class="genre-dtl-block">
                  <h3 class="section-heading"><?php echo e($home_translations->where('key', 'customers also watched')->first->value->value); ?></h3>
                  <p class="section-dtl"><?php echo e($home_translations->where('key', 'at the big screen at home')->first->value->value); ?></p>
                </div>
              </div>
              <div class="col-md-9">
                <div class="genre-main-slider owl-carousel">
                  <?php if(isset($all)): ?>
                    <?php $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($item->type == 'S'): ?>
                        <div class="genre-slide">
                          <div class="genre-slide-image">
                            <a href="<?php echo e(url('show/detail/'.$item->id)); ?>">
                              <?php if($item->thumbnail != null): ?>
                                <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                              <?php elseif($item->tvseries->thumbnail != null): ?>
                                <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                              <?php else: ?>
                                <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                              <?php endif; ?>
                            </a>
                          </div>
                          <div class="genre-slide-dtl">
                            <h5 class="genre-dtl-heading"><a href="<?php echo e(url('show/detail/'.$item->id)); ?>"><?php echo e($item->tvseries->title); ?></a></h5>
                            <div class="genre-small-info"><?php echo e($item->detail != null ? $item->detail : $item->tvseries->detail); ?></div>
                          </div>
                        </div>
                      <?php elseif($item->type == 'M'): ?>
                        <div class="genre-slide">
                          <div class="genre-slide-image">
                            <a href="<?php echo e(url('movie/detail/'.$item->id)); ?>">
                              <?php if($item->thumbnail != null): ?>
                                <img src="<?php echo e(asset('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                              <?php endif; ?>
                            </a>
                          </div>
                          <div class="genre-slide-dtl">
                            <h5 class="genre-dtl-heading"><a href="<?php echo e(url('movie/detail/'.$item->id)); ?>"><?php echo e($item->title); ?></a></h5>
                          </div>
                        </div>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </section>


 <?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<script type="text/javascript">
   function mouseoverrating () {
        
        $.ajax({
            type: "POST",
            url: "<?php echo e(url('/video/rating')); ?>",
            data:$("#formrating").serialize(),
            success: function (data) {
              console.log(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest);
            }
        });
    
        }
          function mouseoverratingtv () {
        
        $.ajax({
            type: "POST",
            url: "<?php echo e(url('/video/rating/tv')); ?>",
            data:$("#formrating").serialize(),
            success: function (data) {
              console.log(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest);
            }
        });
    
        }
</script>
<script type="text/javascript">


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

    <script>
      $('#selectseason').on('change',function(){
        var get = $('#selectseason').val();
        window.location.href = '<?php echo e(url('show/detail/')); ?>/'+get;
      });
    </script>
      
 <script>

      function myage(age){
        if (age==0) {
        $('#ageModal').modal('show'); 
      }else{
          $('#ageWarningModal').modal('show');
      }
    }
      
    </script>
  
 <script type="text/javascript">

  function myrate(){
            $.ajax({
            type: "POST",
            url: "<?php echo e(url('/video/rating')); ?>",
            data:$("#formrating").serialize(),
            success: function (data) {
              console.log(data);
              location.reload();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
             console.log(XMLHttpRequest);
            }
        });
    }

     function myrateTv(){
            $.ajax({
            type: "POST",
            url: "<?php echo e(url('/video/rating/tv')); ?>",
            data:$("#formratingtv").serialize(),
            success: function (data) {
              console.log(data);
              location.reload();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest);
            }
        });
    }

  $(document).ready(function(){

  $("#rating").on('mouseout',function(event){
           event.preventDefault();
           var val = $(".rating").val();

           // alert(val)

         $.ajax({
            type: "GET",
            url: "<?php echo e(url('/video/rating')); ?>",
            data:$("#formrating").serialize(),
            success: function (data) {
              console.log(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
             console.log(XMLHttpRequest);
            }
        });

  });

  $("#rating").on('mouseover',function(event){
           event.preventDefault();
           var val = $(".rating").val();

           // alert(val)

         $.ajax({
            type: "GET",
            url: "<?php echo e(url('/video/rating')); ?>",
            data:$("#formrating").serialize(),
            success: function (data) {
              console.log(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
             console.log(XMLHttpRequest);
            }
        });

  });

  $("#rating").on('mouseenter',function(event){
           event.preventDefault();
           var val = $(".rating").val();

           // alert(val)

         $.ajax({
            type: "GET",
            url: "<?php echo e(url('/video/rating')); ?>",
            data:$("#formrating").serialize(),
            success: function (data) {
              console.log(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
             console.log(XMLHttpRequest);
            }
        });

  });

  $("#rating").on('mouseleave',function(event){
           event.preventDefault();
           var val = $(".rating").val();

           // alert(val)

         $.ajax({
            type: "GET",
            url: "<?php echo e(url('/video/rating')); ?>",
            data:$("#formrating").serialize(),
            success: function (data) {
              console.log(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
             console.log(XMLHttpRequest);
            }
        });

  });

   function mouseoverrating () {
        // $.ajax({
        //     type: "GET",
        //     url: "<?php echo e(url('/video/rating')); ?>",
        //     data:$("#formrating").serialize(),
        //     success: function (data) {
        //       console.log(data);
        //     },
        //     error: function(XMLHttpRequest, textStatus, errorThrown) {
        //      console.log(XMLHttpRequest);
        //     }
        // });
    
        }
    
          
    function mouseoverratingtv () {    
        $.ajax({
            type: "POST",
            url: "<?php echo e(url('/video/rating/tv')); ?>",
            data:$("#formratingtv").serialize(),
            success: function (data) {
              console.log(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest);
            }
        });
    
        }
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>