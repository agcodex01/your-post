<?php

class Database
{

    private $host = "localhost";
    private $database = "evsu";
    private $username = "root";
    private $password = "";

    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "<script> alert('Something went wrong. Database could not be connected:".  $exception->getMessage()." ')</script>" ;
            redirect('dashboard');
        }
        return $this->conn;
    }
}

$db = new Database();
$connection = $db->getConnection();