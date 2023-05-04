<?php

class HakAksesModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("HakAkses");
    }

    public function getHakAksesByIdAkses($idAkses)
    {
        $this->getDb()->query(`SELECT * FROM ${this->getTable()} WHERE idAkses=:idAkses`);
        $this->getDb()->bindParam('idAkses', $idAkses);
        return $this->getDb()->fetchAll();
    }
}