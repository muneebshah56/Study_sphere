<?php $__env->startSection('page-title',setting('general_homepage_title')); ?>
<?php $__env->startSection('meta-description',setting('general_homepage_meta_desc')); ?>

<?php $__env->startSection('content'); ?>

    <?php if(optionActive('slideshow')): ?>
    <!-- Start Hero Area -->
    <section class="hero-area style2" <?php if(!empty(toption('slideshow','file'))): ?> style="background-image: url('<?php echo e(asset(toption('slideshow','file'))); ?>');"   <?php endif; ?> >
        <!-- Single Slider -->
        <div class="hero-inner">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-6 co-12">
                        <div class="home-slider">
                            <div class="hero-text">
                                <?php if(!empty(toption('slideshow','sub_heading'))): ?>
                                <h5 class="wow fadeInLeft" data-wow-delay=".3s"><?php echo e(toption('slideshow','sub_heading')); ?></h5>
                                <?php endif; ?>
                                    <?php if(!empty(toption('slideshow','heading'))): ?>
                                <h1 class="wow fadeInLeft" data-wow-delay=".5s"><?php echo toption('slideshow','heading'); ?></h1>
                                    <?php endif; ?>
                                <p class="wow fadeInLeft" data-wow-delay=".7s"><?php echo toption('slideshow','text'); ?></p>
                                 <?php if(!empty(toption('slideshow','button_text') )): ?>
                                <div class="button style2 wow fadeInLeft" data-wow-delay=".9s">
                                    <a href="<?php echo e(url(toption('slideshow','url'))); ?>" class="btn"><i class="lni lni-arrow-right"></i> <?php echo e(toption('slideshow','button_text')); ?></a>
                                </div>
                                    <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>
    <!--/ End Hero Area -->
    <?php endif; ?>
    <?php if(optionActive('homepage-services')): ?>
    <!-- Start Features Area -->
    <section class="features style2">
        <div class="container-fluid">
            <div class="single-head">
                <div class="row">
                    <?php for($i=1;$i<=4;$i++): ?>
                        <?php if(!empty(toption('homepage-services','heading'.$i))): ?>
                    <div class="col-lg-3 col-md-6 col-12 padding-zero">
                        <!-- Start Single Feature -->
                        <div class="single-feature">
                            <h3><a href="<?php echo e(url(toption('homepage-services','url'.$i))); ?>"><?php echo e(toption('homepage-services','heading'.$i)); ?></a></h3>
                            <p><?php echo e(toption('homepage-services','text'.$i)); ?></p>
                            <div class="button">
                                <a href="<?php echo e(url(toption('homepage-services','url'.$i))); ?>" class="btn"><?php echo e(toption('homepage-services','button_text'.$i)); ?> <i class="lni lni-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- End Single Feature -->
                    </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Features Area -->
    <?php endif; ?>

    <?php if(optionActive('homepage-about')): ?>
    <!-- Start Experience Area -->
    <section class="experience section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="left-content">
                        <div class="exp-title align-left">
                            <span class="wow fadeInDown" data-wow-delay=".2s"><?php echo e(toption('homepage-about','sub_heading')); ?></span>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s"><?php echo e(toption('homepage-about','heading')); ?></h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo clean(toption('homepage-about','text')); ?></p>
                            <div class="button wow fadeInUp" data-wow-delay="1s">
                                <a href="<?php echo e(url(toption('homepage-about','button_url'))); ?>" class="btn"><?php echo e(toption('homepage-about','button_text')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!empty(toption('homepage-about','image'))): ?>
                <div class="col-lg-4 col-12">
                    <div class="image wow fadeInRight" data-wow-delay="0.5s">
                        <img src="<?php echo e(resizeImage(toption('homepage-about','image'),540,570)); ?>" alt="#">
                        <h2><?php echo e(toption('homepage-about','number')); ?> <span class="year"><?php echo e(toption('homepage-about','years')); ?></span> <span class="work"><?php echo e(toption('homepage-about','experience-text')); ?></span></h2>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <!-- Mini Call To Action -->
            <div class="cta-mini">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                        <p><?php echo e(toption('homepage-about','footer_text')); ?> <a href="<?php echo e(url(toption('homepage-about','footer_button_url'))); ?>"><?php echo e(toption('homepage-about','footer_button_text')); ?> </a> </p>
                    </div>
                </div>
            </div>
            <!-- End Mini Call To Action -->
        </div>
    </section>
    <!-- /End Experience Area -->
    <?php endif; ?>

    <?php if(optionActive('highlights')): ?>
        <?php if(!empty(toption('highlights','image'))): ?>
<?php $__env->startSection('header'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('header'); ?>
    <style>
        .our-achievement{
            background-image: url("<?php echo e(resizeImage(toption('highlights','image'),1920,1360)); ?>");
        }
    </style>
<?php $__env->stopSection(); ?>
<?php endif; ?>
<!-- Start Achivement Area -->
<section class="our-achievement section overlay">
    <div class="container">
        <div class="row">
            <?php for($i=0;$i<=4;$i++): ?>
                <?php if(!empty(toption('highlights','heading'.$i))): ?>
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                            <h3 class="counter_"><?php echo e(toption('highlights','heading'.$i)); ?></h3>
                            <h4><?php echo e(toption('highlights','text'.$i)); ?></h4>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>



        </div>
    </div>
</section>
<!-- End Achivement Area -->
<?php endif; ?>

<?php if(optionActive('featured-courses')): ?>
    <!-- Start Courses Area -->
    <section class="courses style2 section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <?php if(!empty(toption('featured-courses','sub_heading'))): ?>
                        <span class="wow zoomIn" data-wow-delay="0.2s"><?php echo e(toption('featured-courses','sub_heading')); ?></span>
                        <?php endif; ?>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s"><?php echo e(toption('featured-courses','heading')); ?></h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo e(toption('featured-courses','text')); ?></p>
                    </div>
                </div>
            </div>
            <div class="single-head">
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
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Course -->
                        <div class="single-course wow fadeInUp" data-wow-delay=".2s">

                            <div class="course-image">
                                <a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>">

                                        <?php if(!empty($course->picture)): ?>
                                            <img src="<?php echo e(resizeImage($course->picture,370,230)); ?>" alt="<?php echo e($course->name); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo e(resizeImage('img/course.png',370,230)); ?>" alt="<?php echo e($course->name); ?>">
                                        <?php endif; ?>
                                </a>
                            </div>

                            <div class="content">
                                <p class="price"><?php echo e(sitePrice($course->fee)); ?></p>
                                <?php if($course->courseCategories()->count()>0): ?>
                                <p class="date"><?php echo e($course->courseCategories()->first()->name); ?></p>
                                <?php endif; ?>
                                <h3><a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><?php echo e($course->name); ?></a></h3>
                            </div>
                        </div>
                        <!-- End Single Course -->
                    </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="button">
                            <a href="<?php echo e(route('courses')); ?>" class="btn"><?php echo e(__lang('view-all')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Courses Area -->
<?php endif; ?>

    <?php if(optionActive('instructors')): ?>
    <!-- Start Teachers -->
    <section id="teachers" class="teachers section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center gray-bg">
                        <?php if(!empty(toption('instructors','sub_heading'))): ?>
                        <span class="wow zoomIn" data-wow-delay="0.2s"><?php echo e(toption('instructors','sub_heading')); ?></span>
                        <?php endif; ?>

                        <h2 class="wow fadeInUp" data-wow-delay=".4s"><?php echo e(toption('instructors','heading')); ?></h2>

                        <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo e(toption('instructors','text')); ?></p>
                    </div>
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
                    <?php if($admin): ?>
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
                                                    <img src="<?php echo e(resizeImage($admin->user->picture,800,1020)); ?>" alt="">
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
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>

            </div>
        </div>
    </section>
    <!--/ End Teachers Area -->
    <?php endif; ?>
<?php if(optionActive('testimonials')): ?>
    <!-- Start Testimonials Area -->
    <section class="testimonials style2 section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center gray-bg">
                        <?php if(!empty(toption('testimonials','sub_heading'))): ?>
                        <span class="wow zoomIn" data-wow-delay="0.2s"><?php echo e(toption('testimonials','sub_heading')); ?></span>
                        <?php endif; ?>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s"><?php echo e(toption('testimonials','heading')); ?></h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo e(toption('testimonials','text')); ?></p>
                    </div>
                </div>
            </div>
            <div class="row testimonial-slider">
                <?php for($i=1;$i <= 6; $i++): ?>
                    <?php if(!empty(toption('testimonials','name'.$i))): ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Testimonial -->
                    <div class="single-testimonial">
                        <div class="text">
                            <p>"<?php echo e(toption('testimonials','text'.$i)); ?>"</p>
                        </div>
                        <div class="author">
                            <?php if(!empty(toption('testimonials','image'.$i))): ?>
                                <img   src="<?php echo e(resizeImage(toption('testimonials','image'.$i),300,300)); ?>" >
                            <?php else: ?>
                                <img   src="<?php echo e(asset('img/man.jpg')); ?>">
                            <?php endif; ?>
                                <h4 class="name">
                                    <?php echo e(toption('testimonials','name'.$i)); ?>

                                    <span class="deg"><?php echo e(toption('testimonials','role'.$i)); ?></span>
                                </h4>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </section>
    <!-- End Testimonial Area -->
<?php endif; ?>
<?php if(optionActive('how-it-works')): ?>
    <!-- Start Work Process Area -->
    <section class="work-process section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="section-title align-center gray-bg">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s"><?php echo e(toption('how-it-works','heading')); ?></h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo e(toption('how-it-works','text')); ?></p>
                    </div>
                </div>
            </div>
            <div class="list">
                <div class="row">
                    <?php for($i=1;$i <= 3; $i++): ?>
                        <?php if(!empty(toption('how-it-works','heading'.$i))): ?>
                    <div class="col-lg-4 col-md-4 col-12">
                        <ul class="wow fadeInUp" data-wow-delay=".2s">
                            <li>
                                <span class="serial">1</span>
                                <p class="content">
                                    <span><?php echo e(toption('how-it-works','heading'.$i)); ?></span>
                                    <?php echo e(toption('how-it-works','text'.$i)); ?>

                                </p>
                            </li>
                        </ul>
                    </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Work Process Area -->
<?php endif; ?>
<?php if(optionActive('blog')): ?>
    <!-- Start Latest News Area -->
    <div class="latest-news-area style2 section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <span class="wow zoomIn" data-wow-delay="0.2s"><?php echo e(toption('blog','sub_heading')); ?></span>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s"><?php echo e(toption('blog','heading')); ?></h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo e(toption('blog','text')); ?></p>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">
                    <?php $__currentLoopData = \App\BlogPost::whereDate('publish_date','<=',\Illuminate\Support\Carbon::now()->toDateTimeString())->where('enabled',1)->orderBy('publish_date','desc')->limit(intval(toption('blog','limit')))->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single News -->
                            <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=".2s">
                                <div class="image">
                                    <?php if(!empty($post->cover_photo)): ?>
                                        <a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>"><img class="thumb"  src="<?php echo e(resizeImage($post->cover_photo,1050,700)); ?>" alt="#"></a>
                                    <?php endif; ?>
                                </div>
                                <div class="content-body">
                                    <div class="meta-data">
                                        <ul>
                                            <?php
                                                $category = $post->blogCategories()->first();
                                            ?>

                                            <?php if($category): ?>
                                                <li>
                                                    <i class="lni lni-tag"></i>
                                                    <a href="<?php echo e(route('blog')); ?>?category=<?php echo e($category->id); ?>"><?php echo e($category->name); ?></a>
                                                </li>
                                            <?php endif; ?>

                                            <li>
                                                <i class="lni lni-calendar"></i>
                                                <a href="javascript:void(0)"><?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('M d, Y')); ?></a>
                                            </li>

                                        </ul>
                                    </div>
                                    <h4 class="title"><a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>"><?php echo e($post->title); ?></a></h4>
                                    <p><?php echo e(limitLength(strip_tags($post->content),150)); ?></p>
                                    <div class="button">
                                        <a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>" class="btn"><?php echo e(__lang('read-more')); ?></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single News -->
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Latest News Area -->
<?php endif; ?>

<?php if(optionActive('icons')): ?>
    <!-- Start Clients Area -->
    <div class="client-logo-section">
        <div class="container">
            <div class="client-logo-wrapper">
                <div class="client-logo-carousel d-flex align-items-center justify-content-between">
                    <?php for($i=1;$i <= 12; $i++): ?>
                        <?php if(!empty(toption('icons','image'.$i))): ?>
                            <div class="client-logo">
                                <img src="<?php echo e(resizeImage(toption('icons','image'.$i),230,95)); ?>" alt="#">
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->startSection('footer'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
    <script>
        //====== Clients Logo Slider
        tns({
            container: '.client-logo-carousel',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 4,
                },
                992: {
                    items: 4,
                },
                1170: {
                    items: 6,
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<!-- End Clients Area -->
<?php endif; ?>
<?php $__env->stopSection(); ?>





<?php echo $__env->make(TLAYOUT, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/edugridstwo/views/site/home/index.blade.php ENDPATH**/ ?>