<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.report.index')=>__lang('reports'),
            '#'=>__lang('students')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active"  href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo e(__lang('Report')); ?></a></li>
            <li class="nav-item"><a class="nav-link"  href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo e(__lang('Totals')); ?></a></li>
            <li class="nav-item"><a class="nav-link"  href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><?php echo e(__lang('Classes')); ?></a></li>
            <li class="nav-item"><a class="nav-link"  href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><?php echo e(__lang('Tests')); ?></a></li>
            <li class="nav-item"><a class="nav-link"  href="#homework" aria-controls="homework" role="tab" data-toggle="tab"><?php echo e(__lang('Homework')); ?></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__lang('student-name')); ?></th>
                        <th><?php echo e(__lang('enrolled-on')); ?></th>
                        <th><?php echo e(__lang('classes-attended')); ?></th>
                        <th><?php echo e(__lang('progress')); ?></th>
                        <th><?php echo e(__lang('tests-taken')); ?></th>
                        <th><?php echo e(__lang('average-test-score')); ?></th>
                        <th><?php echo e(__lang('test-grade')); ?></th>
                        <th><?php echo e(__lang('homework-submitted')); ?></th>
                        <th><?php echo e(__lang('average-homework-score')); ?></th>
                        <th><?php echo e(__lang('homework-grade')); ?></th>
                        <th><?php echo e(__lang('instructor-chats')); ?></th>
                        <th><?php echo e(__lang('forum-topics')); ?></th>
                        <th><?php echo e(__lang('forum-posts')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $rowset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $student = \App\Student::find($row->id)  ?>
                        <?php if($student): ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td>
                                    <?php if($student->user): ?>
                                    <?php echo e($student->user->name.' '.$student->user->last_name); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                    $enrollment = $student->studentCourses()->where('course_id',$id)->first();
                                     ?>
                                    <?php if($enrollment): ?>
                                        <?php echo e(showDate('d/M/Y',$enrollment->created_at)); ?>

                                    <?php endif; ?>
                                </td>
                                <?php
                                $attendance = $student->attendances()->where('course_id',$id)->count();
                                ?>
                                <td><?php echo e($attendance); ?></td>

                                <td>

                                    <?php
                                    echo round(($attendance/$totalSessionLessons)*100)
                                    ?>%
                                </td>
                                <?php
                                $testStats = $controller->getStudentTestsStats($row->id);
                                ?>
                                <td>
                                    <?php echo e($testStats['testsTaken']); ?>

                                </td>
                                <td>
                                    <?php echo e($testStats['average']); ?>

                                </td>
                                <td>
                                    <?php echo e($testGradeTable->getGrade($testStats['average'])); ?>

                                </td>
                                <?php
                                $homeworkStats = $controller->getStudentAssignmentStats($row->id);
                                ?>
                                <td>
                                    <?php echo e($homeworkStats['submissions']); ?>

                                </td>
                                <td>
                                    <?php echo e($homeworkStats['average']); ?>

                                </td>
                                <td>
                                    <?php echo e($testGradeTable->getGrade($homeworkStats['average'])); ?>

                                </td>

                                <td>
                                    <?php echo e($student->discussions()->where('course_id',$id)->count()); ?>

                                </td>
                                <td>
                                    <?php echo e($student->user->forumTopics()->where('course_id',$id)->whereHas('user',function ($q){
                                            $q->where('role_id',2);
                                    })->count()); ?>

                                </td>
                                <td>
                                    <?php echo e($controller->getStudentTotalPosts($row->id)); ?>

                                </td>


                            </tr>
                        <?php endif; ?>
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
                    <tr>
                        <td><?php echo e(__lang('total-tests')); ?>:</td>
                        <td><?php echo e(count($allTests)); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__lang('total-homework')); ?>:</td>
                        <td><?php echo e($session->assignments()->count()); ?></td>
                    </tr>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages">
                <table class="table table-striped datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__lang('class')); ?></th>
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
                            $totalAttended = $attendanceTable->getTotalStudentsForSessionAndLesson($session->id,$row->id);
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
            <div role="tabpanel" class="tab-pane" id="settings">

                <table class="table table-striped datatable">
                    <thead>
                    <tr>
                        <th><?php echo e(__lang('test')); ?></th>
                        <th><?php echo e(__lang('questions')); ?></th>
                        <th><?php echo e(__lang('passmark')); ?></th>
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
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="homework">


                <table class="table table-striped datatable">
                    <thead>
                    <tr>
                        <th><?php echo e(__lang('homework')); ?></th>
                        <th><?php echo e(__lang('created-on')); ?></th>
                        <th><?php echo e(__lang('due-date')); ?></th>
                        <th><?php echo e(__lang('created-by')); ?></th>
                        <th><?php echo e(__lang('passmark')); ?></th>
                        <th><?php echo e(__lang('submissions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $session->assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($assignment->title); ?></td>
                                <td><?php echo e(showDate('d/M/Y',$assignment->created_at)); ?></td>
                                <td><?php echo e(showDate('d/M/Y',$assignment->due_date)); ?></td>
                                <td><?php echo e($assignment->admin->user->name); ?> <?php echo e($assignment->admin->user->last_name); ?></td>
                                <td><?php echo e($assignment->passmark); ?>%</td>
                                <td><?php echo e($assignment->assignmentSubmissions()->count()); ?></td>
                            </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.report.report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/report/students.blade.php ENDPATH**/ ?>