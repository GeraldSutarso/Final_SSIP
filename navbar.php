

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Car Rental</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li> <a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
      <li><a href="#">Page 4</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {?>
    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    <?php } else if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false){?>
        <li><a href="register_form.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login_form.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    <?php }?>
    </ul>
  </div>
</nav>
