<?php 

include 'functions-sitemap.php';

include '../config.php';

include '../car-data.php';

$files = glob("../*.xml");

$sitemap = [];

foreach($files as $f) {
    if(str_replace('../','', $f) != 'sitemap.xml'){
        $sitemap[] = site_url('')."/".str_replace('../','', $f);
    }
}

main_sitemap_generator($sitemap);