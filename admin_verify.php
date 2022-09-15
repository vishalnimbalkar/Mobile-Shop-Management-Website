<?php
// it verify the page access by  admins only
session_start();
if (!isset($_SESSION['adminn']) || $_SESSION['adminn'] != true) {
    header("location: login.php");
}

?>