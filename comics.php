<html>
    <html lang="en">
        <?php
        
        include("./theme/navbar.php");
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
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Enjoy the Comics!!</title>

        <!--Linking bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!--Linking javascript-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        

         <!--font awesome cdn link-->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--Custom css file link-->
        <link rel="stylesheet" href="Mystery.css">
        <link rel="stylesheet" href="modal.css">           
    </head>

    <body>
        <!--home section starts-->
        <div class="title" id="title">
            <h1>Did Someone Say Comics?</h1>
        </div>
        <div class="tagline">
            <h2>“I've died before. It was boring, so I stood up.” ― Warren Ellis</h2>
        </div>
            <div class="container">
                <div class="row text-center py-5">
                    <?php
                    $sql = "SELECT * from book_details where Genre='Comics'";
                    $result = $conn->query($sql);
                    if(!empty($result))
                    {
                        while ($row = mysqli_fetch_assoc($result)){
                            ?>
                            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                                <form action="comics.php" method="post">
                                    <div class="card shadow">
                                        <div>
                                            <a href="comics_single.php?id=<?php echo $row['Book_id'];?>"><img src=<?php echo $row['Image'];?> alt="Image1" class="img-fluid card-img-top"></a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['Book_name'];?></h5>
                                            <h5 class="card-title"><?php echo $row['Author'];?></h5>
                                            <h5>
                                                Price-<span class="price"><?php echo $row['Price'];?></span>
                                            </h5>
                                            <h5>
                                                Rent-<span class="price"><?php echo $row['Rent'];?></span>
                                            </h5>
                                            <h5>
                                                Availability-<span class="price"><?php echo $row['Availability'];?></span>
                                            </h5>
                                            <a href="addToCart.php?id=<?php echo $row['Book_id'];?>" class="btn-btn-primary" name="add" >Add to Cart <i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </form>
                            </div><?php
                        }
                    }else{
                        echo "0 results";
                    }
                    ?>
                   
                </div>
            </div> 
            <div class="top">
       <a href="#title"><i class="fa fa-arrow-up"></i></a>
     </div>          
           <?php
           include('./theme/footer.php');
           ?>
    </body>
   
</html>