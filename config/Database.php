<?php

class Database
{

    private $host = "sql313.epizy.com";
    private $database = "epiz_28844383_evsu_blog";
    private $username = "epiz_28844383";
    private $password = "PnrOcQO0Wn0r8y";

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