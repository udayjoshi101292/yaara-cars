<?php 

// include 'functions-sitemap.php';

// include '../config.php';

//Car All Varient Data
$vairant_all = "SELECT * FROM yc_post";
$vairant_table_all = mysqli_query($conn, $vairant_all);
$vairant_data_all = mysqli_fetch_all($vairant_table_all, MYSQLI_ASSOC);

$all_url = [];

foreach($vairant_data_all as $url) {
    $all_url[] = site_main(' ')."/".$url['Category_Slug']."/".$url['Slug'];
}

$main = site_main()."/".$url['Category_Slug'];

$arr_ = [...$all_url];

// sitemap one for blogs
$name = 'knowledge-hub-sitemap';

sitemap_generator($name, $arr_, 'daily', '0.7');


