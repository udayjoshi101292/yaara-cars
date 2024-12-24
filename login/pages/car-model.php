<?php $single_page_title = "Car Model" ?>
<?php include "../header.php" ?>
<?php include "../menu-sidebar.php" ?>

<form action="">


    <!-- Page Title -->
    <div class="container-fluid container-border p-5 my-5"> 
        <div class="row">
            <div class="col-md-12">
                <h2 class="">Page Title</h2>
                <div class="input-wrap">
                    <input type="text" placeholder="Title" class="has_placeholder" name="page-title">
                </div>
            </div>
        </div>
    </div>

    <!-- 1st Section -->
    <div class="container container-border p-5 my-5">
        <div class="row">
            <div class="col-md-6 upload-carousel-img">
                <h2 class="">Upload Carousel Images</h2>
                <div class="container">
                    <div class="row">
                        <div class=" carousel-upload-wrap">
                            <input type="file" accept="image/*" class="carousel-img_input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="">Model Title</h2>
                <div class="input-wrap">
                    <input type="file" placeholder="Car Description" class="has_placeholder" name="page-title">
                </div>
            </div>
        </div>
    </div>

    <!-- Versions and variants -->
    <div class="container container-border p-5 my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="">Prices and Versions Title:</h2>
                    </div>
                    <div class="col-md-6">
                        <div class="input-wrap">
                            <input type="text" placeholder="Title" class="has_placeholder" name="prices-and-versions-title">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 pt-3">
                <h4 class="">Model Description</h4>
                <div class="input-wrap">
                    <input type="text" placeholder="Add your Description here" class="has_placeholder" name="page-title">                   
                 </div>
            </div>
        </div>
    </div>



    <!-- faq Section -->
    <div class="container container-border p-5 my-5" id="faq-sections">
        <h2>Add FAQs</h2>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li class="faq_row_wrap">
                        <div class="input-wrap">
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

    <!-- Images Section -->
    <div class="container container-border p-5 my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="">Section Title</h2>
                <div class="input-wrap">
                    <input type="text" placeholder="Images" class="has_placeholder" name="page-title">
                </div>
            </div>
            <div class="col-md-12">
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
    </div>

    <!-- Videos Section-->
    <div class="container container-border p-5 my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="">Section Title</h2>
                <div class="input-wrap">
                    <input type="text" placeholder="Videos" class="has_placeholder" name="page-title">
                </div>
            </div>
            <div class="col-md-12 pt-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="desc-files">
                            <input type="link" name="YouTube" id="add-link" value="link">         
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="desc-files">
                            <input type="link" name="YouTube" id="add-link" value="link">         
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="desc-files">
                            <input type="link" name="YouTube" id="add-link" value="link">         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- News Section -->
    <div class="container container-border p-5 my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="">Section Title</h2>
                <div class="input-wrap">
                    <input type="text" placeholder="News" class="has_placeholder" name="page-title">
                </div>
            </div>
            <div class="col-md-12 pt-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="desc-files">
                            <input type="file" name="news" id="add-file" value="news-update">         
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="desc-files">
                            <input type="file" name="news" id="add-file" value="news-update">         
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="desc-files">
                            <input type="file" name="news" id="add-file" value="news-update">         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-border p-5 my-5">
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
                        <!-- <input class="cms-submit" type="submit"> -->
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
                            <!-- <input class="cms-submit" type="submit"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-border p-5 my-5">
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
                        <!-- <input class="cms-submit" type="submit"> -->
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
                            <!-- <input class="cms-submit" type="submit"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <div class="col-md-12">
                <div class="faq_add_row_btn main">
                    <button class="add_row">Add Row <span class="ml-1"><i class="fa-solid fa-plus"></i></span></button>
                </div>
            </div>
    </div>

    <input class="cms-page-update" type="submit" value="update">
    <input class="cms-page-update submit-sticky" type="submit" value="update">

</form>



<?php include "../footer.php" ?>
<script type="text/javascript">


jQuery(document).ready(function() {
    jQuery('.js-example-basic-multiple').select2();
});
</script>