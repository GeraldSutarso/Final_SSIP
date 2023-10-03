<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
   <title>Rental Mobil | Admin Dashboard</title>
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
  

</head>
<body><br><br><br>
<?php 
include('navbar.php');
if (isset($_GET['delete_car'])) {
	$car_id = $_GET['delete_car'];
	mysqli_query($conn, "UPDATE cars SET car_status = 'Inaccessible' WHERE car_id=$car_id");
	mysqli_query($conn, "UPDATE cars SET car_availability ='0' WHERE car_id=$car_id");
	header('location: admin_page.php');}
if (isset($_GET['delete_driver'])) {
	$driver_id = $_GET['delete_driver'];
	mysqli_query($conn, "UPDATE driver SET driver_status = 'Inactive' WHERE driver_id=$driver_id");
	mysqli_query($conn, "UPDATE driver SET driver_availability = '0' WHERE driver_id = $driver_id");
	header('location: admin_page.php');}?>
<br id="car_table">
<br>
<center>
<h3 > Car Table </h3>
<div style="border:solid 1px;">
<?php $results = mysqli_query($conn, "SELECT * FROM cars WHERE car_status = 'Accessible'");
?>
<table class ="table">
	<thead class="thead-dark">
	<tr>
		<th>Car ID</th>
		<th>Car Name</th>
		<th>Car Nameplate</th>
		<th>Car Image</th>
		<th>Price</th>
		<th>Year</th>
		<th>Availability</th>
		<th>Edit and Delete</th>
	</tr>
	</thead>
	<tbody class="tbody-light">
	<?php while ($display = mysqli_fetch_array($results)) {?>
	<tr>
		<td><?php echo $display['car_id']; ?></td>
		<td><?php echo $display['car_name']; ?></td>
		<td><?php echo $display['car_nameplate']; ?></td>
		<td><?php echo "<img style='width: 250px; height:137px;' src = 'assets/img/cars/".$display['car_img'] . "'>"; ?></td>
		<td><?php echo $display['price']; ?></td>
		<td><?php echo $display['year']; ?></td>
		<td><?php echo $display['car_availability']; ?></td>
		<td>
			<a class="btn btn-info" href="editcar.php?car_id=<?php echo $display['car_id']; ?>">Edit</a>  
			<a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this row?');" href="admin_page.php?delete_car=<?php echo $display['car_id']; ?>">Delete</a>
		</td>
	</tr>
	</tbody>
	<?php }?>
</table>
</div>
<br id="driver_table"><br>
<br><h3> Driver Table</h3>
<div style="border:solid 1px;">
<?php $result = mysqli_query($conn, "SELECT * FROM driver WHERE driver_status = 'Active'");
?>
<table class ="table">
	<thead class="thead-dark">
	<tr>
		<th>Driver ID</th>
		<th>Name</th>
		<th>License Number</th>
		<th>Phone Number</th>
		<th>Address</th>
		<th>Gender</th>
		<th>Availability</th>
		<th>Edit and Delete</th>
	</tr>
	</thead>
	<tbody class="tbody-light">
	<?php while ($display = mysqli_fetch_array($result)) {?>
	<tr>
		<td><?php echo $display['driver_id']; ?></td>
		<td><?php echo $display['driver_name']; ?></td>
		<td><?php echo $display['dl_number']; ?></td>
		<td><?php echo $display['driver_phone']; ?></td>
		<td><?php echo $display['driver_address']; ?></td>
		<td><?php echo $display['driver_gender']; ?></td>
		<td><?php echo $display['driver_availability']; ?></td>
		<td>
			<a class="btn btn-info" href="editdriver.php?driver_id=<?php echo $display['driver_id']; ?>">Edit</a>   
			<a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this row?');" href="admin_page.php?delete_driver=<?php echo $display['driver_id']; ?>">Delete</a>
		</td>
	</tr>
	</tbody>
	<?php }?>
</table>
</div>
</center>
</body>
</html>