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
  $Firstname= get_safe_value($conn,$_POST['Firstname']);
  $Lastname= get_safe_value($conn,$_POST['Lastname']);
  $Email= get_safe_value($conn,$_POST['Email']);
  $Password= get_safe_value($conn,$_POST['Password']);
  $Number= get_safe_value($conn,$_POST['Number']);
  $Package= get_safe_value($conn,$_POST['Package']);
  $Security_deposit= get_safe_value($conn,$_POST['Security_deposit']);
  $_SESSION['temp_package']=get_safe_value($conn,$_POST['Package']);
  $_SESSION['temp_sd']=get_safe_value($conn,$_POST['Security_deposit']);
  
  $check_user=mysqli_num_rows(mysqli_query($conn,"SELECT * from customer_details where Email='$Email' "));
  if($check_user >0){
    echo"Email Id already exists!!";
  }else{
      mysqli_query($conn,"INSERT into customer_details(Firstname,Lastname,Email,Password,Number,Package,Security_deposit) 
      values('$Firstname','$Lastname','$Email','$Password','$Number','$Package',$Security_deposit)");
    echo "Insert";

  }

?>