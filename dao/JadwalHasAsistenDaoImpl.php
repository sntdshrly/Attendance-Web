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
        $query = 'INSERT INTO jadwal_has_asisten(jadwal_kelas_jadwal, jadwal_semester_id_semester, jadwal_dosen_nik, jadwal_matkul_kode_mk, jadwal_tipe_jadwal, asisten_nrp, pertemuan, tanggal) VALUES(?,?,?,?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $jadwalHasAsisten->getJadwal()->getKelasJadwal());
        $stmt->bindValue(2, $jadwalHasAsisten->getJadwal()->getSemester()->getIdSemester());
        $stmt->bindValue(3, $jadwalHasAsisten->getJadwal()->getDosen()->getNik());
        $stmt->bindValue(4, $jadwalHasAsisten->getJadwal()->getMatkul()->getKodeMk());
        $stmt->bindValue(5, $jadwalHasAsisten->getJadwal()->getTipeJadwal());
        $stmt->bindValue(6, $jadwalHasAsisten->getAsisten()->getNrp());
        $stmt->bindValue(7, $jadwalHasAsisten->getPertemuan());
        $stmt->bindValue(8, $jadwalHasAsisten->getTanggal());
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
