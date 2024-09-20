<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>$customCrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-3">
    <div style="text-align: center"><h2><?php echo e($percentage); ?>%</h2></div>
    <div class="progress">
        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo e($percentage); ?>" style="width: <?php echo e($percentage); ?>%;" aria-valuenow="<?php echo e($percentage); ?>"></div>
    </div>
</div>


<div class="card">
    <div class="card-header">
        <h2><?php echo e($row->course_name); ?></h2>
    </div>
    <div class="card-body">


        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-pills" role="tablist">
                <li class="nav-item"><a  class="nav-link active" href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><?php echo e(__lang('classes-attended')); ?></a>
                </li>
                <li class="nav-item"><a class="nav-link"  href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><?php echo e(__lang('test-results')); ?></a>
                </li>

            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane   active in" id="tab_content1" aria-labelledby="home-tab">
                    <table class="table table-stripped">
                        <thead>
                        <tr>
                            <th><?php echo e(__lang('class')); ?></th>
                            <th><?php echo e(__lang('date')); ?></th>
                            <th><?php echo e(__lang('action')); ?></th>
                        </tr>
                        </thead>
                        <?php foreach($attended as $row):  ?>
                            <tr>
                                <td><?php echo e(htmlentities( $row->name)); ?></td>
                                <td><?php echo e(htmlentities( showDate('d/M/Y',$row->attendance_date))); ?></td>
                                <td><button title="Delete" onclick="openPopup('<?php echo e(adminUrl(array('controller'=>'student','action'=>'deleteattendance','id'=>$row->id))); ?>')" href=""  class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('delete')); ?>"><i class="fa fa-trash"></i></button></td>
                            </tr>
                        <?php endforeach;  ?>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane  " id="tab_content2" aria-labelledby="profile-tab">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th><?php echo e(__lang('test')); ?></th>
                            <th><?php echo e(__lang('result')); ?></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($testResults as $value):  ?>
                                <tr>
                                    <td><?php echo e($value->name); ?></td>
                                    <td><?php echo e($value->score); ?>% (<?php if($value->score >= $value->passmark): ?>
                                            <span style="color: green"><?php echo e(__lang('Passed')); ?></span>
                                        <?php else: ?>
                                            <span style="color: red"><?php echo e(__lang('Failed')); ?></span>
                                        <?php endif; ?>)</td>
                                    <td> <a onclick="openModal('<?php echo e($value->name); ?> <?php echo e($value->last_name); ?>','<?php echo e(adminUrl(array('controller'=>'test','action'=>'testresult','id'=>$value->id))); ?>')"  href="javascript:;" class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('view-result')); ?>"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/session/stats.blade.php ENDPATH**/ ?>