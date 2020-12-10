<?php $__env->startSection('title',"Edit: $a_lan->language"); ?>
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/audio_language')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Create Language</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">
        <?php echo Form::model($a_lan, ['method' => 'PATCH', 'action' => ['AudioLanguageController@update', $a_lan->id]]); ?>

          <div class="form-group<?php echo e($errors->has('language') ? ' has-error' : ''); ?>">
            <?php echo Form::label('language', 'Language'); ?>

            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter audio and subtitle language eg:English"></i>
            <?php echo Form::text('language', null, ['class' => 'form-control', 'required' => 'required']); ?>

            <small class="text-danger"><?php echo e($errors->first('language')); ?></small>
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