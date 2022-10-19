<?php

class JadwalHasAsistenDaoImpl
{
    public function fetchAllJadwalHasAsisten()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM jadwal_has_asisten';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'JadwalHasAsisten');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveJadwalHasAsisten(JadwalHasAsisten $jadwalHasAsisten)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO jadwal_has_asisten(id_ruangan,nama_ruangan) VALUES(?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $jadwalHasAsisten->getIdRuangan());
        $stmt->bindValue(2, $jadwalHasAsisten->getNamaRuangan());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        $link = null;
        return $result;
    }
}
