<?php $__env->startSection('pageTitle',$pageTitle); ?>
<?php $__env->startSection('innerTitle',$pageTitle); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            '#'=>$pageTitle
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>

                    <th><?php echo e(__lang('survey')); ?></th>
                    <th><?php echo e(__lang('Questions')); ?></th>
                    <th   ></th>
                </tr>
                </thead>
                <tbody>
                <?php  foreach($paginator as $row):  ?>
                    <tr>
                        <td><?php echo e($row->name); ?></td>
                        <td><?php echo e($questionTable->getTotalQuestions($row->survey_id)); ?></td>
                        <td >
                               <a  href="<?php echo e(route('survey',array('hash'=>$row->hash))); ?>" class="btn btn-primary " ><i class="fa fa-play"></i> <?php echo e(__lang('Take Survey')); ?></a>
                         </td>

                    </tr>
                <?php  endforeach;  ?>

                </tbody>
            </table>
        </div>
        <?php
        // add at the end of the file after the table
        echo paginationControl(
        // the paginator object
            $paginator,
            // the scrolling style
            'sliding',
            // the partial to use to render the control
            null,
            // the route to link to when a user clicks a control link
            array(
                'route' => 'student/default',
                'controller'=>'student',
                'action'=>'surveys'
            )
        );
         ?>
    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/student/student/surveys.blade.php ENDPATH**/ ?>