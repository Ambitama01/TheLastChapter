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
 
  
  $Email= get_safe_value($conn,$_POST['Email']);
  $result=mysqli_num_rows(mysqli_query($conn,"SELECT * from customer_details where Email='$Email' "));
  $check_user=mysqli_num_rows($result);

  if($check_user >0){

   $row=mysqli_fetch_assoc($result);
   $pwd=$row['Password'];
    $_SESSION['EMAIL_OTP']=$otp;
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->SMTPSecure="tls";
    $mail->SMTPAuth=true;
    $mail->Username="sayanihati2001@gmail.com";
    $mail->Password="beverlyhills90210";
    $mail->SetFrom("sayanihati2001@gmail.com");
    $mail->addAddress($Email);
    $mail->IsHTML(true);
    $mail->Subject="New OTP";
    $mail->Body="$pwd is your password";
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if($mail->send()){
        echo "done";
    }else{
        echo "Error occur";
    }
    $mail->smtpClose();  
  }else{

  }
  
  

?>