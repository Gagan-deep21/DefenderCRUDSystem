<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>FORM</title>
  <!-- Replace Bootstrap CSS with Bulma CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>
  <header>
  <?php include 'nav.php'; ?>
    <?php
      if (isset($_SESSION['user_name']) ){
        echo "<div class='notification is-success'>
              <button class='delete'></button>
              You have successfully logged in.
            </div>";
      }
      if (isset($_GET['logout'] )){
        echo "<div class='notification is-success'>
              <button class='delete'></button>
              You have successfully logged out.
            </div>";
      }
      ?>
  </header>

  <main>
    <form id="pizza" method="POST" action="process-form.php">
      <fieldset>
        <legend><h2>Order Now</h2></legend>
        <img src="pizza.jpg" alt="PIZZA IMAGE" height="150px" width="170px" class="img2">

        <div class="field">
          <label class="label" for="menu">Select Pizza</label>
          <div class="control">
            <div class="select">
              <select id="menu" name="menu">
                <option value="chose">Choose</option>
                <option value="veg">Veg Pizza</option>
                <option value="corn">Corn Pizza</option>
                <option value="Pun">Punjabi Pizza</option>
                <option value="cheez">Special Cheese Pizza</option>
                <option value="sps">Moga Special Pizza</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label" for="counting">No of Pizzas</label>
          <div class="control">
            <input class="input" type="text" id="counting" name="counting" required placeholder="Enter no of pizzas">
          </div>
        </div>

        <div class="field">
          <label class="label" for="size">Size</label>
          <div class="control">
            <div class="select">
              <select id="size" name="size">
                <option value="choose">Choose</option>
                <option value="23cm">23cm</option>
                <option value="26cm">26cm</option>
                <option value="28cm">28cm</option>
                <option value="31cm">31cm</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label" for="crust">Crust</label>
          <div class="control">
            <div class="select">
              <select id="crust" name="crust">
                <option value="choose">Choose</option>
                <option value="Thin crust">Thin crust</option>
                <option value="Thick crust">Thick crust</option>
                <option value="Stuffed crust">Stuffed crust</option>
                <option value="Cheese crust">Cheese crust</option>
                <option value="Flat bread Crust">Flat bread Crust</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <fieldset>
            <legend>Toppings</legend>
            <label class="checkbox" for="sus">Sausage</label>
            <input type="checkbox" id="sus" name="toping">

            <label class="checkbox" for="mhm">Mushroom</label>
            <input type="checkbox" id="mhm" name="topping">

            <label class="checkbox" for="pep">Pepperoni</label>
            <input type="checkbox" id="pep" name="topping">

            <label class="checkbox" for="fgarlic">Fresh Garlic</label>
            <input type="checkbox" id="fgarlic" name="topping">

            <label class="checkbox" for="bolive">Black Olives</label>
            <input type="checkbox" id="bolive" name="topping">
          </fieldset>
        </div>

        <div class="field">
          <fieldset>
            <legend>Shape</legend>
            <label class="radio" for="rou">Round</label>
            <input type="radio" id="rou" name="shape">

            <label class="radio" for="squ">Square</label>
            <input type="radio" id="squ" name="shape">
          </fieldset>
        </div>

        <div class="field">
          <label class="label" for="ing">SPECIAL INGREDIENTS THAT YOU WANT TO ADD</label>
          <div class="control">
            <textarea class="textarea" id="ing" rows="5" cols="50"></textarea>
          </div>
        </div>

        <fieldset>
          <legend>Address info</legend>
          <div class="field">
            <label class="label" for="fname">Name</label>
            <div class="control">
              <input class="input" type="text" id="fname" name="name" required placeholder="Enter name">
            </div>
          </div>
          <div class="field">
            <label class="label" for="mail">Email</label>
            <div class="control">
              <input class="input" type="email" id="mail" name="email" required placeholder="Your mail">
            </div>
          </div>
          <div class="field">
            <label class="label" for="address">Your address</label>
            <div class="control">
              <input class="input" type="text" id="address" name="address" required placeholder="Enter address">
            </div>
          </div>
          <div class="field">
            <label class="label" for="phone">Your Number</label>
            <div class="control">
              <input class="input" type="tel" id="phone" name="phoneno" required placeholder="Mobile No.">
            </div>
          </div>
        </fieldset>

        <input class="button is-primary" type="submit" name="submit" value="Submit" id="subbt">
        <input class="button is-danger" type="reset" value="Clear" id="subbt">

        <div class="form-group submit-message">
          <?php
          require_once('database.php');
          require_once('validate.php');
          $valid = new validate();
          if (isset($_POST) && !empty($_POST)) {
            $name = $_POST['name'];
            $pno = $_POST['phoneno'];
            $email = $_POST['email'];
            $res = $database->create($pno, $name, $email);

            if ($res && $valid->validNumber($pno) && $valid->validEmail($email)) {
              echo "<p>Successfully inserted data</p>";
            } else {
              echo "<p>Failed to insert data</p>";
            }
          }
          ?>

          <!-- JavaScript for Bulma notification close buttons -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.delete');
    deleteButtons.forEach(button => {
      button.addEventListener('click', () => {
        const notification = button.closest('.notification');
        if (notification) {
          notification.style.display = 'none';
        }
      });
    });
  });
</script>
        </div>
      </fieldset>
    </form>
  </main>

  <footer>
    <small>The triangle you love to eat.</small>
  </footer>
</body>
</html>
