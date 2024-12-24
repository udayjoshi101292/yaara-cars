
<?php

require_once 'config.php';


if (isset($_POST) && !empty($_POST)) {


    if (array_key_exists("brands", $_POST) && !empty($_POST["brands"]) && strcasecmp($_POST["brands"], 'Model') === 0) {
        $brandArr = array();
        $sql = 'SELECT * FROM yc_master WHERE yc_master.location = "UAE" ORDER BY yc_master.Brand ASC';
        $listbrand = mysqli_query($conn, $sql);

        if ($listbrand->num_rows > 0) {
            while ($rows = $listbrand->fetch_assoc()) {
                $brandArr[$rows['Master_ID']] = array();
                $brandArr[$rows['Master_ID']]['id'] = $rows['Master_ID'];
                $brandArr[$rows['Master_ID']]['brand'] = $rows['Brand'];
                $brandArr[$rows['Master_ID']]['slug'] = $rows['Brand_Slug'];
                // $brandArr[$rows['Master_ID']]['site_url'] = site_url(null);
            }
        }
        // print_r($brandArr);
        echo json_encode($brandArr);
    }
   
   
    if (array_key_exists("selectedBrand", $_POST) && !empty($_POST["selectedBrand"])) {
        $brandArr = array();
        $id = intval($_POST['selectedBrand']);
       
        $sql = "SELECT * FROM yc_modal WHERE Brand_ID = '$id' ORDER BY Modal ASC";
       
        $listbrand = mysqli_query($conn, $sql);

        if ($listbrand->num_rows > 0) {
            while ($rows = $listbrand->fetch_assoc()) {
                // print_r($rows);
                $brandArr[$rows['Mod_ID']] = array();
                $brandArr[$rows['Mod_ID']]['id'] = $rows['Mod_ID'];
                $brandArr[$rows['Mod_ID']]['slug'] = $rows['Modal_Slug'];
                $brandArr[$rows['Mod_ID']]['name'] = $rows['Modal'];
            }
        }

        // print_r($brandArr);
        echo json_encode($brandArr);
    }
}
