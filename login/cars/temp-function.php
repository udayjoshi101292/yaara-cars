<?php 
include 'config.php';


// Get table data 
function get_data_data($conn, $table_name){
    $the_table = "SELECT * FROM $table_name";
    $result = mysqli_query($conn, $the_table);
    $the_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $the_data;
}


// Testing pageination 
function get_data_data_testing($conn, $table_name,  $order_by = null, $return_count = null, $page = null, $extra_sql = null, $col_name = null, $filter_array = array()){
    $defalt_pagenition = 10;
    $the_table = "SELECT ";

    if(!is_null($col_name)){
        $the_table .= $col_name;
    }else{
        $the_table .= '*';
    }

    $the_table .= ' FROM '.$table_name ;
    // if(is_null($return_count)){
        // $the_table .= 'LIMIT 10 OFFSET 20';
    // }
   if(!empty($filter_array)){
    $the_table .= ' WHERE ';
    $has_and = false;
    if(count($filter_array) > 1){
        $has_and = true;
    }
    $for_ = null;
    foreach($filter_array as $array){
        // $defalt_pagenition = 1;
        // $return_count = 1;
        $has_and = ($has_and === true)? " AND ": "";
        $for_ .= $array['column'] ." = '". $array['value'] ."' AND ";
    }
    $the_table .= rtrim($for_, ' AND ');
   }
    if(!is_null($extra_sql)){
        $the_table .= $extra_sql;
    }
    if(!is_null($order_by)){
        $the_table .= ' ORDER BY '.$order_by ;
    }
    if(!is_null($page) && $page == 1){
        $the_table .=  ' LIMIT '.$defalt_pagenition;
    }
    if(!is_null($page) && $page >= 2){
        $offset = $page * $defalt_pagenition;
        // $offset = $defalt_pagenition  ;
        $the_table .= ' LIMIT '.$defalt_pagenition. ' OFFSET '. $offset;
    }
    // echo $the_table;
    // echo "<br>";
    $result = mysqli_query($conn, $the_table);
    if(!is_null($return_count)){
        return $result->num_rows;
    }
    
    $the_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $the_data;
}

// Get header data 
function header_data($conn, $default = array('table_name' => null)){
    if (!is_null($default['table_name'])) {
        $table_name = $default['table_name'];
        // print_r($vairant_all);
        $vairant_all = "SELECT * FROM information_schema.columns WHERE TABLE_NAME = '$table_name'";
    }

    $vairant_table_all = mysqli_query($conn, $vairant_all);
    $vairant_data_all = mysqli_fetch_all($vairant_table_all, MYSQLI_ASSOC);

    // Variable Naming
    return $vairant_data_all;
}


function select_filters($options , $label_main = null, $label = null, $defaults = array('name' => '',  'id' => '', 'class' => ''), ){
    
    print_r($_GET[ strtolower('Modal')]);
    
    $markup = ' <div class="filler_item select_wrap">';
    $markup .= ' <h5 class="wrap_title">';
    $markup .= $label_main;
    $markup .= ' </h5>';
    $markup .= '<select name="'.$defaults['name'].'" id="" class="js-example-basic-single '.$defaults['class'].'">';
    
    $markup .= '<option value="">Select '.$label_main.'</option>';
    if(!empty($options) && is_array($options)){
        
        // print_r($filter_emp_arr);
        foreach ($options as $key => $value) {
            $markup .= "<option ".(($_GET[strtolower($label)] ===  $value[$label]) ? 'selected' : ''). "  value='" . $value[$label] . "'>" . $value[$label] . "</option>";
            // var_dump($value[$label]);
            // if($_GET[$value[$label]] === $value[$label]){
            //     echo "tre";
            // }else{
            //     echo "false";
            // }
            // $markup .= '<option value="'.$value[$label].'">'.$value[$label].'</option>';
        }
        
    }

    $markup .= '</select>';
    $markup .= '</div>';

    return $markup;
}


// function import_export_fun(){
// //     <form action="../export.php" method="post" class="mt-2">
// //     <div class="export_import_wrap">
// //         <div class="form-update-btn post-form-group btn-style-1">
// //             <input type="submit" value="Export" name="export_btn">
// //         </div>
// //         <div class="form-update-btn post-form-group btn-style-1 d-flex">
// //             <input type="file" value="" name="" class="mr-1">
// //             <input type="submit" value="Import" name="import_btn">
// //         </div>
// //     </div>
// //     <input type="hidden" value="yc_master" name="table-name">
// // </form>

// $markup =  '<form action="../export.php" method="post" class="mt-2">';
// $markup .= '<div class="export_import_wrap">';
// $markup .= '<div class="form-update-btn post-form-group btn-style-1">';
// $markup .= '<input type="submit" value="Export" name="export_btn">';
// $markup .= '</div>'

// }