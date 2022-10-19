<?php
class Matkul
{
    private $kodeMk;
    private $nameMk;
    /**@var $prodi Prodi */
    private $prodi;

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
     * @param Prodi $prodi
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
            case 'prodi_id_prodi':
                $this->prodi->setIdProdi($value);
                break;
        }
    }
}