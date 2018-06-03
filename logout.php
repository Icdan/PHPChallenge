<?php
session_start();
session_unset();
session_destroy();

echo "<p align='center' style='margin-top:20%'>U bent uitgelogd</p>";

header("Refresh:1; url=index.php");