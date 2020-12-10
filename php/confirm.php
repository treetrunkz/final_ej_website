<?php

  sendData();
 
  // Send an email
  function sendData() {
      
    // Error Reporting Turned On
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    require "../includes/dbcreds.php";
    
    date_default_timezone_set('America/Los_Angeles');
    // Get date from POST array
    $fname = $_POST['form-first-name'];
    $lname = $_POST['form-last-name'];
    $email = $_POST['form-email'];
    $phoneNumber = $_POST['form-phone'];
    
    $withoutResidence = $_POST['btn-without'];
    
    $street = $_POST['form-street'];
    $city = $_POST['form-city'];
    //$state = $_POST['form-state'];
    $zip = $_POST['form-zip'];
    
    $utilities = $_POST['chk-utility'];
    $rent = $_POST['chk-rent'];
    $gas = $_POST['chk-gas'];
    $thrift = $_POST['chk-thrift'];
    $licenseID = $_POST['chk-id'];
    $supplies = $_POST['chk-goods'];
    
    $otherNeed = $_POST['chk-other'];
    $otherRequest = $_POST['txt-other'];
    $otherMessage;
    
    /* TODO - UPLOAD SECTION
    $fileBill = $_POST[''];
    $fileUrgentNotice = $_POST[''];
    $fileEviction = $_POST[''];
    $fileLicense = $_POST[''];
    */
    
    $comments = $_POST['form-message'];
    
    // Form Validation
    $isValid = true;

    // Check if first name is empty
    if (empty($fname)) {
        $isValid = false;
    }

    // Check if last name is empty
    if (empty($lname)) {
        $isValid = false;
    }

    // Check email/phone
    if (empty($email) && empty($phoneNumber)) {
        $isValid = false;
    }
    
    // Check no zip/unchecked w/o perm residence
    if (!isset($withoutResidence) && empty($zip)) {
        $isValid = false;
    }

    // If nothing is checked
    if (!(isset($utilities) || isset($rent) || isset($gas) || isset($thrift) || isset($licenseID) || isset($supplies) || isset($otherNeed))) {
        $isValid = false;
    }
    
    // If other need is selected but text isn't filled out
    if (isset($otherNeed) && empty($otherRequest)) {
        $isValid = false;
    }

    if (!$isValid) {
        return;
    }
    
    // Email Specs
    $to = "jfolk2@mail.greenriver.edu";
    $subject = "$fname $lname Services Form";
    $message = "First Name: $fname\r\n";
    $message .= "Last Name: $lname\r\n";
    
    // If email/number is filled/empty - send different messages
    if(empty($email)) {
      // If email is empty
      $message .= "Phone Number: $phoneNumber\r\n\r\n";
      $email = "N\A";
    } else if (empty($phoneNumber)) {
      // If phone number is empty
      $message .= "Email Address: $email\r\n\r\n";
      $phoneNumber = "N\A";
    } else {
      // Else send both
      $message .= "Email Address: $email\r\n";
      $message .= "Phone Number: $phoneNumber\r\n\r\n";
    }
    
    // If w/o Permanent Residence is checked
    if (isset($withoutResidence)) {
      $message .= "Address: [Without Permanent Residence]\r\n\r\n";
      $zip = "N/A";
    } else {
      $message .= "Address: $street\r\n";
      $message .= "$city, WA $zip\r\n\r\n";
    }
    
    // Services:
    
    // If Utility Assistance is checked
      if (isset($utilities)) {
        $message .= "Utility Assistance: Requested\r\n";
        $utilities = "Utilities ";
      }
    
      // If Rent Assistance is Checked
      if (isset($rent)) {
       $message .= "Rent Assistance: Requested\r\n";
        $rent = "Rent ";
      } 
      
      // If Gas Voucher is Checked
      if (isset($gas)) {
        $message .= "Gas Voucher: Requested\r\n";
        $gas = "Gas ";
      }
    
      // If Thrifty Voucher is Checked
      if (isset($thrift)) {
        $message .= "Thrift Voucher: Requested\r\n";
        $thrift = "Thrift Store ";
      }
    
    
      // If License & ID is Checked
      if (isset($licenseID)) {
        $message .= "Identification Assistance: Requested\r\n";
        $licenseID = "DL/ID ";
      }
    
      // If Emergency Goods is Checked
      if (isset($supplies)) {
        $message .= "Emergency Supplies: Requested\r\n\r\n";
        $supplies = "Emergency Supplies ";
      }
    
      // If Other Service Requested
       if (isset($otherNeed)) {
        $message .= "Other Request: $otherRequest\r\n\r\n";
        $otherMessage = "Other: " .$otherRequest. " ";
      }
    
      // If comments isn't empty - add it to the message
      if(!empty($comments)) {
        // If email is empty
        $message .= "Comments & Questions: $comments\r\n\r\n";
      } 
    
    $success = mail($to, $subject, $message);   

    //Prevent sql injection
    $fname = mysqli_real_escape_string($cnxn, $fname);
    $lname = mysqli_real_escape_string($cnxn, $lname);
    $email = mysqli_real_escape_string($cnxn, $email);
    $phonenumber = mysqli_real_escape_string($cnxn, $phonenumber);
    $street = mysqli_real_escape_string($cnxn, $street);
    $city = mysqli_real_escape_string($cnxn, $city);
    $zip = mysqli_real_escape_string($cnxn, $zip);
    $otherMessage = mysqli_real_escape_string($cnxn, $otherMessage);
    
    
    // Sends to Table
    $sql = "INSERT INTO `outreach`(`date`, `fname`, `lname`, `email`, `number`, `street`, `zip`, `utility`, `rent`, `gas`, `thrift`, `license`, `goods`, `other`, `comments`) VALUES 
    
      (NOW(),
      '$fname',
      '$lname',
      '$email',
      '$phoneNumber',
      '$street',
      '$zip',
      '$utilities',
      '$rent',
      '$gas',
      '$thrift',
      '$licenseID',
      '$supplies',
      '$otherMessage',
      '$comments'
    )";
    
    $success = mysqli_query($cnxn, $sql);

  }

?>