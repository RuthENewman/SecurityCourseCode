<?php

require_once 'app/config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $delete_user = $con->prepare("DELETE FROM users WHERE name = :name");

    $delete_user->execute([
        'name' => $_SESSION['name']
    ]);
    
}

?>
