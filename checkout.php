<?php include('navbar.php');
require('functions.php');
  $servername="localhost";
  $username="sayani";
  $password="abcdefg";
  $dbname="library";
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}


if (!isset($_SESSION['cart']) || count($_SESSION['cart']) ==0){
    ?>
        <script>window.location.href='search.php';</script>
    <?php
}
if(isset(    $_SESSION['USER_LOGIN'])){
$user_id=$_SESSION['USER_ID'];
$sql="SELECT * from customer_order where User_id=$user_id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
}

if(isset($_POST['submit'])){
    $var='<p style="background-color:red;color:black;text-align:center;">Expired</p>';
    $sql_check="SELECT * FROM `order_details` WHERE User_id=$user_id and (approve='yes' or approve='' or approve='$var');";
    $result_check=mysqli_query($conn,$sql_check);
    $row_check=mysqli_fetch_assoc($result_check);
    if(mysqli_num_rows($result_check)==1){
         echo '<script>alert("Cannot proceed further. You have already issued one book")</script>';
         
    }else
    if($_SESSION['PACKAGE']==0){
        echo '<script>alert("Your membership has expired. Please renew your subscription.");</script>';   
    }
    else if($_SESSION['SD']!="999" && $_SESSION['SD']!="1999" && $_SESSION['SD']!="2999"){
        echo '<script>alert("Cannot add book to cart.Please update your Security Deposit");</script>';
    }else{

    $address=get_safe_value($conn,$_POST['address']);
    $apartment=get_safe_value($conn,$_POST['apartment']);
    $state=get_safe_value($conn,$_POST['state']);
    $city=get_safe_value($conn,$_POST['city']);
    $pincode=get_safe_value($conn,$_POST['pincode']);
    $payment_type='pending';
    $user_id=$_SESSION['USER_ID'];

    if($payment_type = 'COD'){
        $payment_status='success';
    }
    $order_status='pending';

    $sql="SELECT * from customer_order where User_id=$user_id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)==1){
        $up_sql="UPDATE customer_order set address='$address' ,apartment='$apartment',state='$state',city='$city', pincode='$pincode' where User_id=$user_id";
        $updated=mysqli_query($conn,$up_sql);
        if($updated){
            if(isset($_SESSION['cart'])){

                foreach($_SESSION['cart'] as $key => $value){
                    
                    $sql_cart="SELECT * from book_details where Book_id=$key";
                    $result_cart=mysqli_query($conn,$sql_cart);
                    $row_cart=mysqli_fetch_assoc($result_cart);
                    $Bname=$row_cart['Book_name'];
                    $Author=$row_cart['Author'];
                    $genre=$row_cart['Genre'];
                    $price=$row_cart['Price'];
                    $rent=$row_cart['Rent'];

                    $insert_order="INSERT INTO `order_details`(`User_id`, `order_id`, `order_name`, `author`, `genre`, `price`, `rent`)
                    VALUES ('$user_id','$key','$Bname','$Author','$genre','$price','$rent');";
                    $order_inserted=mysqli_query($conn,$insert_order);
                    if($order_inserted){
                        ?>
                            <script>
                                window.location.href='thankyou.php';
                                <?php unset($_SESSION['cart']) ?>
                            </script>
                        <?php
                    }   
                }
            
        }
    }

    }else{
        $in_sql="INSERT INTO `customer_order`(`User_id`, `address`, `apartment`, `city`, `state`, `pincode`, `payment_type`, `payment_status`)
        VALUES ('$user_id','$address','$apartment','$city','$state','$pincode','$payment_type','$payment_status');";
        $inserted=mysqli_query($conn,$in_sql);
        if($inserted){
            //echo 'order table and order item--ins';
        }

    }

}}
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

    <link rel="stylesheet" href="cart.css">    
    <link rel="stylesheet" href="checkout.css">
    <script src="main.js"></script>
</head>
<body>
    <?php
    //echo "<pre>";
    //print_r( $_SESSION['cart']);
    //echo "</pre>";
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key => $value){
            $sql_cart="SELECT * from book_details where Book_id=$key";
            $result_cart=mysqli_query($conn,$sql_cart);
            $row_cart=mysqli_fetch_assoc($result_cart);
        }
    }
    ?>
<div class="column1">
    <h1><u class="thick">Checkout</u></h1>
    <div class="row px-5">
        <div class="col-md-7">
        <?php if(!isset( $_SESSION['USER_LOGIN'])) {?>
            <div class="shopping-cart column2">
                <div id="Mybtn" class="button">CHECKOUT MEHTOD</div>
                <div id="checkout_form">
                    <div class="row px-5">
                        <div class="col-md-6">
                            <form class="container" method="POST">
                                <h4 class="login">Checkout as Member</h4>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="login_Email" id="login_Email" placeholder="name@example.com" required>
                                    <label for="floatingInput">Email address</label>
                                    <span class="field_error" id="login_Email_error"></span>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="login_Password" id="login_Password" placeholder="Password" required>
                                    <label for="floatingInput">Password</label>
                                    <span class="field_error" id="login_Password_error"></span>
                                </div>
                                <button type="button" name= "login_button" class="btn-btn-primary" onclick="user_checkout_login()">Submit</button>
                                <div class="field_error">
                                </div>
                            </form>
                            <div class="form-output login_msg">
                                <p class="form-message field_error"></p>
                            </div>                    
                        </div>
                        <div class="col-md-6">
                            <form class="container" action="" method="Post" >
                                <h4 class="login">Checkout as New User</h4>
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
                                
                                <div class="form-floating mb-3">
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
                                    <button type="button"  class="btn-btn-primary make_payment" onclick="make_payment()">Make Payment</button>
                                    <span id="package_result"></span>
                                <span class="field_error" id="Package_error"></span>
                                <h6>*For more informations on package please visit our About Us page before making payment.</h6>
                                
                                </div>
                                
                                <button type="button" name="register_button" id="register_button" class="btn-btn-primary mt-3" onclick="User_register()" disabled>Submit</button>
                            </form>
                            <div class="form-output register_msg">
                                <p class="form-message field_error"></p>
                            </div>
                            <input type="hidden" id="is_email_verified"/>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <form class="container" method="POST">
            <div id="Shipbtn" class="button">ADDRESS INFORMATION</div>
                <div class=" column2" id="ship_form">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php if(isset($row['address'])){ echo $row['address']; }?>" required>
                            <label for="floatingInput">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="apartment" id="apartment" placeholder="Apartment"  value="<?php if(isset($row['apartment'])){echo $row['apartment'];} ?>" required>
                            <label for="floatingInput">Apartment/Block/House</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="state" id="state" placeholder="State" value="<?php if(isset($row['state'])){echo $row['state'];} ?>" required>
                            <label for="floatingInput">State</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php if(isset($row['city'])){echo $row['city'];} ?>" required>
                            <label for="floatingInput">City</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="pincode" value="<?php if(isset($row['pincode'])){echo $row['pincode'];} ?>" required>
                            <label for="floatingInput">Area Pin Code</label>
                        </div>
                                     
                </div>
                <div id="Billbtn" class="button">BILLING INFORMATION</div>
                <div id="bill_form">
                        <div class="cod">
                             COD <input type="radio" name="payment_type" value="COD">
                             &nbsp;&nbsp; CARD <input type="radio" name="payment_type" value="Card">
                             &nbsp;&nbsp; UPI <input type="radio" name="payment_type" value="UPI">
                        </div>        
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">I have read and accept all the <a href="">terms and condition</a>.
                    </label>
                </div><br><br><br>
              <button type="submit" name= "submit" class="btn-btn-primary mt-3" id="payment" onclick="order_placed()">CHECKOUT</button>
            </form>  
            
                
        </div>
             <div class="col-md-3 column3">
             <h6>Summary</h6>
                <div class="pt-4">
                    <div>
                    <?php
                    $total=0;
                   if(isset($_SESSION['cart'])){
                    require_once ('component.php');
                        $sql = "SELECT * from book_details";
                        $result = $conn->query($sql);
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach($_SESSION['cart'] as $key=>$value){
                                if ($row['Book_id']==$key){
                                    checkoutElements($row['Image'], $row['Book_name'],$row['Author'],$row['Genre'],$row['Rent'],$row['Book_id']);
                                    $total=$total+(int)$row['Rent'];
                                }
                                
                                }
                            }
                        }else{
                            echo "<h5>No Item</h5>";
                        }
            
                               
                    ?>
                    </div>
                    
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                                if(isset($_SESSION['cart'])){
                                    $count=count($_SESSION['cart']);
                                    echo "<h6>Price ($count items)</h6>";
                                }else{
                                    echo "<h6>Price (0 items)</h6>";
                                }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Order Total</h6>
                        </div>
                        <div class="col-md-6">
                            <h6><?php echo $total;?></h6>
                            <h6 class="text-success">Free</h6><hr>
                            <h6><?php echo $total;?></h6>
                        </div>
                    </div>
                </div>
             </div>
         </div>
     </div>  
    
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
    function make_payment(){
    jQuery('#Package_error').html('');
    var Package=jQuery('#Package').val();
    if(Package == ''){
      jQuery('#Package_error').html('Please choose a package');

    }else if(Package !== "999" && Package !== "1999" && Package !== "2999"){
      jQuery('#Package_error').html('We do not have such a package!');

    }
    else{
      jQuery('.make_payment').html('Please wait....');
      jQuery('.make_payment').attr('disabled',true);
      jQuery.ajax({
        type: "post",
        url: "make_payment.php",
        data: "Package="+Package,
        success: function (result) {
          if(result == 'done'){
            jQuery('.make_payment').hide();
            jQuery('#package_result').html('Payment is succesfuly complete.');
          }
            else{
            jQuery('#Package_error').html('Could not complete payment .');
          }
        }
      });
     
    }
  }

$(document).ready(function(){
	$('#Mybtn').click(function(){
  		$('#checkout_form').toggle(600);
  });
});

$(document).ready(function(){
	$('#Shipbtn').click(function(){
  		$('#ship_form').toggle(600);
  });
});

$(document).ready(function(){
	$('#Billbtn').click(function(){
  		$('#bill_form').toggle(600);
  });
});
function order_placed(){
    var Payment=jQuery('#payment').val();
      jQuery.ajax({
        type: "post",
        url: "order_placed.php",
        data: "Payment="+Payment,
        success: function (result) {
          if(result == 'done'){
            //window.location.href='thankyou.php';
          }
        }
      });
     
    }
   
    
</script>
<?php
      include('footer.php');
     ?>
</body>
</html>