<?php

include 'config.php';

$sql = "SELECT * FROM data";
$result = $conn->query($sql);
$arResult = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $arResult[] = $row;
  }
  echo json_encode($arResult);
}
