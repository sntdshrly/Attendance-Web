<?php

class DetailDaoImpl
{
    public function fetchAllDetail()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM detail';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Detail');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchDetailByNik($nik) {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM detail WHERE jadwal_dosen_nik = ?';
        $stmt = $link->prepare($query);
//        $stmt->setFetchMode(PDO::FETCH_OBJ);
//        $stmt->execute();
//        $link = null;
//        return $stmt->fetchAll();
        $stmt->bindParam(1, $nik);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Detail');
    }

    public function fetchProdi() {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT nama_prodi FROM prodi';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Prodi');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchMatkul() {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT nama_mk FROM matkul';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Matkul');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchJadwal() {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT kelas_jadwal FROM jadwal';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jadwal');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveDetail(Detail $detail)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO detail(pertemuan_ke, tanggal, waktu_mulai, jumlah_mahasiswa, materi, keterangan, dibantu_asisten, bukti, jadwal_kelas_jadwal, jadwal_semester_id_semester, jadwal_dosen_nik, jadwal_matkul_kode_mk, jadwal_tipe_jadwal) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $detail->getPertemuanKe());
        $stmt->bindValue(2, $detail->getTanggal());
        $stmt->bindValue(3, $detail->getWaktuMulai());
        $stmt->bindValue(4, $detail->getJumlahMahasiswa());
        $stmt->bindValue(5, $detail->getMateri());
        $stmt->bindValue(6, $detail->getKeterangan());
        $stmt->bindValue(7, $detail->getDibantuAsisten());
        $stmt->bindValue(8, $detail->getBukti());
        $stmt->bindValue(9, $detail->getJadwal()->getKelasJadwal());
        $stmt->bindValue(10, $detail->getJadwal()->getSemester()->getIdSemester());
        $stmt->bindValue(11, $detail->getJadwal()->getDosen()->getNik());
        $stmt->bindValue(12, $detail->getJadwal()->getMatkul()->getKodeMk());
        $stmt->bindValue(13, $detail->getJadwal()->getTipeJadwal());
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
