<?php
session_start();
require('functions.php');

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
  $Package= get_safe_value($conn,$_POST['Package']);

    include('smtp\PHPMailerAutoload.php');
    $mail= new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->SMTPSecure='tls';
    $mail->SMTPAuth=true;
    $mail->Username="sayanihati2001@gmail.com";
    $mail->Password="jqwujzzfgszlepbt";
    $mail->setFrom("sayanihati2001@gmail.com");
    $mail->addAddress("sayanihati2202@gmail.com");
    $mail->isHTML(true);
    $mail->Subject="Payment succesful";
    $mail->Body="You have succesfully subscribed to our $Package package.";
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