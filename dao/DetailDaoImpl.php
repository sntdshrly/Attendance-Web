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

    public function saveDetail(Detail $detail)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO detail(pertemuan_ke,tanggal,waktu_mulai,jumlah_mahasiswa,materi,keterangan,dibantu_asisten,bukti,jadwal_kelas_jadwal) VALUES(?,?,?,?,?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $detail->getPertemuanKe());
        $stmt->bindValue(2, $detail->getTanggal());
        $stmt->bindValue(3, $detail->getWaktuMulai());
        $stmt->bindValue(4, $detail->getJumlahMahasiswa());
        $stmt->bindValue(5, $detail->getMateri());
        $stmt->bindValue(6, $detail->getKeterangan());
        $stmt->bindValue(7, $detail->getDibantuAsisten());
        $stmt->bindValue(8, $detail->getBukti());
        $stmt->bindValue(9, $detail->getJadwalKelasJadwal());
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
