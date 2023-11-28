<?php

namespace App;

require_once '../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Database;

$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

$database = new Database($_ENV["DB_HOST"], $_ENV["DB_NAME"],$_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);

session_start();

if(isset($_SESSION["email"]) && isset($_SESSION["pass"]))
{
    $email = $_SESSION["email"];
    $pass = $_SESSION["pass"];
}else{
    if(isset($_POST["email"]) && isset($_POST["pass"]))
    {
        if(!empty($_POST["email"]) && !empty($_POST["pass"])) {
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            if($database->login($email, $pass))
            {
                chat_global();
            }else{
                require_once "../app/views/login.php";
                echo '<script>setMessage("Akun Tidak Terdaftar");</script>';
            }
        }else{
            require_once "../app/views/login.php";
            echo '<script>setMessage("Email dan Password Harus Di Isi!");</script>';
        }
    }
}

if(isset($_SESSION["email"]) && isset($_SESSION["pass"]))
{
    $email = $_SESSION["email"];
    $pass = $_SESSION["pass"];

    if($database->login($email, $pass))
    {
        $username = $database->getAkunUsername($email, $pass);
        chat_global();
        die();
    }else{
        require_once "../app/views/login.php";
        echo '<script>setMessage("Akun Tidak Terdaftar");</script>';
        die();
    }
}

if(isset($_POST["email"]) && isset($_POST["pass"]))
{
    if(!empty($_POST["email"]) && !empty($_POST["pass"]))
    {
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        if($database->login($email, $pass))
        {
            $_SESSION["email"] = $email;
            $_SESSION["pass"] = $pass;
            $username = $database->getAkunUsername($email, $pass);
            chat_global();
            die();
        }else{
            require_once "../app/views/login.php";
            echo '<script>setMessage("Akun Tidak Terdaftar");</script>';
            die();
        }
    }else{
        require_once "../app/views/login.php";
        echo '<script>setMessage("Email dan Password Harus Di Isi!");</script>';
        die();
    }
}else{
    require_once "../app/views/login.php";
}

function chat_global() {
    require_once "../app/views/chat_global.php";
}

?>