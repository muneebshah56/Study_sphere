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

    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo e(trim(paymentOption($code,'client_id'))); ?><?php echo $funding; ?>&currency=<?php echo e(strtoupper($invoice->currency->country->currency_code)); ?>"></script>


    <div id="paypal-button-container"></div>

        <script>

            paypal.Buttons({

                // Order is created on the server and the order id is returned

                createOrder() {

                    return fetch("<?php echo e(route('cart.method',['function'=>'traineasy_send','code'=>$code])); ?>", {

                        method: "POST",

                        headers: { "Content-Type": "application/json",},


                    })

                        .then((response) => response.json())

                        .then((order) => order.id);

                },

                // Finalize the transaction on the server after payer approval

                onApprove(data) {

                    return fetch("<?php echo e(route('cart.callback',['code'=>$code])); ?>", {

                        method: "POST",

                        headers: {

                            "Content-Type": "application/json",

                        },

                        body: JSON.stringify({

                            orderID: data.orderID

                        })

                    })

                        .then((response) => response.json())

                        .then((orderData) => {

                            // Successful capture! For dev/demo purposes:

                            //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                           // const transaction = orderData.purchase_units[0].payments.captures[0];

                            if(orderData.status=='COMPLETED'){
                                $('#paypal-button-container').html('<h3><?php echo e(__('default.payment-completed')); ?></h3>');
                                window.location.href = '<?php echo e(route('student.student.mysessions')); ?>';
                            }else{
                                alert('<?php echo e(__('default.payment-failed!')); ?>');
                            }


                            // When ready to go live, remove the alert and show a success message within this page. For example:

                            // const element = document.getElementById('paypal-button-container');

                            // element.innerHTML = '<h3>Thank you for your payment!</h3>';

                            // Or go to another URL:  window.location.href = 'thank_you.html';

                        });

                }

            }).render('#paypal-button-container');

        </script>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.checkout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\public\gateways/payment/paypal/views/pay.blade.php ENDPATH**/ ?>