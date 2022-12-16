<?php
session_start();
if(isset($_SESSION["user"])) {
    \App\Services\Router::redirect('/home');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/slyle.css">
</head>
<body>
    <h1>Login</h1>
    <form action="/auth/login" method="POST">
    <div class="form_group">
    <label for="login">Login </label>
    <input type="text" id="login" name="login">
    </div>

    <div class="form_group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    </div>
 
    <button type="submit">Войти</button>
    </form>
    
</body>
</html>