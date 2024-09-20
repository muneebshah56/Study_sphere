<?php $__env->startSection('pageTitle',__lang('payment-methods')); ?>
<?php $__env->startSection('innerTitle',__lang('payment-methods')); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>__lang('payment-methods')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card"   id="to-payment-methods">
        <div class="card-header">
            <div class="row" >
                <div class="col-md-5"><input id="search-list" class="search form-control"  data-sort="name" placeholder="<?php echo e(__lang('search')); ?>" /></div>
                <div class="col-md-3">
                    <button class="sort btn btn-primary btn-sm btn-block" data-sort="name">
                        <?php echo e(__lang('sort-by-name')); ?>

                    </button>
                </div>
                <div class="col-md-4">

                    <?php echo e(formElement($select)); ?>


                </div>

            </div>
        </div>
    <div class="card-body">
             <table class="table table-striped">
                 <thead>
                 <tr>
                     <th><?php echo e(__lang('name')); ?></th>
                     <th><?php echo e(__lang('enabled')); ?></th>
                     <th>
                         <?php echo e(__lang('installed-currencies')); ?>

                     </th>
                     <th><?php echo e(__lang('supported-currencies')); ?></th>
                     <th><?php echo e(__lang('sort-order')); ?></th>
                     <th></th>
                 </tr>
                 </thead>
                 <tbody   class="list">
                    <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $gateway = \App\PaymentMethod::where('directory',$method)->first();
                        ?>
                        <tr>
                            <td class="name"><?php echo e(__(paymentInfo($method)['name'])); ?></td>
                            <td>
                                <?php if($gateway): ?>
                                    <?php echo e(boolToString($gateway->enabled)); ?>

                                <?php else: ?>
                                    <?php echo e(__lang('no')); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($gateway): ?>
                                    <?php $__currentLoopData = $gateway->currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e(strtoupper($currency->country->currency_code)); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </td>
                            <td class="currency">
                            <article class="readmore"><?php echo e(__(paymentInfo($method)['currencies'])); ?></article>
                            </td>
                            <td>
                                <?php if($gateway): ?>
                                    <?php echo e($gateway->sort_order); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                 <div class="button-group dropleft">
                                                       <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                       <i class="fa fa-cogs"></i>  <?php echo e(__lang('actions')); ?>

                                                       </button>
                                                       <div class="dropdown-menu wide-btn">
                                                           <?php if($gateway && $gateway->enabled==1): ?>
                                                               <a class="dropdown-item" href="<?php echo e(route('admin.payment-gateways.edit',['paymentMethod'=>$gateway->id])); ?>"><i class="fa fa-edit"></i> <?php echo app('translator')->get('default.edit'); ?></a>
                                                               <a class="dropdown-item" href="<?php echo e(route('admin.payment-gateways.uninstall',['paymentMethod'=>$gateway->id])); ?>"><i class="fa fa-trash"></i> <?php echo app('translator')->get('default.uninstall'); ?></a>
                                                           <?php else: ?>
                                                               <a class="dropdown-item" href="<?php echo e(route('admin.payment-gateways.install',['method'=>$method])); ?>"><i class="fa fa-download"></i> <?php echo app('translator')->get('default.install'); ?></a>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('client/vendor/list/list.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/vendor/readmore/readmore.min.js')); ?>"></script>
    <script>
     $(function (){
         $('article').readmore({
             collapsedHeight:30,
             moreLink: '<a class="float-right text-small" href="#"><?php echo e(__lang('show')); ?></a>',
             lessLink: '<a class="float-right text-small"  href="#"><?php echo e(__lang('close')); ?></a>'
         });
     });

        var options = {
            valueNames: [ 'name','currency' ]
        };

        var listObj = new List('to-payment-methods', options);

        var options = {
            valueNames: [ 'name','currency' ]
        };


        $('#currencyselect').change(function(e){
            $('#search-list').val('');
            var cur = $(this).val();
            if(cur=='')
            {
                listObj.search();
            }
            else
            {
                listObj.search(cur);
            }
        });
        $('#search-list').focus(function(){
            if($('#currencyselect').val() != '')
            {
                $('#currencyselect').val('');
                listObj.search();
            }

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/payment-gateway/index.blade.php ENDPATH**/ ?>