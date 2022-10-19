<?php

class JadwalDaoImpl
{
    public function fetchAllJadwal()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM jadwal';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'jadwal');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveJadwal(Jadwal $jadwal)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO jadwal(id_ruangan,nama_ruangan) VALUES(?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $jadwal->getId());
        $stmt->bindValue(2, $jadwal->getNamaRuangan());
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
