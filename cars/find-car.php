<?php require("header.php"); ?>
<?php
// $home = page_data($conn, end($car_slug));
// echo page_title($conn, end($car_slug))
?>

<section class="findCar-section py-4">
    <div class="container ">
        <div class="row my-4">
            <div class="col-md-3 find_new_car_col_wrap">
                <div class="find_new_car_sidebar_wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" >
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span>Price Range</span>
                                    <div class="accordion_icon_wrap">
                                        <span class="accordion_icon"></span>
                                        <span class="accordion_icon"></span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                   <div class="price_button_wrap">
                                    <button class="price_single_button">Below 5000</button>
                                    <button class="price_single_button">5000 - 7000</button>
                                    <button class="price_single_button">Below 5000</button>
                                    <button class="price_single_button">5000 - 7000</button>
                                    <button class="price_single_button">Below 5000</button>
                                    <button class="price_single_button">5000 - 7000</button>
                                    <button class="price_single_button">Below 5000</button>
                                    <button class="price_single_button">5000 - 7000</button>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" >
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span>Brand</span>
                                    <div class="accordion_icon_wrap">
                                        <span class="accordion_icon"></span>
                                        <span class="accordion_icon"></span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                   <div class="price_button_wrap">
                                    <button class="price_single_button">Toyota</button>
                                    <button class="price_single_button">Ford</button>
                                    <button class="price_single_button">Chevrolet</button>
                                    <button class="price_single_button">BMW</button>
                                    <button class="price_single_button">Mercedes-Benz</button>
                                    <button class="price_single_button">Audi</button>
                                    <button class="price_single_button">Volkswagen</button>
                                    <button class="price_single_button">Nissan</button>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" >
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span>Fuel Type</span>
                                    <div class="accordion_icon_wrap">
                                        <span class="accordion_icon"></span>
                                        <span class="accordion_icon"></span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                   <div class="price_button_wrap">
                                    <button class="price_single_button">Gasoline</button>
                                    <button class="price_single_button">Diesel</button>
                                    <button class="price_single_button">Electric</button>
                                    <button class="price_single_button">Hybrid</button>
                                    <button class="price_single_button">LPG</button>
                                    <button class="price_single_button">Biodiesel</button>
                                    <button class="price_single_button">CNG</button>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" >
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <span>Mileage</span>
                                    <div class="accordion_icon_wrap">
                                        <span class="accordion_icon"></span>
                                        <span class="accordion_icon"></span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                   <div class="price_button_wrap">
                                    <button class="price_single_button">15,000 miles</button>
                                    <button class="price_single_button">22,500 mile</button>
                                    <button class="price_single_button">35,800 miles</button>
                                    <button class="price_single_button">47,200 miles</button>
                                    <button class="price_single_button">60,000 miles</button>
                                    <button class="price_single_button">75,300 miles</button>
                                    <button class="price_single_button">90,000 miles</button>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" >
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <span>Transmission</span>
                                    <div class="accordion_icon_wrap">
                                        <span class="accordion_icon"></span>
                                        <span class="accordion_icon"></span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                   <div class="price_button_wrap">
                                    <button class="price_single_button">Manual </button>
                                    <button class="price_single_button">Automatic</button>
                                    <button class="price_single_button">CVT</button>
                                    <button class="price_single_button">DCT</button>
                                    <button class="price_single_button">Semi-Automatic</button>
                                    <button class="price_single_button">Tiptronic</button>
                                    <button class="price_single_button">Automated Manual</button>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" >
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <span>Seating Capacity</span>
                                    <div class="accordion_icon_wrap">
                                        <span class="accordion_icon"></span>
                                        <span class="accordion_icon"></span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                   <div class="price_button_wrap">
                                    <button class="price_single_button">4-seater </button>
                                    <button class="price_single_button">5-seater</button>
                                    <button class="price_single_button">6-seater</button>
                                    <button class="price_single_button">7-seater</button>
                                    <button class="price_single_button">8-seater</button>
                                    <button class="price_single_button">9-seater</button>
                                   </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="page-title">
                    <h1 class="titles_h1">Find New Cars</h1>
                </div>
                <div class="find_car_grid">
                    <?php for ($i = 0; $i <= 10; $i++) : ?>
                        <div class="find_car_grid_item common_box_shadow">
                            <div class="find_new_single_car_img_holder">
                                <!-- <img src="https://cdn.pixabay.com/photo/2016/02/13/13/11/oldtimer-1197800_960_720.jpg" alt="Brand Name"> -->
                                <img src="../assets/img/new-car-demo-img.png" alt="Brand Name">
                            </div>
                            <div class="find_new_single_car_desc_wrap ">
                                <a href="#" class="find_car_desc_title">Hyundai Creta</a>
                                <div class="find_car_desc_type">Petrol, Diesel | Automatic, Manual</div>
                                <!-- <div class="find_car_desc_type">
                                <p>Petrol, Diesel |</p>
                                <p>Automatic, Manual</p>
                            </div> -->
                                <div class="find_car_desc_price">
                                    <p>OTR Price</p>
                                    <p>SAR 5500</p>
                                </div>
                                <div class="find_new_singe_button_wrap">
                                    <a href="#" class="">Explore</a>
                                    <a href="#">Variants</a>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>

                </div>
            </div>
        </div>
    </div>
</section>


<?php require("footer.php"); ?>