<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row mb-3">
    <div class="col-md-8">
        <?php echo e(__lang('coupon-help')); ?>

    </div>
    <div class="col-md-4">
        <a class="btn btn-primary float-right" href="<?php echo e(adminUrl(['controller'=>'payment','action'=>'addcoupon'])); ?>"><i class="fa fa-plus"></i> <?php echo e(__lang('Add Coupon')); ?></a>

    </div>

</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th><?php echo e(__lang('name')); ?></th>
        <th><?php echo e(__lang('code')); ?></th>
        <th><?php echo e(__lang('discount')); ?></th>
        <th><?php echo e(__lang('enabled')); ?></th>
        <th><?php echo e(__lang('starts')); ?></th>
        <th><?php echo e(__lang('ends')); ?></th>
        <th><?php echo e(__lang('times-used')); ?></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($coupons as $coupon): ?>
        <tr>
            <td><?php echo e($coupon->name); ?></td>
            <td><?php echo e($coupon->code); ?></td>
            <td><?php echo e($coupon->discount); ?><?php if($coupon->type=='P'):  ?>%<?php endif; ?></td>
            <td><?php echo e(boolToString($coupon->enabled)); ?></td>
            <td><?php echo e(showDate('d/M/Y',$coupon->date_start)); ?></td>
            <td><?php echo e(showDate('d/M/Y',$coupon->expires_on)); ?></td>
            <td><?php echo e($coupon->invoices()->count()); ?></td>
            <td>
                <a class="btn btn-primary" href="<?php echo e(adminUrl(['controller'=>'payment','action'=>'editcoupon','id'=>$coupon->id          ])); ?>"><i class="fa fa-edit"></i> <?php echo e(__lang('edit')); ?></a>
                <a onclick="return confirm('<?php echo e(__lang('delete-confirm')); ?>')" class="btn btn-danger" href="<?php echo e(adminUrl(['controller'=>'payment','action'=>'deletecoupon','id'=>$coupon->id          ])); ?>"><i class="fa fa-trash"></i> <?php echo e(__lang('delete')); ?></a>
            </td>
        </tr>
    <?php endforeach;  ?>
    </tbody>
</table>
<?php echo e($coupons->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/payment/coupons.blade.php ENDPATH**/ ?>