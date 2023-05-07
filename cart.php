<?php
     include("navbar.php");
     require_once ('component.php');
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

     <!--Linking bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        

         <!--font awesome cdn link-->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--Custom css file link-->
        <link rel="stylesheet" href="cart.css">               
</head>
<body>
     <div class="column1">
         <h1><u class="thick">My Cart</u></h1>
         <h2>“The books that the world calls immoral are books that show the world its own shame.” – Oscar Wilde</h2>
         <div class="row px-5">
             <div class="col-md-7">
                <div class="shopping-cart column2">
                    <?php
                    if(isset($_SESSION['cart'])){
                    
                    $total=0;
                    $sql="SELECT * from book_details";
                    $result = $conn->query($sql);
                    while($row=mysqli_fetch_assoc($result)){
                        foreach($_SESSION['cart'] as $key=>$value){
                            if ($row['Book_id']==$key){
                                cartElements($row['Image'],$row['Book_name'],$row['Author'],$row['Genre'],$row['Rent'],$row['Book_id']);
                                $total=$total+(int)$row['Rent'];
                                
                            }
                        }
                    }
                    ?>
                </div>
             </div>
             <div class="col-md-3 column3">
             <h6>Price Details</h6>
                <div class="pt-4">
                    
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
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6><?php echo $total;?></h6>
                            <h6 class="text-success">Free</h6><hr>
                            <h6><?php echo $total;?></h6>
                        </div>
                        <button class="btn-btn-primary" id="checkout" name="submit"><a href="checkout.php">CHECKOUT</a></button>
                        <?php
                        }else{
                            echo "<h4>Cart feels so light! Add some books</h4>";
                        }
                        ?>
                
                    </div>
                </div>
             </div>
         </div>
     </div>  
     <?php
      include('footer.php');
     ?>
</body>
</html>