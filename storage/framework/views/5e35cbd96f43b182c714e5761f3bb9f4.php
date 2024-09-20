<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div>

<div class="col-md-12">

    <div class="card">


					<div class="card-header">
                        <button   data-toggle="modal" data-target="#formModal" type="button" class="btn btn-rounded btn-primary"><i class="fa fa-plus"></i><?php echo e(__lang('add-widget')); ?></button>

					</div>
					<div class="card-body">
						<div id="options">


                            <div id="accordion">

                                <?php $counter= 1 ; ?>
                                <?php foreach($form as $key=>$value):  ?>

                                <div class="accordion">
                                    <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-<?php echo e($key); ?>" aria-expanded="false">
                                        <h4><?php echo e(__lang($value['name'])); ?></h4>
                                    </div>
                                    <div class="accordion-body collapse" id="panel-body-<?php echo e($key); ?>" data-parent="#accordion" style="">


                                        <form class="widget-ajaxform" role="form"  method="post" action="<?php echo e(adminUrl(array('controller'=>'widget','action'=>'process','id'=>$key))); ?>">
                                            <?php echo csrf_field(); ?>  <div class="row" style="margin-bottom:10px">
                                                <div class="col-md-3">
                                                    <span ><?php echo e(formElement($value['enabled'])); ?></span>
                                                </div>
                                                <div class="col-md-2">
                                                    <span ><?php echo e(formElement($value['sortOrder'])); ?></span>
                                                </div>
                                                <div class="col-md-4 offset-3">
                            <span class="float-right"><button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo e(__lang('save-changes')); ?></button>
                            <a onclick="return confirm('<?php echo e(__lang('remove-widget-confirm')); ?>')" class="btn btn-primary" href="<?php echo e(adminUrl(array('controller'=>'widget','action'=>'delete','id'=>$key))); ?>"><i class="fa fa-trash"></i> <?php echo e(__lang('remove')); ?></a>
                            </span>
                                                </div>

                                            </div>



                                            <?php if(!empty($value['description'])):  ?>
                                            <div style="padding:10px">
                                                <?php echo e(__lang($value['code'].'-dis')); ?>

                                            </div>
                                            <?php endif;  ?>

                                            <div style="border-top:solid 1px #CCCCCC; padding-top:20px">

                                                <?php echo $value['form']; ?>


                                            </div>



                                        </form>


                                    </div>
                                </div>
                                <?php endforeach;  ?>



                            </div>









			                </div>


					</div>




    </div>

</div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('client/themes/admin/assets/modules/izitoast/css/iziToast.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/colorpicker/jquery.colorpicker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <script src="<?php echo e(asset('client/themes/admin/assets/modules/izitoast/js/iziToast.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('client/vendor/colorpicker/jquery.colorpicker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('client/vendor/ckeditor/ckeditor.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript">


        $(document).on('submit','form.widget-ajaxform',function(e){


            e.preventDefault();
            iziToast.info({
                title: '<?php echo e(__lang('info')); ?>',
                message: '<?php echo e(__lang('sending')); ?>',
                position: 'topRight'
            });

            var postData = $(this).serialize();


            var formURL = $(this).attr("action");


            $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    dataType: "json",
                    //  contentType: "application/json",
                    headers: {
                        Accept:"application/json"
                    },
                    success:function(data, textStatus, jqXHR)
                    {

                        //data: return data from server
                        if(data.status)
                        {
                            iziToast.success({
                                title: '<?php echo e(__lang('done')); ?>',
                                message: data.message,
                                position: 'topRight'
                            });
                        }
                        else
                        {
                            iziToast.error({
                                title: '<?php echo e(__lang('error')); ?>',
                                message: data.message,
                                position: 'topRight'
                            });
                        }


                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        iziToast.error({
                            title: '<?php echo e(__lang('error')); ?>',
                            message: '<?php echo e(__lang('submission-failed')); ?> '+errorThrown,
                            position: 'topRight'
                        });
                    }
                });



        });

        <?php foreach ($editors as $value) {  ?>
        CKEDITOR.replace('<?php echo e($value); ?>', {
            filebrowserBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
            filebrowserImageBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
            filebrowserFlashBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager'
        });
        <?php }  ?>
    </script>

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
        //-->
    </script>
    <script type="text/javascript">
        $(function() {
            $('.colorpicker').colorpicker({
                parts:          'full',
                showOn:         'both',
                buttonColorize: true,
                showNoneButton: true,
                buttonImage : '<?php echo e(basePath()); ?>/client/vendor/colorpicker/images/ui-colorpicker.png'
            });
        });
    </script>

    <!-- START FORM MODAL MARKUP -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="formModalLabel"><?php echo e(__lang('create-new-widget')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <form class="form-horizontal" role="form" method="post" action="<?php echo e(adminUrl(array('controller'=>'widget','action'=>'create'))); ?>">
                 <?php echo csrf_field(); ?>   <div class="modal-body">
                        <div class="form-group">
                            <div  >
                                <label for="email1" class="control-label"><?php echo e(__lang('widget-type')); ?></label>
                            </div>
                            <div  >
                                <?php echo e(formElement($createSelect)); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <div  >
                                <label for="password1" class="control-label"><?php echo e(__lang('sort-order')); ?></label>
                            </div>
                            <div >
                                <input required="required" type="text" name="sort_order" value="1"  class="form-control" placeholder="Sort Order">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__lang('cancel')); ?></button>
                        <button type="submit" class="btn btn-primary" ><?php echo e(__lang('create')); ?></button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END FORM MODAL MARKUP -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/widget/index.blade.php ENDPATH**/ ?>