<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.certificate.index')=>__lang('certificates'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?php echo e(__lang('student')); ?></th>
                <th><?php echo e(__lang('tracking-number')); ?></th>
                <th><?php echo e(__lang('downloaded-on')); ?></th>
            </tr>
        </thead>

        <tbody>

        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><a class="viewbutton" style="text-decoration: underline"   data-id="<?php echo e($student->student_id); ?>" data-toggle="modal" data-target="#simpleModal" href=""><?php echo e($student->student->user->name); ?> <?php echo e($student->student->user->last_name); ?></a></td>
                <td><?php echo e($student->tracking_number); ?></td>
                <td><?php echo e(showDate('d/M/Y',$student->created_at)); ?></td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>

</div>
<div>
    <?php echo e($students->links()); ?>

</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <!-- START SIMPLE MODAL MARKUP -->
    <div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="simpleModalLabel"><?php echo e(__lang('student-details')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="info">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END SIMPLE MODAL MARKUP -->

    <script type="text/javascript">
        $(function(){
            $('.viewbutton').click(function(){
                $('#info').text('Loading...');
                var id = $(this).attr('data-id');
                $('#info').load('<?php echo e(url('admin/student/view')); ?>'+'/'+id);
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/certificate/students.blade.php ENDPATH**/ ?>