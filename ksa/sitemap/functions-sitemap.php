<?php

function url_slug($value){
   
  $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $value)));

  return rtrim($slug, '-');
}


function sitemap_generator($name, $urls, $frequency = 'hourly', $priority = '0.9') {

    $xmlString = '<?xml version="1.0" encoding="UTF-8"?>
      <urlset
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
  
    foreach ($urls as $key => $url) {
      $xmlString .=  '<url><loc>'.htmlspecialchars($url, ENT_XML1, 'UTF-8').'</loc><lastmod>'.date('c').'</lastmod><changefreq>'.$frequency.'</changefreq><priority>'.$priority.'</priority></url>';
    }
  
    $xmlString .= '</urlset>';
  
    $dom = new DOMDocument;
    $dom->preserveWhiteSpace = true;
    $dom->loadXML($xmlString);  
    $dom->save("../$name.xml");
  
    return "$name.xml";
  }
  

  function main_sitemap_generator($sitemaps) {

    $xmlString = '<?xml version="1.0" encoding="UTF-8"?>
      <sitemapindex
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:mobile="http://www.google.com/schemas/sitemap-mobile/1.0"
        xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">';
  
    foreach ($sitemaps as $key => $sitemap) {
      $xmlString .=  '<sitemap><loc>'.$sitemap.'</loc><lastmod>'.date('c').'</lastmod></sitemap>';
    }
  
    $xmlString .= '</sitemapindex>';
  
  
    $dom = new DOMDocument;
    $dom->preserveWhiteSpace = false;
    $dom->loadXML($xmlString);
    $dom->save("../sitemap.xml");
  }