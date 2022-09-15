<?php
include('user_verify.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
/* mobile */
  @media screen and (max-width: 480px) {
    .mobile_details {
      margin-top: 3.9rem;
      margin-left: 4.5rem;
    }
    .both{
        flex-direction: column;
    }
    .card{
        width: 17rem;
    }
    .payment{
        width: 80%;
        margin-bottom: 2rem;
    }
    .payment img{
        width: 100%;
    }
  }
  /* mobile close */
  
  @media screen and (min-width: 481px) {
    .both {
      /* height: 70vh; */
      margin-top: 4rem;
    }
    .card{
        width: 25rem;
    }
    .payment{
        width: 40%;
    }
    
  }
  </style>
<body>

    <?php
    $cc = $expiry = $cvv = $ccerr = $expiryerr = $cvverr = null;
    $flag = true;
    if (isset($_POST['submit'])) {

        if (empty($_POST['cc'])) {
            $ccerr = "Card Number is Required";
            $flag = false;
        } else {
            $cc = $_POST['cc'];
        }

        if (empty($_POST['expiry'])) {
            $expiryerr = "Expiry is Required";
            $flag = false;
        } else {
            $expiry = $_POST['expiry'];
        }

        if (empty($_POST['cvv'])) {
            $cvverr = "CVV is Required";
            $flag = false;
        } else {
            $cvv = $_POST['cvv'];
        }

        if ($flag == true) {
            // header("Location:order_placed.php")
    ?>
            <script>
                if (window.confirm("Order Placed Successfully")) {
                    window.location.replace("index.php");
                }
            </script>
    <?php
        }
    }
    // insert data into order table from form data
    if (isset($_POST['submit'])) {
        include 'dbconn.php';
        $user_id = $_SESSION['user_id'];
        $device_id = $_SESSION['device_id'];

        $query = "INSERT INTO `orders` (`user_id`,`device_id`)
        VALUES ('$user_id','$device_id')";
        $result = mysqli_query($conn, $query);
    }
    ?>

    <div class="container d-flex align-items-center justify-content-center both">
        <div class="container w-50 text-center mobile_details">
            <div class="row my-5">
                <div class="g-col-4 col ">
                    <form action="" method="post">
                        <div class="card">
                            <h3 class="text-center mt-3 mb-0">Mobile Details</h3>
                            <img src="upload/device_img/<?php echo $_SESSION['device_img']; ?>" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo $_SESSION['device_name']; ?></h5>
                                <h4 class="card-title bolder">Price <span class="error">₹<?php echo $_SESSION['price']; ?></span></h4>
                                <h4 class="card-title bolder">Total <span class="success">₹<?php echo $_SESSION['price'] + 50; ?></span></h4>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="payment container d-flex flex-column border">
            <form action="" method="POST">

                <div class="m-2 d-flex w-100 align-items-center justify-content-center">
                    <img src="img/card.png" alt="">
                </div>

                <div class="m-3">
                    <label for="formGroupExampleInput" class="form-label">Enter Card Number</label>
                    <input type="text" name="cc" class="form-control" id="formGroupExampleInput" placeholder="1234 6549 6432 6791" value="<?php echo $cc; ?>">
                    <p class="error"><?php echo $ccerr; ?></p>
                </div>

                <div class="m-3">
                    <label for="formGroupExampleInput2" class="form-label">Enter Expiry</label>
                    <input type="text" name="expiry" class="form-control" id="formGroupExampleInput2" placeholder="01/09" value="<?php echo $expiry; ?>">
                    <p class="error"><?php echo $expiryerr; ?></p>
                </div>

                <div class="m-3">
                    <label for="formGroupExampleInput2" class="form-label">Enter CVV</label>
                    <input type="text" name="cvv" class="form-control" id="formGroupExampleInput2" value="<?php echo $cvv; ?>">
                    <p class="error"><?php echo $cvverr; ?></p>
                </div>

                <div class="m-3 d-flex w-100 align-items-center justify-content-center">
                    <input class="btn btn-success" type="submit" name="submit" value="Proceed To Pay">
                </div>

        </div>
        </form>
    </div>
</body>

</html>