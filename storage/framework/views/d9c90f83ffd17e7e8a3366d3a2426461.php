<?php for($i=1;$i <= 4; $i++): ?>

    <div class="card">
        <div class="card-header">
            <?php echo e(__lang('image')); ?> <?php echo e($i); ?>

        </div>
        <div class="card-body">
            <?php echo $__env->make('admin.partials.image-input',['name'=>'image'.$i,'label'=>__('te.image').' '.$i], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>


<?php endfor; ?>
<?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/fox/options/footer-gallery/form.blade.php ENDPATH**/ ?>