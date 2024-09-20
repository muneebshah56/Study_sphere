<?php $__env->startSection('page-title',__('default.email-confirmation')); ?>

<?php $__env->startSection('content'); ?>


    <div class="card card-primary">
     <div class="card-header">
               <h4><?php echo app('translator')->get('default.email-confirmation'); ?></h4>
    </div>
    <div class="card-body">
        <div class="card-title"><h4><?php echo app('translator')->get('default.confirm-your-email'); ?></h4></div>

        <p><?php echo app('translator')->get('default.email-confirmation-msg'); ?></p>
    </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/auth/confirm.blade.php ENDPATH**/ ?>