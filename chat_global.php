<?php

require_once "database.php";

if(!isset($_SESSION["user"]) || $_SESSION["user"] == null) {
    var_dump($_SESSION["user"]);
    // header("Location: ".$_ENV["BASE_URL"]."/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mukabuku - Chat Global</title>
    <link rel="stylesheet" href="assets/css/chat_global.css">
</head>
<body>
    <div class="container">
        <div class="profile-container">
            <div>
                <img class="foto-profile" src="assets/images/profile.png" alt="foto profile">
                <h1 class="username">Fern Aerell</h1>
            </div>
            <a href="?logout=true">Logout</a>
        </div>
        <div class="chat-container">
            <div class="list-chat-container">
                <div class="chat">
                    <h1 class="chat-username">Fern Aerell</h1>
                    <p class="isi-chat">Halo</p>
                </div>
            </div>
            <form class="form-chat" action="" method="post">
                <input class="input-chat" type="text" name="chat" id="chat" placeholder="Masukkan Pesan...">
                <button class="button-kirim" type="submit">Kirim</button>
            </form>
        </div>
    </div>
    <script src="assets/javascripts/chat_global.js"></script>
</body>
</html>