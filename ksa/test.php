<?php include 'header.php'; ?>

<?php

$brand = $car_list;

$count = [];

foreach($brand as $b){
    if($b['Cylinders'] != ""){
        $count[] = $b['Cylinders'];
    }
}

echo count($count);


echo "<pre>";
print_r(reset($brand));
// print_r($brand);
echo "</pre>";

?>


<?php include 'footer.php'; ?>