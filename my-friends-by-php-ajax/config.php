<?php

header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "my_friends";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'UTF8');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
