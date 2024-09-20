<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="alert alert-info alert-dismissible">
    <a class="close" data-dismiss="alert" href="messages#">×</a>
    <h4 class="alert-heading"><?php echo e(__lang('info')); ?>!</h4>
    <p>
        <?php echo e(__lang('attendance-date-help')); ?>

    </p>

</div>


<div class="card">
 <div class="card-header">
     <h4><?php echo e(__lang('set-dates-help')); ?></h4>
</div>
<div class="card-body">
    <form onsubmit="return confirm('<?php echo e(__lang('set-dates-confirm')); ?>')" enctype="multipart/form-data" class="form" method="post" action="<?php echo e(adminUrl(array('controller'=>'student','action'=>'attendancedate'))); ?>">
        <?php echo csrf_field(); ?>


        <div id="sessionbox" class="form-group" style="padding-bottom: 10px">
            <label for="session_id"><?php echo e(__lang('session-course')); ?></label>
            <?php echo e(formElement($select)); ?>

        </div>
        <div id="lessonbox">




        </div>




        <button class="btn btn-primary" type="submit"><?php echo e(__lang('save')); ?></button>
    </form>

</div>
</div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/pickadate/themes/default.date.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/pickadate/themes/default.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(basePath()); ?>/client/vendor/pickadate/picker.js"></script>
    <script type="text/javascript" src="<?php echo e(basePath()); ?>/client/vendor/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="<?php echo e(basePath()); ?>/client/vendor/pickadate/legacy.js"></script>
    <script type="text/javascript"><!--

        jQuery(function(){
            jQuery('.date').pickadate({
                format: 'yyyy-mm-dd'
            });

            $('#sessionbox select').change(function(){
                var val = $(this).val();
                $('#lessonbox').text('Loading...');
                var url = '<?php echo e(basePath()); ?>/admin/student/sessionlessons/'+val;
                $('#lessonbox').load(url,function(){
                    jQuery('.date').pickadate({
                        format: 'yyyy-mm-dd'
                    });
                });
            });



        });
        //--></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/student/attendancedate.blade.php ENDPATH**/ ?>