<?php

namespace App;

require_once '../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Database;

$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

$database = new Database($_ENV["DB_HOST"], $_ENV["DB_NAME"],$_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);

if(isset($_POST["email"]) && isset($_POST["pass"]))
{
    if(!empty($_POST["email"]) && !empty($_POST["pass"]))
    {
        if($database->login($_POST["email"], $_POST["pass"]))
        {
            require_once "../app/views/kata_pengantaran.html";
            die();
        }else{
            require_once "../app/views/login.html";
            echo '<script>setMessage("Akun Tidak Terdaftar");</script>';
            die();
        }
    }else{
        require_once "../app/views/login.html";
        echo '<script>setMessage("Email dan Password Harus Di Isi!");</script>';
        die();
    }
}else{
    require_once "../app/views/login.html";
}

?>