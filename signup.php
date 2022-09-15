<?php
session_start();
$fnerr  = $usererr = $passerr = $cpasserr = $showerror = null;
$fullname = $username = $password = $cpassword = null;

$flag = true;
if (($_SERVER["REQUEST_METHOD"] == "POST")) 
{
  include 'dbconn.php';


  if (empty($_POST['full_name'])) {
    $fnerr = "Full Name is Required";
    $flag = false;
  } else {
    $fullname = $_POST['full_name'];
  }

  if (empty($_POST['username'])) {
    $usererr = "User Name is Required";
    $flag = false;
  } else {
    $username = $_POST['username'];
  }

  if (empty($_POST['password'])) {
    $passerr = "Password is Required";
    $flag = false;
  } else {
    $password = $_POST['password'];
  }

  if (empty($_POST['cpassword'])) {
    $cpasserr = "Conform Password is Required";
    $flag = false;
  } else {
    $cpassword = $_POST['cpassword'];
  }


  // cheak for user exists
  $existSql = "Select * from user where username = '$username'";
  $result = mysqli_query($conn, $existSql);
  $numrows = mysqli_num_rows($result);
  if ($numrows > 0) 
  {
    $showerror = "Username Already Exists";
  } 
  else 
  {
    if ($flag == true) 
    {
      if ($password == $cpassword) 
      {
        $sql = "INSERT INTO `user` (`full_name`,`username`, `password`) VALUES ('$fullname','$username', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) 
        {
          $msg = "Sign Up Successfully";
          header("location: login.php?msgg=<p class='error'>done</p>");
        }
      } 
      else 
      {
        $showerror = "Password Do Not Match";
      }
    }
  }
}
?>


<!doctype html>
<html lang="en">
<style>
/* mobile */
  @media screen and (max-width: 480px) {
    section {
      margin-top: 3.9rem;
    }
    .form-container{
      width: 80%;
      height: 70vh;
    }
  }
  /* mobile close */
  
  @media screen and (min-width: 481px) {
    section {
      /* height: 70vh; */
      margin-top: 3.8rem;
    }
    .form-container{
      width: 30%;
      height: 70vh;
    }
    
  }
  .container-fluid1{
    background: url('img/login3.webp') no-repeat center center/cover;
    height: 91.5vh;
}
  .form-container{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center; 
    box-shadow: -1px 4px 100px 11px rgba(0,0,0,0.75);
    color: white;
}
.form-container img{
        width: 120px;
        height: 100px;    
}
.signupspan{
    text-decoration: none;
}
  </style>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Sign Up</title>
</head>

<body>
  <?php
  include('header.php');
  ?>
<section>
  <div class="container-fluid1 d-flex justify-content-center align-items-center">
    <form class="form-container" action="#" method="POST">
      <div>
        <img src="img/CookingEssentials.png" alt="">
      </div>
      <div class="row m-2 w-75">
        <div class="col-sm-12 ">
          <input type="text" class="form-control" placeholder="Full Name" name="full_name" 
          value="<?php  echo $fullname;?>">
          <p class="error"><?php echo $fnerr; ?></p>
        </div>
      </div>
      <div class="row m-2 w-75">
        <div class="col-sm-12 ">
          <input type="text" class="form-control" placeholder="Username" name="username"
          value="<?php  echo $username;?>">
          <p class="error"> <?php echo $usererr; ?></p>

        </div>
      </div>
      <div class="row m-2 w-75">
        <div class="col-sm-12">
          <input type="password" class="form-control" placeholder="Password" name="password"
          value="<?php  echo $password;?>">
          <p class="error"> <?php echo $passerr; ?></p>
        </div>
      </div>
      <div class="row m-2 w-75">
        <div class="col-sm-12">
          <input type="password" class="form-control" placeholder="Conform Password" name="cpassword"
          value="<?php  echo $cpassword;?>">
          <p class= "error" > <?php echo $showerror; echo $cpasserr; ?></p>
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
    </form>
  </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>