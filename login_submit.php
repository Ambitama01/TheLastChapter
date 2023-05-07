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
 
  
  $Email= get_safe_value($conn,$_POST['Email']);
  $Password= get_safe_value($conn,$_POST['Password']);

  $result=mysqli_query($conn,"SELECT * from customer_details where Email='$Email' and Password='$Password' ");
  $check_user=mysqli_num_rows($result);
  if($check_user >0){
    $row=mysqli_fetch_assoc($result);
    $_SESSION['USER_LOGIN'] = 'yes';
    $_SESSION['USER_ID'] = $row['id'];
    $_SESSION['USER_NAME'] = $row['Firstname'];
    $_SESSION['PACKAGE']=$row['Package'];
    $_SESSION['SD']=$row['Security_deposit'];
    $_SESSION['EMAIL']=$row['email'];
    echo "valid";
  }else{
     echo "wrong";
  }

?>