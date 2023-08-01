<?php
session_start();
require_once('database.php');
$res = $database->read();
// Delete record from table
if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
  $deleteId = $_GET['deleteId'];
  $database ->deleteRecord($deleteId);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>MY DATA</title>
  <!-- Replace Bootstrap CSS with Bulma CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <!-- Optional Font Awesome Icons -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="custom.css" type="text/css">
</head>
<body id="viewbody">
<header>
<?php include 'nav.php'; ?>
</header>

<?php
if (isset($_GET['msg1']) && $_GET['msg1'] === "insert") {
  echo "<div class='notification is-success'>
          <button class='delete'></button>
          Your have successfully added data. 
        </div>";
}
if (isset($_GET['msg2']) && $_GET['msg2'] === "update") {
  echo "<div class='notification is-success'>
          <button class='delete'></button>
          Your Registration updated successfully
        </div>";
}
if (isset($_GET['msg3']) && $_GET['msg3'] === "delete") {
  echo "<div class='notification is-success'>
          <button class='delete'></button>
          Record deleted successfully
        </div>";
}
?>

<div class="container">
  <div class="columns">
    <div class="column is-10 is-offset-1">
      <table class="table is-fullwidth is-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Mobile_no</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>BUTTONS</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($_SESSION['user_name']) {
            while ($r = mysqli_fetch_assoc($res)) {
              ?>
              <tr>
                <td><?php echo $r['id'] ?></td>
                <td><?php echo $r['Mobile'] ?></td>
                <td><?php echo $r['Name'] ?></td>
                <td><?php echo $r['Email'] ?></td>
                <td>
                  <a class="button is-primary" href="edit.php?editId=<?php echo $r['id'] ?>">
                    Edit <i class="fa fa-pencil"></i>
                  </a>
                  <a class="button is-danger" href="view.php?deleteId=<?php echo $r['id'] ?>"
                     onclick="return confirm('Are you sure want to delete this record')">
                    Delete <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
              <?php
            }
          } else {
            // Show the login popup
            ?>
            <div class="modal is-active">
              <div class="modal-background"></div>
              <div class="modal-content has-text-centered">
                <p>You need to sign in to view this page.</p>
                <a class="button is-primary" href="Signup.php">signup</a>
                <a class="button is-danger" href="index.php">Cancel</a>
              </div>
            </div>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

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

</body>
</html>
