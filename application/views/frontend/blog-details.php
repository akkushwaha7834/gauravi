<?php
foreach ($blog_detail_data as $row) {
    $title = urlencode($row->blog_name);
    $url = urlencode(base_url('blog/') . str_replace(' ', '-', strtolower($row->slug)));
    ?>


        <!-- page-title -->
        <section class="page-title centred">
            <div class="bg-layer" style="background-image: url(<?= base_url() ?>public/web/images/background/breadcrumbb.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <!-- <h1>Blog Details</h1> -->
                    <h1 class="blg_tl"><?= $row->blog_name ?></h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li>Blog Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->
        

        <!-- sidebar-page-container -->
        <section class="sidebar-page-container pt_150 pb_150">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-details-content">
                            <div class="news-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="<?php echo base_url('images/') . $row->blog_image; ?>" alt="<?= $row->blog_name ?>" alt=""></figure>
                                        <h2><?=date("d M", strtotime($row->blog_date));?></h2>
                                    </div>
                                    <div class="lower-content">
                                        <ul class="post-info clearfix"> 
                                            <li><i class="icon-21"></i><a href="<?= base_url() ?>blog-details"><?= $row->blog_author ?></a></li>
                                            
                                        </ul>
                                        <h2><?=$row->blog_name?></h2>
                                        <p><?= $row->long_desc ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                           
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar ml_40">

                            <div class="sidebar-widget post-widget">
                                <div class="widget-title">
                                    <h3>Recent Article</h3>
                                </div>
                                <div class="post-inner">
                                    <div class="post">
                                        <figure class="post-thumb"><a href="<?= base_url() ?>blog-details"><img src="<?= base_url() ?>public/web/images/news/post-1.jpg" alt=""></a></figure>
                                        <h5><a href="<?= base_url() ?>blog-details">How to Manage Online Business’s</a></h5>
                                        <span class="post-date">Apr 17, 2022</span>
                                    </div>
                                    <div class="post">
                                        <figure class="post-thumb"><a href="<?= base_url() ?>blog-details"><img src="<?= base_url() ?>public/web/images/news/post-2.jpg" alt=""></a></figure>
                                        <h5><a href="<?= base_url() ?>blog-details">Your Business is Ready For Integration</a></h5>
                                        <span class="post-date">Apr 16, 2022</span>
                                    </div>
                                    <div class="post">
                                        <figure class="post-thumb"><a href="<?= base_url() ?>blog-details"><img src="<?= base_url() ?>public/web/images/news/post-3.jpg" alt=""></a></figure>
                                        <h5><a href="<?= base_url() ?>blog-details">Ensure that Copies of Documents</a></h5>
                                        <span class="post-date">Apr 15, 2022</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- sidebar-page-container end -->


     