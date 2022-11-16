<?php

class JadwalHasAsistenController
{
    private $jadwalHasAsistenDao;

    public function __construct()
    {
        $this->jadwalHasAsistenDao = new JadwalHasAsistenDaoImpl();
    }

    public function index()
    {
        $jadwalHasAsisten = $this->jadwalHasAsistenDao->fetchAllJadwalHasAsisten();
        include_once 'view/jadwal-has-asisten-view.php';
    }
}