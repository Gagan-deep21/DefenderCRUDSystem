<html>
    <head>
        <title>NAVIGATION BAR</title>
</head>
<body>
<nav class="navbar has-background-primary">
  <div class="container">
    <div class="navbar-brand">
      <label class="navbar-item logo has-text-white">MOGA PIZZA</label>
    </div>
    <div class="navbar-menu">
      <ul class="navbar-end">
        <li class="navbar-item"><a class="navbar-link has-text-white" href="view.php">View table</a></li>
        <li class="navbar-item"><a class="navbar-link has-text-white" href="index.php">Main page</a></li>
        <?php
        if(isset($_SESSION['user_name'])){
            echo '<li class="navbar-item"><a class="navbar-link has-text-white" href="add.php">ADD</a></li>';
        }
        if(isset($_SESSION['user_name'])){
            echo '<li class="navbar-item"><a class="navbar-link has-text-white" href="logout.php">LOG OUT</a></li>';
        }
        if(!isset($_SESSION['user_name'])){
            echo '<li class="navbar-item"><a class="navbar-link has-text-white" href="Signup.php">SIGN IN</a></li>';
        }
        ?>
      </ul>
    </div>
  </div>
</nav>


</body>
    </html>