<?php echo $__env->make('admin.partials.color-picker',['name'=>'slider_background','label'=>__('te.background-color')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php for($i=1;$i <= 10; $i++): ?>

<div class="card">
    <div class="card-header">
        <?php echo app('translator')->get('te.image'); ?> <?php echo e($i); ?>

    </div>
    <div class="card-body">
        <?php echo $__env->make('admin.partials.image-input',['name'=>'file'.$i,'label'=>__('te.image').' (1600 x 680)'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo $__env->make('admin.partials.text-input',['name'=>'slide_heading'.$i,'label'=>__('te.slide-heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('admin.partials.text-input',['name'=>'sub_heading'.$i,'label'=>__('te.sub-heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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


        <div class="row">
            <div class="col-md-6">
                <h5><?php echo e(__t('button')); ?> 1</h5>
                <?php echo $__env->make('admin.partials.text-input',['name'=>'button_1_text'.$i,'label'=>__t('button-text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.partials.text-input',['name'=>'url_1'.$i,'label'=>__t('link')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-6">
                <h5><?php echo e(__t('button')); ?> 2</h5>
                <?php echo $__env->make('admin.partials.text-input',['name'=>'button_2_text'.$i,'label'=>__t('button-text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.partials.text-input',['name'=>'url_2'.$i,'label'=>__t('link')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>



    </div>
</div>
<hr/>
<br/>

<?php endfor; ?>
<?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/edugrids/options/slideshow/form.blade.php ENDPATH**/ ?>