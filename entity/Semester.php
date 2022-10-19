<?php

class Semester
{
    private $idSemester;
    private $namaSemester;
    private $tahunSemester;

    /**
     * @return mixed
     */
    public function getIdSemester()
    {
        return $this->idSemester;
    }

    /**
     * @param mixed $idSemester
     */
    public function setIdSemester($idSemester)
    {
        $this->idSemester = $idSemester;
    }

    /**
     * @return mixed
     */
    public function getNamaSemester()
    {
        return $this->namaSemester;
    }

    /**
     * @param mixed $namaSemester
     */
    public function setNamaSemester($namaSemester)
    {
        $this->namaSemester = $namaSemester;
    }

    /**
     * @return mixed
     */
    public function getTahunSemester()
    {
        return $this->tahunSemester;
    }

    /**
     * @param mixed $tahunSemester
     */
    public function setTahunSemester($tahunSemester)
    {
        $this->tahunSemester = $tahunSemester;
    }

    public function __set($name, $value)
    {
        switch ($name) {
            case 'id_semester':
                $this->idSemester = $value;
                break;
            case 'nama_semester':
                $this->namaSemester = $value;
                break;
            case 'tahun_semester':
                $this->tahunSemester = $value;
                break;
        }
    }
}