<?php

namespace App\Core;
use PDO;
use PDOException;

class Database {

    private $host;
    private $dbname;
    private $user;
    private $password;
    private $pdo;

    function __construct($host, $dbname, $user, $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo "Gagal Terhubung Ke Database : " . $error->getMessage();
            die();
        }
    }

    public function login($email, $pass): bool
    {
        $query = "SELECT * FROM akun WHERE email = :email AND pass = :pass";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return true;
        }

        return false;
    }

}

?>