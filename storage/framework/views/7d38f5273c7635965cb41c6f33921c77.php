<?php echo $__env->make('admin.partials.text-input',['name'=>'sub_heading','label'=>__('te.sub-heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.text-input',['name'=>'heading','label'=>__('te.heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.rte',['name'=>'text','label'=>__('te.text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.text-input',['name'=>'button_text','label'=>__('te.button-text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.text-input',['name'=>'button_url','label'=>__('te.button-url')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin.partials.image-input',['name'=>'image','label'=>__('te.image').' (540 x 570)'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<hr>
<h4><?php echo e(__t('work-experience')); ?></h4>
<div class="row">
    <div class="col-md-4">
        <?php echo $__env->make('admin.partials.text-input',['name'=>'number','label'=>__t('number'),'placeholder'=>'19'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-md-4">
        <?php echo $__env->make('admin.partials.text-input',['name'=>'years','label'=>__t('years'),'placeholder'=>__t('years')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-md-4">
        <?php echo $__env->make('admin.partials.text-input',['name'=>'experience-text','label'=>__t('work-experience'),'placeholder'=>__t('work-experience')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<hr>
<h4><?php echo e(__t('about-footer')); ?></h4>
<?php echo $__env->make('admin.partials.textarea',['name'=>'footer_text','label'=>__('te.text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.text-input',['name'=>'footer_button_text','label'=>__('te.button-text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.text-input',['name'=>'footer_button_url','label'=>__('te.button-url')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/edugridstwo/options/homepage-about/form.blade.php ENDPATH**/ ?>