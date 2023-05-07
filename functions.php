<?php

use function PHPSTORM_META\type;

$servername="localhost:3307";
$username="root";
$password="";
$dbname="library";
//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}
function pr($arr){
    echo '<pre>';
    print_r($arr);

}
function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();

}
function get_safe_value($conn,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($conn,$str);
	}
}

?>