<?php require "header.php"; ?>

<section class="about-section py-4">
    <div class="container">
        <div class="row my-4">
            <div class="page-title">
                <h1 class="titles_h1">Contact Us</h1>
            </div>
        </div>
    </div>
    <div class="container templates_bg_border_padding_fff my-1">

        <div class="row my-3">
            <div class="contact_banner_wrap banner-img">
                <!-- <div class="col-md-6 about-banner-text_wrap"> -->
                <!-- <h1 class="h1">Born to drive!</h1> -->
                <!-- <p class="mb-5">Every engine roars with the promise of a journey, and for every road, there's a YaaraCars.</p> -->
                <!-- </div> -->
            </div>
        </div>
        <div class="row my-3">
            <div class="short_contact_us mt-3">
                <h5 class="short_contact_title my-2">At YaaraCars, we're energized by the opportunity to assist you!</h5>
                <p class="mt-2">Our dedicated team is always ready to support, guide, and address your needs. Count on us to be there, answering your questions and providing assistance throughout the week!</p>
            </div>
        </div>
        <div class="row contact_form_section mt-2 mb-5">
            <div class="col-md-12 my-3">
                <h5 class="form_title">Get in Touch!</h5>
            </div>
            <div class="col-md-12">
                <form action="<?php site_url();?>/form.php" class="contact_form" method="POST" id="contact_adv_form">
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
                                <span class="country_code">+971</span>
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
                        <input type="text" value="Contact From" name="Submitted_from" class="d-none">
                        <div class="submit_button_wrap">
                            <input type="submit" value="Submit" name="contact_form" class="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



<?php require "footer.php"; ?>