<?php

class Asisten
{
    private $nrp;
    private $namaMahasiswa;

    public function __construct($nrp, $namaMahasiswa)
    {
        $this->nrp = $nrp;
        $this->namaMahasiswa = $namaMahasiswa;
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