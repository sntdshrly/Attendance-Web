<?php

class MatkulDaoImpl
{
    public function fetchAllMatkul()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM matkul';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'matkul');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveMatkul(Matkul $matkul)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO matkul(kode_mk,nama_mk,prodi_id_prodi) VALUES(?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $matkul->getKodeMk());
        $stmt->bindValue(2, $matkul->getNamaMk());
        $stmt->bindValue(3, $matkul->getProdiIdProdi());
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
