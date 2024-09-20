<?php $__env->startSection('page-title',setting('general_homepage_title')); ?>
<?php $__env->startSection('meta-description',setting('general_homepage_meta_desc')); ?>

<?php $__env->startSection('content'); ?>


    <?php if(optionActive('slideshow')): ?>
    <section class="home-slider owl-carousel">

        <?php for($i=1;$i<=10;$i++): ?>
            <?php if(!empty(toption('slideshow','file'.$i))): ?>
            <?php $__env->startSection('header'); ?>
                <?php echo \Illuminate\View\Factory::parentPlaceholder('header'); ?>

                <style>

                    <?php if(!empty(toption('slideshow','heading_font_color'.$i))): ?>

                                            .slhc<?php echo e($i); ?>{
                        color: #<?php echo e(toption('slideshow','heading_font_color'.$i)); ?> !important;
                    }

                    <?php endif; ?>

                                        <?php if(!empty(toption('slideshow','text_font_color'.$i))): ?>
                                        .sltx<?php echo e($i); ?>{
                        color: #<?php echo e(toption('slideshow','text_font_color'.$i)); ?> !important;
                    }
                    <?php endif; ?>

                </style>



            <?php $__env->stopSection(); ?>
        <div class="slider-item"  <?php if(!empty(toption('slideshow','file'.$i))): ?>  style="background-image:url(<?php echo e(asset(toption('slideshow','file'.$i))); ?>);" <?php endif; ?> >
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="col-md-6 ftco-animate">
                        <h1 class="mb-4 <?php if(!empty(toption('slideshow','heading_font_color'.$i))): ?>  slhc<?php echo e($i); ?> <?php endif; ?>"    ><?php echo e(toption('slideshow','slide_heading'.$i)); ?></h1>
                        <p   <?php if(!empty(toption('slideshow','text_font_color'.$i))): ?> class="sltx<?php echo e($i); ?>" <?php endif; ?>   ><?php echo e(toption('slideshow','slide_text'.$i)); ?></p>
                        <p><a href="<?php echo e(toption('slideshow','url'.$i)); ?>" class="btn btn-primary px-4 py-3 mt-3"><?php echo e(toption('slideshow','button_text'.$i)); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
            <?php endif; ?>
        <?php endfor; ?>

    </section>
    <?php endif; ?>

    <?php if(optionActive('homepage-services')): ?>
        <?php
            $count=0;
        ?>


    <section class="ftco-services ftco-no-pb">
        <div class="container-wrap">
            <div class="row no-gutters">
                <?php for($i=1;$i<=4;$i++): ?>
                    <?php if(!empty(toption('homepage-services','heading'.$i))): ?>
                <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-primary">
                    <div class="media block-6 d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="<?php echo e(toption('homepage-services','icon'.$i)); ?>"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading"><?php echo e(toption('homepage-services','heading'.$i)); ?></h3>
                            <p><?php echo clean(toption('homepage-services','text'.$i)); ?></p>
                        </div>
                    </div>
                </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </section>


    <?php endif; ?>

    <?php if(optionActive('homepage-about')): ?>
    <section class="ftco-section ftco-no-pt ftc-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-5 order-md-last wrap-about wrap-about d-flex align-items-stretch">
                    <?php if(!empty(toption('homepage-about','image'))): ?>
                    <div class="img" style="background-image: url(<?php echo e(asset(toption('homepage-about','image'))); ?>); border"></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
                    <h2 class="mb-4"><?php echo e(toption('homepage-about','heading')); ?></h2>
                    <p><?php echo clean( toption('homepage-about','text') ); ?></p>
                    <div class="row mt-5">
                        <?php for($i=1;$i<=6;$i++): ?>
                            <?php if(!empty(toption('homepage-about','heading'.$i))): ?>
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="<?php echo e(toption('homepage-about','icon'.$i)); ?>"></span></div>
                                <div class="text pl-3">
                                    <h3><?php echo e(toption('homepage-about','heading'.$i)); ?></h3>
                                    <p><?php echo clean(toption('homepage-about','text'.$i)); ?> </p>
                                </div>
                            </div>
                        </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <?php if(optionActive('featured-courses')): ?>
    <section class="ftco-section">
        <div class="container-fluid px-4">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><?php echo e(toption('featured-courses','heading')); ?></h2>
                    <p><?php echo e(toption('featured-courses','description')); ?></p>
                </div>
            </div>
            <div class="row">
                <?php
                    $courses = toption('featured-courses','courses');
                ?>
                <?php if(is_array($courses)): ?>
                <?php $__currentLoopData = toption('featured-courses','courses'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($course) && \App\Course::find($course)): ?>
                        <?php
                            $course = \App\Course::find($course);
                        ?>
                <div class="col-md-3 course ftco-animate">
                    <?php if(!empty($course->picture)): ?>
                    <div class="img" style="background-image: url(<?php echo e(asset($course->picture)); ?>);"></div>
                    <?php endif; ?>
                    <div class="text pt-4">
                        <p class="meta d-flex">
                            <span><i class="fa fa-money-bill"></i><?php echo e(sitePrice($course->fee)); ?></span>
                            <span><i class="icon-table mr-2"></i><?php echo e($course->lessons()->count()); ?> <?php echo e(__lang('classes')); ?></span>
                        </p>
                        <h3><a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><?php echo e($course->name); ?></a></h3>
                        <p><?php echo e(limitLength(strip_tags($course->short_description),100)); ?></p>
                        <p><a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>" class="btn btn-primary"><?php echo e(__lang('details')); ?></a></p>
                    </div>
                </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if(optionActive('instructors')): ?>
    <section class="ftco-section bg-light">
        <div class="container-fluid px-4">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><?php echo e(toption('instructors','heading')); ?></h2>
                    <p><?php echo e(toption('instructors','description')); ?></p>
                </div>
            </div>
            <div class="row">
                <?php
                $instructors = toption('instructors','instructors');
                ?>
                <?php if(is_array($instructors)): ?>
                <?php $__currentLoopData = toption('instructors','instructors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $admin = \App\Admin::find($admin);
                    ?>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <?php if(empty($admin->user->picture)): ?>
                                <div class="img align-self-stretch" style="background-image: url(<?php echo e(asset('img/user.png')); ?>);"></div>

                            <?php else: ?>
                                <div class="img align-self-stretch" style="background-image: url(<?php echo e(asset($admin->user->picture)); ?>);"></div>

                            <?php endif; ?>

                        </div>
                        <div class="text pt-3 text-center">
                            <h3><a  href="<?php echo e(route('instructor',['admin'=>$admin->id])); ?>"><?php echo e($admin->user->name.' '.$admin->user->last_name); ?></a></h3>

                            <div class="faded">
                                <p><?php echo e(limitLength($admin->about,100)); ?></p>
                                <ul class="ftco-social text-center">
                                    <?php if(!empty($admin->social_facebook)): ?>
                                        <li class="ftco-animate"><a href="<?php echo e($admin->social_facebook); ?>"><span class="icon-facebook"></span></a></li>
                                    <?php endif; ?>

                                    <?php if(!empty($admin->social_twitter)): ?>
                                            <li class="ftco-animate"><a href="<?php echo e($admin->social_twitter); ?>"><span class="icon-twitter"></span></a></li>
                                    <?php endif; ?>

                                    <?php if(!empty($admin->social_linkedin)): ?>
                                            <li class="ftco-animate"><a href="<?php echo e($admin->social_linkedin); ?>"><span class="icon-linkedin"></span></a></li>
                                    <?php endif; ?>

                                    <?php if(!empty($admin->social_instagram)): ?>
                                            <li class="ftco-animate"><a href="<?php echo e($admin->social_instagram); ?>"><span class="icon-instagram"></span></a></li>
                                    <?php endif; ?>

                                    <?php if(!empty($admin->social_website)): ?>
                                            <li class="ftco-animate"><a href="<?php echo e($admin->social_website); ?>"><span class="icon-globe"></span></a></li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if(optionActive('blog')): ?>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><?php echo e(toption('blog','heading')); ?></h2>
                    <p><?php echo e(toption('blog','description')); ?></p>
                </div>
            </div>
            <div class="row">

                <?php $__currentLoopData = \App\BlogPost::whereDate('publish_date','<=',\Illuminate\Support\Carbon::now()->toDateTimeString())->where('enabled',1)->orderBy('publish_date','desc')->limit(intval(toption('blog','limit')))->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>" class="block-20 d-flex align-items-end" <?php if(!empty($post->cover_photo)): ?> style="background-image: url('<?php echo e(asset($post->cover_photo)); ?>');" <?php endif; ?> >
                            <div class="meta-date text-center p-2">
                                <span class="day"><?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('D')); ?></span>
                                <span class="mos"><?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('M')); ?></span>
                                <span class="yr"><?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('Y')); ?></span>
                            </div>
                        </a>
                        <div class="text bg-white p-4">
                            <h3 class="heading"><a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>"><?php echo e($post->title); ?></a></h3>
                            <p><?php echo e(limitLength(strip_tags($post->content),100)); ?></p>
                            <div class="d-flex align-items-center mt-4">
                                <p class="mb-0"><a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>" class="btn btn-primary"><?php echo e(__lang('read-more')); ?> <span class="ion-ios-arrow-round-forward"></span></a></p>
                                <p class="ml-auto mb-0">
                                    <?php if($post->admin): ?>
                                    <a <?php if($post->admin->public == 1): ?>  href="<?php echo e(route('instructor',['admin'=>$post->admin_id])); ?>" <?php endif; ?> class="mr-2"><?php echo e($post->admin->user->name.' '.$post->admin->user->last_name); ?></a>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if(optionActive('testimonials')): ?>
    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><?php echo e(toption('testimonials','heading')); ?></h2>
                    <p><?php echo e(toption('testimonials','description')); ?></p>
                </div>
            </div>
            <div class="row ftco-animate justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <?php for($i=1;$i <= 6; $i++): ?>
                            <?php if(!empty(toption('testimonials','name'.$i))): ?>

                            <div class="item">
                            <div class="testimony-wrap d-flex">
                                <?php if(!empty(toption('testimonials','image'.$i))): ?>
                                    <div class="user-img mr-4" style="background-image: url(<?php echo e(asset(toption('testimonials','image'.$i))); ?>)"></div>
                                <?php else: ?>
                                    <div class="user-img mr-4" style="background-image: url(<?php echo e(asset('img/man.jpg')); ?>)"></div>
                                <?php endif; ?>


                                <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                    <p><?php echo e(toption('testimonials','text'.$i)); ?></p>
                                    <p class="name"><?php echo e(toption('testimonials','name'.$i)); ?></p>
                                    <span class="position"><?php echo e(toption('testimonials','role'.$i)); ?></span>
                                </div>
                            </div>
                        </div>

                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if(optionActive('footer-gallery')): ?>
    <section class="ftco-gallery">
        <div class="container-wrap">
            <div class="row no-gutters">
                <?php for($i=1;$i <= 4; $i++): ?>
                    <?php if(!empty(toption('footer-gallery','image'.$i))): ?>
                    <div class="col-md-3 ftco-animate">
                    <a href="<?php echo e(toption('footer-gallery','image'.$i)); ?>" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo e(resizeImage(toption('footer-gallery','image'.$i),338,350,url('/'))); ?>);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-image"></span>
                        </div>
                    </a>
                </div>
                    <?php endif; ?>

                <?php endfor; ?>

            </div>
        </div>
    </section>
    <?php endif; ?>




<?php $__env->stopSection(); ?>



<?php echo $__env->make(TLAYOUT, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/fox/views/site/home/index.blade.php ENDPATH**/ ?>