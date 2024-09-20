<?php $__env->startSection('pageTitle',__('default.templates')); ?>
<?php $__env->startSection('innerTitle',__('default.customize').': '.$template->name); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.templates')=>__('default.site-theme'),
            '#'=>__('default.customize')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>





    <a href="<?php echo e(route('admin.templates')); ?>" title="<?php echo app('translator')->get('default.back'); ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('default.back'); ?></button></a>
    <br/><br/>

    <div class="accordion" id="accordionExample">
       <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="accordion int_overvis"  >
            <div class="accordion-header" id="heading<?php echo e($key); ?>" data-toggle="collapse" data-target="#collapse<?php echo e($key); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($key); ?>">
                <h4>
                        <?php echo e($option['name']); ?>

                </h4>
            </div>
            <div id="collapse<?php echo e($key); ?>" class="collapse" aria-labelledby="heading<?php echo e($key); ?>" data-parent="#accordionExample">
                <div class="accordion-body">
                   <p><?php echo e($option['description']); ?></p>

                    <form class="option-form" action="<?php echo e(route('admin.templates.save-options',['option'=>$key])); ?>" method="post" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-3">
                                <?php echo e(Form::select('enabled', ['1'=>__('default.enabled'),'0'=>__('default.disabled')], $option['enabled'], ['class'=>'form-control'])); ?>

                            </div>
                            <div class="col-md-9">
                                <button class="btn btn-primary float-right" type="submit"><?php echo app('translator')->get('default.save-changes'); ?></button>

                            </div>
                        </div>
                        <hr/>
                    <?php if(file_exists('./templates/'.currentTemplate()->directory.'/assets/previews/'.$key.'.jpg')): ?>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home-<?php echo e($key); ?>"><?php echo app('translator')->get('default.settings'); ?></a>
                            </li>
                           <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1-<?php echo e($key); ?>"><?php echo app('translator')->get('default.demo'); ?></a>
                            </li>

                        </ul>
                    <?php endif; ?>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active container px-2 pt-4" id="home-<?php echo e($key); ?>">


                                <?php echo $__env->make($option['form'],$option['values'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            </div>
                            <?php if(file_exists('./templates/'.currentTemplate()->directory.'/assets/previews/'.$key.'.jpg')): ?>

                            <div class="tab-pane container px-2 pt-4" id="menu1-<?php echo e($key); ?>">
                               <img src="<?php echo e(tasset('previews/'.$key.'.jpg')); ?>" class="img-fluid">


                            </div>
                            <?php endif; ?>

                        </div>






                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/jquery-toast-plugin/dist/jquery.toast.min.css')); ?>">

    <link href="<?php echo e(asset('client/vendor/jquery-ui-1.11.4/jquery-ui.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('client/vendor/colorpicker/jquery.colorpicker.css')); ?>" rel="stylesheet">
    <style>
        .modal-backdrop{
            display: none;
        }
    </style>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/templates/settings.blade.php ENDPATH**/ ?>