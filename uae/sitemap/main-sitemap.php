<?php

$allXmlPaths = dirname(__FILE__, 2) . '/*.xml';

$files = glob($allXmlPaths);

$sitemap = [];

foreach ($files as $f) {
    $fileName = end(explode('/', $f));

    if (str_replace('../', '', $f) != 'sitemap.xml') {
        if ($fileName !== 'sitemap.xml') {

            $sitemap[] = site_url('') . "/" . end(explode('/', $f));
        }
    }
}

main_sitemap_generator($sitemap);
