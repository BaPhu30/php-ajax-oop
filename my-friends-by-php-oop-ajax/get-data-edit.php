<?php

include_once("classes/crud.php");

$crud = new crud();

$id = $crud->escape_string($_GET["id"]);

$query = "SELECT * FROM data WHERE id='$id'";

$result = $crud->getData($query);

echo json_encode($result);
