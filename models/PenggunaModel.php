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

    public function getPenggunaByNamaPengguna($namaPengguna)
    {
        $this->getDb()->query(`SELECT * FROM ${this->getTable()} WHERE namaPengguna=:namaPengguna`);
        $this->getDb()->bindParam('namaPengguna', $namaPengguna);
        return $this->getDb()->fetch();
    }

    public function insertPengguna($namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $access)
    {
        $query = `INSERT INTO ${this->getTable()} VALUES ('', :namaPengguna, :password, :namaDepan, :namaBelakang, :noHp, :alamat, :access`;

        $this->getDb()->query($query);
        $this->getDb()->bindParam('namaPengguna', $namaPengguna);
        $this->getDb()->bindParam('password', $password);
        $this->getDb()->bindParam('namaDepan', $namaDepan);
        $this->getDb()->bindParam('namaBelakang', $namaBelakang);
        $this->getDb()->bindParam('noHp', $noHp);
        $this->getDb()->bindParam('alamat', $alamat);
        $this->getDb()->bindParam('access', $access);
        return $this->getDb()->execute();
    }

    public function updatePengguna($namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat)
    {
        $query = `UPDATE ${this->getTable()} SET password=:password, namaDepan=:namaDepan, namaBelakang=:namaBelakang, noHp=:noHp, alamat=:alamat WHERE namaPengguna=:namaPengguna`;

        $this->getDb()->query($query);
        $this->getDb()->bindParam('namaPengguna', $namaPengguna);
        $this->getDb()->bindParam('password', $password);
        $this->getDb()->bindParam('namaDepan', $namaDepan);
        $this->getDb()->bindParam('namaBelakang', $namaBelakang);
        $this->getDb()->bindParam('noHp', $noHp);
        $this->getDb()->bindParam('alamat', $alamat);
        return $this->getDb()->execute();
    }
}