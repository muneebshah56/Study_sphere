 <form method="post" action="<?php echo e(adminUrl(['controller'=>'session','action'=>'sessiontype','id'=>$id])); ?>" >
    <?php echo csrf_field(); ?>
     <div class="form-group">
     <?php echo e(formElement($select)); ?>

    </div>
<button type="submit" class="btn btn-primary"><?php echo e(__lang('submit')); ?></button>
</form>
<?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/session/sessiontype.blade.php ENDPATH**/ ?>