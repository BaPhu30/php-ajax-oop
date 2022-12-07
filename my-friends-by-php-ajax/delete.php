<?php

include 'config.php';

$id = $_POST["id"];
$sql = "DELETE FROM data WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Xóa dữ liệu thành công";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
