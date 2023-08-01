<?php
session_start();
// Include database file
include 'database.php';

$customerObj = new database();

// Insert Record in customer table
if(isset($_POST['submit'])) {
  
  $customerObj->insertData($_POST);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD With PDO | Add Record</title>
  <meta name="description" content="This week we will be building a CREATE and READ CRUD system with PDO">
  <meta name="robots" content="noindex, nofollow">
  <!-- Replace Google fonts with Bulma CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <!-- Optional Font Awesome Icons -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
  <header class="hero is-primary">
    <div class="hero-body">
      <div class="container has-text-centered">
        <h1 class="title"> Add Record</h1>
      </div>
    </div>
  </header>
  <section class="section">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-half">
          <div class="box">
            <form action="add.php" method="POST">
              <div class="field">
                <label class="label">Name:</label>
                <div class="control">
                  <input type="text" class="input" name="name" placeholder="Enter name" required="">
                </div>
              </div>
              <div class="field">
                <label class="label">Email:</label>
                <div class="control">
                  <input type="email" class="input" name="email" placeholder="Enter email" required="">
                </div>
              </div>
              <div class="field">
                <label class="label">Phone No:</label>
                <div class="control">
                  <input type="text" class="input" name="phoneno" placeholder="Enter Phone No" required="">
                </div>
              </div>
              <div class="field is-grouped">
                <div class="control">
                  <input type="submit" name="submit" class="button is-primary" value="Submit">
                </div>
                <div class="control">
                  <a href="view.php" class="button is-primary"> GO BACK</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
