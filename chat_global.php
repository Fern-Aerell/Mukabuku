<?php

require_once "database.php";

session_start();

if(isset($_GET["logout"]))
{
	session_destroy();
	header("Location: login.php");
}

if(!isset($_SESSION["user"]) || $_SESSION["user"] == null) {
	header("Location: login.php");
}

if(isset($_SESSION["user"]) && $_SESSION["user"] != null && isset($_POST["chat"]) && !empty($_POST["chat"]))
{
	$query = "INSERT INTO chat_global (username, isi_chat) values('".$_SESSION["user"]["username"]."','".$_POST["chat"]."');";
    $stmt = $db->prepare($query);
    $stmt->execute();
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
                <h1 class="username"><?= $_SESSION["user"]["username"] ?></h1>
            </div>
            <a href="?logout=true">Logout</a>
        </div>
        <div class="chat-container">
            <div class="list-chat-container"></div>
            <form class="form-chat" action="" method="post">
                <input class="input-chat" type="text" name="chat" id="chat" placeholder="Masukkan Pesan...">
                <button class="button-kirim" type="submit">Kirim</button>
            </form>
        </div>
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="assets/javascripts/chat_global.js"></script>
</body>
</html>
