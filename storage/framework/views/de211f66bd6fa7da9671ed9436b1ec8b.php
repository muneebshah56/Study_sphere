<?php $__env->startSection('page-title',__('default.instructors')); ?>
<?php $__env->startSection('inline-title',__('default.instructors')); ?>
<?php $__env->startSection('crumb'); ?>
    <li><?php echo app('translator')->get('default.instructors'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Start Teachers -->
    <section id="teachers" class="teachers section">
        <div class="container">

            <div class="row">

                <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Single Team -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-team wow fadeInUp" data-wow-delay=".2s">
                        <div class="row">
                            <div class="col-lg-5 col-12">
                                <!-- Image -->
                                <div class="image">
                                    <?php if(empty($admin->user->picture)): ?>
                                        <img src="<?php echo e(asset('img/user.png')); ?>" alt="">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset($admin->user->picture)); ?>" alt="">
                                    <?php endif; ?>
                                </div>
                                <!-- End Image -->
                            </div>
                            <div class="col-lg-7 col-12">
                                <div class="info-head">
                                    <!-- Info Box -->
                                    <div class="info-box">
                                        <span class="designation"><?php echo e($admin->user->name); ?></span>
                                        <h4 class="name"><a href="<?php echo e(route('instructor',['admin'=>$admin->id])); ?>"><?php echo e($admin->user->last_name); ?></a></h4>
                                        <p><?php echo e(limitLength($admin->about,150)); ?></p>
                                    </div>
                                    <!-- End Info Box -->
                                    <!-- Social -->
                                    <ul class="social">

                                        <?php if(!empty($admin->social_facebook)): ?>
                                            <li><a href="<?php echo e(fullUrl($admin->social_facebook)); ?>"><i class="lni lni-facebook-filled"></i></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty($admin->social_twitter)): ?>
                                            <li><a href="<?php echo e(fullUrl($admin->social_twitter)); ?>"><i class="lni lni-twitter-original"></i></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty($admin->social_linkedin)): ?>
                                            <li><a href="<?php echo e(fullUrl($admin->social_linkedin)); ?>"><i class="lni lni-linkedin-original"></i></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty($admin->social_instagram)): ?>
                                            <li><a href="<?php echo e(fullUrl($admin->social_instagram)); ?>"><i class="lni lni-instagram-original"></i></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty($admin->social_website)): ?>
                                            <li><a href="<?php echo e(fullUrl($admin->social_website)); ?>"><i class="lni lni-world"></i></a></li>
                                        <?php endif; ?>

                                    </ul>
                                    <!-- End Social -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>
    <!--/ End Teachers Area -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make(TLAYOUT, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/edugrids/views/site/home/instructors.blade.php ENDPATH**/ ?>