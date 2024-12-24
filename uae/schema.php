<?php

/***
 * 
 * Schema File
 * 
 */

$listingId = "YAARACARS";
$site_url_schema = site_url(' ');

if (strpos($_SERVER['SCRIPT_URI'], 'uae') !== false) {
    $location = "UAE";
}

if (strpos($_SERVER['SCRIPT_URI'], 'ksa') !== false) {
    $location = "KSA";
}


if ($schemaId === 1) {

    //model page

    $identifier = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
    $modal = (array_pop($identifier));
    $identifierCount = count($identifier);
    $brand = ($identifier[$identifierCount - 1]);


    $searchBy = "AND yc_master.Brand_Slug='" . $brand . "' AND yc_modal.Modal_Slug='" . $modal . "'";
    $sql = carFilterConstantSql($location, $searchBy);

    $results = mysqli_query($conn, $sql);
    $data = null;
    $count = 0;
    if ($results->num_rows > 1) {
        while ($row = $results->fetch_assoc()) {
            $data = $row;
            $count = $count + 1;
            if ($count === 1) {
                break;
            }
        }
    }


    $masterQuery = execMyQuery($conn, 'SELECT * FROM `yc_master` WHERE Location="' . $location . '" AND Brand_Slug="' . $brand . '"');
    if ($masterQuery !== false && $masterQuery->num_rows > 0 && $masterQuery->num_rows === 1) {
        $BrandId  = ($masterQuery->fetch_assoc()['Master_ID']);
        if (!empty($BrandId)) {

            $qSql = 'SELECT * FROM `yc_modal` WHERE Modal_Slug="' . $modal . '" AND Status_Modal="Publish" AND Brand_ID=' . $BrandId . ' GROUP BY Modal_Slug';


            $modalQuery = execMyQuery($conn, $qSql);
            if ($modalQuery !== false && $modalQuery->num_rows > 0 && $modalQuery->num_rows === 1) {

                $modalId = $modalQuery->fetch_assoc()['Mod_ID'];
            }
        }
    }

    $modalId = str_pad($modalId, 5, '0', STR_PAD_LEFT);
    $listingId = $listingId . $modalId;



    if (!empty($data) && !is_null($data)) {

        $image = (getImage(getData($conn, $data['Mod_ID'], 'yc_engine', 'Featured_Image', true)) !== false) ? getImage(getData($conn, $data['Mod_ID'], 'yc_engine', 'Featured_Image', true)) : '';
        $year = GetDataFor($conn, 'yc_master', 'Master_ID', $data['Master_ID'], false, '', '', true)['Year'];

        $data['Year'] = $year;

        if (!empty($data['Seating_Capacities'])) {
            $seats = (explode(',', $data['Seating_Capacities']));
            rsort($seats, SORT_NUMERIC);

            $seat = rtrim(end($seats), ' Seater');
        }
?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": [
                    "Product",
                    "Car"
                ],
                "name": "<?php echo $data['Brand'] ?> <?php echo $data['Modal'] ?>",
                "model": "<?php echo $data['Modal'] ?>",
                "image": "<?php echo $image; ?>",
                "url": "<?php echo $site_url_schema; ?>/<?php echo $data['Brand_Slug'] ?>/<?php echo $data['Modal_Slug'] ?>",
                "description": "<?php echo $meta_desc ?>",
                "vehicleIdentificationNumber": "<?php echo $listingId; ?>",
                "bodyType": "<?php echo $data['Body_Type'] ?>",
                "itemCondition": "http://schema.org/NewCondition",
                "vehicleModelDate": "<?php echo $data['Year'] ?>",
                "brand": {
                    "@type": "Brand",
                    "name": "<?php echo $data['Brand'] ?>"
                },
                "manufacturer": {
                    "@type": "Organization",
                    "name": "<?php echo $data['Brand'] ?>"
                },
                "vehicleSeatingCapacity": {
                    "@type": "QuantitativeValue",
                    "value": <?php echo $seat; ?>
                },
                "vehicleTransmission": {
                    "@type": "QualitativeValue",
                    "name": "<?php echo (strcasecmp($data['Fuel_Types'], 'Electric') !== 0) ? $data['TransmissionTypes'] : 'Automatic'; ?>"

                },
                "fuelType": {
                    "@type": "QualitativeValue",
                    "name": "<?php echo $data['Fuel_Types'] ?>"

                },

                "offers": {
                    "@type": "Offer",
                    "price": "<?php echo $data['MinPrice'] ?>",
                    "availability": "http://schema.org/InStock",
                    "priceCurrency": "<?php echo $data['Currency']; ?>",
                    "priceSpecification": {
                        "@type": "PriceSpecification",
                        "minPrice": "<?php echo $data['MinPrice'] ?>",
                        "maxPrice": "<?php echo $data['MaxPrice'] ?>",
                        "price": "<?php echo $data['MinPrice'] ?>",
                        "priceCurrency": "<?php echo $data['Currency']; ?>"
                    }
                }
            }
        </script>

    <?php
    }
}



if ($schemaId === 2) {

    // price page

    $identifier = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
    $identifierCount = count($identifier);
    $modal = ($identifier[$identifierCount - 2]);
    $brand = ($identifier[$identifierCount - 3]);


    $searchBy = "AND yc_master.Brand_Slug='" . $brand . "' AND yc_modal.Modal_Slug='" . $modal . "'";
    $sql = carFilterConstantSql($location, $searchBy);
    // echo $sql;
    $results = mysqli_query($conn, $sql);
    $data = null;
    $count = 0;
    if ($results->num_rows > 1) {
        while ($row = $results->fetch_assoc()) {
            $data = $row;
            $count = $count + 1;
            if ($count === 1) {
                break;
            }
        }
    }



    $masterQuery = execMyQuery($conn, 'SELECT * FROM `yc_master` WHERE Location="' . $location . '" AND Brand_Slug="' . $brand . '"');
    if ($masterQuery !== false && $masterQuery->num_rows > 0 && $masterQuery->num_rows === 1) {
        $BrandId  = ($masterQuery->fetch_assoc()['Master_ID']);
        if (!empty($BrandId)) {

            $qSql = 'SELECT * FROM `yc_modal` WHERE Modal_Slug="' . $modal . '" AND Status_Modal="Publish" AND Brand_ID=' . $BrandId . ' GROUP BY Modal_Slug';

            $modalQuery = execMyQuery($conn, $qSql);
            if ($modalQuery !== false && $modalQuery->num_rows > 0 && $modalQuery->num_rows === 1) {

                $modalId = $modalQuery->fetch_assoc()['Mod_ID'];
            }
        }
    }

    $modalId = str_pad($modalId, 5, '0', STR_PAD_LEFT);
    $listingId = $listingId . $modalId;

    if (!empty($data) && !is_null($data)) {

        $image = (getImage(getData($conn, $data['Mod_ID'], 'yc_engine', 'Featured_Image', true)) !== false) ? getImage(getData($conn, $data['Mod_ID'], 'yc_engine', 'Featured_Image', true)) : '';
        $year = GetDataFor($conn, 'yc_master', 'Master_ID', $data['Master_ID'], false, '', '', true)['Year'];

        $data['Year'] = $year;

    ?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": ["Product", "Car"],
                "name": "<?php echo $data['Brand']; ?> <?php echo $data['Modal'] ?>",
                "model": "<?php echo $data['Modal'] ?>",
                "image": "<?php echo $image; ?>",
                "url": "<?php echo $site_url_schema; ?>/<?php echo $data['Brand_Slug'] ?>/<?php echo $data['Modal_Slug'] ?>/price",
                "description": "<?php echo $meta_desc; ?>",
                "vehicleIdentificationNumber": "<?php echo $listingId; ?>",
                "bodyType": "<?php echo $data['Body_Type']; ?>",
                "itemCondition": "https://schema.org/NewCondition",
                "vehicleModelDate": <?php echo $data['Year'] ?>,
                "brand": {
                    "@type": "Brand",
                    "name": "<?php echo $data['Brand'] ?>"
                },
                "manufacturer": {
                    "@type": "Organization",
                    "name": "<?php echo $data['Brand']; ?>"
                },
                "offers": {
                    "@type": "Offer",
                    "price": "<?php echo $data['MinPrice'] ?>",
                    "availability": "http://schema.org/InStock",
                    "priceCurrency": "<?php echo $data['Currency']; ?>",
                    "priceSpecification": {
                        "@type": "PriceSpecification",
                        "minPrice": "<?php echo $data['MinPrice'] ?>",
                        "maxPrice": "<?php echo $data['MaxPrice'] ?>",
                        "price": "<?php echo $data['MinPrice'] ?>",
                        "priceCurrency": "<?php echo $data['Currency']; ?>"
                    }
                }
            }
        </script>
    <?php
    }
}



if ($schemaId === 3) {


    //specs page 


    $identifier = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
    $identifierCount = count($identifier);
    $modal = ($identifier[$identifierCount - 2]);
    $brand = ($identifier[$identifierCount - 3]);


    $searchBy = "AND yc_master.Brand_Slug='" . $brand . "' AND yc_modal.Modal_Slug='" . $modal . "'";
    $sql = carFilterConstantSql($location, $searchBy);

    $results = mysqli_query($conn, $sql);
    $data = null;
    $count = 0;
    if ($results->num_rows > 1) {
        while ($row = $results->fetch_assoc()) {
            $data = $row;
            $count = $count + 1;
            if ($count === 1) {
                break;
            }
        }
    }


    $masterQuery = execMyQuery($conn, 'SELECT * FROM `yc_master` WHERE Location="' . $location . '" AND Brand_Slug="' . $brand . '"');
    if ($masterQuery !== false && $masterQuery->num_rows > 0 && $masterQuery->num_rows === 1) {
        $BrandId  = ($masterQuery->fetch_assoc()['Master_ID']);
        if (!empty($BrandId)) {

            $qSql = 'SELECT * FROM `yc_modal` WHERE Modal_Slug="' . $modal . '" AND Status_Modal="Publish" AND Brand_ID=' . $BrandId . ' GROUP BY Modal_Slug';
            $modalQuery = execMyQuery($conn, $qSql);
            if ($modalQuery !== false && $modalQuery->num_rows > 0 && $modalQuery->num_rows === 1) {

                $modalId = $modalQuery->fetch_assoc()['Mod_ID'];
            }
        }
    }

    $modalId = str_pad($modalId, 5, '0', STR_PAD_LEFT);
    $listingId = $listingId . $modalId;



    if (!empty($data) && !is_null($data)) {

        $image = (getImage(getData($conn, $data['Mod_ID'], 'yc_engine', 'Featured_Image', true)) !== false) ? getImage(getData($conn, $data['Mod_ID'], 'yc_engine', 'Featured_Image', true)) : '';
        $year = GetDataFor($conn, 'yc_master', 'Master_ID', $data['Master_ID'], false, '', '', true)['Year'];

        $data['Year'] = $year;
    ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": [
                    "Product",
                    "Car"
                ],
                "name": "<?php echo $data['Brand'] ?> <?php echo $data['Modal'] ?> <?php echo $data['Year'] ?>",
                "model": "<?php echo $data['Modal'] ?>",
                "image": "<?php echo $image; ?>",
                "url": "<?php echo $site_url_schema; ?>/<?php echo $data['Brand_Slug'] ?>/<?php echo $data['Modal_Slug'] ?>/specs",
                "description": "<?php echo $meta_desc ?>",
                "vehicleIdentificationNumber": "<?php echo $listingId; ?>",
                "bodyType": "<?php echo $data['Body_Type'] ?>",
                "itemCondition": "http://schema.org/NewCondition",
                "vehicleModelDate": "<?php echo $data['Year'] ?>",
                "brand": {
                    "@type": "Brand",
                    "name": "<?php echo $data['Brand'] ?>"
                },
                "manufacturer": {
                    "@type": "Organization",
                    "name": "<?php echo $data['Brand'] ?>"
                },
                "vehicleSeatingCapacity": {
                    "@type": "QuantitativeValue",
                    "value": <?php echo rtrim(end(explode(',', $data['Seating_Capacities'])), ' Seater') ?>
                },
                "vehicleTransmission": {
                    "@type": "QualitativeValue",
                    "name": "<?php echo (strcasecmp($data['Fuel_Types'], 'Electric') !== 0) ? $data['TransmissionTypes'] : 'Automatic'; ?>"

                },
                "fuelType": {
                    "@type": "QualitativeValue",
                    "name": "<?php echo $data['Fuel_Types'] ?>"

                },

                "offers": {
                    "@type": "Offer",
                    "price": "<?php echo $data['MinPrice'] ?>",
                    "availability": "http://schema.org/InStock",
                    "priceCurrency": "<?php echo $data['Currency']; ?>",
                    "priceSpecification": {
                        "@type": "PriceSpecification",
                        "minPrice": "<?php echo $data['MinPrice'] ?>",
                        "maxPrice": "<?php echo $data['MaxPrice'] ?>",
                        "price": "<?php echo $data['MinPrice'] ?>",
                        "priceCurrency": "<?php echo $data['Currency']; ?>"
                    }
                }
            }
        </script>

    <?php
    }
}


if ($schemaId === 4) {

    //single variant page 

    $identifier = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
    $identifierCount = count($identifier);
    $modal = ($identifier[$identifierCount - 2]);
    $brand = ($identifier[$identifierCount - 3]);
    $varSlug = ($identifier[$identifierCount - 1]);



    // $queryCondition = " AND Ref_Modal = '$modal' AND Status='Publish' AND Var_Location='$location' AND Price != 'DISCONTINUED'";

    // $queryCondition = " AND Var_Location = '$location' AND Status='Publish' AND Price != 'DISCONTINUED'";
    // $result = GetDataFor($conn, 'yc_engine', 'Variant_Slug', $varSlug, true, $queryCondition, '', null, true);

    // $searchBy = "AND yc_master.Brand_Slug='" . $brand . "' AND yc_modal.Modal_Slug='" . $modal . "'";
    // echo $sql = carFilterConstantSql($location, $searchBy);

    $sql = "SELECT *
        FROM yc_modal m
        INNER JOIN yc_engine v ON m.Mod_ID = v.Modal_ID
        WHERE v.Variant_Slug = '" . $varSlug . "' AND v.Var_Location = '" . $location . "' AND Status='Publish' AND m.Modal_Slug='" . $modal . "'";


    $result = execMyQuery($conn, $sql);
    $data = null;

    if ($result !== false && $result->num_rows === 1) {
        $data = $result->fetch_assoc();
    } else {
        echo "<div style='display:none;'>Error Generating Schema</div>";
    }


    $modalId = $data['Modal_ID'];

    $modalId = str_pad($modalId, 5, '0', STR_PAD_LEFT);
    $listingId = $listingId . $modalId;


    if (!empty($data) && !is_null($data)) {



        $image = (getImage($data['Featured_Image']) !== false) ? getImage($data['Featured_Image']) : '';
        $masterDetails = GetDataFor($conn, 'yc_master', 'Master_ID', $data['Ref_Brand'], false, '', '', true);
        $modelDetails = GetDataFor($conn, 'yc_modal', 'Mod_ID', $data['Modal_ID'], false, '', '', true);


        $searchBy = "AND yc_master.Brand_Slug='" . $brand . "' AND yc_modal.Modal_Slug='" . $modal . "'";
        $sql = carFilterConstantSql($location, $searchBy);
        // echo $sql;
        $results = mysqli_query($conn, $sql);
        $dataP = null;
        $count = 0;
        if ($results->num_rows > 1) {
            while ($row = $results->fetch_assoc()) {
                $dataP = $row;
                $count = $count + 1;
                if (
                    $count === 1
                ) {
                    break;
                }
            }
        }

        $data['MinPrice'] = $dataP['MinPrice'];
        $data['MaxPrice'] = $dataP['MaxPrice'];
        $data['Currency'] = $dataP['Currency'];

    ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": [
                    "Product",
                    "Car"
                ],
                "name": "<?php echo $masterDetails['Brand'] ?> <?php echo $data['Modal'] ?> <?php echo $data['Variant'] ?>",
                "model": "<?php echo $data['Ref_Modal'] ?>",
                "image": "<?php echo $image; ?>",
                "url": "<?php echo $site_url_schema; ?>/<?php echo $data['Brand_Slug'] ?>/<?php echo $data['Modal_Slug'] ?>/<?php echo $data['Variant_Slug'] ?>",
                "description": "<?php echo $meta_desc ?>",
                "vehicleIdentificationNumber": "<?php echo $listingId; ?>",
                "bodyType": "<?php echo $modelDetails['Body_Type'] ?>",
                "itemCondition": "http://schema.org/NewCondition",
                "vehicleModelDate": "<?php echo $data['Year'] ?>",
                "brand": {
                    "@type": "Brand",
                    "name": "<?php echo $masterDetails['Brand'] ?>"
                },
                "manufacturer": {
                    "@type": "Organization",
                    "name": "<?php echo $masterDetails['Brand'] ?>"
                },
                "vehicleSeatingCapacity": {
                    "@type": "QuantitativeValue",
                    "value": <?php echo rtrim($data['Seating_Capacity'], ' Seater') ?>
                },
                "vehicleTransmission": {
                    "@type": "QualitativeValue",
                    "name": "<?php echo (strcasecmp($data['Fuel_Type'], 'Electric') !== 0) ? $data['Transmission'] : 'Automatic'; ?>"

                },
                "fuelType": {
                    "@type": "QualitativeValue",
                    "name": "<?php echo $data['Fuel_Type'] ?>"

                },

                "offers": {
                    "@type": "Offer",
                    "price": "<?php echo $data['MinPrice'] ?>",
                    "availability": "http://schema.org/InStock",
                    "priceCurrency": "<?php echo $data['Currency']; ?>",
                    "priceSpecification": {
                        "@type": "PriceSpecification",
                        "price": "<?php echo $data['MinPrice'] ?>",
                        "priceCurrency": "<?php echo $data['Currency']; ?>"
                    }
                }
            }
        </script>
<?php
    }
}
