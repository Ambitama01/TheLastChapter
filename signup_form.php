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
    <input type="text" name="Firstname" class="form-control"  id="Firstname" placeholder="Your first name">
    <label for="floatingInput">First Name</label>
    <span class="field_error" id="Firstname_error"></span>
  </div>
  
  <div class="form-floating mb-3">
    <input type="text" name="Lastname" class="form-control" id="Lastname" placeholder="Your last name">
    <label for="floatingInput">Last Name</label>
    <span class="field_error" id="Lastname_error"></span>
  </div>
  
  <div class="form-floating form-inline mb-3">
    <input type="email" name="Email" class="form-control" id="Email" placeholder="name@example.com">
    <label for="floatingInput">Email address</label>

    <button type="button"  class="btn-btn-primary email_sent_otp" id="email_btn" onclick="email_sent_otp()">Send OTP</button>
    <input type="text" name="Email_otp" class="form-control email_verify_otp" id="Email_otp" placeholder="Enter OTP">
    <button type="button"  class="btn-btn-primary email_verify_otp" id="email_verify_btn" onclick="email_verify_otp()">Verify OTP</button>
    <span id="email_otp_result"></span>
    <span class="field_error" id="Email_error"></span>
  </div>
  <div class="form-floating mb-3">
    <input type="password" name="Password" class="form-control" id="Password" placeholder="Password" maxlength="13" minlength="8" title="8-13 characters">
    <label for="floatingInput">Password</label>
    <span class="field_error" id="Password_error"></span>
  </div>
 
  <div class="form-floating mb-3">
    <input type="text" name="Number" class="form-control" id="Number" placeholder="Contact Number">
    <label for="floatingInput">Contact Number</label>
    <span class="field_error" id="Number_error"></span>
  </div>

  <div class="form-floating mb-3">
    <input type="text" name="Package" class="form-control" id="Package" placeholder="Package">
    <label for="floatingInput">Package</label>
    <span id="package_result"></span>
  <span class="field_error" id="Package_error"></span>
 
</div>
<div class="form-floating mb-3">
    <input type="text" name="Security_deposit" class="form-control" id="Security_deposit" placeholder="Security_deposit">
    <label for="floatingInput">Security Deposit</label>
    <span id="Security_deposit_result"></span>
  <span class="field_error" id="Security_deposit_error"></span>
 
</div>
 
  <button type="button" name="register_button" id="register_button" class="btn-btn-primary mt-3" onclick="User_register()" disabled>Submit</button>
  <h5 class="mt-3">Already have an account?<a href="login.php">Log In</a> here.</h5>
</form>
<div class="form-output register_msg">
  <p class="form-message field_error"></p>
</div>
<input type="hidden" id="is_email_verified"/>
</body>
</html>
<script>
  function email_sent_otp(){
    jQuery('#Email_error').html('');
    var Email=jQuery('#Email').val();
    if(Email == ''){
      jQuery('#Email_error').html('Please enter email id');

    }else{
      jQuery('.email_sent_otp').html('Please wait....');
      jQuery('.email_sent_otp').attr('disabled',true);
      jQuery.ajax({
        type: "post",
        url: "send_otp.php",
        data: "Email="+Email+"&type=email",
        success: function (result) {
          if(result == 'done'){
            jQuery('#Email').attr('disabled',true);
            jQuery('.email_verify_otp').show();
            jQuery('.email_sent_otp').hide();
          }
            else{
            jQuery('.email_sent_otp').html('Send otp');
            jQuery('.email_sent_otp').attr('disabled',false);
            jQuery('#Email_error').html('Please try after sometime.');
          }
        }
      });
     
    }
  }
  
    function email_verify_otp(){
      jQuery('#Email_error').html('');
      var Email_otp=jQuery('#Email_otp').val();
      if(Email_otp == ''){
        jQuery('#Email_error').html('Please enter OTP');
      }else{
        jQuery.ajax({
        type: "post",
        url: "check_otp.php",
        data: "otp="+Email_otp+"&type=Email",
        success: function (result) {
          if(result == 'done'){
            jQuery('.email_verify_otp').hide();
            jQuery('#email_otp_result').html('Email id verified');
            jQuery('#is_email_verified').val('1');
            if(jQuery('#is_email_verified').val() == 1){
              jQuery('#register_button').attr('disabled',false);
            }
          }else{
            jQuery('#Email_error').html('Please enter valid OTP.');
          }
        }
      });
      }
        
    }
</script>
