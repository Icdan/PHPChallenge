<?php

include "include/database.php";

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $registerQuery = "INSERT INTO users (Naam, Email, Wachtwoord) VALUES ('$name', '$email', '$password')";

    if (mysqli_query($connection, $registerQuery)) {
        header("Location: index.php");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php
    include "include/header.php";
    ?>
</head>
<body>
<div id="loginContainer" class="col-sm-4 mx-auto">
    <h3>Welcome to Spotitube</h3>
    <h4>Please enter the information you would like to register with</h4>
    <form method="post">
        <label>Name: </label>
        <input class="registerInput form-control" type="text" name="name">
        <br>
        <label>Email: </label>
        <input class="registerInput form-control" type="email" name="email">
        <br>
        <label>Password: </label>
        <input class="registerInput form-control" type="password" name="password">
        <br>
        <input type='submit' name="register" class='btn btn-primary' id='registerBtn' value='Register'/>
    </form>
</div>

<?php
include "include/footer.php";
?>
</body>
</html>