<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body{
            display: none;
        }
    </style>

    <?php $meta = page_title($conn, $car_slug); ?>

    <?php
    $title = null;
    $metaDesc = null;
    if (array_key_exists('page', $_GET) && !empty($_GET['page']) && strpos($_SERVER['SCRIPT_URI'], 'car-news') !== 0) {

        $page = $_GET['page'];

        $title .= "Page $page - ";
        $metaDesc .= "Page $page - ";
    }

    $title .= $meta['title'];
    $metaDesc .= $meta['desc'];
    ?>

    <title><?php echo $title; ?></title>
    <!--<meta name="robots" content="index, follow">-->
    <meta name="robots" content="noindex,nofollow" />



    <meta name="title" content="<?php echo $title; ?>">

    <meta name="description" content="<?php echo $metaDesc; ?>">

    <meta property="og:title" content="<?php echo $title; ?>">

    <meta property="og:description" content="<?php echo $metaDesc; ?>">

    <meta property="og:image" content="<?php if ($image_url) {
                                            echo $image_url;
                                        } else {
                                            echo site_url('') . "/assets/img/yaara-logo.png";
                                        } ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="YaaraCars">

    <meta property="og:url" content="<?php echo site_url() . $_SERVER['REQUEST_URI']; ?>">

    <link rel="canonical" href="<?php  echo site_url().$_SERVER['REQUEST_URI']; ?>" />

    <link rel="icon" type="image/x-icon" href="<?php site_url(); ?>/assets/img/favicon.ico">

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Owl Carosuel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?php site_url(); ?>/assets/css/header.css">

    <link rel="stylesheet" href="<?php site_url(); ?>/assets/css/footer.css">

    <link rel="stylesheet" href="<?php site_url(); ?>/assets/css/car-model.css">

    <link rel="stylesheet" href="<?php site_url(); ?>/assets/css/style.css">

    <link rel="stylesheet" href="<?php site_url(); ?>/assets/css/responsive.css">

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- AOS lib  -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->

    <!-- share this  -->
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6672c5e03e2916001a3a37fc&product=inline-share-buttons&source=platform" async="async"></script>

    <!-- select2  -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    
 <!-- ads css  -->
<link rel="stylesheet" href="https://staging.yaaracars.com/ads-styling.css">


                                       

</head>

<body>

 
    <!-- Header -->
    <header class="yc-header" id="yc-header">

        <!-- Top Header -->
        <div class="container-fuild py-3 bg-white yc-header-top">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-lg-auto col-md-auto col-6 me-auto logo-block">
                        <div class="yc-logo">
                            <a href="<?php site_url(); ?>"><img src="<?php site_url(); ?>/assets/img/yaara-logo.png" alt="Yaara Logo" class="img-fluid"></a>
                        </div>
                    </div>
                    <!-- Logo End -->
                    <div class="col-lg-auto col-md-auto col-5 d-lg-grid d-md-grid d-block align-content-center me-lg-5 me-md-4 me-1 location-col">
                        <div class="location-select">
                            <img src="<?php site_url(); ?>/assets/img/location_on.svg">
                            <div class="location_select_wrap">
                                <select name="location_select" id="select-location" class="js-example-basic-single remove_search_from_select2">
                                    <option value="">Home</option>
                                    <option value="UAE">UAE</option>
                                    <option value="KSA">KSA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto col-md-auto col-auto ms-auto d-grid align-content-center sm_none d-none">
                        <div class="yc-top-items">
                            <ul class="yc-top-items-list">

                                <li class="yc-top-list-items">
                                    <img src="<?php site_url(); ?>/assets/img/breaking_news.svg" alt="" class="img-fuild">
                                    <a href="<?php site_url(); ?>/car-news">News & Resources</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="nav-menu col-lg-auto d-lg-grid d-md-grid d-none align-content-center">
                        <ul class="yc-nav-list">
                            <li class="yc-nav-items">
                                <a href="<?php site_url(); ?>" target="">Home</a>
                            </li>
                            <li class="yc-nav-items">
                                <a href="<?php site_url(); ?>/about" target="">About </a>
                            </li>
                            <li class="yc-nav-items">
                                <a href="<?php site_url(); ?>/car-news" target="">News </a>
                            </li>
                            <li class="yc-nav-items">
                                <a href="<?php site_url(); ?>/advertise-with-us" target="">Advertise With Us </a>
                            </li>
                            <li class="yc-nav-items">
                                <a href="<?php site_url(); ?>/faqs" target="">FAQs </a>
                            </li>
                            <li class="yc-nav-items ">
                                <a href="<?php site_url(); ?>/contact-us" target="">Contact Us </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- Top Header end -->


        <!-- Mobile Menu -->
        <button class="btn d-lg-none d-block mobile-btn col-lg-0 me-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="offcanvas offcanvas-start yc-mobile-canvas" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <button type="button" class="ms-auto btn-close yc-btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body sn-menu d-grid align-content-between">
                <div class="yc-mobile-inner">

                    <ul class="yc-nav-list">
                        <li class="yc-nav-items">
                            <a href="<?php site_url(); ?>" target="">Home</a>
                        </li>
                        <li class="yc-nav-items">
                            <a href="<?php site_url(); ?>/about" target="">About </a>
                        </li>
                        <li class="yc-nav-items">
                            <a href="<?php site_url(); ?>/car-news" target="">News </a>
                        </li>
                        <li class="yc-nav-items">
                            <a href="<?php site_url(); ?>/advertise-with-us" target="">Advertise With Us </a>
                        </li>
                        <li class="yc-nav-items">
                            <a href="<?php site_url(); ?>/faqs" target="">FAQs </a>
                        </li>
                        <li class="yc-nav-items ">
                            <a href="<?php site_url(); ?>/contact-us" target="">Contact Us </a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
        <!-- Mobile Menu End -->




    </header>
    <!-- Header End -->

    <main class="yc-main-wrap" id="yc-main-wrap">