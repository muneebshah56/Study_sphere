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
			<div >
				<div class="card">
					<div class="card-header">
						<header>
                            <?php echo e(__lang('fields-help')); ?>



                        </header>
                        <a class="btn btn-primary float-right" href="<?php echo e(adminUrl(array('controller'=>'setting','action'=>'addfield'))); ?>"><i class="fa fa-plus"></i> <?php echo e(__lang('Add Field')); ?></a>


					</div>
					<div class="card-body">

                        <table class="table table-hover">
							<thead>
								<tr>
									<th><?php echo e(__lang('name')); ?></th>
									<th><?php echo e(__lang('sort-order')); ?></th>
                                    <th><?php echo e(__lang('type')); ?></th>
                                    <th><?php echo e(__lang('student-editable')); ?></th>
									<th><?php echo e(__lang('actions')); ?></th>
								</tr>
							</thead>
							<tbody>
                            <?php foreach($paginator as $row):  ?>
								<tr>
								 	<td><?php echo e($row->name); ?></td>
									<td><?php echo e($row->sort_order); ?></td>
								    <td><?php echo e($row->type); ?></td>
									 <td><?php echo e(boolToString($row->enabled)); ?></td>
									<td >
										<a href="<?php echo e(adminUrl(array('controller'=>'setting','action'=>'editfield','id'=>$row->id))); ?>" class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('edit')); ?>"><i class="fa fa-edit"></i></a>

										<a onclick="return confirm('<?php echo e(__lang('delete-confirm')); ?>')" href="<?php echo e(adminUrl(array('controller'=>'setting','action'=>'deletefield','id'=>$row->id))); ?>"  class="btn btn-xs btn-danger btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('delete')); ?>"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								  <?php endforeach;  ?>

							</tbody>
						</table>

                        <?php
 // add at the end of the file after the table
 echo paginationControl(
     // the paginator object
     $paginator,
     // the scrolling style
     'sliding',
     // the partial to use to render the control
     null,
     // the route to link to when a user clicks a control link
     array(
         'route' => 'admin/default',
		 'controller'=>'setting',
		 'action'=>'fields',
     )
 );
 ?>
					</div><!--end .box-body -->
				</div><!--end .box -->
			</div><!--end .col-lg-12 -->
		</div>


        <!-- START SIMPLE MODAL MARKUP --><!-- /.modal -->
<!-- END SIMPLE MODAL MARKUP -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/setting/fields.blade.php ENDPATH**/ ?>