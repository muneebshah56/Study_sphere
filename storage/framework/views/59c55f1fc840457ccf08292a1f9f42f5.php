<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset('client/js/angular.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('client/app/attendance.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div  ng-app="myApp" ng-controller="myCtrl"  >

    <div >
        <div class="card">
            <div class="card-header">
                <header><h4  ><?php echo e(__lang('select')); ?> <strong><?php echo e(__lang('students')); ?></strong></h4></header>
            </div>
            <div class="card-body">

                <img ng-if="showLoading" src="<?php echo e(basePath()); ?>/img/ajax-loader.gif">
                <div class="row mb-5">
                    <div class="col-md-5"><?php echo e(formElement($course_id)); ?></div>
                    <div class="col-md-5"><?php echo e(formElement($lesson_id)); ?></div>
                    <div class="col-md-2"><button ng-click="saveAttendance('<?php echo e(basePath()); ?>')" ng-disabled="!course_id || !lesson_id" type="button" class="btn btn-primary btn-rounded"><i class="fa fa-save"></i> <?php echo e(__lang('save')); ?></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <table class="table table-stripped">
                            <thead>
                            <tr>
                                <th><?php echo e(__lang('first-name')); ?></th>
                                <th><?php echo e(__lang('last-name')); ?></th>
                                <th><?php echo e(__lang('email')); ?></th>
                                <th class="text-right1" style="width:130px"><?php echo e(__lang('mark')); ?></th>
                            </tr>
                            </thead>
                            <tr  ng-repeat="student in students" >
                                <td>{{student.first_name}}</td>
                                <td>{{student.last_name}}</td>
                                <td>{{student.email}}</td>
                                <td><input type="checkbox" value="1"  ng-model="answers[student.student_id]" ng-change="studentChecked(student.student_id,student)" /></td>
                            </tr>
                        </table>



                    </div>



                </div>





            </div>
        </div><!--end .box -->
    </div><!--end .col-lg-12 -->
</div>


<script>
    var basePath = '<?php echo e(basePath()); ?>';
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/student/attendancebulk.blade.php ENDPATH**/ ?>