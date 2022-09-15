<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <title>Smart Store</title>
</head>
<style>
  /* mobile */
  @media screen and (max-width: 480px) {
    section {
      margin-top: 3.9rem;
    }
    .carousel-item {
    height: 40vh;
  }
  .carousel-item  img {
      position: absolute;
      top: 0;
      left: 0;
      min-height: 324px;
  }
  .brand{
  /* margin: 0; */
  }
  .card{
      box-shadow: 0px 4px 23px 7px rgb(0 0 0 / 75%);
      width: 10rem;
    }
    #brand{
      margin-left: 1rem;
    }
  }
  /* mobile close */
  
  @media screen and (min-width: 481px) {
    section {
      /* height: 70vh; */
      margin-top: 4.3rem;
    }
    .home_page{
      height: 90vh;
    }
    .card{
      box-shadow: 0px 4px 23px 7px rgb(0 0 0 / 75%);
      width: 18rem;
    }
    #brand{
      margin-left: 10rem;
    }
    
  }
  
  
</style>

<body>

  <?php
  include('header.php');
  ?>

  <!-- Carousal -->
  <section>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner home_page">
      <div class="carousel-item active">
        <img src="img/mi10.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/vivo21.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/samsungs9.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- company -->
  <h3 class="text-center mt-5 brand">Brands</h3>
  <div class="container text-center d-flex align-items-center justify-content-center" id="brand">
    <div class="row">
      <!-- redmi -->
      <div class="g-col-4  col m-3">
      <div class="card" >
        <img src="img/logo/mi.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Redmi SmartPhone</h5>
          <a href="mi.php" class="btn btn-primary">Buy Now</a>
        </div>
      </div>
      </div>

      <!-- samsung -->
      <div class="g-col-4 col m-3">
      <div class="card" >
        <img src="img/logo/samsung.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Samsung SmartPhone</h5>
          <a href="samsung.php" class="btn btn-primary">Buy Now</a>
        </div>
      </div>
      </div>

      <!-- vivo -->
      <div class="g-col-4 col m-3">
      <div class="card" >
        <img src="img/logo/vivo.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Vivo SmartPhone</h5>
          <a href="vivo.php" class="btn btn-primary">Buy Now</a>
        </div>
      </div>
      </div>

      <!-- oppo -->
      <div class="g-col-4 col m-3">
      <div class="card">
        <img src="img/logo/oppo.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Oppo SmartPhone</h5>
          <a href="oppo.php" class="btn btn-primary">Buy Now</a>
        </div>
      </div>
      </div>

      <!-- oneplus -->
      <div class="g-col-4 col m-3">
      <div class="card" >
        <img src="img/logo/oneplus.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Oneplus SmartPhone</h5>
          <a href="oneplus.php" class="btn btn-primary">Buy Now</a>
        </div>
      </div>
      </div>

      <!-- realme -->
      <div class="g-col-4 col m-3">
      <div class="card">
        <img src="img/logo/realme.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Realme SmartPhone</h5>
          <a href="realme.php" class="btn btn-primary">Buy Now</a>
        </div>
      </div>
      </div>

    </div>
  </div>

  <!-- upcoming phones -->
  <div class="container mb-5">
    <h3 class="h3 text-center mt-5">Upcoming Smart Phones</h3>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/upcomming/miupcoming.png" class="d-block w-100" alt="...">
        </div>

        <div class="carousel-item">
          <img src="img/upcomming/samsungupcoming.png" class="d-block w-100" alt="...">
        </div>

        <div class="carousel-item">
          <img src="img/upcomming/vivoupcoming.png" class="d-block w-100" alt="...">
        </div>

      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <!-- footer -->
  <footer>
  <?php
  include('footer.php');
  ?>
  </footer>
</section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>