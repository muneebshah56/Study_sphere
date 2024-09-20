<?php $__env->startSection('page-class'); ?>
    class="col-md-6 offset-md-3"
<?php $__env->stopSection(); ?>

<?php $__env->startSection('back',route('cart')); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <h4><?php echo $__env->yieldContent('page-title'); ?></h4>
            <div class="card-header-action">
                <a title="<?php echo e(__lang('your-cart')); ?>" data-toggle="tooltip" data-placement="top" href="<?php echo e(route('cart')); ?>" class="btn btn-icon btn-primary"><i class="fa fa-cart-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <?php echo $__env->yieldContent('payment-content'); ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/layouts/checkout.blade.php ENDPATH**/ ?>