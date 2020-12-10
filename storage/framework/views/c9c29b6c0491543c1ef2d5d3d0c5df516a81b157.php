<?php $__env->startSection('title','Edit Package'); ?>
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/packages')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit Package</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">
          <?php echo Form::model($package, ['method' => 'PATCH', 'action' => ['PackageController@update', $package->id]]); ?>

            <div class="form-group<?php echo e($errors->has('plan_id') ? ' has-error' : ''); ?>">
                <?php echo Form::label('plan_id', 'Your Unique Plan Id'); ?>

                <p class="inline info"> - Please enter your unique plan id for package</p>
                <?php echo Form::text('plan_id', null, ['class' => 'form-control', 'required' => 'required', 'data-toggle' => 'popover','data-content' => 'Create Your Unique Plan ID ex. basic10', 'data-placement' => 'bottom']); ?>

                <small class="text-danger"><?php echo e($errors->first('plan_id')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                <?php echo Form::label('name', 'Plan Name'); ?>

                <p class="inline info"> - Please enter your plan name</p>
                <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

                <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
            </div>
            <?php echo Form::hidden('currency', $currency_code); ?>

    
            <div class="form-group<?php echo e($errors->has('amount') ? ' has-error' : ''); ?>">
                <?php echo Form::label('amount', ' Your Plan Amount'); ?>

                <p class="inline info"> - Please enter your plan amount (Min. Amount should be 1)</p>
                <div class="input-group">
                  <span class="input-group-addon simple-input"><i class="<?php echo e($currency_symbol); ?>"></i></span>
                  <?php echo Form::number('amount', null, ['min' => 1, 'class' => 'form-control', 'required' => 'required']); ?>  
                </div>
                <?php if($package->currency_symbol==''): ?>
                 <input type="text" name="currency_symbol" id="currency_symbol" value="<?php echo e($currency_symbol); ?>" hidden="true">
                 <?php else: ?>
                   <input type="text" name="currency_symbol" id="currency_symbol" value="<?php echo e($package->currency_symbol); ?>" hidden="true">
                 <?php endif; ?>
                <small class="text-danger"><?php echo e($errors->first('amount')); ?></small>
            </div>
             
   <div class="menu-block">
              <h6 class="menu-block-heading">Please Select Menu</h6>
              <?php if(isset($menus) && count($menus) > 0): ?>
                <ul>
                     <li>
                      <div class="inline">
                        <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="100" id="checkbox<?php echo e(100); ?>">
                        <label for="checkbox<?php echo e(100); ?>" class="material-checkbox"></label>
                      </div>
                      All Menus
                    </li>
                  <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                      <div class="inline">
                        <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="<?php echo e($menu->id); ?>" id="checkbox<?php echo e($menu->id); ?>">
                        <label for="checkbox<?php echo e($menu->id); ?>" class="material-checkbox"></label>
                      </div>
                      <?php echo e($menu->name); ?>

                    </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              <?php endif; ?>
            </div>
           
            <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                <?php echo Form::label('status', 'Status'); ?>

                <p class="inline info"> - Please select status</p>
                <?php echo Form::select('status', array('0' => 'Inactive', '1' => 'Active'), null, ['class' => 'form-control select2', 'placeholde' => '']); ?>

                <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
            </div>
            <div class="btn-group pull-right">
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Update</button>
            </div>
            <div class="clear-both"></div>
          <?php echo Form::close(); ?>

        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>