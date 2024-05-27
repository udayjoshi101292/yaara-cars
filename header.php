<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yaara Cars</title>

    <link rel="icon" type="image/x-icon" href="<?php echo $site_url; ?>/assets/img/favicon.svg">

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Owl Carosuel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/header.css">

    <link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/footer.css">

    <link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/car-model.css">

    <link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/style.css">

    <link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/responsive.css">

     <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



</head>
<body>

<!-- Header -->
<header class="yc-header" id="yc-header">
       
        <!-- Top Header -->
        <div class="container-fuild py-3 bg-white yc-header-top">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-lg-auto col-md-auto col-auto me-auto">
                        <div class="yc-logo">
                            <a href="<?php echo $site_url; ?>"><img src="<?php echo $site_url; ?>/assets/img/yaara-logo.png" alt="Yaara Logo" class="img-fluid"></a>
                        </div>
                    </div>
                    <!-- Logo End -->

                    <div class="col-lg-auto col-md-auto col-auto d-lg-grid d-md-grid d-none align-content-center">
                        <div class="yc-top-items-middle">
                            <div class="yc-top-location yc-top-btn">
                                <img src="<?php echo $site_url; ?>/assets/img/location_on.svg" alt="" class="img-fuild">
                                location
                                <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                            </div>
                            <div class="yc-top-search yc-top-btn">
                                <form action="">
                                    <span class="yc-top-search-from">
                                    <input type="search" placeholder="Search by make or model" value="" name="search_car">
                                    <label for="form-submit"><img src="<?php echo $site_url; ?>/assets/img/search.svg" alt="" class="img-fuild"></label>
                                    <input type="submit" value="submit" id="form-submit" hidden>        
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-auto col-md-auto col-auto ms-auto d-grid align-content-center">
                        <div class="yc-top-items">
                            <ul class="yc-top-items-list">
                                
                                <li class="yc-top-list-items">
                                    <img src="<?php echo $site_url; ?>/assets/img/breaking_news.svg" alt="" class="img-fuild">
                                    News & Resources
                                    <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                </li>

                                <li class="yc-top-list-items">
                                    <img src="<?php echo $site_url; ?>/assets/img/account_circle.svg" alt="" class="img-fuild">
                                    Account
                                    <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                </li>

                                <li class="yc-top-list-items">
                                    AR
                                    <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                                </li>

                            </ul>
                        </div>
                    </div>

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
                                <a href="#" target="" >Explore By</a>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >New Cars </a>
                                <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Make & Model </a>
                                <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Price Range </a>
                                <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Body Type </a>
                                <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                            </li>  
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Transmission </a>
                                <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                            </li>   

                       </ul>
                    </div>
                    
                </div>

            </nav>                    
            <!-- Navigation end -->

            <div class="col-lg-auto col-md-auto col-auto d-lg-none d-md-none d-grid align-content-center mobile-form-nav" id="mobile-form-nav">
                <div class="yc-top-items-middle">
                    <div class="yc-top-location yc-top-btn">
                        <img src="<?php echo $site_url; ?>/assets/img/location_on.svg" alt="" class="img-fuild">
                        location
                        <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                    </div>
                    <div class="yc-top-search yc-top-btn">
                        <span class="mobile-form-label"><img src="<?php echo $site_url; ?>/assets/img/search.svg" alt="" class="img-fuild"></span>
                        <form action="">
                            <span class="yc-top-search-from">
                            <input type="search" placeholder="Search by make or model" value="" name="search_car">
                            <label for="form-submit"><img src="<?php echo $site_url; ?>/assets/img/search.svg" alt="" class="img-fuild"></label>
                            <input type="submit" value="submit" id="form-submit" hidden>        
                            </span>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <button class="btn d-lg-none d-block mobile-btn col-lg-0 ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span></span>
                <span></span>
                <span></span>
            </button>

            </div>

            <div class="offcanvas offcanvas-start yc-mobile-canvas" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <button type="button" class="ms-auto btn-close yc-btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body sn-menu d-grid align-content-between">
                   <div class="yc-mobile-inner">

                   <ul class="yc-nav-list">
                            <li class="yc-nav-items">
                                <a href="#" target="" >Explore By</a>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >New Cars </a>
                                <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Make & Model </a>
                                <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Price Range </a>
                                <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                            </li>
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Body Type </a>
                                <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                            </li>  
                            <li class="yc-nav-items yc-nav-has-children">
                                <a href="#" target="" >Transmission </a>
                                <span class="yc-icon"><img src="<?php echo $site_url; ?>/assets/img/down-arrow.svg" alt="" class="img-fuild"></span>
                            </li>   

                       </ul>

                   </div>  

                </div>
            </div>
            <!-- Mobile Menu End -->
                </div>
            </div>
        </div>
        <!-- Bottom Header end -->

</header>
<!-- Header End -->

<main class="yc-main-wrap" id="yc-main-wrap">