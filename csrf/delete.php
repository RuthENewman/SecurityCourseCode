<?php

require_once 'app/config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $deleteUser = $con->prepare("DELETE FROM users WHERE name = :name");
    $deleteUser->execute([
        'name' => $_SESSION['name']
    ]); 
}

?>
