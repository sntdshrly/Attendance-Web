<?php

class JadwalDaoImpl
{
    public function fetchAllJadwal()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM jadwal';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jadwal');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveJadwal(Jadwal $jadwal)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO jadwal(kelas_jadwal, hari_jadwal, waktu_mulai_jadwal, matkul_kode_mk, dosen_nik, semester_id_semester, ruangan_id_ruangan, tipe_jadwal) VALUES(?,?,?,?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $jadwal->getKelasJadwal());
        $stmt->bindValue(2, $jadwal->getHariJadwal());
        $stmt->bindValue(3, $jadwal->getWaktuMulaiJadwal());
        $stmt->bindValue(4, $jadwal->getMatkul()->getKodeMk());
        $stmt->bindValue(5, $jadwal->getDosen()->getNik());
        $stmt->bindValue(6, $jadwal->getSemester()->getIdSemester());
        $stmt->bindValue(7, $jadwal->getRuangan()->getIdRuangan());
        $stmt->bindValue(8, $jadwal->getTipeJadwal());
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
