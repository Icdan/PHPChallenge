<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "spotitube";


$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$connection) {
    die("Unable to connect to mySQL");
}

?>