<?php

class Jadwal
{
    private $kelasJadwal;
    private $hariJadwal;
    private $waktuMulaiJadwal;
    /**@var $matkul Matkul */
    private $matkul;
    /**@var $dosen Dosen */
    private $dosen;
    /**@var $semester Semester */
    private $semester;
    /**@var $ruangan Ruangan */
    private $ruangan;
    private $tipeJadwal;

    /**
     * @return mixed
     */
    public function getKelasJadwal()
    {
        return $this->kelasJadwal;
    }

    /**
     * @param mixed $kelasJadwal
     */
    public function setKelasJadwal($kelasJadwal)
    {
        $this->kelasJadwal = $kelasJadwal;
    }

    /**
     * @return mixed
     */
    public function getHariJadwal()
    {
        return $this->hariJadwal;
    }

    /**
     * @param mixed $hariJadwal
     */
    public function setHariJadwal($hariJadwal)
    {
        $this->hariJadwal = $hariJadwal;
    }

    /**
     * @return mixed
     */
    public function getWaktuMulaiJadwal()
    {
        return $this->waktuMulaiJadwal;
    }

    /**
     * @param mixed $waktuMulaiJadwal
     */
    public function setWaktuMulaiJadwal($waktuMulaiJadwal)
    {
        $this->waktuMulaiJadwal = $waktuMulaiJadwal;
    }

    /**
     * @return Matkul
     */
    public function getMatkul()
    {
        if (!isset($this->matkul)) {
            $this->matkul = new Matkul();
        }
        return $this->matkul;
    }

    /**
     * @param Matkul $matkul
     */
    public function setMatkul($matkul)
    {
        $this->matkul = $matkul;
    }

    /**
     * @return Dosen
     */
    public function getDosen()
    {
        if (!isset($this->dosen)) {
            $this->dosen = new Dosen();
        }
        return $this->dosen;
    }

    /**
     * @param Dosen $dosen
     */
    public function setDosen($dosen)
    {
        $this->dosen = $dosen;
    }

    /**
     * @return Semester
     */
    public function getSemester()
    {
        if (!isset($this->semester)) {
            $this->semester = new Semester();
        }
        return $this->semester;
    }

    /**
     * @param Semester $semester
     */
    public function setSemester($semester)
    {
        $this->semester = $semester;
    }

    /**
     * @return Ruangan
     */
    public function getRuangan()
    {
        if (!isset($this->ruangan)) {
            $this->ruangan = new Ruangan();
        }
        return $this->ruangan;
    }

    /**
     * @param Ruangan $ruangan
     */
    public function setRuangan($ruangan)
    {
        $this->ruangan = $ruangan;
    }

    /**
     * @return mixed
     */
    public function getTipeJadwal()
    {
        return $this->tipeJadwal;
    }

    /**
     * @param mixed $tipeJadwal
     */
    public function setTipeJadwal($tipeJadwal)
    {
        $this->tipeJadwal = $tipeJadwal;
    }

    public function __set($name, $value)
    {
        if (!isset($this->matkul)) {
            $this->matkul = new Matkul();
        }
        if (!isset($this->dosen)) {
            $this->dosen = new Dosen();
        }
        if (!isset($this->semester)) {
            $this->semester = new Semester();
        }
        if (!isset($this->ruangan)) {
            $this->ruangan = new Ruangan();
        }
        switch ($name) {
            case 'kelas_jadwal':
                $this->kelasJadwal = $value;
                break;
            case 'hari_jadwal':
                $this->hariJadwal = $value;
                break;
            case 'waktu_mulai_jadwal':
                $this->waktuMulaiJadwal = $value;
                break;
            case 'tipe_jadwal':
                $this->tipeJadwal = $value;
                break;
            case 'matkul_kode_mk':
                $this->matkul->setKodeMk($value);
                break;
            case 'dosen_nik':
                $this->dosen->setNik($value);
                break;
            case 'semester_id_semester':
                $this->semester->setIdSemester($value);
                break;
            case 'ruangan_id_ruangan':
                $this->ruangan->setIdRuangan($value);
                break;
        }
    }
}