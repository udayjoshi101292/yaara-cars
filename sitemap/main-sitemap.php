<?php 

// include 'functions-sitemap.php';

// include '../config.php';

// include '../car-data.php';

$allXmlPaths = dirname(__FILE__, 2) . '/*.xml';

// $files = glob("../*.xml");

$files = glob($allXmlPaths);

$sitemap = [];

foreach($files as $f) {
    $fileName = end(explode('/',$f));

    if(str_replace('../','', $f) != 'sitemap.xml'){

        if($fileName !== 'sitemap.xml'){

            $sitemap[] = site_url('')."/".end(explode('/',$f));
        }
        

        

    }
}

// print_r($sitemap);
main_sitemap_generator($sitemap);