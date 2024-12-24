<?php session_destroy(); ?>

<div class="yc-filter-form common_box_shadow col-lg-4 col-md-4 col-12 p-4 " data-aos="fade-right" data-aos-offset="300" data-aos-duration="1000">
    <h1 class="titles_h1 pb-3">
        Find your right car
    </h1>
    <form class="yc-form-main d-grid home-page-filter-form" method="POST" id="filter-cars">

        <div class="radio_button_holder">
        <div class="radio_wrap input_radio_checked">
                <span class="radio_input_warp ">
                    <input class="input_radio_label input_radio_brand car_filter_input" type="radio" id="model" name="filter-form" value="Model" checked>
                    <span class="custom_cheackmark"></span>
                </span>
                <label class="input_radio_label" for="model">By Brand</label>
            </div>
            <div class="radio_wrap ">
                <span class="radio_input_warp">
                    <input type="radio" class="input_radio_budget car_filter_input" id="budget" name="filter-form" data-name="filter-form" value="budget" >
                    <span class="custom_cheackmark"></span>
                </span>
                <label class="input_radio_label" for="budget">By Budget</label>
            </div>
        </div>
        <fieldset class="">
            <div class="filter_select_wrap select_budget_wrap_in_view">
                <div class="select_wrap">
                    <select name="price" class="selectbox select_budget_modal js-example-basic-single" id="Budget">

                    </select>
                </div>
                <div class="select_wrap select_car_modal_wrap ">
                    <select name="Modal" class="selectbox select_modal js-example-basic-single">
                        <option value="" selected="selected">Select Model</option>

                    </select>
                </div>

                <div class="form-Body-Type form-option select_wrap d-none">
                    <select name="brand-name" class="selectbox  js-example-basic-single">

                        <option value="" selected>Select Brand</option>

                        <?php
                        $carsList = "SELECT * FROM yc_master WHERE yc_master.location = 'UAE' ORDER BY yc_master.Brand ASC";

                        $carsList_all = mysqli_query($conn, $carsList);

                        $carsList = mysqli_fetch_all($carsList_all, MYSQLI_ASSOC);

                        ?>

                        <?php foreach ($carsList as $list): ?>
                            <option value="<?php echo $list['Brand_Slug']; ?>"><?php echo $list['Brand']; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>

            </div>
        </fieldset>

        <input type="submit" value="Search" class="form_filter home_page_form_filter" name="form_filter">
    </form>
</div>