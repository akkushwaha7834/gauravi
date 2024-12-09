<?php
$this->load->helper('url');

$current_uri = uri_string();
$segments = explode('/', $current_uri);
$page_name = end($segments);

if ($page_name == '') {
  $page_name = 'index';
}

$seo_data = $this->Seo_model->getseo_data($page_name);
$seo_data_blog = $this->Blog_Model->blog_detail_data_seo($page_name);
$services_data = $this->Service_Model->getservices_data($page_name);

$seo_title = "";
$meta_description = '';
$keywords = '';

if ($seo_data) {
  $row = reset($seo_data);
  $seo_title = $row->seo_title;
  $keywords = $row->seo_keywords;
  $meta_description = $row->seo_desc;
} elseif ($seo_data_blog) {
  function compareStrings($str1, $str2)
  {
    $len1 = mb_strlen($str1);
    $len2 = mb_strlen($str2);

    if ($len1 !== $len2) {
      return false;
    }

    for ($i = 0; $i < $len1; $i++) {
      // Replace specific characters as needed
      $char1 = str_replace([" ", "-"], "", mb_substr($str1, $i, 1));
      $char2 = str_replace([" ", "-"], "", mb_substr($str2, $i, 1));

      if (ord($char1) !== ord($char2)) {
        return false;
      }
    }

    return true;
  }

  function displayAsciiValues($str)
  {
    $len = mb_strlen($str);
    for ($i = 0; $i < $len; $i++) {
      echo mb_substr($str, $i, 1) . ' => ' . ord(mb_substr($str, $i, 1)) . '<br>';
    }
  }

  function cleanString($str)
  {
    // Add additional character replacements as needed
    $str = str_replace(["...", "..."], ["...", "..."], $str);
    // Add more replacements if needed
    return $str;
  }

  // Your original code
  foreach ($seo_data_blog as $row) {
    $slugFromData = strtolower(trim($row->slug));
    $pageName = strtolower(trim($page_name));

    // Detect encoding and convert to UTF-8
    $encodingSlug = mb_detect_encoding($slugFromData);
    $encodingPage = mb_detect_encoding($pageName);

    if ($encodingSlug !== 'UTF-8') {
      $slugFromData = mb_convert_encoding($slugFromData, 'UTF-8', $encodingSlug);
    }

    if ($encodingPage !== 'UTF-8') {
      $pageName = mb_convert_encoding($pageName, 'UTF-8', $encodingPage);
    }
    $cleanedSlug = cleanString($slugFromData);
    $cleanedPageName = cleanString($pageName);

    if (compareStrings($cleanedSlug, $cleanedPageName)) {
      // echo('h');
      $seo_title = $row->blog_name;
      $meta_description = $row->seo_desc;
      $keywords = $row->seo_keywords;
    } else {
      echo ('gg');
    }
  }
} elseif ($seo_course_data) {
  function compareStrings($str1, $str2)
  {
    $len1 = mb_strlen($str1);
    $len2 = mb_strlen($str2);

    if ($len1 !== $len2) {
      return false;
    }

    for ($i = 0; $i < $len1; $i++) {
      // Replace specific characters as needed
      $char1 = str_replace([" ", "-"], "", mb_substr($str1, $i, 1));
      $char2 = str_replace([" ", "-"], "", mb_substr($str2, $i, 1));

      if (ord($char1) !== ord($char2)) {
        return false;
      }
    }

    return true;
  }
  function displayAsciiValues($str)
  {
    $len = mb_strlen($str);
    for ($i = 0; $i < $len; $i++) {
      echo mb_substr($str, $i, 1) . ' => ' . ord(mb_substr($str, $i, 1)) . '<br>';
    }
  }

  function cleanString($str)
  {
    // Add additional character replacements as needed
    $str = str_replace(["...", "..."], ["...", "..."], $str);
    // Add more replacements if needed
    return $str;
  }

  // Your original code
  foreach ($seo_course_data as $row) {
    $slugFromData = strtolower(trim($row->course_name));
    $pageName = strtolower(trim($page_name));

    // Detect encoding and convert to UTF-8
    $encodingSlug = mb_detect_encoding($slugFromData);
    $encodingPage = mb_detect_encoding($pageName);

    if ($encodingSlug !== 'UTF-8') {
      $slugFromData = mb_convert_encoding($slugFromData, 'UTF-8', $encodingSlug);
    }

    if ($encodingPage !== 'UTF-8') {
      $pageName = mb_convert_encoding($pageName, 'UTF-8', $encodingPage);
    }
    $cleanedSlug = cleanString($slugFromData);
    $cleanedPageName = cleanString($pageName);

    if (compareStrings($cleanedSlug, $cleanedPageName)) {
      // echo('h');
      $seo_title = $row->course_name;
      $meta_description = $row->seo_desc;
      $keywords = $row->seo_keywords;
    } else {
      echo ('gg');
    }
  }
}else if($services_data){
  $seo_title = $services_data[0]['seo_title'];
  $meta_description = $services_data[0]['seo_desc'];
  $keywords = $services_data[0]['seo_keywords'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title><?= $seo_title ?></title>
  <meta name="description" content="<?= $meta_description ?>" />
  <meta name="keywords" content="<?= $keywords ?>" />
  <link rel="canonical" href="<?= current_url() ?>">

<!-- Fav Icon -->

<link rel="icon" href="<?= base_url() ?>public/web/images/fav.webp" sizes="32x32">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="<?= base_url() ?>public/web/css/font-awesome-all.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/flaticon.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/fonts/remixicon.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/owl.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/bootstrap.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/animate.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/nice-select.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/color.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elpath.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/style.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/banner.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/feature.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/about.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/page-title.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/service.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/contact.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/chooseus.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/clients.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/cta.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/team.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/feature.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/video.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/error.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/blog.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/service-details.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/chooseus.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/projects.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/testimonial.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/working-process.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/funfact.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/expertise.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/elements-css/news.css" rel="stylesheet">
<link href="<?= base_url() ?>public/web/css/responsive.css" rel="stylesheet">

</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper">

        <!-- main header -->
        <header class="main-header">
            <!-- header-top -->
            <div class="header-top">
                <div class="auto-container">
                    <div class="top-inner">
                        <div class="top-left">
                            <ul class="info clearfix">                               
                                <li><i class="icon-2"></i><a href="tel:919266341098">+91 9266341098</a></li>
                                <li><i class="icon-3"></i><a href="mailto:enquire@adhyayeduventure.com">enquire@adhyayeduventure.com</a></li>
                            </ul>
                        </div>
                        <div class="top-right">
                            <div class="login text-white">Follow Us </div>
                            <ul class="social-links clearfix">
                                <li><a href="" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="" target="_blank" rel="nofollow"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a href=""><i class="fab fa-instagram" target="_blank" rel="nofollow"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-lower -->
            <div class="header-lower">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="<?= base_url() ?>"><img src="<?= base_url() ?>public/web/images/adhyaven.png" alt=""></a></figure>
                        </div>
                        <div class="menu-area clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
        <ul class="navigation clearfix">
            <li class="<?= $current_uri === '' ? 'current' : '' ?>"><a href="<?= base_url() ?>">Home</a></li> 
            <li class="<?= $current_uri === 'about' ? 'current' : '' ?>"><a href="<?= base_url() ?>about">About Us</a></li>  
            <?php 
            // Determine if any service dropdown item is active
            $is_service_active = false;
            foreach ($service_view as $row) {
                if ($current_uri === 'services/' . str_replace(' ', '-', strtolower($row->slug))) {
                    $is_service_active = true;
                    break;
                }
            }
            ?>
            <li class="dropdown <?= $is_service_active || $current_uri === 'services' ? 'current' : '' ?>">
                <a href="<?= base_url() ?>services">Products</a>
                <div class="megamenu">
                    <div class="">
                        <ul class="mega-menu-ul">        
                            <?php foreach ($service_view as $row): ?>
                                <li>
                                    <a href="<?= base_url('services/') . str_replace(' ', '-', strtolower($row->slug)); ?>" class="<?= $current_uri === 'services/' . str_replace(' ', '-', strtolower($row->slug)) ? 'current' : '' ?>">
                                        <?= $row->service_name ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>                                     
                </div>
            </li>    
            <li class="<?= $current_uri === 'blog' ? 'current' : '' ?>"><a href="<?= base_url() ?>blog">Blog</a></li>                                
            <li class="<?= $current_uri === 'contact' ? 'current' : '' ?>"><a href="<?= base_url() ?>contact">Contact Us</a></li> 
        </ul>
    </div>
</nav>

                        </div>
                        <ul class="menu-right-content d-lg-block d-none">
                      
                            <li class="btn-box">
                                <a href="<?= base_url() ?>consultation">Free Consulting</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="<?= base_url() ?>"><img src="<?= base_url() ?>public/web/images/adhyaven.png" alt=""></a></figure>
                        </div>
                        <div class="menu-area clearfix">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <ul class="menu-right-content d-lg-block d-none">
                            <li class="btn-box">
                                <a href="<?= base_url() ?>consultation">Free Consulting</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="<?= base_url() ?>"><img src="<?= base_url() ?>public/web/images/adhyaven.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>

            </nav>
        </div><!-- End Mobile Menu -->
