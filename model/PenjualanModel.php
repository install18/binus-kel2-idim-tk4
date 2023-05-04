<?php

class PenjualanModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("Penjualan");
    }

    public function getPenjualanByIdPengguna($idPengguna)
    {
        $this->getDb()->query(`SELECT * FROM ${this->getTable()} WHERE idPengguna=:idPengguna`);
        $this->getDb()->bindParam('idPengguna', $idPengguna);
        return $this->getDb()->fetchAll();
    }

    public function getPenjualan()
    {
        $this->getDb()->query(`SELECT * FROM ${this->getTable()}`);
        return $this->getDb()->fetchAll();
    }
}

