
        <!-- page-title -->
        <section class="page-title centred">
            <div class="bg-layer" style="background-image: url(<?= base_url() ?>public/web/images/background/breadcrumbb.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>Blog </h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li>Blog </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->


        <!-- news-style-two -->
        <section class="news-style-two blog-grid pt_150 pb_150">
            <div class="auto-container">
                <div class="row clearfix">
                <?php foreach ($blog_view as $row): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-two wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><a href="<?= base_url('blog/') ?><?= str_replace(' ', '-', strtolower($row->slug)); ?>"><img src="<?= base_url('./images/') . $row->blog_image; ?>" alt=""></a></figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <span class="post-date"><?= $row->blog_date ?></span>
                                        <h3><a href="<?= base_url('blog/') ?><?= str_replace(' ', '-', strtolower($row->slug)); ?>" class="line-clamp2"><?= $row->blog_name ?></a></h3>
                                        <ul class="post-info clearfix"> 
                                            <li><i class="icon-21"></i><a href="<?= base_url('blog/') ?><?= str_replace(' ', '-', strtolower($row->slug)); ?>"><?= $row->blog_author ?></a></li>
                                            
                                        </ul>
                                        <p class="line-clamp2">Amet minim mollit no duis sit enim aliqua dolor do amet officia.</p>
                                        <div class="btn-box">
                                            <a href="<?= base_url('blog/') ?><?= str_replace(' ', '-', strtolower($row->slug)); ?>" class="theme-btn-one">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <?php endforeach; ?>
                
            </div>
        </section>
        <!-- news-style-two end -->
