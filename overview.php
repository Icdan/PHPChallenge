<?php
session_start();

include "include/database.php";

if (!$_SESSION['loggedin'] == true) {
//    header("Location: index.php");
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

    $selectQuery = mysqli_query($connection, "SELECT * FROM playlist INNER JOIN users ON playlist.userID = users.ID WHERE users.ID = '$id'");


    while ($test = mysqli_fetch_array($selectQuery)) {
        $playlistName = $test['playlistNaam'];
        $playlistImage = $test['Image'];
        $playlistID = $test['playlistID'];

        $_SESSION['playlistName'] = $playlistName;
        $_SESSION['playlistImage'] = $playlistImage;
        $_SESSION['playlistID'] = $playlistID;

        echo "
                <tr>
                <td>$playlistName</td>
                <td><img src='$playlistImage' width='200' height='200'></td>
                <form action='showPlaylist.php' method='post'>
                    <td><input type='hidden' name='playlistID' id='hideThisInput' value='$playlistID'></td>
                    <td><input type='submit' name='editPlaylist' class='btn btn-primary ml-5' value='Bewerk deze playlist'></td>    
                    
                </form>           
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