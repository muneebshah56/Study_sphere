<?php echo $__env->make('admin.partials.text-input',['name'=>'client_id','label'=>__lang('paypal-client-id')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.text-input',['name'=>'secret','label'=>__lang('paypal-secret')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.select',['name'=>'mode','label'=>__lang('mode'),'options'=>['1'=>__lang('live'),'0'=>__lang('test')]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<hr>
<h5><?php echo app('translator')->get('default.options'); ?></h5>
<?php echo $__env->make('admin.partials.select',['name'=>'venmo','label'=>'Venmo','options'=>['0'=>__lang('no'),'1'=>__lang('yes')]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.select',['name'=>'paylater','label'=>'Pay Later','options'=>['0'=>__lang('no'),'1'=>__lang('yes')]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<hr>
<?php /**PATH C:\xampp-8.1\htdocs\app\public\gateways/payment/paypal/views/setup.blade.php ENDPATH**/ ?>