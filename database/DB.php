<?php

namespace Database;

use PDO;
use PDOException;

class DB
{
    /**
     * @var PDO
     */
    protected PDO $pdo;

    /**
     * @var string
     */
    protected string $sql;

    public function __construct()
    {
        try {
            $connection = $_ENV["DB_HOST"];
            $port = $_ENV["DB_PORT"];
            $db = $_ENV["DB_DATABASE"];
            $root = $_ENV["DB_USERNAME"];
            $password = $_ENV["DB_PASSWORD"];

            $this->pdo = new PDO("mysql:host=$connection:$port; charset=utf8; dbname=$db", $root, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    /**
     * @param $table
     * @return DB
     *
     */
    public function table($table, $field = null, $operator = null)
    {
        $query = "select * from ".$table ." where " . $field. " = " . "'$operator'";
        $result = $this->pdo->query($query)->rowCount();

        return  $result ?? false;
    }


}