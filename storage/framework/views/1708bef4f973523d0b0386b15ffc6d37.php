<?php $__env->startSection('page-title',$pageTitle); ?>
<?php $__env->startSection('inline-title',$pageTitle); ?>

<?php $__env->startSection('content'); ?>

    <section class="about-area them-2 pb-130 pt-50 recent-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">


                    <div class="card card-default" data-toggle="card-collapse" data-open="true">
                        <div class="card-header card-collapse-trigger">
                            <?php echo e(__lang('filter')); ?>

                        </div>
                        <div class="card-body">
                            <form id="filterform" class="form" role="form"  method="get" action="<?php echo e(route('sessions')); ?>">
                                <div class="form-group input-group margin-none">
                                    <div class=" margin-none">
                                        <input type="hidden" name="group" value="<?php echo e($group); ?>"/>

                                        <div class="form-group">
                                            <label  for="filter"><?php echo e(__lang('search')); ?></label>
                                            <?php echo e(formElement($text)); ?>

                                        </div>
                                        <div  class="form-group">
                                            <label  for="group"><?php echo e(__lang('sort')); ?></label>
                                            <?php echo e(formElement($sortSelect)); ?>

                                        </div>

                                        <div  >
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo e(__lang('filter')); ?></button>
                                            <button type="button" onclick="$('#filterform input, #filterform select').val(''); $('#filterform').submit();" class="btn btn-secondary"><?php echo e(__lang('clear')); ?></button>

                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>



                </div>

                <div class="col-md-9">
                    <?php if($paginator->count()==0): ?>
                        <?php echo e(__lang('no-results')); ?>

                    <?php endif; ?>

                        <div class="row">
                            <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <!-- Single course -->
                                    <div class="single-course mb-70">
                                        <?php if(!empty($course->picture)): ?>
                                            <div class="course-img mb-2">
                                                <a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><img class="course-img img-fluid" src="<?php echo e(asset($course->picture)); ?>" alt="<?php echo e($course->name); ?>"></a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="course-caption">
                                            <div class="course-cap-top">
                                                <h4><a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><?php echo e($course->name); ?></a></h4>
                                            </div>
                                            <div class="course-cap-mid d-flex justify-content-between">


                                                <p>
                                                    <?php echo e(__lang('starts')); ?>: <?php echo e(showDate('d M, Y',$course->start_date)); ?>


                                                    <br>
                                                    <?php echo e(limitLength(strip_tags($course->short_description),50)); ?></p>
                                            </div>
                                            <div class="course-cap-bottom d-flex justify-content-between">
                                                <ul>
                                                    <li><?php echo e(sitePrice($course->fee)); ?></li>
                                                </ul>
                                                <span><a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-info-circle"></i> <?php echo e(__lang('details')); ?></a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    <?php if(false): ?>
                    <div class="row">

                        <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-recent-cap mb-30 ">
                                    <div class="recent-img text-center" style="max-height: 300px">
                                        <?php if(!empty($course->picture)): ?>
                                            <a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><img class="course-img" src="<?php echo e(asset($course->picture)); ?>" alt="<?php echo e($course->name); ?>"></a>
                                        <?php endif; ?>

                                    </div>
                                    <div class="recent-cap pb-5">
                                        <span>
                                            <?php echo e(__lang('starts')); ?>: <?php echo e(showDate('d M, Y',$course->start_date)); ?>

                                        </span>
                                        <h4><a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><?php echo e($course->name); ?></a></h4>
                                        <p><?php echo e(limitLength(strip_tags($course->short_description),50)); ?></p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span><?php echo e(sitePrice($course->fee)); ?></span>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-info-circle"></i> <?php echo e(__lang('details')); ?></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                        <?php endif; ?>
                    <div>
                        <?php
                            // add at the end of the file after the table
                                echo paginationControl(
                                // the paginator object
                                    $paginator,
                                    // the scrolling style
                                    'sliding',
                                    // the partial to use to render the control
                                    null,
                                    // the route to link to when a user clicks a control link
                                    route('sessions')
                                );

                        ?>
                    </div>
                </div>

            </div>
        </div> <!-- row -->
        </div>
    </section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make(TLAYOUT, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/education/views/site/catalog/sessions.blade.php ENDPATH**/ ?>