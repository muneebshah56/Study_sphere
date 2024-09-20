<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.report.index')=>__lang('reports'),
            '#'=>__lang('tests')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-pills" role="tablist">
            <li   class="nav-item"><a class="nav-link active" href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo e(__lang('overview')); ?></a></li>
            <li  class="nav-item"><a  class="nav-link" href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo e(__lang('student-scores')); ?></a></li>
            <li  class="nav-item"><a  class="nav-link" href="#cards" aria-controls="cards" role="tab" data-toggle="tab"><?php echo e(__lang('report-cards')); ?></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <table class="table table-striped datatable">
                    <thead>
                    <tr>
                        <th><?php echo e(__lang('test')); ?></th>
                        <th><?php echo e(__lang('questions')); ?></th>
                        <th><?php echo e(__lang('passmark')); ?></th>
                        <th><?php echo e(__lang('attempts')); ?></th>
                        <th><?php echo e(__lang('created-by')); ?></th>
                        <th><?php echo e(__lang('average-score')); ?></th>
                        <th><?php echo e(__lang('average-grade')); ?></th>
                        <th><?php echo e(__lang('total-passed')); ?></th>
                        <th><?php echo e(__lang('total-failed')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $allTests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $test = \App\Test::find($testId);  ?>
                        <?php if($test): ?>
                            <tr>
                                <td><?php echo e($test->name); ?></td>
                                <td><?php echo e($test->testQuestions()->count()); ?></td>
                                <td><?php echo e($test->passmark); ?>%</td>
                                <td><?php echo e($test->studentTests()->count()); ?></td>
                                <td><?php echo e($test->admin->user->name); ?> <?php echo e($test->admin->user->last_name); ?></td>
                                <td><?php echo e(round($test->studentTests()->avg('score'),1)); ?></td>
                                <td><?php echo e($testGradeTable->getGrade($test->studentTests()->avg('score'))); ?></td>
                                <td><?php echo e($test->studentTests()->where('score','>=',$test->passmark)->count()); ?></td>
                                <td><?php echo e($test->studentTests()->where('score','<',$test->passmark)->count()); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                    <tr>
                        <th><?php echo e(__lang('student')); ?></th>
                        <th><?php echo e(__lang('average-score')); ?></th>
                        <th><?php echo e(__lang('average-grade')); ?></th>
                        <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th>
                                <?php echo e(limitLength($test->name,30)); ?>

                            </th>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $rowset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $student = \App\Student::find($row->id)  ?>
                            <?php if($student): ?>
                                <tr>
                                <?php  $stats = $controller->getStudentTestsStats($row->id);  ?>
                                <td><?php echo e($student->user->name); ?> <?php echo e($student->user->last_name); ?></td>
                                <td><?php echo e(round($stats['average'],1)); ?>%</td>
                                <td><?php echo e($testGradeTable->getGrade($stats['average'])); ?></td>
                                <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <td>
                                       <?php  $result =$test->studentTests()->where('student_id',$student->id)->orderBy('score','desc')->first()  ?>
                                       <?php if($result): ?>
                                           <?php echo e(round($result->score,1)); ?>% (<?php echo e($testGradeTable->getGrade($result->score)); ?>)
                                           <?php endif; ?>
                                   </td>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
</div>
            </div>
            <div role="tabpanel" class="tab-pane" id="cards">
                <table class="table-stripped table" id="reportcards">
                    <thead>
                    <tr>
                        <th><?php echo e(__lang('student')); ?></th>
                        <th><?php echo e(__lang('average-score')); ?></th>
                        <th><?php echo e(__lang('average-grade')); ?></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $rowset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $student = \App\Student::find($row->id)  ?>
                        <?php if($student): ?>
                            <?php  $stats = $controller->getStudentTestsStats($row->id);  ?>
                            <tr>
                                <td><?php echo e($student->user->name); ?> <?php echo e($student->user->last_name); ?></td>
                                <td><?php echo e(round($stats['average'],1)); ?>%</td>
                                <td><?php echo e($testGradeTable->getGrade($stats['average'])); ?></td>
                                <td><a class="btn btn-primary" href="<?php echo e(adminUrl(['controller'=>'report','action'=>'reportcard','id'=>$student->id])); ?>?sessionId=<?php echo e($session->id); ?>"><i class="fa fa-download"></i> <?php echo e(__lang('Download')); ?></a></td>
                            </tr>

                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>


                </div>
        </div>

    </div>





<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
     <script type="text/javascript">
        $(function(){
            $('#reportcards').DataTable();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.report.report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/report/tests.blade.php ENDPATH**/ ?>