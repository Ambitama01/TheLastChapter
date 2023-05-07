<html>
<html lang="en">
  <?php
    session_start();
        
        
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    </title>
      <!--Linking bootstrap-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    <!--Linking javascript-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
         <!--Linking jquery-->
   <script src="https://code.jquery.com/jquery-3.6.0.js" 
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> 
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Custom css file link-->
    <link rel="stylesheet" href=".\theme\navbar.css">
</head>
<body>
<nav class="navbar navbar-light  fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h3><b>The Last Chapter</b></h3></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="fa fa-bars"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header border=0">
        The Shelter Of A Bookworm
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end ">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="search.php"><i class="fa fa-home"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " id="browse-btn" aria-current="page" href="#" onclick="myFunction()"><i class="fa fa-globe" ></i> Browse <i class="fa fa-caret-down"></i></a>
            <div class="dropdown" id="Mydropdown">
            <ul >
              <li><a href="action.php">Action</a></li>
              <li><a href="classics.php">Classics</a></li>
              <li><a href="comics.php">Comics</a></li>
              <li><a href="mystery.php">Mystery</a></li>
              <li><a href="fantasy.php">Fantasy</a></li>
              <li><a href="historical_fiction.php">Historical Fiction</a></li>
              <li><a href="horror.php">Horror</a></li>
              <li><a href="literary_fiction.php">Literary Fiction</a></li>
              <li><a href="romance.php">Romance</a></li>
              <li><a href="sci-fi.php">Sci-fi</a></li>
              <li><a href="short_stories.php">Short Stories</a></li>
              <li><a href="thriller.php">Thriller</a></li>
              <li><a href="bibliography.php">Bibliography</a></li>
              <li><a href="history.php">History</a></li>
              <li><a href="poetry.php">Poetry</a></li>
              <li><a href="non-fiction.php">Non-Fiction</a></li>  
              <li><a href="children.php">Children</a></li>
              <li><a href="lgbtq.php">LGBTQ</a></li>
              <li><a href="misc.php">Miscellaneous</a></li>
              <li><a href="self-help.php">Self Help</a></li>
            </ul>
            </div>
          </li>
          <li class="nav-item">
            <?php
            $count=0;
            if(isset($_SESSION['cart']))
            {
              $count=count($_SESSION['cart']);
              echo '<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i> My Cart('.$count.')</a>';
            }
            else{
              echo '<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i> My Cart(0)</a>';
            }
            ?>
          </li>
        <li class="nav-item">
          <?php
          if(isset($_SESSION['USER_LOGIN'])){
            echo '<a class="nav-link" href="#" onclick="book_issued()"><i class="fa fa-user"></i> Hi, '.$_SESSION['USER_NAME'].' <i class="fa fa-caret-down"></i></a>
            <div class="dropdown" id="Mybooks">
            <ul >
              <li><a href="account.php">Profile</a></li>
              <li><a href="book_issued.php">Books Issued</a></li>
              <li><a href="update_package.php">Update Package</a></li>
            </ul>
            </div>';

          }else{
            echo '<a class="nav-link" href="login.php"><i class="fa fa-sign-in"></i> Log In</a>';
          }
          ?>
          </li>
          <form class="d-flex" action="searchbar.php" method="POST">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn-btn-outline-success" name="submit" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
</body>
</html>
<script>
  function myFunction() {
  document.getElementById("Mydropdown").classList.toggle("show");
}
function book_issued() {
  document.getElementById("Mybooks").classList.toggle("show1");
}
 
</script>
<?php
  if(isset($_SESSION['USER_LOGIN'])){
      $_SESSION['day']=0;
      $id=$_SESSION['USER_ID'];
      $exp='<p style="background-color:red;color:black;text-align:center;">Expired</p>';
      $sql=mysqli_query($conn,"SELECT return_date from order_details where User_id='$id' and approve='$exp';");
      while ($row = mysqli_fetch_assoc($sql))
      {
        $date=strtotime($row['return_date']);
        $current_date=strtotime(date("Y-m-d"));
        $diff=$current_date-$date;
        if($diff>=0){
          $day=floor($diff/(60*60*24));
          $_SESSION['day']=$day;
        }

      }
  }
?>