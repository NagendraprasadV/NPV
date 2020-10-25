<?php
include_once 'crud.php';

$id = $_POST['id'];

$fetchDataById = $cruds->getUserById($id);

echo json_encode($fetchDataById->fetch(PDO::FETCH_ASSOC));