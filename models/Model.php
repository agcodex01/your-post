<?php

abstract class Model
{

    public static function all(PDO $conn)
    {
        $statement = $conn->prepare('SELECT * FROM ' . strtolower(get_called_class()) . 's');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }
}
