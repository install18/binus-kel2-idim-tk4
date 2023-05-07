<?php


class BarangModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("Barang");
    }

    public function getBarangByIdBarang($idBarang)
    {
        $this->db->query("SELECT * FROM $this->table WHERE idBarang=:idBarang");
        $this->db->bindParam('idBarang', $idBarang);
        return $this->db->fetch();
    }

    public function getBarang()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->fetchAll();
    }

    public function insertBarang($namaBarang, $keterangan, $harga, $satuan, $stok)
    {
        $query = "INSERT INTO $this->table VALUES ('', :namaBarang, :keterangan, :harga, :satuan, :stok)";

        $this->db->query($query);
        $this->db->bindParam('namaBarang', $namaBarang);
        $this->db->bindParam('keterangan', $keterangan);
        $this->db->bindParam('satuan', $satuan);
        $this->db->bindParam('harga', $harga);
        $this->db->bindParam('stok', $stok);

        return $this->db->execute();
    }

    public function updateBarang($namaBarang, $keterangan, $harga, $satuan, $stok, $idBarang)
    {
        $query = "UPDATE $this->table SET
        namaBarang=:namaBarang,
        keterangan=:keterangan,
        satuan=:satuan,
        harga=:harga,
        stok=:stok
        WHERE idBarang=:idBarang";

        $this->db->query($query);
        $this->db->bindParam('idBarang', $idBarang);
        $this->db->bindParam('namaBarang', $namaBarang);
        $this->db->bindParam('keterangan', $keterangan);
        $this->db->bindParam('satuan', $satuan);
        $this->db->bindParam('harga', $harga);
        $this->db->bindParam('stok', $stok);

        return $this->db->execute();
    }

    public function updateStokBarang($idBarang, $updatedStok)
    {
        $query = "UPDATE $this->table SET stok=:stok WHERE idBarang=:idBarang";

        $this->db->query($query);
        $this->db->bindParam('stok', $updatedStok);
        $this->db->bindParam('idBarang', $idBarang);

        return $this->db->execute();
    }

    public function deleteBarang($idBarang)
    {
        $query = "DELETE FROM $this->table WHERE idBarang=:idBarang";

        $this->db->query($query);
        $this->db->bindParam('idBarang', $idBarang);

        return $this->db->execute();
    }
}
