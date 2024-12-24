<?php require "header.php"; ?>
<?php ?>
<section class="advertise-section py-4">
    <div class="container">
        <div class="row my-4">
            <div class="page-title">
                <h1 class="titles_h1">Advertise With Us</h1>
            </div>
        </div>
    </div>
    <div class="container advertise_wrapper templates_bg_border_padding_fff my-1">

        <div class="row mt-3">
            <div class="adv_with_us_wrapper">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="adv_page_title_wrap">
                                <h2 class="adv_page_title">Rev Up Your<br>Business with Us!</h2>
                                <p class="adv_page_titile_desc">As the forefront auto-tech innovator in Saudi Arabia & UAE, we reach a substantial monthly in-market audience.</p>
                                <div class="adv_page_title_button">
                                    <a href="#AdvertiseWithUs" class="common_button">Discover how</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="adv_page_banner_img_holder">
                                <img src="<?php site_url(); ?>/assets/img/adv-page-banner-img.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center pt-3">
                        <div class="col-md-9">
                            <div class="adv_speedometer_img_wrap">
                                <img src="<?php site_url(); ?>/assets/img/adv-page-banner-sub-img.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center adv_brand_logo_carousel">
            <div class="col-md-10">
                <div>
                    <div class="owl-carousel owl-theme adv_owl_carousel">
                        <div class="item adv_single_brand_logo">
                            <img src="<?php site_url(); ?>/assets/img/adv-brand-logo-01.png" alt="">
                        </div>
                        <div class="item adv_single_brand_logo">
                            <img src="<?php site_url(); ?>/assets/img/adv-brand-logo-02.png" alt="">
                        </div>
                        <div class="item adv_single_brand_logo">
                            <img src="<?php site_url(); ?>/assets/img/adv-brand-logo-03.png" alt="">
                        </div>
                        <div class="item adv_single_brand_logo">
                            <img src="<?php site_url(); ?>/assets/img/adv-brand-logo-04.png" alt="">
                        </div>
                        <div class="item adv_single_brand_logo">
                            <img src="<?php site_url(); ?>/assets/img/adv-brand-logo-05.png" alt="">
                        </div>
                        <div class="item adv_single_brand_logo">
                            <img src="<?php site_url(); ?>/assets/img/adv-brand-logo-06.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row advertise_solutions_wrapper">
            <div class="col-md-12">
                <div class="our_adv_solutions mt-3">
                    <h2 class="our_adv_short_contact_title my-2 text-center">Our Advertising Solutions</h2>
                    <p>Get 10x More Attention with Our Intuitive Ad Formats!</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="our_adv_solutions_inner_wrap">
                    <div class="our_adv_sol_text_wrap">
                        <div class="inner_adv_text_wrap">
                            <h6>Impact Ads</h6>
                            <ul>
                                <li>Home page</li>
                                <li>Brand Page</li>
                                <li>Price Page</li>
                            </ul>
                        </div>
                        <div class="inner_adv_text_wrap">
                            <h6>Native Ads</h6>
                            <ul>
                                <li>In news feed</li>
                                <li>Content recommendations</li>
                                <li>Branded content</li>
                            </ul>
                        </div>
                    </div>
                    <div class="our_adv_sol_img_wrap">
                        <img src="../assets/img/adv-solutions-img.png" alt="">
                    </div>
                    <div class="our_adv_sol_text_wrap">
                        <div class="inner_adv_text_wrap">
                            <h6>Display Ads</h6>
                            <ul>
                                <li>Category pages</li>
                                <li>Listing pages</li>
                                <li>Static content pages</li>
                                <li>Programmatic Ads</li>
                            </ul>
                        </div>
                        <div class="inner_adv_text_wrap">
                            <h6>Sponsorship</h6>
                            <ul>
                                <li>Preferred partner programs</li>
                                <li>Emergency pocket guide</li>
                                <li>Automobile industry research report</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row contact_form_section mt-2 mb-5" id="AdvertiseWithUs">
            <div class="col-md-12 my-3">
                <h2 class="form_title">Grow Your Business with Us!</h2>
                <p class="text-center">Let Our Industry Experts Provide the Support You Need!</p>
            </div>
            <div class="col-md-12">
                <form action="<?php site_url(); ?>/form.php" method="POST" class="contact_form" id="contact_adv_form">
                    <div class="form_inner_wrapper">
                        <div class="form_grid">
                            <div class="form_grid_item">
                                <div class="form_items_wrap input_wrap">
                                    <input type="text" placeholder="Enter Name" required name="name">
                                </div>
                            </div>
                            <div class="form_grid_item">
                                <div class="form_items_wrap input_wrap">
                                    <input type="email" placeholder="Enter Email" required name="email">
                                </div>
                            </div>
                            <div class="form_items_wrap input_wrap input_phone_wrap">
                                <span class="country_code">
                                    <select name="country_code" class="country_code_select ">
                                        <option value="+971">+971</option>
                                        <option value="+966">+966</option>
                                    </select>
                                </span>
                                <input type="tel" placeholder="512 345 678" class="phone_number" required="" name="number">
                                <span class="invalid_notify">Invalid number</span>
                            </div>
                            <div class="form_grid_item">
                                <div class="form_items_wrap select_wrap">
                                    <select name="contact-purpose" id="" class="js-example-basic-single">
                                        <option value="">--Select Purpose--</option>
                                        <option value="Car Manufacturer">Car Manufacturer</option>
                                        <option value="Car Dealer">Car Dealer</option>
                                        <option value="Car Distributor OR Franchise">Car Distributor OR Franchise</option>
                                        <option value="Car Parts & Accessories Dealer">Car Parts & Accessories Dealer</option>
                                        <option value="Car Accessories Brand">Car Accessories Brand</option>
                                        <option value="Car Parts Manufacturer">Car Parts Manufacturer</option>
                                        <option value="Ad Agency">Ad Agency</option>
                                        <option value="Online / Offline Product OR Service">Online / Offline Product OR Service</option>
                                        <option value="Online Ad Network">Online Ad Network</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="textarea_wrap">
                            <textarea name="Contact_Msg" rows="5" placeholder="Message" class="form_textarea"></textarea>
                        </div>
                        <div class="form_checkbox">
                            <span class="custom_checkbox_wrap">
                                <input type="checkbox" name="checkbox" id="terms_and_conditions" required>
                                <span class="custom_checkbox"><img src="https://www.nuitsolutions.co.in/yaara/assets/img/tick_icon.svg" alt=""></span>
                            </span>
                            <label for="terms_and_conditions">I agree to <a href="<?php echo site_url(); ?>/terms-conditions">Terms & Conditions</a></label>
                        </div>
                        <input type="text" value="Advertise From" name="Submitted_from" class="d-none">

                        <?php
                        /***
                         * 
                         *  UTM Parameters
                         * 
                         * 
                         */
                        // print_r($_GET);
                        // utm source
                        if (array_key_exists('utm_source', $_GET) && !empty($_GET['utm_source'])) {
                        ?>
                            <input type="hidden" value="<?php echo $_GET['utm_source']; ?>" hidden name="utm_source" class="d-none">
                        <?php
                        }
                        // utm medium
                        if (array_key_exists('utm_medium', $_GET) && !empty($_GET['utm_medium'])) {
                        ?>
                            <input type="hidden" value="<?php echo $_GET['utm_medium']; ?>" hidden name="utm_medium" class="d-none">
                        <?php
                        }
                        // utm campaign
                        if (array_key_exists('utm_campaign', $_GET) && !empty($_GET['utm_campaign'])) {
                        ?>
                            <input type="hidden" value="<?php echo $_GET['utm_campaign']; ?>" hidden name="utm_campaign" class="d-none">
                        <?php
                        }
                        // utm campaign
                        if (array_key_exists('utm_term', $_GET) && !empty($_GET['utm_term'])) {
                        ?>
                            <input type="hidden" value="<?php echo $_GET['utm_term']; ?>" hidden name="utm_term" class="d-none">
                        <?php
                        }

                        ?>



                        <div class="submit_button_wrap">
                            <input type="submit" value="Submit" name="contact_form">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



<?php require "footer.php"; ?>