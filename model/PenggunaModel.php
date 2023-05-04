<?php

class PenggunaModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("Pengguna");
    }

    public function getPenggunaByNamaPenggunaAndPassword($namaPengguna, $password)
    {
        $this->getDb()->query(`SELECT * FROM ${this->getTable()} WHERE namaPengguna=:namaPengguna AND password=:password`);
        $this->getDb()->bindParam('namaPengguna', $namaPengguna);
        $this->getDb()->bindParam('password', $password);
        return $this->getDb()->fetch();
    }
}