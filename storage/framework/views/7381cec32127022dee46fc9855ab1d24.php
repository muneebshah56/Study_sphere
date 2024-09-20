<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.report.index')=>__lang('reports'),
            '#'=>__lang('classes')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-pills" role="tablist">
            <li  class="nav-item"><a class="nav-link active"  href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo e(__lang('Report')); ?></a></li>
            <li  class="nav-item"><a class="nav-link"  href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo e(__lang('Totals')); ?></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__lang('classes')); ?></th>
                        <?php if($session->type=='c'): ?>
                            <th><?php echo e(__lang('lectures')); ?></th>
                        <?php endif; ?>
                        <th><?php echo e(__lang('students-completed')); ?></th>
                        <th><?php echo e(__lang('completion-percentage')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $session->lessons()->orderBy('pivot_sort_order')->orderBy('pivot_lesson_date')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($row->name); ?></td>
                            <?php if($session->type=='c'): ?>
                                <td><?php echo e($row->lectures()->count()); ?></td>
                            <?php endif; ?>
                            <?php
                            $totalAttended = $attendanceTable->getTotalStudentsForSessionAndLesson($session->session_id,$row->id);
                             ?>
                            <td><?php echo e($totalAttended); ?></td>
                            <?php
                            $total = $session->studentCourses()->count();
                            if(empty($total)){
                            $total=1;
                            }
                             ?>
                            <td><?php echo e(($totalAttended/$total)*100); ?>%</td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                <table class="table table-striped">
                    <tr>
                        <td style="width: 30%"><?php echo e(__lang('enrolled-students')); ?>:</td>
                        <td><?php echo e($session->studentCourses()->count()); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__lang('total-classes')); ?>:</td>
                        <td><?php echo e($session->lessons()->count()); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__lang('total-students-attended')); ?>:</td>
                        <td><?php echo e($attendanceTable->getTotalStudentsForSession($id)); ?></td>
                    </tr>

                </table>
            </div>
        </div>

    </div>










<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.report.report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/report/classes.blade.php ENDPATH**/ ?>