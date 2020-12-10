<?php $__env->startSection('title','User Dashboard'); ?>
<?php $__env->startSection('main-wrapper'); ?>
  <!-- main wrapper -->
  <section id="main-wrapper" class="main-wrapper home-page user-account-section">
    <div class="container-fluid">
      <h4 class="heading">Dashboard</h4>
      
      <div class="panel-setting-main-block">
        <div class="panel-setting">
          <div class="row">
            <div class="col-md-6">
              <h4 class="panel-setting-heading">Your Details</h4>
              <p>Change your Name, Email, Mobile Number, Password, and more.</p>
            </div>
            <div class="col-md-3">
              <p class="info">Your Email: <?php echo e($auth->email); ?></p>
            </div>
            <div class="col-md-3">
              <div class="panel-setting-btn-block text-right">
                <a href="<?php echo e(url('account/profile')); ?>" class="btn btn-setting">Edit Details</a>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-setting">
          <div class="row">
            <div class="col-md-6">
              <h4 class="panel-setting-heading">Your Membership</h4>
              <p>Want to Change your Membership.</p>
            </div>
            <div class="col-md-3">
              <?php
                $bfree = null;
                 $config=App\Config::first();
                 $auth=Auth::user();
                  if ($auth->is_admin==1) {
                $bfree=1;
              }else{
                 $ps=App\PaypalSubscription::where('user_id',$auth->id)->first();
                 if (isset($ps)) {
      $current_date = Illuminate\Support\Carbon::now();
            if (date($current_date) <= date($ps->subscription_to)) {
            
               if ($ps->package_id==100) {
            $bfree=1;
            }else{
              $bfree=0;
            }
             
       

      }
                 }
              }
                 
              ?>
              <?php if($auth->is_admin==1): ?>
               <p class="info">Current Subscription: FREE</p>
              <?php else: ?>
            
             <?php if($bfree==1): ?>

                <p class="info">Current Subscription: FREE till 
                  <?php echo e(date($ps->subscription_to)); ?></p>

              <?php elseif($bfree==0): ?>
               <?php if(isset($ps)): ?>
                <?php
                   $psn=App\Package::where('id',$ps->package_id)->first();
                ?>
                 <p class="info">Current Subscription: <?php echo e(ucfirst($psn->name)); ?></p>
                 <?php endif; ?>
             <?php else: ?>
              <?php if($current_subscription != null): ?>
                <p class="info">Current Subscription: <?php echo e($method == 'stripe' ? ucfirst($current_subscription->name) : ucfirst($current_subscription->plan->name)); ?></p>
              <?php endif; ?>
              <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-3">
              <div class="panel-setting-btn-block text-right">
                <?php if($current_subscription != null && $method == 'stripe'): ?> 
                  <?php if($auth->subscription($current_subscription->name)->cancelled()): ?>
                    <a href="<?php echo e(route('resumeSub', $current_subscription->stripe_plan)); ?>" class="btn btn-setting"><i class="fa fa-edit"></i>Resume Subscription</a>
                  <?php else: ?>
                    <a href="<?php echo e(route('cancelSub', $current_subscription->stripe_plan)); ?>" class="btn btn-setting"><i class="fa fa-edit"></i>Cancel Subscription</a>
                  <?php endif; ?>
                <?php elseif($current_subscription != null && $method == 'paypal'): ?> 
                  <?php if($current_subscription->status == 0): ?>
                    <a href="<?php echo e(route('resumeSubPaypal')); ?>" class="btn btn-setting"><i class="fa fa-edit"></i>Resume Subscription</a>
                  <?php elseif($current_subscription->status == 1): ?>
                    <a href="<?php echo e(route('cancelSubPaypal')); ?>" class="btn btn-setting"><i class="fa fa-edit"></i>Cancel Subscription</a>
                  <?php endif; ?>
                <?php else: ?>               
                  <a href="<?php echo e(url('account/purchaseplan')); ?>" class="btn btn-setting">Subscribe Now</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-setting">
          <div class="row">
            <div class="col-md-6">
              <h4 class="panel-setting-heading">Your Payment History</h4>
              <p>View your payment history.</p>
            </div>
            <div class="col-md-offset-3 col-md-3">
              <div class="panel-setting-btn-block text-right">
                <a href="<?php echo e(url('account/billing_history')); ?>" class="btn btn-setting">View Details</a>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>
  <!-- end main wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>