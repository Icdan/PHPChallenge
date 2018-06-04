<?php
session_start();

include "include/database.php";

if (!$_SESSION['loggedin'] == true) {
    header("Location: index.php");
}

$id = $_SESSION['id'];

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
?>

<div id="contentContainer">
    <?php
    echo "Welkom bij uw playlists, " . $_SESSION['naam']
    ?>
    <br><input type="button" value="Create a playlist" onclick="directToPlaylistCreation()">
    <?php
    echo "<table>";

//    $selectQuery = mysqli_query($connection, "SELECT * FROM playlist WHERE userid = '$id'");
    $selectQuery = mysqli_query($connection, "SELECT * FROM playlist INNER JOIN users ON playlist.userID = users.ID WHERE users.ID = '$id'");
//    $playlistID = $_SESSION[''];


//    if ($selectQuery) {
//        $row = mysqli_fetch_assoc($selectQuery);
        echo "<pre>";
//        var_dump($row);
        var_dump($_SESSION);
//        var_dump($selectQuery);
        echo "</pre>";
//    }

    while ($test = mysqli_fetch_array($selectQuery)) {
        $playlistName = $test['playlistNaam'];
        $playlistImage = $test['Image'];
        $_SESSION['playlistName'] = $playlistName;
        $_SESSION['playlistImage'] = $playlistImage;
        $_SESSION['playlistID'] = $test['playlistID'];

        echo "
                <tr>
                <td>$playlistName</td>
                <td><a href='#'><img src='$playlistImage' width='200' height='200'></a></td>
                <td><form method='post'><input type='submit' name='editPlaylist' class='btn btn-primary ml-5' value='Edit this playlist'></form></td>
                </tr>";
    }
    echo "</table>";
    ?>
</div>
<?php
include "include/footer.php";
?>
<pre>
<?php
if (isset($_POST)) {
    echo 'Contents of $_POST <br>';
    print_r($_POST);
}
?>
</pre>
<script>
    function directToPlaylistCreation() {
        window.location.href = "createPlaylist.php";
    }
</script>
</body>
</html>