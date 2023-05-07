<?php
session_start();
require('functions.php');
  $servername="localhost";
  $username="sayani";
  $password="abcdefg";
  $dbname="library";
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $quantity=1;
    if(isset($_SESSION['USER_LOGIN'])){
    $user_id=$_SESSION['USER_ID'];
    echo "User id is".$user_id;
    $var='<p style="background-color:red;color:black;text-align:center;">Expired</p>';
    $sql_check="SELECT * FROM `order_details` WHERE User_id='$user_id' and (approve='yes' or approve='' or approve='$var');";
    $result_check=mysqli_query($conn,$sql_check);
    if(mysqli_num_rows($result_check)>0){
         echo '<script>alert("Cannot proceed further. You have already issued one book")</script>';
         ?>
         <script>
             window.history.go(-1);
         </script>
         <?php
         
    }else
    if($_SESSION['PACKAGE']==0){
        echo '<script>alert("Your membership has expired. Please renew your subscription.");</script>'; 
        ?>
        <script>
            window.history.go(-1);
        </script>
        <?php  
    }
    else if($_SESSION['SD']!="999" && $_SESSION['SD']!="1999" && $_SESSION['SD']!="2999"){
        echo '<script>alert("Cannot add book to cart.Please update your Security Deposit");</script>';
        ?>
        <script>
            window.history.go(-1);
        </script>
        <?php
    }
    else if($_SESSION['cart']>0){
        echo '<script>alert("Cannot add more than 1 item to cart");</script>';
        ?>
        <script>
            window.history.go(-1);
        </script>
        <?php
    }else{
    $_SESSION['cart'][$id]=array('quantity'=> $quantity);
    header('location:cart.php');
    print_r($_SESSION['cart']);
    }
    } else if($_SESSION['cart']>0){
        echo '<script>alert("Cannot add more than 1 item to cart");</script>';
        ?>
        <script>
            window.history.go(-1);
        </script>
        <?php
    }else{
    $_SESSION['cart'][$id]=array('quantity'=> $quantity);
    header('location:cart.php');
    print_r($_SESSION['cart']);
    }}
?>