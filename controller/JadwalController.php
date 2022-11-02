<?php

class JadwalController
{
    private $jadwalDao;

    public function __construct()
    {
        $this->jadwalDao = new JadwalDaoImpl();
    }
    public function index()
    {
        $jadwal = $this->jadwalDao->fetchAllJadwal();
        include_once 'view/jadwal-view.php';
    }
}