<?php
session_start();

include "include/database.php";

if (!$_SESSION['loggedin'] == true) {
    header("Location: index.php");
}

$playlistID = $_POST['playlistID'];

if (isset($_POST['name']) && isset($_POST['artiest']) && isset($_POST['songURL'])) {
    $songName = $_POST['name'];
    $artist = $_POST['artiest'];
    $album = $_POST['album'];
    $songURL = $_POST['songURL'];

    if ($addSongQuery = mysqli_query($connection, "INSERT INTO songs (songname, artist, album, link, playlistID) VALUES ('$songName', '$artist', '$album','$songURL', '$playlistID')")) {
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
    <title>Overview</title>
</head>
<body>
<?php
include "include/navbar.php";

        $playlistID = $_POST['playlistID'];
        $selectQuery = mysqli_query($connection, "SELECT * FROM playlist INNER JOIN users ON playlist.userID = users.ID WHERE playlist.playlistID = '$playlistID'");

        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        echo "<table>";

        while ($test = mysqli_fetch_array($selectQuery)) {
            $playlistName = $test['playlistNaam'];
            $playlistImage = $test['Image'];
            $playlistID = $test['playlistID'];

            $_SESSION['playlistName'] = $playlistName;
            $_SESSION['playlistImage'] = $playlistImage;

            echo "
                <tr>
                <td>$playlistName</td>
                <td><img src='$playlistImage' width='200' height='200'></td>
                <td><input type='hidden' name='playlistID' value='$playlistID'></td>
                </tr>
                <tr>
                <td></td>
                <td><input type='button' value='Add song to playlist' class='mt-5'></td>
                </tr>
                ";
        }

        echo "
        <tr>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        ";

        echo "</table>";
        ?>
<div id="loginContainer" class="col-sm-4 mx-auto">
    <h4>Please enter the information for your song</h4>
    <form method="post">
        <label>Naam: </label>
        <input class="form-control" type="text" name="name">
        <br>
        <label>Artiest: </label>
        <input class="form-control" type="text" name="artiest">
        <br>
        <label>Album: </label>
        <input class="form-control" type="text" name="album">
        <br>
        <label>Link van liedje: </label>
        <input class="form-control" type="text" name="songURL">
        <br>
        <?php
        echo "<input type='hidden' value='$playlistID' name='playlistID'>"
         ?>
        <input type='submit' name="addSong" class='' value='Add song to playlist'/>
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