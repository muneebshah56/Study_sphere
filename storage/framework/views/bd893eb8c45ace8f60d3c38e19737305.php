<?php $__env->startSection('pageTitle',$pageTitle); ?>
<?php $__env->startSection('innerTitle',$pageTitle); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            route('student.assignment.index')=>__lang('homework'),
            '#'=>__lang('submit')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="card card-primary">
    <div class="card-header"><?php echo e(__lang('instructions')); ?></div>
    <div class="card-body">
        <p  class="readmorebox" >
            <article class="readmore">
                <?php echo clean($row->instruction); ?>

            </article>
        </p>
    </div>
</div>

<div class="card card-success">
    <div class="card-header"><?php echo e(__lang('answer')); ?></div>
    <div class="card-body">
        <form enctype="multipart/form-data" class="form" action="<?php echo e(selfURL()); ?>" method="post">
            <?php echo csrf_field(); ?>
        <?php  if($row->type=='t' || $row->type=='b'): ?>
            <div class="form-group">
                <?php echo e(formLabel($form->get('content'))); ?>



                <?php echo e(formElement($form->get('content'))); ?>

                <p class="help-block"><?php echo e(formElementErrors($form->get('content'))); ?></p>
            </div>

            <?php $__env->startSection('footer'); ?>
                <?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
                <link rel="stylesheet" href="<?php echo e(asset('client/vendor/summernote/summernote-bs4.css')); ?>">
                <script type="text/javascript" src="<?php echo e(asset('client/vendor/summernote/summernote-bs4.js')); ?>"></script>.
                <script>
                    $(function(){

                        $('.summernote').summernote({
                            height: 300
                        } );
                    });
                </script>
            <?php $__env->stopSection(); ?>


        <?php  endif;  ?>

        <?php  if($row->type == 'f'  || $row->type=='b' ):  ?>
            <?php  if (isset($file)): ?>
            <div>
                <strong><?php echo e(__lang('current-file')); ?>:</strong> <?php echo e($file); ?>

            </div>
                <?php  endif;  ?>
            <div class="form-group">
                <?php echo e(formLabel($form->get('file_path'))); ?>


                <?php echo e(formElement($form->get('file_path'))); ?>

                <p class="help-block"><?php echo e(formElementErrors($form->get('file_path'))); ?></p>
            </div>

        <?php  endif;  ?>


         <div class="form-group">
             <?php echo e(formLabel($form->get('student_comment'))); ?>


             <?php echo e(formElement($form->get('student_comment'))); ?>

             <p class="help-block"><?php echo e(formElementErrors($form->get('student_comment'))); ?></p>
         </div>

            <div class="form-group">
                <?php echo e(formLabel($form->get('submitted'))); ?>


                <?php echo e(formElement($form->get('submitted'))); ?>

                <p class="help-block"><?php echo e(formElementErrors($form->get('submitted'))); ?></p>
            </div>


            <button class="btn btn-primary"><?php echo e(__lang('submit')); ?></button>
        </form>

    </div>
</div>






<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>

    <script type="text/javascript" src="<?php echo e(asset('client/vendor/readmore/readmore.min.js')); ?>"></script>
    <script>
        $(function(){
            $('article.readmore').readmore({
                collapsedHeight : 200
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/student/assignment/submit.blade.php ENDPATH**/ ?>