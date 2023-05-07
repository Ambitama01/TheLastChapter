<?php

use function PHPSTORM_META\type;

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
include('functions.php');
include('addtocart.php');

$Book_id=get_safe_value($conn,$Book_id);
$qty=get_safe_value($conn,$qty);
$type=get_safe_value($conn,$type);

$obj=new addtocart();
 if($type=='add'){
     $obj->addProduct($Book_id,$qty);
 }
echo $obj->totalProduct();
?>