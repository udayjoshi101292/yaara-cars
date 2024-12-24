<?php 

include "../common.php";

$brands = all_brand($conn);
$array_sliced = array_slice($brands, 0, 3, true);

// echo "<pre>";
// print_r($array_sliced);
// echo "</pre>";

?>


<!-- <div class="container-fluid"> -->
<section class="py-4">
    <form action="" method="POST">
<div class="row">
    <div class="col-md-12 ">
        <h2 class="section_titles">Import Testing</h2>
    </div>
</div>
        <div class="container-fluid section-container my-3 leads_table table-style">
            <div class="table_wrap post_table_wrap scroll-table">
            <table id="example" class="display" style="width:100%">
            <table id="table_main_id" class="display leads_table_tag">
                    <thead>
                        <tr>
                            <th> 
                                <div class="table_check_box_wrap">
                                    <span class="custom_checkbox_wrap">
                                        <input type="checkbox" name="checkbox" id="terms_and_conditions">
                                        <span class="custom_checkbox"><img src="https://www.yaaracars.com/assets/img/tick_icon.svg" alt=""></span>
                                    </span>
                                </div>
                            </th>
                            <th class="table_head_text">Master_ID</th>
                            <th class="table_head_text">Location</th>
                            <th class="table_head_text">Currency</th>
                            <th class="table_head_text">Year</th>
                            <!-- <th class="table_head_text">Brand</th>
                            <th class="table_head_text">Brand_Slug</th>
                            <th class="table_head_text">Brand_Logo</th>
                            <th class="table_head_text">Content</th>
                            <th class="table_head_text">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($array_sliced as $page):

                            
                        ?>
                        <tr>
                            <td class="table_checkbox_td">
                                <div class="table_check_box_wrap">
                                    <span class="custom_checkbox_wrap">
                                        <input type="checkbox" name="checkbox" id="terms_and_conditions">
                                        <span class="custom_checkbox"><img src="https://www.yaaracars.com/assets/img/tick_icon.svg" alt=""></span>
                                    </span>
                                </div>
                            </td>
                            
                            <td class="table_data_text post_title_td">
                                <input type="text" name="brand_Master_ID" value="<?php echo $page['Master_ID']; ?>" disabled>
                                <div class="hidden"><?php echo $page['Master_ID']; ?></div>
                            </td>

                            <td  class="table_data_text">
                                <input type="text" name="brand_Location" value="<?php echo $page['Location']; ?>" disabled>
                                <div class="hidden"><?php echo $page['Location']; ?></div>
                            </td>

                            <td  class="table_data_text">
                                <input type="text" name="brand_Currency" value="<?php echo $page['Currency']; ?>" disabled>
                                <div class="hidden"><?php echo $page['Currency']; ?></div>
                            </td>

                            <td class="table_data_text">
                                <input type="text" name="brand_Year" value="<?php echo $page['Year']; ?>" disabled>
                                <div class="hidden"><?php echo $page['Year']; ?></div>
                            </td>

                            <!-- <td class="table_data_text">
                                <input type="text" name="brand_Brand" value="<?php echo $page['Brand']; ?>">
                                <div class="hidden"><?php echo $page['Brand']; ?></div>
                            </td>

                            <td class="table_data_text">
                                <input type="text" name="brand_Brand_Slug" value="<?php echo $page['Brand_Slug']; ?>">
                                <div class="hidden"><?php echo $page['Brand_Slug']; ?></div>
                            </td>

                            <td class="table_data_text">
                                <input type="text" name="brand_Brand_Logo" value="<?php echo $page['Brand_Logo']; ?>">
                                <div class="hidden"><?php echo $page['Brand_Logo']; ?></div>
                            </td>

                            <td class="table_data_text">
                                <textarea type="text" name="brand_content"><?php echo $page['Content']; ?></textarea>
                                <div class="hidden"><?php echo $page['Content']; ?></div>
                            </td>

                            <td class="table_data_text">
                                <input type="submit" name="car_submit" value="Update">
                            </td> -->

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        </form>
</section>
<!-- </div> -->


<?php include '../footer.php'; ?>