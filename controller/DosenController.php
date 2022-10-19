<?php
class DosenController
{
    public function index(){
        $dosenDao = new DosenDaoImpl();
        $loginPressed = filter_input(INPUT_POST,'btnLogin');
        if (isset($loginPressed)){
            $nik = filter_input(INPUT_POST, 'txtNIK');
            $password = filter_input(INPUT_POST, 'txtPassword');
//            print_r($password);
            $md5Password = md5($password);
            $result = $dosenDao->dosenLogin($nik, $md5Password);
            print_r($result);
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
}