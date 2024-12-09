

<!-- page-title -->
<section class="page-title centred">
    <div class="bg-layer" style="background-image: url(<?= base_url() ?>public/web/images/background/breadcrumb.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Our Services </h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Our Services </li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->


<!-- service-style-two -->
<section class="service-section p_relative centred bg-color-1 sec-pad">
    <div class="pattern-layer" style="background-image: url(<?= base_url() ?>public/web/images/shape/shape-12.png);"></div>
    <div class="auto-container">
 <div class="row justify-content-center">
    <div class="col-lg-10 text-center mb_70">
    <div class="sec-title ">
            <span class="sub-title">Our Services</span>
            <h2>What Service We Offer</h2>
 
        </div>
        <p>Adhyay Eduventure Pvt. Ltd. provides a comprehensive range of services tailored for educational success, including school management, career counseling, teacher recruitment, digital marketing, and study abroad support, empowering students and institutions alike.</p>
    </div>
 </div>
 <div class="row clearfix g-4">
                   
                    <?php 
                    
                    foreach ($service_view as $row): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-two wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="<?= base_url('./images/') . $row->service_image; ?>" alt=""></figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <div class="icon-box"><i class="icon-12"></i></div>
                                        <h3><a href="<?= base_url('services/') ?><?= str_replace(' ', '-', strtolower($row->slug)); ?>"><?= $row->service_name ?></a></h3>
                                        <p class="line-clamp2"><?= implode(' ', array_slice(explode(' ', strip_tags($row->long_desc)), 0, 15)) ?>...</p>
                                        <div class="btn-box">
                                            <a href="<?= base_url('services/') ?><?= str_replace(' ', '-', strtolower($row->slug)); ?>" class="theme-btn-one">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
    </div>
</section>
<!-- service-style-two end -->

