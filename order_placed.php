<?php
session_start();
require('functions.php');
include('smtp\PHPMailerAutoload.php');

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
  $Email= $_SESSION['EMAIL'];
  
    $mail= new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->SMTPSecure='tls';
    $mail->SMTPAuth=true;
    $mail->Username="sayanihati2001@gmail.com";
    $mail->Password="jqwujzzfgszlepbt";
    $mail->setFrom("sayanihati2001@gmail.com");

    $mail->addAddress("$Email");
    $mail->isHTML(true);
    $mail->Subject="Order placed succesfully";
    $mail->Body="Your order has been succesfully placed.";
    $mail->SMTPOptions=array('ssl'=>array(
      'verify_peer'=>false,
      'verify_peer_name'=>false,
      'allow_self_signed'=>false
  ));
    if($mail->send()){
        echo "done";
    }else{
        echo "no";
    }


    

  

?>