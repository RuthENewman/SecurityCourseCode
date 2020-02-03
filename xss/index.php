<?php

$user = 'root';
$password = 'root';
$db = 'xss';
$host = 'localhost';
$port = 8889;

$con = new PDO("mysql:host=$host;dbname=$db", $user, $password);

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $commentQuery = $con->prepare("INSERT INTO comments(title, content) VALUES (:title, :content)");

    $commentQuery->execute([
        'title' => $title,
        'content' => $content
    ]);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XSS Scripting</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>


<div class="col-sm-6 col-sm-offset-3">
    <h3 class="text-center">Add a comment</h3>
    <form action="" method="post" autocomplete="off">


        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="content">Comment</label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <input type="submit" name="submit">
    </form>

    <?php foreach($comments as $comment): ?>

    <?php endforeach; ?>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <td>Test title</td>
            <td>Adding some interesting content here</td>
            <td>fake+email@testaddress.com</td>
        </tbody>
    </table>

</div>



</body>
</html>