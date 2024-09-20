<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form class="form" action="<?php echo selfURL(); ?>" method="post">
<?php echo csrf_field(); ?>
    <div class="form-group">
        <?php echo formLabel($form->get('grade')); ?>

        <?php echo formElement($form->get('grade')); ?>

    </div>
    <div class="form-group">
        <?php echo formLabel($form->get('min')); ?>

        <?php echo formElement($form->get('min')); ?>

    </div>
    <div class="form-group">
        <?php echo formLabel($form->get('max')); ?>

        <?php echo formElement($form->get('max')); ?>

    </div>

    <button class="btn btn-primary" type="submit"><?php echo e(__lang('submit')); ?></button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/setting/gradeform.blade.php ENDPATH**/ ?>