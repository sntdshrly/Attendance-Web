<?php
include_once 'DosenController.php';

class DetailController
{
    private $detailDao;
    private $jadwalHasAsistenDao;

    public function __construct()
    {
        $this->detailDao = new DetailDaoImpl();
        $this->prodiDao = new ProdiDaoImpl();
        $this->jadwalHasAsistenDao = new JadwalHasAsistenDaoImpl();
    }

    public function index()
    {
        $dosenLogin = $_SESSION['web_nik'];
        if ($dosenLogin != '') {
            $detail = $this->detailDao->fetchAllDetail();
        }
        $prodi = $this->prodiDao->fetchAllProdi();
        include_once 'view/home-view.php';
    }

    public function addDetail()
    {
        $buttonPressed = filter_input(INPUT_POST, 'btnAddDetail');
        if (isset($buttonPressed)) {
            $pertemuanKe = filter_input(INPUT_POST, 'pertemuan');
            $tanggal = filter_input(INPUT_POST, 'tanggal');
            $waktuMulai = filter_input(INPUT_POST, 'waktuMulai');
            $jumlahMahasiswa = filter_input(INPUT_POST, 'jumlahMahasiswa');
            $materi = filter_input(INPUT_POST, 'materi');
            $catatan = filter_input(INPUT_POST, 'catatan');
            $dibantuAsisten = filter_input(INPUT_POST, 'jumlahAsisten');
            $nrpAsisten = filter_input(INPUT_POST, 'NRPAsisten');
            $jumlahJam = filter_input(INPUT_POST, 'jumlahJam');
            $jadwal = filter_input(INPUT_POST, 'jadwal');
            $asisten1opsi = filter_input(INPUT_POST, 'asisten1opsi');
            $asisten2opsi = filter_input(INPUT_POST, 'asisten2opsi');
            $asisten3opsi = filter_input(INPUT_POST, 'asisten3opsi');

            $detail = new Detail;
            $detail->setPertemuanKe($pertemuanKe);
            $detail->setTanggal($tanggal);
            $detail->setWaktuMulai($waktuMulai);
            $detail->setJumlahMahasiswa($jumlahMahasiswa);
            $detail->setMateri($materi);
            $detail->setKeterangan($catatan);
            $detail->setDibantuAsisten($dibantuAsisten);
            $str_arr = explode (" | ", $jadwal);
            $detail->getJadwal()->setKelasJadwal($str_arr[0]);
            $detail->getJadwal()->getSemester()->setIdSemester(substr($str_arr[1], 0, 1));
            $detail->getJadwal()->getDosen()->setNik(substr($str_arr[2], 0, 5));
            $detail->getJadwal()->getMatkul()->setKodeMk(substr($str_arr[3], 0, 5));
            $detail->getJadwal()->setTipeJadwal($str_arr[4]);

            if (isset($_FILES['bukti']['name']) && $_FILES['bukti']['name'] != null) {
                $directory = 'uploads/';
                $fileExtension = pathinfo($_FILES['bukti']['name'], PATHINFO_EXTENSION);
                $newFileName = $pertemuanKe . '-' . $tanggal . '-' . $jadwal . '.' . $fileExtension;
                $uploadTarget = $directory . $newFileName;
                if ($_FILES['bukti']['size'] > (1024 * 2048)) {
                    echo '<div class="bg-error">File size exceed 2 MB. Upload failed.</div>';
                    $result = $this->detailDao->saveDetail($detail);

                } else {
                    move_uploaded_file($_FILES['bukti']['tmp_name'], $uploadTarget);
                    $detail->setBukti($newFileName);
                $result = $this->detailDao->saveDetail($detail);

                }
            } else {
                $result = $this->detailDao->saveDetail($detail);
            }
            if ($result) {
                echo '<div class="bg-info">New detail added</div>';
            } else {
                echo '<div class="bg-error">New detail has not been added</div>';
            }

            $asisten1 = filter_input(INPUT_POST, 'asisten1');
            if($asisten1=="Asisten1"){
                $jadwalHasAsisten = new JadwalHasAsisten;
                $jadwalHasAsisten->getJadwal()->setKelasJadwal(substr($jadwal, 0, 1));
                $jadwalHasAsisten->getJadwal()->getSemester()->setIdSemester(substr($jadwal, 4, 1));
                $jadwalHasAsisten->getJadwal()->getDosen()->setNik(substr($jadwal, 8, 5));
                $jadwalHasAsisten->getJadwal()->getMatkul()->setKodeMk(substr($jadwal, 16, 5));
                $jadwalHasAsisten->getJadwal()->setTipeJadwal(substr($jadwal, 24));
                $jadwalHasAsisten->getAsisten()->setNrp(substr($asisten1opsi, 0, 7));
                $jadwalHasAsisten->setPertemuan("");
                $jadwalHasAsisten->setTanggal("");
                $result2 = $this->jadwalHasAsistenDao->saveJadwalHasAsisten($jadwalHasAsisten);
            }

            $asisten2 = filter_input(INPUT_POST, 'asisten2');
            if($asisten2=="Asisten2"){
                $jadwalHasAsisten = new JadwalHasAsisten;
                $jadwalHasAsisten->getJadwal()->setKelasJadwal(substr($jadwal, 0, 1));
                $jadwalHasAsisten->getJadwal()->getSemester()->setIdSemester(substr($jadwal, 4, 1));
                $jadwalHasAsisten->getJadwal()->getDosen()->setNik(substr($jadwal, 8, 5));
                $jadwalHasAsisten->getJadwal()->getMatkul()->setKodeMk(substr($jadwal, 16, 5));
                $jadwalHasAsisten->getJadwal()->setTipeJadwal(substr($jadwal, 24));
                $jadwalHasAsisten->getAsisten()->setNrp(substr($asisten2opsi, 0,7));
                $jadwalHasAsisten->setPertemuan("");
                $jadwalHasAsisten->setTanggal("");
                $result3 = $this->jadwalHasAsistenDao->saveJadwalHasAsisten($jadwalHasAsisten);
            }

            $asisten3 = filter_input(INPUT_POST, 'asisten3');
            if($asisten3=="Asisten3"){
                $jadwalHasAsisten = new JadwalHasAsisten;
                $jadwalHasAsisten->getJadwal()->setKelasJadwal(substr($jadwal, 0, 1));
                $jadwalHasAsisten->getJadwal()->getSemester()->setIdSemester(substr($jadwal, 4, 1));
                $jadwalHasAsisten->getJadwal()->getDosen()->setNik(substr($jadwal, 8, 5));
                $jadwalHasAsisten->getJadwal()->getMatkul()->setKodeMk(substr($jadwal, 16, 5));
                $jadwalHasAsisten->getJadwal()->setTipeJadwal(substr($jadwal, 24));
                $jadwalHasAsisten->getAsisten()->setNrp(substr($asisten3opsi, 0,7));
                $jadwalHasAsisten->setPertemuan("");
                $jadwalHasAsisten->setTanggal("");
                $result4 = $this->jadwalHasAsistenDao->saveJadwalHasAsisten($jadwalHasAsisten);
            }
        }
        $prodi = $this->detailDao->fetchProdi();
        $matkul = $this->detailDao->fetchMatkul();
        $jadwal = $this->detailDao->fetchJadwal();
        $asisten = $this->detailDao->fetchAsisten();
        $jadwalHasAsisten = $this->jadwalHasAsistenDao->fetchAllJadwalHasAsisten();

        $roKelas = substr(filter_input(INPUT_POST, 'jadwal'), 0, 1);
//        $roKelas = "test";
        include_once 'view/form-view.php';
    }
}
