<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>MOGA PIZZA</title>
  <!-- Replace Bootstrap CSS with Bulma CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>
  <?php include 'nav.php'; ?>

  <header>
    <img src="pizza.jpg" alt="PIZZA IMAGE" height="150px" width="170px" class="img2">
    <h1 class="title is-1">Order Confirmed</h1>
  </header>
  
  <main class="section">
    <div class="container">
      <?php
      $fname = $_POST['name'];
      echo('<p class="subtitle">Hello, '.$fname.'! Your order has been confirmed.</p>');
      $menu = $_POST['menu'];
      echo('<p class="content">Your selected pizza is: '.$menu.'</p>');
      $size = $_POST['size'];
      echo('<p class="content">Selected size: '.$size.'</p>');
      $counting = $_POST['counting'];
      echo('<p class="content">No of pizzas: '.$counting.'</p>');
      echo('<p class="content has-text-success">Thank you for choosing MOGA PIZZA.</p>');
      ?>
    </div>
  </main>

  <footer class="footer has-background-primary has-text-white">
    <div class="container has-text-centered">
      <hr class="footer-divider">
      <span class="footer-emoji">🍕</span>
      <small>The triangle you love to eat.</small>
    </div>
  </footer>
</body>
</html>
