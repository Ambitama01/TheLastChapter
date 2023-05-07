<?php include('.\theme\navbar.php'); ?>
<html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>

        <!--Linking bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!--Custom css file link-->
        <link rel="stylesheet" href="landing.css">
        
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
         <p class="login"><a href="" class="show-modal" data-toggle="modal" data-target="#myModal">Log In </a>or <a href=""> Sign Up </a> a better experience.</p>
         <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
          <div class="modal-content clearfix">
              <--Close button-->
             <div class="modal-body">
                                 
              <!--Login Content-->
              </div>
           </div>
      </div>
</div>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>