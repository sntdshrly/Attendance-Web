<?php

class JadwalHasAsistenController
{
    private $detailDao;
    private $jadwalHasAsistenDao;

    public function __construct()
    {
        $this->detailDao = new DetailDaoImpl();
        $this->jadwalHasAsistenDao = new JadwalHasAsistenDaoImpl();
    }

    public function index()
    {
        $buttonPressed = filter_input(INPUT_POST, 'btnFilter');
        if (isset($buttonPressed)) {
            $tanggalFrom = filter_input(INPUT_POST, 'from');
            $tanggalTo = filter_input(INPUT_POST, 'to');
            $asistenNrp = substr(filter_input(INPUT_POST, 'asisten'), 0, 7);
        }
        $asisten = $this->detailDao->fetchAsisten();
        $jadwalHasAsisten = $this->jadwalHasAsistenDao->fetchJadwalHasAsistenByDate($tanggalFrom, $tanggalTo, $asistenNrp);
        include_once 'view/jadwal-has-asisten-view.php';
    }
}