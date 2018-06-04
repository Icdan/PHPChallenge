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
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
    echo "Welkom bij uw playlists, " . $_SESSION['naam']
    ?>
    <br><input type="button" value="Create a playlist" onclick="directToPlaylistCreation()">
    <?php
    echo "<table>";

    $selectQuery = mysqli_query($connection, "SELECT *  FROM playlist INNER JOIN users ON playlist.userID = users.ID WHERE users.ID = '$id'");

    while ($test = mysqli_fetch_array($selectQuery)) {
        echo "<pre>";
        var_dump($test);
        echo "</pre>";
        $playlistName = $test['playlistNaam'];
        $playlistImage = $test['Image'];

        echo "
                           <tr>
                           <td>$playlistName</td>
                           <td><a href='#'><img src='$playlistImage' width='300' height='300'></a></td>
                           </tr>";
    }
    echo "</table>";
    ?>
</div>
<?php
include "include/footer.php";
?>
<script>
    function directToPlaylistCreation() {
        window.location.href = "createPlaylist.php";
    }
</script>
</body>
</html>