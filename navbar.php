
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Car Rental</a>
    </div>
 
    <ul class="nav navbar-nav navbar-right">
    <li class="active"><a href="user_page.php">Home</a></li>
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
