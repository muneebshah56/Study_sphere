<?php $__env->startSection('pageTitle',__('default.role').': '.$role->name); ?>
<?php $__env->startSection('innerTitle',__('default.role').': '.$role->name); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.roles.index')=>__lang('roles'),
            '#'=>__lang('show')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div  >
                    <div  >
                        <form method="POST" action="<?php echo e(url('admin/roles' . '/' . $role->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">

                        <a href="<?php echo e(url('/admin/roles')); ?>" title="<?php echo app('translator')->get('default.back'); ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('default.back'); ?></button></a>
                        <a href="<?php echo e(url('/admin/roles/' . $role->id . '/edit')); ?>" ><button type="button"  class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo app('translator')->get('default.edit'); ?></button></a>

                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn btn-danger btn-sm" title="<?php echo app('translator')->get('default.delete'); ?>" onclick="return confirm(&quot;<?php echo app('translator')->get('default.confirm-delete'); ?>?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo app('translator')->get('default.delete'); ?></button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> <?php echo app('translator')->get('default.name'); ?> </th><td> <?php echo e($role->name); ?> </td></tr>
                                </tbody>
                            </table>
                        </div>

                        <h1><?php echo app('translator')->get('default.permissions'); ?></h1>

                        <?php $__currentLoopData = \App\PermissionGroup::orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($role->permissions()->where('permission_group_id',$group->id)->count()>0): ?>
                            <div class="card">
                                <div class="card-header">
                                    <?php echo app('translator')->get('default.'.$group->name); ?>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <?php $__currentLoopData = $group->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($role->permissions()->find($permission->id)): ?>
                                        <li class="list-group-item"><?php echo app('translator')->get('perm.'.$permission->name); ?></li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>

                                </div>
                            </div>
                            <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/roles/show.blade.php ENDPATH**/ ?>