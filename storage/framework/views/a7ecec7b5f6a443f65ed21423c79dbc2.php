<?php echo $__env->make('admin.partials.text-input',['name'=>'heading','label'=>__('te.heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.textarea',['name'=>'sub_heading','label'=>__('te.sub-heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php for($i=1;$i <= 6; $i++): ?>

    <div class="card">
        <div class="card-header">
            <?php echo e(__t('testimonial')); ?> <?php echo e($i); ?>

        </div>
        <div class="card-body">
            <?php echo $__env->make('admin.partials.text-input',['name'=>'name'.$i,'label'=>__('default.name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.partials.text-input',['name'=>'role'.$i,'label'=>__('default.role')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.partials.image-input',['name'=>'image'.$i,'label'=>__('te.image').' '.$i.' (300x300)'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.partials.textarea',['name'=>'text'.$i,'label'=>__('te.text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>


<?php endfor; ?>
<?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/edugrids/options/testimonials/form.blade.php ENDPATH**/ ?>