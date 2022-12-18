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
if (isset($_GET['returnyes'])) {
	$book_id = $_GET['returnyes'];
   $result = mysqli_query($conn, "SELECT * FROM booking INNER JOIN cars on booking.car_id = cars.car_id INNER JOIN driver ON booking.driver_id = driver.driver_id INNER JOIN user_form on booking.user_id = user_form.id");
   while ($display = mysqli_fetch_array($result)) {
      $driver_id = $display['driver_id'];
      $car_id = $display['car_id'];
      mysqli_query($conn, "UPDATE driver SET driver_availability = '1' WHERE driver_id = '$driver_id'");
      mysqli_query($conn, "UPDATE cars SET car_availability = '1' WHERE car_id = '$car_id'");
   }
	mysqli_query($conn, "UPDATE booking SET returned='yes' WHERE book_id = '$book_id'");
	header('location: viewbook.php');}
if (isset($_GET['returnno'])) {
	$book_id = $_GET['returnno'];
   $result = mysqli_query($conn, "SELECT * FROM booking INNER JOIN cars on booking.car_id = cars.car_id INNER JOIN driver ON booking.driver_id = driver.driver_id INNER JOIN user_form on booking.user_id = user_form.id");
   while ($display = mysqli_fetch_array($result)) {
      $driver_id = $display['driver_id'];
      $car_id = $display['car_id'];
      mysqli_query($conn, "UPDATE driver SET driver_availability = '0' WHERE driver_id = '$driver_id'");
      mysqli_query($conn, "UPDATE cars SET car_availability = '0' WHERE car_id = '$car_id'");
   }
	mysqli_query($conn, "UPDATE booking SET returned='no' WHERE book_id = '$book_id'");
	header('location: viewbook.php');}
if (isset($_GET['delete'])) {
	$book_id = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM booking WHERE book_id=$book_id");
	header('location: viewbook.php');}?>
<br id="view">
<br>
<center>
<h3 > All Bookings </h3>
<div style="border:solid 1px;">
<?php $results = mysqli_query($conn, "SELECT * FROM booking INNER JOIN cars on booking.car_id = cars.car_id INNER JOIN driver ON booking.driver_id = driver.driver_id INNER JOIN user_form on booking.user_id = user_form.id");
?>
<table class ="table">
	<thead class="thead-dark">
	<tr>
		<th>Book ID</th>
		<th>User ID</th>
		<th>Name</th>
      <th>E-mail</th>
		<th>Car ID</th>
		<th>Car Name</th>
		<th>Driver ID</th>
		<th>Driver Name</th>
		<th>Book Start Date</th>
      <th>Book End Date</th>
      <th>Total Price</th>
      <th>Returned</th>
      <th>Already Returned?</th>
      <th>Delete Booking</th>
	</tr>
	</thead>
	<tbody class="tbody-light">
	<?php while ($display = mysqli_fetch_array($results)) {?>
	<tr>
		<td><?php echo $display['book_id']; ?></td>
		<td><?php echo $display['user_id']; ?></td>
		<td><?php echo $display['name']; ?></td>
      <td><?php echo $display['email']; ?></td>
		<td><?php echo $display['car_id'];?></td>
		<td><?php echo $display['car_name']; ?></td>
		<td><?php echo $display['driver_id']; ?></td>
		<td><?php echo $display['driver_name']; ?></td>
      <td><?php echo $display['startDate']; ?></td>
      <td><?php echo $display['endDate']; ?></td>
      <td><?php echo $display['total_price']; ?></td>
      <td><?php echo $display['returned']; ?></td>
		<td>
			<a class="btn btn-info" href="viewbook.php?returnyes=<?php echo $display['book_id']; ?>">Yes</a>  
			<a class="btn btn-warning" href="viewbook.php?returnno=<?php echo $display['book_id']; ?>">No</a>
		</td>
      <td>
			<a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this row?');" href="viewbook.php?delete=<?php echo $display['book_id']; ?>">Delete</a>
		</td>
	</tr>
	</tbody>
	<?php }?>
</table>
</div>
</center>
</body>
</html>