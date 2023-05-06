<?php

class PembelianModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("Pembelian");
    }

    public function getPembelian()
    {
        $this->getDb()->query(`SELECT * FROM ${this->getTable()}`);
        return $this->getDb()->fetchAll();
    }

    public function getPembelianByIdPengguna($idPengguna)
    {
        $this->getDb()->query(`SELECT * FROM ${this->getTable()} WHERE idPengguna=:idPengguna`);
        $this->getDb()->bindParam('idPengguna', $idPengguna);
        return $this->getDb()->fetchAll();
    }

    public function insertPembelian($idBarang, $jumlahPembelian, $hargaPembelian, $idPengguna)
    {
        $query = `INSERT INTO ${this->getTable()} VALUES ('', :jumlahPembelian, :hargaPembelian, :idPengguna, :idBarang)`;

        $this->getDb()->query($query);
        $this->getDb()->bindParam('jumlahPembelian', $jumlahPembelian);
        $this->getDb()->bindParam('hargaPembelian', $hargaPembelian);
        $this->getDb()->bindParam('idPengguna', $idPengguna);
        $this->getDb()->bindParam('idBarang', $idBarang);

        return $this->getDb()->execute();

    }
}

