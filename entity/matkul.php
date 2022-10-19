<?php
class Matkul
{
    private $kodeMk;
    private $nameMk;
    private $idProdi;

    /**
     * @return mixed
     */
    public function getKodeMk()
    {
        return $this->kodeMk;
    }

    /**
     * @param mixed 
     */
    public function setKodeMk($kodeMk)
    {
        $this->kodeMk = $kodeMk;
    }

    /**
     * @return mixed
     */
    public function getNameMk()
    {
        return $this->nameMk;
    }

    /**
     * @param mixed $name
     */
    public function setNameMk($nameMk)
    {
        $this->nameMk = $nameMk;
    }

    /**
     * @return Prodi
     */
    public function getProdi()
    {
        if (!isset($this->prodi)) {
            $this->prodi = new Prodi();
        }
        return $this->prodi;
    }

    /**
     * @param Prodi 
     */
    public function setProdi($prodi)
    {
        $this->prodi = $prodi;
    }

    public function __set($name, $value)
    {
        if(!isset($this->prodi)) {
            $this->prodi = new Prodi();
        }
        switch ($name) {
            case 'id_Prodi':
                $this->idProdi = $value;
                break;
        }
    }
}