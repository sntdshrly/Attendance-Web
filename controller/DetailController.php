<?php
class DetailController
{
    private $detailDao;

    public function __construct()
    {
        $this->detailDao = new DetailDaoImpl();
        $this->prodiDao = new ProdiDaoImpl();
    }

    public function index()
    {
        $detail = $this->detailDao->fetchAllDetail();
        $prodi = $this->prodiDao->fetchAllProdi();
        include_once 'view/home-view.php';
    }

    public function addDetail(){
        $buttonPressed = filter_input(INPUT_POST,'btnAddDetail');
        if(isset($buttonPressed)){
            var_dump("test");
            $pertemuanKe = filter_input(INPUT_POST,'pertemuan');
            $tanggal = filter_input(INPUT_POST,'tanggal');
            $waktuMulai = filter_input(INPUT_POST,'waktuMulai');
            $jumlahMahasiswa = filter_input(INPUT_POST,'jumlahMahasiswa');
            $materi = filter_input(INPUT_POST,'materi');
            $catatan = filter_input(INPUT_POST,'catatan');
            $dibantuAsisten = filter_input(INPUT_POST,'jumlahAsisten');
            $nrpAsisten = filter_input(INPUT_POST,'NRPAsisten');
            $jumlahJam = filter_input(INPUT_POST,'jumlahJam');
            $bukti = filter_input(INPUT_POST,'bukti');
            $jadwal = filter_input(INPUT_POST,'jadwal');

            $detail = new Detail;
            $detail->setPertemuanKe($pertemuanKe);
            $detail->setTanggal($tanggal);
            $detail->setWaktuMulai($waktuMulai);
            $detail->setJumlahMahasiswa($jumlahMahasiswa);
            $detail->setMateri($materi);
            $detail->setKeterangan($catatan);
            $detail->setDibantuAsisten($dibantuAsisten);
            $detail->setBukti($bukti);
            // $detail->getJadwal->set

            $result = $this->detailDao->saveDetail($detail);
        }
        $prodi = $this->detailDao->fetchProdi();
        $matkul = $this->detailDao->fetchMatkul();
        $jadwal = $this->detailDao->fetchJadwal();
        include_once 'view/form-view.php';
    }
    
}
