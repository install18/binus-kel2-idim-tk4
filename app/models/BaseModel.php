<?php

class BaseModel
{
    private $table;
    private $db;

    public function __construct($table)
    {
        $this->db = new Database;
        $this->table = $table;
    }

    /**
     * @return String table name
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return Database database object
     */
    public function getDb()
    {
        return $this->db;
    }
}