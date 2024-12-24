<?php

/**
 * 
 *  Cars Filters
 * 
 */

include 'config.php';
include 'functions.php';


$SHOW__HOW__MUCH = 100;





if (isset($_POST) && !empty($_POST)) {

    // exit();


    $responseArray = array();
    $responseArray['status'] = false;
    $responseArray['msg'] = "No Data Found";

    if (array_key_exists('data', $_POST) && !empty($_POST['data']) && strcasecmp($_POST['data'], 'onload') === 0) {
        $responseArray['msg'] = "Finding Data On Load";

        $scrolling = strcasecmp($_POST['scrolling'], 'false') ===0 ? false: true;

        $limitQuery = null;

        $responseArray['scrolling'] = $scrolling;
        
        // if ($scrolling === true) {
        //     $responseArray['scrolling'] = true;

        // }


        $searchingByFilter = false;

        $search = ($_POST['datatofind']['DataToFind']);


        if (!empty($search)) {

            $searchingByFilter = true;

            $findArray = array();
            foreach ($search as $sea) {
                if (!array_key_exists($sea['name'], $findArray)) {
                    $findArray[$sea['name']] = array();
                }

                array_push($findArray[$sea['name']], $sea['value']);
            }

            // print_r($findArray);



            /***
             * 
             * Join Here
             * 
             * 
             */
            //price
            $priceQuery = null;
            if (array_key_exists('price', $findArray)) {



                $brandArray = $findArray['price'];

                if (!empty($brandArray)) {
                    $priceQuery .= " AND ";
                    foreach ($brandArray as $b) {
                        $PriceUp_PriceDw = explode('-', $b);
                        $minPrice = floatval($PriceUp_PriceDw[0]);
                        $maxPrice = floatval($PriceUp_PriceDw[1]);
                        $priceQuery .= " yc_engine.MinPrice >=" . $minPrice . "  AND yc_engine.MaxPrice <=" . $maxPrice . " OR ";
                    }

                    $priceQuery = rtrim($priceQuery, ' OR ');
                }
            }

            //brands
            $brandsQuery = null;
            if (array_key_exists('brand', $findArray)) {



                $brandArray = $findArray['brand'];

                if (!empty($brandArray)) {
                    $brandsQuery .= " AND ";
                    foreach ($brandArray as $b) {
                        $brandsQuery .= " yc_master.Brand_Slug='" . strtolower(trim(preg_replace('/ /', '-', $b), ' ')) . "' OR ";
                    }

                    $brandsQuery = rtrim($brandsQuery, ' OR ');
                }
            }

            //FuelType
            $fueltypeQuery = null;
            if (array_key_exists('fuel-type', $findArray)) {



                $brandArray = $findArray['fuel-type'];

                if (!empty($brandArray)) {
                    $fueltypeQuery .= " AND ";
                    foreach ($brandArray as $f) {
                        $fueltypeQuery .= " FIND_IN_SET('$f',yc_engine.Fuel_Types) > 0 OR ";
                    }

                    $fueltypeQuery = rtrim($fueltypeQuery, ' OR ');
                }
            }

            //Transmission
            $transmissiontypeQuery = null;
            if (array_key_exists('transmission-type', $findArray)) {



                $brandArray = $findArray['transmission-type'];

                if (!empty($brandArray)) {
                    $transmissiontypeQuery .= " AND ";
                    foreach ($brandArray as $t) {
                        $transmissiontypeQuery .= " FIND_IN_SET('$t',yc_engine.TransmissionTypes) > 0 OR ";
                    }

                    $transmissiontypeQuery = rtrim($transmissiontypeQuery, ' OR ');
                }
            }


            //Seating Capacity

            $seatingCapacitytypeQuery = null;
            if (array_key_exists('seating-capacity', $findArray)) {



                $brandArray = $findArray['seating-capacity'];

                if (!empty($brandArray)) {
                    $seatingCapacitytypeQuery .= " AND ";
                    foreach ($brandArray as $s) {
                        $seatingCapacitytypeQuery .= " FIND_IN_SET('" . preg_replace('/-/', ' ', $s) . "',yc_engine.Seating_Capacities) > 0 OR ";
                    }

                    $seatingCapacitytypeQuery = rtrim($seatingCapacitytypeQuery, ' OR ');
                }
            }

            //Mileage
            $mileageQuery = null;
            if (array_key_exists('mileage', $findArray)) {



                $brandArray = $findArray['mileage'];

                if (!empty($brandArray)) {
                    $mileageQuery .= " AND ";
                    foreach ($brandArray as $m) {
                        $limit = explode('-', $m);
                        $limitDown = floatval($limit[0]);
                        $limitUp = floatval($limit[1]);

                        $mileageQuery .= " CAST(REPLACE(yc_engine.Mileage, ',', '') AS DECIMAL(10, 2)) BETWEEN $limitDown AND $limitUp OR ";
                    }

                    $mileageQuery = rtrim($mileageQuery, ' OR ');
                }
            }
            //Body type
            $bodyQuery = null;
            if (array_key_exists('body-type', $findArray)) {



                $brandArray = $findArray['body-type'];

                if (!empty($brandArray)) {
                    $bodyQuery .= " AND ";
                    foreach ($brandArray as $b) {
                        $bodyQuery .= " yc_modal.Body_Type='$b' OR ";
                    }

                    $bodyQuery = rtrim($bodyQuery, ' OR ');
                }
            }
        }



        if (array_key_exists('location', $_POST) && !empty($_POST['location'])) {

            $location = $_POST['location'];
            $responseArray['msg'] = "Finding Data On Load By " . $location;
        } else {
            $location = null;
            $responseArray['msg'] = "Finding Data On Load With No Location";
        }

        if (array_key_exists('offset', $_POST) && !empty($_POST['offset'])) {

            $offset = $_POST['offset'];
            $responseArray['msg'] = "Finding Data On Load By ";
        } else {
            $offset = null;
        }

        if ($scrolling === true) {

            $limitQuery .= " LIMIT " . $SHOW__HOW__MUCH;
        }

        if ($offset !== '' && !is_null($offset)) {
            $limitQuery .= " OFFSET " . $offset;
        }


        // $sql = "SELECT yc_master.*, yc_modal.* FROM yc_master INNER JOIN yc_modal on yc_modal.Brand_ID = yc_master.Master_ID";



       $sql = '';

       $sql .= carFilterConstantSql($location);

        if (!is_null($brandsQuery)) {
            $sql .= $brandsQuery;
        }

        if (!is_null($fueltypeQuery)) {
            $sql .= $fueltypeQuery;
        }

        if (!is_null($transmissiontypeQuery)) {
            $sql .= $transmissiontypeQuery;
        }
        if (!is_null($seatingCapacitytypeQuery)) {
            $sql .= $seatingCapacitytypeQuery;
        }
        if (!is_null($priceQuery)) {
            $sql .= $priceQuery;
        }
        if (!is_null($mileageQuery)) {
            $sql .= $mileageQuery;
        }
        if (!is_null($bodyQuery)) {
            $sql .= $bodyQuery;
        }

        $sql .= " GROUP by yc_modal.Modal_Slug 
                ORDER BY
                    CASE WHEN 
                        yc_engine.MinPrice IS NULL THEN 1 ELSE 0 
                    END ASC,
                    yc_engine.MinPrice ASC";

        $totalCounts = mysqli_query($conn, $sql);

        $responseArray['total_results'] = $totalCounts->num_rows;

        if ($scrolling === true) {

            if (intval($offset) === $responseArray['total_results']) {
                
                $responseArray['msg'] = 'No More Cars To Show';
                echo json_encode($responseArray);
                return;
            }
        }



        if (!is_null($limitQuery)) {
            $sql .= $limitQuery;
        }




        // echo $sql;
        $results = mysqli_query($conn, $sql);

        $responseArray['query']  = $sql;

        if ($searchingByFilter === true && $results->num_rows === 0) {
            $responseArray['msg'] = "No Data Found For Filter Applied";
        }

        if ($results->num_rows > 0) {

            $responseArray['dataArray'] = array();
            // $data = array();
            $responseArray['status'] = true;
            $responseArray['showing'] = $results->num_rows;


            $responseArray['msg'] = "Data Found";

            while ($row = $results->fetch_assoc()) {
                // print_r($row);
                $data = array();
                $data['model_id'] = $row['Mod_ID'];
                $data['brand_name'] = $row['Brand'];
                $data['model_name'] = $row['Modal'];
                $data['model_slug'] = $row['Modal_Slug'];
                $data['brand_slug'] = $row['Brand_Slug'];
                $data['currency'] = $row['Currency'];
                $data['version'] = $row['Version'];
                $data['minPrice'] = !empty($row['MinPrice']) ? number_format($row['MinPrice'],0,','): '';
                $data['maxPrice'] = !empty($row['MaxPrice']) ? number_format($row['MaxPrice'],0,','): '';
                if(empty($data['minPrice']) && empty($data['MaxPrice'])){
                    
                    $data['minPrice'] = $row['TBD_Status'];
                    $data['maxPrice'] = $row['TBD_Status'];
                }
                $data['fuel_type_col'] = ltrim($row['Fuel_Types'], ',');
                $data['transmission_type_col'] = ltrim($row['TransmissionTypes'], ',');
                $data['image'] = (getImage(getData($conn, $row['Mod_ID'], 'yc_engine', 'Featured_Image', true)) !== false) ? getImage(getData($conn, $row['Mod_ID'], 'yc_engine', 'Featured_Image', true)) : '';

                $hasVariations = getData($conn, $row['Mod_ID'], 'yc_engine', 'Var_ID', null, true);


                // $car_single = car_list($conn, [$row['Modal']],'Modal',['Variant'],'',false, 'Price'); 


                // print_r($car_single);

                if ($hasVariations !== false) {
                    $data['variations_id'] = $hasVariations;
                }

                if (!empty($hasVariations)) {
                    $data['fuel_type'] = array();
                    $data['transmission_type'] = array();
                    foreach ($hasVariations as $var_id) {

                        // petrol type
                        $thisVariationFuelType = getData($conn, $var_id, 'yc_engine', 'Fuel_Type', true, null, 'Var_ID');

                        if (!in_array($thisVariationFuelType, $data['fuel_type'])) {
                            array_push($data['fuel_type'], $thisVariationFuelType);
                        }

                        //transmission_type

                        $thisVariationTransmission =  getData($conn, $var_id, 'yc_engine', 'Transmission', true, null, 'Var_ID');
                        if (!in_array($thisVariationTransmission, $data['transmission_type'])) {
                            array_push($data['transmission_type'], $thisVariationTransmission);
                        }
                    }
                }



                array_push($responseArray['dataArray'], $data);
            }
        }
    }
    // print_r($_POST);

    // print_r($responseArray);
    echo json_encode($responseArray);
}
