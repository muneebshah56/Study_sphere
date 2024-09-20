<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
    <label for="title" class="control-label required"><?php echo app('translator')->get('default.title'); ?></label>
    <input required class="form-control" name="title" type="text" id="title" value="<?php echo e(old('title',isset($blogpost->title) ? $blogpost->title : '')); ?>" >
    <?php echo clean($errors->first('title', '<p class="help-block">:message</p>')); ?>

</div>
<div class="form-group <?php echo e($errors->has('content') ? 'has-error' : ''); ?>">
    <label for="content" class="control-label"><?php echo app('translator')->get('default.content'); ?></label>
     <textarea class="form-control" rows="5" name="content"   id="textcontent" ><?php echo old('content',isset($blogpost->content) ? $blogpost->content : ''); ?></textarea>


    <?php echo clean($errors->first('content', '<p class="help-block">:message</p>')); ?>

</div>
<div class="form-group <?php echo e($errors->has('publish_date') ? 'has-error' : ''); ?>">
    <label for="publish_date" class="control-label"><?php echo app('translator')->get('default.published-on'); ?></label>
    <input class="form-control date" name="publish_date" type="text" id="publish_date" value="<?php echo e(old('publish_date',isset($blogpost->publish_date) ? $blogpost->publish_date : '')); ?>" >
    <?php echo clean($errors->first('publish_date', '<p class="help-block">:message</p>')); ?>

</div>
<div class="form-group">
    <label for="categories"><?php echo app('translator')->get('default.categories'); ?></label>
    <?php if($formMode === 'edit'): ?>
        <select multiple name="categories[]" id="categories" class="form-control select2">
            <option></option>
            <?php $__currentLoopData = \App\BlogCategory::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option  <?php if( (is_array(old('categories')) && in_array(@$category->id,old('categories')))  || (null === old('categories')  && $blogpost->blogCategories()->where('blog_category_id',$category->id)->first() )): ?>
                    selected
                    <?php endif; ?>
                    value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    <?php else: ?>
        <select  multiple name="categories[]" id="categories" class="form-control select2">
            <option></option>
            <?php $__currentLoopData = \App\BlogCategory::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if(is_array(old('categories')) && in_array(@$category->id,old('categories'))): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    <?php endif; ?>

</div>
<div class="form-group <?php echo e($errors->has('enabled') ? 'has-error' : ''); ?>">
    <label for="enabled" class="control-label"><?php echo app('translator')->get('default.enabled'); ?></label>
    <select name="enabled" class="form-control" id="enabled" >
    <?php $__currentLoopData = json_decode('{"1":"Yes","0":"No"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('enabled',@$blogpost->enabled)) && old('blogpost',@$blogpost->enabled) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
    <?php echo clean($errors->first('enabled', '<p class="help-block">:message</p>')); ?>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group <?php echo e($errors->has('cover_photo') ? 'has-error' : ''); ?>">
            <label for="cover_photo" class="control-label"><?php if($formMode=='edit'): ?><?php echo app('translator')->get('default.change'); ?>    <?php endif; ?> <?php echo app('translator')->get('default.cover-image'); ?></label>


            <input class="form-control" name="cover_photo" type="file" id="cover_photo" value="<?php echo e(isset($blogpost->cover_photo) ? $blogpost->cover_photo : ''); ?>" >
            <?php echo clean($errors->first('cover_photo', '<p class="help-block">:message</p>')); ?>

        </div>

    </div>
    <div class="col-md-6">
        <?php if($formMode==='edit' && !empty($blogpost->cover_photo)): ?>

            <div><img src="<?php echo e(asset($blogpost->cover_photo)); ?>" class="thmaxwidth"/></div> <br/>
            <a onclick="return confirm('<?php echo app('translator')->get('default.delete-prompt'); ?>')" class="btn btn-danger" href="<?php echo e(route('admin.blog.remove-picture',['id'=>$blogpost->id])); ?>"><i class="fa fa-trash"></i> <?php echo app('translator')->get('default.delete'); ?> <?php echo app('translator')->get('default.cover-image'); ?></a>

        <?php endif; ?>
    </div>
</div>

<div class="form-group <?php echo e($errors->has('meta_title') ? 'has-error' : ''); ?>">
    <label for="meta_title" class="control-label"><?php echo app('translator')->get('default.meta-title'); ?></label>
    <input class="form-control" name="meta_title" type="text" id="meta_title" value="<?php echo e(old('meta_title',isset($blogpost->meta_title) ? $blogpost->meta_title : '')); ?>" >
    <?php echo clean($errors->first('meta_title', '<p class="help-block">:message</p>')); ?>

</div>
<div class="form-group <?php echo e($errors->has('meta_description') ? 'has-error' : ''); ?>">
    <label for="meta_description" class="control-label"><?php echo app('translator')->get('default.meta-description'); ?></label>
    <textarea class="form-control" rows="5" name="meta_description" type="textarea" id="meta_description" ><?php echo e(old('meta_description',isset($blogpost->meta_description) ? $blogpost->meta_description : '')); ?></textarea>
    <?php echo clean($errors->first('meta_description', '<p class="help-block">:message</p>')); ?>

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('default.update') : __('default.create')); ?>">
</div>
<?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/blog-posts/form.blade.php ENDPATH**/ ?>