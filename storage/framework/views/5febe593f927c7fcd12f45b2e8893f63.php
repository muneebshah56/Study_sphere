

<div class="card">

    <div class="card-body">
        <?php echo $__env->make('admin.partials.image-input',['name'=>'file','label'=>__('te.image').' (1920 x 800)'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo $__env->make('admin.partials.text-input',['name'=>'heading','label'=>__t('heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('admin.partials.text-input',['name'=>'sub_heading','label'=>__t('sub-heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-6">
                <?php echo $__env->make('admin.partials.color-picker',['name'=>'heading_font_color','label'=>__t('heading-color')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('admin.partials.textarea',['name'=>'text','label'=>__t('text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-6">
                <?php echo $__env->make('admin.partials.color-picker',['name'=>'text_font_color','label'=>__t('text-color')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <h5><?php echo e(__t('button')); ?></h5>
                <?php echo $__env->make('admin.partials.text-input',['name'=>'button_text','label'=>__t('button-text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.partials.text-input',['name'=>'url','label'=>__t('link')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

        </div>



    </div>
</div>



<?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/edugridstwo/options/slideshow/form.blade.php ENDPATH**/ ?>