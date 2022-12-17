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
</head>

<div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form" action="tambahmobil.php" enctype="multipart/form-data" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Please Provide Your Car Details. </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="car_name" name="car_name" placeholder="Car Name " required autofocus="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="car_nameplate" name="car_nameplate" placeholder="Vehicle Number Plate" required>
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="price" name="price" placeholder="Price/day" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="year" name="year" placeholder="Car year" required>
          </div>

          <div class="form-group">
            <input name="car_img" type="file">
          </div>
          <a class="btn btn-warning pull-left" href="admin_page.php"> Back</a>
           <button type="submit" id="submit" name="submit" class="btn btn-success pull-right"> Submit </button>    
        </form>
      </div>
    </div>
    <?php
	if(isset($_POST['submit'])) {
    $fileName = $_FILES["car_img"]["name"];
    $tempName = $_FILES["car_img"]["tmp_name"];
    $folder =  $fileName;
		$car_name = $_POST['car_name'];
		$car_nameplate = $_POST['car_nameplate'];
    $price = $_POST['price'];
		$year = $_POST['year'];


		include("config.php");
	

		$data = mysqli_query($conn, "INSERT INTO cars(car_name, car_nameplate, car_img, price, year, car_availability) VALUES('$car_name', '$car_nameplate', '$fileName', '$price', '$year', 1)");
    if (move_uploaded_file($tempName, $folder)) {
      echo "<h3>  Image uploaded successfully!</h3>";
  } else {
      echo "<h3>  Failed to upload image!</h3>";
  }
		header('location:admin_page.php');
}
	?>
    