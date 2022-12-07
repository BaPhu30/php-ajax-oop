<?php

include 'config.php';

$id = $_GET["id"];
$sql = "SELECT * FROM data WHERE id='$id'";
$result = $conn->query($sql);
$arResult = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $arResult[] = $row;
  }
  echo json_encode($arResult);
}
