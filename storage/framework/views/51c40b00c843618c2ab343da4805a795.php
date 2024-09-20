<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <?php echo e(__lang('change-language')); ?>

    </div>
    <div class="card-body">
        <form method="post" action="<?php echo e(selfURL()); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="password1" class="control-label"><?php echo e(formLabel($select)); ?></label>
                <?php echo e(formElement($select)); ?>   <p class="help-block"><?php echo e(formElementErrors($select)); ?></p>

            </div>


            <div class="form-footer">
                <button type="submit" class="btn btn-primary"><?php echo e(__lang('submit')); ?></button>
            </div>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/setting/language.blade.php ENDPATH**/ ?>