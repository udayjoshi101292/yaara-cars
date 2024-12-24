<?php // Template Name: KSA Home


$single_page_title = "KSA Home Page";
include "../common.php";
include '../components/form-header.php';

?>



<?php



$date_d = get_file_names($conn);



// $page_all = page_data($conn, $_GET['id']);
// $single = $page_all;
// $content = json_decode($single['Content'], true);

$cars_data = brand_modal($conn, 'KSA');

// echo "<pre>";
// print_r($cars_data);
// echo "</pre>";
$uae_ksa_home_data = uae_ksa_home($conn, 'KSA Home', true);
// echo "<pre>";
// print_r($uae_ksa_home_data);
// echo "</pre>";


?>


<!-- <form class="backend-form d-none" action=""> -->
<div class="row">
    <div class="col-lg-12 col-md-12 px-2 py-3">

        <!-- section 1  -->
        <div class="container section-container my-3 banner_section">
            <h2 class="section_titles" name="Section_name">Banners Carousel Items</h2>
            <input type="hidden" name="home_banner-deleteValues" value="">
            <div class="container banner_wrapper">

                 
                <?php
                $count = 0;
                foreach ($uae_ksa_home_data['section_banner'] as $uae_ksa_banner_data): ?>
                    <div class="row single_banner_wrap my-2">
                        <div class="col-md-12 d-none">
                            <h3 class="wrap_title text-center">Item <?php echo $count + 1; ?></h3>
                        </div>
                        <div class="col-md-12 py-2">
                            <h4 class="wrap_title">Banner Title</h4>
                            <div class="input-wrap">
                                <input type="text" required placeholder="Banner Title" class="to_sentence_case  has_placeholder h2" name="home_banner-title[]<?php // echo $count ?>" value="<?php echo ($uae_ksa_banner_data['title'] !== ' ' || $uae_ksa_banner_data['title'] !== null) ? $uae_ksa_banner_data['title'] : ' '; ?>">
                            </div>
                        </div>
                        <div class="col-md-12 py-2">
                            <h4 class="wrap_title">Banner Sub Content</h4>
                            <div class="input-wrap">
                                <input type="text" placeholder="Banner Sub Content" class="to_sentence_case  has_placeholder h2" name="home_banner-sub-title[]<?php // echo $count ?>" value="<?php echo ($uae_ksa_banner_data['sub-title'] !== '' || $uae_ksa_banner_data['sub-title'] !== null) ? $uae_ksa_banner_data['sub-title'] : ' '; ?>">
                            </div>
                        </div>
                        <div class="col-md-12 py-2">
                            <h4 class="wrap_title">Banner CTA Text</h4>
                            <div class="input-wrap">
                                <input type="text" placeholder="Banner CTA Text" class="to_sentence_case  has_placeholder h2" name="home_banner-cta-text[]<?php // echo $count ?>" value="<?php echo ($uae_ksa_banner_data['cta-text'] !== '' || $uae_ksa_banner_data['cta-text'] !== null) ? $uae_ksa_banner_data['cta-text'] : ' '; ?>">
                            </div>
                        </div>
                        <div class="col-md-12 py-2">
                            <h4 class="wrap_title">Banner CTA Link</h4>
                            <div class="input-wrap">
                                <input type="text" placeholder="Banner CTA Link" class="has_placeholder h2" name="home_banner-cta-link[]<?php // echo $count ?>" value="<?php echo ($uae_ksa_banner_data['cta-link'] !== '' || $uae_ksa_banner_data['cta-link'] !== null) ? $uae_ksa_banner_data['cta-link'] : ' '; ?>">
                            </div>
                        </div>
                        <div class="col-md-12 py-2">
                            <h4 class="wrap_title">Banner Overlay Text</h4>
                            <div class="input-wrap">
                                <input type="text" placeholder="Banner Overlay Text" class="to_sentence_case  has_placeholder h2" name="home_banner-overlay-text[]<?php // echo $count ?>" value="<?php echo ($uae_ksa_banner_data['overlay-text'] !== '' || $uae_ksa_banner_data['overlay-text'] !== null) ? $uae_ksa_banner_data['overlay-text'] : ' '; ?>">
                            </div>
                        </div>
                        <div class="col-md-12 upload-carousel-img py-2">
                            <div class="row px-1">
                                <div class="col-md-6">
                                    <h4 class="wrap_title">Banner Image</h4>
                                    <div class="banner_single_img_wrap single-preview-img-upload ">
                                        <input type="file" accept="image/*" class="single-img-upload" value="<?php  // echo $uae_ksa_banner_data['image']; 
                                                                                                                ?>" name="home_banner-img[]<?php // echo $count ?>">
                                        <input type="hidden" name="home-banner-hidden-image" value="<?php echo !empty($uae_ksa_banner_data['image']) ? $uae_ksa_banner_data['image']  : ''; ?>">
                                        <div class="single_preview_img_holder">
                                            <!-- <img src='<?php // echo $site_url_backend 
                                                            ?>/assets/img/post/testing/<?php //echo $about_data['banner_section']['Image'] 
                                                                                        ?>'> -->
                                            <img src='<?php echo ($uae_ksa_banner_data['image'] !== '' || $uae_ksa_banner_data['image'] !== null) ? $site_url_backend . '/assets/img/dummy-img/' . $uae_ksa_banner_data['image'] : ' '; ?>'>
                                            <!-- <img src='<?php // echo $site_url_backend 
                                                            ?>/assets/img/dummy-img/<?php // echo $uae_ksa_home_data['section_banner'][0]['image'] 
                                                                                    ?>'> -->
                                        </div>
                                        <button class="delete_single_img" type="button"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="wrap_title">Mobile Banner Image</h4>
                                    <div class="banner_single_img_wrap single-preview-img-upload ">
                                        <input type="file" accept="image/*" class="single-img-upload" value="<?php  // echo $uae_ksa_banner_data['image']; 
                                                                                                                ?>" name="home_banner-img-mobile[]<?php // echo $count ?>">
                                        <input type="hidden" name="home-banner-hidden-image-mobile" value="<?php echo !empty($uae_ksa_banner_data['mobile-banner-image']) ? $uae_ksa_banner_data['mobile-banner-image']  : ''; ?>">
                                        <div class="single_preview_img_holder">
                                            <!-- <img src='<?php // echo $site_url_backend 
                                                            ?>/assets/img/post/testing/<?php //echo $about_data['banner_section']['Image'] 
                                                                                        ?>'> -->
                                            <img src='<?php echo ($uae_ksa_banner_data['mobile-banner-image'] !== '' || $uae_ksa_banner_data['mobile-banner-image'] !== null) ? $site_url_backend . '/assets/img/dummy-img/' . $uae_ksa_banner_data['mobile-banner-image'] : ' '; ?>'>
                                            <!-- <img src='<?php // echo $site_url_backend 
                                                            ?>/assets/img/dummy-img/<?php // echo $uae_ksa_home_data['section_banner'][0]['image'] 
                                                                                    ?>'> -->
                                        </div>
                                        <button class="delete_single_img" type="button"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button data-delete-id="<?php echo $count;?>" class="delete_single_banner_wrap " type="button"><i class="fa-regular fa-trash-can"></i></button>
                    </div>
                <?php $count = $count + 1;
                endforeach; ?>
            </div>
            <div class="col-md-12 mt-3 mb-1">
                <div class="add_btn_wrap">
                    <button type="button" class="banner_carousel_add add_row_btn">Add Row <span class="ml-1"><i class="fa-solid fa-plus"></i></span></button>
                </div>
            </div>
        </div>
        <!-- section 1  -->

        <!-- Section 2 -->
        <div class="container section-container my-3 ">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h2 class="section_titles"><?php echo ($uae_ksa_home_data['section_popular_cars']['title'] !== '') ? $uae_ksa_home_data['section_popular_cars']['title']  : 'Popular Cars in UAE backup'; ?></h2>
                    <div class="input-wrap">
                        <input type="text" value="<?php echo ($uae_ksa_home_data['section_popular_cars']['title'] !== '') ? $uae_ksa_home_data['section_popular_cars']['title']  : 'Popular Cars in UAE backup'; ?>" placeholder="Add section title" class="to_sentence_case  has_placeholder h2" name="popular-brands-section-title">
                    </div>
                </div>
                <div class="col-md-12 py-2">
                    <div class="row">
                        <div class="col-md-12 carousel-selector">
                            <h4 class="">Choose available cars</h4>
                            <select class="js-example-basic-multiple" name="popular_cars_select[]" multiple="multiple">
                                <?php foreach ($cars_data as $val): ?>
                                    <option value="<?php echo $val['Master_ID'] . '-' . $val['Mod_ID']; ?>"

                                        <?php
                                        /*
                                    echo (!empty($uae_ksa_home_data['section_popular_cars']['cars']))? (in_array($val['Modal'], $uae_ksa_home_data['section_popular_cars']['cars'])) ? 'selected ' : ''  : '' ?> ><?php echo $val['Brand'].' '.$val['Modal']; 

                                    */




                                        if (
                                            (!empty($uae_ksa_home_data['section_popular_cars']['cars']))
                                            &&
                                            (is_array($uae_ksa_home_data['section_popular_cars']['cars']))

                                        ) {
                                            foreach ($uae_ksa_home_data['section_popular_cars']['cars'] as $key => $selectedCars) {
                                                // echo $selectedCars;
                                                if ($selectedCars === $val['Master_ID'] . '-' . $val['Mod_ID']) {
                                                    echo 'selected';
                                                }
                                            }
                                        }


                                        ?>><?php echo $val['Brand'] . ' ' . $val['Modal']; ?>

                                    </option>



                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3 -->
        <div class="container section-container my-3 ">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h2 class="section_titles"><?php echo ($uae_ksa_home_data['latest_electric_cars']['title'] !== '') ? $uae_ksa_home_data['latest_electric_cars']['title']  : 'Popular Electric Cars in UAE backup'; ?></h2>
                    <div class="input-wrap">
                        <input type="text" value="<?php echo ($uae_ksa_home_data['latest_electric_cars']['title'] !== '') ? $uae_ksa_home_data['latest_electric_cars']['title']  : 'Popular Electric Cars in UAE backup'; ?>" placeholder="Add section title" class="to_sentence_case h2 has_placeholder" name="electric_cars_title">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row py-2">
                        <div class="col-md-12 carousel-selector">
                            <h4 class="">Choose available cars</h4>
                            <select class="js-example-basic-multiple col-12" name="electric_cars_select[]" multiple="multiple">
                                <?php foreach ($cars_data as $val): ?>
                                    <option value="<?php echo $val['Master_ID'] . '-' . $val['Mod_ID']; ?>"

                                        <?php
                                        /*
                                    echo (!empty($uae_ksa_home_data['section_popular_cars']['cars']))? (in_array($val['Modal'], $uae_ksa_home_data['section_popular_cars']['cars'])) ? 'selected ' : ''  : '' ?> ><?php echo $val['Brand'].' '.$val['Modal']; 

                                    */




                                        if (
                                            (!empty($uae_ksa_home_data['latest_electric_cars']['cars']))
                                            &&
                                            (is_array($uae_ksa_home_data['latest_electric_cars']['cars']))

                                        ) {
                                            foreach ($uae_ksa_home_data['latest_electric_cars']['cars'] as $key => $selectedCars) {
                                                // echo $selectedCars;
                                                if ($selectedCars === $val['Master_ID'] . '-' . $val['Mod_ID']) {
                                                    echo 'selected';
                                                }
                                            }
                                        }


                                        ?>><?php echo $val['Brand'] . ' ' . $val['Modal']; ?>

                                    </option>



                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <input class="cms-page-update" type="submit" value="update"> -->
        <!-- <input class="cms-page-update submit-sticky" type="submit" value="update"> -->
    </div>
</div>

<!-- </form> -->

<?php


include '../components/form-footer.php';
include "../footer.php"; ?>
<!-- <script type="text/javascript">
    //     $(document).ready(function() {
    //     $('.js-example-basic-single').select2();
    // });

    // jQuery(document).ready(function() {
    //     jQuery('.js-example-basic-multiple').select2();
    // });
</script> -->


<script>
    jQuery(`.delete_single_banner_wrap `).click(function(e){
    let Id = ($(this).data('delete-id'));
    if(jQuery(`[name="home_banner-deleteValues"]`).val() !== ''){
        Id +=`, ${jQuery(`[name="home_banner-deleteValues"]`).val()}`;
    }
    jQuery(`[name="home_banner-deleteValues"]`).val(Id);
    
})
</script>