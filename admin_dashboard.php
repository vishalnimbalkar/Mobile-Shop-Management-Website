<?php
include("admin_verify.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title> Admin Dashboard</title>
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
    .orders{
        font-size: 0.7rem;
        width: 80%;
    }
    .hide{
        display: none;
    }
    .card_prod{
        width: 10rem;
    }
    .add_m_form{
        width: 80%;
    }
    .issues{
        margin-right: 5rem;
    }
  }
  /* mobile close */
  
  @media screen and (min-width: 481px) {
    section {
      /* height: 70vh; */
      margin-top: 4.5rem;
    }
    .db_ele{
        flex-direction: column;
        position: sticky;
        top: 4.5rem;
        width: 280px; 
        height:90vh
    }
    .ele{
        flex-direction: column;
    }
    .box{
        margin: 1rem;
    }
    .card_prod{
        width: 12rem;
    }
    .add_m_form{
        width: 50%;
    }
  }
</style>

<body>
    <?php
    include("header.php");
    ?>
    <!-- dashboard -->
    <section>
    <div class=" db container-fluid d-flex w-100">
        <div class="db_ele  d-flex flex-shrink-0 p-3 text-white bg-dark ">
            <hr>
            <ul class="ele nav nav-pills mb-auto">
                <li class="nav-item box">
                    <a href="#" class="nav-link active " onclick="dashboard('users')">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#table"></use>
                        </svg>
                        Users
                    </a>
                </li>

                <li class="nav-item box">
                    <a href="#" class="nav-link active " onclick="dashboard('orders')">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Orders
                    </a>
                </li>

                <li class="nav-item box ">
                    <a href="#" class="nav-link active " onclick="dashboard('products')">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Products
                    </a>
                </li>

                <li class="nav-item box">
                    <a href="#" class="nav-link active " onclick="dashboard('add_mobile')">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Add Mobile
                    </a>
                </li>

                <li class="nav-item box">
                    <a href="#" class="nav-link active " onclick="dashboard('issues')">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Issues
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
        <div class="container">

            <!-- users -->
            <div id="users" class="user">
                <h3 class="text-center mt-2">Users</h3>
                <hr>
                <div class="container d-flex align-item-center justify-content-center">

                    <table class="table ">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">User id</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">username</th>
                                <th scope="col">password</th>

                            </tr>
                        </thead>
                        <?php

                        $sql = "select * from user";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['type'] == "admin") {
                                } else {
                                    $id = $row['id'];
                                    $fullname = $row['full_name'];
                                    $usernm = $row['username'];
                                    $pass = $row['password'];

                        ?>
                                    <tbody>
                                        <tr class="text-center">
                                            <th scope="row"><?php echo $id; ?></th>
                                            <td><?php echo $fullname; ?></td>
                                            <td><?php echo $usernm; ?></td>
                                            <td><?php echo $pass; ?></td>
                                        </tr>
                                    </tbody>
                        <?php
                                }
                            }
                        }
                        ?>
                    </table>
                </div>
                        <hr>
            </div>
            <!-- users close         -->

            <!-- Orders -->
            <div id="orders" class="user" style="display: none;">
                <h3 class="text-center mt-2">Orders</h3>
                <hr>
                <div class="container d-flex align-item-center justify-content-center">

                    <table class="table orders">
                        <thead class="">
                            <tr class="text-center">
                                <th class="hide" scope="col">Order ID</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Date Time</th>
                                <th scope="col">Device Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Address</th>
                                <th class="hide" scope="col">City</th>
                                <th class="hide" scope="col">State</th>
                                <th class="hide" scope="col">Zip</th>
                            </tr>
                        </thead>
                        <?php
                        $sql = "select * from orders";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $order_id = $row['order_id'];
                                $user_id = $row['user_id'];
                                $device_id = $row['device_id'];
                                $datetime = $row['date'];
                                // for getting user info
                                $sql2 = "select * from products where id=$device_id";
                                $result2 = mysqli_query($conn, $sql2);
                                $count2 = mysqli_num_rows($result2);
                                if ($count2 > 0) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                        $device_name = $row2['device_name'];
                                        $price = $row2['price'];
                                        $sql3 = "select * from addr where user_id=$user_id";
                                        $result3 = mysqli_query($conn, $sql3);
                                        $count3 = mysqli_num_rows($result3);
                                        if ($count3 > 0) {
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                $address = $row3['addr'];
                                                $city = $row3['city'];
                                                $state = $row3['st'];
                                                $zip = $row3['zip'];
                                                $MNo = $row3['MNo'];
                        ?>

                                                <tbody>
                                                    <tr class="text-center">
                                                        <th class="hide" scope="row"><?php echo $order_id; ?></th>
                                                        <td><?php echo $user_id; ?></td>
                                                        <td><?php echo $datetime; ?></td>
                                                        <td><?php echo $device_name; ?></td>
                                                        <td>₹<?php echo $price + 50; ?></td>
                                                        <td><?php echo $MNo; ?></td>
                                                        <td><?php echo $address; ?></td>
                                                        <td class="hide"><?php echo $city; ?></td>
                                                        <td class="hide"><?php echo $state; ?></td>
                                                        <td class="hide"><?php echo $zip; ?></td>
                                    <td scope="col">
                                    <form action="" method="POST">
                                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                        <input type="submit" name="or_dl" value="Delivered" class="btn btn-success"></input>
                                    </form>
                                </td>



                                                </tbody>

                        <?php

                                            }
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                    </table>
                </div>
                <hr>
            </div>
            <!-- Order Delivered -->
            <?php
            if(isset($_POST['or_dl'])){
                $order_id = $_POST['order_id'];
                $user_id = $_POST['user_id'];
                $query = "delete from orders where order_id=$order_id";
                $result = mysqli_query($conn, $query);
                if ($result) {
              ?>
                  <script>
                    if (window.confirm("Order Delivered Successfully")) {
                      window.location.replace("admin_dashboard.php");
                    }
                  </script>
              <?php
                // $query2 = "select * from orders where order_id=$order_id";
                // $result2 = mysqli_query($conn, $query2);
                // $row=mysqli_fetch_assoc($result2);
                // $user_id=$row['user_id'];

              $comm="INSERT INTO `notification`(`order_id`,`user_id`) VALUES('$order_id','$user_id')";
              $result=mysqli_query($conn,$comm);
                }
              }
            ?>
            <!-- Order Delivered close-->

            <!-- Orders Close         -->

            <!-- products -->
            <div id="products" class="user" style="display: none;">
                <h3 class="text-center mt-2">Products</h3>
                <hr>
                <div class=" prod container d-flex align-items-center justify-content-center">

                    <div class="row">
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
                                $qnt = $row['qnt'];
                                $device_img = $row['img']
                        ?>
                                <div class="g-col-4 col mt-2">
                                    <div class="card card_prod">
                                        <img src="upload/device_img/<?php echo $device_img; ?>" class="card-img-top" alt="...">
                                        <div class="card-body text-center">
                                            <h5 class="card-title"><?php echo $device_name; ?></h5>
                                            <h6 class="card-title bolder"><span class="error">₹<?php echo $price; ?></span></h6>

                                            <form action="#" method="post">
                                                <button type="submit" name="delete_product" class="btn btn-danger">Delete</button>
                                                <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- delete Products -->
                        <?php
                        if (isset($_POST['delete_product'])) {
                            $product_id = $_POST['product_id'];
                            $sql = "delete from products where id=$product_id";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                        ?>
                                <script>
                                    if (window.confirm("Product Delete Successfully")) {
                                        window.location.replace("admin_dashboard.php");
                                    }
                                </script>
                        <?php
                            }
                        }
                        ?>
                        <!-- delete Product close -->
                    </div>
                </div>
                <hr>
            </div>
            <!-- products close         -->

            <!-- add mobile -->
            <?php

            $brand_name = $device_name = $imgerr = $qnterr = $price = $dnameerr = $bnameerr = $priceerr = $fileerr = $device_img = $success = $failed = null;
            $flag = true;
            if (isset($_POST['submit'])) {
                if (empty($_POST['brand_name'])) {
                    $bnameerr = "Brand Name is Required";
                    $flag = false;
                } else {
                    $brand_name = $_POST['brand_name'];
                }

                if (empty($_POST['device_name'])) {
                    $dnameerr = "Device Name is Required";
                    $flag = false;
                } else {
                    $device_name = $_POST['device_name'];
                }

                if (empty($_POST['price'])) {
                    $priceerr = "Price is Required";
                    $flag = false;
                } else {
                    $price = $_POST['price'];
                }

                if (empty($_POST['qnt'])) {
                    $qnterr = "Quantity is Required";
                    $flag = false;
                } else {
                    $qnt = $_POST['qnt'];
                }

                if (empty($_FILES["device_img"]["name"])) {
                    $fileerr = "File is Required";
                    $flag = false;
                } else {
                    $device_img = $_FILES["device_img"]["name"];
                }

                if ($flag == true) {
                    $temp = $_FILES['device_img']['tmp_name'];
                    $ext = explode(".", $device_img);
                    $count = count($ext);
                    if ($ext[$count - 1] == 'jpg' || $ext[$count - 1] == 'png' || $ext[$count - 1] == "jpeg") {
                        move_uploaded_file($temp, "upload/device_img/" . $device_img);
                    } else {
                        $exterr = "$ext file extention not support[jpg/png/jpeg]";
                    }
                    $sql = "INSERT INTO `products` (`brand_name`,`device_name`,`price`,`qnt`,`img`) VALUES ('$brand_name','$device_name','$price','$qnt','$device_img')";
                    $result2 = mysqli_query($conn, $sql);
                    if ($result2) {
            ?>
                        <p class="success">
                            <script>
                                if (window.confirm("Mobile Added Successfully")) {
                                    window.location.replace("admin_dashboard.php");
                                }
                            </script>
                        </p>
                    <?php
                    }
                } else {
                    ?>
                    <p class="error">
                        <script>
                            if (window.confirm("Failed To Added Mobile")) {
                                window.location.replace("admin_dashboard.php");
                            }
                        </script>
                    </p>
            <?php
                }
            }

            ?>

            <div id="add_mobile" class="user" style="display: none;">
                <h3 class="text-center mt-2">Add Mobile</h3>
                <hr>
                <div class="container d-flex alifn-items-center justify-content-center">
                    <form class="add_m_form p-3" action="#" method="POST" enctype="multipart/form-data" style=" box-shadow: 0px 4px 13px 7px rgb(0 0 0 / 35%);">
                        <div class="mb-3 ">
                            <label for="validationCustom04" class="form-label">Brand name</label>
                            <select class="form-select" name="brand_name" id="validationCustom04" required>
                                <option>mi</option>
                                <option>samsung</option>
                                <option>vivo</option>
                                <option>oppo</option>
                                <option>realme</option>
                                <option>oneplus</option>
                            </select>
                            <p class="error"><?php $bnameerr; ?></p>
                        </div>
                        <div class="mb-3">
                            <label for="divice_name" class="form-label">Device Name</label>
                            <input type="text" class="form-control" name="device_name" value="<?php echo $device_name; ?>">
                            <p class="error"><?php echo $dnameerr; ?></p>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" value="<?php echo $price; ?>">
                            <p class="error"><?php echo $priceerr; ?></p>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="qnt" value="<?php echo $qnt; ?>">
                            <p class="error"><?php echo $qnterr; ?></p>
                        </div>
                        <div class="mb-3">
                            <label for="device_img" class="form-label">Device Image</label>
                            <input type="file" class="form-control" name="device_img">
                            <p class="error"><?php echo $imgerr; ?></p>
                        </div>
                        <div class="container d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <hr>
            </div>
            <!-- add Mobile close         -->

            <!-- issues -->
            <div id="issues" class="user" style="display: none;">
                <h3 class="text-center mt-2">Issues</h3>
                <hr>
                <div class="container d-flex align-item-center justify-content-center mx-5">

                    <table class="table issues">
                        <thead>
                            <tr>
                                <th scope="col">Issue Id</th>
                                <th scope="col">Issue</th>
                                <th scope="col">Description</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Username</th>



                            </tr>
                        </thead>
                        <?php

                        $sql = "select * from contact";


                        $result = mysqli_query($conn, $sql);


                        $count = mysqli_num_rows($result);


                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $user_id = $row['user_id'];
                                $issue = $row['issue'];
                                $desc = $row['description'];

                                // for getting user info
                                $sql2 = "select * from user where id=$user_id";


                                $result2 = mysqli_query($conn, $sql2);


                                $count2 = mysqli_num_rows($result2);


                                if ($count2 > 0) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                        $username = $row2['username'];
                                        $fullname = $row2['full_name'];

                        ?>

                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php echo $id; ?></th>
                                                <td><?php echo $issue; ?></td>
                                                <td><?php echo $desc; ?></td>
                                                <td><?php echo $fullname; ?></td>
                                                <td><?php echo $username; ?></td>


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
            <!-- issues close         -->
        </div>
    </div>
    </section>
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



</body>

</html>