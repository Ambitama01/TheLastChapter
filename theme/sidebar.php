<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Sidebar Menu with sub-menu </title>
      <link rel="stylesheet" href="sidebar.css">
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
       <div class="title">
           The Last Chapter

       </div>
      <div class="btn">
         <span class="fas fa-bars"></span>
      </div>
      <nav class="sidebar">
         <div class="text">
            The Shelter Of A Bookworm
         </div>
         <ul>
            <li class="active"><a href="search.php"><i class="fa fa-home"> Home</i></a></li>
            <li>
               <a href="#" class="feat-btn"><i class="fa fa-globe"> Browse</i> 
               <span class="fas fa-caret-down first"></span>
               </a>
               <ul class="feat-show">
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
            </li>
            <?php
            $count=0;
              if(isset($_SESSION['cart']))
              {
                $count=count($_SESSION['cart']);
              }
            ?>
            <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> My Cart(<?php echo $count;?>)</a></li>
            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
            <li><a href="#"><i class= "fa fa-user"></i> My account</a></li>
            <li><form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn-btn-outline-success" type="submit">Search</button>
        </form></li>
         </ul>
</nav>
      <script>
         $('.btn').click(function(){
           $(this).toggleClass("click");
           $('.sidebar').toggleClass("show");
         });
           $('.feat-btn').click(function(){
             $('nav ul .feat-show').toggleClass("show");
             $('nav ul .first').toggleClass("rotate");
           });
           $('.serv-btn').click(function(){
             $('nav ul .serv-show').toggleClass("show1");
             $('nav ul .second').toggleClass("rotate");
           });
           $('nav ul li').click(function(){
             $(this).addClass("active").siblings().removeClass("active");
           });
      </script>
   </body>
</html>