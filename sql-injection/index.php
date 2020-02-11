<?php 

    $user = 'root';
    $password = 'root';
    $db = 'sql_injection';
    $host = 'localhost';
    $port = 8889;

    $con = new PDO("mysql:host=$host;dbname=$db", $user, $password);

    if (isset($_POST['email'])) {
        $email = $_POST['email']; 
        $userQuery = $con->prepare("SELECT * FROM users WHERE email = :email");
        $userQuery->execute([
            'email' => $email
        ]);

        if ($userQuery->rowCount()) {
            echo "We found a user";
        }
    }

?>

<!doctype html>
<html lang=en>
    <head>
        <meta charset="utf-8">
        <title>My SQL injection test</title>
    </head>
    <body>
        <form action="" method="post" autocomplete="off">
            <label for="name">Name</label>
            <input type="text" name="name" />
            <label for="email">Email</label>
            <input type="email" name="email" />
            <input type="submit">
        </form>
    </body>

</html>