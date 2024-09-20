<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>$customCrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
       <h4><?php echo e(__lang('question')); ?></h4>
    </div>
    <div class="card-body">

        <form method="post" action="<?php echo e(adminUrl(array('controller'=>'test','action'=>'editquestion','id'=>$id))); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <?php echo e(formLabel($form->get('question'))); ?>

            <?php echo e(formElement($form->get('question'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('question'))); ?></p>

        </div>

        <div class="form-group">
            <?php echo e(formLabel($form->get('sort_order'))); ?>

            <?php echo e(formElement($form->get('sort_order'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('sort_order'))); ?></p>

        </div>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
        </div>
         </form>

    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4><?php echo e(__lang('Edit Options')); ?></h4>
        <div class="card-header-action">
            <button data-toggle="modal" data-target="#myModal" class="btn btn-primary float-right"><i class="fa fa-plus"></i>  <?php echo e(__lang('Add Options')); ?></button>

        </div>

    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th><?php echo e(__lang('option')); ?></th>
                <th><?php echo e(__lang('correct-answer')); ?></th>
                <th  ><?php echo e(__lang('actions')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($rowset as $row):  ?>
                <tr>
                    <td><?php echo e($row->option); ?></td>
                    <td><?php echo e(boolToString($row->is_correct)); ?></td>


                    <td>

                        <a href="#" onclick="openModal('<?php echo e(__lang('edit-option')); ?>','<?php echo e(adminUrl(array('controller'=>'test','action'=>'editoption','id'=>$row->id))); ?>');"  class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('edit')); ?>"><i class="fa fa-edit"></i></a>

                        <a onclick="return confirm('<?php echo e(__lang('delete-confirm')); ?>')" href="<?php echo e(adminUrl(array('controller'=>'test','action'=>'deleteoption','id'=>$row->id))); ?>"  class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('delete')); ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach;  ?>

            </tbody>
        </table>

    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><?php echo e(__lang('add-options')); ?></h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__lang('close')); ?>"><span aria-hidden="true">&times;</span></button>

                </div>
                <form id="questionform" method="post" action="<?php echo e(adminUrl(['controller'=>'test','action'=>'addoptions','id'=>$id])); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">

                        <p><small><?php echo e(__lang('edit-question-help')); ?></small></p>
                        <table class="table table-stripped">
                            <thead>
                            <tr>
                                <th><?php echo e(__lang('option')); ?></th>
                                <th><?php echo e(__lang('correct-answer')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for($i=1;$i<=5;$i++): ?>
                            <tr>
                                <td><input name="option_<?php echo e($i); ?>" class="form-control" type="text"/></td>
                                <td><input   type="radio" name="correct_option" value="<?php echo e($i); ?>"/></td>
                            </tr>
                            <?php endfor;  ?>
                            </tbody>
                        </table>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__lang('cancel')); ?></button>
                        <button  type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="<?php echo e(asset('client/vendor/summernote/summernote-bs4.min.js')); ?>"></script>
    <script>
        $(function(){

            $('.summernote').summernote({
                height: 200
            } );
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/test/editquestion.blade.php ENDPATH**/ ?>