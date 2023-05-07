<?php 
require('functions.php');
include('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

   <!--Linking jquery-->
   <script src="https://code.jquery.com/jquery-3.6.0.js" 
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!--Linking stylesheet-->
    <link rel="stylesheet" href="login.css">
    <script src="main.js"></script>
</head>
<body>
<form class="container" method="POST">
    <h3 class="login">Log In</h3>
    <div class="form-floating mb-3">
    <input type="email" class="form-control" name="Email" id="Email" placeholder="name@example.com" required>
    <label for="floatingInput">Email address</label>
    <span class="field_error" id="Email_error"></span>
  </div>
  <button type="button" name= "submit" class="btn-btn-primary" onclick="forgot_password()">Submit</button>
  <div class="field_error">
</div>
</form>
<div class="form-output login_msg">
  <p class="form-message field_error"></p>
</div>
</body>
<script>

  function forgot_password(){
    var Email=jQuery('#Email').val();
    if(Email == ''){
      jQuery('#Email_error').html('Please enter email id');

    }else{
      jQuery.ajax({
          type: "post",
          url: "forgot_password_submit.php",
          data: "Email"+Email,
          success: function (result) {
           jQuery('#Email_error').html(result);   
          }
      });

      }
        
    }

    
</script>
</html>