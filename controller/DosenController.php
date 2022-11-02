<?php
class DosenController
{
    private $dosenDao;

    public function __construct()
    {
        $this->dosenDao = new DosenDaoImpl();
    }

    public function tampilDosen()
    {
        $dosen = $this->dosenDao->fetchAllDosen();
        include_once 'view/dosen-view.php';
    }

    public function index(){
        
        $dosenDao = new DosenDaoImpl();
        $loginPressed = filter_input(INPUT_POST,'btnLogin');
        if (isset($loginPressed)){
            $nik = filter_input(INPUT_POST, 'txtNIK');
            $password = filter_input(INPUT_POST, 'txtPassword');
//            print_r($password);
            $md5Password = md5($password);
            $result = $dosenDao->dosenLogin($nik, $md5Password);
            // print_r($result);
            if(isset($result) && $result != null && $result[0]['nik'] == $nik){
                $_SESSION['web_is_logged'] = true;
                $_SESSION['web_full_name'] = $result[0]['nama_dosen'];
                header('location:index.php');
            }
            else{
                echo'<div class="bg-error">Invalid nik or password</div>';
            }
        }
        include_once 'view/login-view.php';
    }

    public function addDosen(){
        $buttonPressed = filter_input(INPUT_POST,'btnAddDosen');
        if(isset($buttonPressed)){
            var_dump("test");
            $nikDosen = filter_input(INPUT_POST,'nikDosen');
            $namaDosen = filter_input(INPUT_POST,'namaDosen');
            $emailDosen = filter_input(INPUT_POST,'emailDosen');

            $trimmedNik = trim($nikDosen);
            $trimmedNama = trim($namaDosen);
            $trimmedEmail = trim($emailDosen);

            $dosen = new Dosen();
            $dosen->setNik($trimmedNik);
            $dosen->setNameDosen($trimmedNama);
            $dosen->setEmail($trimmedEmail);

            $result = $this->dosenDao->saveDosen($dosen);
        }
        $dosen = $this->dosenDao->fetchAllDosen();
        include_once 'view/dosen-form-view.php';
    }
}