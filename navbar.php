
<nav class="navbar sticky-top navbar-fixed-top navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <div class="navbar-header">
    <?php if($_SESSION['userType'] == 1){?>
      <a class="navbar-brand" href="#">Car Rental | Admin Panel</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="admin_page.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="tambahmobil.php"><i class="fa-solid fa-car"></i></i></i> Add car</a></li>
				<li><a href="tambahdriver.php"><i class="fa-solid fa-user"></i></i> Add Driver</a></li>
				<li><a href="view.php"><i class="fa-solid fa-book"></i></i></i> View Book</a></li>
        <?php if(stripos($_SERVER['REQUEST_URI'], 'admin_page.php')){ ?>
        <li><a href="#car_table">Car Table</a></li>
        <li><a href="#driver_table">Driver Table</a></li>
        <?php }?>
    </ul>
    <?php } else{?>
    <a class="navbar-brand" href="#">Car Rental</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="prereturncar.php">Return Now </a></li>
      <li><a href="mybookings.php"> My Bookings </a></li>
    </ul>
    <?php }?>
    <ul class="nav navbar-nav navbar-right">
    <li class="active"><?php if($_SESSION['userType'] == 1){echo "<a href='admin_page.php'>Main";} elseif($_SESSION['userType'] == 2){echo "<a href='user_page.php'>Home";}?></a></li>
    <?php if ($_SESSION["loggedin"] != true) {?>
    <li><a href='register_form.php'><span class='glyphicon glyphicon-user'></span> Register</a></li>
  <li><a href='login_form.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
<?php }else{?>
  <li><a href="#">Welcome, <?php if($_SESSION['userType'] == 1){echo $_SESSION['admin_name'];} elseif($_SESSION['userType'] == 2){echo $_SESSION['user_name'];}?> </a></li>
<li> <a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>
<?php } ?>
    </ul>
  </div>
</nav>
