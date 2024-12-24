<?php include 'header.php'; ?>

<?php

$brand = $car_list;

$count = [];

foreach($brand as $b){
    if($b['Brand'] != "" &&  $b['Body_Type'] != ""){
        $count[] = $b['Brand'];
    }
}

echo count($count);


echo "<pre>";
print_r(reset($brand));
// print_r($brand);
echo "</pre>";

?>


<?php include 'footer.php'; ?>