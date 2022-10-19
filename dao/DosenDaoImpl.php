<?php

class DosenDaoImpl
{
    public function fetchAllDosen()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM dosen';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Dosen');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveDosen(Dosen $dosen)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO dosen(nik,nama_dosen,email,password) VALUES(?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $dosen->getNik());
        $stmt->bindValue(2, $dosen->getNamaDosen());
        $stmt->bindValue(3, $dosen->getEmail());
        $stmt->bindValue(4, $dosen->getPassword());
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
