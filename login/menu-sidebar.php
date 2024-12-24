<?php
// $siteUrl = $_SERVER['SERVER_NAME'];
// echo "<pre style='max-width: 1200px; margin-inline: auto;'>";
// echo $siteUrl;
// echo "</pre>";
?>

<?php 
// $img_url = "https://www.yaaracars.com";
$img_url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/login";
// echo "<pre style='max-width: 1200px; margin-inline: auto;'>";
// echo $img_url;
// echo "</pre>";
?>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- fixed-top-->

    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="#"><img class="brand-logo" alt="Yaara admin logo" src="<?php echo $img_url ?>/app-assets/images/logo/favicon.svg">
                            <h3 class="brand-text">Yaara Admin</h3>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"> </i></a></li>
                        <!-- <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li> -->
                        <!-- <li><a data-action="expand"><i class="ft-maximize"></i></a></li> -->
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Search">
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <!-- <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span>English</span><span class="selected-language"></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a></div>
                    </li> -->
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="<?php echo $img_url ?>/app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span><span class="user-name"><?php echo $completeName;?></span></a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="email-application.html"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="user-cards.html"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="chat-application.html"><i class="ft-message-square"></i> Chats</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo $admin_url?>logout.php"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item "><a href="<?php echo $admin_url; ?>"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="<?php echo $admin_url ?>pages.php"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.dash.main">Pages</span></a>
                    <!-- <ul class="menu-content">
                        <li><a class="menu-item" href="https://www.yaaracars.com/login/inner-pages/home-page.php" data-i18n="nav.dash.project">Home Page</a>
                        </li>
                        <li><a class="menu-item" href="https://www.yaaracars.com/login/inner-pages/coolray.php" data-i18n="nav.dash.analytics">Coolray</a>
                        </li>
                        <li><a class="menu-item" href="https://www.yaaracars.com/login/inner-pages/car-brand.php" data-i18n="nav.dash.crm">Car Brand</a>
                        </li>
                        <li><a class="menu-item" href="https://www.yaaracars.com/login/inner-pages/about-us.php" data-i18n="nav.dash.crm">About Us</a>
                        </li>
                    </ul> -->
                </li>
                <li class=" nav-item">
                    <a href="#"><i class="icon-layers"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">All Cars</span>
                        <span class="badge badge badge-info badge-pill float-right mr-2"></span>
                    </a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="<?php echo $admin_url ?>cars/brand.php">Brands</a></li>
                        <li><a class="menu-item" href="<?php echo $admin_url ?>cars/modal.php">Models</a></li>
                        <li><a class="menu-item" href="<?php echo $admin_url ?>cars/variants.php">Variants</a></li>
                        <li><a class="menu-item" href="<?php echo $admin_url ?>cars/features.php">Features</a></li>
                        <li><a class="menu-item" href="<?php echo $admin_url ?>cars/measurement.php">Measurements</a></li>
                        <li><a class="menu-item" href="<?php echo $admin_url ?>cars/safety.php">Safety</a></li>
                        <li><a class="menu-item" href="<?php echo $admin_url ?>cars/exterior.php">Exterior</a></li>
                        <li><a class="menu-item" href="<?php echo $admin_url ?>cars/interior.php">Interior</a></li>
                        <!-- <li><a class="menu-item" href="<?php echo $admin_url ?>cars/import-testing.php">Import Testing</a></li> -->
                    </ul>
                </li>
                <li class=" nav-item ">
                    <a href="<?php echo $admin_url ?>/edit-post.php"><i class="icon-layers"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">Posts</span>
                    </a>
                </li>
                <!-- <li class=" nav-item ">
                    <a href="<?php echo $admin_url ?>/templates/leads.php">
                        <i class="icon-layers"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">Leads</span>
                    </a>
                </li>
                <li class=" nav-item ">
                    <a href="<?php echo $admin_url ?>/templates/leads-contact-us.php">
                        <i class="icon-layers"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">Contact Us</span>
                    </a>
                </li>
                <li class=" nav-item ">
                    <a href="<?php echo $admin_url ?>/templates/leads-ad-with-us.php">
                        <i class="icon-layers"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">Advertise With Us</span>
                    </a>
                </li>
                <li class=" nav-item ">
                    <a href="<?php echo $admin_url ?>/templates/im-interested.php">
                        <i class="icon-layers"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">I'm Interested Form</span>
                    </a>
                </li> -->
             
                <li class=" nav-item has-sub">
                    <a href="javascript:;" >
                        <i class="icon-layers"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">Leads</span>
                        <span class="badge badge badge-info badge-pill float-right mr-2"></span>
                    </a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="<?php echo $admin_url ?>/templates/leads-contact-us.php" data-i18n="nav.dash.project">Contact Us</a>
                        </li>
                        <li><a class="menu-item" href="<?php echo $admin_url ?>/templates/leads-ad-with-us.php" data-i18n="nav.dash.analytics">Advertise With Us</a>
                        </li>
                        <li><a class="menu-item" href="<?php echo $admin_url ?>/templates/im-interested.php" data-i18n="nav.dash.crm">I'm Interested Form</a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item d-none">
                    <a href="<?php echo $admin_url ?>/templates/faq.php"><i class="icon-layers"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">FAQ</span>
                    </a>
                </li>
                <!-- <li class=" nav-item ">
                    <a href="https://www.nuitsolutions.co.in/yaara/login/templates/leads.php" ><i class="icon-layers"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">Media</span>
                    </a>
                </li> -->

            </ul>
        </div>
    </div>



    <!-- opening tags for "app-content" "content-wrapper" start -->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="container-fluid">