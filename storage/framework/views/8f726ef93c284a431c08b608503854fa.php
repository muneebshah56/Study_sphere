<div class="row">
    <?php for($i=1;$i <= 4; $i++): ?>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(__t('service')); ?> <?php echo e($i); ?></h5>
                    <?php echo $__env->make('admin.partials.text-input',['name'=>'icon'.$i,'label'=>__t('icon-class'),'placeholder'=>'fa fa-user'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.partials.text-input',['name'=>'heading'.$i,'label'=>__('te.heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.partials.rte',['name'=>'text'.$i,'label'=>__('te.text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>


<?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/fox/options/homepage-services/form.blade.php ENDPATH**/ ?>