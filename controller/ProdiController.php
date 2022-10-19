<?php

class ProdiController
{
    private $prodiDao;

    public function __construct()
    {
        $this->prodiDao = new ProdiDaoImpl();
    }

    public function index() {
        // Code for delete data
        $deleteApproved = filter_input(INPUT_GET, 'delcom');
        if (isset($deleteApproved) && $deleteApproved == 1) {
            if ($_SESSION['web_role'] == "admin") {
                $deletedIdProdi = filter_input(INPUT_GET, 'did');
                $result = $this->prodiDao->deleteProdi($deletedIdProdi);
                if ($result) {
                    echo '<div class="bg-success">Supplier deleted</div>';
                } else {
                    echo '<div class="bg-error">Failed to delete supplier</div>';
                }
            } else {
                echo '<script type ="text/JavaScript">';
                echo 'alert("You don\'t have permission to delete the data")';
                echo '</script>';
            }
        }

        // Code for insert new data
        $buttonPressed = filter_input(INPUT_POST, 'btnSubmit');
        if (isset($buttonPressed)) {
            if ($_SESSION['web_role'] == "admin") {
                $id_prodi = filter_input(INPUT_POST, 'txtIdProdi', FILTER_SANITIZE_NUMBER_INT);
                $name_prodi = filter_input(INPUT_POST, 'txtNameProdi', FILTER_SANITIZE_STRING);
                $tingkatan_prodi = filter_input(INPUT_POST, 'txtTingkatanProdi', FILTER_SANITIZE_STRING);

                $trimmedIdProdi = trim($id_prodi);
                $trimmedNameProdi = trim($name_prodi);
                $trimmedTingkatanProdi = trim($tingkatan_prodi);

                if (empty($trimmedIdProdi) || empty($trimmedNameProdi) || empty($trimmedTingkatanProdi)) {
                    echo '<div class="bg-error">Please fill all the field</div>';
                } else {
                    $prodi = new Prodi();
                    $prodi->setIdProdi($trimmedIdProdi);
                    $prodi->setNameProdi($trimmedNameProdi);
                    $prodi->setTingkatanProdi($trimmedTingkatanProdi);
                    $result = $this->prodiDao->saveProdi($prodi);
                    if ($result) {
                        echo '<div class="bg-success">New added</div>';
                    } else {
                        echo '<div class="bg-error">Failed to add </div>';
                    }
                }

            } else {
                echo '<script type ="text/JavaScript">';
                echo 'alert("You don\'t have permission to insert new data")';
                echo '</script>';
            }
        }
        $prodis = $this->prodiDao->fetchAllProdi();
        include_once 'view/prodi-view.php';
    }
    public function updateIndex() {
        $editedIdProdi = filter_input(INPUT_GET, 'eid');
        if (isset($editedIdProdi) && $editedIdProdi != '') {
            $prodi = $this->prodiDao->fetchProdiById($editedIdProdi);
        }

        $buttonPressed = filter_input(INPUT_POST, 'btnSubmit');
        if (isset($buttonPressed)) {
            if ($_SESSION['web_role'] == "admin") {
                $name_prodi = filter_input(INPUT_POST, 'txtNameProdi', FILTER_SANITIZE_STRING);
                $tingkatan_prodi = filter_input(INPUT_POST, 'txtTingkatanProdi', FILTER_SANITIZE_STRING);
                $trimmedNameProdi = trim($name_prodi);
                $trimmedTingkatanProdi = trim($tingkatan_prodi);
                if (empty($trimmedNameProdi) || empty($trimmedTingkatanProdi)) {
                    echo '<div class="bg-error">Please fill the column</div>';
                } else {
                    $updatedProdi = new Prodi();
                    $updatedProdi->setIdProdi($prodi->getIdProdi());
                    $updatedProdi->setNameProdi($trimmedNameProdi);
                    $updatedProdi->setTingkatanProdi($trimmedTingkatanProdi);
                    $result = $this->prodiDao->updateProdi($updatedProdi);
                    if ($result) {
                        header('location:index.php?webmenu=supplier');
                    } else {
                        echo '<div class="bg-error">Failed to update supplier</div>';
                    }
                }
            } else {
                echo '<script type ="text/JavaScript">';
                echo 'alert("You don\'t have permission to edit the data")';
                echo '</script>';
            }
        }
        include_once 'view/update-prodi-view.php';
    }
}