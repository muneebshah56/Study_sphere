<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label required"><?php echo app('translator')->get('default.name'); ?></label>
    <input required class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name',isset($blogcategory->name) ? $blogcategory->name : '')); ?>" >
    <?php echo clean(  $errors->first('name', '<p class="help-block">:message</p>')); ?>

</div>
<div class="form-group <?php echo e($errors->has('sort_order') ? 'has-error' : ''); ?>">
    <label for="sort_order" class="control-label"><?php echo app('translator')->get('default.sort-order'); ?></label>
    <input class="form-control number" name="sort_order" type="text" id="sort_order" value="<?php echo e(old('sort_order',isset($blogcategory->sort_order) ? $blogcategory->sort_order : '')); ?>" >
    <?php echo clean(  $errors->first('sort_order', '<p class="help-block">:message</p>')); ?>

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('default.update') : __('default.create')); ?>">
</div>
<?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/blog-categories/form.blade.php ENDPATH**/ ?>