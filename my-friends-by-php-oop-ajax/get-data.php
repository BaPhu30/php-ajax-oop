<?php

include_once("classes/crud.php");

$crud = new crud();

$query = "SELECT * FROM data";

$result = $crud->getData($query);

echo json_encode($result);
