<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.student.sessions')=>__('default.courses'),
            '#'=>__lang('send-message')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div>
          <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-envelope"></i> <?php echo e(__lang('email')); ?></a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-mobile"></i> <?php echo e(__lang('sms')); ?></a>
                                </li>
                              </ul>
                              <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">

                                    <div class="card">
                                        <div class="card-header">
                                            <?php echo e($subTitle); ?>

                                        </div>
                                        <div class="card-body">
                                            <form method="post" class="form-horizontal" action="<?php echo e(adminUrl(array('controller'=>'student','action'=>'mailsession','id'=>$id))); ?>">
                                                <?php echo csrf_field(); ?>



                                                <div class="form-group">
                                                    <label><?php echo e(__lang('sender-name')); ?></label>
                                                    <input required="required" name="name" class="form-control" type="text" value="<?php echo e($senderName); ?>" />
                                                </div>




                                                <div class="form-group">
                                                    <label><?php echo e(__lang('sender-email')); ?></label>
                                                    <input  required="required"  name="senderEmail" class="form-control" type="text" value="<?php echo e($senderEmail); ?>" />

                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo e(__lang('subject')); ?></label>
                                                    <input name="subject" class="form-control" type="text" value="" />

                                                </div>



                                                <div class="form-group">
                                                    <label><?php echo e(__lang('message')); ?></label>
                                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
                                                </div>




                                                <div class="form-footer">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope"></i> <?php echo e(__lang('send-now')); ?></button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>





                                </div>
                                <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                    <?php if(getSetting('sms_enabled')==1): ?>
                                 <div class="card">
                                    <div class="card-header">
                                        <?php echo e($smsTitle); ?>

                                    </div>
                                    <div class="card-body">
                                        <form class="form" method="post" action="<?php echo e(adminUrl( ['controller' => 'session', 'action' => 'smssession','id'=>$id])); ?>">
<?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <label for="gateway"><?php echo e(__lang('gateway')); ?></label>
                                                <select required name="gateway" id="gateway" class="form-control">
                                                    <option value=""></option>
                                                    <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if(old('gateway')==$gateway->id): ?> selected <?php endif; ?> value="<?php echo e($gateway->id); ?>"><?php echo e($gateway->gateway_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="smsmessage"><?php echo e(__lang('message')); ?></label>
                                                <textarea  required name="message" id="smsmessage" cols="30" rows="10" class="form-control"><?php echo e(old('message')); ?></textarea>
                                                <p>
                                                    <span id="remaining">160 <?php echo e(__lang('characters-remaining')); ?></span>
                                                    <span id="messages">1 <?php echo e(__lang('messages')); ?></span>
                                                </p>
                                            </div>

                                            <button class="btn btn-primary" type="submit"><?php echo e(__lang('send')); ?></button>
                                        </form>
                                    </div>
                                </div>

                                    <?php else:  ?>
                                    <?php echo e(__lang('sms-disabled')); ?>.  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','configure_sms_gateways')): ?> <?php echo clean(__lang('click-to-configure',['link'=>adminUrl(array('controller'=>'smsgateway','action'=>'index'))])); ?><?php endif; ?>
                                    <?php endif;  ?>

                                </div>
                              </div>


</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset('client/vendor/ckeditor/ckeditor.js')); ?>"></script>
    <script type="text/javascript">

        CKEDITOR.replace('message', {
            filebrowserBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
            filebrowserImageBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
            filebrowserFlashBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager'
        });

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
        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/student/mailsession.blade.php ENDPATH**/ ?>