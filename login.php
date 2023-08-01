<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LOGIN</title>
    <!-- Replace Bootstrap CSS with Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">LOGIN PAGE</h1>
            <form method="POST" action="login.php">
                <div class="field">
                    <label class="label" for="name">NAME</label>
                    <div class="control">
                        <input class="input" type="text" name="name">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="pass">PASSWORD</label>
                    <div class="control">
                        <input class="input" type="password" name="pass">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-primary" type="submit" name="submit">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $password = $_POST['pass'];
        include 'db.php';
        $obj = new Db();
        $result = $obj->LogIn($name, $password);
    }
    ?>
</body>
</html>
