<?php $__env->startSection('pageTitle',__('default.menus')); ?>
<?php $__env->startSection('innerTitle',__('default.footer-menu')); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>__('default.footer-menu')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-md-4">
            <h4><?php echo app('translator')->get('default.add-links'); ?></h4>
            <div  id="accordionExample">
                <div class="accordion">
                    <div class="accordion-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h4>
                                <?php echo app('translator')->get('default.pages'); ?>
                        </h4>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="list-group">
                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="list-group-item"><?php echo e($page['name']); ?>

                                        <form method="post" class="menuform int_inlinedisp" action="<?php echo e(route('admin.menus.save-footer')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="name" value="<?php echo e($page['name']); ?>"/>
                                            <input type="hidden" name="label" value="<?php echo e($page['name']); ?>"/>
                                            <input type="hidden" name="url" value="<?php echo e($page['url']); ?>"/>
                                            <input type="hidden" name="type" value="p"/>
                                            <span onclick="$(this).parent().submit()"  class="int_curpoin badge badge-primary badge-pill float-right"><?php echo app('translator')->get('default.add'); ?></span>
                                        </form>
                                    </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="accordion">
                    <div class="accordion-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h4 >
                                <?php echo app('translator')->get('default.articles'); ?>

                        </h4>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="list-group">
                                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="list-group-item"><?php echo e($page['name']); ?>

                                        <form method="post" class="menuform int_inlinedisp"  action="<?php echo e(route('admin.menus.save-footer')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="name" value="<?php echo app('translator')->get('default.article'); ?>: <?php echo e($page['name']); ?>"/>
                                            <input type="hidden" name="label" value="<?php echo e($page['name']); ?>"/>
                                            <input type="hidden" name="url" value="<?php echo e($page['url']); ?>"/>
                                            <input type="hidden" name="type" value="a"/>
                                            <span onclick="$(this).parent().submit()"  class="int_curpoin badge badge-primary badge-pill float-right"><?php echo app('translator')->get('default.add'); ?></span>
                                        </form>
                                    </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion">
                    <div class="accordion-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <h4>
                                <?php echo app('translator')->get('default.categories'); ?>

                        </h4>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="list-group">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="list-group-item"><?php echo e($page['name']); ?>

                                        <form method="post" class="menuform int_inlinedisp"  action="<?php echo e(route('admin.menus.save-footer')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="name" value="<?php echo app('translator')->get('default.category'); ?>: <?php echo e($page['name']); ?>"/>
                                            <input type="hidden" name="label" value="<?php echo e($page['name']); ?>"/>
                                            <input type="hidden" name="url" value="<?php echo e($page['url']); ?>"/>
                                            <input type="hidden" name="type" value="g"/>
                                            <span onclick="$(this).parent().submit()"   class="int_curpoin badge badge-primary badge-pill float-right"><?php echo app('translator')->get('default.add'); ?></span>
                                        </form>
                                    </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion">
                    <div class="accordion-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h4>
                                <?php echo app('translator')->get('default.custom'); ?>
                        </h4>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="accordion-body">

                            <form method="post" id="customForm" class="menuform resetform" action="<?php echo e(route('admin.menus.save-footer')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="name" value="<?php echo app('translator')->get('default.custom'); ?>" />
                                <input type="hidden" name="type" value="c"/>
                                <div class="form-group">
                                    <label for="label"><?php echo app('translator')->get('default.label'); ?></label>
                                    <input required class="form-control" type="text" name="label" value=""/>
                                </div>

                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input required  class="form-control" type="text" name="url" value=""/>
                                </div>


                                <div class="form-group">
                                    <label for="sort_order"><?php echo app('translator')->get('default.sort-order'); ?></label>
                                    <input class="form-control number" type="text" name="sort_order" value=""/>
                                </div>

                                <div class="form-group">
                                    <label for="parent_id"><?php echo app('translator')->get('default.parent'); ?></label>
                                    <select class="form-control" name="parent_id" id="parent_id">
                                        <option value="0"><?php echo app('translator')->get('default.none'); ?></option>
                                        <?php $__currentLoopData = \App\FooterMenu::where('parent_id',0)->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($option->id); ?>"><?php echo e($option->label); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="new_window" type="checkbox" value="1" id="new_windowc">
                                    <label class="form-check-label" for="new_windowc">
                                        <?php echo app('translator')->get('default.new-window'); ?>
                                    </label>
                                </div>
                                <br/>


                                <button class="btn btn-primary float-right"><?php echo app('translator')->get('default.add'); ?></button>

                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8" >
            <h4><?php echo app('translator')->get('default.menu'); ?></h4>
            <div>
                <img src="<?php echo e(asset('img/loader.gif')); ?>" id="loaderImg" class="int_hide"/>
            </div>
            <div id="menubox">

            </div>

        </div>


    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/jquery-toast-plugin/dist/jquery.toast.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('client/vendor/jquery-toast-plugin/dist/jquery.toast.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/vendor/jquery/jquery.form.min.js')); ?>" type="text/javascript"></script>
    <script>
"use strict";

        function loadMenu(){
            $('#loaderImg').show();
            $('#menubox').load('<?php echo e(route('admin.menus.load-footer')); ?>',function(){
                $('#loaderImg').hide();
            });

        }

        loadMenu();

        $(document).on('submit','.menuform',function(e){
            e.preventDefault();
            $.toast('<?php echo app('translator')->get('default.saving'); ?>');

            var formId = $(this).attr('id');
            $(this).ajaxSubmit({
                success: function(responseText, statusText, xhr, $form){
                    if(responseText.status){
                        $.toast('<?php echo app('translator')->get('default.changes-saved'); ?>');
                        loadMenu();

                        if(formId=='customForm'){
                            document. getElementById("customForm").reset();
                        }
                    }
                    else{
                        $.toast(responseText.error);
                    }
                },
                error: function(jqXHR,textStatus,errorThrown){
                    $.toast('<?php echo app('translator')->get('default.error-occurred'); ?>');
                }
            });
        });

        $(document).on('click','.deletemenu',function(e){
            e.preventDefault();
            $.toast('<?php echo app('translator')->get('default.removing'); ?>');
            $.get($(this).attr('href'),function(data){
                loadMenu();
            });
        });




    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/menu/footer_menu.blade.php ENDPATH**/ ?>