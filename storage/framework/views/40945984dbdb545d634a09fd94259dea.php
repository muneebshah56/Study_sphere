<?php echo $__env->make('admin.partials.text-input',['name'=>'heading','label'=>__('te.heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.text-input',['name'=>'text','label'=>__('te.text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php for($i=1;$i <= 3; $i++): ?>

    <div class="card">
        <div class="card-header">
            <?php echo e(__t('step')); ?> <?php echo e($i); ?>

        </div>
        <div class="card-body">
            <?php echo $__env->make('admin.partials.text-input',['name'=>'heading'.$i,'label'=>__t('heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.partials.textarea',['name'=>'text'.$i,'label'=>__('te.text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>


<?php endfor; ?>
<?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/edugridstwo/options/how-it-works/form.blade.php ENDPATH**/ ?>