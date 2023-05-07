<?php

class BaseModel
{
    protected $table;
    protected $db;

    protected function __construct($table)
    {
        $this->db = new Database;
        $this->table = $table;
    }
}
