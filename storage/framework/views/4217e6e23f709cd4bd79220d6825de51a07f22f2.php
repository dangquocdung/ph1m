<?php $__env->startSection('title','Contact us'); ?>
<?php $__env->startSection('main-wrapper'); ?>

 <div class="container" style="background-color: #333333;">
 	<br>
 		<?php if(Session::has('success')): ?>
 		<div class="alert alert-success">
 			Success : <?php echo e(Session::get('success')); ?>

 		</div>
 		<?php endif; ?>
 	<h3 class="text-center">CONTACT <span class="us_text">US</span></h3>
 	<br>
 	<h5 class="text-center">REACH OUT TO US FOR ANY QUERIES, SUGGESTIONS OR FEEDBACK !</h5>
 	<form action="<?php echo e(route('send.contactus')); ?>" method="post">
 		<?php echo e(csrf_field()); ?>

    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
 	<label style="color: #fff;" for="">Name:</label>
 	<input type="text" class="form-control custom-field-contact" name="name">
 	<?php if($errors->has('name')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
    <?php endif; ?>
 	</div>

 	<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
 	<label style="color: #fff;" for="">Email:</label>
 	<input type="email" class="search-input form-control custom-field-contact" name="email">
 	<?php if($errors->has('email')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
    <?php endif; ?>
 	</div>

 	<div class="form-group<?php echo e($errors->has('subj') ? ' has-error' : ''); ?>">
 	<label style="color: #fff;" for="">Subject:</label>
 	<select name="subj" id="" class="form-control custom-field-contact">
 		<option value="Billing Issue">Billing Issue</option>
 		<option value="Streaming Issue">Streaming Issue</option>
 		<option value="Application Issue">Application Issue</option>
 		<option value="Advertising">Advertising</option>
 		<option value="Partnership">Partnership</option>
 		<option value="Other">Other</option>
 	</select>
 	<?php if($errors->has('subj')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('subj')); ?></strong>
                </span>
    <?php endif; ?>
 	</div>

 	<div class="form-group<?php echo e($errors->has('msg') ? ' has-error' : ''); ?>">
 	<label style="color: #fff;" for="">Message:</label>
 	<textarea name="msg" class="form-control custom-field-contact" rows="5" cols="50"></textarea>
 	<?php if($errors->has('msg')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('msg')); ?></strong>
                </span>
    <?php endif; ?>
 	</div>

 	<input type="submit" class="btn btn-primary" value="Send"> 
 	</form>
 	
 	<br>
 </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>