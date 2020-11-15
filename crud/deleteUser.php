<?php
include_once 'crud.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $cruds->deleteUser($id);
    
}
else if (isset($_POST['selectUseId'])){

    $user_id = $_POST['selectUseId'];
    print_r($user_id);
	foreach ($user_id as $userId) {
		$cruds->deleteUser($userId);
	}
header("Location: index.php");
}
