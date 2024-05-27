<?php include 'header.php'; ?>
    
<section class="yc-hero-section" id="yc-hero">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="yc-filter-form common_box_shadow col-lg-4 col-md-4 col-12 p-4">
                    <h1 class="titles_h1 pb-3">
                        Find your right car
                    </h1>
                    <form class="yc-form-main d-grid" action="">
                        <div class="radio_button_holder">
                            <div class="radio_wrap">
                                <span class="radio_input_warp">
                                    <input  type="radio" id="budget" name="input_radio" value="budget">
                                    <span class="custom_cheackmark"></span>
                                </span>
                                <label  class="input_radio_label" for="budget">By Budget</label>
                            </div>
                            <div class="radio_wrap">
                                <span class="radio_input_warp">
                                    <input class="input_radio_label" type="radio" id="model" name="input_radio" value="Model">
                                    <span class="custom_cheackmark"></span>
                                </span>
                                <label  class="input_radio_label" for="model">By Model</label>
                            </div>

                        </div>
                        <span class="form-budget form-option">
                            <select name="media" id="media_list" class="selectbox" placeholder="Select Budget">
                            <option value=""disabled selected hidden>Select Budget</option>
                            <option value="budget_1">Upto SAR 50000</option>
                            <option value="budget_2">SAR 50001 - 100000</option>
                            <option value="budget_3">SAR 100001 - 150000</option>
                            <option value="budget_4">SAR 150001 & Above</option>
                          </select>
                        </span> 

                        <span class="form-location form-option">
                          <select name="media" id="media_list" class="selectbox" placeholder="Select City">
                            <option value=""disabled selected hidden>Select City</option>
                            <option value="region_1">KSA</option>
                            <option value="REGION_2">UAE</option>
                          </select>
                    </span>
                      
                    
                      
                        
                        <input type="submit" value="Search">
                      </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Popular Cars -->
<section class="yc-cars py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                    Popular Cars
                </h2>
                <div class="owl-carousel owl-theme cars-carousel">
                    
                       <!-- Jaguar F-Pace -->
                       <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/jaguar-f-pace-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            Jaguar F-Pace
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>

                     <!-- Mercedes GLE 350 -->
                     <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/mercedes-GLE-350-mock.png" alt="" class="img-fluid">
                        </div>
                        
                        <div class="yc-cars-details">
                        <p>
                            Mercedes GLE 350
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>

                     <!-- Volkswagen Golf -->
                     <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/volkswagen-golf-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            Volkswagen
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>                        
                    </div>
                     <!-- Range Rover Evoque -->
                     <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/range-rover-evoque-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            Land Rover
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>
                    <!-- Hyundai Creta -->
                    <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/creta-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            Hyundai Creta
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>

                    <!-- BMW X3 -->
                    <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/bmw-x3-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            BMW X3
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>

                 

                   

                </div>
            </div>
        </div>
    </div>
</section>


<!-- Latest Cars -->
<section class="yc-cars pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2 ">
                    Latest Cars
                </h2>
                <div class="owl-carousel owl-theme cars-carousel">
                    <!-- Hyundai Creta -->
                    <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/creta-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            Hyundai Creta
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>

                    <!-- BMW X3 -->
                    <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/bmw-x3-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            BMW X3
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>

                    <!-- Jaguar F-Pace -->
                    <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/jaguar-f-pace-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            Jaguar F-Pace
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>

                     <!-- Mercedes GLE 350 -->
                     <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/mercedes-GLE-350-mock.png" alt="" class="img-fluid">
                        </div>
                        
                        <div class="yc-cars-details">
                        <p>
                            Mercedes GLE 350
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>

                     <!-- Volkswagen Golf -->
                     <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/volkswagen-golf-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            Volkswagen
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>                        
                    </div>

                    <!-- Range Rover Evoque -->
                    <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/range-rover-evoque-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            Land Rover
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Upcoming Cars -->
<section class="yc-cars pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                    Upcoming Cars
                </h2>
                <div class="owl-carousel owl-theme cars-carousel">
                       <!-- Range Rover Evoque -->
                       <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/range-rover-evoque-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            Land Rover
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>
                     <!-- Volkswagen Golf -->
                     <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/volkswagen-golf-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            Volkswagen
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>                        
                    </div>
                          <!-- Mercedes GLE 350 -->
                    <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/mercedes-GLE-350-mock.png" alt="" class="img-fluid">
                        </div>
                        
                        <div class="yc-cars-details">
                        <p>
                            Mercedes GLE 350
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>
                    <!-- Hyundai Creta -->
                    <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/creta-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            Hyundai Creta
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>

                    <!-- BMW X3 -->
                    <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/bmw-x3-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            BMW X3
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>

                    <!-- Jaguar F-Pace -->
                    <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                            <img src="<?php echo $site_url;?>/assets/img/mocks/jaguar-f-pace-mock.png" alt="" class="img-fluid">
                        </div>
                        <div class="yc-cars-details">
                        <p>
                            Jaguar F-Pace
                        </p>
                        <h4>
                            30-40k Dollar
                        </h4>
                        <a href="#" class="check_offers_button">
                            Check Offers
                        </a>
                        </div>
                    </div>

               

                    

                 

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Brands -->
<section class="yc-cars pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                    Popular Brands
                </h2>
                <div class="owl-carousel owl-theme logos-carousel">
                    <!-- Suzuki -->
                    <div class="item car-item common_box_shadow">
                        <div class="logos">
                            <img src="<?php echo $site_url;?>/assets/img/logo/suzuki-logo.png" alt="" class="img-fluid">
                        </div>
                        <p>
                            Suzuki
                        </p>
                    </div>

                    <!-- KIA-->
                    <div class="item car-item common_box_shadow">
                        <div class="logos">
                            <img src="<?php echo $site_url;?>/assets/img/logo/kia-logo.png" alt="" class="img-fluid">
                        </div>
                        <p>
                            Kia
                        </p>
                    </div>

                    <!-- Toyota -->
                    <div class="item car-item common_box_shadow">
                        <div class="logos">
                            <img src="<?php echo $site_url;?>/assets/img/logo/toyota-logo.png" alt="" class="img-fluid">
                        </div>
                        <p>
                            Toyota
                        </p>
                    </div>

                     <!-- Hyundai -->
                     <div class="item car-item common_box_shadow">
                        <div class="logos">
                            <img src="<?php echo $site_url;?>/assets/img/logo/hyundai-logo.png" alt="" class="img-fluid">
                        </div>
                        <p>
                            Hyundai
                        </p>
                    </div>

                     <!-- Honda -->
                     <div class="item car-item common_box_shadow">
                        <div class="logos">
                            <img src="<?php echo $site_url;?>/assets/img/logo/honda-logo.png" alt="" class="img-fluid">
                        </div>
                        <p>
                            Honda
                        </p>
                    </div>

                    <!-- MG -->
                    <div class="item car-item common_box_shadow">
                        <div class="logos">
                            <img src="<?php echo $site_url;?>/assets/img/logo/mg-logo.png" alt="" class="img-fluid">
                        </div>
                        <p>
                            MG
                        </p>
                    </div>

                    <!-- Jeep -->
                    <div class="item car-item common_box_shadow">
                        <div class="logos">
                            <img src="<?php echo $site_url;?>/assets/img/logo/jeep-logo.png" alt="" class="img-fluid">
                        </div>
                        <p>
                           Jeep
                        </p>
                    </div>

                    <!-- renault -->
                    <div class="item car-item common_box_shadow">
                        <div class="logos">
                            <img src="<?php echo $site_url;?>/assets/img/logo/renault-logo.png" alt="" class="img-fluid">
                        </div>
                        <p>
                           Renault
                        </p>
                    </div>

                    <!-- Nissan -->
                    <div class="item car-item common_box_shadow">
                        <div class="logos">
                            <img src="<?php echo $site_url;?>/assets/img/logo/nissan-logo.png" alt="" class="img-fluid">
                        </div>
                        <p>
                           Nissan
                        </p>
                    </div>

                    <!-- Land Rover -->
                    <div class="item car-item common_box_shadow">
                        <div class="logos">
                            <img src="<?php echo $site_url;?>/assets/img/logo/land-rover-logo.png" alt="" class="img-fluid">
                        </div>
                        <p>
                           Land Rover
                        </p>
                    </div>

                    <!-- Jaguar -->
                    <div class="item car-item common_box_shadow">
                        <div class="logos">
                            <img src="<?php echo $site_url;?>/assets/img/logo/jaguar-logo.png" alt="" class="img-fluid">
                        </div>
                        <p>
                           Jaguar
                        </p>
                    </div>

                    <!-- Ford -->
                    <div class="item car-item common_box_shadow">
                        <div class="logos">
                            <img src="<?php echo $site_url;?>/assets/img/logo/ford-logo.png" alt="" class="img-fluid">
                        </div>
                        <p>
                           Ford
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest blogs news section  -->
<section class="yc-blogs pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2 title_view_more_wrap">
                    <span>Latest Buzz</span>
                    <!-- <a href="#">View All</a> -->
                </h2>
                <?php include "components/blogs-inner.php" ?>
            </div>
        </div>
    </div>
</section>
<!-- Latest blogs news section end -->

<?php include 'footer.php'; ?>