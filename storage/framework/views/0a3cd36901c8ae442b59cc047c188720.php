<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.articles.index')=>__lang('articles'),
            '#'=>__('default.add')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageTitle',__('default.create-new').' '.__('default.article')); ?>
<?php $__env->startSection('innerTitle',__('default.create-new').' '.__('default.article')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div >
                        <a href="<?php echo e(url('/admin/articles')); ?>" title="<?php echo app('translator')->get('default.back'); ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('default.back'); ?></button></a>
                        <br />
                        <br />


                        <form method="POST" action="<?php echo e(url('/admin/articles')); ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <?php echo $__env->make('admin.articles.form', ['formMode' => 'create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(basePath() . '/client/vendor/ckeditor/ckeditor.js'); ?>"></script>
    <script type="text/javascript">

        CKEDITOR.replace('textcontent', {
            filebrowserBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
            filebrowserImageBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
            filebrowserFlashBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager'
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/articles/create.blade.php ENDPATH**/ ?>