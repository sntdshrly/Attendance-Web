<?php
class Dosen
{
    private $nik;
    private $namaDosen;
    private $email;
    private $password;

    /**
     * @return mixed
     */
    public function getNik()
    {
        return $this->nik;
    }

    /**
     * @param mixed 
     */
    public function setNik($nik)
    {
        $this->nik = $nik;
    }

    /**
     * @return mixed
     */
    public function getNamaDosen()
    {
        return $this->namaDosen;
    }

    /**
     * @param mixed $name
     */
    public function setNameDosen($namaDosen)
    {
        $this->namaDosen = $namaDosen;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed 
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed 
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function __set($name, $value)
    {
        switch ($name) {
            case 'nama_dosen':
                $this->namaDosen = $value;
                break;
        }
    }
}