<?php $__env->startSection('title', 'Page Setting'); ?>

<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
<div class="tabsetting">
  <a href="<?php echo e(url('admin/settings')); ?>" style="color: #7f8c8d;" ><button class="tablinks">Genral Setting</button></a>
  <a href="<?php echo e(url('admin/seo')); ?>" style="color: #7f8c8d;" ><button class="tablinks">SEO Setting</button></a>
  <a href="<?php echo e(url('admin/api-settings')); ?>" style="color: #7f8c8d;"><button class="tablinks">API Setting</button></a>
  <a href="<?php echo e(route('mail.getset')); ?>" style="color: #7f8c8d;"><button class="tablinks">Mail Setting</button></a>
  <a href="#" style="color: #7f8c8d;"><button class="tablinks active">Page Setting</button></a>
</div>
<div class="content-block box-body">

      
      <div style="display: none;" id="ss" class="alert alert-info">
        
      </div>
    
    <table id="full_detail_table" class="table table-hover">
      <thead>
        <tr class="table-heading-row">
        <th>#</th>
        <th>Page Name</th>
        <th>Page Status</th>
        <th>Action</th>
        </tr>
      </thead>
      <?php $i=0;?>
      <tbody>
        <tr>
          <td>1</td>
          <td class="ht"><?php echo e($ht1->key); ?></td>
          <td><?php if($ht1->status==1): ?> Active <?php else: ?> Deactive <?php endif; ?></td>
          
          <td>
            <form action="<?php echo e(route('pageset.update',$ht1->id)); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

              <?php if($ht1->status==1): ?>
              <input type="submit" name="submit" value="OFF" class="btn btn-sm btn-danger"/>
              <?php else: ?>
              <input type="submit" name="submit" value="ON" class="btn btn-sm btn-success"/>
              <?php endif; ?>
            </form>
          </td>
        </tr>

        <tr>
          <td>2</td>
          <td class="ht"><?php echo e($ht2->key); ?></td>
          <td><?php if($ht2->status==1): ?> Active <?php else: ?> Deactive <?php endif; ?></td>
         
          <td>
            <form action="<?php echo e(route('pageset.update',$ht2->id)); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

              <?php if($ht2->status==1): ?>
              <input type="submit" name="submit" value="OFF" class="btn btn-sm btn-danger"/>
              <?php else: ?>
              <input type="submit" name="submit" value="ON" class="btn btn-sm btn-success"/>
              <?php endif; ?>
            </form>
          </td>
        </tr>

        <tr>
          <td>3</td>
          <td class="ht"><?php echo e($ht3->key); ?></td>

          <td><?php if($ht3->status==1): ?> Active <?php else: ?> Deactive <?php endif; ?></td>
         
          <td>
            <form action="<?php echo e(route('pageset.update',$ht3->id)); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

              <?php if($ht3->status==1): ?>
              <input type="submit" name="submit" value="OFF" class="btn btn-sm btn-danger"/>
              <?php else: ?>
              <input type="submit" name="submit" value="ON" class="btn btn-sm btn-success"/>
              <?php endif; ?>
            </form>
          </td>
        </tr>

        <tr>
          <td>4</td>
          <td class="ht"><?php echo e($ht4->key); ?> Language</td>
          <td><?php if($ht4->status==1): ?> Active <?php else: ?> Deactive <?php endif; ?></td>
          
          <td>
            <form action="<?php echo e(route('pageset.update',$ht4->id)); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

              <?php if($ht4->status==1): ?>
              <input type="submit" name="submit" value="OFF" class="btn btn-sm btn-danger"/>
              <?php else: ?>
              <input type="submit" name="submit" value="ON" class="btn btn-sm btn-success"/>
              <?php endif; ?>
            </form>
          </td>
        </tr>

        <tr>
          <td>5</td>
          <td class="ht"><?php echo e($ht5->key); ?> Language</td>
          <td><?php if($ht5->status==1): ?> Active <?php else: ?> Deactive <?php endif; ?></td>
         
          <td>
            <form action="<?php echo e(route('pageset.update',$ht5->id)); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

              <?php if($ht5->status==1): ?>
              <input type="submit" name="submit" value="OFF" class="btn btn-sm btn-danger"/>
              <?php else: ?>
              <input type="submit" name="submit" value="ON" class="btn btn-sm btn-success"/>
              <?php endif; ?>
            </form>
          </td>
        </tr>

        <tr>
          <td>6</td>
          <td class="ht"><?php echo e($ht6->key); ?> Genre</td>
          <td><?php if($ht6->status==1): ?> Active <?php else: ?> Deactive <?php endif; ?></td>
          
          <td>
            <form action="<?php echo e(route('pageset.update',$ht6->id)); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

              <?php if($ht6->status==1): ?>
              <input type="submit" name="submit" value="OFF" class="btn btn-sm btn-danger"/>
              <?php else: ?>
              <input type="submit" name="submit" value="ON" class="btn btn-sm btn-success"/>
              <?php endif; ?>
            </form>
          </td>
        </tr>

        <tr>
          <td>7</td>
          <td class="ht"><?php echo e($ht7->key); ?> Genre</td>
          <td><?php if($ht7->status==1): ?> Active <?php else: ?> Deactive <?php endif; ?></td>
          
          <td>
            <form action="<?php echo e(route('pageset.update',$ht7->id)); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

              <?php if($ht7->status==1): ?>
              <input type="submit" name="submit" value="OFF" class="btn btn-sm btn-danger"/>
              <?php else: ?>
              <input type="submit" name="submit" value="ON" class="btn btn-sm btn-success"/>
              <?php endif; ?>
            </form>
          </td>
        </tr>

        <tr>
          <td>8</td>
          <td class="ht"><?php echo e($ht8->key); ?> Genre</td>
          <td><?php if($ht8->status==1): ?> Active <?php else: ?> Deactive <?php endif; ?></td>
         
          <td>
            <form action="<?php echo e(route('pageset.update',$ht8->id)); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

              <?php if($ht8->status==1): ?>
              <input type="submit" name="submit" value="OFF" class="btn btn-sm btn-danger"/>
              <?php else: ?>
              <input type="submit" name="submit" value="ON" class="btn btn-sm btn-success"/>
              <?php endif; ?>
            </form>
          </td>
        </tr>
      </tbody>
    </table>

</div>  
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>