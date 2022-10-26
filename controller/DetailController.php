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
        var_dump($prodi);
        include_once 'view/home-view.php';
    }
    public function addDetail(){
        $buttonPressed = filter_input(INPUT_POST,'btnAddDetail');
        if(isset($buttonPressed)){
            $programStudi = filter_input(INPUT_POST,'programStudi');
            $matkul = filter_input(INPUT_POST,'mataKuliah');
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

            $detail = new Detail;
            $detail->setPertemuanKe($pertemuanKe);
            $detail->setTanggal($tanggal);
            $detail->setWaktuMulai($waktuMulai);
            $detail->setJumlahMahasiswa($jumlahMahasiswa);
            $detail->setMateri($materi);
            $detail->setKeterangan($catatan);
            $detail->setDibantuAsisten($dibantuAsisten);
            $detail->setBukti($bukti);
            
            $result = $this->detailDao->saveDetail($detail);
        }
        include_once 'view/form-view.php';
    }
    
}
