<?php

class SemesterController
{
    private $semesterDao;

    public function __construct()
    {
        $this->semesterDao = new SemesterDaoImpl();
    }
    public function index()
    {
        $semester = $this->semesterDao->fetchAllSemester();
        include_once 'view/semester-view.php';
    }

     public function addSemester(){
         $buttonPressed = filter_input(INPUT_POST,'btnAddSemester');
         if(isset($buttonPressed)){
             var_dump("test");
             $idSemester = filter_input(INPUT_POST,'idSemester');
             $namaTahunSemester = filter_input(INPUT_POST,'namaTahunSemester');

             $trimmedId = trim($idSemester);
             $trimmedNama = trim($namaTahunSemester);

             $semester = new Semester();
             $semester->setIdSemester($trimmedId);
             $semester->setNamaTahunSemester($trimmedNama);

             $result = $this->semesterDao->saveSemester($semester);
         }
         include_once 'view/semester-form-view.php';
     }
}