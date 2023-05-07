<?php
  include ('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  .Update_package{
    margin-top: 100px;
    width: 500px;
    margin-left: 100px;
  }
</style>
<body>
  <?php
  if(isset($_SESSION['USER_LOGIN'])){
  ?>
<div class="row px-5">
  <div class="col-md-6">
    <form method="POST" class="Update_package" >
    <h3>Renew Membership</h3>
      <div class="mb-3" >
        <label for="package" class="form-label">Package</label>
        <input type="text" name="package" class="form-control" id="package">             
        <h6>*Your Security Deposit is <?php echo $_SESSION['SD']; ?>.</h6>
      </div>
      <button type="submit" name="submit" class="btn btn-warning make_payment" >Submit</button>
    </form>
  </div>
  <div class="col-md-6">
    
  <form method="POST" class="Update_package" >
  <h3>Try a New Package</h3>
  <h6>Because new is always better!!!</h6>
      <div class="mb-3" >
        <label for="package" class="form-label">Package</label>
        <input type="text" name="package_up" class="form-control" id="package">   
        <label for="Security_deposit" class="form-label">Security Deposit</label>
        <input type="text" name="Security_deposit" class="form-control" id="Security_deposit">          
        <h6>*For more informations on packages and  security deposit please visit our About Us page before making payment.</h6>
      </div>
      <button type="submit" name="update" class="btn btn-warning make_payment" >Submit</button>
    </form>
  </div>
</div>
<?php
      include('footer.php');
  }else{
    ?>
    <h2 style="margin-top: 100px;font-size:22px;text-align:center;">Please Log In first.</h2>
    <?php

  }
     ?>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  $sessionid=  $_SESSION['USER_ID'] ;
  $Package=$_POST['package'];
  $sessionid=  $_SESSION['USER_ID'] ;
  $sql_p="UPDATE customer_details set Package='$Package', Time_stamp=CURRENT_TIMESTAMP where id='$sessionid';";
    if(mysqli_query($conn,$sql_p)==1){
        $_SESSION['PACKAGE']=$Package;
        $_SESSION['temp_package']=$Package;
  }
  ?>
  <script>
      window.location.href='payment_pack.php';
  </script>
  <?php
}
if(isset($_POST['update'])){
  $sessionid=  $_SESSION['USER_ID'] ;
  $Package=$_POST['package_up'];
  $sd=$_POST['Security_deposit'];
  $sessionid=  $_SESSION['USER_ID'] ;
  $sql_p="UPDATE customer_details set Package='$Package', Security_deposit=$sd,Time_stamp=CURRENT_TIMESTAMP where id='$sessionid';";
    if(mysqli_query($conn,$sql_p)==1){
        $_SESSION['PACKAGE']=$Package;
        $_SESSION['SD']=$sd;
        $_SESSION['temp_sd']=$sd;
        $_SESSION['temp_package']=$Package;
  }
  ?>
  <script>
     window.location.href='payment.php';
  </script>
  <?php
}
?>