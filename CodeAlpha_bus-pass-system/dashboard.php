<?php
session_start();
include("config/db.php");

if(!isset($_SESSION['user_id'])){
    header("location:login.php");
}
?>

<h2>User Dashboard</h2>

<a href="book_pass.php">Book Bus Pass</a><br><br>
<a href="logout.php">Logout</a>
