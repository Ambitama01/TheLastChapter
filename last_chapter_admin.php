<?php include("navigation_admin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!--Linking bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!--Custom css file link-->
     <link rel="stylesheet" href="last_chapter_admin.css">
    
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="lib.jpg" class="carousel" alt="...">
      <div class="carousel-caption">
          <h1 class="title"><b>The Last Chapter</b></h1>
          <p class="login"><a href="login_admin.php" >Log In </a>or <a href="signup_form.php"> Sign Up </a> as admin.</p>
        </div>
    </div>
    <div class="carousel-item">
      <img src="book2.jpg" class="carousel" alt="...">
      <div class="carousel-caption">
          <p class="paragraph"></p>
        </div>
    </div>
    <div class="carousel-item">
      <img src="book3.jpg" class="carousel" alt="...">
      <div class="carousel-caption">


        </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    
</body>
</html>