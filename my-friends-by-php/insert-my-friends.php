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

if (isset($_POST["submit"])) {
  $Name = $_POST["Name"];
  $Phone = $_POST["Phone"];

  if ($_FILES['Image']['name'][0] !== "") {
    $countImage = count($_FILES['Image']['name']);
    $Image = array();
    for ($i = 0; $i < $countImage; $i++) {
      $tmpImagePath = $_FILES['Image']['tmp_name'][$i];
      $linkImage = "images/";
      $tmpImagePathNew = $linkImage . $_FILES['Image']['name'][$i];
      if ($tmpImagePath != "") {
        $nameImagePath = $_FILES['Image']['name'][$i];
        if (move_uploaded_file($tmpImagePath, $tmpImagePathNew)) {
          array_push($Image, $nameImagePath);
        };
      }
    }
    $Image = implode(", ", $Image);
  } else {
    $Image = "avatar_user.png";
  };

  if ($_FILES['Video']['name'][0] !== "") {
    $countVideo = count($_FILES['Video']['name']);
    $Video = array();
    for ($i = 0; $i < $countVideo; $i++) {
      $tmpVideoPath = $_FILES['Video']['tmp_name'][$i];
      $linkVideo = "videos/";
      $tmpVideoPathNew = $linkVideo . $_FILES['Image']['name'][$i];
      if ($tmpVideoPath != "") {
        $newVideoPath = $_FILES['Video']['name'][$i];
        if (move_uploaded_file($tmpVideoPath, $tmpVideoPathNew)) {
          array_push($Video, $newVideoPath);
        };
      }
    }
    $Video = implode(", ", $Video);
  } else {
    $Video = "";
  };

  $sql = "INSERT INTO data (Name, Phone, Image, Video) VALUES ('$Name', '$Phone', '$Image', '$Video')";
  if ($conn->query($sql) === TRUE) {
    echo "Thêm dữ liệu thành công";
    header('location:index.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}
