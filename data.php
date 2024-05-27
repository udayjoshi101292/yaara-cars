<?php 

//Car Brands
$yc_brands_table = 'SELECT * FROM yc_uae_master';

$yc_brands_data = mysqli_query($conn, $yc_brands_table);

//Car Brand Results
$yc_brands = mysqli_fetch_all($yc_brands_data, MYSQLI_ASSOC);
