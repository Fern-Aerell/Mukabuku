<?php

    require_once "database.php";

    session_start();

    if(isset($_SESSION["email"]) && isset($_SESSION["pass"]))
    {
        $email = $_SESSION["email"];
        $pass = $_SESSION["pass"];
    }else{
        if(isset($_POST["email"]) && isset($_POST["pass"])) {
            $email = $_POST["email"];
            $pass = $_POST["pass"];
        }
    }

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

<?php

if(isset($email) && isset($pass)) {
    if(!empty($email) && !empty($pass)) {
        $query = "SELECT * FROM akun WHERE email = :email AND pass = :pass";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $_SESSION["email"] = $email;
            $_SESSION["pass"] = $pass;
            $_SESSION["user"] = [
                "id" => $user["id"],
                "email" => $user["email"],
                "pass" => $user["pass"],
                "username" => $user["username"]
            ];
            header("Location: ".$_ENV["BASE_URL"]."/chat_global.php");
        }else{
            echo '<script>setMessage("Akun Tidak Terdaftar");</script>';
        }
    }else{
        echo '<script>setMessage("Email dan Password Harus Di Isi!");</script>';
    }
}

?>

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