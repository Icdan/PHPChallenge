<?php
session_start();

include "include/database.php";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

//    $loginSQL = "SELECT * FROM users WHERE email = '$email' AND wachtwoord = '$password'";
    $loginQuery = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email' AND wachtwoord = '$password'");

    if ($loginQuery) {
        $loginResult = mysqli_num_rows($loginQuery);
        if ($loginResult == 1) {
            $row = mysqli_fetch_assoc($loginQuery);
            $_SESSION['naam'] = $row['Naam'];
            $_SESSION['email'] = $row['Email'];
            $_SESSION['password'] = $row['Wachtwoord'];
            $_SESSION['id'] = $row['ID'];
            $_SESSION['loggedin'] = true;
            header("Location: overview.php");
        } elseif ($_POST) {
            echo "Please enter a valid username or password";
        }

    } else {
        echo "Error: " . $loginQuery . "<br>" . mysqli_connect_error();
    }
} elseif
    (isset($_POST['register'])){
    header("Location: register.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <?php
    include "include/header.php";
    ?>
    <title>Login</title>
</head>
<body>
<div id='loginContainer' class='col-sm-4 mx-auto'>
    <h3>Welcome to Spotitube</h3>
    <form method='post'>
        <div class='form-group'>
            <label>Email adres</label>
            <input type='email' name='email' class='form-control' placeholder='Email adres'>
        </div>
        <div class='form-group'>
            <label>Password</label>
            <input type='password' name='password' class='form-control' placeholder='Password'>
        </div>
        <input type='submit' name="login" class='btn btn-success' id='loginBtn' value='Log-in'/>
        <input type='submit' name="register" class='btn btn-primary' id='registerHomeBtn' value='Register'/>
    </form>
</div>
<pre>
<?php
if (isset($_POST)) {
    echo 'Contents of $_POST <br>';
    print_r($_POST);
}
?>
</pre>
<?php
include "include/footer.php";
?>
</body>
</html>