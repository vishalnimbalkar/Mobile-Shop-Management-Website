<?php
include("user_verify.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title> User Dashboard</title>
</head>
<style>
  .photo {
    width: 100%;
    display: flex;
    flex-direction: column;
    margin-left: 100px;
  }
  .myphoto {
    width: 200px;
    height: 200px;
    border-radius: 117px;
  }
  /* mobile */
  @media screen and (max-width: 480px) {
    section {
      margin-top: 3.9rem;
    }
    .db{
        flex-direction: column;
    }
    .db_ele{
      position: sticky;
        flex-direction: row;
    }
    .ele{
        flex-direction: row;
        width: 100%;
    }
    .box{
        margin: 1rem;
        height: 2rem;
        width: 11rem;
    }
    .user_profile{
        flex-direction: column;
    }
    .p_card{
        display: none;
    }
    .p_detils{
       margin-right: 5rem;
    }
    .orders{
        margin-right:6rem;
        font-size: 0.7rem;
    }
    .cal_ord{
        width: 5rem;
        height: 2rem;
        /* background-color: red; */
    }
    
  }
  /* mobile close */
  
  @media screen and (min-width: 481px) {
    section {
      /* height: 70vh; */
      margin-top: 4.5rem;
    }
    .db_ele{
      position: sticky;
      top: 4.5rem;
        flex-direction: column;
        width: 280px; 
        height:90vh
    }
    .ele{
        flex-direction: column;
    }
    .box{
        margin: 1rem;
    }
    .user_profile{
        flex-direction: row;
    }
    .username{
        display: none;
    }
    .p_detils{
        width: 50%;
        margin-left: 3rem;
    }
  }
</style>

<body>
  <?php
  include("header.php");
  ?>
  <!-- dashboard -->
  <section>
  <div class="db container-fluid d-flex w-100">
    <div class="db_ele d-flex  flex-shrink-0 p-3 text-white bg-dark ">
      <hr>
      <ul class=" ele nav nav-pills  mb-auto">

      <li class="nav-item box">
          <a href="#" class="nav-link active " onclick="dashboard('profile')">
            <svg class="bi me-2" width="16" height="16">
              <use xlink:href="#table"></use>
            </svg>
            Profile
          </a>
        </li>

        <li class="nav-item box">
          <a href="#" class="nav-link active" onclick="dashboard('orders')">
            <svg class="bi me-2" width="16" height="16">
              <use xlink:href="#table"></use>
            </svg>
            Orders
          </a>
        </li>

        <li class="nav-item box">
          <a href="#" class="nav-link active" onclick="dashboard('Notifications')">
            <svg class="bi me-0" width="16" height="16">
              <use xlink:href="#grid"></use>
            </svg>
            Notification(<?php 
          $user_id = $_SESSION['user_id'];
          $comm = "select * from notification where user_id=$user_id";
          $result7 = mysqli_query($conn, $comm);
          $count7 = mysqli_num_rows($result7);
          echo $count7;
            ?>)
          </a>
        </li>

        <li class="nav-item box">
          <a href="logout.php" class="nav-link active ">
            <svg class="bi me-2" width="16" height="16">
              <use xlink:href="#home"></use>
            </svg>
            logout
          </a>
        </li>
      </ul>
      <hr>
    </div>
    <!-- dashboard close -->
    <div class="container ">
      <!-- profile -->
      <div class="user" id="profile">
        <div class="user_profile container d-flex my-5">
        <div class="username top-0" >
        <p class="card-text text-center fs-2 text"><?php echo $_SESSION['username']; ?></p>
        </div>
          <?php
          $user_id = $_SESSION['user_id'];
          $query2 = "select * from user where id=$user_id";
          $result4 = mysqli_query($conn, $query2);
          $row4 = mysqli_fetch_assoc($result4);
          $full_name = $row4['full_name'];
          ?>
          <div class=" p_detils container" style=" box-shadow: 0px 4px 13px 7px rgb(0 0 0 / 35%); ">
            <h3 class="mt-2">Personal Details</h3>
            <hr>
            <div class="card-body">
              <h4 class="card-text ">Name : <?php echo $full_name; ?></h4>
            </div>
            <?php
            $query = "select * from addr where user_id=$user_id";

            $result3 = mysqli_query($conn, $query);

            $count3 = mysqli_num_rows($result3);
            if ($count3 > 0) {
              while ($row3 = mysqli_fetch_assoc($result3)) {
                $email = $row3['email'];
                $MNo = $row3['MNo'];
                $addr = $row3['addr'];
                $city = $row3['city'];
                $state = $row3['st'];
                $zip = $row3['zip'];
            ?>

                <div class="card-body">
                  <h4 class="card-text ">Email : <?php echo $email; ?></h4>
                </div>
                <div class="card-body">
                  <h4 class="card-text ">Mobile No : <?php echo "+91" . $MNo; ?></h4>
                </div>
                <div class="card-body">
                  <h4 class="card-text ">Address : <?php echo $addr; ?></h4>
                </div>
                <div class="card-body">
                  <h4 class="card-text ">City : <?php echo $city; ?></h4>
                </div>
                <div class="card-body">
                  <h4 class="card-text ">State : <?php echo $state; ?></h4>
                </div>
                <div class="card-body">
                  <h4 class="card-text ">Zip : <?php echo $zip; ?></h4>
                </div>
          </div>
      <?php
              }
            }
      ?>
        </div>
      </div>
      <!-- profile close -->

      <!-- Orders -->
      <div id="orders" class="user" style="display: none;">
        <h3 class="text-center mt-5">Orders</h3>
        <div class="container  d-flex align-item-center justify-content-center mx-5">

          <table class="table orders ">
            <thead>
              <tr>
                <th scope="col">Order_id</th>
                <th scope="col">Date Time</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Device Name</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <?php
            $user_id = $_SESSION['user_id'];
            $sql = "select * from orders where user_id=$user_id";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $order_id = $row['order_id'];
                $device_id = $row['device_id'];
                $datetime = $row['date'];
                // for getting user info
                $sql2 = "select * from products where id=$device_id";
                $result2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($result2);
                if ($count2 > 0) {
                  while ($row2 = mysqli_fetch_assoc($result2)) {
                    $brand_name = $row2['brand_name'];
                    $device_name = $row2['device_name'];
                    $price = $row2['price'];

            ?>

                    <tbody>
                      <tr>
                        <th scope="row"><?php echo $order_id; ?></th>
                        <td><?php echo $datetime; ?></td>
                        <td><?php echo $brand_name; ?></td>
                        <td><?php echo $device_name; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $price + 50; ?></td>
                        <td>
                          <form action="" method="POST">
                            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                            <input type="submit" name="submit" value="Cancle " class=" cal_ord btn btn-danger"></input>
                          </form>
                        </td>

                    </tbody>
            <?php

                  }
                }
              }
            }
            ?>
          </table>
        </div>

      </div>
      <!-- Orders Close         -->

      <!-- Notifications -->
      <div id="Notifications" class="user" style="display: none;">
            <h3 class="text-center mt-5">Notifications</h3>
            <hr>
            <table class="table">
      <?php
      $user_id = $_SESSION['user_id'];
      $comm = "select * from notification where user_id=$user_id";
      $result7 = mysqli_query($conn, $comm);
      $count7 = mysqli_num_rows($result7);
      if ($count7 > 0) {
        while ($row7 = mysqli_fetch_assoc($result7)) {
      ?>
          
              <tbody>
                <td>
                  <h3 class="success"><span style="color:black;">➣</span> Order Delivered Successfully(<?php
                                                                                                        echo $row7['datetime']; ?>)</h3>
                </td>
              </tbody>
              <?php
        }
      }
      ?>
      </table>

    </div>

      <!-- Notifications close         -->


    </div>
  </div>

  <!-- javascript -->
  <script>
    function dashboard(Name) {
      var i;
      var x = document.getElementsByClassName("user");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      document.getElementById(Name).style.display = "block";
    }
  </script>

  <!-- calcle order -->
  <?php
  if (isset($_POST['submit'])) {
    include 'dbconn.php';
    $order_id = $_POST['order_id'];
    $query = "delete from orders where order_id=$order_id";
    $result = mysqli_query($conn, $query);
    if ($result) {
  ?>
      <script>
        if (window.confirm("Order Cancle Successfully")) {
          window.location.replace("User_dashboard.php");
        }
      </script>
  <?php
    }
  }
  ?>
</section>
</body>

</html>