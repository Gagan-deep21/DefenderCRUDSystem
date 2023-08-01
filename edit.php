<?php
session_start();
// Include database file
include 'database.php';

$customerObj = new database();
// Edit customer record
if(isset($_GET['editId']) && !empty($_GET['editId'])) {
  $editId = $_GET['editId'];
  $r = $customerObj->displayRecordById($editId);
}

// Update Record in customer table
if(isset($_POST['update'])) {
  $customerObj->updateRecord($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD With PDO</title>
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
        <h1 class="title">Update your record</h1>
      </div>
    </div>
  </header>
  <section class="section">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-half">
          <div class="card">
            <div class="card-header has-background-primary">
              <h4 class="card-header-title has-text-white">Update Records</h4>
            </div>
            <div class="card-content">
              <form action="edit.php" method="POST">
                <div class="field">
                  <label class="label">Name:</label>
                  <div class="control">
                    <input type="text" class="input" name="nname" value="<?php echo $r['Name'] ?? ''; ?>" required="">
                  </div>
                </div>
                <div class="field">
                  <label class="label">Email:</label>
                  <div class="control">
                    <input type="email" class="input" name="eemail" value="<?php echo $r['Email'] ?? ''; ?>" required="">
                  </div>
                </div>
                <div class="field">
                  <label class="label">Mobile No:</label>
                  <div class="control">
                    <input type="text" class="input" name="pphone" value="<?php echo $r['Mobile'] ?? ''; ?>" required="">
                  </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $r['id'] ?? ''; ?>">
                <div class="field is-grouped">
                  <div class="control">
                    <input type="submit" name="update" class="button is-primary" value="Update">
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
    </div>
  </section>
</body>
</html>
