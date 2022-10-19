<?php

class Prodi
{
    private $id_prodi;
    private $name_prodi;
    private $tingkatan_prodi;

    // get and set Id
    /**
     * @return mixed
     */
    public function getIdProdi()
    {
        return $this->id_prodi;
    }
    /**
     * @param mixed $id
     */
    public function setIdProdi($id_prodi)
    {
        $this->id_prodi = $id_prodi;
    }

    // get and set name
    /**
     * @return mixed
     */
    public function getNameProdi()
    {
        return $this->name_prodi;
    }
    /**
     * @param mixed $name_prodi
     */
    public function setNameProdi($name_prodi)
    {
        $this->name_prodi = $name_prodi;
    }

    // get and set tingkatan 
    /**
     * @return mixed
     */
    public function getTigkatanProdi()
    {
        return $this->tingkatan_prodi;
    }
    /**
     * @param mixed $tingkatan_prodi
     */
    public function setTingkatanProdi($tingkatan_prodi)
    {
        $this->tingkatan_prodi = $tingkatan_prodi;
    }
}