<?php
// Working on it 

include 'config.php';
include 'car_data.php';
include 'functions.php';

if (array_key_exists("submit", $_POST) && $_POST['submit'] === "interested-form") {
  //   echo $_POST['country_code'];
  // exit;
  // print_r($_POST['submit']);
  // exit;
  $arr = array();
  // if(isset($_POST["interested-form"])){
  $name = $_POST["popup_name"];
  $popup_email = $_POST["popup_email"];
  $selected_country_code = $_POST['country_code'];
  $popup_contact = $selected_country_code . " " . $_POST["popup_contact"];
  // $number = $_POST["number"];
  $brand_name = $_POST['popup_brand'];
  $modal_name = $_POST['popup_modal'];
  $modal_page_url = $_POST['popup_slug'];
  $Submitted_from = $_POST['Submitted_from'];


  $query = "INSERT INTO yc_leads (Name, Phone, Brand, Modal, Page_Url, Submitted_from) VALUES ('$name', '$popup_contact', '$brand_name', '$modal_name', '$modal_page_url', '$Submitted_from')";
  $result = mysqli_query($conn, $query);

  if ($result) {
    $arr['status'] = true;
    $arr['msg'] = "New record created successfully";
    // $arr['redirect'] = site_url('') .'/thank-you.php';
    $arr['redirect'] = site_url('');
    // echo "";
  } else {
    $arr['status'] = false;
    $arr['msg'] = "Error:" . mysqli_error($conn);
    // echo "Error:" . mysqli_error($conn);
  }

  // $inset = mysqli_query($conn, $query);
  echo json_encode($arr);
};

if (array_key_exists("submit", $_POST) && $_POST['submit'] === "contact_form") {
  // if(isset($_POST["contact_form"])){
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $contact_email = mysqli_real_escape_string($conn, $_POST["email"]);
  $selected_country_code = $_POST['country_code'];
  $contact = mysqli_real_escape_string($conn, $selected_country_code . " " . $_POST["number"]);
  $contact_purpose = mysqli_real_escape_string($conn, $_POST["contact-purpose"]);
  $contact_msg = mysqli_real_escape_string($conn, $_POST["Contact_Msg"]);
  $submittedFrom = mysqli_real_escape_string($conn, $_POST['Submitted_from']);


  /**
   * 
   * UTM Params
   * 
   */
  $utm_source = null;
  if (
    array_key_exists('utm_source', $_POST) && !empty($_POST['utm_source'])
  ) {
    $utm_source = mysqli_real_escape_string($conn, $_POST['utm_source']);
  }

  $utm_medium = null;
  if (
    array_key_exists('utm_medium', $_POST) && !empty($_POST['utm_medium'])
  ) {
    $utm_medium = mysqli_real_escape_string($conn, $_POST['utm_medium']);
  }

  $utm_campaign = null;
  if (array_key_exists('utm_campaign', $_POST) && !empty($_POST['utm_campaign'])) {
    $utm_campaign = mysqli_real_escape_string($conn, $_POST['utm_campaign']);
  }

  $utm_term = null;
  if (array_key_exists('utm_term', $_POST) && !empty($_POST['utm_term'])) {
    $utm_term = mysqli_real_escape_string($conn,$_POST['utm_term']);
  }


  if (sendNormalMail($name, $contact, null, null, null, $submittedFrom, $utm_source, $utm_medium, $utm_campaign, $utm_term, $contact_email, $contact_purpose, $contact_msg)) {
    $arr['mail_fired'] = true;
  }
  else{
    $arr['mail_fired'] = false;

  }


  $query = "INSERT INTO yc_leads (Name, Email, Phone, Contact_Purpose, Contact_Msg, Submitted_from,utm_source, utm_medium, utm_campaign, utm_term ) VALUES ('$name','$contact_email', '$contact', '$contact_purpose', '$contact_msg', '$submittedFrom'";

  if (!is_null($utm_source)) {
    $query .= ", '$utm_source' ";
  } else {
    $query .= ", NULL ";
  }

  if (!is_null($utm_medium)) {
    $query .= ", '$utm_medium' ";
  } else {
    $query .= ", NULL ";
  }

  if (!is_null($utm_campaign)) {
    $query .= ", '$utm_campaign' ";
  } else {
    $query .= ", NULL ";
  }

  if (!is_null($utm_term)) {
    $query .= ", '$utm_term' ";
  } else {
    $query .= ", NULL ";
  }

  $query .= ")";
 
  $result = mysqli_query($conn, $query);




  if ($result) {
    $arr['status'] = true;
    $arr['msg'] = "New record created successfully";
    // $arr['redirect'] = site_url('') .'/thank-you.php';
    $arr['redirect'] = site_url('');
    // echo "";
  } else {
    $arr['status'] = false;
    $arr['msg'] = "Error:" . mysqli_error($conn);
    // echo "Error:" . mysqli_error($conn);
  }

  // $inset = mysqli_query($conn, $query);
  echo json_encode($arr);
};
