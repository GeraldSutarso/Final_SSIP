<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}
?>
<!DOCTYPE html>
<html>

<title>Book Car </title>
<head>
    <script type="text/javascript" src="assets/ajs/angular.min.js"> </script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>  
  <script type="text/javascript" src="assets/js/custom.js"></script> 
 <link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
</head>
<body ng-app="">    
<div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form" action="booking.php" method="POST">
        <br style="clear: both">
          <br>

          <?php
          include ('navbar.php');
    if(isset($_POST['submit'])) {
		$car_id = $_POST['car_id'];
		$user_id = $_POST['user_id'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $startDates =strtotime($_POST['startDate']);
		$endDates = strtotime($_POST['endDate']);
    $diff = ($endDates - $startDates) / (60 * 60 * 24);
    $no_days = $diff;
    $price = $_POST['price'];
    $harga = (int)$price;
		// $no_days = $diff->format("%a");
    $total_price = $harga * $no_days;
		$driver_id = $_POST['driver_id'];

		$data = mysqli_query($conn, "INSERT INTO booking(car_id, user_id, startDate, endDate, no_days, price, total_price, driver_id, returned) VALUES('$car_id', '$user_id', '$startDate', '$endDate', '$no_days', '$price', '$total_price', '$driver_id', 'no')");
		$data2 = mysqli_query($conn, "UPDATE driver SET driver_availability = '0' WHERE driver_id = '$driver_id'");
    $data3 = mysqli_query($conn, "UPDATE cars SET car_availability = '0' WHERE car_id = '$car_id'");
    echo"<script> window.location.href='mybooking.php';</script>";
	}?>
        <?php
    $car_id = $_GET['car_id'];
    $data = mysqli_query($conn, "SELECT * FROM cars WHERE car_id='$car_id'");

    while ($display = mysqli_fetch_array($data)) {
         
     $car_id = $display['car_id'];
		 $car_name = $display['car_name'];
		 $car_nameplate = $display['car_nameplate'];
		 $price = $display['price']; 
		 $year = $display['year']; 
		 $car_availability = $display['car_availability']; }

     $sql2 = "SELECT * FROM driver WHERE driver_availability = '1' ";
     $result2 = mysqli_query($conn, $sql2);
     $sql3 = "SELECT * FROM driver WHERE driver_availability = '1' ";
     $result3 = mysqli_query($conn, $sql3);

        $sql4 = "SELECT * FROM user_form WHERE user_type = 'user'";
        $result4 = mysqli_query($conn, $sql4);
        while ($display4 = mysqli_fetch_array($result4)){
          $user_id = $display4['id'];
        }
        ?>
          
          <!-- <div class="form-group"> -->
              <h5> Selected Car:&nbsp;  <b><?php echo($car_name);?></b></h5>
         <!-- </div> -->
         
          <!-- <div class="form-group"> -->
            <h5> Number Plate:&nbsp;<b> <?php echo($car_nameplate);?></b></h5>
          <!-- </div>      -->
        <!-- <div class="form-group"> -->
        <?php $today = date("m-d-Y") ?>
          <label><h5>Start Date:</h5></label>
            <input type="date" name="startDate" min="<?php echo($today);?>" required="">
            &nbsp; 
          <label><h5>End Date:</h5></label>
          <input type="date" name="endDate" min="<?php echo($today);?>" required="">
        <!-- </div>      -->

         <h5> Charge type:  &nbsp;
            <input onclick="reveal()" type="radio" name="radio1" value="days" ng-model="myVar"><b> per day</b>

            <div ng-switch="myVar"> 
        <div ng-switch-default>
                    <!-- <div class="form-group"> -->
                <h5>Price: <h5>    
                <!-- </div>    -->
                     </div>
                     <div ng-switch-when="days">
                     <!-- <div class="form-group"> -->
                <h5>Price: <b><?php echo("Rp. " . $price . "/day");?></b><h5>    
                <!-- </div>   -->
                     </div>
        </div>
                <!-- <form class="form-group"> -->
                Select a driver: &nbsp;
                <select name="driver_id_from_dropdown" ng-model="myVar1">
                        <?php
                        if(mysqli_num_rows($result2) > 0){
                            while($row2 = mysqli_fetch_assoc($result2)){
                                $driver_id = $row2["driver_id"];
                                $driver_name = $row2["driver_name"];
                                $driver_gender = $row2["driver_gender"];
                                $driver_phone = $row2["driver_phone"];
                    ?>
                    <option value="<?php echo($driver_id); ?>"><?php echo($driver_name); ?>
                    <?php }} 
                    else{
                        ?>
                    Sorry! No Drivers are currently available, try again later...
                        <?php
                    }
                    ?>
                </select>
                <!-- </form> -->
                <div ng-switch="myVar1">
                <?php
                        if(mysqli_num_rows($result3) > 0){
                            while($row3 = mysqli_fetch_assoc($result3)){
                                $driver_id = $row3["driver_id"];
                                $driver_name = $row3["driver_name"];
                                $driver_gender = $row3["driver_gender"];
                                $driver_phone = $row3["driver_phone"];
                ?>
                <div ng-switch-when="<?php echo($driver_id); ?>">
                    <h5>Driver Name:&nbsp; <b><?php echo($driver_name); ?></b></h5>
                    <p>Gender:&nbsp; <b><?php echo($driver_gender); ?></b> </p>
                    <p>Contact:&nbsp; <b><?php echo($driver_phone); ?></b> </p>
                </div>
                <?php }} ?>
                </div>
                <input type="hidden" name="car_id" value="<?php echo $car_id; ?>">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="hidden" name="price" value="<?php echo $price; ?>">
                <input type="hidden" name="driver_id" value="<?php echo $driver_id; ?>"><br>
                
           <a class="btn btn-info pull-left" href="user_page.php"> Back</a>
           <input type="submit" onclick="return confirm('Are you sure you want to Book? To cancel later you have to contact admin.');" name="submit" value="Rent Now" class="btn btn-warning pull-right">     
        </form>
        
      </div>
      <div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
            <h6><strong>Note:</strong> You will be charged with extra <span class="text-danger">Rp 50.000</span> for each day after the due date ends.</h6>
        </div>
    </div>
</body>
<?php include ('footer.php')?>
</html>