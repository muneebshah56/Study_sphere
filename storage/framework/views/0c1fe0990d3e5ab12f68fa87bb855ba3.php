<?php echo $__env->make('admin.partials.image-input',['name'=>'image','label'=>__('te.background-image').' (1920x1360)'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <?php for($i=1;$i <= 4; $i++): ?>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(__t('item')); ?> <?php echo e($i); ?></h5>
                    <?php echo $__env->make('admin.partials.text-input',['name'=>'heading'.$i,'label'=>__('te.heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.partials.text-input',['name'=>'text'.$i,'label'=>__('te.text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    <?php endfor; ?>

</div>



<?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/edugrids/options/highlights/form.blade.php ENDPATH**/ ?>