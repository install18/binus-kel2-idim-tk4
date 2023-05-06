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

    public function getPenjualanByIdBarang($idBarang)
    {
        $this->getDb()->query(`SELECT * FROM ${this->getTable()} WHERE idBarang=:idBarang`);
        $this->getDb()->bindParam('idBarang', $idBarang);
        return $this->getDb()->fetchAll();
    }

    public function getPenjualan()
    {
        $this->getDb()->query(`SELECT * FROM ${this->getTable()}`);
        return $this->getDb()->fetchAll();
    }

    public function insertPenjualan($idBarang, $jumlahPenjualan, $hargaPenjualan, $idPengguna)
    {
        $query = `INSERT INTO ${this->getTable()} VALUES ('', :jumlahPenjualan, :hargaPenjualan, :idPengguna, :idBarang)`;

        $this->getDb()->query($query);
        $this->getDb()->bindParam('jumlahPenjualan', $jumlahPenjualan);
        $this->getDb()->bindParam('hargaPenjualan', $hargaPenjualan);
        $this->getDb()->bindParam('idPengguna', $idPengguna);
        $this->getDb()->bindParam('idBarang', $idBarang);

        return $this->getDb()->execute();

    }
}

