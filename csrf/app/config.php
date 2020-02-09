<?php
session_start();

$_SESSION['name'] = 'Ruth Newman';

$con = new PDO('mysql:host=127.0.0.1;dbname=sql_injection', 'root', 'root');


    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        if(!isset($_POST['_token']) || ($_POST['_token'] !== $_SESSION['_token'])){

            die("INVALID TOKEN");



        }


    }


$_SESSION['_token'] = bin2hex(openssl_random_pseudo_bytes(16));






?>