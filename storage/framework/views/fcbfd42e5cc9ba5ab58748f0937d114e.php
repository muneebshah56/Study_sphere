<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div>

    <!-- Nav tabs -->
    <ul class="nav nav-pills" role="tablist">
        <li class="nav-item"><a  class="nav-link active" href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo e(__lang('message')); ?></a></li>
        <li class="nav-item"><a  class="nav-link" href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo e(__lang('placeholders')); ?></a></li>
        <li class="nav-item"><a class="nav-link"  href="#defaulttab" aria-controls="defaulttab" role="tab" data-toggle="tab"><?php echo e(__lang('default-message')); ?></a></li>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <div class="well">
             <?php echo e(__lang('s-template-desc-'.$template->id)); ?>

            </div>
            <form action="<?php echo e(selfURL()); ?>" method="post">
            <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="smsmessage"><?php echo e(__lang('message')); ?></label>
                    <textarea rows="6"  required="required"  name="message" id="smsmessage" class="form-control summernote"><?php echo e($template->message); ?></textarea>
                    <p>
                        <span id="remaining">160 <?php echo e(__lang('characters-remaining')); ?></span>
                        <span id="messages">1 <?php echo e(__lang('messages')); ?></span>
                    </p>
                    <small><?php echo e(__lang('sms-template-help')); ?>.</small>
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> <?php echo e(__lang('save')); ?></button>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="profile"><?php echo $template->placeholders; ?></div>
        <div role="tabpanel" class="tab-pane" id="defaulttab">

            <div class="well">
                <strong><?php echo e(__lang('message')); ?></strong>
                <hr>
                <p><?php echo $template->default; ?></p></div>
            <a href="<?php echo e(adminUrl(['controller'=>'messages','action'=>'resetsms','id'=>$template->id])); ?>" onclick="return confirm('<?php echo e(__lang('restore-default-help')); ?>')" class="btn btn-primary"><i class="fa fa-refresh"></i> <?php echo e(__lang('restore-default')); ?></a>

        </div>
    </div>

</div>
<script>
    $(document).ready(function(){
        var $remaining = $('#remaining'),
            $messages = $remaining.next();

        $('#smsmessage').keyup(function(){
            var chars = this.value.length,
                messages = Math.ceil(chars / 160),
                remaining = messages * 160 - (chars % (messages * 160) || messages * 160);

            $remaining.text(remaining + ' <?php echo e(__lang('characters-remaining')); ?>');
            $messages.text(messages + ' <?php echo e(__lang('messages')); ?>');
        });

        $('#smsmessage').trigger('keyup');
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/messages/edit-sms.blade.php ENDPATH**/ ?>