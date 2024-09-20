<div class="form-group">
    <label for="<?php echo e(@$name); ?>"><?php echo e(@$label); ?></label>
    <?php echo e(Form::select(@$name, $options,@${@$name},['class'=>'form-control '.@$class])); ?>


</div><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/partials/select.blade.php ENDPATH**/ ?>