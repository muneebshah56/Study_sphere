<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <title><?php echo $__env->yieldContent('page-title'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta-description'); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php if(!empty(setting('image_icon'))): ?>
    <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="<?php echo e(asset(setting('image_icon'))); ?>" type="image/png">
    <?php endif; ?>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(tasset('css/open-iconic-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('css/animate.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(tasset('css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('css/magnific-popup.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(tasset('css/aos.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(tasset('css/ionicons.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(tasset('css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('css/icomoon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('css/style')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('css/fontawesome-all.min.css')); ?>">


    <?php echo $__env->yieldContent('header'); ?>
    <?php echo setting('general_header_scripts'); ?>

    <?php if(optionActive('top-bar')): ?>
        <style>
            <?php if(!empty(toption('top-bar','bg_color'))): ?>
                div.bg-top{
                background-color: #<?php echo e(toption('top-bar','bg_color')); ?>;
            }
            <?php endif; ?>

                 <?php if(!empty(toption('top-bar','font_color'))): ?>
                    .topper .icon a,.topper .icon i{
                        color: #<?php echo e(toption('top-bar','font_color')); ?>;
                    }
                <?php endif; ?>



        </style>
    <?php endif; ?>

    <?php if(optionActive('navigation')): ?>
        <style>
            <?php if(!empty(toption('navigation','bg_color'))): ?>
                .ftco-navbar-light .container, .ftco-navbar-light .navbar-nav > .nav-item .dropdown-menu{
                background-color: #<?php echo e(toption('navigation','bg_color')); ?>;
            }
            <?php endif; ?>

                     <?php if(!empty(toption('navigation','font_color'))): ?>
                .ftco-navbar-light .navbar-nav > .nav-item > .nav-link , .ftco-navbar-light .navbar-nav > .nav-item .dropdown-menu a{
                color: #<?php echo e(toption('navigation','font_color')); ?>;
            }
            <?php endif; ?>



        </style>
    <?php endif; ?>


    <style>
        <?php if(optionActive('footer')): ?>


            <?php if(!empty(toption('footer','bg_color'))): ?>

            .ftco-footer  {
            background-color: #<?php echo e(toption('footer','bg_color')); ?>;
            }

        <?php endif; ?>

            <?php if(!empty(toption('footer','font_color'))): ?>
                .ftco-footer .ftco-footer-widget h2, .ftco-footer .block-21 .text .heading a, .ftco-footer .block-21 .text .meta > div a, .ftco-footer a,.ftco-footer .block-23 ul li span,.ftco-footer .ftco-footer-widget ul li a span,.ftco-footer p {
                    color: #<?php echo e(toption('footer','font_color')); ?>;
                }
            <?php endif; ?>

        <?php endif; ?>-



            <?php if(optionActive('page-title')): ?>
                <?php if(!empty(toption('page-title','bg_color'))): ?>
                    section.hero-wrap{
                    background-color: #<?php echo e(toption('page-title','bg_color')); ?> ;
                }
                <?php endif; ?>

                 <?php if(!empty(toption('page-title','font_color'))): ?>
                    hero-wrap.hero-wrap-2 .slider-text .bread,.hero-wrap.hero-wrap-2 .slider-text .breadcrumbs span a,.hero-wrap.hero-wrap-2 .slider-text .bread{
                    color: #<?php echo e(toption('page-title','font_color')); ?>;
                }
                <?php endif; ?>

        <?php endif; ?>
    </style>

</head>
<body>
<div class="bg-top navbar-light">
    <div class="container">
        <div class="row no-gutters d-flex align-items-center align-items-stretch">
            <div class="col-md-4 col-sm-4 d-flex align-items-center py-4">
                <a class="navbar-brand logo-box" href="<?php echo e(url('/')); ?>">
                    <?php if(!empty(setting('image_logo'))): ?>
                        <img src="<?php echo e(asset(setting('image_logo'))); ?>" >
                    <?php else: ?>
                        <?php echo e(setting('general_site_name')); ?>

                    <?php endif; ?>

                </a>
            </div>
            <div class="col-lg-8 col-sm-8 d-block hide-mobile"  >
                <div class="row d-flex">

                    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4 pt-2 offset-4 mt-3">
                        <?php if(auth()->guard()->guest()): ?>

                        <div class="text">
                           <span class="icon"><a href="<?php echo e(route('login')); ?>"><i class="fas fa-sign-in-alt"></i> <?php echo app('translator')->get('default.login'); ?></a></span>
                        </div>
                        <div class="text">
                            <span class="icon"><a href="<?php echo e(route('register')); ?>"><i class="fas fa-user-plus"></i> <?php echo app('translator')->get('default.register'); ?></a></span>
                        </div>
                        <?php else: ?>
                            <div class="text">
                                <span class="icon"><a href="<?php echo e(route('home')); ?>"><i class="fas fa-user-circle"></i> <?php echo app('translator')->get('default.my-account'); ?></a></span>
                            </div>
                            <div class="text">
                                <span class="icon"><a  href="<?php echo e(route('logout')); ?>"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  ><i class="fa fa-sign-out-alt"></i> <?php echo app('translator')->get('default.logout'); ?></a></span>
                            </div>

                        <?php endif; ?>


                    </div>
                    <?php if(toption('top-bar','order_button')==1): ?>
                    <div class="col-md topper d-flex align-items-center justify-content-end">
                        <p class="mt-4 pt-2">
                            <a href="<?php echo e(route('cart')); ?>" class="btn rounded  py-2 px-3 btn-primary d-flex align-items-center justify-content-center">
                                <span><i class="fa fa-cart-plus"></i> <?php echo e(__lang('your-cart')); ?></span>
                            </a>
                        </p>
                    </div>
                        <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
</div>
<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"  class="int_hide">
    <?php echo csrf_field(); ?>
</form>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center px-4">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> <?php echo e(__lang('menu')); ?>

        </button>
        <form action="<?php echo e(route('courses')); ?>" class="searchform order-lg-last hide-mobile">
            <div class="form-group d-flex">
                <input type="text" class="form-control pl-3" name="filter"  placeholder="<?php echo e(__lang('search-courses')); ?>" >
                <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
            </div>
        </form>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mr-auto">

                <?php $__currentLoopData = headerMenu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item <?php if($menu['children']): ?> dropdown <?php endif; ?>">
                        <a <?php if($menu['new_window']): ?> target="_blank" <?php endif; ?>  class="nav-link <?php if($menu['children']): ?>  dropdown-toggle <?php endif; ?>" <?php if($menu['children']): ?> id="navbarDropdown<?php echo e($key); ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"   <?php endif; ?> href="<?php echo e($menu['url']); ?>" ><?php echo e($menu['label']); ?></a>
                        <?php if($menu['children']): ?>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown<?php echo e($key); ?>">
                                <?php $__currentLoopData = $menu['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a <?php if($childMenu['new_window']): ?> target="_blank" <?php endif; ?>  class="dropdown-item" href="<?php echo e($childMenu['url']); ?>"><?php echo e($childMenu['label']); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(toption('top-bar','cart')==1): ?>
                        <li class="d-md-none d-lg-none d-xl-none"   ><a href="<?php echo e(route('cart')); ?>"><i class="fa fa-cart-plus"></i> <?php echo e(__lang('your-cart')); ?><?php if(getCart()->getTotalItems()>0): ?> (<?php echo e(getCart()->getTotalItems()); ?>) <?php endif; ?></a></li>
                    <?php endif; ?>
                    <?php if(auth()->guard()->guest()): ?>
                        <li  class="d-md-none d-lg-none d-xl-none"  ><a href="<?php echo e(route('login')); ?>"><i class="fa fa-sign-in-alt"></i> <?php echo app('translator')->get('default.login'); ?></a></li>
                        <li  class="d-md-none d-lg-none d-xl-none"  ><a href="<?php echo e(route('register')); ?>"><i class="fa fa-user-plus"></i> <?php echo e(__lang('register')); ?></a></li>
                    <?php else: ?>

                        <li  class="d-md-none d-lg-none d-xl-none"  ><a href="<?php echo e(route('home')); ?>"><i class="fa fa-user-circle"></i> <?php echo app('translator')->get('default.my-account'); ?></a></li>
                        <li  class="d-md-none d-lg-none d-xl-none"  ><a    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="<?php echo e(route('logout')); ?>"><i class="fa fa-sign-out-alt"></i> <?php echo e(__lang('logout')); ?></a></li>

                    <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
<?php if (! empty(trim($__env->yieldContent('inline-title')))): ?>
    <section class="hero-wrap hero-wrap-2"    <?php if(!empty(toption('page-title','image'))): ?>  style="background-image: url('<?php echo e(asset(toption('page-title','image'))); ?>');"  <?php elseif(empty(toption('page-title','bg_color'))): ?> style="background-image: url('<?php echo e(tasset('images/bg_1.jpg')); ?>');"   <?php endif; ?>   >
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread"><?php echo $__env->yieldContent('inline-title'); ?></h1>
                    <?php if (! empty(trim($__env->yieldContent('crumb')))): ?>
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo route('homepage'); ?>"><?php echo app('translator')->get('default.home'); ?> <i class="ion-ios-arrow-forward"></i></a></span>
                        <?php echo $__env->yieldContent('crumb'); ?>
                    </p>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php echo $__env->make('partials.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2"><?php echo e(__lang('contact-us')); ?></h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <?php if(!empty(toption('footer','address'))): ?>
                            <li><span class="icon icon-map-marker"></span><span class="text"><?php echo e(toption('footer','address')); ?></span></li>
                            <?php endif; ?>

                            <?php if(!empty(toption('footer','telephone'))): ?>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?php echo e(toption('footer','telephone')); ?></span></a></li>
                            <?php endif; ?>

                            <?php if(!empty(toption('footer','email'))): ?>
                            <li><a href="mailto:<?php echo e(toption('footer','email')); ?>"><span class="icon icon-envelope"></span><span class="text"><?php echo e(toption('footer','email')); ?></span></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2"><?php echo e(__t('recent-posts')); ?></h2>
                    <?php $__currentLoopData = \App\BlogPost::whereDate('publish_date','<=',\Illuminate\Support\Carbon::now()->toDateTimeString())->where('enabled',1)->orderBy('publish_date','desc')->limit(2)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="block-21 mb-4 d-flex">
                        <?php if(!empty($post->cover_photo)): ?>
                        <a class="blog-img mr-4" style="background-image: url(<?php echo e(asset($post->cover_photo)); ?>);"></a>
                        <?php endif; ?>
                        <div class="text">
                            <h3 class="heading"><a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>"><?php echo e($post->title); ?></a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> <?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('M d, Y')); ?></a></div>
                                <?php if($post->admin): ?>
                                <div><a <?php if($post->admin->public == 1): ?>  href="<?php echo e(route('instructor',['admin'=>$post->admin_id])); ?>" <?php endif; ?> ><span class="icon-person"></span> <?php echo e($post->admin->user->name.' '.$post->admin->user->last_name); ?></a></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>

            <?php $__currentLoopData = footerMenu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5 ml-md-4">
                    <h2 class="ftco-heading-2"><?php echo e($menu['label']); ?></h2>

                    <ul class="list-unstyled">
                        <?php if($menu['children'] && is_array($menu['children'])): ?>
                        <?php $__currentLoopData = $menu['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a  <?php if($childMenu['new_window']): ?> target="_blank" <?php endif; ?>   href="<?php echo e($childMenu['url']); ?>"><span class="ion-ios-arrow-round-forward mr-2"></span><?php echo e($childMenu['label']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>


                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2"><?php echo e(__t('stay-updated')); ?></h2>
                    <?php if(!empty(toption('footer','newsletter-code'))): ?>
                        <?php echo toption('footer','newsletter-code'); ?>

                    <?php else: ?>
                    <form action="#" class="subscribe-form">
                        <div class="form-group">
                            <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="form-control submit px-3">
                        </div>
                    </form>
                    <?php endif; ?>
                </div>
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2 mb-0"><?php echo e(__t('connect-with-us')); ?></h2>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">

                        <?php if(!empty(toption('footer','social_facebook'))): ?>
                            <li class="ftco-animate"><a href="<?php echo e(toption('footer','social_facebook')); ?>"><span class="icon-facebook"></span></a></li>
                        <?php endif; ?>
                        <?php if(!empty(toption('footer','social_twitter'))): ?>
                                <li class="ftco-animate"><a href="<?php echo e(toption('footer','social_twitter')); ?>"><span class="icon-twitter"></span></a></li>
                        <?php endif; ?>
                        <?php if(!empty(toption('footer','social_instagram'))): ?>
                                <li class="ftco-animate"><a href="<?php echo e(toption('footer','social_instagram')); ?>"><span class="icon-instagram"></span></a></li>
                        <?php endif; ?>
                        <?php if(!empty(toption('footer','social_youtube'))): ?>
                                <li class="ftco-animate"><a href="<?php echo e(toption('footer','social_youtube')); ?>"><span class="icon-youtube"></span></a></li>
                        <?php endif; ?>
                        <?php if(!empty(toption('footer','social_linkedin'))): ?>
                                <li class="ftco-animate"><a href="<?php echo e(toption('footer','social_linkedin')); ?>"><span class="icon-linkedin"></span></a></li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><?php echo clean( fullstop(toption('footer','credits')) ); ?></p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="<?php echo e(tasset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(tasset('js/jquery-migrate-3.0.1.min.js')); ?>"></script>
<script src="<?php echo e(tasset('js/popper.min.js')); ?>"></script>
<script src="<?php echo e(tasset('js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(tasset('js/jquery.easing.1.3.js')); ?>"></script>
<script src="<?php echo e(tasset('js/jquery.waypoints.min.js')); ?>"></script>
<script src="<?php echo e(tasset('js/jquery.stellar.min.js')); ?>"></script>
<script src="<?php echo e(tasset('js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(tasset('js/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(tasset('js/aos.js')); ?>"></script>
<script src="<?php echo e(tasset('js/jquery.animateNumber.min.js')); ?>"></script>
<script src="<?php echo e(tasset('js/scrollax.min.js')); ?>"></script>
<script src="<?php echo e(tasset('js/main.js')); ?>"></script>
<?php echo $__env->yieldContent('footer'); ?>
<?php echo setting('general_foot_scripts'); ?>

</body>

</html>
<?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/fox/views/layouts/layout.blade.php ENDPATH**/ ?>