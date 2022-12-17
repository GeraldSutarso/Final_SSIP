<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['admin_name'])){
  session_destroy();
   header('location:login_form.php');
}
?>

<head>
<link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
<link rel="stylesheet" href="assets/w3css/w3.css">
<link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
<script src="https://kit.fontawesome.com/dab3ca4542.js" crossorigin="anonymous"></script>
   <!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    
    <?php
    include ('navbar.php');
    if(isset($_POST['update'])) {
        $car_id = $_POST['car_id'];
        $car_availability = $_POST['car_availability'];
        $car_name = $_POST['car_name'];
        $car_nameplate = $_POST['car_nameplate'];
        $price = $_POST['price'];
        $year = $_POST['year'];
        $data = mysqli_query($conn, "UPDATE cars SET car_name='$car_name',car_nameplate='$car_nameplate', price='$price', year='$year', car_availability='$car_availability' WHERE car_id='$car_id'");
        header('location:admin_page.php');
    }

    $car_id = $_GET['car_id'];
    $data = mysqli_query($conn, "SELECT * FROM cars WHERE car_id='$car_id'");

    while ($display = mysqli_fetch_array($data)) {
         
     $car_id = $display['car_id'];
		 $car_name = $display['car_name'];
		 $car_nameplate = $display['car_nameplate'];
		 $price = $display['price']; 
		 $year = $display['year']; 
		 $car_availability = $display['car_availability']; }
    ?>
</head>
<div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form" action="editcar.php" enctype="multipart/form-data" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Edit Car Details </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="car_name" name="car_name" placeholder="Car Name " required autofocus="" value=<?php echo $car_name;?>>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="car_nameplate" name="car_nameplate" placeholder="Vehicle Number Plate" required value=<?php echo $car_nameplate;?>>
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="price" name="price" placeholder="Price/day" required value=<?php echo $price;?>>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="year" name="year" placeholder="Car year" required value=<?php echo $year;?>>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="car_availability" name="year" placeholder="1(True)/0(False)" required value=<?php echo $car_availability;?>>
          </div>
          <div class="form-group">
          <input type="hidden" name="car_id" value=<?php echo $_GET['car_id'];?>>
          </div>
          <a class="btn btn-warning pull-left" href="admin_page.php"> Back</a>
           <button type="submit" name="update" class="btn btn-info pull-right"> Update </button>    
        </form>
      </div>
    </div>