<div class="accordion">
    <div class="accordion-header" id="heading<?php echo e($menu->id); ?>" data-toggle="collapse" data-target="#collapse<?php echo e($menu->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($menu->id); ?>">
        <h4>
                <?php echo e($menu->label); ?>

        </h4>
    </div>
    <div id="collapse<?php echo e($menu->id); ?>" class="collapse" aria-labelledby="heading<?php echo e($menu->id); ?>">
        <div class="accordion-body">
            <span class="float-right"><small><?php echo e($menu->name); ?></small></span>
            <form method="post" class="menuform" action="<?php echo e(route('admin.menus.update-header',['headerMenu'=>$menu->id])); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="label"><?php echo app('translator')->get('default.label'); ?></label>
                    <input class="form-control" type="text" name="label" value="<?php echo e($menu->label); ?>"/>
                </div>
                <?php if($menu->type=='c'): ?>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input class="form-control" type="text" name="url" value="<?php echo e($menu->url); ?>"/>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="sort_order"><?php echo app('translator')->get('default.sort-order'); ?></label>
                    <input class="form-control number" type="text" name="sort_order" value="<?php echo e($menu->sort_order); ?>"/>
                </div>

                <div class="form-group">
                    <label for="parent_id"><?php echo app('translator')->get('default.parent'); ?></label>
                    <select class="form-control" name="parent_id" id="parent_id">
                        <option value="0"><?php echo app('translator')->get('default.none'); ?></option>
                        <?php $__currentLoopData = \App\HeaderMenu::where('parent_id',0)->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($menu->parent_id==$option->id): ?> selected <?php endif; ?> value="<?php echo e($option->id); ?>"><?php echo e($option->label); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="new_window" type="checkbox" value="1" <?php if($menu->new_window==1): ?> checked <?php endif; ?> id="new_window<?php echo e($menu->id); ?>">
                    <label class="form-check-label" for="new_window<?php echo e($menu->id); ?>">
                        <?php echo app('translator')->get('default.new-window'); ?>
                    </label>
                </div>
                <br/>

                <a onclick="return confirm('<?php echo app('translator')->get('default.confirm-delete'); ?>')" class="btn btn-danger deletemenu" href="<?php echo e(route('admin.menus.delete-header',['headerMenu'=>$menu->id])); ?>"><?php echo app('translator')->get('default.delete'); ?></a>
                <button class="btn btn-primary float-right"><?php echo app('translator')->get('default.save-changes'); ?></button>

            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/partials/header_menu.blade.php ENDPATH**/ ?>