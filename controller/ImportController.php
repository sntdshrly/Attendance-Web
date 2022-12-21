<?php

class ImportController
{
    private $dosenDao;

    public function __construct()
    {
        $this->dosenDao = new DosenDaoImpl();
        $this->semesterDao = new SemesterDaoImpl();
        $this->prodiDao = new ProdiDaoImpl();

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
    
}