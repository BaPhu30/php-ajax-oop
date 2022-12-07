<?php

include_once("classes/crud.php");
include_once("classes/validation.php");

$crud = new crud();
$validation = new validation();

if (isset($_POST)) {
  $Name = $crud->escape_string($_POST['Name']);
  $Phone = $crud->escape_string($_POST['Phone']);

  $msg = $validation->check_empty($_POST, array('Name', 'Phone'));
  $check_phone = $validation->is_phone_valid($_POST['Phone']);
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
      } elseif ($nametypeFile == "video") {
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
    $Image = 'avatar_user.png';
    $Video = '';
  };

  if ($msg != null) {
    echo $msg;
  } elseif (!$check_phone) {
    echo $check_phone;
  } else {
    $query = "INSERT INTO data (Name, Phone, Image, Video) VALUES ('$Name', '$Phone', '$Image', '$Video')";
    $result = $crud->execute($query);
  }
}
