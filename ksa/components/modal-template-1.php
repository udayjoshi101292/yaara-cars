<?php 

    $makeModal = $car_modal[0]['Brand']." ".$car_modal[0]['Modal'];
    $modal = $car_modal[0]['Modal'];

    $var = [];
    $fuel = [];
    $trans = [];

    foreach($car_modal as $car_var) {
        $var[] = $car_var['Variant'];
        $fuel[] = $car_var['Fuel_Type'];
        $trans[] = $car_var['Transmission'];
    }   

    $new_trans = array_unique($trans); 
    $new_fuel =  array_unique($fuel);

    $first_ = reset($car_modal);
    $last_ = end($car_modal);

    $safety_final_keys = safety($conn, $first_);
    $interior_final_keys = interior($conn, $first_);
    $exterior_final_keys = exterior($conn, $first_);

    // print_r($first_);

    ?>

    <p><strong>Price: </strong><?php echo $makeModal ?> starts from <?php echo $first_['Price']; ?> onwards.</p>
    
    <p><strong>Variants: </strong><?php echo $makeModal ?> comes in <?php echo car_count($var); ?> variants: 
    
    <span class="var-list">
    <?php foreach($var as $name){
        echo "$name<span>, </span>";
    } 
    ?>
    </span>.</p>
    

    <p><strong>Interior Features:</strong> This <?php echo $first_['Body_Type']; ?> interior features include <span class="var-list">
    <?php

    $int = [];
    $ext = [];
    $saf = [];

    foreach($exterior_final_keys as $list => $vals){
        if($first_[$list] == "Yes"){
            $ext[] = $exterior_final_keys[$list]."<span>, </span>";
        }
    }
    foreach(array_slice($ext, 0, 6) as $e){
        echo $e;
    }
    ?>
    </span>.</p>
    
    <p><strong>Exterior Features:</strong> Some of the <?php echo $modal; ?> exterior features are 
    <span class="var-list">
    <?php
    foreach($interior_final_keys as $list => $vals){
        if($first_[$list] == "Yes"){
            $int[] = $interior_final_keys[$list]."<span>, </span>";
        }
    }
    foreach(array_slice($int, 0, 6) as $i){
        echo $i;
    }
    ?>
    </span>.</p>
    
    <p><strong>Safety Features:</strong> <?php echo $makeModal; ?> offers a list of safety features like 
    <span class="var-list">
    <?php
    foreach($safety_final_keys as $list => $vals){
        if($first_[$list] == "Yes"){
            $saf[] = $safety_final_keys[$list]."<span>, </span>";
        }
    }
    foreach(array_slice($saf, 0, 6) as $s){
        echo $s;
    }

    ?>
    </span>.</p>