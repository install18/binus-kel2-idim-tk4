<?php


class HakAksesModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("HakAkses");
    }

    public function getHakAksesByIdAkses($idAkses)
    {
        $this->db->query("SELECT * FROM $this->table WHERE idAkses=:idAkses");
        $this->db->bindParam('idAkses', $idAkses);
        return $this->db->fetchAll();
    }
}
