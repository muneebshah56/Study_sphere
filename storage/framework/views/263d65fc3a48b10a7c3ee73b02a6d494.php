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

<div class="card-body">


<form method="post" action="<?php echo e(adminUrl(array('controller'=>'account','action'=>'email'))); ?>">
<?php echo csrf_field(); ?>
<div class="form-group">
<label for="email"><?php echo e(__lang('new-email')); ?></label>
<input class="form-control" type="text" name="email" required="required"/>

</div>
	<div class="form-footer">
								<button type="submit" class="btn btn-primary"><?php echo e(__lang('submit')); ?></button>
							</div>

</form>


</div>

</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/account/email.blade.php ENDPATH**/ ?>