        <!-- page-title -->
        <section class="page-title centred">
            <div class="bg-layer" style="background-image: url(<?= base_url() ?>public/web/images/background/breadcrumbb.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>Contact Us</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="./">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->


        <!-- feature-style-three -->
        <section class="feature-style-three p_relative centred">
            <div class="pattern-layer" style="background-image: url(<?= base_url() ?>public/web/images/shape/shape-31.png);"></div>
            <div class="auto-container">
                <div class="sec-title mb_100">
                    <span class="sub-title">Contact Info</span>
                    <h2>We’d Love To Help You</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-three wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="block-shape" style="background-image: url(<?= base_url() ?>public/web/images/shape/shape-32.png);"></div>
                                <div class="icon-box"><i class="icon-48"></i></div>
                                <h3>Our Location</h3>
                                <p>Sector 9 plot no 963 Mahaveer Chowk Vasundhara Ghaziabad </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-three wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-49"></i></div>
                                <h3>Email Address</h3>
                                <p><a href="mailto:enquire@adhyayeduventure.com">enquire@adhyayeduventure.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-three wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="block-shape" style="background-image: url(<?= base_url() ?>public/web/images/shape/shape-33.png);"></div>
                                <div class="icon-box"><i class="icon-50"></i></div>
                                <h3>Phone Number</h3>
                                <p><a href="tel:+919266341098">+91 9266341098</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- feature-style-three end -->


        <!-- contact-style-two -->
        <section class="contact-style-two sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 content-column">
                        <div class="content-box mr_70">
                            <div class="sec-title mb_35">
                                <span class="sub-title">Message</span>
                                <h2>Feel Free to Contact with us</h2>
                                <p class="mt_20">If you have any questions or need assistance, we’re here to help! Our team is dedicated to providing you with the best service possible. Whether you're interested in our educational programs, need guidance on admissions, or have inquiries about our coaching services, don’t hesitate to reach out.</p>
                            </div>
                            <ul class="social-links clearfix">
                                <li><a href="#" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank" rel="nofollow"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram" target="_blank" rel="nofollow"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 form-column">
                        <div class="form-inner">
                            <form method="post" action="<?= base_url('contact_submit_data') ?>" id="contact-form" class="default-form"> 
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="name" placeholder="Your Name" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Your email" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="mobile" required="" placeholder="Phone">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="subject" required="" placeholder="Subject">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Type message"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button class="theme-btn theme-btn-one" type="submit" name="submit-form">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-style-two end -->


        <!-- google-map-section -->
        <section class="google-map-section">
            <div class="map-inner p_relative d_block">
                <div 
                    class="google-map" 
                    id="contact-google-map" 
                    data-map-lat="40.712776" 
                    data-map-lng="-74.005974" 
                    data-icon-path="<?= base_url() ?>public/web/images/icons/map-marker.png"  
                    data-map-title="Brooklyn, New York, United Kingdom" 
                    data-map-zoom="12" 
                    data-markers='{
                        "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","<?= base_url() ?>public/web/images/icons/map-marker.png"]
                    }'>

                </div>
            </div>
        </section>
        <!-- google-map-section end -->

