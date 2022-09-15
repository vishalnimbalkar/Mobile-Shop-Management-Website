<?php
// it verify the page access by users and admin only
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] != true) {
    header("location: login.php");
}
?>