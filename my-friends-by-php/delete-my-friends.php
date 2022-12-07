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

$ID = $_GET["ID"];
$sql = "DELETE FROM data WHERE ID='$ID'";

if ($conn->query($sql) === TRUE) {
  echo "Xóa dữ liệu thành công";
  header('location:index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
