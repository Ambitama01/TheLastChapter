<?php include('navbar.php'); 

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
    ?>
               
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <!--Linking jquery-->
     <script src="https://code.jquery.com/jquery-3.6.0.js" 
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!--Linking stylesheet-->
    <link rel="stylesheet" href="signup.css">
    <script src="main.js"></script>


</head>
<body>
<form class="container" action="" method="Post" onsubmit="window.location.reload()">
    <h3 class="login mb-3">Sign Up</h3>
    <div class="form-floating mb-3">
    <input type="text" name="Name" class="form-control"  id="Name" placeholder="Your name">
    <label for="floatingInput">Name</label>
    <span class="field_error" id="name_error"></span>
  </div>
  
  <div class="form-floating form-inline mb-3">
    <input type="email" name="Email" class="form-control" id="Email" placeholder="name@example.com">
    <label for="floatingInput">Email address</label>
    <span class="field_error" id="Email_error"></span>
  </div>
  <div class="form-floating mb-3">
    <input type="password" name="Password" class="form-control" id="Password" placeholder="Password" maxlength="13" minlength="8" title="8-13 characters">
    <label for="floatingInput">Password</label>
    <span class="field_error" id="Password_error"></span>
  </div>
 
  <button type="button" name="register_button" id="register_button" class="btn-btn-primary mt-3" onclick="Admin_register()" >Submit</button>
  <h5 class="mt-3">Already have an account?<a href="login_admin.php">Log In</a> here.</h5>
</form>

</body>
</html>
