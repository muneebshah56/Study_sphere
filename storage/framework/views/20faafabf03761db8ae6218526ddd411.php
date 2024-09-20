<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

      <ul class="nav nav-pills" id="myTab3" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><?php echo e(__lang('gateways')); ?></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false"><?php echo e(__lang('settings')); ?></a>
                            </li>
                          </ul>
                          <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                <div class="card">
                                    <div class="card-body">

                                        <table class="table">

                                            <thead>
                                            <tr>
                                                <th><?php echo e(__lang('sms-gateway')); ?></th>
                                                <th><?php echo e(__lang('url')); ?></th>

                                                <th><?php echo e(__lang('installed')); ?></th>
                                                <th><?php echo e(__lang('default')); ?></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $smsGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $gateway = \App\SmsGateway::where('directory',$smsGateway)->first();
                                                ?>
                                                    <tr>
                                                        <td class="name"><?php echo e(__(smsInfo($smsGateway)['name'])); ?>

                                                       <div><small>
                                                                <?php echo e(smsInfo($smsGateway)['description']); ?>

                                                            </small> </div>
                                                        </td>
                                                        <td>
                                                            <a target="_blank" href="<?php echo e(smsInfo($smsGateway)['url']); ?>"><?php echo e(smsInfo($smsGateway)['url']); ?></a>
                                                        </td>
                                                        <td>
                                                            <?php if($gateway): ?>
                                                                <?php echo e(boolToString($gateway->enabled)); ?>

                                                            <?php else: ?>
                                                                <?php echo e(__lang('no')); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($gateway): ?>
                                                                <?php echo e(boolToString($gateway->default)); ?>

                                                            <?php else: ?>
                                                                <?php echo e(__lang('no')); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <div class="button-group dropleft">
                                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fa fa-cogs"></i>  <?php echo e(__lang('actions')); ?>

                                                                </button>
                                                                <div class="dropdown-menu wide-btn">
                                                                    <?php if($gateway && $gateway->enabled==1): ?>
                                                                        <a class="dropdown-item" href="<?php echo e(route('admin.smsgateway.edit',['smsGateway'=>$gateway->id])); ?>"><i class="fa fa-edit"></i> <?php echo app('translator')->get('default.edit'); ?></a>
                                                                        <a class="dropdown-item" href="<?php echo e(route('admin.smsgateway.uninstall',['smsGateway'=>$gateway->id])); ?>"><i class="fa fa-trash"></i> <?php echo app('translator')->get('default.uninstall'); ?></a>
                                                                    <?php else: ?>
                                                                        <a class="dropdown-item" href="<?php echo e(route('admin.smsgateway.install',['gateway'=>$smsGateway])); ?>"><i class="fa fa-download"></i> <?php echo app('translator')->get('default.install'); ?></a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>

                                        </table>


                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" action="<?php echo e(selfURL()); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <label for="password1" class="control-label"><?php echo e(formLabel($form->get('sms_enabled'))); ?></label>


                                                <input type="checkbox" name="sms_enabled" value="1" <?php if($enabled==1): ?> checked <?php endif; ?>>

                                                <p class="help-block"><?php echo e(formElementErrors($form->get('sms_enabled'))); ?></p>

                                            </div>

                                            <div class="form-footer">
                                                <button type="submit" class="btn btn-primary"><?php echo e(__lang('submit')); ?></button>
                                            </div>

                                        </form>

                                    </div>

                                </div>
                            </div>
                          </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/smsgateway/index.blade.php ENDPATH**/ ?>