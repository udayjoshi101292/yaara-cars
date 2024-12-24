<?php

include "../common.php";
include 'temp-function.php';
include 'function.php';

$brands = all_brand($conn);

if (empty($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
unset($_GET['page']);
unset($_GET['filter_table_btn']);

$filter_emp_arr = array();
foreach ($_GET as $g => $val) {
    if (!empty($val)) {
        $array = array('column' => $g, 'value' => $val);
        array_push($filter_emp_arr, $array);
    }
}
$column_name = car_data($conn, $default = array('table_name' => 'yc_modal'));
$data = get_data_data_testing($conn, 'yc_modal', 'Mod_ID', null, $page, null, null, $filter_emp_arr);

$get_modal = get_data_data_testing($conn, 'yc_modal', null, null, null, ' GROUP BY Modal  ', ' Modal ');
$get_body_type = get_data_data_testing($conn, 'yc_modal', null, null, null, ' GROUP BY Body_Type  ', ' Body_Type ');
$get_Status_Modal = get_data_data_testing($conn, 'yc_modal', null, null, null, ' GROUP BY Status_Modal  ', ' Status_Modal ');

$count_data = get_data_data_testing($conn, 'yc_modal', 'Mod_ID', true, null, null, null, $filter_emp_arr) / 10;

// $arr_sliced_data = array_slice($data, 0, 5, true);
// $arr_sliced_col = array_slice($column_name, 0, 5, true);
$arr_sliced_data = $data;
$arr_sliced_col = $column_name;

// echo "<pre>";
// print_r($_SERVER['SCRIPT_URI']);
// echo "</pre>";


?>


<!-- <div class="container-fluid"> -->
<section class="py-4">
    <div class="row">
        <div class="col-md-12 ">
            <h2 class="section_titles">All Modal</h2>
        </div>
    </div>



    <form action="" method="GET">
        <div class="filter_wrap ">
            <?php echo  select_filters($get_modal,'Modal', 'Modal', array('name' => 'Modal')) ?>
            <?php echo  select_filters($get_body_type,'Body Type', 'Body_Type', array('name' => 'Body_Type')) ?>
            <?php echo  select_filters($get_Status_Modal,'Status', 'Status_Modal', array('name' => 'Status_Modal')) ?>
            <span class="form-update-btn post-form-group btn-style-1">
                <input type="submit" value="Filter" name="filter_table_btn">
            </span>
            <span class="form-update-btn post-form-group btn-style-1">
                <a href="<?php echo $_SERVER['SCRIPT_URI']; ?>">Clear Filter</a>
            </span>
        </div>
    </form>

    <form action="../export-import.php" method="post" class="mt-2" enctype="multipart/form-data">
        <div class="export_import_wrap">
            <div class="form-update-btn post-form-group btn-style-1">
                <input type="submit" value="Export" name="export_btn">
            </div>
            <div class="form-update-btn post-form-group btn-style-1 d-flex">
                <input type="file" value="" name="file-to-import" class="mr-1">
                <input type="submit" value="Import" name="import_btn">
            </div>
        </div>
        <input type="hidden" value="yc_modal-Mod_ID" name="table-name">
    </form>

    <form action="" method="POST">

        <div class="container-fluid section-container my-3 leads_table database_tables_wrap table-style">
            <div class="table_wrap post_table_wrap scroll-table">
                <table id="table_main_id" class="display table-responsive ">
                    <thead>
                        <tr>
                            <!-- <th>
                                <div class="table_check_box_wrap">
                                    <span class="custom_checkbox_wrap">
                                        <input type="checkbox" name="checkbox" id="terms_and_conditions">
                                        <span class="custom_checkbox"><img src="https://www.yaaracars.com/assets/img/tick_icon.svg" alt=""></span>
                                    </span>
                                </div>
                            </th> -->
                            <?php foreach ($arr_sliced_col as $col_name): ?>
                                <th class="table_head_text"><?php echo $col_name['COLUMN_NAME'] ?></th>
                            <?php endforeach; ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($arr_sliced_data as $key => $value) {
                        ?>
                            <tr>
                                <!-- <th>
                                    <div class="table_check_box_wrap">
                                        <span class="custom_checkbox_wrap">
                                            <input type="checkbox" name="checkbox" id="terms_and_conditions">
                                            <span class="custom_checkbox"><img src="https://www.yaaracars.com/assets/img/tick_icon.svg" alt=""></span>
                                        </span>
                                    </div>
                                </th> -->
                                <?php
                                foreach ($arr_sliced_col as $k => $v) { ?>
                                    <?php if ($v['COLUMN_NAME'] === 'Content'): ?>
                                        <td class="table_data_text post_title_td">
                                            <textarea name="brand_Mod_ID" disabled rows="2"><?php echo  $value[$v['COLUMN_NAME']]; ?> </textarea>
                                            <!-- <div  class="hidden"><?php // echo  $value[$v['COLUMN_NAME']]; 
                                                                        ?></div> -->
                                        </td>
                                    <?php elseif ($v['COLUMN_NAME'] === 'Brand_logo'): ?>
                                        <td class="table_data_text post_title_td custom_els logo_td">
                                            <div class="img_wrap"><img src="https://uae.yaaracars.com/assets/img/logo/<?php echo $value[$v['COLUMN_NAME']]; ?>" alt=""> </div>
                                        </td>
                                    <?php else: ?>
                                        <td class="table_data_text post_title_td">
                                            <input type="text" name="brand_Mod_ID" value="<?php echo  $value[$v['COLUMN_NAME']]; ?>" disabled>
                                            <!-- <div class="hidden"><?php // echo  $value[$v['COLUMN_NAME']]; 
                                                                        ?></div> -->
                                        </td>
                                    <?php endif; ?>

                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example" class="overflow_scroll table_page_nav">
                <ul class="pagination">
                    <li class="page-item <?php echo ($count_data < 1) ?  "d-none" : ""; ?>"><a class="page-link" href="<?php echo (!empty($_SERVER['QUERY_STRING']))? $_SERVER['SCRIPT_URI'].'?'.$_SERVER['QUERY_STRING'].'&page='. $page - 1:'?page='.$page - 1; ?>">Previous</a></li>
                    <?php
                    for ($i = 1; $i <= $count_data; $i++) {
                    ?>
                        <li class="page-item"><a class="page-link <?php echo ($page == $i)? "active_page": '' ?>" href=" <?php echo (!empty($_SERVER['QUERY_STRING']))? $_SERVER['SCRIPT_URI'].'?'.$_SERVER['QUERY_STRING'].'&page='. $i: $_SERVER['SCRIPT_URI'].'?'.'page='.$i; ?>"><?php echo $i; ?></a></li>

                    <?php } ?>
                    <li class="page-item <?php echo ($count_data < 1 || $page === $count_data) ?  "d-none" : ""; ?>"><a class="page-link" href="<?php echo (!empty($_SERVER['QUERY_STRING']))? $_SERVER['SCRIPT_URI'].'?'.$_SERVER['QUERY_STRING'].'&page='. $page + 1:'?page='.$page + 1; ?>">Next</a></li>
                </ul>
            </nav>
            

        </div>
    </form>
</section>
<!-- </div> -->


<?php include '../footer.php'; ?>