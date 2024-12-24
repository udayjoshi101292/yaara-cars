<?php require("header.php"); ?>
<?php

if(strcasecmp($location, 'UAE') === 0){
    $currency = "AED";
}
if(strcasecmp($location, 'KSA') === 0){
    $currency = "SAR";
}




$sqlForCarFilter = carFilterConstantSql($location, ' GROUP by yc_master.Brand_Slug ORDER BY yc_master.Brand ASC ');
// echo "<pre>";
// print_r($sqlForCarFilter);
// echo "</pre>";

// exit();
$brandDetailsObj = execMyQuery($conn, $sqlForCarFilter);


$brandDetails = array();
// $mileageStrings = null;
if ($brandDetailsObj !== false && $brandDetailsObj->num_rows > 0) {
    while ($row = $brandDetailsObj->fetch_assoc()) {
        array_push($brandDetails, $row);
        // $mileage = ltrim(preg_replace('/ /','__',$row['Mileage']),',');

        // if(!empty($mileage) && !is_null($mileage)  && trim($mileage) !== ''){
        //     $mileageStrings .= $mileage .",";
        // }



    }
}
// echo "<pre>";
// $MilegaeValues = array_unique(explode(',',trim($mileageStrings,',')));
// arsort($MilegaeValues);
// print_r($MilegaeValues);
// echo "</pre>";
// var_dump($sqlForCarFilter);
// var_dump($brandDetails);

// $home = page_data($conn, end($car_slug));
// echo page_title($conn, end($car_slug))
?>

<style>
    .find_car_grid_item {
        height: fit-content;
    }

    .loader {
        position: absolute;
        background-color: rgba(250, 250, 250, 0.93);
        top: 0px;
        height: 100%;
        width: 100%;
        border-radius: 15px;
        border: 1px solid rgb(204, 204, 204);
    }

    .selected {
        border: 1px solid var(--theme-color-accent) !important;
    }

    .find_new_car_sidebar_wrap .accordion-button {
        position: relative;
    }

    span.selected-text {
        opacity: 0;
        position: absolute;
    }

    .selected--parent span.selected-text {
        font-size: 10px;
        opacity: 1;
        position: absolute;
        bottom: 0;

    }

    .spinner__cars.load-more {
        width: 100%;
        /* position: absolute;
    bottom: -40px; */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .find_new_single_car_img_holder img {
        border-radius: 15px 15px 0 0;
    }

    .find_new_singe_button_wrap {
        /* align-items: center; */
    }

    .find_car_grid {
        margin-top: 40px;
    }

    .find_new_car_sidebar_wrap {
        margin-top: 0;
    }

    /* width */
    .body-brands::-webkit-scrollbar {
        width: 4px;

    }

    /* Track */
    .body-brands::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    .body-brands::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background: var(--theme-color-accent);
    }

    /* Handle on hover */
    .body-brands::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .price_button_wrap {
        margin-right: 5px;
    }

    .find_new_car_sidebar_wrap .accordion-button {
        padding: 11px 0;
    }

    .find_new_car_sidebar_wrap #accordionExample {
        row-gap: 5px;
    }

    .f-13 {
        font-size: 13px;
    }

    .reset {
        display: block;
        text-align: end;
        color: var(--theme-color-accent);
        order: 1;

    }

    .find_car_grid .reset {
        text-align: start;
    }

    .price_single_button.fake-button {
        display: block;
        text-align: center;
        cursor: pointer;
    }

    .find_new_car_col_wrap {
        display: flex;
        flex-direction: column;
    }

    .find_new_car_sidebar_wrap {
        order: 2;
    }

    .sticky-reset {

        position: sticky;
        top: 130px;
    }

    @media only screen and (min-width:1024px) {

        #filter__left{
            position: sticky;
            top: 150px;
        }
        .body-brands {
            max-height: 23vh;
            overflow-y: scroll;
        }
    }

    @media only screen and (max-width:991px) {
        .sticky-reset {

            position: relative;
            top: unset;
        }

        #find-filters #filter__left {
            display: none;

        }
        #find-filters .offcanvas-body #filter__left {
            display: block;

        }
        #breadcrumbs{
            padding-top: 4rem;
        }
    }

    @media only screen and (max-width:661px) {
        #filterOffCanvas {
            width: 80%;
            /* z-index: 999; */
            margin-top: 13%;
        }

        #filterOffCanvas .offcanvas-backdrop {
            z-index: 9;
        }

        .find_new_car_sidebar_wrap {

            margin-top: 0;
            position: relative;
            top: 0;
        }

        .page-title {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
        }

        .hide--mobile>#filters {
            display: none;
        }

        .find_new_single_car_desc_wrap {
            padding-bottom: 5px;
        }

        .find_car_desc_type,
        .find_car_desc_price p {
            text-align: start;
        }

        .body-brands {
            max-height: 25vh;
            overflow-y: scroll;
        }
    }

    @media only screen and (max-width:420px) {
        #filterOffCanvas {
            margin-top: 18%;
        }
    }
</style>
<section class="findCar-section py-4">
    <div class="container ">
        <div class="row my-4">
            <div class="col-md-3 find_new_car_col_wrap hide--mobile" id="find-filters">
                <div class="" id="filter__left">

                    <a class="f-13 reset sticky-reset" id="reset" href="#" data-remove="false">Reset</a>
                    <div class="find_new_car_sidebar_wrap" id="filters">

                        <div class="accordion parent--wrap" id="accordionExample">
                            <div class="accordion-item" data-parent="parent">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" data-search="price">
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
                                            <button class="price_single_button" data-search-by="0-50000"><?php echo $currency; ?> 50000</button>
                                            <button class="price_single_button" data-search-by="51000-100000"><?php echo $currency; ?> 51K - 100K</button>
                                            <button class="price_single_button" data-search-by="101000-200000"><?php echo $currency; ?> 101K - 200K</button>
                                            <button class="price_single_button" data-search-by="201000-300000"><?php echo $currency; ?> 201K - 300K</button>
                                            <button class="price_single_button" data-search-by="301000-500000"><?php echo $currency; ?> 301K - 500K</button>
                                            <button class="price_single_button" data-search-by="501000-700000"><?php echo $currency; ?> 501K - 700K</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-parent="parent">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" data-search="brand">
                                        <span>Brand</span>

                                        <div class="accordion_icon_wrap">
                                            <span class="accordion_icon"></span>
                                            <span class="accordion_icon"></span>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                    <div class="accordion-body body-brands">
                                        <div class="price_button_wrap">
                                            <div class="select__all__brands">
                                                <input type="checkbox" name="select-all" id="select-allbrand" class="hidden d-none" hidden>
                                                <label for="select-allbrand" class="price_single_button fake-button">All Brands</label>
                                            </div>
                                            <?php
                                            foreach ($brandDetails as $brandKey => $brandValue) {
                                            ?>
                                                <button class="price_single_button" data-search-by="<?php echo $brandValue['Brand']; ?>"><?php echo $brandValue['Brand'] ?></button>
                                            <?php
                                            }
                                            ?>
                                            <!-- <button class="price_single_button" data-search-by="Ford">Ford</button>
                                        <button class="price_single_button" data-search-by="Chevrolet">Chevrolet</button>
                                        <button class="price_single_button" data-search-by="BMW">BMW</button>
                                        <button class="price_single_button" data-search-by="Mercedes-Benz">Mercedes-Benz</button>
                                        <button class="price_single_button" data-search-by="Audi">Audi</button>
                                        <button class="price_single_button" data-search-by="Volkswagen">Volkswagen</button>
                                        <button class="price_single_button" data-search-by="Nissan">Nissan</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-parent="parent">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" data-search="fuel-type">
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
                                            <button class="price_single_button" data-search-by="Petrol">Petrol</button>
                                            <button class="price_single_button" data-search-by="Diesel">Diesel</button>
                                            <button class="price_single_button" data-search-by="Electric">Electric</button>
                                            <button class="price_single_button" data-search-by="Hybrid">Hybrid</button>
                                            <!-- <button class="price_single_button d-none" data-search-by="Gasoline">Gasoline</button> -->
                                            <!-- <button class="price_single_button" data-search-by="LPG">LPG</button> -->
                                            <!-- <button class="price_single_button" data-search-by="Biodiesel">Biodiesel</button> -->
                                            <!-- <button class="price_single_button" data-search-by="CNG">CNG</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-parent="parent">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" data-search="mileage">
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
                                            <button class="price_single_button d-none">15,000 miles</button>
                                            <button class="price_single_button d-none">22,500 mile</button>
                                            <button class="price_single_button d-none">35,800 miles</button>
                                            <button class="price_single_button d-none">47,200 miles</button>
                                            <button class="price_single_button d-none">60,000 miles</button>
                                            <button class="price_single_button d-none">75,300 miles</button>
                                            <button class="price_single_button d-none">90,000 miles</button>
                                            <button class="price_single_button" data-search-by="0-9.99">Under 10 Kmpl</button>
                                            <button class="price_single_button" data-search-by="10-15">10 – 15 Kmpl</button>
                                            <button class="price_single_button" data-search-by="15-20">15 – 20 Kmpl</button>
                                            <button class="price_single_button" data-search-by="20-9999999">Above 20 Kmpl</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-parent="parent">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" data-search="transmission-type">
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
                                            <button class="price_single_button" data-search-by="Manual">Manual </button>
                                            <button class="price_single_button" data-search-by="Automatic">Automatic</button>
                                            <button class="price_single_button" data-search-by="CVT">CVT</button>
                                            <!-- <button class="price_single_button not-found" data-search-by="DCT">DCT</button> -->
                                            <!-- <button class="price_single_button not-found" data-search-by="Semi-Automatic">Semi-Automatic</button> -->
                                            <!-- <button class="price_single_button not-found" data-search-by="Tiptronic">Tiptronic</button> -->
                                            <!-- <button class="price_single_button not-found" data-search-by="Automated Manual">Automated Manual</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-parent="parent">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" data-search="seating-capacity">
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
                                            <button class="price_single_button" data-search-by="4-seater">4-seater </button>
                                            <button class="price_single_button" data-search-by="5-seater">5-seater</button>
                                            <button class="price_single_button" data-search-by="6-seater">6-seater</button>
                                            <button class="price_single_button" data-search-by="7-seater">7-seater</button>
                                            <button class="price_single_button" data-search-by="8-seater">8-seater</button>
                                            <button class="price_single_button" data-search-by="9-seater">9-seater</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-parent="parent">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" data-search="body-type">
                                        <span>Body Type</span>
                                        <div class="accordion_icon_wrap">
                                            <span class="accordion_icon"></span>
                                            <span class="accordion_icon"></span>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                    <div class="accordion-body body-brands">
                                        <div class="price_button_wrap">
                                            <button class="price_single_button" data-search-by="Compact SUV">Compact SUV</button>
                                            <button class="price_single_button" data-search-by="Convertible">Convertible</button>
                                            <button class="price_single_button" data-search-by="Coupe">Coupe</button>
                                            <button class="price_single_button" data-search-by="Crossover">Crossover</button>
                                            <button class="price_single_button" data-search-by="Crossover SUV">Crossover SUV</button>
                                            <button class="price_single_button" data-search-by="Hatchback">Hatchback</button>
                                            <button class="price_single_button" data-search-by="Minivan">Minivan</button>
                                            <button class="price_single_button" data-search-by="MPV">MPV</button>
                                            <button class="price_single_button" data-search-by="Pick-up Truck">Pick-up Truck</button>
                                            <button class="price_single_button" data-search-by="Roadster">Roadster</button>
                                            <button class="price_single_button" data-search-by="Sedan">Sedan</button>
                                            <button class="price_single_button" data-search-by="Sportback">Sportback</button>
                                            <button class="price_single_button" data-search-by="Station Wagon">Station Wagon</button>
                                            <button class="price_single_button" data-search-by="SUV">SUV</button>
                                            <button class="price_single_button" data-search-by="Van">Van</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- Offcanvas -->

                <div class="offcanvas offcanvas-end" tabindex="-1" id="filterOffCanvas" aria-labelledby="filterOffCanvasLabel">

                    <div class="offcanvas-body">

                        <button type="button" class="btn btn-primary yc_pop_up mt-3" data-bs-dismiss="offcanvas">Search</button>
                    </div>

                </div>
            </div>
            <div class="col-md-9" id="find__cars">
                <div class="page-title">
                    <h1 class="titles_h1">Find New Cars</h1>
                    <a class="d-lg-none d-md-block yc-btn-style-3 font_normal_16 best_offer" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterOffCanvas" aria-controls="filterOffCanvas">
                        Explore By Filter
                    </a>
                </div>
                <div class="find_car_grid" id="find-cars" data-cars="<?php echo site_url(' ') ?>/cars-filter.php"></div>
                <div class="spinner__cars load-more d-none">
                    <div class="spinner-border" role="status">
                        <span class="sr-only"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<?php require("footer.php"); ?>