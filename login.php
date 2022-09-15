<?php
include 'dbconn.php';
$flag=true;
$showerror = $usererr = $passerr = $password = $username = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST['username'])) {
    $usererr = "Username is Required";
    $flag = false;
  } else {
    $username = $_POST['username'];
  }

  if (empty($_POST['password'])) {
    $passerr = "Issue is Required";
    $flag = false;
  } else {
    $password = $_POST['password'];
  }

  if ($flag == true) {
    $sql = "Select * from user where username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if ($num == 1 ) {
      $login = "Login Successful";
      session_start();

      if ($row['type'] == "user") 
      {
        $_SESSION['user'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];
        header("location: index.php");
      } 
      else if ($row['type'] == "admin") 
      {
        $_SESSION['adminn'] = true;
        header("location: admin_dashboard.php");
      }     
    } 
    else 
    {
      $showerror = "Invalid Username and password";
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Log in</title>
</head>
<style>
/* mobile */
  @media screen and (max-width: 480px) {
    section {
      margin-top: 3.9rem;
    }
    .form-container{
      width: 83%;
    }
  }
  /* mobile close */
  
  @media screen and (min-width: 481px) {
    section {
      /* height: 70vh; */
      margin-top: 3.8rem;
    }
    
  }
  </style>
<body>
  <?php
  include('header.php');
  ?>
<section>
  <div class="container-fluid1 d-flex justify-content-center align-items-center">
    <form class="form-container" method="POST">
      <div>
        <img src="img/CookingEssentials.png" alt="">
      </div>
      <div class="row m-3 w-75">
        <div class="col-sm-12 ">
          <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $username; ?>">
          <p class="error"><?php echo $usererr; ?></p>
        </div>
      </div>
      <div class="row m-3 w-75">
        <div class="col-sm-12">
          <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $password; ?>">
          <p class="error"><?php echo $passerr; ?></p>
        </div>
      </div>
      <h4 class="error text-center"> <?php echo $showerror; ?></h4>
      <div class="container d-flex justify-content-center">
        <button type="submit" class="btn btn-primary m-2">log in</button>
        <a href="signup.php" class="btn btn-primary m-2">Sign Up</a>
      </div>
      <p>Create account to click sign up?</p>
    </form>
  </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>