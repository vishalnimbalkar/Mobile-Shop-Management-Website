<?php
include("dbconn.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style2.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title></title>
<style>
    .nav-item{
        margin-left: 1rem;
        font-size: 1.2rem;
    }
    nav{
        background-color: black;
    }
</style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand fs-3 text fw-bolder" href="#">SmartStore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-dark"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-center justify-content-center">
                        <li class="nav-item" >
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="User_dashboard.php">Account</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Mobiles
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="mi.php">Mi</a></li>
                                <li><a class="dropdown-item" href="samsung.php">Samsung</a></li>
                                <li><a class="dropdown-item" href="oppo.php">Oppo</a></li>
                                <li><a class="dropdown-item" href="vivo.php">Vivo</a></li>
                                <li><a class="dropdown-item" href="realme.php">Realme</a></li>
                                <li><a class="dropdown-item" href="oneplus.php">OnePLus</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/c5d4442e48.js" crossorigin="anonymous"></script>
</body>

</html>