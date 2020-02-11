<?php
    session_start();

    $_SESSION['name'] = 'Ruth Newman';

    $user = 'root';
    $password = 'root';
    $db = 'sql_injection';
    $host = 'localhost';
    $port = 8889;

    $con = new PDO("mysql:host=$host;dbname=$db", $user, $password);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!isset($_POST['_token']) || ($_POST['_token'] !== $_SESSION['_token'])){
                die("Invalid token");
            }
        }

    $_SESSION['_token'] = bin2hex(openssl_random_pseudo_bytes(16));

?>
