<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
<div class="card-body">
  <div class="alert alert-info">
      <?php echo e(__lang('currencies-help')); ?>

      <a href="<?php echo e(adminUrl(['controller'=>'setting','action'=>'currencies'])); ?>" style="text-decoration: underline" target="_blank"><?php echo e(__lang('currency-setup')); ?></a> <?php echo e(strtolower(__lang('page'))); ?>


  </div>
    <form id="currencyform" class="form" method="post" action="<?php echo e(selfURL()); ?>">
        <?php echo csrf_field(); ?>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group" >
                    <label for="currency"><?php echo e(__lang('select-currency')); ?></label>
                    <select class="form-control select2" required="required" name="currency" id="currency">
                        <option value=""></option>
                        <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($currency->id); ?>"><?php echo e($currency->country->currency_name); ?> - <?php echo e($currency->country->currency_code); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo e(__lang('add-currency')); ?></button>
            </div>
        </div>


    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <th><?php echo e(__lang('currency')); ?></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $rowset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($row->country->currency_name); ?> - <?php echo e($row->country->currency_code); ?></td>
                <td><a class="btn btn-primary delete" href="<?php echo e(adminUrl(['controller'=>'payment','action'=>'deletecurrency','paymentMethod'=>$paymentMethod->id,'id'=>$row->id])); ?>"><i class="fa fa-trash"></i> <?php echo e(__lang('remove')); ?></a></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(adminLayout(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/payment/currencies.blade.php ENDPATH**/ ?>