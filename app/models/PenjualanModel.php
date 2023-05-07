<?php

class PenjualanModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("Penjualan");
    }

    public function getPenjualanByIdPengguna($idPengguna)
    {
        $this->db->query("SELECT * FROM $this->table WHERE idPengguna=:idPengguna");
        $this->db->bindParam('idPengguna', $idPengguna);
        return $this->db->fetchAll();
    }

    public function getPenjualanByIdBarang($idBarang)
    {
        $this->db->query("SELECT * FROM $this->table WHERE idBarang=:idBarang");
        $this->db->bindParam('idBarang', $idBarang);
        return $this->db->fetchAll();
    }

    public function getPenjualan()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->fetchAll();
    }

    public function insertPenjualan($idBarang, $jumlahPenjualan, $hargaPenjualan, $idPengguna)
    {
        $query = "INSERT INTO $this->table VALUES ('', :jumlahPenjualan, :hargaPenjualan, :idPengguna, :idBarang)";

        $this->db->query($query);
        $this->db->bindParam('jumlahPenjualan', $jumlahPenjualan);
        $this->db->bindParam('hargaPenjualan', $hargaPenjualan);
        $this->db->bindParam('idPengguna', $idPengguna);
        $this->db->bindParam('idBarang', $idBarang);

        return $this->db->execute();
    }
}
