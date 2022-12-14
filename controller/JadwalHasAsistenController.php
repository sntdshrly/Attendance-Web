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
        $buttonPressed = filter_input(INPUT_POST, 'btnFilter');
        if (isset($buttonPressed)) {
            $tanggalFrom = filter_input(INPUT_POST, 'from');
            $tanggalTo = filter_input(INPUT_POST, 'to');
        }
        $jadwalHasAsisten = $this->jadwalHasAsistenDao->fetchJadwalHasAsistenByDate($tanggalFrom, $tanggalTo);
        include_once 'view/jadwal-has-asisten-view.php';
    }
}