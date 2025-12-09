<?php
// InfinityFree Database Connection for GameLibrary Project
$host = "sql100.infinityfree.com";      // MySQL Host Name
$username = "if0_40636686";             // MySQL User Name
$password = "aZavW4oBLw8Vs";            // vPanel password
$database = "if0_40636686_gamelibrary_db";  // Database name

// Connect to MySQL
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>