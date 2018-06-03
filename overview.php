<?php
session_start();

include "include/database.php";


if (!$_SESSION['loggedin'] == true) {
    header("Location: index.php");
}

//$selectPlaylistSQL = "SELECT * FROM playlist";
//$selectQuery = mysqli_query($connection, $selectPlaylistSQL);
//
//$testSQL = "SELECT * FROM playlist";
//$testQuery = mysqli_query($connection, $testSQL);
//
//$testRow = mysqli_fetch_assoc($testQuery);
////$playlistName = $testRow['Naam'];
////$playlistImage = $testRow['Image'];
//
//$testNum = mysqli_num_rows($testQuery);
//
//var_dump($testNum);

//var_dump($testRow);
////print_r($testResult);
//
//if ($testRow > 0) {
//    foreach ($testRow as $value) {
//        echo "<br>$value";
//    }
//}




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
echo "Welkom bij uw playlists, " . $_SESSION['naam']
?>
<br><input type="button" value="Create a playlist" onclick="directToPlaylistCreation()">
<?php
echo "<table model='table table-striped'>";
$id = $_SESSION['id'];
$selectQuery = mysqli_query($connection,"SELECT * FROM playlist WHERE userid = '$id'");

    while ($test = mysqli_fetch_array($selectQuery)) {
        $playlistName = $test['Naam'];
        $playlistImage = $test['Image'];

        echo "
                           <tr>
                           <td>$playlistName</td>
                           <td><a href='#'><img src='$playlistImage'></a></td>
                           </tr>";
    }
//}
echo "</table>";
?>
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