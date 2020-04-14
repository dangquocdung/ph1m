<?php $__env->startSection('title',$footer_translations->where('key', 'terms and condition') ? $footer_translations->where('key', 'terms and condition')->first->value->value : ''); ?>
<?php $__env->startSection('main-wrapper'); ?>
  <!-- main wrapper -->
  <section id="main-wrapper" class="main-wrapper home-page user-account-section">
    <div class="container-fluid faq-main-block">
      <h4 class="heading"><?php echo e($footer_translations->where('key', 'terms and condition') ? $footer_translations->where('key', 'terms and condition')->first->value->value : ''); ?></h4>
      <ul class="bradcump">
        <li><a href="<?php echo e(url('account')); ?>">Dashboard</a></li>
        <li>/</li>
        <li>Terms and Condition</li>
      </ul>
      <div class="panel-setting-main-block">
        <div class="panel-setting">
          <div class="row">
            <div class="col-md-9">              
              <?php if(isset($term_con)): ?>
                <div class="info"><?php echo $term_con; ?></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end main wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>