<?php // include "config.php"; ?>
<?php include "function.php"; ?>

<?php
if(isset($_POST) && !empty($_POST)){

$brand_id_data = $_POST['data_id'];
$modal_data = get_brands_data($conn, $brand_id_data, 'yc_modal.Modal_Slug');
$modal_arr = [];
foreach($modal_data as $key ){
    $payload = array();
    $payload['name'] = $key['Modal'];
    $payload['value'] = $key['Modal_Slug'];
array_push($modal_arr, $payload);
}
$json_modal_data = json_encode($modal_arr);
echo $json_modal_data;
}
?>

