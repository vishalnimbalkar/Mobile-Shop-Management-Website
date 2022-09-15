<?php
include("user_verify.php");
include("dbconn.php");
$user_id = $_SESSION['user_id'];
$sql = "select * from addr where user_id=$user_id";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                header("Location:pay.php");
            }

if(isset($_POST['brand_name'])){
    $_SESSION['brand_name']=$_POST['brand_name'];
}
if(isset($_POST['device_name'])){
    $_SESSION['device_name']=$_POST['device_name'];
}
if(isset($_POST['price'])){
    $_SESSION['price']=$_POST['price'];
}
if(isset($_POST['device_img'])){
    $_SESSION['device_img']=$_POST['device_img'];
}
if(isset($_POST['device_id'])){
    $_SESSION['device_id']=$_POST['device_id'];
}
$flag = true;
$emailerr=$MNoerr=$addrerr=$cityerr=$stateerr=$ziperr=$email=$MNo=$addr=$city=$state=$zip=$ziperr2=null;
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    
    include 'dbconn.php';
    if (empty($_POST["email"])) 
    {
    $emailerr = "Email is Required";
    $flag=false;
    }else{
        $email=$_POST["email"];
    }

    if (empty($_POST["MNo"])) 
    {
    $MNoerr = "Mobile No is Required";
    $flag=false;
    }else{
        $MNo=$_POST["MNo"];
    }

    if (empty($_POST["addr"])) 
    {
    $addrerr = "addr is Required";
    $flag=false;
    }else{
        $addr=$_POST["addr"];
    }

    if (empty($_POST["city"])) 
    {
    $cityerr = "City is Required";
    $flag=false;
    }else{
        $city=$_POST["city"];
    }

    if (empty($_POST["state"])) 
    {
    $stateerr = "State is Required";
    $flag=false;
    }else{
        $state=$_POST["state"];
    }

    if (empty($_POST["zip"])) 
    {
    $ziperr = "Zip is Required";
    $flag=false;
    }else{
        if(strlen($_POST['zip'])==6){
            $zip=$_POST["zip"];
        }else{
            $ziperr2="Invalid Zip Code";
            $flag=false;
        }
    }

  $user_id=$_SESSION['user_id'];

    if($flag==true)
   {
    $query= "INSERT INTO `addr` (`user_id`,`email`, `MNo`,`addr`,`city`,`st`,`zip`)
    VALUES ('$user_id','$email', '$MNo','$addr','$city','$state','$zip')";
    $result=mysqli_query($conn,$query);
    header("Location:pay.php");
   }
}
?>
<!DOCTYPE html>
<html lang="en">
    <style>
/* mobile */
  @media screen and (max-width: 480px) {
    .addr {
      margin-top: 6.4rem;
      height: 80%;
      width: 60%;
    }
    .btn{
        margin-left: 7rem;
    }
    footer{
        margin-right: 2rem;
    }
  }
  /* mobile close */
  
  @media screen and (min-width: 481px) {
    .addr {
      /* height: 70vh; */
      margin-top: 8.8rem;
      width: 50%;
    }  
  }
  .addr{
 border-radius: 5px;
  }
  </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php include("header.php"); ?>

    <div class="container addr w-75">
        <h3 class="text-center mt-5">Billing Address</h3>
        <form class="row g-3" action="" method="POST">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4" value="<?php  echo $email;?>">
                <p class="error"><?php echo $emailerr; ?></p>
            </div>
            <div class="col-md-6">
                <label for="mobileNo" class="form-label">Mobile No</label>
                <input type="text" name="MNo" class="form-control" id="mobileNo"
                value="<?php  echo $MNo;?>">
                <p class="error"><?php echo $MNoerr; ?></p>
            </div>
            <div class="col-12">
                <label for="inputaddr" class="form-label">Address</label>
                <input type="text" name="addr" class="form-control" id="inputaddr" value="<?php  echo $addr;?>">
                <p class="error"><?php echo $addrerr; ?></p>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" name="city" class="form-control" id="inputCity" value="<?php  echo $city;?>">
                <p class="error"><?php echo $cityerr; ?></p>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" name="state" class="form-select"
                value="<?php  echo $state;?>">
                    <option selected>Maharashtra</option>
                    <option>Bihar</option>
                    <option>UP</option>
                    <option>MP</option>
                </select>
                <p class="error"><?php echo $stateerr; ?></p>
            </div>

            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" name="zip" class="form-control" id="inputZip"
                value="<?php  echo $zip;?>">
                <p class="error"><?php echo $ziperr; ?></p>
                <p class="error"><?php echo $ziperr2; ?></p>
            </div>

            <div class="col-2 m-3">
                <button type="submit" class="btn btn-primary">Upadate</button>
            </div>
        </form>
    </div>
<footer>
<?php
include "footer.php";
?>
</footer>
</body>

</html>