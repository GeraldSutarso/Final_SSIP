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
    <?php 
    include('navbar.php'); 
    ?>

<center>
<h3 > Car Table </h3>
<div style="border:solid 1px;">
<?php $results = mysqli_query($conn, "SELECT * FROM rentedcars rc, cars c WHERE  c.car_id=rc.car_id AND rc.return_status='R'");
?>
<table class ="table">
	<thead class="thead-dark">
	<tr>
    <th width="15%">Car</th>
    <th width="15%">Start Date</th>
    <th width="15%">End Date</th>
    <th width="10%">Fare</th>
    <th width="15%">Number of Days</th>
    <th width="15%">Total Amount</th>
	</tr>
	</thead>
	<tbody class="tbody-light">
	<?php while ($display = mysqli_fetch_array($results)) {?>
	<tr>
    <td><?php echo $row["car_name"]; ?></td>
<td><?php echo $row["rent_start_date"] ?></td>
<td><?php echo $row["rent_end_date"]; ?></td>
<td>Rp.  <?php 
            if($row["charge_type"] == "days"){
                    echo ($row["fare"] . "/day");
                } 
            ?></td>
<td><?php  if($row["charge_type"] == "days"){
                    echo ("-");
                }?></td>
<td><?php echo $row["no_of_days"]; ?> </td>
<td>Rp.  <?php echo $row["total_amount"]; ?></td>
</tr>
<?php        } ?>
                </table>
                </div> 
        
        <div class="container">
      <div class="jumbotron">
        <h1 class="text-center">You have not rented any cars till now!</h1>
        <p class="text-center"> Please rent cars in order to view your data here. </p>
      </div>
    </div>

</body>
