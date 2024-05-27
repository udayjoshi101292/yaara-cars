<?php

//Title to Slug
function url_slug($value){
   
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $value)));

    return rtrim($slug, '-');
}