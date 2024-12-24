<?php $single_page_title = "Coolray" ?>
<?php include "../header.php" ?>
<?php include "../menu-sidebar.php" ?>
<?php include '../components/form-header.php'; ?>

<form class="bckend-form" action="">

    <!-- 1st Section -->
    <div class="container  section-container my-3">
        <div class="row">
            <div class="col-md-12 upload-carousel-img">
                <h2 class="section_titles">Carousel Images</h2>
                <div class="container">
                    <div class="row">
                        <div class=" carousel-upload-wrap multiple_img_wrapper">
                            <div class="single_img_wrap">
                                <!-- <div class="single_img_wrap"> -->
                                <!-- Will ADDEND THIS DIV  -->
                                <!-- </div> -->
                                <input type="file" accept="image/*" class="carousel-img_input" multiple>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Car Model Versions and variants Section -->
    <div class="container section-container my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <h2 class=" section_titles">Prices and Versions Title</h2>
                    </div>
                    <div class="col-md-12">
                        <div class="input-wrap">
                            <input type="text" placeholder="Add section title" class="to_sentence_case h2 has_placeholder" name="prices-and-versions-title">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container  section-container my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h2 class="section_titles">Car brand images</h2>
                        <div class="container">
                            <div class="row">
                                <div class=" multiple_img_wrapper">
                                    <!-- <div class="single_img_wrap"> -->
                                    <!-- Will ADDEND THIS DIV  -->
                                    <!-- </div> -->
                                    <input type="file" accept="image/*" class="carousel-img_input" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container section-container my-3">
        <div class="row">
            <div class="col-md-12 mb-2">
                <h2 class="section_titles">Car brand videos</h2>
                <div class="input-wrap">
                    <input type="text" placeholder="Add section title" class="to_sentence_case h2 has_placeholder" name="car_brand_videos">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-12 videos_wrap_grid">
                    <div class="single_brand_videos_wrap ">
                        <div class="video_link_wrap">
                            <span class="video_link_icon"><i class="fa-solid fa-link"></i></span>
                            <input type="url" placeholder="Paste Video link">
                        </div>
                        <div class="car_video_card my-2">
                            <div class="videos_holder">
                                <iframe class="" width="100%" height="200" src="https://www.youtube.com/embed/AjWfY7SnMBI?si=FU-jXcdgxv0WbeDm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen="">
                                </iframe>
                            </div>
                            <div class="car_video_desc my-1">
                                <div class="car-input-wrap">
                                    <textarea placeholder="Add Description" rows="2" class="to_sentence_case" name="car-video-desc "></textarea>
                                </div>
                            </div>
                        </div>
                        <button>
                            <span><i class="fa-regular fa-trash-can"></i></span>
                        </button>
                    </div>
                    <div class="single_brand_videos_wrap ">
                        <div class="video_link_wrap">
                            <span class="video_link_icon"><i class="fa-solid fa-link"></i></span>
                            <input type="url" placeholder="Paste Video link">
                        </div>
                        <div class="car_video_card my-2">
                            <div class="videos_holder">
                                <iframe class="" width="100%" height="200" src="https://www.youtube.com/embed/AjWfY7SnMBI?si=FU-jXcdgxv0WbeDm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen="">
                                </iframe>
                            </div>
                            <div class="car_video_desc my-1">
                                <div class="car-input-wrap">
                                    <textarea placeholder="Add Description" rows="2" class="to_sentence_case" name="car-video-desc "></textarea>
                                </div>
                            </div>
                        </div>
                        <button>
                            <span><i class="fa-regular fa-trash-can"></i></span>
                        </button>
                    </div>
                    <div class="single_brand_videos_wrap ">
                        <div class="video_link_wrap">
                            <span class="video_link_icon"><i class="fa-solid fa-link"></i></span>
                            <input type="url" placeholder="Paste Video link">
                        </div>
                        <div class="car_video_card my-2">
                            <div class="videos_holder">
                                <iframe class="" width="100%" height="200" src="https://www.youtube.com/embed/AjWfY7SnMBI?si=FU-jXcdgxv0WbeDm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen="">
                                </iframe>
                            </div>
                            <div class="car_video_desc my-1">
                                <div class="car-input-wrap">
                                    <textarea placeholder="Add Description" rows="2" class="to_sentence_case" name="car-video-desc "></textarea>
                                </div>
                            </div>
                        </div>
                        <button>
                            <span><i class="fa-regular fa-trash-can"></i></span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container section-container my-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="section_titles">All Cars in KSA</h2>
                <div class="input-wrap">
                    <input type="text" placeholder="Add section title" class="to_sentence_case h2 has_placeholder" name="all_cars_ksa">
                </div>
            </div>
            <div class="col-md-12">
                <div class="row py-2">
                    <div class="col-md-12 carousel-selector">
                        <h5 class="">Choose cars in KSA</h5>
                        <select class="js-example-basic-multiple col-12" name="states[]" multiple="multiple">
                            <option>Ford</option>
                            <option>Toyota</option>
                            <option>Honda</option>
                            <option>Jeep</option>
                            <option>Hyundai</option>
                            <option>Kia</option>
                            <option>Jaguar</option>
                            <option>Range Rover</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container section-container my-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="section_titles">Alternatives to consider</h2>
                <div class="input-wrap">
                    <input type="text" placeholder="Add section title" class="to_sentence_case h2 has_placeholder" name="alternatives-to-consider">
                </div>
            </div>
            <div class="col-md-12">
                <div class="row py-2">
                    <div class="col-md-12 carousel-selector">
                        <h5 class="">Choose alternatives</h5>
                        <select class="js-example-basic-multiple col-12" name="states[]" multiple="multiple">
                            <option>Ford</option>
                            <option>Toyota</option>
                            <option>Honda</option>
                            <option>Jeep</option>
                            <option>Hyundai</option>
                            <option>Kia</option>
                            <option>Jaguar</option>
                            <option>Range Rover</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- faq  -->
    <div class="container section-container my-3" id="faq-sections">
        <h2 class="section_titles">Add FAQs</h2>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li class="faq_row_wrap">
                        <div class="input-wrap faq-input-wrap">
                            <input type="text" name="" id="" placeholder="FAQ Title" class="has_placeholder">
                        </div>
                        <div class="faq-body">
                            <textarea class="input-textarea has_placeholder" name="" rows="2" id="" placeholder="FAQ Body"></textarea>
                        </div>
                        <button class="delete_faq"><i class="fa-regular fa-trash-can"></i></button>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="faq_add_row_btn">
                    <button class="add_row">Add Row <span class="ml-1"><i class="fa-solid fa-plus"></i></span></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Car model Images -->

    <!-- <div class="container  p-5 my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="">Section Title</h2>
                <div class="input-wrap">
                    <input type="text" placeholder="Images" class="has_placeholder" name="page-title">
                </div>
            </div>
            <div class="col-md-12 pt-3">
                <div class="row">
                    <div class="col-md-3 py-3">
                        <div class="desc-files">
                            <input type="file" name="images" id="add-file" value="news-update">
                        </div>
                    </div>
                    <div class="col-md-3 py-3">
                        <div class="desc-files">
                            <input type="file" name="images" id="add-file" value="news-update">
                        </div>
                    </div>
                    <div class="col-md-3 py-3">
                        <div class="desc-files">
                            <input type="file" name="images" id="add-file" value="news-update">
                        </div>
                    </div>
                    <div class="col-md-3 py-3">
                        <div class="desc-files">
                            <input type="file" name="images" id="add-file" value="news-update">
                        </div>
                    </div>
                    <div class="col-md-3 py-3">
                        <div class="desc-files">
                            <input type="file" name="images" id="add-file" value="news-update">
                        </div>
                    </div>
                    <div class="col-md-3 py-3">
                        <div class="desc-files">
                            <input type="file" name="images" id="add-file" value="news-update">
                        </div>
                    </div>
                    <div class="col-md-3 py-3">
                        <div class="desc-files">
                            <input type="file" name="images" id="add-file" value="news-update">
                        </div>
                    </div>
                    <div class="col-md-3 py-3">
                        <div class="desc-files">
                            <input type="file" name="images" id="add-file" value="news-update">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <!-- <div class="container  p-5 my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="">Section Title</h2>
                <div class="input-wrap">
                    <input type="text" placeholder="Popular Brands" class="has_placeholder" name="page-title">
                </div>
            </div>
            <div class="col-md-12">
                <div class="row pt-5">
                    <div class="col-md-12 carousel-selector">
                        <h5 class="">Choose Car Logos</h5>
                        <select class="js-example-basic-multiple col-12" name="states[]" multiple="multiple">
                            <option>Ford</option>
                            <option>Toyota</option>
                            <option>Honda</option>
                            <option>Jeep</option>
                            <option>Hyundai</option>
                            <option>Kia</option>
                            <option>Jaguar</option>
                            <option>Range Rover</option>
                        </select>
                    </div>
                    <div class="col-md-12 carousel-limit mt-3">
                        <h5 class="">Set Carousel Limit</h5>
                        <div class="carousel-selector">
                            <select class="js-example-basic-single col-12" name="state">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div class="container  p-5 my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="">Section Title</h2>
                <div class="input-wrap">
                    <input type="text" placeholder="Popular Brands" class="has_placeholder" name="page-title">
                </div>
            </div>
            <div class="col-md-12">
                <div class="row pt-5">
                    <div class="col-md-12 carousel-selector">
                        <h5 class="">Choose Car Logos</h5>
                        <select class="js-example-basic-multiple col-12" name="states[]" multiple="multiple">
                            <option>Ford</option>
                            <option>Toyota</option>
                            <option>Honda</option>
                            <option>Jeep</option>
                            <option>Hyundai</option>
                            <option>Kia</option>
                            <option>Jaguar</option>
                            <option>Range Rover</option>
                        </select>
                        <input class="cms-submit" type="submit">
                    </div>
                    <div class="col-md-12 carousel-limit mt-3">
                        <h5 class="">Set Carousel Limit</h5>
                        <div class="carousel-selector">
                            <select class="js-example-basic-single col-12" name="state">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                            </select>
                            <input class="cms-submit" type="submit">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div class="container">
        <div class="col-md-12">
            <div class="faq_add_row_btn main">
                <button class="add_row">Add Row <span class="ml-1"><i class="fa-solid fa-plus"></i></span></button>
            </div>
        </div>
    </div> -->

    <!-- <input class="cms-page-update" type="submit" value="update"> -->
    <!-- <input class="cms-page-update submit-sticky" type="submit" value="update"> -->

</form>


<?php include '../components/form-footer.php'; ?>

<?php include "../footer.php" ?>
<script type="text/javascript">
    // jQuery(document).ready(function() {
    //     jQuery('.js-example-basic-multiple').select2();
    // });
</script>