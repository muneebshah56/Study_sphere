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
         <a class="btn btn-primary" href="<?php echo e(adminUrl(['controller'=>'setting','action'=>'addtestgrade'])); ?>"><i class="fa fa-plus"></i> <?php echo e(__lang('Add Grade')); ?></a>

     </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?php echo e(__lang('Grade')); ?></th>
                <th><?php echo e(__lang('Minimum')); ?></th>
                <th><?php echo e(__lang('Maximum')); ?></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($grade->grade); ?></td>
                    <td><?php echo e($grade->min); ?></td>
                    <td><?php echo e($grade->max); ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo e(adminUrl(['controller'=>'setting','action'=>'edittestgrade','id'=>$grade->id])); ?>"><i class="fa fa-edit"></i> <?php echo e(__lang('Edit')); ?></a>
                        <a class="btn btn-danger" onclick="return confirm('<?php echo e(__lang('delete-confirm')); ?>')" href="<?php echo e(adminUrl(['controller'=>'setting','action'=>'deletetestgrade','id'=>$grade->id])); ?>"><i class="fa fa-trash"></i> <?php echo e(__lang('Delete')); ?></a>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/setting/testgrades.blade.php ENDPATH**/ ?>