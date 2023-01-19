<?php

class ImportController
{
    private $dosenDao;

    public function __construct()
    {
        $this->dosenDao = new DosenDaoImpl();
        $this->semesterDao = new SemesterDaoImpl();
        $this->prodiDao = new ProdiDaoImpl();
        $this->matkulDao = new MatkulDaoImpl();
        $this->mahasiswaDao = new MahasiswaDaoImpl();
    }

    public function index(){
        $dosen  = $this->dosenDao->fetchAllDosen();
        include_once 'view/dosen-view.php';
    }

    public function indexSemester(){
        $semester  = $this->semesterDao->fetchAllSemester();
        include_once 'view/semester-view.php';
    }

    public function indexProdi(){
        $prodi  = $this->prodiDao->fetchAllProdi();
        include_once 'view/prodi-view.php';
    }

    public function indexMatkul(){
        $prodi  = $this->matkulDao->fetchAllMatkul();
        include_once 'view/matkul-view.php';
    }

    public function indexMahasiswa(){
        $prodi  = $this->mahasiswaDao->fetchAllMahasiswa();
        include_once 'view/mahasiswa-view.php';
    }
}