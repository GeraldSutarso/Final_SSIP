<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<title>Car Rental</title>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
    <body>
    <?php 
    include('navbar.php'); ?>
    <h2></h2>
    </body>
</html>