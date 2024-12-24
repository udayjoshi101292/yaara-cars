<?php
include './cars/temp-function.php';

if(isset('export_btn')){
    
    $table_names = explode('-', $_POST['table-name']);
    // print_r($table_names);
    $column_name = header_data($conn, $default = array('table_name' => 'yc_master'));
    $data = get_data_data_testing($conn, $table_names[0], $table_names[1], null, null, null, null, null);
    
    $column_names = array();
    foreach ($column_name as $name){
        array_push($column_names, $name['COLUMN_NAME']);
    }
    
    
    array_unshift($data , $column_names);
    
    function export_data($file_name = 'file', $the_data = array()){
        // $the_data = array(
        //     array("aaa", "bbb", "ccc", "dddd"),
        //     array("123", "456", "789"),
        //     array("aaa", "bbb","123")
        // );
        if(empty($the_data)){
            throw new Error("Data can not be empty");
        }
        $file_name = $file_name.'.csv';
        $fp = fopen($file_name, 'wb');
        foreach ($the_data as $fields) {
            if(!empty($fields)){
                fputcsv($fp,$fields);
            }
        }
        fclose($fp);
    
        return $file_name;
    }
    
    
    function download_send_headers($file){
        $file_url = 'https://staging.yaaracars.com/login/'.$file;
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: utf-8");
        header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
        readfile($file_url);
    }
    
    $file  = export_data($table_names[0],$data);
    download_send_headers($file);

}






