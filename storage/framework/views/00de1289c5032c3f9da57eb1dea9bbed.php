<?php $__env->startSection('pageTitle',$paymentMethod->name); ?>
<?php $__env->startSection('innerTitle',$paymentMethod->name); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.payment-gateways')=>__lang('payment-methods'),
            '#'=>__lang('edit')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab"  class="nav nav-pills bar_tabs" role="tablist">
            <li class="nav-item" ><a class="nav-link active" href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><?php echo e(__lang('settings')); ?></a>
            </li>
            <li id="methodtab" class="nav-item"><a  class="nav-link" href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><?php echo e(__lang('currencies')); ?></a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane show active" id="tab_content1" aria-labelledby="home-tab">

                <form method="post" action="<?php echo e(route('admin.payment-gateways.save',['paymentMethod'=>$paymentMethod->id])); ?>">
                    <?php echo csrf_field(); ?>
                <div >
                    <div >
                        <div class="card">

                            <div class="card-body">


                                <?php echo $__env->make($form,$settings, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <div class="form-group">
                                    <div >
                                        <label for="status"><?php echo e(__lang('label')); ?></label>
                                    </div>
                                    <div  >
                                        <input required type="text" name="label" value="<?php echo e(old('label',$paymentMethod->label)); ?>" class="form-control">

                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="form-check form-check-inline">
                                        <input  class="form-check-input" id="is_global" type="checkbox" name="is_global" value="1" <?php if(old('is_global',$paymentMethod->is_global)==1): ?> checked <?php endif; ?> >

                                        <label class="form-check-label" for="inlineCheckbox1"><?php echo e(__lang('all-currencies?')); ?></label>
                                    </div>


                                </div>


                                <div class="form-group">
                                    <div >
                                        <label for="status"><?php echo e(__lang('sort-order')); ?></label>
                                    </div>
                                    <div  >
                                        <input name="sort_order" type="text" class="number form-control" value="<?php echo e(old('sort_order',$paymentMethod->sort_order)); ?>">

                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div >
                        <button class="btn btn-primary" type="submit"><?php echo e(__lang('save-changes')); ?></button>
                    </div><!--end .col-lg-12 -->
                </div>

                </form>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                <div id="currencylist">



                </div>

            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/jquery-toast-plugin/dist/jquery.toast.min.css')); ?>">

    <link href="<?php echo e(asset('client/vendor/jquery-ui-1.11.4/jquery-ui.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('client/vendor/colorpicker/jquery.colorpicker.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('client/vendor/summernote/summernote-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/vendor/jquery-toast-plugin/dist/jquery.toast.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/vendor/jquery-ui-1.11.4/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/vendor/colorpicker/jquery.colorpicker.js')); ?>"></script>

    <script src="<?php echo e(asset('client/js/textrte.js')); ?>"></script>

    <script>
        "use strict";

        $(document).ready(function(){


            $('.colorpicker-full').colorpicker({
                parts:          'full',
                showOn:         'both',
                buttonColorize: true,
                showNoneButton: true,
                buttonImage : '<?php echo e(asset('client/vendor/colorpicker/images/ui-colorpicker.png')); ?>'
            });


            $('.option-form').on('submit',function(e){
                e.preventDefault();
                /!*Ajax Request Header setup*!/
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.toast('<?php echo app('translator')->get('default.saving'); ?>');

                /!* Submit form data using ajax*!/
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'post',
                    data: $(this).serialize(),
                    success: function(response){
                        //------------------------
                        $.toast('<?php echo app('translator')->get('default.changes-saved'); ?>');
                        //--------------------------
                    }});
            });
        });



    </script>

    <?php echo $__env->make('admin.partials.image-browser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/javascript">
        $(function(){
            $('#currencylist').load('<?php echo e(adminUrl(['controller'=>'payment','action'=>'currencies','id'=>$paymentMethod->id])); ?>',function(){
                $('.select2').select2();
            });
            $(document).on('submit','#currencyform',function(event){
                var $this = $(this);
                var frmValues = $this.serialize();
                $('#currencylist').html(' <img  src="<?php echo e(basePath()); ?>/img/ajax-loader.gif">');

                $.ajax({
                    type: $this.attr('method'),
                    url: $this.attr('action'),
                    data: frmValues
                })
                    .done(function (data) {
                        $('#currencylist').html(data);
                    })
                    .fail(function () {
                        $('#currencylist').text("<?php echo e(__lang('error-occurred')); ?>");
                    });
                event.preventDefault();

            });

            $(document).on('click','#currencylist a.delete',function(e){
                e.preventDefault();
                $('#currencylist').html(' <img  src="<?php echo e(basePath()); ?>/img/ajax-loader.gif">');

                $('#currencylist').load($(this).attr('href'));
            });
        });

        toggleTab();
        $('#is_global').click(function(){
            toggleTab();
        });

        function toggleTab() {
            console.log('checked');
            if ($('#is_global').prop("checked")) {

                $('#methodtab').hide();

            }
            else {


                $('#methodtab').show();

            }
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/payment-gateway/edit.blade.php ENDPATH**/ ?>