<?php

include 'config.php';



// $conn = $connection;

//Title to Slug
function url_slug($value)
{

    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $value)));

    return rtrim($slug, '-');
}

// POST data insert/Update 
function post_insert_update($conn){

    echo $_POST['mata_title'];
    // print_r($_POST);
    $post_page_title = $_POST['post_page_title'];
    $post_slug = url_slug($post_page_title);
    $post_excerpt_content = mysqli_escape_string($conn, $_POST['excerpt_content']);
    $post_textarea_content = mysqli_escape_string($conn, $_POST['post_textarea_content']);
    $post_textarea_content = $conn->real_escape_string($_POST['post_textarea_content']);
    $post_status = $_POST['form_page_status'];
    $post_status_date = $_POST['form_page_data'];
    $post_author = $_POST['post_author_select'];
    $post_mata_title = $_POST['mata_title'];
    $post_mata_desc = $_POST['mata_desc'];
    $post_featured_img = $_FILES['0']['post_featured_img'];
    $file_name = 'post_featured_img';
    $file_input_name = 'post_featured_img';
    $post_category = $_POST['category_val'];
    $post_category_slug = $_POST['category_slug_value'];
    $post_quote_content = mysqli_escape_string($conn, $_POST['quote_content']);
    $post_select_brand = $_POST['post_brand_select'];
    $post_brand_slug = $_POST['category_brand_slug'];
    $post_select_modal = $_POST['post_modal_select'];
    $page_id_ = $_POST['hidden_input_for_page_id'];

    echo $post_status;
    // echo "<br>";
    // echo $post_textarea_content;


    $num_words = 101;
    $words = array();
    $words = explode(" ", $post_textarea_content, $num_words);
    $shown_string = "";
    $content_word;
    if (count($words) == 101) {
        $words[100] = " ... ";
    }

    $shown_string = implode(" ", $words);

    // Fullback content 
    $post_excerpt_content = chack_post_value($post_excerpt_content, "");
    $post_textarea_content = chack_post_value($post_textarea_content, "Textarea Content");
    $post_mata_title = chack_post_value($post_mata_title, $post_page_title);
    $post_mata_desc = chack_post_value($post_mata_desc, strip_tags($shown_string));
    $post_category = chack_post_value($post_category, "News");
    $post_category_slug = chack_post_value($post_category_slug, "car-news");

    // if($post_excerpt_content === '' && $post_textarea_content === '' && $post_mata_title === '' && $post_mata_desc === '' ){
    //     $post_excerpt_content = "Excerpt Content";
    //     $post_textarea_content = "Textarea Content";
    //     // $post_mata_title = "Meta Title Here";
    //     // $post_mata_desc = "Meta Description";
    // }

    if (!$page_id_) {
        // INSERT POST
        // echo "Insert POST";
        $upload_var = upload_file($file_input_name);

        $insart_data = "INSERT INTO yc_post ( Title, Slug, Author_ID, Excerpt, Status, Date, Category, Category_Slug, Quote, Content, Image, Brand, Brand_Slug, Modal, Meta_Title, Meta_Desc) VALUES ( '$post_page_title','$post_slug','$post_author', '$post_excerpt_content','$post_status', '$post_status_date', '$post_category', '$post_category_slug','$post_quote_content','$post_textarea_content', '$upload_var', '$post_select_brand','$post_brand_slug', '$post_select_modal', '$post_mata_title', '$post_mata_desc')";
        $result = mysqli_query($conn, $insart_data);
        if ($result) {
            // echo 'Record INSERTED successfully';
            header('Location:' . $_SERVER['PHP_SELF'] . '?id=' . $page_id_);
        } else {
            $err = mysqli_error($conn);
            echo "Can't INSERTED Record --> $err";
        }
    } else {
        // UPDATE POST
        // echo " Update POST ";
        $post_slug = url_slug($_POST['page_title']);
        // echo " <a href='https://beingdigitalz.co.in/demo/yaara/login//edit-post.php'> Listing Page </a>  ";
        $upload_var = upload_file($file_input_name);
        $insart_data = "UPDATE  yc_post  SET Title = '$post_page_title', Slug = '$post_slug', Author_ID = '$post_author', Excerpt = '$post_excerpt_content', Status = '$post_status', Date= '$post_status_date', Category = '$post_category', Category_Slug = '$post_category_slug', Quote = '$post_quote_content', Meta_Title = '$post_mata_title',  Content= '$post_textarea_content' ";

        if (!is_null($upload_var) && !empty($upload_var)) {
            $insart_data .= ", Image = '$upload_var' ";
        }
        $insart_data .= ", Brand = '$post_select_brand', Brand_Slug = '$post_brand_slug', Modal = '$post_select_modal', Meta_Title = '$post_mata_title', Meta_Desc = '$post_mata_desc' ";
        $insart_data .= "WHERE `ID` = '$page_id_'";
        $result = mysqli_query($conn, $insart_data);
        if ($result) {
            $aff = mysqli_affected_rows($conn);
            // echo $aff .' Record affected successfully';
            header('Location:' . $_SERVER['PHP_SELF']);
        } else {
            $err = mysqli_error($conn);
            echo "Can't Update Record --> $err";
        }
    }
}


// FAQ UPDATE / INSERT
function faq_insert_update($data, $conn)
{
    // include 'config.php';

    // $x = $_POST[''];
    // faq_name_fun();
    // print_r($x);
    // echo $x;
    // echo "function.php";


    $data = mysqli_escape_string($conn, $data);

    $faq_row = 'UPDATE yc_pages SET `Content` = "' . $data . '"  WHERE ID=1';
    $result = mysqli_query($conn, $faq_row);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Fetch faq data for CMS
function fatchFaqData($conn)
{
    // include 'config.php';

    $sql = "SELECT * FROM yc_pages WHERE ID=1";
    $result = mysqli_query($conn, $sql);
    // print_r($result);
    $faq_date_from_single_row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $faq_date_from_single_row[0]['Content'];
    // print_r($faq_date_from_single_row);
}
// DELETE faq row 
function del_lead_row($conn)
{

    if (isset($_POST['trash-button'])) {
        $clicked_btn_data = $_POST['del_input'];
        $sql = "DELETE FROM yc_leads WHERE ID =" . $clicked_btn_data;
        $result = mysqli_query($conn, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

// Get All and Single blog data from database 
function blog_data($conn, $id = '')
{
    if ($id == '') {
    } else {
        $ID =  "WHERE ID = '$id'";
    }
    $yc_post_table = "SELECT * FROM yc_post $ID";
    $query_yc_post_table  = mysqli_query($conn, $yc_post_table);

    if ($id == '') {
        $yc_post_fatched = mysqli_fetch_all($query_yc_post_table, MYSQLI_ASSOC);
    } else {
        $yc_post_fatched = mysqli_fetch_assoc($query_yc_post_table);
    }

    return $yc_post_fatched;
}

// Get data for brand/modal in new-blogs.php dropdown  
function get_brands_data($conn, $where = null, $group_by = null)
{
    $yc_brands = 'SELECT yc_modal.*, yc_master.* FROM yc_modal INNER JOIN yc_master on yc_master.Master_ID = yc_modal.Brand_ID';
    if (!is_null($where)) {
        $yc_brands .= ' WHERE brand_id = ' . $where;
    }

    $yc_brands .= ' GROUP by ';
    if (!is_null($group_by)) {
        $yc_brands .= $group_by;
    } else {
        $yc_brands .= ' yc_master.Brand';
    }

    $yc_brands .= ' ORDER BY yc_master.Brand';



    $result = mysqli_query($conn, $yc_brands);
    if ($result->num_rows > 0) {
        $yc_brands_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $yc_brands_data;
    } else {
        return false;
    }
}

function page_data($conn, $ID = '')
{

    if ($ID != '') {
        $ID_ = $ID;
        $page_single = "WHERE ID = '$ID_'";
    } else {
        $ID = '';
    }

    $all_pages = "SELECT * FROM yc_pages $page_single ORDER BY Date DESC";
    $pages = mysqli_query($conn, $all_pages);
    // $result = mysqli_fetch_all($pages, MYSQLI_ASSOC);

    if ($ID == '') {
        $result = mysqli_fetch_all($pages, MYSQLI_ASSOC);
    } else {
        $result = mysqli_fetch_assoc($pages);
    }

    return $result;
}

// Check Post value for empty and add Default 
function chack_post_value($item, $item_value)
{
    if (empty($item)) {
        $item = $item_value;
        return $item;
    } else {
        return $item;
    }
}

function blog_cat($post)
{

    $cat_name = [];
    $cat_slug = [];
    $cat_arry_ = [];
    $cat_arry_slug = [];
    foreach ($post as $kay) {

        $cat_name_ = explode(',', $kay['Category']);
        $cat_slug_ = explode(',', $kay['Category_Slug']);

        if (count($cat_name_) > 1) {
            foreach ($cat_name_ as $x) {
                $cat_arry_[] = trim($x);
            }
            foreach ($cat_slug_ as $x) {
                $cat_arry_slug[] = trim($x);
            }
        } else {
            $cat_name[] = trim(implode('', $cat_name_));
            $cat_slug[] = trim(implode('', $cat_slug_));
        }
    }

    $arr_ = [...$cat_name, ...$cat_arry_];
    $cat_list = array_unique($arr_);

    $arr_slug = [...$cat_slug, ...$cat_arry_slug];
    $cat_list_slug = array_unique($arr_slug);

    $cat_all = array_combine($cat_list, $cat_list_slug);

    return $cat_all;
}

// UAE/KSA Home Update
function uae_ksa_home($conn, $location = null, $get_data = false)
{
    if (isset($_POST['Update-post'])) {
        // echo "SEND DATA";
        // echo "<pre>";    	
        // print_r($_POST);
        // echo "</pre>";    

        $banner_data = home_banner_array($conn);
        $popular_car_varient_id = explode_arr($_POST['popular_cars_select'], 1);
        $electric_car_varient_id = explode_arr($_POST['electric_cars_select'], 1);
        $uae_home_arr = [
            "section_banner" => $banner_data,
            "section_popular_cars" => [
                "title" => $_POST['popular-brands-section-title'],
                "cars" => $_POST['popular_cars_select'],
                "car_varient_id" => $popular_car_varient_id,
                "item_count" => (is_array($_POST['popular_cars_select']) && !empty($_POST['popular_cars_select'])) ?  count($_POST['popular_cars_select']) : 0
            ],
            "latest_electric_cars" => [
                "title" => $_POST['electric_cars_title'],
                "cars" => $_POST['electric_cars_select'],
                "car_varient_id" => $electric_car_varient_id,
                "item_count" => (is_array($_POST['electric_cars_select']) && !empty($_POST['electric_cars_select'])) ?  count($_POST['electric_cars_select']) : 0
            ]
        ];



        // upload_file('banner_img')
        $uae_home_db_data = trim(array_to_json($uae_home_arr));
        $escapedContent = str_replace("'", "\'", $uae_home_db_data);

        $insert_data = "UPDATE yc_pages SET Content = ' $escapedContent' WHERE Template = '$location'";
        $result = mysqli_query($conn, $insert_data);

        ($result) ? header('Location: ' . $_SERVER['HTTP_REFERER'], true, 301) : '';
    }

    //    Get data 
    if ($get_data) {
        $page_all = page_data($conn, $_GET['id']);
        $single = $page_all;
        $content = json_decode($single['Content'], true);
        return $content;
    }
}
// About Us Update
function about_us($conn, $get_data = false)
{
    if (isset($_POST['Update-post'])) {

        $aboutPage_arr = array(
            "about_page_title" => array("page_title" => $_POST['post_page_title'], "page_slug" => $_POST['page_title']),
            "banner_section" => array("Image" => upload_file('banner_img'), 'title' => $_POST['banner-title'], 'sub_title' => $_POST['banner-sub-title']),
            "short_desc_about_yaara" => array("title" => $_POST['short_desc_about_yaara_title'], 'content' => $_POST['short_desc_about_yaara_content']),
            "customer_collaboration_section" => array(
                "customer_journey" => array("Title" => $_POST['customer_journay_title'], "sub_title" => $_POST['customer_journay_sub_title'], "content" => $_POST['customer_journay_content']),
                "torque_collaboration" => array("Title" => $_POST['Torque_title'], "sub_title" => $_POST['Torque_sub_title'], "content" => $_POST['Torque_content'])
            ),
            "yaaraCars_revolution" => array("Title" => $_POST['yaaraCars_revolution_title'], "sub_title" => $_POST['yaaraCars_revolution_sub_title'], "content" => $_POST['yaaraCars_revolution_content']),
            "update_status" => array('status' => $_POST['form_page_status']),
            "data_status" => array('data' => $_POST['form_page_data'])
        );

        // upload_file('banner_img')
        $about_db_data = trim(array_to_json($aboutPage_arr));
        $escapedContent = str_replace("'", "\'", $about_db_data);

        $insert_data = "UPDATE yc_pages SET Content = ' $escapedContent' WHERE Title = 'About' ";
        $result = mysqli_query($conn, $insert_data);
    }

    //    Get data 
    if ($get_data) {
        $fatch_data = 'SELECT * FROM `yc_pages` WHERE Title = "About"';
        $data = mysqli_query($conn, $fatch_data);
        $final_data = mysqli_fetch_all($data, MYSQLI_ASSOC);
        $fatch_data = json_decode($final_data[0]['Content'], true);
        return $fatch_data;
    }
}




// Single img upload 
function upload_file($x, $isPost = false, $fileArray = null){
    $file = $_FILES[$x];

    if (!is_null($fileArray)) {
        $file = $fileArray;
    }


    $fileName = $file['name'];
    $filetype = $file['type'];
    $error = $file['error'];
    $fileTmpName = $file['tmp_name'];
    $file_baseNmae = $fileName;
    // $file_path = $_SERVER['DOCUMENT_ROOT']."/demo/yaara/assets/img/post/testing";
    $file_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/dummy-img/';
    // if($isPost === false){

    //     $file_path = $_SERVER['DOCUMENT_ROOT']."/login/testing/"; 
    // } 
    // else{

    //     $file_path = $_SERVER['DOCUMENT_ROOT']."/login/testing/"; 
    // }

    // echo $file_path;
    // exit;


    // excluding file extension from file name 
    $fileExt =  explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowedType = array('jpg', 'png', 'jpeg');


    if (in_array($fileActualExt, $allowedType)) {
        // echo "File type True";
        // check if file exists 
        $filePath = $file_path . $fileName;

        if (file_exists($filePath)) {
            $uniq_id = uniqid('', false);
            $file_baseNmae = $uniq_id . basename($fileName);
            // echo $file_baseNmae;
            // print_r($_FILES);

            $target_dir = $file_path;
            $target_file = $target_dir . basename($file_baseNmae);

            if (move_uploaded_file($fileTmpName, $target_file)) {
                // echo "<br>Uploaded <br>";
            } else {
                // echo '<br>Not uploaded <br>';
            }
        } else {
            $target_dir = $file_path;
            $target_file = $target_dir . basename($fileName);

            if (move_uploaded_file($fileTmpName, $target_file)) {
                // echo "<br>Uploaded <br>";
            } else {
                // echo '<br>Not uploaded <br>';
            }
        }
    } else {
        // echo "File type Not accepted ";
    }



    // if (!in_array($fileActualExt, $allowedType)) {
    //     return "File type Not ACCEPTED ! Please upload file with ". join(',',$allowedType);
    // }

    // echo $file_baseNmae;

    return $file_baseNmae;
}





// UAE/KSA banner array 
function home_banner_array($conn)
{
    // if(isset($_POST['Update-post'])){

    $date_d = get_file_names($conn);

    // echo "<pre>";
    // print_r($date_d);
    // echo "+++++++++++";
    // print_r($_FILES);
    // echo "</pre>";
    $bannerElementas = array();


    


    /***
     * 
     * Count Files and Create Images Array Temp
     * 
     */

    $FilesTempArray = $_FILES['home_banner-img'];
    if(is_countable($_FILES['home_banner-img']['name'])){
        $FilesTempCount = count($_FILES['home_banner-img']['name']);

        unset($_FILES['home_banner-img']);
        for ($i = 0; $i < $FilesTempCount; $i++) {
            $_FILES['home_banner-img--'.$i] = array();
            $_FILES['home_banner-img--'.$i]['name'] = $FilesTempArray['name'][$i];
            $_FILES['home_banner-img--'.$i]['full_path'] = $FilesTempArray['full_path'][$i];
            $_FILES['home_banner-img--'.$i]['type'] = $FilesTempArray['type'][$i];
            $_FILES['home_banner-img--'.$i]['tmp_name'] = $FilesTempArray['tmp_name'][$i];
            $_FILES['home_banner-img--'.$i]['error'] = $FilesTempArray['error'][$i];
            $_FILES['home_banner-img--'.$i]['size'] = $FilesTempArray['size'][$i];
        }
    }
    // Mobile 
    $FilesTempArray_mobile = $_FILES['home_banner-img-mobile'];
    if(is_countable($_FILES['home_banner-img-mobile']['name'])){
        $FilesTempCount = count($_FILES['home_banner-img-mobile']['name']);

        unset($_FILES['home_banner-img-mobile']);
        for ($i = 0; $i < $FilesTempCount; $i++) {
            $_FILES['home_banner-img-mobile--'.$i] = array();
            $_FILES['home_banner-img-mobile--'.$i]['name'] = $FilesTempArray_mobile['name'][$i];
            $_FILES['home_banner-img-mobile--'.$i]['full_path'] = $FilesTempArray_mobile['full_path'][$i];
            $_FILES['home_banner-img-mobile--'.$i]['type'] = $FilesTempArray_mobile['type'][$i];
            $_FILES['home_banner-img-mobile--'.$i]['tmp_name'] = $FilesTempArray_mobile['tmp_name'][$i];
            $_FILES['home_banner-img-mobile--'.$i]['error'] = $FilesTempArray_mobile['error'][$i];
            $_FILES['home_banner-img-mobile--'.$i]['size'] = $FilesTempArray_mobile['size'][$i];
        }
    }

    /**
     * 
     * Uploading And Moving Images
     * 
     */
    $files = array();
    for ($i = 0; $i < count($_FILES); $i++) {

        $ImageName = $_FILES['home_banner-img--' . $i]['name'];

        /***
         * 
         * If image field is not empty and not null
         * 
         */
        if (!empty($ImageName) || !is_null($ImageName)) {
            echo $ImageName;
            $img_upload = upload_file($ImageName, false, $_FILES['home_banner-img--' . $i]);
            $files[$i] = $img_upload;
        } else {

            $files[$i] = '';
        }
    }
    // Mobile 
    $files_mobile = array();
    for ($i = 0; $i < count($_FILES); $i++) {

        $ImageName = $_FILES['home_banner-img-mobile--' . $i]['name'];

        /***
         * 
         * If image field is not empty and not null
         * 
         */
        if (!empty($ImageName) || !is_null($ImageName)) {
            echo $ImageName;
            $img_upload = upload_file($ImageName, false, $_FILES['home_banner-img-mobile--' . $i]);
            $files_mobile[$i] = $img_upload;
        } else {
            $files_mobile[$i] = '';
        }
    }


    /****
     * 
     * 
     * Post Count Banner Required Title
     * 
     */

    $BannerTitleCount = $_POST['home_banner-title'];
    if (is_countable($BannerTitleCount)) {
        for ($i = 0; $i < count($BannerTitleCount); $i++) {
            $bannerElementas[$i] = array();
            $bannerElementas[$i]['title'] = $_POST['home_banner-title'][$i];
            $bannerElementas[$i]['sub-title'] = $_POST['home_banner-sub-title'][$i];
            $bannerElementas[$i]['cta-text'] = $_POST['home_banner-cta-text'][$i];
            $bannerElementas[$i]['cta-link'] = $_POST['home_banner-cta-link'][$i];
            $bannerElementas[$i]['overlay-text'] = $_POST['home_banner-overlay-text'][$i];
            // $bannerElementas[$i]['image'] = !empty($_POST['home-banner-hidden-image'][$i]) ? $_POST['home-banner-hidden-image'][$i] : $files[$i];

            if (empty($files[$i])) {
                $bannerElementas[$i]['image'] = $date_d['section_banner'][$i]['image'];
            } else {
                $bannerElementas[$i]['image'] = $files[$i];
            }
            // Mobile 
            if (empty($files_mobile[$i])) {
                $bannerElementas[$i]['mobile-banner-image'] = $date_d['section_banner'][$i]['mobile-banner-image'];
            } else {
                $bannerElementas[$i]['mobile-banner-image'] = $files_mobile[$i];
            }
        }
    }


    /***
     * 
     * 
     * Get Images Data From Db
     * 
     */
    $SectionsBanner = $date_d['section_banner'];
    $inDbImages = array();
    // echo "<pre>";
    $deleteValuesString = $_POST['home_banner-deleteValues'];
    if(!empty($deleteValuesString)){
        $deleteValues = explode(',',$deleteValuesString );
        $deleteValues = array_map('intval', $deleteValues);
        asort($deleteValues);
        foreach ($deleteValues as $key => $value) {
            
            
            if(array_key_exists($value, $SectionsBanner)){
                unset($SectionsBanner[$value]);
                
            }


        }

        $bannerElementas = $SectionsBanner;
    }
    // print_r($SectionsBanner);
    // print_r($bannerElementas);
    
    // echo "</pre>";


    // exit();


    return $bannerElementas;


}









function get_file_names($conn)
{
    $page_all = page_data($conn, $_GET['id']);
    $single = $page_all;
    $content = json_decode($single['Content'], true);
    return $content;
}
// Array to json 
function array_to_json($theArray)
{
    $json_data = json_encode($theArray);
    return $json_data;
}

//Page Template 
function page_template($file_name, $db_template = '')
{

    $searchfor = 'Template Name:';
    $path_ = [];
    $page_naming = [];

    $dir = array_diff(scandir($file_name, 1), ['.', '..', '.txt']);


    foreach ($dir as $d) {

        // the following line prevents the browser from parsing this as HTML.
        header('Content-Type: text/plain');
        // get the file contents, assuming the file to be readable (and exist)
        $contents = file_get_contents($file_name . $d);
        // escape special characters in the query
        $pattern = preg_quote($searchfor, '/');
        // finalise the regular expression, matching the whole line
        $pattern = "/^.*$pattern.*\$/m";

        // search, and store all matching occurences in $matches
        if (preg_match_all($pattern, $contents, $matches)) {
            $page_temp = implode("\n", $matches[0]);

            $temp_name = substr($page_temp, strpos($page_temp, ":") + 1);
            $temp_n = str_replace('?>', '', $temp_name);

            $page_naming[] = trim($temp_n);
            $path_[] = trim($d);
        } else {
            $page_naming[] = 'Default';
            $path_[] = 'page.php';
        }
    }

    $final_ = array_combine($page_naming, $path_);

    $name_temp;
    $path_temp;

    foreach ($final_ as $key => $value) {
        if ($key == $db_template) {
            $name_temp = $key;
            $path_temp = $value;
        }
    }

    if ($name_temp) {
        return $output = [
            'template' => $name_temp,
            'path' => $path_temp
        ];
    } else {
        return $output = [
            'template' => 'Default',
            'path' => 'page.php'
        ];
    }
}

// Get Brand/Modal/Price Data 
function brand_modal($conn, $location)
{

    $brand_modal_all = "SELECT yc_master.Brand, yc_master.Master_ID, yc_modal.Modal,yc_modal.Mod_ID, yc_engine.Price FROM yc_master 
    INNER JOIN yc_modal ON yc_master.Master_ID = yc_modal.Brand_ID 
    INNER JOIN yc_engine ON yc_modal.Mod_ID = yc_engine.Modal_ID WHERE yc_master.Location = '$location' AND yc_engine.Price != 'discontinued' GROUP BY `Modal`";
    $brand_modal_table_all = mysqli_query($conn, $brand_modal_all);
    $brand_modal_data_all = mysqli_fetch_all($brand_modal_table_all, MYSQLI_ASSOC);

    // Brand Modal Naming
    return $brand_modal_data_all;
}

function car_data($conn, $default = array('table_name' => null)){

    //Car All Varient Data
    $vairant_all = "SELECT yc_master.*, yc_modal.*, yc_engine.*, yc_exterior.*, yc_features.* , yc_interior.*, yc_measurement.*, yc_safety.* FROM yc_master 
INNER JOIN yc_modal ON yc_master.Master_ID = yc_modal.Brand_ID 
INNER JOIN yc_engine ON yc_modal.Mod_ID = yc_engine.Modal_ID 
INNER JOIN yc_exterior ON yc_engine.Var_ID = yc_exterior.ID 
INNER JOIN yc_features ON yc_engine.Var_ID = yc_features.ID 
INNER JOIN yc_interior ON yc_engine.Var_ID = yc_interior.ID 
INNER JOIN yc_measurement ON yc_engine.Var_ID = yc_measurement.ID 
INNER JOIN yc_safety ON yc_engine.Var_ID = yc_safety.ID WHERE yc_master.Location = 'KSA'";


    if (!is_null($default['table_name'])) {
        $table_name = $default['table_name'];
        // print_r($vairant_all);
        $vairant_all = "SELECT * FROM information_schema.columns WHERE TABLE_NAME = '$table_name'";
    }

    $vairant_table_all = mysqli_query($conn, $vairant_all);
    $vairant_data_all = mysqli_fetch_all($vairant_table_all, MYSQLI_ASSOC);

    // Variable Naming
    return $vairant_data_all;
}


function all_brand($conn, $ID = null)
{

    // Car All Varient Data
    if ($ID == null) {
        $ID_ = '';
    } else {
        $ID_ = "WHERE Master_ID = '$ID'";
    }

    $vairant_all = "SELECT yc_master.* FROM yc_master $ID_";

    $vairant_table_all = mysqli_query($conn, $vairant_all);

    if ($ID == null) {
        $vairant_data_all = mysqli_fetch_all($vairant_table_all, MYSQLI_ASSOC);
    } else {
        $vairant_data_all = mysqli_fetch_assoc($vairant_table_all);
    }

    // Variable Naming
    return $vairant_data_all;
}


// explode array 
function explode_arr($the_arr, $arr_index_num)
{
    $varient_arr = array();
    foreach ($the_arr as $text_val) {
        $ex = explode('-', $text_val);
        array_push($varient_arr, $ex[$arr_index_num]);
    };
    return $varient_arr;
};
