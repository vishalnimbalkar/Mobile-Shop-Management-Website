<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Redmi Smart Phones</title>
</head>
<style>
  /* mobile */
  @media screen and (max-width: 480px) {
    section {
      margin-top: 5.9rem;
    }
    .card{
      box-shadow: 0px 4px 13px 7px rgb(0 0 0 / 35%);
      width: 10rem;
    }
  }
  /* mobile close */
  
  @media screen and (min-width: 481px) {
    section {
      /* height: 70vh; */
      margin-top: 4.9rem;
      margin-left: 4rem;
    }

    .card{
      box-shadow: 0px 4px 23px 7px rgb(0 0 0 / 75%);
      width: 18rem;
    }
    
  }
  
</style>
<body>

  <?php
  include('header.php');
  ?>

  <!-- Products -->
  <section>
  <div class="container text-center m-5">
    <div class="row my-5">
      <h3 class="text-center">Redmi SamrtPhones</h3>

      <?php

      $sql = "select * from products";


      $result = mysqli_query($conn, $sql);


      $count = mysqli_num_rows($result);


      if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $brand_name = $row['brand_name'];
          $device_name = $row['device_name'];
          $price = $row['price'];
          $device_img = $row['img'];
          if ($brand_name == "mi") {
      ?>
            <div class="g-col-4 col my-5">
              <form action="user_address.php" method="post">
                <div class="card" >
                  <img src="upload/device_img/<?php echo $device_img; ?>" class="card-img-top" alt="...">
                  <div class="card-body text-center">
                    <h5 class="card-title"><?php echo $device_name; ?></h5>
                    <input type="hidden" name="device_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="device_name" value="<?php echo $device_name; ?>">
                    <input type="hidden" name="brand_name" value="<?php echo $brand_name; ?>">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <input type="hidden" name="device_img" value="<?php echo $device_img; ?>">
                    <h6 class="card-title bolder">From <span class="error">₹<?php echo $price; ?></span></h6>
                    <button type="submit" name="" class="btn btn-success">Buy Now</button>
                  </div>
                </div>
              </form>
            </div>
      <?php
          }
        }
      }
      ?>
    </div>
  </div>
  </section>
<?php
include "footer.php";
?>
  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

