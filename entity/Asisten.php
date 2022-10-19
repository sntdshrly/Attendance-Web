<?php

class Asisten
{
    private $asistenDao;
    public function __construct()
    {
        $this->asistenDao = new AsistenDaoImpl();
    }
    public function getNrp()
    {
        return $this->nrp;
    }
    public function setNrp($nrp)
    {
        $this->nrp = $nrp;
    }
    public function getNamaMahasiswa()
    {
        return $this->namaMahasiswa;
    }
    public function setNamaMahasiswa($namaMahasiswa)
    {
        $this->namaMahasiswa = $namaMahasiswa;
    }

}