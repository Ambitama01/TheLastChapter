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
    unset($_SESSION['ADMIN_LOGIN']);
    unset($_SESSION['ADMIN_ID']);
    unset($_SESSION['ADMIN_NAME']);
    header('location:book_request.php');
    die();
?>