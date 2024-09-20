<?php $__env->startSection('page-title',$method->label); ?>


<?php $__env->startSection('payment-content'); ?>

    <p>
        <?php echo $instructions; ?>

    </p>

    <table class="table table-striped">
       <tr>
           <th><?php echo e(__lang('amount')); ?></th>
           <td><?php echo e(price(getCart()->getCurrentTotal())); ?></td>
       </tr>
        <tr>
            <th><?php echo e(__lang('invoice-id')); ?></th>
            <td><?php echo e($invoice->id); ?></td>
        </tr>

    </table>
    <div class="text-center">
        <a href="<?php echo e(route('cart.method',['code'=>$code,'function'=>'traineasy_complete'])); ?>" class="btn btn-success btn-block"><i class="fa fa-check-circle"></i> <?php echo e(__lang('complete-order')); ?></a>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.checkout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\public\gateways/payment/bank/views/pay.blade.php ENDPATH**/ ?>