<?php 

//Get ID from url
$ID = $_GET['id'];

$url_check = $_GET['url'];

if($url_check != null){
    $car_slug = explode('/', trim($_GET['url'],'/'));
} else {
    $car_slug = [''];
}

//Car All Varient Data
$vairant_all = "SELECT yc_master.*, yc_modal.*, yc_engine.*, yc_exterior.*, yc_features.* , yc_interior.*, yc_measurement.*, yc_safety.* FROM yc_master 
INNER JOIN yc_modal ON yc_master.Master_ID = yc_modal.Brand_ID 
INNER JOIN yc_engine ON yc_modal.Mod_ID = yc_engine.Modal_ID 
INNER JOIN yc_exterior ON yc_engine.Var_ID = yc_exterior.Variant_ID 
INNER JOIN yc_features ON yc_engine.Var_ID = yc_features.Variant_ID 
INNER JOIN yc_interior ON yc_engine.Var_ID = yc_interior.Variant_ID 
INNER JOIN yc_measurement ON yc_engine.Var_ID = yc_measurement.Variant_ID 
INNER JOIN yc_safety ON yc_engine.Var_ID = yc_safety.Variant_ID WHERE yc_engine.Price != 'Discontinued'";
$vairant_table_all = mysqli_query($conn, $vairant_all);
$vairant_data_all = mysqli_fetch_all($vairant_table_all, MYSQLI_ASSOC);

    
//Variable Naming
$car_list = $vairant_data_all;






