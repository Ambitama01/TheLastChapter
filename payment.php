<?php
include('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <link rel="stylesheet" href="payment.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container d-flex justify-content-center mt-5 mb-5">

            

<div class="row g-3">

  <div class="col-md-6">  
    
    <span>Payment Method</span>
    <div class="card">

      <div class="accordion" id="accordionExample">
        
        <div class="card" id="Mybtn">
          <div class="card-header p-0" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <div class="d-flex align-items-center justify-content-between">

                  <span >Google Pay</span>
                  <img src="https://uxwing.com/wp-content/themes/uxwing/download/10-brands-and-social-media/google-pay.png" width="30">
                  
                </div>
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              <input type="text" class="form-control" placeholder="Enter UPI">
            </div>
          </div>
        </div>

        <div class="card" id="Vbtn">
          <div class="card-header p-0">
            <h2 class="mb-0">
              <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="d-flex align-items-center justify-content-between">

                  <span>Credit card</span>
                  <div class="icons">
                    <img src="https://i.imgur.com/2ISgYja.png" width="30">
                    <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                    <img src="https://i.imgur.com/35tC99g.png" width="30">
                    <img src="https://i.imgur.com/2ISgYja.png" width="30">
                  </div>
                  
                </div>
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body payment-card-body">
              
              <span class="font-weight-normal card-text">Card Number</span>
              <div class="input">

                <i class="fa fa-credit-card"></i>
                <input type="text" class="form-control" placeholder="0000 0000 0000 0000">
                
              </div> 

              <div class="row mt-3 mb-3">

                <div class="col-md-6">

                  <span class="font-weight-normal card-text">Expiry Date</span>
                  <div class="input">

                    <i class="fa fa-calendar"></i>
                    <input type="text" class="form-control" placeholder="MM/YY">
                    
                  </div> 
                  
                </div>


                <div class="col-md-6">

                  <span class="font-weight-normal card-text">CVC/CVV</span>
                  <div class="input">

                    <i class="fa fa-lock"></i>
                    <input type="text" class="form-control" placeholder="000">
                    
                  </div> 
                  
                </div>
                

              </div>

              <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>
             
            </div>
          </div>
        </div>
        
      </div>
      
    </div>

  </div>

  <div class="col-md-6">
      <span>Summary</span>

      <div class="card">

        <div class="d-flex justify-content-between p-3">

          <div class="d-flex flex-column">

            <span>Package </span>
            
          </div>

          <div class="mt-1">
            <?php
              $package= $_SESSION['temp_package'];
            ?>
            <sup class="super-price">Rs <?php echo $package?></sup>
          </div>
          
        </div>
        <hr class="mt-0 line">
        <div class="d-flex justify-content-between p-3">

        <div class="d-flex flex-column">

          <span>Security Deposit </span>
          
        </div>

        <div class="mt-1">
          <?php
            $sd= $_SESSION['temp_sd'];
          ?>
          <sup class="super-price">Rs <?php echo $sd?></sup>
        </div>

        </div>

        <hr class="mt-0 line">


        <div class="p-3 d-flex justify-content-between">

          <div class="d-flex flex-column">

            <span>Total Amount</span>
            
          </div>
          <?php
          $total=$package+$sd;
          ?>
          <span>Rs <?php echo $total;?></span>
        </div>
        <form action="" method="POST">
          <div class="p-3">
          <button class="btn btn-primary btn-block free-button" type="submit" name="payment">Make Payment</button> 
          </div>
        </form>



        
      </div>
  </div>
  
</div>


</div>
<?php
      include('footer.php');
     ?>
</body>
</html>

<?php
  if(isset($_POST['payment'])){
    ?>
    <script>
      alert ("Payment succesfull!");
      window.location.href='search.php';
    </script>
    <?php
  }
?>