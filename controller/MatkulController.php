<?php
ob_start();
class MatkulController
{
    private $matkulDao;
    private $prodiDao;

    public function __construct()
    {
        $this->matkulDao = new MatkulDaoImpl();
        $this->prodiDao = new ProdiDaoImpl();
    }

    public function index()
    {
        /* fungsi delete */
        $deleteApproved = filter_input(INPUT_GET, 'delcomMatkul');
        if (isset($deleteApproved) && $deleteApproved == 1) {
            $deletedId = filter_input(INPUT_GET, 'didMatkul');
            $result = $this->matkulDao->deleteMatkul($deletedId);
        }
        $matkul = $this->matkulDao->fetchAllMatkul();
        include_once 'view/matkul-view.php';
    }

    public function addMatkul()
    {
        $buttonPressed = filter_input(INPUT_POST, 'btnAddMatkul');
        if (isset($buttonPressed)) {
            $kodeMatkul= filter_input(INPUT_POST, 'idProdi');
            $namaMatkul= filter_input(INPUT_POST, 'namaProdi');
            $prodi= filter_input(INPUT_POST, 'prodi');
            $jumlahSks = filter_input(INPUT_POST, 'jumlahSks');

            $trimmedKode = trim($kodeMatkul);
            $trimmedNama = trim($namaMatkul);
            $trimmedProdi = trim($prodi);
            $trimmedJmlhSks= trim($jumlahSks);

            $matkul = new Matkul();
            $matkul->setKodeMk($trimmedKode);
            $matkul->setNamaMk($trimmedNama);
            $matkul->setProdi()->setNamaProdi($trimmedProdi);
            $matkul->setJumlahSks($trimmedJmlhSks);

            $result = $this->matkulDao->saveMatkul($matkul);
        }
        $matkul = $this->matkulDao->fetchAllMatkul();
        include_once 'view/matkul-form-view.php';
    }
}