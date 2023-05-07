<?php include("./theme/navbar.php");
require('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Final Search page
    </title>
    <!--Linking bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--Custom css file link-->
    <link rel="stylesheet" href="landing.css">
    <link rel="stylesheet"  href="search.css" >
    
    
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src=".\pictures\book1.jpg" class="carousel" alt="...">
      <div class="carousel-caption">
          <h1 class="title">The Last Chapter</h1>
          <p class="paragraph">Enjoy the solace of books from the comfort of your home.</p>
        </div>
    </div>
    <div class="carousel-item">
      <img src=".\pictures\book2.jpg" class="carousel" alt="...">
      <div class="carousel-caption">
          <p class="paragraph">We care about your pleasure.</p>
        </div>
    </div>
    <div class="carousel-item">
      <img src=".\pictures\book3.jpg" class="carousel" alt="...">
      <div class="carousel-caption">
         <p class="login"><a href="login.php" >Log In </a>or <a href="signup_form.php"> Sign Up </a> a better experience.</p>

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
     <div class="title">
         <h1>Search your favourite books here.</h1><br>
     </div>
     <div class="tag">
        <h2>"If you dont't like to read, you haven't found the right book"-J.K.Rowling</h2>
     </div>
     <div class="search">
        <div class="container">
            <div class="box" id="action"><a href="action.php">Action</a></div>
            <div class="box" id="classics"><a href="classics.php">Classics</a></div>
            <div class="box" id="comics"><a href="comics.php">Comics</a></div>
            <div class="box" id="mystery"><a href="mystery.php">Mystery</a></div>
        </div>
        <div class="container">
            <div class="box" id="fantasy"><a href="fantasy.php">Fantasy</a></div>
            <div class="box" id="hfiction"><a href="historical_fiction.php">Historical Fiction</a></div>
            <div class="box" id="horror"><a href="horror.php">Horror</a></div>
            <div class="box" id="lfiction"><a href="literary_fiction.php">Literary Fiction</a></div>
        </div>
        <div class="container">
            <div class="box" id="romance"><a href="romance.php">Romance</a></div>
            <div class="box" id="sci-fi"><a href="sci-fi.php">Sci-fi</a></div>
            <div class="box" id="short"><a href="short_stories.php">Short Stories</a></div>
            <div class="box" id="thriller"><a href="thriller.php">Thriller</a></div>
        </div>
        <div class="container">
            <div class="box" id="bibliography"><a href="bibliography.php">Bibliography</a></div>
            <div class="box" id="history"><a href="history.php">History</a></div>
            <div class="box" id="poetry"><a href="poetry.php">Poetry</a></div>
            <div class="box" id="non-fiction"><a href="non-fiction.php">Non-Fiction</a></div>
        </div>
        <div class="container">
            <div class="box" id="children"><a href="children.php">Children</a></div>
            <div class="box" id="lgbtq"><a href="lgbtq.php">LGBTQ</a></div>
            <div class="box" id="miscellaneous"><a href="misc.php">Miscellaneous</a></div>
            <div class="box" id="self-help"><a href="self-help.php">Self Help</a></div>
        </div>   
     </div>
     <div class="top">
       <a href="#carouselExampleFade"><i class="fa fa-arrow-up"></i></a>
     </div>
     <?php
      include('./theme/footer.php');
     ?>
</body>
</html>
