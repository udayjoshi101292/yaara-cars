<?php


$server = "localhost";
$username = "u317526817_staging";
$password = "T3qDdLB[9T!l";
$servername = "u317526817_staging";

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors', 'On');

$conn = mysqli_connect($server, $username, $password, $servername);

if (!$conn) {
    die("Db not connectd" . mysqli_connect_error($conn));
} else {
    // echo "DB connected";
}


$site_url_backend = 'https://staging.yaaracars.com';
$backend_url = 'https://staging.yaaracars.com/login';
$live_url = "https://staging.yaaracars.com/news";

define('CMS_URL', $backend_url);
define('SITE_URL', $site_url_backend);

function cms_url()
{
    return $site_ = CMS_URL;
}

function site_url()
{
    return $site_ = SITE_URL;
}


// Getting leads data from db 
$sql = "SELECT * FROM yc_leads";
$result = mysqli_query($conn, $sql);
$lead_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
$no = 1;

function contact_leads($conn)
{
    $sql = "SELECT * FROM yc_leads WHERE Submitted_from = 'Contact From' ";
    $result = mysqli_query($conn, $sql);
    $ct_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $no = 1;
    return $ct_data;
}
function ad_with_us_leads($conn)
{
    $sql = "SELECT * FROM yc_leads WHERE Submitted_from = 'Advertise From' ";
    $result = mysqli_query($conn, $sql);
    $ct_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $no = 1;
    return $ct_data;
}
function im_interested_leads($conn)
{
    $sql = "SELECT * FROM yc_leads WHERE Submitted_from = 'Interested From' ";
    $result = mysqli_query($conn, $sql);
    $ct_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $no = 1;
    return $ct_data;
}








// Insert data to db 
// $update_button = $_POST['Update-post'];

// if(isset($_POST["Update-post"])){
//     echo "tru";
// }else{
//     echo "false";
// }

// $insart_data = "INSERT INTO yc_post (Location, Title ) VALUES ( 'India', 'This is a test blog')";
// $result = mysqli_query($conn, $insart_data);


// if($_SERVER["REQUEST_METHOD"] == "GET"){

//     $insart_data = "INSERT INTO yc_post (Location, Title ) VALUES ( 'India', 'This is a test blog')";
//     $result = mysqli_query($conn, $insart_data);

//     // if(isset($_POST["Update-post"])){
//     //     echo "Clicked";
//     // }

//     // echo "tru";
// }else{
//     echo " Server Method is "  . print_r($_SERVER["REQUEST_METHOD"]);
// }









if (defined('TABLE_USER')) {

    /***
     * 
     * 
     * Create Tables Dynamically
     * 
     * 
     */


    function CreateTableUser($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . TABLE_USER . " (
         user_ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         user_Firstname VARCHAR(255) NOT NULL ,
         user_Lastname VARCHAR(255) NOT NULL ,
         user_PhoneNo VARCHAR(12) NOT NULL UNIQUE,
         user_Email VARCHAR(255) NOT NULL UNIQUE,
         user_Role ENUM('super_admin','admin') NOT NULL ,
         user_Username VARCHAR(255) NOT NULL UNIQUE,
         user_Password LONGTEXT NOT NULL,
         user_Status BIT(1) DEFAULT 1,
         user_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
         )";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function CREATESUPERADMIN($conn)
    {

        $checkSuperAdminExists = "SELECT COUNT(*) as Super_admins FROM " . TABLE_USER . " WHERE user_Role='super_admin'";
        $checkSuperAdminExistsResult = mysqli_query($conn, $checkSuperAdminExists);

        $createSuperAdmin = false;
        if ($checkSuperAdminExistsResult->num_rows > 0) {
            while ($row = $checkSuperAdminExistsResult->fetch_assoc()) {

                if ((int)$row['Super_admins'] === 0) {

                    $createSuperAdmin = true;
                }
            }
        }

        if ($createSuperAdmin === true) {

            $sql = "INSERT INTO " . TABLE_USER . " (`user_Firstname`, `user_Lastname`, `user_PhoneNo`, `user_Email`, `user_Role`, `user_Username`, `user_Password`, `user_Status`) VALUES ('Super Admin', 'LastName', '+91999999999', 'admin@email.com', 'super_admin', 'admin', '" . md5('admin@123') . "', b'1'),
        ('Vaishali', 'LastName', '+91999999991', 'vaishali@arabyads.com', 'admin', 'vaishali', '" . md5('Vaishali@Yaara123') . "', b'1'),
        ('Gulrez', 'LastName', '+91999999992', 'gulrez@arabyads.com', 'admin', 'gulrez', '" . md5('Gulrez@YaaraCars456') . "', b'1')";


            // echo $sql;

            $result = mysqli_query($conn, $sql);
            if ($result) {
                return true;
            }
        } else {
            return false;
        }
    }

    function AlterTable($conn, $tablename, $column_to_add, $dataType_and_contraints, $afterColumn)
    {
        $sql = "SHOW COLUMNS FROM " . $tablename . " LIKE '$column_to_add'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows === 0) {
            /**
             * 
             * if query results in false create a column
             * 
             */
            $sqlCreateColumn = "ALTER TABLE " . $tablename . " ADD COLUMN $column_to_add $dataType_and_contraints AFTER $afterColumn";
            if (mysqli_query($conn, $sqlCreateColumn) === TRUE) {
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * Database Calls
     * 
     */
    CreateTableUser($conn);
    CREATESUPERADMIN($conn);
    AlterTable($conn, TABLE_USER, 'user_ResetString', 'LONGTEXT', 'user_Password');



    /***
     * 
     * 
     * User Functions
     * 
     * 
     * 
     */


    function CheckItExistsAndActive($conn, $column, $value, $returnRow = null)
    {

        $sql = "SELECT * FROM " . TABLE_USER . " WHERE $column = '$value' AND user_Status=1";
        $results = mysqli_query($conn, $sql);
        if ($results->num_rows > 0) {

            if ($returnRow === true) {
                while ($row = $results->fetch_assoc()) {
                    return $row;
                }
            }

            return true;
        } else {
            return false;
        }
    }

    function CheckLogin($conn, $username, $password)
    {


        $responseArray = array();
        $responseArray['status'] = false;
        $responseArray['msg'] = 'No Data Found';

        $checkUserNameIsActive = CheckItExistsAndActive($conn, 'user_Username', mysqli_real_escape_string($conn, $username), true);
        $checkUserEmailActive = CheckItExistsAndActive($conn, 'user_Email', mysqli_real_escape_string($conn, $username), true);

        if ($checkUserEmailActive === false && $checkUserNameIsActive === false) {
            $responseArray['status'] = false;
            $responseArray['msg'] = 'No Such User';
            return $responseArray;
        }



        if (
            ($checkUserEmailActive !== false)
            ||
            ($checkUserNameIsActive !== false)
        ) {

            $details = null;

            if ($checkUserEmailActive !== false) {

                $details = $checkUserEmailActive;
            } else {

                $details = $checkUserNameIsActive;
            }


            $responseArray['msg'] = 'Active User Checking ';


            if (is_null($details)) {

                $responseArray['status'] = false;
                $responseArray['msg'] = 'Details are Empty. ';
            }


            if ($details['user_Password'] === md5($password)) {

                unset($details['user_Password']);

                $responseArray['status'] = true;
                $responseArray['msg'] = 'User Successfully Authenticated';
                $responseArray['details'] = $details;
            } else {
                $responseArray['status'] = false;
                $responseArray['msg'] = 'Password Does Not match with Username';
            }
        }

        return $responseArray;
    }

    function getUserDetailsById($conn, $id)
    {

        $sql = "SELECT * FROM " . TABLE_USER . " WHERE user_ID = $id AND user_Status=1";
        $results = mysqli_query($conn, $sql);
        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                return $row;
            }
        } else {
            return false;
        }
    }

    function UpdateColumn($conn, $column, $value, $id, $updateNull = false)
    {

        $sql = "UPDATE " . TABLE_USER . " SET $column='$value' WHERE user_ID = $id AND user_Status=1";
        if ($updateNull === true) {

            $sql = "UPDATE " . TABLE_USER . " SET $column = NULL WHERE user_ID = $id AND user_Status=1";
        }
        $results = mysqli_query($conn, $sql);
        if ($results) {
            return true;
        } else {
            return false;
        }
    }

    function FireResetPasswordMail($conn, $id, $token, $forgetUrl)
    {
        $isTokenUpdatedInDb = UpdateColumn($conn, 'user_ResetString', $token, $id);

        if ($isTokenUpdatedInDb === false) {
            return;
        }

        $mail = getUserDetailsById($conn, $id);
        $to = $mail['user_Email'];
        $subject = "Reset Password";

        $message = "Reset Link: " . $forgetUrl;

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <noreply@yaaracars.com>' . "\r\n";

        $isSent = mail($to, $subject, $message, $headers);

        if ($isSent) {
            return true;
        } else {
            return false;
        }
    }



    /***
     * 
     * 
     * User Functions
     * 
     * 
     * 
     */
}












?>

