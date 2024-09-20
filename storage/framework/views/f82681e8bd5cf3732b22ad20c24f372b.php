<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<!--breadcrumb-section ends-->
<!--container starts-->
<div class="card">
<div class="card-body">
    <div>
        <form method="post" action="<?php echo e(adminUrl(['controller'=>'account','action'=>'profile'])); ?>">
            <?php echo csrf_field(); ?>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <label for="password1" class="control-label"><?php echo e(formLabel($form->get('name'))); ?></label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6">
                            <?php echo e(formElement($form->get('name'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('name'))); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <label for="password1" class="control-label"><?php echo e(formLabel($form->get('last_name'))); ?></label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6">
                            <?php echo e(formElement($form->get('last_name'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('last_name'))); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <label for="password1" class="control-label"><?php echo e(formLabel($form->get('about'))); ?></label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6">
                            <?php echo e(formElement($form->get('about'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('about'))); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <label for="password1" class="control-label"><?php echo e(formLabel($form->get('notify'))); ?></label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6">
                            <?php echo e(formElement($form->get('notify'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('notify'))); ?></p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group"  >
                        <div class="col-lg-8 col-md-8 col-sm-6">
                        <label for="image" class="control-label"><?php echo e(__lang('profile-picture')); ?></label><br />


                        <div class="image"><img data-name="image" src="<?php echo e($display_image); ?>" alt="" id="thumb" /><br />
                            <?php echo e(formElement($form->get('picture'))); ?>

                            <a class="pointer" onclick="image_upload('image', 'thumb');"><?php echo e(__lang('browse')); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="pointer" onclick="$('#thumb').attr('src', '<?php echo e($no_image); ?>'); $('#image').attr('value', '');"><?php echo e(__lang('clear')); ?></a></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group"  >
                        <div class="col-lg-8 col-md-8 col-sm-6">
                            <button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>
</div>





<!--container ends-->
<script type="text/javascript"><!--
    function image_upload(field, thumb) {
        $('#dialog').remove();

        $('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="<?php echo e(basePath()); ?>/admin/filemanager?&token=true&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');

        $('#dialog').dialog({
            title: '<?php echo e(addslashes(__lang('Image Manager'))); ?>',
            close: function (event, ui) {
                if ($('#' + field).attr('value')) {
                    $.ajax({
                        url: '<?php echo e(basePath()); ?>/admin/filemanager/image?&image=' + encodeURIComponent($('#' + field).val()),
                        dataType: 'text',
                        success: function(data) {
                            $('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
                        }
                    });
                }
            },
            bgiframe: false,
            width: 800,
            height: 570,
            resizable: true,
            modal: false,
            position: "center"
        });
    };

    //--></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/account/profile.blade.php ENDPATH**/ ?>