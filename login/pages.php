<?php require_once './constants.php'; ?>
<?php require_once './checkIsUserLoggedIn.php'; ?>
<?php $single_page_title = "Pages" ?>
<?php include "header.php" ?>
<?php include "menu-sidebar.php" ?>
<?php include "post-config.php";?>


<?php
    // echo "<pre>";
    // print_r($_SERVER['SCRIPT_URI']);
    // echo "</pre>";

// $yc_post_fatched = blog_data($conn);
$all_pages = page_data($conn);



// $page_temp = [];
// $dir = array_diff(scandir('pages', 1), ['.','..','.txt']);

// // print_r($dir);
// foreach($dir as $d){
//     $page_temp[] = page_template('Default','pages/'.$d);
// }

// echo "<pre>";
// print_r($all_pages);
// echo "</pre>";

$page_list = $all_pages;

?>

<!-- <div class="container-fluid"> -->
<div class="row ">
    <div class="col-md-12 ">
        <h2 class="section_titles">Pages</h2>
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
                            <th class="table_head_text">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($page_list as $page):

                            $data = page_template('pages/', $page['Template']);
                            
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
                                    <a href="<?php  echo cms_url(); ?>/pages/<?php echo $data['path']; ?>?id=<?php echo $page['ID']; ?>"><?php echo $page['Title']; ?>

                                        </a>
                                    <div class="post_title_actions_holder">
                                        <a href="<?php  echo cms_url(); ?>/pages/<?php echo $data['path']; ?>?id=<?php echo $page['ID']; ?>">Edit</a>
                                        <a href="<?php echo $live_url?>/<?php echo $page['Slug'] ?>" target="_blank">View</a>
                                        <a href="#" class="trash_button">Trash</a>
                                    </div>
                                </div>
                            </td>
                            <td class="table_data_text"><a href="#">Admin</a></td>
                            <td class="table_data_text">
                                <div class="blog_date_wrap">
                                    <p class="blog_status"><?php echo $page["Status"]; ?></p>
                                    <p class="publised_time"><?php echo $page["Date"]; ?></p>
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