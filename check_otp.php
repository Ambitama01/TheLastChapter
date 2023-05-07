<?php
session_start();
require('functions.php');

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
  $servername="localhost";
  $username="sayani";
  $password="abcdefg";
  $dbname="library";
  //Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  }
  $type=get_safe_value($conn,$_POST['type']);
  $otp=get_safe_value($conn,$_POST['otp']);
  if($type=='Email'){
      if($otp == $_SESSION['EMAIL_OTP']){
          echo "done";
      }else{
          echo "no";
      }
  }
  

?>