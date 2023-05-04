<?php

class PembelianModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("Pembelian");
    }

    public function getPembelianByIdPengguna($idPengguna)
    {
        $this->getDb()->query(`SELECT * FROM ${this->getTable()} WHERE idPengguna=:idPengguna`);
        $this->getDb()->bindParam('idPengguna', $idPengguna);
        return $this->getDb()->fetchAll();
    }

    public function getPembelian()
    {
        $this->getDb()->query(`SELECT * FROM ${this->getTable()}`);
        return $this->getDb()->fetchAll();
    }
}

