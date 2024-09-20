<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>__('default.blog-posts')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('search-form'); ?>
    <form class="form-inline mr-auto" method="get" action="<?php echo e(url('/admin/blog-posts')); ?>">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input value="<?php echo e(request()->get('filter')); ?>"   name="filter" class="form-control" type="search" placeholder="<?php echo e(__lang('search')); ?>" aria-label="<?php echo e(__lang('search')); ?>" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageTitle',__('default.blog-posts')); ?>
<?php $__env->startSection('innerTitle',__('default.blog-posts')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','add_blog')): ?>
                        <a href="<?php echo e(url('/admin/blog-posts/create')); ?>" class="btn btn-success btn-sm" title="<?php echo app('translator')->get('default.add-new'); ?>">
                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('default.add-new'); ?>
                        </a>
                        <?php endif; ?>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th><th><?php echo app('translator')->get('default.title'); ?></th><th><?php echo app('translator')->get('default.published-on'); ?></th>
                                        <th><?php echo app('translator')->get('default.enabled'); ?></th>
                                        <th><?php echo app('translator')->get('default.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $blogposts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->title); ?></td> <td><?php echo e(\Illuminate\Support\Carbon::parse($item->publish_date)->format('d/M/Y')); ?></td>
                                        <td><?php echo e(boolToString($item->enabled)); ?></td>
                                        <td>
                                            <?php if(false): ?>

                                             <div class="button-group dropup">
                                                                   <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                     <?php echo e(__lang('actions')); ?>

                                                                   </button>
                                                                   <div class="dropdown-menu">
                                                                     <a class="dropdown-item" href="#">Action</a>
                                                                     <a class="dropdown-item" href="#">Another action</a>
                                                                     <a class="dropdown-item" href="#">Something else here</a>
                                                                   </div>
                                                                 </div>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_blog')): ?>
                                            <a href="<?php echo e(url('/admin/blog-posts/' . $item->id)); ?>" title="<?php echo app('translator')->get('default.view'); ?>"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo app('translator')->get('default.view'); ?></button></a>
                                           <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_blog')): ?>
                                            <a href="<?php echo e(url('/admin/blog-posts/' . $item->id . '/edit')); ?>" title="<?php echo app('translator')->get('default.edit'); ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> <?php echo app('translator')->get('default.edit'); ?></button></a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_blog')): ?>
                                            <button type="submit" class="btn btn-danger btn-sm" title="<?php echo app('translator')->get('default.delete'); ?>" onclick="$('#form-<?php echo e($item->id); ?>').submit()"><i class="fa fa-trash" aria-hidden="true"></i> <?php echo app('translator')->get('default.delete'); ?></button>
                                             <form  onsubmit="return confirm(&quot;<?php echo app('translator')->get('default.delete-confirm'); ?>&quot;)" id="form-<?php echo e($item->id); ?>" method="POST" action="<?php echo e(url('/admin/blog-posts' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo clean( $blogposts->appends(['search' => Request::get('search')])->render() ); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/blog-posts/index.blade.php ENDPATH**/ ?>