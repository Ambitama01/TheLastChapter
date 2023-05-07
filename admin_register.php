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
  $name= get_safe_value($conn,$_POST['Name']);
  $Email= get_safe_value($conn,$_POST['Email']);
  $Password= get_safe_value($conn,$_POST['Password']);
  
  $check_user=mysqli_num_rows(mysqli_query($conn,"SELECT * from admin where Email='$Email' "));
  if($check_user >0){
    echo"Email Id already exists!!";
  }else{
      mysqli_query($conn,"INSERT into admin(name,email,password) 
      values('$name','$Email','$Password')");
    echo "Insert";

  }

?>