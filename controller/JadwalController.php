<?php

class JadwalController
{
    private $jadwalDao;
    private $detailDao;

    public function __construct()
    {
        $this->jadwalDao = new JadwalDaoImpl();
        $this->detailDao = new DetailDaoImpl();
    }
    public function index()
    {
        $jadwal = $this->jadwalDao->fetchAllJadwal();
        include_once 'view/jadwal-view.php';
    }

    public function addJadwal(){
        $buttonPressed = filter_input(INPUT_POST,'btnAddJadwal');
        if(isset($buttonPressed)) {
            $kelas = filter_input(INPUT_POST,'kelas');
            $hari = filter_input(INPUT_POST,'hari');
            $waktuMulai = filter_input(INPUT_POST,'waktuMulai');
            $matkul = filter_input(INPUT_POST,'matkul');
            $dosen = filter_input(INPUT_POST,'dosen');
            $semester = filter_input(INPUT_POST,'semester');
            $ruangan = filter_input(INPUT_POST,'ruangan');
            $tipe = filter_input(INPUT_POST,'tipe');

            $trimmedKelas = trim($kelas);
            $trimmedHari = trim($hari);
            $trimmedWaktuMulai = trim($waktuMulai);
            $trimmedMatkul = trim(substr($matkul, 0, 5));
            $trimmedDosen = trim(substr($dosen, 0, 5));
            $trimmedSemester = trim(substr($semester, 0, 1));
            $trimmedRuangan = trim(substr($ruangan, 0, 1));
            $trimmedTipe = trim($tipe);

            $jadwal = new Jadwal;
            $jadwal->setKelasJadwal($trimmedKelas);
            $jadwal->setHariJadwal($trimmedHari);
            $jadwal->setWaktuMulaiJadwal($trimmedWaktuMulai);
            $jadwal->getMatkul()->setKodeMk($trimmedMatkul);
            $jadwal->getDosen()->setNik($trimmedDosen);
            $jadwal->getSemester()->setIdSemester($trimmedSemester);
            $jadwal->getRuangan()->setIdRuangan($trimmedRuangan);
            $jadwal->setTipeJadwal($trimmedTipe);

            $result = $this->jadwalDao->saveJadwal($jadwal);
        }
        $matkul = $this->detailDao->fetchMatkul();
        $dosen = $this->detailDao->fetchDosen();
        $semester = $this->detailDao->fetchSemester();
        $ruangan = $this->detailDao->fetchRuangan();
        $jadwal = $this->jadwalDao->fetchAllJadwal();
        $asisten = $this->detailDao->fetchAsisten();
        include_once 'view/jadwal-form-view.php';
    }
}