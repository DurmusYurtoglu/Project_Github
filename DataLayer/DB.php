<?php

/**
 * Created by PhpStorm.
 * User: DURMUŞ
 * Date: 4.05.2017
 * Time: 16:31
 */
class DB
{
    private $servername = "";
    private $username = "root";
    private $password = "12345678";
    private $dbname = "theatre";
    private $connection;

    /**
     * @return mysqli
     */

    function __construct() {
        $this->connection = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->dbname
        );

        if ($this->connection->connect_error) {
            die("Bağlantı hatası: " . $this->connection->connect_error);
        }
        else

        $this->connection->set_charset("utf8");
    }

    function __destruct() {
        $this->connection->close();
    }

    public function getSearch($query) {
        $result = $this->connection->query($query);
        return $result;
    }

    public function getDataTable($query) {
        $result = $this->connection->query($query);
        return $result;
    }

    public function executeQuery($query) {
        return ($this->connection->query($query) === TRUE);
    }
    public function getConnection()
    {
        return $this->connection;
    }
}