<?php for($i=1;$i <= 10; $i++): ?>

<div class="card">
    <div class="card-header">
        <?php echo app('translator')->get('te.image'); ?> <?php echo e($i); ?>

    </div>
    <div class="card-body">
        <?php echo $__env->make('admin.partials.image-input',['name'=>'file'.$i,'label'=>__('te.image')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('admin.partials.text-input',['name'=>'slide_heading'.$i,'label'=>__('te.slide-heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-6">
                <?php echo $__env->make('admin.partials.color-picker',['name'=>'heading_font_color'.$i,'label'=>__t('heading-color')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('admin.partials.text-input',['name'=>'slide_text'.$i,'label'=>__('te.slide-text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-6">
                <?php echo $__env->make('admin.partials.color-picker',['name'=>'text_font_color'.$i,'label'=>__t('text-color')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>


        <?php echo $__env->make('admin.partials.text-input',['name'=>'button_text'.$i,'label'=>__t('button-text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.partials.text-input',['name'=>'url'.$i,'label'=>__t('link')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<hr/>
<br/>

<?php endfor; ?>
<?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/fox/options/slideshow/form.blade.php ENDPATH**/ ?>