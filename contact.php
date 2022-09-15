<?php
include("user_verify.php");

?>
<?php
$description=$emailerr=$email=$issue=$submit=$submiterr=$iserr=$descerr=null;
$flag= true;
if($_SERVER['REQUEST_METHOD']=="POST")
{
  include 'dbconn.php';

  if (empty($_POST['email'])) {
    $emailerr = "Email is Required";
    $flag = false;
  } else {
    $email = $_POST['email'];
  }
  
  if (empty($_POST['issue'])) {
    $iserr = "Issue is Required";
    $flag = false;
  } else {
    $issue = $_POST['issue'];
  }

  if (empty($_POST['description'])) {
    $descerr = "Description is Required";
    $flag = false;
  } else {
    $description = $_POST['description'];
  }
  $user_id=$_POST['user_id'];

   if($flag==true)
   {
    $query= "INSERT INTO `contact` (`user_id`,`issue`, `description`,`email`)
    VALUES ('$user_id','$issue', '$description','$email')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
       ?>
       <p class="error">
        <script>
          if(window.confirm("Issue Submit Successfully")){
            window.location.replace("index.php");
          }
        </script>
       </p>
       <?php
    }
   }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Contact</title>
</head>
<style>
/* mobile */
  @media screen and (max-width: 480px) {
    section {
      margin-top:0;
    }
    .contact{
      /* width: 50%; */
    }
    form{
      width: 70%;
      margin-left: 4.5rem;
    }
    .cont{
      width: 50%;
      background:url('img/contact.webp')center center/cover;
      height: 93.5vh;
    }
    
  }
  /* mobile close */
  
  @media screen and (min-width: 481px) {
    section {
      /* height: 70vh; */
      margin-top: 6.8rem;
    }
    .contact{
      /* width: 50%; */
    }
    form{
      width: 40%;
      margin-left: 25rem;
    }
    .cont{
      height: 80vh;
      background:url('img/contact.webp')center center/cover;
  }
    
  }
  </style>
<body>
    <?php include("header.php"); ?>

    <section>
<div class="container cont mt-5 d-flex align-items-center justify-content-center" >
    <div class="container contact">
        <h1 class=" text-center mt-5">Contact Us</h1>
        <form action="" method="POST">
        <div class="mb-3">
                <label for="exampleInputmobileno1" class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" id="exampleInputmobileno1" name="email"
                value="<?php  echo $email;?>">
                <p class="error"><?php echo $emailerr; ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleInputmobileno1" class="form-label fw-bold">Issue</label>
                <input type="text" class="form-control" id="exampleInputmobileno1" name="issue"
                value="<?php  echo $issue;?>">
                <p class="error"><?php echo $iserr; ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleInputmobileno1" class="form-label fw-bold">Description</label>
                <input type="textarea" class="form-control" id="exampleInputmobileno1" name="description"  value="<?php  echo $description;?>">
                <p class="error"><?php echo $descerr; ?></p>
            </div>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
            <div class="container d-flex align-items-center justify-content-center">
            <button type="submit" class="btn mt-2 btn-primary fw-bold" name="submit">Submit</button>
            <h3 class="success text-center"> <?php echo $submit;?></h3>  
            <h3 class="error text-center "> <?php echo $submiterr;?></h3>  
            </div>           
        </form>
    </div>
    </div>
    </section>
</body>

</html>
<!-- INSERT INTO `contact` (`srno`, `name`, `email`, `mobileno`, `issue`, `description`, `datetime`)
 VALUES ('1', 'vishal', 'vishal@gmail.com', '7744855070', 'payment', 'payment', current_timestamp()); -->