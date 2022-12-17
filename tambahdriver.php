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
<body>
    <div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form" action="tambahdriver.php" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Enter Driver Details </h3>
          <input type="hidden" name="driver_id" id = "driver_id" value="<?php echo $driver_id;?>">
          <div class="form-group">
            <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="Driver Name " required autofocus="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="dl_number" name="dl_number" placeholder="Driving License Number" required>
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="driver_phone" name="driver_phone" placeholder="Contact" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="driver_address" name="driver_address" placeholder="Address" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="driver_gender" name="driver_gender" placeholder="Gender" required>
          </div>
          <a class="btn btn-warning pull-left" href="admin_page.php"> Back</a>
           <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> Add Driver</button>    
        </form>
      </div>
    </div>
    <?php

	if(isset($_POST['submit'])) {
		$driver_id = $_POST['driver_id'];
		$driver_name = $_POST['driver_name'];
    $dl_number = $_POST['dl_number'];
		$driver_phone = $_POST['driver_phone'];
		$driver_address = $_POST['driver_address'];
		$driver_gender = $_POST['driver_gender'];

		include("config.php");
				

		$data = mysqli_query($conn, "INSERT INTO driver(driver_name, dl_number, driver_phone, driver_address, driver_gender, driver_availability) VALUES('$driver_name', '$dl_number', '$driver_phone', '$driver_address', '$driver_gender', 1)");
		header('location:admin_page.php');
	}
	?>


