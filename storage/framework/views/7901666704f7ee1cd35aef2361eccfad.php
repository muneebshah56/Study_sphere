<?php $__env->startSection('page-title',setting('general_homepage_title')); ?>
<?php $__env->startSection('meta-description',setting('general_homepage_meta_desc')); ?>

<?php $__env->startSection('content'); ?>

    <main>


    <?php if(optionActive('slideshow')): ?>

            <!-- Start Hero Area -->
            <section class="hero-area">
                <div class="hero-slider">
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

                    <!-- Single Slider -->
                    <div class="hero-inner overlay" style="background-image: url('<?php echo e(resizeImage(toption('slideshow','file'.$i),1600,680)); ?>');">
                        <div class="container">
                            <div class="row ">
                                <div class="col-lg-8 offset-lg-2 col-md-12 co-12">
                                    <div class="home-slider">
                                        <div class="hero-text">
                                            <h5 class="wow fadeInUp" data-wow-delay=".3s"><?php echo e(toption('slideshow','sub_heading'.$i)); ?></h5>
                                            <h1 class="wow fadeInUp" data-wow-delay=".5s"   <?php if(!empty(toption('slideshow','heading_font_color'.$i))): ?> class="slhc<?php echo e($i); ?>" <?php endif; ?>     ><?php echo e(toption('slideshow','slide_heading'.$i)); ?></h1>
                                            <p class="wow fadeInUp" data-wow-delay=".7s"    <?php if(!empty(toption('slideshow','text_font_color'.$i))): ?> class="sltx<?php echo e($i); ?>" <?php endif; ?>   ><?php echo nl2br(toption('slideshow','slide_text'.$i)); ?></p>
                                            <div class="button wow fadeInUp" data-wow-delay=".9s">
                                                <?php if(!empty(toption('slideshow','button_1_text'.$i))): ?>
                                                    <a href="<?php echo e(url(toption('slideshow','url_1'.$i))); ?>" class="btn"><?php echo e(toption('slideshow','button_1_text'.$i)); ?></a>
                                                <?php endif; ?>
                                                <?php if(!empty(toption('slideshow','button_2_text'.$i))): ?>
                                                    <a href="<?php echo e(url(toption('slideshow','url_2'.$i))); ?>" class="btn alt-btn"><?php echo e(toption('slideshow','button_2_text'.$i)); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Single Slider -->

                    <?php endif; ?>
                <?php endfor; ?>


                </div>
            </section>
                <?php $__env->startSection('footer'); ?>
                    <?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
                    <script>
                        tns({
                            container: '.hero-slider',
                            items: 1,
                            slideBy: 'page',
                            autoplay: false,
                            mouseDrag: true,
                            gutter: 0,
                            nav: true,
                            controls: false,
                            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
                        });
                    </script>
                <?php $__env->stopSection(); ?>
            <!--/ End Hero Area -->

    <?php endif; ?>



        <?php if(optionActive('homepage-services')): ?>

            <!-- Start Features Area -->
            <section class="features">
                <div class="container-fluid">
                    <div class="single-head">
                        <div class="row">
                            <?php for($i=1;$i<=3;$i++): ?>
                                <?php if(!empty(toption('homepage-services','heading'.$i))): ?>
                            <div class="col-lg-4 col-md-4 col-12 padding-zero">
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
    <!-- Start About Us Area -->
    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-left">
                        <div class="about-title align-left">
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
                <div class="col-lg-6 col-12">
                    <div class="about-right wow fadeInRight" data-wow-delay=".4s">
                        <img src="<?php echo e(resizeImage(toption('homepage-about','image'),1200,960)); ?>" alt="#">
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- /End About Us Area -->
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


    <?php if(optionActive('instructors')): ?>
    <!-- Start Teachers -->
    
    <!--/ End Teachers Area -->
    <?php endif; ?>
    <?php if(optionActive('blog')): ?>
    <!-- Start Latest News Area -->
    <div class="latest-news-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s"><?php echo e(toption('blog','heading')); ?></h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo e(toption('blog','sub_heading')); ?></p>
                    </div>
                </div>
            </div>
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
    <!-- End Latest News Area -->
        <?php endif; ?>

        <?php if(optionActive('testimonials')): ?>
    <!-- Start Testimonials Area -->
    <section class="testimonials section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center gray-bg">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s"><?php echo e(toption('testimonials','heading')); ?></h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo e(toption('testimonials','sub_heading')); ?></p>
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
        <?php $__env->startSection('footer'); ?>
            <?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
            <script>
                //========= testimonial
                tns({
                    container: '.testimonial-slider',
                    items: 3,
                    slideBy: 'page',
                    autoplay: false,
                    mouseDrag: true,
                    gutter: 0,
                    nav: true,
                    controls: false,
                    controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
                    responsive: {
                        0: {
                            items: 1,
                        },
                        540: {
                            items: 1,
                        },
                        768: {
                            items: 2,
                        },
                        992: {
                            items: 2,
                        },
                        1170: {
                            items: 3,
                        }
                    }
                });
            </script>
    <?php $__env->stopSection(); ?>
    <!-- End Testimonial Area -->
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


    </main>
<?php $__env->stopSection(); ?>





<?php echo $__env->make(TLAYOUT, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/edugrids/views/site/home/index.blade.php ENDPATH**/ ?>