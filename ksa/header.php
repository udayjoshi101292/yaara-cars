<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php //echo page_title($conn, $car_slug)  ?> <?php echo $meta_title ;?> </title>
    <!-- <meta name="robots" content="index, follow"> -->
    <meta name="robots" content="noindex, nofollow">
    <meta name="title" content="<?php echo $meta_title ;?>">
    <meta name="description" content="<?php echo $meta_desc ;?>">
    <meta property="og:title" content="<?php echo $meta_title ;?>">
    <meta property="og:description" content="<?php echo $meta_desc ;?>">
    <meta property="og:image" content="<?php if($image_url){echo $image_url;} else { echo site_url('')."/assets/img/yaara-logo.png";} ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="YaaraCars">
    <meta property="og:url" content="<?php  echo site_url().$_SERVER['REQUEST_URI']; ?>">
    
    
    <?php if($_404 != true): ?>
    <link rel="canonical" href="<?php  echo site_url().$_SERVER['REQUEST_URI']; ?>" />
    <?php endif; ?>

    <style>
        body{
            display: none;
        }
    </style>
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16713074057">
    </script>
    <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());
     gtag('config', 'AW-16713074057');
    </script>

    <!-- Google Tag Manager -->

    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

    })(window,document,'script','dataLayer','GTM-M5CQQR3J');</script>

    <!-- End Google Tag Manager -->

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

</head>
<body>

<!-- Google Tag Manager (noscript) -->

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M5CQQR3J"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->

<!-- Header -->
<header class="yc-header" id="yc-header">
       
        <!-- Top Header -->
        <div class="container-fuild py-3 bg-white yc-header-top">
            <div class="container">
                <div class="row row-rev-mobile">

                    <!-- Logo -->
                    <div class="col-lg-auto col-md-auto col-5 me-auto align-content-center logo-col">
                        <div class="yc-logo">
                            <a href="<?php site_url(); ?>"><img src="<?php site_url(); ?>/assets/img/yaara-logo.png" alt="Yaara Logo" class="img-fluid"></a>
                        </div>
                    </div>
                    <!-- Logo End -->

                    <div class="col-lg-auto col-md-auto col-4 d-lg-grid d-md-grid d-block align-content-center me-lg-5 me-md-4 me-1 location-col">
                        <div class="location-select">
                            <img src="<?php site_url();?>/assets/img/location_on.svg">
                            <div class="location_select_wrap">
                            <select name="location_select" id="select-location" class="js-example-basic-single remove_search_from_select2">
                                <!-- <option value="Location" disabled selected>Location</option> -->
                                <option value="KSA">KSA</option>
                                <option value="UAE">UAE</option>
                            </select>
                            </div>
                        </div>
                    </div>  

                    <div class="col-lg-auto col-md-auto col-auto d-lg-grid d-md-grid d-none align-content-center">
                        <div class="global-search global-desktop">
                            <div class="form-search-box d-block text-center">
                                <div class="form-car-search">
                                    <?php include 'components/search.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-auto col-md-auto col-auto ms-auto d-lg-grid d-md-grid d-none align-content-center">
                        <div class="yc-top-items">
                            <ul class="yc-top-items-list">
                                
                                <li class="yc-top-list-items">
                                    <img src="<?php site_url(); ?>/assets/img/breaking_news.svg" alt="" class="img-fuild">
                                    <a href="<?php echo site_main(); ?>/knowledge-hub">News & Resources</a>
                                    <!-- <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span> -->
                                </li>

                                <!-- <li class="yc-top-list-items">
                                    <img src="<?php //site_url(); ?>/assets/img/account_circle.svg" alt="" class="img-fuild">
                                    Account
                                    <span class="yc-icon"><img src="<?php //site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                </li> -->

                                <!-- <li class="yc-top-list-items">
                                    AR
                                    <span class="yc-icon"><img src="<?php //site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                </li> -->

                            </ul>
                        </div>
                    </div>

                     <!-- Mobile Menu -->
                    <button class="btn d-lg-none d-block mobile-btn col-3 col-lg-0 ms-auto menu-hamburger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
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
                                <a href="javascript:void(0)" style="pointer-events:none;">Explore By</a>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >New Cars </a>
                                <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                <ul class="yc-sub-menu">
	                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/find-new-cars">Explore New Cars</a></li>
                                    
                                    <li id="sub-menu-item" class="sub-menu-item">
                                            <a href="javascript:void(0)" target="">Popular Prices</a>
                                            <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                            <ul class="yc-sub-menu sub-level-2">
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/toyota/prices">Toyota Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hyundai/prices">Hyundai Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/bentley/prices">Bentley Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/ford/prices">Ford Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/kia/prices">Kia Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/mercedes-benz/prices">Mercedes-Benz Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/chevrolet/prices">Chevrolet Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/nissan/prices">Nissan Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/mitsubishi/prices">Mitsubishi Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/bmw/prices">BMW Prices</a></li>
                                            </ul>
                                    </li>

                                    <li id="sub-menu-item" class="sub-menu-item">
                                
                                        <a href="#" target="" >Popular Brands </a>
                                        <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                        <ul class="yc-sub-menu sub-level-2">
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/toyota">Toyota</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hyundai">Hyundai</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/bentley">Bentley</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/ford">Ford</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/kia">Kia</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/mitsubishi">Mercedes-Benz</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/chevrolet">Chevrolet</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/nissan">Nissan</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/mitsubishi">Mitsubishi</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/bmw">BMW</a></li>
                                        </ul>

                                    </li>
                                    <li id="sub-menu-item" class="sub-menu-item">
                                            <a href="javascript:void(0)" target="" >Popular Cars </a>
                                            <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                            <ul class="yc-sub-menu sub-level-2">
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/kia/sportage">Kia Sportage 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/ford/bronco">Ford Bronco 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hyundai/sonata">New Hyundai Sonata 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/gmc/yukon">New GMC Yukon 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/mg/zs">New MG ZS 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hyundai/elantra">New Hyundai Elantra 2024</a></li>
                                            </ul>
                                    </li>
                                    <li id="sub-menu-item" class="sub-menu-item">

                                            <a href="javascript:void(0)" target="" >Popular Electric Cars</a>
                                            <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                            <ul class="yc-sub-menu sub-level-2">
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/peugeot/208">Peugeot 208 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/peugeot/2008">Peugeot 2008 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/mg/zs-ev">MG ZS EV 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hyundai/ioniq-5">Hyundai Ioniq 5 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hongqi/e-hs9">Hongqi E-HS9 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/porsche/taycan">Porsche Taycan 2024</a></li>
                                            </ul>

                                    </li>
                                    <!-- <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/car-prices">Car Prices</a></li> -->
                                </ul>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="javascript:void(0)" target="" >Make & Model </a>
                                <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                <ul class="yc-sub-menu">

                                    <?php $carMenu = ['Toyota','Hyundai','Bentley','Ford','Kia','Mercedes-Benz','Chevrolet','Nissan','Mitsubishi','BMW']; ?>

                                    <?php foreach($carMenu as $menu): ?>
	                                <li id="sub-menu-item" class="sub-menu-item">
                                        <a href="<?php site_url()."/".url_slug($menu); ?>"><?php echo $menu; ?></a>
                                        <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                        <ul class="yc-sub-menu sub-level-2">
                                            
                                            <?php $car_m = car_list($conn, [$menu],'Brand', ['Brand','Modal'],6); ?>

                                            <?php foreach($car_m as $itm): ?>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php echo site_url()."/".$itm['Brand_Slug']."/".$itm['Modal_Slug']; ?>"><?php echo $itm['Brand']." ".$itm['Modal']; ?></a></li>
                                            <?php endforeach; ?>

                                        </ul>
                                    </li>
                                    <?php endforeach; ?>
                                    <!-- <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/find-new-cars">All Brands</a></li> -->
                                </ul>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Price Range </a>
                                <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                <ul class="yc-sub-menu">
	                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/50000">Upto <?php echo $car_list[0]['Currency'];?> 50000</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/50001-100000"><?php echo $car_list[0]['Currency'];?> 50001 - 100000</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/100001-150000"><?php echo $car_list[0]['Currency'];?> 100001 - 150000</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/150001"><?php echo $car_list[0]['Currency'];?> 150001 & Above</a></li>
                                </ul>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Body Type </a>
                                <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                <ul class="yc-sub-menu">
	                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/compact-suv-cars">Compact SUV</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/convertible-cars">Convertible</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/coupe-cars">Coupe</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/crossover-cars">Crossover</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/crossover-suv-cars">Crossover SUV</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hatchback-cars">Hatchback</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/minivan-cars">Minivan</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/mpv-cars">MPV</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/pick-up-truck-cars">Pick-up Truck</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/roadster-cars">Roadster</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/sedan-cars">Sedan</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/sportback-cars">Sportback</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/station-wagon-cars">Station Wagon</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/suv-cars">SUV</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/van-cars">Van</a></li>
                                </ul>
                            </li>  
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Transmission </a>
                                <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                <ul class="yc-sub-menu">
	                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/automatic-cars">Automatic</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/manual-cars">Manual</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/cvt-cars">CVT</a></li>
                                </ul>
                            </li>   

                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Fuel Type </a>
                                <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                <ul class="yc-sub-menu">
	                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/diesel-cars">Diesel</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/electric-cars">Electric</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hybrid-cars">Hybrid</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/petrol-cars">Petrol</a></li>
                                </ul>
                            </li>   

                       </ul>

                   </div>  

                </div>
            </div>
            <!-- Mobile Menu End -->


                </div>
            </div>
        </div>
        <!-- Top Header end -->

         <!-- Bottom Header -->
         <div class="container-fuild bg-red py-2 yc-header-bottom">
            <div class="container">
                <div class="row">
                <nav class="align-items-center">
                
                <div class="row">
                <!-- Menu -->
                    
                    <div class="nav-menu d-none col-lg-auto d-lg-grid align-content-center">
                    <ul class="yc-nav-list">
                            <li class="yc-nav-items">
                                <a href="javascript:void(0)" style="pointer-events:none;">Explore By</a>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >New Cars </a>
                                <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                <ul class="yc-sub-menu">
	                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/find-new-cars">Explore New Cars</a></li>
                                    
                                    <li id="sub-menu-item" class="sub-menu-item">
                                            <a href="javascript:void(0)" target="">Popular Prices</a>
                                            <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                            <ul class="yc-sub-menu sub-level-2">
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/toyota/prices">Toyota Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hyundai/prices">Hyundai Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/bentley/prices">Bentley Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/ford/prices">Ford Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/kia/prices">Kia Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/mercedes-benz/prices">Mercedes-Benz Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/chevrolet/prices">Chevrolet Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/nissan/prices">Nissan Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/mitsubishi/prices">Mitsubishi Prices</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/bmw/prices">BMW Prices</a></li>
                                            </ul>
                                    </li>
                                    
                                    <li id="sub-menu-item" class="sub-menu-item">
                                
                                        <a href="#" target="" >Popular Brands </a>
                                        <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                        <ul class="yc-sub-menu sub-level-2">
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/toyota">Toyota</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hyundai">Hyundai</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/bentley">Bentley</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/ford">Ford</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/kia">Kia</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/mitsubishi">Mercedes-Benz</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/chevrolet">Chevrolet</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/nissan">Nissan</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/mitsubishi">Mitsubishi</a></li>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/bmw">BMW</a></li>
                                        </ul>

                                    </li>
                                    <li id="sub-menu-item" class="sub-menu-item">
                                            <a href="javascript:void(0)" target="" >Popular Cars </a>
                                            <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                            <ul class="yc-sub-menu sub-level-2">
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/kia/sportage">Kia Sportage 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/ford/bronco">Ford Bronco 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hyundai/sonata">New Hyundai Sonata 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/gmc/yukon">New GMC Yukon 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/mg/zs">New MG ZS 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hyundai/elantra">New Hyundai Elantra 2024</a></li>
                                            </ul>
                                    </li>
                                    <li id="sub-menu-item" class="sub-menu-item">

                                            <a href="javascript:void(0)" target="" >Popular Electric Cars</a>
                                            <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                            <ul class="yc-sub-menu sub-level-2">
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/peugeot/208">Peugeot 208 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/peugeot/2008">Peugeot 2008 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/mg/zs-ev">MG ZS EV 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hyundai/ioniq-5">Hyundai Ioniq 5 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hongqi/e-hs9">Hongqi E-HS9 2024</a></li>
                                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/porsche/taycan">Porsche Taycan 2024</a></li>
                                            </ul>

                                    </li>
                                    <!-- <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/car-prices">Car Prices</a></li> -->
                                </ul>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="javascript:void(0)" target="" >Make & Model </a>
                                <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                <ul class="yc-sub-menu">

                                    <?php $carMenu = ['Toyota','Hyundai','Bentley','Ford','Kia','Mercedes-Benz','Chevrolet','Nissan','Mitsubishi','BMW']; ?>

                                    <?php foreach($carMenu as $menu): ?>
	                                <li id="sub-menu-item" class="sub-menu-item">
                                        <a href="<?php echo site_url()."/".url_slug($menu); ?>"><?php echo $menu; ?></a>
                                        <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                        <ul class="yc-sub-menu sub-level-2">
                                            
                                            <?php $car_m = car_list($conn, [$menu],'Brand', ['Brand','Modal'],6); ?>

                                            <?php foreach($car_m as $itm): ?>
                                            <li id="sub-menu-item" class="sub-menu-item"><a href="<?php echo site_url()."/".$itm['Brand_Slug']."/".$itm['Modal_Slug']; ?>"><?php echo $itm['Brand']." ".$itm['Modal']; ?></a></li>
                                            <?php endforeach; ?>

                                        </ul>
                                    </li>
                                    <?php endforeach; ?>
                                    <!-- <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/find-new-cars">All Brands</a></li> -->
                                </ul>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Price Range </a>
                                <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                <ul class="yc-sub-menu">
	                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/50000">Upto <?php echo $car_list[0]['Currency'];?> 50000</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/50001-100000"><?php echo $car_list[0]['Currency'];?> 50001 - 100000</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/100001-150000"><?php echo $car_list[0]['Currency'];?> 100001 - 150000</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/150001"><?php echo $car_list[0]['Currency'];?> 150001 & Above</a></li>
                                </ul>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Body Type </a>
                                <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                <ul class="yc-sub-menu yc_menu_grid">
	                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/compact-suv-cars">Compact SUV</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/convertible-cars">Convertible</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/coupe-cars">Coupe</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/crossover-cars">Crossover</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/crossover-suv-cars">Crossover SUV</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hatchback-cars">Hatchback</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/minivan-cars">Minivan</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/mpv-cars">MPV</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/pick-up-truck-cars">Pick-up Truck</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/roadster-cars">Roadster</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/sedan-cars">Sedan</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/sportback-cars">Sportback</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/station-wagon-cars">Station Wagon</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/suv-cars">SUV</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/van-cars">Van</a></li>
                                </ul>
                            </li>  
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Transmission </a>
                                <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                <ul class="yc-sub-menu">
	                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/automatic-cars">Automatic</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/manual-cars">Manual</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/cvt-cars">CVT</a></li>
                                </ul>
                            </li>   

                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Fuel Type </a>
                                <span class="yc-icon"><img src="<?php site_url(); ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                <ul class="yc-sub-menu">
	                                <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/diesel-cars">Diesel</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/electric-cars">Electric</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/hybrid-cars">Hybrid</a></li>
                                    <li id="sub-menu-item" class="sub-menu-item"><a href="<?php site_url(); ?>/petrol-cars">Petrol</a></li>
                                </ul>
                            </li>   

                       </ul>
                    </div>
                    
                </div>

            </nav>                    
            <!-- Navigation end -->
            </div>

            
                </div>
            </div>
        </div>
        <!-- Bottom Header end -->




</header>
<!-- Header End -->

<main class="yc-main-wrap" id="yc-main-wrap">