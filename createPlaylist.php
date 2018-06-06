<?php
session_start();

include "include/database.php";

$id = $_SESSION['id'];

if (isset($_POST['name']) && isset($_POST['imageLink'])) {
    $name = $_POST['name'];
    $imageURL = $_POST['imageLink'];

    $registerQuery = "INSERT INTO playlist (playlistNaam, Image, userID) VALUES ('$name', '$imageURL', '$id')";

    if (mysqli_query($connection, $registerQuery)) {
        header("Location: overview.php");
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
    <h4>Please enter the information for your playlist</h4>
    <form method="post">
        <label>Naam: </label>
        <input class="form-control" type="text" name="name">
        <br>
        <label>Image link (400 x 400px): </label>
        <input class="form-control" type="text" name="imageLink">
        <br>
        <input type='submit' name="register" class='btn btn-primary' id='registerBtn' value='Register'/>
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