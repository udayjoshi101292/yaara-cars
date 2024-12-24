<?php
include './cars/temp-function.php';

if (isset($_POST['import_btn'])) {
    $table_names = explode('-', $_POST['table-name']);
    $column_nameDB = header_data($conn, $default = array('table_name' => $table_names[0]));

    move_uploaded_file($_FILES['file-to-import']['tmp_name'], dirname(__FILE__) . '/imports/' . $table_names[0] . '.csv');


    $row = 1;
    if (($handle = fopen(dirname(__FILE__) . '/imports/' . $table_names[0] . '.csv', "r")) !== false) {

        $importDataArray = array();
        $masterIds = array();
        while (($data = fgetcsv($handle)) !== false) {
            $num = count($data);

            $importDataArray[$row - 1] = array();
            $masterIds[$row - 1] = array();

            for ($i = 0; $i < $num; $i++) {

                if ($i !== 0) {

                    $importDataArray[$row - 1][$i] = $data[$i];
                }
                if ($i === 0) {
                    $importDataArray[$row - 1][$i] = $data[$i];
                    $masterIds[$row - 1][$i] = $data[$i];
                }
            }

            $row++;
        }
        fclose($handle);
    }


    if (!empty($importDataArray)) {
        $column_name = reset($importDataArray);
        unset($importDataArray[0]);
        unset($masterIds[0]);
        $tempArray = $importDataArray;

        foreach ($tempArray as $key => $value) {
            $payloadArray = array();

            foreach ($value as $k => $v) {

                $payloadArray[$column_name[$k]] = $v;
            }

            $importDataArray[$key] = $payloadArray;
        }


        $sql = null;

        foreach ($importDataArray as $key => $value) {
            $sqlColumns = null;
            $sqlIns = null;
            $count = 0;
            foreach ($value as $k => $v) {
                // if(!empty($v)){

                if (empty($masterIds[$key][0])) {

                    /***
                     * 
                     * Insert Here;
                     */

                     if ($column_nameDB[$count]['DATA_TYPE'] === 'int') {
                        if($table_names[0] === 'yc_engine'){
                            $sqlIns .=  '"'.$v . '", ';
                        }else{
                            $sqlIns .=  !empty($v) ? $v . ', ' : '' ;
                        }
                    } else {
                        if($table_names[0] === 'yc_engine'){
                            $sqlIns .=  '"'.mysqli_real_escape_string($conn, $v) . '", ' ;
                        }else{
                            $sqlIns .=  !empty($v) ? '"'. mysqli_real_escape_string($conn, $v) . '", ' : '' ;
                        }

                    }
                    
                        

                } else {


                    /***
                     * 
                     * Update here
                     * 
                     */
                    
                    if ($column_nameDB[$count]['DATA_TYPE'] === 'int') {

                        $sqlColumns .= $k . ' = ' . $v . ', ';
                    } else {

                        $sqlColumns .= $k . ' = "' . mysqli_real_escape_string($conn, $v) . '", ';
                    }
                }
                $count = $count + 1;
            // }
            }

            if (empty($masterIds[$key][0])) {
                unset($column_name[0]);

                    $columns = join(',', $column_name);


                // $sqlPart = "SET FOREIGN_KEY_CHECKS=0;";
                $sqlPart = "INSERT INTO " .$table_names[0] ." (";
                $sqlPart .= $columns;
                $sqlPart .=" ) VALUES ( " ;
                if($table_names[0] === 'yc_engine'){
                    $sqlIns = ltrim($sqlIns, '"",');
                }
                $sqlPart .= rtrim($sqlIns,', ');
                $sqlPart .=" );" ;
                // $sqlPart .="SET FOREIGN_KEY_CHECKS=1;" ;
            }
            else{
                $sqlPart = "UPDATE ".$table_names[0]." SET ";
                $sqlPart .= rtrim($sqlColumns, ', ');
                $sqlPart .= " WHERE ";
                $sqlPart .= $column_name[0];
                $sqlPart .= "=";
                $sqlPart .= $masterIds[$key][0];
            }
            // echo $sqlPart;
            mysqli_query($conn, $sqlPart);
            header('Location:' . $_SERVER['HTTP_REFERER']);

        }

    }
}

if (isset($_POST['export_btn'])) {

    $table_names = explode('-', $_POST['table-name']);
    // print_r($table_names);
    $column_name = header_data($conn, $default = array('table_name' => $table_names[0]));
    $data = get_data_data_testing($conn, $table_names[0], $table_names[1], null, null, null, null, null);

    $column_names = array();
    foreach ($column_name as $name) {
        array_push($column_names, $name['COLUMN_NAME']);
    }


    array_unshift($data, $column_names);

    function export_data($file_name = 'file', $the_data = array())
    {
        // $the_data = array(
        //     array("aaa", "bbb", "ccc", "dddd"),
        //     array("123", "456", "789"),
        //     array("aaa", "bbb","123")
        // );
        // echo "<pre>";
        // print_r($the_data);
        // echo "</pre>";
        if (empty($the_data)) {
            throw new Error("Data can not be empty");
        }
        $file_name = $file_name . '.csv';
        $fp = fopen($file_name, 'wb');
        foreach ($the_data as $fields) {
            if (!empty($fields)) {
                fputcsv($fp, $fields);
            }
        }
        fclose($fp);

        return $file_name;
    }


    function download_send_headers($file)
    {
        $file_url = 'https://staging.yaaracars.com/login/' . $file;
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: utf-8");
        header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
        readfile($file_url);
    }

    $file  = export_data($table_names[0], $data);
    download_send_headers($file);
}
