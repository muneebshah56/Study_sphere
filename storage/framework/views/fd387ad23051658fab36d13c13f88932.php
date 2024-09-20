<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>__('default.blog-categories')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageTitle',__('default.blog-categories')); ?>
<?php $__env->startSection('innerTitle',__('default.manage-categories')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div >
                    <div  >
                        <a href="<?php echo e(url('/admin/blog-categories/create')); ?>" class="btn btn-success btn-sm" title="<?php echo app('translator')->get('default.add-new'); ?>">
                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('default.add-new'); ?>
                        </a>



                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th><?php echo app('translator')->get('default.category'); ?></th><th><?php echo app('translator')->get('default.sort-order'); ?></th><th><?php echo app('translator')->get('default.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $blogcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->name); ?></td><td><?php echo e($item->sort_order); ?></td>
                                        <td>
                                            <form  method="POST" action="<?php echo e(url('/admin/blog-categories' . '/' . $item->id)); ?>" accept-charset="UTF-8" >

                                            <a class="btn btn-info btn-sm" href="<?php echo e(url('/admin/blog-categories/' . $item->id)); ?>" title="<?php echo app('translator')->get('default.view'); ?>"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo app('translator')->get('default.view'); ?></a> &nbsp;
                                            <a  class="btn btn-primary btn-sm" href="<?php echo e(url('/admin/blog-categories/' . $item->id . '/edit')); ?>" title="<?php echo app('translator')->get('default.edit'); ?>"><i class="fa fa-edit" aria-hidden="true"></i> <?php echo app('translator')->get('default.edit'); ?></a>&nbsp;

                                            <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-danger btn-sm" title="<?php echo app('translator')->get('default.delete'); ?>" onclick="return confirm(&quot;<?php echo app('translator')->get('default.confirm-delete'); ?>?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> <?php echo app('translator')->get('default.delete'); ?></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo clean( $blogcategories->appends(['search' => Request::get('search')])->render() ); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/blog-categories/index.blade.php ENDPATH**/ ?>