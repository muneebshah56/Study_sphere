<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th><?php echo e(__lang('message')); ?></th>
        <th><?php echo e(__lang('description')); ?></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($template->id); ?></td>
            <td><?php echo e(__lang('s-template-name-'.$template->id)); ?></td>
            <td><?php echo e(__lang('s-template-desc-'.$template->id)); ?></td>
            <td><a class="btn btn-primary" href="<?php echo e(adminUrl(['controller'=>'messages','action'=>'editsms','id'=>$template->id])); ?>"> <i class="fa fa-edit"></i> <?php echo e(__lang('edit')); ?></a></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($templates->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/messages/sms.blade.php ENDPATH**/ ?>