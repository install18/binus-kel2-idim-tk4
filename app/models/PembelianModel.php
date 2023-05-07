<?php


class PembelianModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("Pembelian");
    }

    public function getPembelian()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->fetchAll();
    }

    public function getPembelianByIdPengguna($idPengguna)
    {
        $this->db->query("SELECT * FROM $this->table WHERE idPengguna=:idPengguna");
        $this->db->bindParam('idPengguna', $idPengguna);
        return $this->db->fetchAll();
    }

    public function insertPembelian($idBarang, $jumlahPembelian, $hargaPembelian, $idPengguna)
    {
        $query = "INSERT INTO $this->table VALUES ('', :jumlahPembelian, :hargaPembelian, :idPengguna, :idBarang)";

        $this->db->query($query);
        $this->db->bindParam('jumlahPembelian', $jumlahPembelian);
        $this->db->bindParam('hargaPembelian', $hargaPembelian);
        $this->db->bindParam('idPengguna', $idPengguna);
        $this->db->bindParam('idBarang', $idBarang);

        return $this->db->execute();
    }
}
