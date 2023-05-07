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
    unset($_SESSION['USER_LOGIN']);
    unset($_SESSION['USER_ID']);
    unset($_SESSION['USER_NAME']);
    header('location:search.php');
    die();
?>