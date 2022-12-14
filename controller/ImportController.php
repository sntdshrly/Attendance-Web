<?php

class ImportController
{
    private $dosenDao;

    public function __construct()
    {
        $this->dosenDao = new DosenDaoImpl();
    }

    public function index(){
        $dosen  = $this->dosenDao->fetchAllDosen();
        include_once 'view/dosen-view.php';
    }
}