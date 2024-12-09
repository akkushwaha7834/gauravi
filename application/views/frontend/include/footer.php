<!-- main-footer -->
<footer class="main-footer">
    <div class="widget-section">
        <div class="pattern-layer">
            <div class="pattern-1"
                style="background-image: url(<?= base_url() ?>public/web/images/shape/shape-20.png);"></div>
            <div class="pattern-2"
                style="background-image: url(<?= base_url() ?>public/web/images/shape/shape-21.png);"></div>
        </div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="logo-widget footer-widget">
                        <figure class="footer-logo"><a href="./"><img src="<?= base_url() ?>public/web/images/adhyay-white.png" alt=""></a></figure>
                        <div class="text">
                            <p>Adhyay Eduventure Pvt. Ltd. is a pioneering EdTech company dedicated to revolutionizing the educational landscape.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="links-widget footer-widget ml_50">
                        <div class="widget-title">
                            <h3>Quick Link</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="about">About Us</a></li>
                                <li><a href="services">Services</a></li>
                                <li><a href="blog">Blog</a></li>
                                <li><a href="contact">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="links-widget footer-widget ml_30">
                        <div class="widget-title">
                            <h3>Useful Links</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="contact-widget footer-widget">
                        <div class="widget-title">
                            <h3>Contact</h3>
                        </div>
                        <div class="widget-content">

                            <ul class="info-list clearfix">
                                <li><i class="icon-23"></i>Sector 9 plot no 963 Mahaveer Chowk Vasundhara Ghaziabad</li>
                                <li><i class="icon-3"></i><a href="enquire@adhyayeduventure.com">enquire@adhyayeduventure.com</a></li>
                                <li><i class="icon-2"></i><a href="tel:+919266341098">+91 9266341098

                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom centred">
        <div class="auto-container">
            <div class="copyright">
                <p>Copyright 2023 by <a href="./">Adhyay Eduventure</a> | Designed & Developed By <a href="https://www.amitkushwaha.in/" target="_blank"><span style="color: #F36823;"><strong>Amit Kushwaha</strong></span></a></p>
            </div>
        </div>
    </div>
</footer>
<!-- main-footer end -->



<!--Scroll to top-->
<div class="scroll-to-top">
    <div>
        <div class="scroll-top-inner">
            <div class="scroll-bar">
                <div class="bar-inner"></div>
            </div>
            <div class="scroll-bar-text">Go To Top</div>
        </div>
    </div>
</div>
<!-- Scroll to top end -->

</div>


<!-- jequery plugins -->
<script src="<?= base_url() ?>public/web/js/jquery.js"></script>
<script src="<?= base_url() ?>public/web/js/popper.min.js"></script>
<script src="<?= base_url() ?>public/web/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>public/web/js/owl.js"></script>
<script src="<?= base_url() ?>public/web/js/wow.js"></script>
<script src="<?= base_url() ?>public/web/js/validation.js"></script>
<script src="<?= base_url() ?>public/web/js/jquery.fancybox.js"></script>
<script src="<?= base_url() ?>public/web/js/appear.js"></script>
<script src="<?= base_url() ?>public/web/js/scrollbar.js"></script>
<script src="<?= base_url() ?>public/web/js/isotope.js"></script>
<script src="<?= base_url() ?>public/web/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url() ?>public/web/js/parallax-scroll.js"></script>

<!-- main-js -->
<script src="<?= base_url() ?>public/web/js/script.js"></script>
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+919266341098 ", // WhatsApp number
            call_to_action: "Message us", // Call to action
            button_color: "#FF6550", // Color of button
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = 'https:',
            host = "getbutton.io",
            url = proto + '//static.' + host;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () {
            WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })();
</script>

</body><!-- End of .page_wrapper -->

</html>