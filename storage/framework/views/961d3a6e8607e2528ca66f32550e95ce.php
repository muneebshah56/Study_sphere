<?php for($i=1;$i <= 12; $i++): ?>

    <div class="row">
        <div class="col-md-4">
            <?php echo $__env->make('admin.partials.image-input',['name'=>'image'.$i,'label'=>__('te.image').' '.$i.' (230x95)'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

<?php endfor; ?>
<?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/edugrids/options/icons/form.blade.php ENDPATH**/ ?>