<?php

class Database
{
    private $host = DB_HOST;
    private $username = DB_USERNAME;
    private $password = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $statement;

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->statement = $this->dbh->prepare($query);
    }

    public function bindParam($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        $this->statement->bindValue($param, $value, $type);
    }

    public function fetchAll()
    {
        $this->statement->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function execute()
    {
        $isSuccess = $this->statement->execute();
        if (!$isSuccess) {
            return false;
        }

        return $this->statement->rowCount() > 0;
    }

    public function fetch()
    {
        $this->statement->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
}