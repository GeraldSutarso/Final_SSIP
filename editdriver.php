<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['admin_name'])){
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
        $driver_id = $_POST['driver_id'];
        $driver_name = $_POST['driver_name'];
        $dl_number = $_POST['dl_number'];
        $driver_phone = $_POST['driver_phone'];
        $driver_address = $_POST['driver_address'];
        $driver_gender = $_POST['driver_gender'];
        $driver_availability = $_POST['driver_availability'];
        $data = mysqli_query($conn, "UPDATE driver SET driver_name='$driver_name',dl_number='$dl_number', driver_phone='$driver_phone', driver_address='$driver_address', driver_availability='$driver_availability' WHERE driver_id='$driver_id'");
        header('location:admin_page.php');
    }

    $driver_id = $_GET['driver_id'];
    $data = mysqli_query($conn, "SELECT * FROM driver WHERE driver_id='$driver_id'");

    while ($display = mysqli_fetch_array($data)) {
         
     $driver_id = $display['driver_id'];
		 $driver_name = $display['driver_name'];
		 $dl_number = $display['dl_number'];
		 $driver_phone = $display['driver_phone']; 
		 $driver_address = $display['driver_address']; 
     $driver_gender = $display['driver_gender'];
     $driver_availability = $display['driver_availability'];  }
    ?>
</head>
<div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form" action="editdriver.php" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Edit Driver Details </h3>
          <input type="hidden" name="driver_id" id = "driver_id" value="<?php echo $driver_id;?>">
          <div class="form-group">
            <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="Driver Name " required autofocus="" value=<?php echo $driver_name;?>>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="dl_number" name="dl_number" placeholder="Driving License Number" required value=<?php echo $dl_number;?>>
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="driver_phone" name="driver_phone" placeholder="Contact" required value=<?php echo $driver_phone;?>>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="driver_address" name="driver_address" placeholder="Address" required value=<?php echo $driver_address;?>>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="driver_gender" name="driver_gender" placeholder="Gender" required value=<?php echo $driver_gender;?>>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="driver_availability" name="driver_availability" placeholder="1(True)/0(False)" required value=<?php echo $driver_availability; ?>>
          </div>
          <div class="form-group">
          <input type="hidden" name="driver_id" value=<?php echo $_GET['driver_id'];?>>
          </div>
          <a class="btn btn-warning pull-left" href="admin_page.php"> Back</a>
           <button type="submit"  name="update" class="btn btn-info pull-right"> Update</button>    
        </form>
      </div>
    </div>