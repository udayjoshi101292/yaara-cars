
<?php

require_once 'config.php';
include 'yaara_fun.php';

$allcars = all_cars($conn);
function sortByBrand($a, $b) {
    return strcmp($a['brand'], $b['brand']);
}



if (isset($_POST) && !empty($_POST)) {


    if (array_key_exists("brands", $_POST) && !empty($_POST["brands"]) && strcasecmp($_POST["brands"], 'Model') === 0) {
        /*
        $brandArr = array();
        $sql = 'SELECT * FROM yc_master WHERE yc_master.location = "UAE" ORDER BY yc_master.Brand ASC';
        $listbrand = mysqli_query($conn, $sql);

        if ($listbrand->num_rows > 0) {

            $allmodels = array();

            while ($rows = $listbrand->fetch_assoc()) {
                $data = array();
                $data['id'] = $rows['Master_ID'];
                $data['brand'] = $rows['Brand'];
                $data['slug'] = $rows['Brand_Slug'];
                // $brandArr[$rows['Master_ID']]['site_url'] = site_url(null);

                array_push($brandArr, $data);
            }
        }
        // print_r($brandArr);
        echo json_encode($brandArr);
        */

        $DATA = array();
        if (!empty($allcars)) {
        
            foreach ($allcars as $car) {
                if ((array_key_exists('Location', $car) && strcasecmp($car['Location'], 'KSA') === 0)) {
                    if(!array_key_exists($car['Master_ID'],$DATA)){
                        // $data = array();
        
                        $DATA[$car['Master_ID']] = array();
                    }
                    $DATA[$car['Master_ID']]['id'] = $car['Master_ID'];
                    $DATA[$car['Master_ID']]['brand'] = $car['Brand'];
                    $DATA[$car['Master_ID']]['slug'] = $car['Brand_Slug'];
                    
                  
                    
                }
            }
          
            if(!empty($DATA)){
                usort($DATA, 'sortByBrand');
            }
            
        }
        echo json_encode($DATA);
    }


    if (array_key_exists("selectedBrand", $_POST) && !empty($_POST["selectedBrand"])) {
        $brandArr = array();
        $id = intval($_POST['selectedBrand']);

        $sql = "SELECT * FROM yc_modal WHERE Brand_ID = '$id' AND Status_Modal = 'Publish' GROUP BY Modal ORDER BY Modal ASC";

        $listbrand = mysqli_query($conn, $sql);

        if ($listbrand->num_rows > 0) {
            $discontinuedArray = array();
            while ($rows = $listbrand->fetch_assoc()) {
                // print_r($rows);
                $hasVariations = getData($conn, $rows['Mod_ID'], 'yc_engine', 'Var_ID', null, true);

                foreach ($hasVariations as $mod_id) {

                    // petrol type
                    $thisVariationPrice =  getData($conn, $mod_id, 'yc_engine', 'Price', true, null, 'Var_ID');

                    if (strcasecmp($thisVariationPrice, 'DISCONTINUED') == 0) {
                        $ID =  getData($conn, $mod_id, 'yc_engine', 'Modal_ID', true, null, 'Var_ID');
                        array_push($discontinuedArray, $ID);
                    }
                }
                $brandArr[$rows['Mod_ID']] = array();

                $brandArr[$rows['Mod_ID']]['id'] = $rows['Mod_ID'];
                $brandArr[$rows['Mod_ID']]['slug'] = $rows['Modal_Slug'];
                $brandArr[$rows['Mod_ID']]['name'] = $rows['Modal'];
            }

            if (!empty($discontinuedArray)) {

                foreach ($discontinuedArray as $removeValue) {
                    unset($brandArr[$removeValue]);
                }
            }
        }

        // print_r($brandArr);
        echo json_encode($brandArr);
    }
}
