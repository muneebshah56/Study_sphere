<?php $__env->startSection('pageTitle',$pageTitle); ?>
<?php $__env->startSection('innerTitle',$pageTitle); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            route('student.test.index')=>__lang('tests'),
            '#'=> __lang('test-results')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo e(__lang('taken-on')); ?></th>
            <th><?php echo e(__lang('Score')); ?></th>
            <th><?php echo e(__lang('Grade')); ?></th>
            <th><?php echo e(__lang('Status')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $rowset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e(showDate('d/M/Y',$row->created_at)); ?></td>
                <td><?php echo e(round($row->score)); ?></td>
                <td><?php echo e($gradeTable->getGrade($row->score)); ?></td>
                <td><?php if($row->score >= $test->passmark): ?>
                <span style="color: green"><?php echo e(__lang('Passed')); ?></span>
                <?php else: ?>
                        <span style="color: red"><?php echo e(__lang('Failed')); ?></span>
                    <?php endif; ?>
                </td>

            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>


</table>

<?php echo $rowset->links(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/student/test/testresults.blade.php ENDPATH**/ ?>