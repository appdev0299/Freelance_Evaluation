<?php
$serverName = "localhost";
$userName = "edonation";
$userPassword = "edonate@FON";
$dbName = "vote";
$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);
mysqli_set_charset($conn, "utf8");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
