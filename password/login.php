<?php 

$user = 'root';
$password = 'root';
$db = 'sql_injection';
$host = 'localhost';
$port = 8889;

$con = new PDO("mysql:host=$host;dbname=$db", $user, $password);

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    $userQuery = $con->prepare("SELECT * FROM users WHERE name = :name");

    $userQuery->execute([
        'name' => $name
    ]);

    $user = $userQuery->fetch(PDO::FETCH_OBJ);
    $db_password = $user->password;

    if(password_verify($password, $db_password)) {
        echo "<p class='bg-success'>Logged in</p>";
    } else {
        echo "<p class='bg-danger'>Username or password entered incorrectly</p>";
    }

}

?>

<!doctype html>
<html lang=en>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="col-sm-6 col-sm-offset-3">
            <form action="" method="post" autocomplete="off">
                <h2>Login</h2>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control"/>
                </div>
                <input type="submit" name="submit" class="btn btn-primary">
            </form>
        </div>
    </body>

</html>
