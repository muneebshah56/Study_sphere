<?php $__env->startSection('page-title',$method->label); ?>


<?php $__env->startSection('payment-content'); ?>



    <table class="table table-striped">
       <tr>
           <th><?php echo e(__lang('amount')); ?></th>
           <td><?php echo e(price(getCart()->getCurrentTotal())); ?></td>
       </tr>
        <tr>
            <th><?php echo e(__lang('invoice-id')); ?></th>
            <td><?php echo e($invoice->id); ?></td>
        </tr>

    </table>
    <div class="text-center">
         <form action="<?php echo e(route('cart.callback',['code'=>$code])); ?>" method="POST">
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo e(paymentOption($code,'publishable_key')); ?>"
                data-currency="<?php echo e($invoice->currency->country->currency_code); ?>"
                data-amount="<?php echo e(($invoice->amount * 100)); ?>"
                data-name="<?php echo e(setting('general_site_name')); ?>"
                data-description="<?php echo e($description); ?>"
                data-email="<?php echo e($user->email); ?>"
                data-image="<?php echo e(asset(resizeImage(setting('image_logo'),128,128,url('/')))); ?>"
                data-locale="auto"
                data-zip-code="true">
            </script>
        </form>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.checkout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\public\gateways/payment/stripe/views/pay.blade.php ENDPATH**/ ?>