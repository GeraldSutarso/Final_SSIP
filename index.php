<?php
session_start();
if($_SESSION["valid"] != true){
  header("location: login_form.php");
}
  if($_SESSION['userType'] == 1){
    header("location: admin_page.php");
  }
  if($_SESSION['userType'] == 2){
    header("location: user_page.php");
  }

?>
<html lang="en">
<title>Car Rental</title>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
    <body>
    <?php 
    include('navbar.php'); ?>
    <h2></h2>
   <?php include('footer.php');?>
    </body>
</html>