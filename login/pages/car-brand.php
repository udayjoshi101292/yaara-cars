<?php $single_page_title = "Car Brand Edit" ?>
<?php include "../header.php" ?>
<?php include "../menu-sidebar.php" ?>

<?php include '../components/form-header.php'; ?>

<section class="section py-5 content-editor-section">

    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-lg-12 col-md-12 px-0">
                <div class="content-editor">
                    <h4 class="form-title mb-2">Short Description</h4>
                    <textarea name="textarea_content" id="editor" class="w-100"></textarea>
                </div>
            </div>

        </div>
    </div>

</section>

<section>
    <div class="modal_title">
        <input type="text" name="modal_title" placeholder="Car Modal Title" value="" class="single-page-section-title" id="section-title" required="">
    </div>

    <div class="container my-4">
        <div class="row my-2" id="car_modal_wrap">
            <div class="col-md-12 carousel-selector px-0 single_car_modal_wrap">
                <h4 class="mb-2">Choose Car Modals</h4>
                <select class="js-example-basic-multiple col-12" name="states[]" multiple="multiple">
                    <option value="Hyundai Accent">Hyundai Accent</option>
                    <option value="Hyundai Elantra">Hyundai Elantra</option>
                    <option value="Hyundai Sonata">Hyundai Sonata</option>
                    <option value="Hyundai Kona">Hyundai Kona</option>
                    <option value="Hyundai Tucson">Hyundai Tucson</option>
                </select>
                <!-- <input class="cms-submit" type="submit"> -->
            </div>

        </div>
    </div>

</section>

<!-- all display code  -->
<div class="container container-border p-5 my-5 d-none">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="">Section Title</h2>
            <div class="input-wrap">
                <input type="text" placeholder="Add the Car Brand's name here" class="has_placeholder" name="page-title">
            </div>
        </div>
        <div class="col-md-12 pt-3">
            <div class="desc-files pb-3">
                <h4 class="">Select Car Brand</h4>
                <input type="file" name="banner" id="add-file" value="banner-update">
            </div>

            <div class="desc-files pb-3">
                <h4 class="">Select Car Brand</h4>
                <input type="file" name="banner" id="add-file" value="banner-update">
            </div>

            <div class="desc-files pb-3">
                <h4 class="">Select Car Brand</h4>
                <input type="file" name="banner" id="add-file" value="banner-update">
            </div>

            <div class="desc-files">
                <h4 class="">Select Car Brand</h4>
                <input type="file" name="banner" id="add-file" value="banner-update">
            </div>
        </div>
    </div>
</div>

<div class="container container-border p-5 my-5 d-none">
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

<div class="container container-border p-5 my-5 d-none">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="">Section Title</h2>
            <div class="input-wrap">
                <input type="text" placeholder="Images" class="has_placeholder" name="page-title">
            </div>
        </div>
        <div class="col-md-12 pt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="desc-files">
                        <input type="file" name="images" id="add-file" value="news-update">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="desc-files">
                        <input type="file" name="images" id="add-file" value="news-update">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="desc-files">
                        <input type="file" name="images" id="add-file" value="news-update">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container container-border p-5 my-5 d-none">
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

<div class="container d-none">
    <div class="col-md-12">
        <div class="faq_add_row_btn main">
            <button class="add_row">Add Row <span class="ml-1"><i class="fa-solid fa-plus"></i></span></button>
        </div>
    </div>
</div>

<!-- <input class="cms-page-update" type="submit" value="update"> -->
<!-- <input class="cms-page-update submit-sticky" type="submit" value="update"> -->

<?php include '../components/form-footer.php'; ?>

<?php include "../footer.php" ?>