<html>
<html lang="en">
  <?php
    session_start();
        
        
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
    <link rel="stylesheet" href="navbar.css">
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
            <a class="nav-link" aria-current="page" href="book_request.php">Book Request</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="issue_info.php">Issue Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="expire_info.php">Expired Books</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="returned_books.php">Returned Books</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="fine.php">Late Fine</a>
          </li>
          <li class="nav-item">
          <?php
          if(isset($_SESSION['ADMIN_LOGIN'])){
            echo '<a class="nav-link" href="#" onclick="logout()"><i class="fa fa-user"></i> Hi, '.$_SESSION['ADMIN_NAME'].'</a>
            <div class="dropdown" id="Mybooks">
            <ul >
              <li><a href="logout_admin.php">Log out</a></li>
            </ul>
            </div>';

          }else{
            echo '<a class="nav-link" href="login_admin.php"><i class="fa fa-sign-in"></i> Log In</a>';
          }
          ?>
          </li>
         
         
      </div>
    </div>
  </div>
</nav>
</body>
</html>
<script>
function logout() {
  document.getElementById("Mybooks").classList.toggle("show1");
}
 
</script>
