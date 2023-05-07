<?php include('navbar.php');

//get the search keyword
$search='';
$search=$_POST['search'];

$Book_id='';
$Book_name ='';
$Author='';
$Genre='';
$Synopsis ='';
$Price =''; 
$Rent ='';
$Availability =''; 
$Image='';

//sql query to the product 
$sql="SELECT * from book_details where Book_name LIKE '%$search%'";
$result=mysqli_query($conn ,$sql);
$countrow=mysqli_num_rows($result);

//check whether the product is available
if($countrow>0){
    while($row= mysqli_fetch_assoc($result)){
        $Book_id= $row['Book_id'];
        $Book_name  = $row['Book_name'];
        $Author  = $row['Author']; 
        $Genre  = $row['Genre'];
        $Synopsis  = $row['Synopsis'];
        $Price  = $row['Price'];
        $Rent  = $row['Rent'];
        $Availability  = $row['Availability'];
        $Image=$row['Image'];
        ?>
            <form action="" method="post">
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
                </div>
        </div>
    </div>
    </form>
        <?php
    }

}else{
    echo "<div class=\"not_found\">Book not found!!!</div>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!--Linking custom css file-->
    <link rel="stylesheet" href="single.css">
</head>
<body>
   <?php 
   include('footer.php');?>
</body>
</html>
