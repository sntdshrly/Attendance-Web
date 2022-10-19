<?php

class JadwalHasAsisten
{
    /**@var $jadwal Jadwal */
    private $jadwal;
    /**@var $asisten Asisten */
    private $asisten;

    /**
     * @return Jadwal
     */
    public function getJadwal()
    {
        if (!isset($this->jadwal)) {
            $this->jadwal = new Jadwal();
        }
        return $this->jadwal;
    }

    /**
     * @param Jadwal $jadwal
     */
    public function setJadwal($jadwal)
    {
        $this->jadwal = $jadwal;
    }

    /**
     * @return Asisten
     */
    public function getAsisten()
    {
        if (!isset($this->asisten)) {
            $this->asisten = new Asisten();
        }
        return $this->asisten;
    }

    /**
     * @param Asisten
     */
    public function setAsisten($asisten)
    {
        $this->asisten = $asisten;
    }

    public function __set($name, $value)
    {
        if (!isset($this->jadwal)) {
            $this->jadwal = new Jadwal();
        }
        if(!isset($this->asisten)) {
            $this->asisten = new Asisten();
        }
        switch ($name) {
            case 'jadwal_kelas_jadwal':
                $this->jadwal->setKelasJadwal($value);
                break;
            case 'asisten_nrp':
                $this->asisten->setNrp($value);
                break;
        }
    }
}