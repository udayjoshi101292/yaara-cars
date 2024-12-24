<?php require_once './constants.php'; ?>
<?php require_once './checkIsUserLoggedIn.php'; ?>
<?php $single_page_title = "All Post" ?>
<?php include "header.php"; ?>
<?php // include 'config.php'; ?>
<?php include "menu-sidebar.php"; ?>
<?php include "post-config.php";?>


<?php
    // echo "<pre>";
    // print_r($_SERVER['SCRIPT_URI']);
    // echo "</pre>";

$yc_post_fatched = blog_data($conn);


    // foreach($yc_post_fatched as $yc_post_data):
    //     // echo "<pre>";
    //     // print_r($yc_post_data);
    //     // echo "</pre>";

        
    // endforeach;

    // print_r($yc_post_fatched);
        
    
?>

<!-- <div class="container-fluid"> -->
    <div class="row mt-3">
        <div class="col-md-12 add_new_post">
            <a href="<?php echo $admin_url; ?>/posts/single.php" >Add New Post</a>
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
                            <th class="table_head_text">Title</th>
                            <th class="table_head_text">Author</th>
                            <th class="table_head_text">Categories</th>
                            <th class="table_head_text">Tags</th>
                            <th class="table_head_text">Status/Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($yc_post_fatched as $yc_post_data):
                            
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
                                    <div class="post_title_holder"><a  href="<?php echo $backend_url;?>/posts/single.php?id=<?php echo $yc_post_data["ID"]; ?>" ><?php echo $yc_post_data["Title"]; ?></a></div>
                                    <div class="post_title_actions_holder">
                                        <a href="<?php echo $backend_url;?>/posts/single.php?id=<?php echo $yc_post_data["ID"]; ?>" >Edit</a>
                                        <a href="<?php echo site_url(); ?>/car-news/<?php echo $yc_post_data['Slug'] ?>" target="_blank">View</a>
                                        <a href="#" class="trash_button">Trash</a>
                                    </div>
                                </div>
                            </td>
                            <td class="table_data_text"><a href="#">Admin</a></td>
                            <td class="table_data_text"><a href="#"><?php echo $yc_post_data["Category"]; ?></a></td>
                            <td class="table_data_text"><a href="#"><?php /*echo $yc_post_data["Title"];*/ echo "NA" ?></a></td>
                            <td class="table_data_text">
                                <div class="blog_date_wrap">
                                    <p class="blog_status"><?php echo $yc_post_data["Status"]; ?></p>
                                    <p class="publised_time"><?php echo $yc_post_data["Date"]; ?></p>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
<!-- </div> -->


<?php include "footer.php" ?>