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

    public function insertBarang($namaBarang, $keterangan, $harga, $satuan, $stok)
    {
        $query = `INSERT INTO ${this->getTable()} VALUES ('', :namaBarang, :keterangan, :harga, :satuan, :stok)`;

        $this->getDb()->query($query);
        $this->getDb()->bindParam('namaBarang', $namaBarang);
        $this->getDb()->bindParam('keterangan', $keterangan);
        $this->getDb()->bindParam('satuan', $satuan);
        $this->getDb()->bindParam('harga', $harga);
        $this->getDb()->bindParam('stok', $stok);

        return $this->getDb()->execute();
    }

    public function updateBarang($namaBarang, $keterangan, $harga, $satuan, $stok, $idBarang)
    {
        $query = `UPDATE ${this->getTable()} SET
        namaBarang=:namaBarang,
        keterangan=:keterangan,
        satuan=:satuan,
        harga=:harga,
        stok=:stok
        WHERE idBarang=:idBarang`;

        $this->getDb()->query($query);
        $this->getDb()->bindParam('idBarang', $idBarang);
        $this->getDb()->bindParam('namaBarang', $namaBarang);
        $this->getDb()->bindParam('keterangan', $keterangan);
        $this->getDb()->bindParam('satuan', $satuan);
        $this->getDb()->bindParam('harga', $harga);
        $this->getDb()->bindParam('stok', $stok);

        return $this->getDb()->execute();
    }

    public function updateStokBarang($idBarang, $updatedStok)
    {
        $query = `UPDATE ${this->getTable()} SET stok=:stok WHERE idBarang=:idBarang`;

        $this->getDb()->query($query);
        $this->getDb()->bindParam('stok', $updatedStok);
        $this->getDb()->bindParam('idBarang', $idBarang);

        return $this->getDb()->execute();

    }
}