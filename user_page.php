<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['user_name'])){
    session_destroy();
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
  <link rel="shortcut icon" type="image/png" href="assets/img/P.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
</head>
    <body>
    <?php 
    include('navbar.php'); ?>
        <div id="sec2" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
        <h3 style="text-align:center;">Available Cars</h3>
<br>
        <section class="menu-content">
            <?php   
            $sql1 = "SELECT * FROM cars WHERE car_availability='1'";
            $result1 = mysqli_query($conn,$sql1);

            if(mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)){
                    $car_id = $row1["car_id"];
                    $car_name = $row1["car_name"];
                    $price = $row1["price"];
                    $year = $row1["year"];
                    $car_img = $row1["car_img"];
               
                    ?>

            <a href="booking.php?car_id=<?php echo $row1['car_id'] ?>">
            <div class="sub-menu">
            
            <img style='width: 250px; height:137px;' class="card-img-top" src="assets/img/cars/<?php echo $car_img; ?>" alt="Card image cap">
            <h5><b> <?php echo $car_name; ?> </b></h5>
            <h6> Price: <?php echo ("Rp. " . $price . "/day "); ?></h6>
            <h6> Year: <?php echo ($year); ?></h6>

            
            </div> 
            </a>
            <?php }}
            else {
                ?>
<h1> No cars available :( </h1>
                <?php
            }
            ?>                                   
        </section>
                    
    </div>

    <div class="bgimg-2">
        <div class="caption">
            <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;"></span>
        </div>
    </div>
    <h2></h2>
    <?php include('footer.php');?>
    </body>
</html>