<?php require_once '../constants.php'; ?>
<?php require_once '../checkIsUserLoggedIn.php'; ?>
<?php
$single_page_title = "Leads";
include "../header.php";
include "../menu-sidebar.php";
// include "../config.php";
include "../function.php";

del_lead_row($conn);
$contact_data = contact_leads($conn);
// echo "<pre>";    
// print_r($contact_data);
// echo "</pre>";    

?>


<div class="row ">
    <div class="col-md-12 ">
        <h2 class="section_titles">Contact Form Leads</h2>
    </div>
</div>
<!-- <form action="../config.php" method="POST">
    <div class="row ">
        <div class="col-md-6 d-flex " style="gap: 10px;">
            <select type="submit" name="filter_date" id="" class="js-example-basic-single">
                <option value="">--Select Form--</option>
                <option value="Contact-Form">Contact Form</option>
                <option value="Advertise-Form">Advertise Form</option>
                <option value="Interested-Form">i'm Interested Form</option>
            </select>
            <button type="submit" name="Interested_From" class="btn btn-primary" >I'm Interested Form</button>
            <button type="submit" name="Contact_From" class="btn btn-primary">Contact Form</button>
            <button type="submit" name="Advertise_From" class="btn btn-primary">Advertise</button>
        </div>
    </div>
</form> -->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<div class="container-fluid section-container my-3 leads_table">
    <div class="table_wrap post_table_wrap">
        <table id="table_main_id" class="display leads_table_tag">
            <thead>
                <tr>
                    <!-- <th></th> -->
                    <!-- <th>
                        <div class="table_check_box_wrap">
                            <span class="custom_checkbox_wrap">
                                <input type="checkbox" name="checkbox" id="terms_and_conditions">
                                <span class="custom_checkbox"><img src="https://www.yaaracars.com/assets/img/tick_icon.svg" alt=""></span>
                            </span>
                        </div>
                    </th> -->
                    <th class="table_head_text ">Sr.No</th>
                    <th class="table_head_text">Name</th>
                    <th class="table_head_text">Phone</th>
                    <th class="table_head_text">Email</th>
                    <th class="table_head_text">Message</th>
                    <th class="table_head_text">Date</th>
                    <!-- <th class="table_head_text">Submitted Form</th> -->
                    <th class="table_head_text">Region</th>
                    <th class="table_head_text">Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $region_col;
                // print_r($lead_data);
                foreach ($contact_data as $yc_leads):
                    $phone_num = $yc_leads["Phone"];
                    $region_col_num = substr($phone_num, 0, 4);
                    // $region_col_num = "+971";
                    // echo $region_col_num;
                    if($region_col_num === '+971'){
                        $region_col = " UAE";
                    }elseif($region_col_num === '+966'){
                        $region_col = 'KSA';
                    }else{
                        $region_col = "Code Not defined";
                    }
                    // echo $region_col;
                    
                    // echo "<pre>";
                    // print_r($yc_leads['Submitted_from']);
                    // echo "</pre>";

                ?>
                    <tr>
                        <!-- <th></th> -->
                        <!-- <td class="table_checkbox_td">
                            <div class="table_check_box_wrap">
                                <span class="custom_checkbox_wrap">
                                    <input type="checkbox" name="checkbox" id="terms_and_conditions">
                                    <span class="custom_checkbox"><img src="https://www.yaaracars.com/assets/img/tick_icon.svg" alt=""></span>
                                </span>
                            </div>
                        </td> -->
                        <th class="table_head_text sr_no"><?php echo $no; $no = $no +1; ?></th>
                        <td class="table_data_text post_title_td">
                            <div class="post_title_wrapper">
                                <div class="post_title_holder"><?php echo $yc_leads['Name'] ?></div>
                                <!-- <div class="post_title_actions_holder">
                                    <a href="dummy-url" target="_blank">Edit</a>
                                    <a href="dummy-url" target="_blank">View</a>
                                    <a href="#" class="trash_button">Trash</a>
                                </div> -->
                            </div>
                        </td>
                        <td class="table_data_text"><a href="tel:<?php echo $yc_leads["Phone"] ?>"><?php echo $yc_leads["Phone"] ?></a></td>
                        <td class="table_data_text"><a href="mailto:<?php echo $yc_leads["Email"] ?>"><?php echo $yc_leads["Email"] ?></a></td>
                        <td class="table_data_text"><?php echo $yc_leads["Contact_Msg"] ?></td>
                        <td class="table_data_text">
                            <div class="blog_date_wrap">
                                <!-- <p class="blog_status">Published</p> -->
                                <p class="published_time"><?php echo $yc_leads["Date"] ?></p>
                            </div>
                        </td>
                        <!-- <td class="table_data_text"><?php echo $yc_leads["Submitted_from"] ?></td> -->
                        <td class="table_data_text region_col"><?php echo $region_col; ?></td>
                        <td class="table_data_text">
                        <div class="table_del_wrap">
                            <input type="hidden" name="del_input" value="<?php echo $yc_leads["ID"]?>">
                            <button type="submit" name="trash-button" class="delete_leads"><i class="fa-regular fa-trash-can"></i></button>
                        </div>
                        </td>
                        
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</form>






<?php include "../footer.php" ?>