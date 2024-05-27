<?php $single_page_title = "Car Brand Edit" ?>
<?php include "../header.php"?>
<?php include "../menu-sidebar.php" ?>


<form action="">
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

    <div class="container container-border p-5 my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="">Section Title</h2>
                <div class="input-wrap">
                    <input type="text" placeholder="Add the Car Brand's name here" class="has_placeholder" name="page-title">
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

    <div class="container container-border p-5 my-5">
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


    <input class="cms-page-update" type="submit" value="update">
    <input class="cms-page-update submit-sticky" type="submit" value="update">

</form>

<?php include "../footer.php" ?>
