<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
    <label for="title" class="control-label required"><?php echo app('translator')->get('default.title'); ?></label>
    <input required class="form-control" name="title" type="text" id="title" value="<?php echo e(old('title',isset($article->title) ? $article->title : '')); ?>" >
    <?php echo clean( $errors->first('title', '<p class="help-block">:message</p>') ); ?>

</div>

<div class="form-group <?php echo e($errors->has('content') ? 'has-error' : ''); ?>">
    <label for="content" class="control-label"><?php echo app('translator')->get('default.content'); ?></label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="textcontent" ><?php echo old('content',isset($article->content) ? $article->content : ''); ?></textarea>
    <?php echo clean( $errors->first('content', '<p class="help-block">:message</p>') ); ?>

</div>

<div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
    <label for="slug" class="control-label"><?php echo app('translator')->get('default.slug'); ?></label>
    <input class="form-control" name="slug" type="text" id="slug" value="<?php echo e(old('slug',isset($article->slug) ? $article->slug : '')); ?>" >
    <?php echo clean( $errors->first('slug', '<p class="help-block">:message</p>')); ?>

</div>

<div class="form-group <?php echo e($errors->has('meta_title') ? 'has-error' : ''); ?>">
    <label for="meta_title" class="control-label"><?php echo app('translator')->get('default.meta-title'); ?></label>
    <input class="form-control" name="meta_title" type="text" id="meta_title" value="<?php echo e(old('meta_title',isset($article->meta_title) ? $article->meta_title : '')); ?>" >
    <?php echo clean( $errors->first('meta_title', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('meta_description') ? 'has-error' : ''); ?>">
    <label for="meta_description" class="control-label"><?php echo app('translator')->get('default.meta-description'); ?></label>
    <textarea class="form-control" rows="5" name="meta_description" type="textarea" id="meta_description" ><?php echo e(old('meta_description',isset($article->meta_description) ? $article->meta_description : '')); ?></textarea>
    <?php echo clean(  $errors->first('meta_description', '<p class="help-block">:message</p>')); ?>

</div>

<div class="form-group <?php echo e($errors->has('enabled') ? 'has-error' : ''); ?>">
    <label for="enabled" class="control-label"><?php echo app('translator')->get('default.enabled'); ?></label>
    <select name="enabled" class="form-control" id="enabled" >
        <?php $__currentLoopData = json_decode('{"1":"Yes","0":"No"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('enabled',@$article->enabled)) && old('article',@$article->enabled) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php echo clean($errors->first('enabled', '<p class="help-block">:message</p>') ); ?>

</div>

<div class="form-group">
    <div class="form-check form-check-inline">
        <input type="hidden" name="mobile" value="0">
        <input <?php if(old('mobile',isset($article->mobile) ? $article->mobile : '')==1): ?> checked <?php endif; ?> class="form-check-input" type="checkbox" id="mobile" value="1" name="mobile">
        <label class="form-check-label" for="mobile"><?php echo e(__lang('mobile')); ?></label>
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('default.update') : __('default.create')); ?>">
</div>
<?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/articles/form.blade.php ENDPATH**/ ?>