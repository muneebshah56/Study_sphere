<div class="row">
    <?php for($i=1;$i <= 2; $i++): ?>
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title"><?php echo e(__t('service')); ?> <?php echo e($i); ?></h5>
                    <?php echo $__env->make('admin.partials.image-input',['name'=>'file'.$i,'label'=>__('te.image')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.partials.text-input',['name'=>'heading'.$i,'label'=>__('te.heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.partials.rte',['name'=>'text'.$i,'label'=>__('te.text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    <?php endfor; ?>

</div>

<hr>
<h1><?php echo e(__t('information')); ?></h1>
<div class="card">
    <div class="card-body">
        <?php echo $__env->make('admin.partials.text-input',['name'=>'info_heading','label'=>__('te.heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.partials.rte',['name'=>'info_text','label'=>__('te.text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.partials.text-input',['name'=>'button_text','label'=>__t('button-text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.partials.text-input',['name'=>'url','label'=>__t('link')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/buson/options/homepage-services/form.blade.php ENDPATH**/ ?>