<?php
    include("navbar.php");
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
    $Book_name ='';
    $Author='';
    $Genre='';
    $Synopsis ='';
    $Price =''; 
    $Rent ='';
    $Availability =''; 
    $Image='';

    if(isset($_GET['id'])){
        $Book_id = $_GET['id'];
       $sql = "SELECT * FROM book_details  WHERE Book_id='$Book_id'";
       $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($result);
    
        $Book_name  = $row['Book_name'];
        $Author  = $row['Author']; 
        $Genre  = $row['Genre'];
        $Synopsis  = $row['Synopsis'];
        $Price  = $row['Price'];
        $Rent  = $row['Rent'];
        $Availability  = $row['Availability'];
        $Image=$row['Image'];
    }
    if(isset($_POST['add'])){
        //print_r($_POST['product_id']);
        if(isset($_SESSION['cart'])){

           $item_array_id= array_column($_SESSION['cart'], "product_id");
           echo "<script>alert('Product is added in the cart!')</script>";
            //print_r($_SESSION['cart']);

            if(in_array($_POST['product_id'],$item_array_id)){
                echo "<script>alert('Product is already added in the cart!')</script>";
                echo"<script>window.location='historical_fiction.php'</script>";
                
            }else{
                $count=count(($_SESSION['cart']));
                $item_array=array(
                    'product_id'=>$_POST['product_id']
                );
                $_SESSION['cart'][$count]=$item_array;
                //print_r($_SESSION['cart']);
            }
        }else{
            $item_array=array(
                'product_id'=>$_POST['product_id']
            );
            //create session variable
            $_SESSION['cart'][0]= $item_array;
            //print_r($_SESSION['cart']);
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Book_name ?></title>
    <!--Linking custom css file-->
    <link rel="stylesheet" href="single.css">
</head>
<body>
    <form action="historical_fiction.php" method="post">
    <div class="container">
        <div class="row">
                <div class="col-md-6 ">
                    <img src="<?php echo $Image ?>" alt="" class='img-fluid' style='height:500px;width:500px;'>
                </div>
                <div class="col-md-6 pt-5">
                <h2><b><?php echo $Book_name ?></b></h>
                <h4><b> <?php echo  $Author ?> </b></h4>
                <h4><b> <?php echo  $Genre ?> </b></h4>
                <p><?php echo $Synopsis ?></p>
                <h6><b>Price- <?php echo  $Price ?> </b></h6>
                <h6><b>Rent- <?php echo  $Rent ?> </b></h6>
                <h6><b> <?php echo  $Availability ?> </b></h6> 
                <button type="submit" class="btn-btn-primary" name="add">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                <input type='hidden' name='product_id' value='<?php echo $row['Book_id'];?>'>           
            </form>
                </div>
        </div>
    </div>
</body>
</html>
