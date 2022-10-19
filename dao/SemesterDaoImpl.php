<?php

class semesterDaoImpl
{
    public function fetchAllsemester()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM semester';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'semester');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function savesemester(Semester $semester)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO semester(id_semester,nama_semester,tahun_semester) VALUES(?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $semester->getIdsemester());
        $stmt->bindValue(2, $semester->getNamasemester());
        $stmt->bindValue(3, $semester->getTahunSemester());
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
