<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mukabuku - log in or sign up</title>
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <div class="sidebox-container">
        <h1 class="animate__animated animate__fadeInLeft animate__fast">mukabuku</h1>
        <p class="animate__animated animate__fadeInLeft">Mukabuku membantu kamu untuk terhubung dan berbagi dengan orang orang yang ada di hidup mu.</p>
    </div>
    <div class="login-box-container animate__animated animate__jackInTheBox">
        <form action="" method="post">
            <p id="message" class="animate__animated animate__shakeX"></p>
            <input type="email" name="email" id="email" placeholder="Email address">
            <input type="password" name="pass" id="pass" placeholder="Password">
            <button class="login-button" type="submit">Log In</button>
            <a href="" onclick="fiturbelumtersedia()">Forgotten password?</a>
        </form>
        <hr>
        <button onclick="fiturbelumtersedia()" class="create-new-button">Create new account</button>
    </div>
    <script src="assets/javascripts/login.js"></script>
</body>

</html>