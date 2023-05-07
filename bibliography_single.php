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
    <form action="bibliography.php" method="post">
    <div class="container" id="book">
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
                <a href="addToCart.php?id=<?php echo $row['Book_id'];?>" class="btn-btn-primary" name="add" >Add to Cart <i class="fa fa-shopping-cart"></i></a>    
            </form>
                </div>
        </div>
    </div>
    <?php
    include('footer.php');
    ?>
</body>
</html>
