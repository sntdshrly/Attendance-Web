<?php

class Prodi
{
    private $idProdi;
    private $nameProdi;
    private $tingkatanProdi;

    // get and set Id
    /**
     * @return mixed
     */
    public function getIdProdi()
    {
        return $this->idProdi;
    }
    /**
     * @param mixed $id
     */
    public function setIdProdi($idProdi)
    {
        $this->idProdi = $idProdi;
    }

    // get and set name
    /**
     * @return mixed
     */
    public function getNameProdi()
    {
        return $this->nameProdi;
    }
    /**
     * @param mixed $name_prodi
     */
    public function setNameProdi($nameProdi)
    {
        $this->nameProdi = $nameProdi;
    }

    // get and set tingkatan 
    /**
     * @return mixed
     */
    public function getTigkatanProdi()
    {
        return $this->tingkatanProdi;
    }
    /**
     * @param mixed $tingkatan_prodi
     */
    public function setTingkatanProdi($tingkatanProdi)
    {
        $this->tingkatanProdi = $tingkatanProdi;
    }
}