<?php

include_once("classes/crud.php");

$crud = new crud();

$id = $crud->escape_string($_POST['id']);

$result = $crud->delete($id, 'data');
