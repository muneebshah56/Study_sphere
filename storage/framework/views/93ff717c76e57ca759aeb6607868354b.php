<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.blog-posts.index')=>__lang('blog-posts'),
            '#'=>__lang('add')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageTitle',__('default.blog')); ?>
<?php $__env->startSection('innerTitle',__('default.create-new').' '.__('default.blog-post')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div >
                        <a href="<?php echo e(url('/admin/blog-posts')); ?>" title="<?php echo app('translator')->get('default.back'); ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('default.back'); ?></button></a>
                        <br />
                        <br />


                        <form method="POST" action="<?php echo e(url('/admin/blog-posts')); ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <?php echo $__env->make('admin.blog-posts.form', ['formMode' => 'create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>

    <link href="<?php echo e(asset('client/vendor/pickadate/themes/default.date.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('client/vendor/pickadate/themes/default.time.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('client/vendor/pickadate/themes/default.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/select2/css/select2.min.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <script src="<?php echo e(asset('client/vendor/pickadate/picker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('client/vendor/pickadate/picker.date.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('client/vendor/pickadate/picker.time.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('client/vendor/pickadate/legacy.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('client/vendor/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/app/blog.js')); ?>?re"></script>
    <script type="text/javascript" src="<?php echo e(basePath() . '/client/vendor/ckeditor/ckeditor.js'); ?>"></script>
    <script type="text/javascript">

        CKEDITOR.replace('textcontent', {
            filebrowserBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
            filebrowserImageBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
            filebrowserFlashBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager'
        });
    </script>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/blog-posts/create.blade.php ENDPATH**/ ?>