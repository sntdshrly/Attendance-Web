<?php

class SemesterDaoImpl
{
    public function fetchAllSemester()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM semester';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Semester');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveSemester(Semester $semester)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO semester(id_semester, nama_tahun_semester) VALUES(?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $semester->getIdsemester());
        $stmt->bindValue(2, $semester->getNamaTahunsemester());
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
