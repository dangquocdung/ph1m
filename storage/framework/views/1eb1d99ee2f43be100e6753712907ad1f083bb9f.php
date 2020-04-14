<?php $__env->startSection('title','Reports'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-main-block mrg-t-40">
    <h4 class="admin-form-text">All Reports</h4>
    <div class="content-block box-body">
      <table id="full_detail_table" class="table table-hover">
        <thead>
        <tr class="table-heading-row">
          <th>#</th>
          <th>Date</th>
          <th>Subscribed Package</th>
          <th>Paid Amount</th>
          <th>Method</th>
          <th>User</th>
        </tr>
        </thead>
        <tbody>
          <?php if(isset($all_reports) && count($all_reports->data) > 0): ?>
            <?php
              $sell = null;
            ?>
            <?php $__currentLoopData = $all_reports->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $date = date("d/m/Y", $report->start);
                $customer_id = \Stripe\Customer::retrieve($report->customer);
                $user = Illuminate\Support\Facades\DB::table('users')->where('email', '=', $customer_id->email)->first();
                $sell = $sell + (($report->plan->amount/100));
              ?>
              <tr>
                <td>
                  <?php echo e($key+1); ?>

                </td>
                <td>
                  <?php echo e($date); ?>

                </td>
                <td>
                  <?php echo e($report->items->data[0]->plan->id); ?>

                </td>
                <td>
                  <i class="<?php echo e($currency_symbol); ?>"></i> <?php echo e($report->plan->amount/100); ?>

                </td>
                <td>
                  Stripe
                </td>
                <td>
                  <?php if(isset($user)): ?>
                    <?php echo e($user->name ? $user->name : ''); ?>

                  <?php else: ?>
                    User Removed
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
          <?php if(isset($paypal_subscriptions) && count($paypal_subscriptions) > 0): ?>
            <?php $__currentLoopData = $paypal_subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $date = $item->created_at->toDateString();
                $sell = $sell + $item->price;
              ?>
              <tr>
                <td>
                  <?php echo e($key+1); ?>

                </td>
                <td>
                  <?php echo e($date); ?>

                </td>
                <td>
                  <?php echo e($item->plan ? $item->plan->name : 'N/A'); ?>

                </td>
                <td>
                  <i class="<?php echo e($currency_symbol); ?>"></i> <?php echo e($item->price); ?>

                </td>
                <td>
                  Paypal
                </td>
                <td>
                  <?php echo e($item->user ? $item->user->name : 'N/A'); ?>

                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </tbody>
      </table>
      <div class="total-sell" style="margin-top: 20px">
        <h5>Total Sells <i class="<?php echo e($currency_symbol); ?>"></i><?php echo e(isset($sell) ? $sell : ''); ?></h5>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>