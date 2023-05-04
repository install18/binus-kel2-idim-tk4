<?php

class BarangModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("Barang");
    }

    public function getBarangByIdBarang($idBarang)
    {
        $this->getDb()->query(`SELECT * FROM ${this->getTable()} WHERE idBarang=:idBarang`);
        $this->getDb()->bindParam('idBarang', $idBarang);
        return $this->getDb()->fetch();
    }

    public function getBarang()
    {
        $this->getDb()->query(`SELECT * FROM ${this->getTable()}`);
        return $this->getDb()->fetchAll();
    }
}