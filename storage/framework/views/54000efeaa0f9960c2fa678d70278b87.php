<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div   ng-app="myApp" ng-controller="myCtrl"  >
			<div >
				<div class="card">

					<div class="card-body">

                        <form method="post" action="<?php echo e(adminUrl(array('controller'=>'homework','action'=>$action,'id'=>$id))); ?>">
<?php echo csrf_field(); ?>

									<div class="form-group">
											<?php echo e(formLabel($form->get('title'))); ?>

										 <?php echo e(formElement($form->get('title'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('title'))); ?></p>

									</div>
														<div class="form-group">
											<?php echo e(formLabel($form->get('course_id'))); ?>

										 <?php echo e(formElement($form->get('course_id'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('course_id'))); ?></p>

									</div>

                        <div class="form-group">
                            <?php echo e(formLabel($form->get('lesson_id'))); ?>

                            <?php echo e(formElement($form->get('lesson_id'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('lesson_id'))); ?></p>

                        </div>


                        <div class="form-group">
											<?php echo e(formLabel($form->get('description'))); ?>

										 <?php echo e(formElement($form->get('description'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('description'))); ?></p>

									</div>



						 	<div class="form-group">
											<?php echo e(formLabel($form->get('content'))); ?>

										 <?php echo e(formElement($form->get('content'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('content'))); ?></p>

									</div>


                        <div class="form-group">
                            <input checked type="checkbox" name="notify" value="1"/> <?php echo e(__lang('notify-session-students')); ?>?
                        </div>




							<div class="form-footer">
								<button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
							</div>
						 </form>
					</div>
				</div><!--end .box -->
			</div><!--end .col-lg-12 -->
		</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset('client/js/angular.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('client/app/attendance.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('client/vendor/ckeditor/ckeditor.js')); ?>"></script>


    <script type="text/javascript">

        CKEDITOR.replace('hcontent', {
            filebrowserBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
            filebrowserImageBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
            filebrowserFlashBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager'
        });

        var basePath = '<?php echo e(basePath()); ?>';
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/homework/add.blade.php ENDPATH**/ ?>