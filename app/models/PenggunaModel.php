<?php


class PenggunaModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("Pengguna");
    }

    public function getPengguna()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->fetchAll();
    }

    public function getPenggunaByNamaPenggunaAndPassword($namaPengguna, $password)
    {
        $this->db->query("SELECT * FROM $this->table WHERE namaPengguna=:namaPengguna AND password=:password");
        $this->db->bindParam('namaPengguna', $namaPengguna);
        $this->db->bindParam('password', $password);
        return $this->db->fetch();
    }

    public function getPenggunaByNamaPengguna($namaPengguna)
    {
        $this->db->query("SELECT * FROM $this->table WHERE namaPengguna=:namaPengguna");
        $this->db->bindParam('namaPengguna', $namaPengguna);
        return $this->db->fetchAll();
    }

    public function insertPengguna($namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $access)
    {
        $query = "INSERT INTO $this->table VALUES('', :namaPengguna, :password, :namaDepan, :namaBelakang, :noHp, :alamat, :idAkses)";

        $this->db->query($query);
        $this->db->bindParam('namaPengguna', $namaPengguna);
        $this->db->bindParam('password', $password);
        $this->db->bindParam('namaDepan', $namaDepan);
        $this->db->bindParam('namaBelakang', $namaBelakang);
        $this->db->bindParam('noHp', $noHp);
        $this->db->bindParam('alamat', $alamat);
        $this->db->bindParam('idAkses', $access);
        return $this->db->execute();
    }

    public function updatePengguna($namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat)
    {
        $query = "UPDATE $this->table SET password=:password, namaDepan=:namaDepan, namaBelakang=:namaBelakang, noHp=:noHp, alamat=:alamat WHERE namaPengguna=:namaPengguna";

        $this->db->query($query);
        $this->db->bindParam('namaPengguna', $namaPengguna);
        $this->db->bindParam('password', $password);
        $this->db->bindParam('namaDepan', $namaDepan);
        $this->db->bindParam('namaBelakang', $namaBelakang);
        $this->db->bindParam('noHp', $noHp);
        $this->db->bindParam('alamat', $alamat);
        return $this->db->execute();
    }

    public function deletePengguna($idPengguna)
    {
        $query = "DELETE FROM $this->table WHERE idPengguna=:idPengguna";

        $this->db->query($query);
        $this->db->bindParam('idPengguna', $idPengguna);
        return $this->db->execute();
    }
}
