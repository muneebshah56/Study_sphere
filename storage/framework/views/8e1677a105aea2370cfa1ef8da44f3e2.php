<?php $__env->startSection('page-title',$blogPost->title); ?>
<?php $__env->startSection('inline-title',$blogPost->title); ?>
<?php $__env->startSection('crumb'); ?>
    <li><a href="<?php echo route('blog'); ?>"><?php echo app('translator')->get('default.blog'); ?></a></li>
    <li><?php echo app('translator')->get('default.blog-post'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Start Blog Singel Area -->
    <section class="section blog-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="single-inner">
                        <?php if(!empty($blogPost->cover_photo)): ?>
                        <div class="post-thumbnils">
                            <img src="<?php echo e(resizeImage($blogPost->cover_photo,1920,1020)); ?>" alt="#">
                        </div>
                        <?php endif; ?>
                        <div class="post-details">
                            <div class="detail-inner">
                                <!-- post meta -->
                                <ul class="custom-flex post-meta">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-calendar"></i>
                                            <?php echo e(\Illuminate\Support\Carbon::parse($blogPost->publish_date)->format('M d,Y')); ?>

                                        </a>
                                    </li>

                                </ul>
                                <h2 class="post-title">
                                    <a href="javascript:void(0)"><?php echo e($blogPost->title); ?></a>
                                </h2>
                                <p><?php echo $blogPost->content; ?></p>
                            </div>
                            <!-- Comments -->
                            <div class="post-comments">
                                <?php if(!empty(setting('general_disqus'))): ?>

                                    <div id="disqus_thread"></div>
                                    <script>
                                        /**
                                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                                        /*
                                        var disqus_config = function () {
                                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                        };
                                        */
                                        (function() { // DON'T EDIT BELOW THIS LINE
                                            var d = document, s = d.createElement('script');
                                            s.src = 'https://<?php echo e(trim(setting('general_disqus'))); ?>.disqus.com/embed.js';
                                            s.setAttribute('data-timestamp', +new Date());
                                            (d.head || d.body).appendChild(s);
                                        })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>



                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 col-md-12 col-12">
                    <div class="sidebar">
                        <!-- Single Widget -->
                        <div class="widget search-widget">
                            <h5 class="widget-title"><?php echo app('translator')->get('default.search'); ?></h5>
                            <form method="get" action="<?php echo e(route('blog')); ?>">
                                <input type="text" name="q" placeholder="<?php echo app('translator')->get('default.search'); ?>...">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                        <!--/ End Single Widget -->

                        <!-- Single Widget -->
                        <div class="widget categories-widget">
                            <h5 class="widget-title"><?php echo app('translator')->get('default.categories'); ?></h5>
                            <ul class="custom">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('blog')); ?>?category=<?php echo e($category->id); ?>"><?php echo e($category->name); ?> <span><?php echo e($category->blogPosts()->count()); ?></span></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="widget popular-feeds">
                            <h5 class="widget-title"><?php echo e(__t('recent-posts')); ?></h5>
                            <div class="popular-feed-loop">
                                <?php $__currentLoopData = \App\BlogPost::whereDate('publish_date','<=',\Illuminate\Support\Carbon::now()->toDateTimeString())->where('enabled',1)->orderBy('publish_date','desc')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="single-popular-feed"  <?php if(empty($post->cover_photo)): ?> style="padding-left: 0px" <?php endif; ?> >
                                        <?php if(!empty($post->cover_photo)): ?>
                                            <div class="feed-img">
                                                <a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>"><img src="<?php echo e(resizeImage($post->cover_photo,300,300)); ?>"
                                                                                                                                              alt="#"></a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="feed-desc">
                                            <h6 class="post-title"><a  href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>"><?php echo e($post->title); ?></a>
                                            </h6>
                                            <span class="time"><i class="lni lni-calendar"></i><?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('d M, Y')); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <!--/ End Single Widget -->


                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->




    <?php if(false): ?>
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <?php if(!empty($blogPost->cover_photo)): ?>
                        <div class="feature-img">
                            <img class="img-fluid" src="<?php echo e(asset($blogPost->cover_photo)); ?>" alt="">
                        </div>
                        <?php endif; ?>
                        <div class="blog_details">
                            <h2><?php echo e($blogPost->title); ?>

                            </h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <?php if($blogPost->admin->user()->exists()): ?>
                                <li><a href="#"><i class="fa fa-user"></i><?php echo e($blogPost->admin->user->name); ?></a></li>
                                <?php endif; ?>
                             </ul>
                            <p><?php echo $blogPost->content; ?></p>
                        </div>
                    </div>

                    <?php if(!empty(setting('general_disqus_shortcode'))): ?>
                        <div class="comments-area">


                            <div id="disqus_thread"></div>
                            <script>
                                /**
                                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                                /*
                                var disqus_config = function () {
                                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                */
                                (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');
                                    s.src = 'https://<?php echo e(trim(setting('general_disqus_shortcode'))); ?>.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form method="get" action="<?php echo e(route('blog')); ?>">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input  name="q"  type="text" class="form-control" placeholder='<?php echo app('translator')->get('default.search'); ?>'
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = '<?php echo app('translator')->get('default.search'); ?>'">
                                        <div class="input-group-append">
                                            <button class="btns" type="submit"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit"><?php echo app('translator')->get('default.search'); ?></button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title"><?php echo app('translator')->get('default.category'); ?></h4>
                            <ul class="list cat-list">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="#" class="d-flex">
                                            <p><?php echo e($category->name); ?></p>
                                            <p>&nbsp;(<?php echo e($category->blogPosts()->count()); ?>)</p>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title"><?php echo e(__t('recent-posts')); ?></h3>
                            <?php $__currentLoopData = \App\BlogPost::whereDate('publish_date','<=',\Illuminate\Support\Carbon::now()->toDateTimeString())->where('enabled',1)->orderBy('publish_date','desc')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="media post_item">
                                    <?php if(!empty($post->cover_photo)): ?>
                                        <img class="recent-blog-img" src="<?php echo e(asset($post->cover_photo)); ?>" alt="">
                                    <?php endif; ?>
                                    <div class="media-body">
                                        <a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>">
                                            <h3><?php echo e($post->title); ?></h3>
                                        </a>
                                        <p><?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('F d, Y')); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->
    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make(TLAYOUT, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/edugrids/views/site/blog/post.blade.php ENDPATH**/ ?>