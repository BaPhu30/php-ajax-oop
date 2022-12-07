<?php

include 'config.php';

if (isset($_POST)) {

  $ID = $_POST["ID"];
  $Name = $_POST["Name"];
  $Phone = $_POST["Phone"];
  $ImageOld = $_POST["ImageOld"];
  $VideoOld = $_POST["VideoOld"];

  if (count($_FILES) != 0) {
    $Image = array();
    $Video = array();
    $countFile = count($_FILES["File"]['name']);

    for ($i = 0; $i < $countFile; $i++) {
      $typeFile = $_FILES["File"]['type'][$i];
      $nametypeFile = substr(($_FILES["File"]['type'][$i]), 0, 5);
      $nameFile = $_FILES["File"]['name'][$i];
      $tmpNamePath = $_FILES['File']['tmp_name'][$i];
      if ($nametypeFile == "image") {
        $linkImage = "images/";
        $newImagePath = $linkImage . $_FILES['File']['name'][$i];
        if (move_uploaded_file($tmpNamePath, $newImagePath)) {
          array_push($Image, $nameFile);
        };
      } else {
        $linkVideo = "videos/";
        $newVideoPath = $linkVideo . $_FILES['File']['name'][$i];
        if (move_uploaded_file($tmpNamePath, $newVideoPath)) {
          array_push($Video, $nameFile);
        };
      };
    };
    $Image = implode(", ", $Image);
    $Video = implode(", ", $Video);
    if ($Image == "") {
      $Image = 'avatar_user.png';
    }
  } else {
    $Image = $ImageOld;
    $Video = $VideoOld;
  };

  $sql = "UPDATE data SET Name = '$Name', Phone = '$Phone', Image = '$Image', Video = '$Video' WHERE ID = $ID";

  if ($conn->query($sql) === TRUE) {
    echo "Sửa dữ liệu thành công";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}