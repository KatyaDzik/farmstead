<?php
session_start();
if(!isset($_SESSION["user"])) {
    \App\Services\Router::redirect('/test');
}
header('Content-Type: json/application');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello, <?php echo $_SESSION["user"]["type"]?></h1>
    <form action="/auth/logout" method="POST">
        <button type="submit">Logout</button>
    </form>
</body>
</html>