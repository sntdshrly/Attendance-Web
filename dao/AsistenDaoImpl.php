<?php

class AsistenDaoImpl
{
    public function fetchAllAsisten()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM asisten';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Asisten');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveAsisten(Asisten $asisten)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO asisten(nrp, nama_mahasiswa) VALUES(?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $asisten->getNrp());
        $stmt->bindValue(2, $asisten->getNamaMahasiswa());
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
