<?php echo $__env->make('admin.partials.text-input',['name'=>'heading','label'=>__('te.heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.textarea',['name'=>'description','label'=>__lang('description')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.text-input',['name'=>'limit','label'=>__('te.post-limit'),'class'=>'number'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/fox/options/blog/form.blade.php ENDPATH**/ ?>