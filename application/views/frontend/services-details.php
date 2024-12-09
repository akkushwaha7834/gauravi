<?php
foreach ($service_detail_data as $row) {
    $title = urlencode($row->service_name);
    $url = urlencode(base_url('blog/') . str_replace(' ', '-', strtolower($row->slug)));
    ?>
                    <?php }?>

        <!-- page-title -->
        <section class="page-title centred">
            <div class="bg-layer" style="background-image: url(<?= base_url() ?>public/web/images/background/breadcrumbb.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1><?= $row->service_name ?></h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="./">Home</a></li>
                        <li>Service Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->


        <!-- service-details -->
        <section class="service-details p_relative">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="service-sidebar mr_40">
                            <div class="sidebar-widget category-widget">
                                <h3>All Services</h3>
                                <ul class="category-list clearfix">
                                    <?php
                                foreach ($service_view as $row): ?>
                                    <li><a href="<?= base_url('services/') ?><?= str_replace(' ', '-', strtolower($row->slug)); ?>" class="current"><?= $row->service_name ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="sidebar-widget contact-widget centred">
                                <div class="widget-content">
                                    <div class="bg-layer" style="background-image: url(<?= base_url() ?>public/web/images/cta.jpg);"></div>
                                    <h3>Do You Need <br />Any <span>Help?</span></h3>
                                    <div class="icon-box"><i class="icon-29"></i></div>
                                    <div class="inner-box">
                                        <p><a href="mailto:enquire@adhyayeduventure.com">enquire@adhyayeduventure.com</a></p>
                                        <h3><a href="tel:+919266341098">+91 9266341098</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
foreach ($service_detail_data as $row) {
    $title = urlencode($row->service_name);
    $url = urlencode(base_url('blog/') . str_replace(' ', '-', strtolower($row->slug)));
    ?>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="service-details-content">
                            <div class="content-one mb_90">
                                <figure class="image-box"><img src="<?= base_url('./images/') . $row->service_image; ?>" alt=""></figure>
                                <div class="text">
                                    <h2><?= $row->service_name?></h2>
                                    <p><?= $row->long_desc?></p>
                                    
                                </div>
                            </div>
                          
                           
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </section>
        <!-- service-details end -->
