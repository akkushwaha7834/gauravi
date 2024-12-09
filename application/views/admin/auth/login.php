<link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/bootstrap/bootstrap.min.css">
<!-- Swiper slider -->
<link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/animate/animate.min.css">
<link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/fancybox/fancybox.min.css">
<link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/magnific-popup/magnific-popup.css">
<!-- Icons -->
<link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/fonts/remixicon.css">
<!-- Custom Style File -->
<link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/style.css">
<link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/bootstrap/bootstrap.min.css">
<!-- Swiper slider -->
<link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/animate/animate.min.css">
<link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/fancybox/fancybox.min.css">
<link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/magnific-popup/magnific-popup.css">
<!-- Icons -->
<link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/fonts/remixicon.css">
<!-- Custom Style File -->
<link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/style.css">
<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<meta name="google-site-verification" content="qCxkgbc-f9Wk3pZioAIBa4R5h_4My3lxwn-0Ab9eRbQ" />
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PV2NE8KT9W"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-PV2NE8KT9W');
</script>
<script>
    !function (f, b, e, v, n, t, s) {
        if (f.fbq) return; n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
        n.queue = []; t = b.createElement(e); t.async = !0;
        t.src = v; s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '702662558732371');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=702662558732371&ev=PageView&noscript=1" /></noscript>
</head>

<body>
    <!-- Header Start  -->
    <div class="bg-dark">
        <div class="container-fluid bg-dark">
            <div class="top-menu-bar py-1 d-flex align-item-center justify-content-between ">
                <div>
                    <ul>
                        <li class=""><a href="tel:918929144243"><span><i class="ri-phone-line"></i></span>
                                <span>+91-8929144243</span></a></li>
                        <li class=""><a href="mailto:info@fxcareers.com"><span><i class="ri-mail-line"></i></span>
                                <span>info@fxcareers.com</span></a></li>
                    </ul>
                </div>
                <div class="login-menu">
                    <ul>
                        <?php if ($this->session->userdata('role') == '') { ?>
                            <li>
                                <a href="<?= base_url() ?>admin" class="link d-flex align-items-center">Login <i
                                        class=" ps-1 ri-arrow-right-line"></i></a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>signup" class="link d-flex align-items-center">Sign Up <i
                                        class="ps-1 ri-arrow-right-line"></i></a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="<?= base_url() ?>admin/dashboard" class="link d-flex align-items-center">Dashboard
                                    <i class="ps-1 ri-arrow-right-line"></i></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <header class="header sticky-top">
        <nav class="navbar navbar-expand-lg p-0">
            <div class="container-fluid">
                <a class="navbar-brand p-0" href="<?= base_url() ?>"><img
                        src="<?= base_url() ?>public/web/assets/images/logo-dark.png" alt="Logo" width="100%"></a>
                <button class="mobile-menu-toggle" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <span class="toggler-icon ri-menu-2-line"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item menu-item-has-children">
                            <a class="nav-link" href="#">About Us</a>
                            <ul class="sub-menu">
                                <li><a href="<?= base_url() ?>about">About Us</a></li>
                                <li><a href="<?= base_url() ?>gallery">Gallery</a></li>
                                <li><a href="<?= base_url() ?>careers">Careers</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>franchise">Franchise</a>
                        </li>
                        <li class="nav-item menu-item-has-children">
                            <a class="nav-link" href="#">Courses</a>
                            <ul class="sub-menu">
                                <li><a href="<?= base_url() ?>offline-courses">Offline Courses</a></li>
                                <li><a href="<?= base_url() ?>online-courses">Online Courses</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Recorded Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>e-books">E-Books</a>
                        </li>
                        <li class="nav-item menu-item-has-children">
                            <a class="nav-link" href="#">Analysis</a>
                            <ul class="sub-menu">
                                <li><a href="<?= base_url() ?>market-primer">Market Primer</a></li>
                                <li><a href="<?= base_url() ?>currency-report">Currency Report</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>contact">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="offcanvas offcanvas-end mobile-menu" tabindex="-1" id="offcanvasRight"
            aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header justify-content-end">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0">
                <div class="mobile-menu-wrap">
                    <ul class="mobile-menu-list">
                        <li><a href="<?= base_url() ?>" class="menu-link">Home</a></li>
                        <li>
                            <a role="button" class="menu-link moblie-dropdwon">About Us <i
                                    class="ri-arrow-down-s-line"></i></a>
                            <div class="dropdown-mb-menu">
                                <ul>
                                    <li><a href="<?= base_url() ?>about">Company</a></li>
                                    <li><a href="<?= base_url() ?>gallery">Gallery</a></li>
                                    <li><a href="<?= base_url() ?>team">Our Team</li>
                                    <li><a href="<?= base_url() ?>testimonial">Testimonials</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="<?= base_url() ?>franchise" class="menu-link">franchise</a></li>
                        <li><a role="button" class="menu-link moblie-dropdwon">Programs <i
                                    class="ri-arrow-down-s-line"></i></a>
                            <div class="dropdown-mb-menu">
                                <ul>
                                    <li><a href="<?= base_url() ?>offline-program">Offline Programs</a></li>
                                    <li><a href="<?= base_url() ?>online-program">Online Programs</a></li>
                                    <li><a href="<?= base_url() ?>recorded-videos">Recorded Courses</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="<?= base_url() ?>ebook" class="menu-link">E-books</a></li>
                        <li><a href="<?= base_url() ?>analysis" class="menu-link">Analysis</a></li>
                        <li><a href="<?= base_url() ?>blog" class="menu-link">Blog</a></li>
                        <li><a href="<?= base_url() ?>contact" class="menu-link">Contact</a></li>
                    </ul>
                    <div class="login-btn">
                        <a href="<?= base_url() ?>admin" class="theme-btn">Login <i class="ri-arrow-right-line"></i></a>
                        <a href="<?= base_url() ?>signup" class="theme-btn">Signup <i
                                class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="section-space ">
        <div class="container">
            <div class="theme-bg-light p-5 rounded">
                <div class="row g-4">
                    <div class="col-lg-6 text-center align-self-center ">
                        <img src="<?= base_url() ?>public/web/assets/images/login.png" alt=""
                            class="img-fluid w-75 topdown">
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <h3 class='text-primary sub-head'>Login</h3>
                        <h2 class='wow fadeInUp' data-wow-delay='0.1s'>Welcome Back</h2>
                        <p>Don’t have an account yet? <a href="<?= base_url() ?>signup">Register here</a></p>
                        <?php echo form_open(base_url('admin/auth/login')); ?>
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <?php if (isset($msg) || validation_errors() !== ''): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= validation_errors(); ?>
                                        <?= isset($msg) ? $msg : ''; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="formgroup">
                                    <label for="">Email</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Email address" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="formgroup">
                                    <label for="">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="formgroup">
                                    <img src="<?php echo $captcha['image']; ?>" class="capt mb-2" alt="CAPTCHA Image">
                                    <input type="text" name="captcha" class="form-control" id="captcha"
                                        placeholder="CAPTCHA" required>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="formgroup">
                                    <button
                                        class="display-5 theme-btn theme-btn-two border-0 d-block w-100 rounded py-3 login"
                                        type="submit" value="Submit" name="submit" id="submit">Login<i
                                            class="ps-2 ri-arrow-right-line"></i></button>
                                </div>
                                <a href="" class="d-block mt-4">Forget Your Password?</a>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('frontend/include/footer') ?>