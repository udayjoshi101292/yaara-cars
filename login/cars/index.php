<?php 

include "../common.php";

$brands = all_brand($conn);

?>


<!-- <div class="container-fluid"> -->
<section class="py-4">
<div class="row">
    <div class="col-md-12 ">
        <h2 class="section_titles">All Cars</h2>
    </div>
</div>
    <?php ?>
    <form action="">
        <div class="container-fluid section-container my-3">
            <div class="table_wrap post_table_wrap">
                <table id="table_main_id" class="display post_table_tag">
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
                            <th class="table_head_text">Brand Name</th>
                            <th class="table_head_text">Location</th>
                            <th class="table_head_text">Brand Url</th>
                            <th class="table_head_text">Currency</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($brands as $page):

                            
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
                                <div class="post_title_wrapper">
                                    <div class="post_title_holder">
                                    <a href="<?php  echo cms_url(); ?>/cars/brand.php?id=<?php echo $page['Master_ID']; ?>"><?php echo $page['Brand']; ?>

                                        </a>
                                    <div class="post_title_actions_holder">
                                        <a href="<?php  echo cms_url(); ?>/cars/brand.php?id=<?php echo $page['Master_ID']; ?>">Edit</a>
                                        <a href="<?php echo $live_url?>/<?php echo $page['Brand_Slug'] ?>" target="_blank">View</a>
                                        <a href="#" class="trash_button">Trash</a>
                                    </div>
                                </div>
                            </td>
                            <td  class="table_data_text"><a href="#"><?php echo $page['Location']; ?></a></td>
                            <td  class="table_data_text"><a href="<?php echo $live_url?>/<?php echo $page['Brand_Slug'] ?>" target="_blank"><?php echo $page['Brand_Slug']; ?></a></td>
                            <td class="table_data_text">
                                <div class="blog_date_wrap">
                                    <p class="publised_time"><?php echo $page["Currency"]; ?></p>
                                </div>
                            </td>
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