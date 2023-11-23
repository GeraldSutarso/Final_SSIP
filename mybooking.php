<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['user_name'])){
    session_destroy();
   header('location:login_form.php');
}
// if(stripos($_SERVER['REQUEST_URI'], 'mybooking.php')){
//   session_destroy();
//  header('location:mybooking.php');
// }
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
    <?php 
    include('navbar.php'); 
    ?>
    <center>
<h3 > &nbsp </h3>
<div style="border:solid 1px;">
<?php 
$user_id = $_GET['user_id'];
if ($user_id != $_SESSION['user_id'])
{header('location:mybooking.php?user_id='. $_SESSION['user_id']);}
$results = mysqli_query($conn, "SELECT * FROM cars, booking, driver WHERE cars.car_id = booking.car_id AND booking.driver_id = driver.driver_id AND booking.user_id = '$user_id' AND cars.car_status = 'Accessible' AND driver.driver_status = 'Active'");
?>
<br id="list_booking"><br><br><br>
<h3>Your Booking List</h3>
<table class ="table">
	<thead class="thead-dark">
	<tr>
		<th>Car Name</th>
		<th>Car Nameplate</th>
		<th>Start Date</th>
    <th>End Date</th>
		<th>Total Price</th>
		<th>Driver</th>
    <th>Driver Phone Number</th>
    <th>Returned</th>
    <th>Confirm Return to admin</th>
	</tr>
	</thead>
  <tbody class="tbody-light">
	<?php while ($display = mysqli_fetch_array($results)) {?>
	<tr>
		<td><?php echo $display['car_name']; ?></td>
		<td><?php echo $display['car_nameplate']; ?></td>
    <td><?php echo $display["startDate"] ?></td>
    <td><?php echo $display["endDate"]; ?></td>
    <td><?php echo $display['total_price']; ?></td>
    <td><?php echo $display['driver_name']; ?></td>
    <td><?php echo $display['driver_phone'];?></td>
    <td><?php echo $display['returned'];?></td>
    <td><a class="btn button-error" href="contactus.php">Contact Admin</a></td>
	</tr>
	</tbody>
	<?php }?>
</table>
</div>
<?php include('footer.php');?>
</body>
