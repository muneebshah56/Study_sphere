<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.student.sessions')=>__lang('courses'),
            '#'=>__lang('course-tests')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
     <div class="card-header">
         <a class="btn btn-primary float-right" href="<?php echo e(adminUrl(array('controller'=>'session','action'=>'addtest','id'=>$id))); ?>"><i class="fa fa-plus"></i> <?php echo e(__lang('add-test')); ?></a>

     </div>
    <div class="card-body">
        <table class="table table-stripped">
            <thead>
            <tr>
                <th><?php echo e(__lang('test')); ?></th>
                <th><?php echo e(__lang('opening-date')); ?></th>
                <th><?php echo e(__lang('closing-date')); ?></th>
                <th><?php echo e(__lang('author')); ?></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($rowset as $row):  ?>
            <tr>
                <td><?php echo e($row->name); ?></td>
                <td><?php if(!empty($row->opening_date)) echo showDate('d/M/Y',$row->opening_date);  ?></td>
                <td><?php if(!empty($row->closing_date))  echo showDate('d/M/Y',$row->closing_date);  ?></td>
                <td>
                    <?php echo e(adminName($row->admin_id)); ?>


                </td>
                <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(adminUrl(['controller'=>'session','action'=>'edittest','id'=>$row->id])); ?>"><i class="fa fa-edit"></i> <?php echo e(__lang('edit')); ?></a>
                    <a class="btn btn-sm btn-danger" href="<?php echo e(adminUrl(['controller'=>'test','action'=>'deletesession','id'=>$row->id])); ?>"  onclick="return confirm('<?php echo e(__lang('delete-confirm')); ?>')"><i class="fa fa-trash"></i> <?php echo e(__lang('delete')); ?></a>

                </td>
            </tr>
            <?php endforeach;  ?>
            </tbody>

        </table>
        <?php if($rowset->count()==0): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <?php echo e(__lang('specify-test-help')); ?>


        </div>

        <?php endif;  ?>

    </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/session/tests.blade.php ENDPATH**/ ?>