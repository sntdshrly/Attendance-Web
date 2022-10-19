<?php
class AsistenController
{
    private $asistenDao;
    public function __construct()
{
    $this->asistenDao = new AsistenDaoImpl();
}
    public function addAsisten()
    {
        $buttonPressed = filter_input(INPUT_POST, 'btnSubmit');
        if (isset($buttonPressed)) {
            $namaMahasiswa = filter_input(INPUT_POST, 'txtNamaMahasiswa', FILTER_SANITIZE_STRING);
            $nrp = filter_input(INPUT_POST, 'txtNrp', FILTER_SANITIZE_STRING);
            $trimmedName = trim($namaMahasiswa);
            $trimmedAddress = trim($nrp);

            if (empty($trimmedName) or empty($trimmedAddress)) {
                echo '<div class="bg-error">Please fill in the blank!</div>';
            } else {
                $supplier = new Asisten();
                $supplier->setNamaMahasiswa($trimmedName);
                $supplier->setNrp($trimmedAddress);
                $result = $this->supplierDao->saveSupplier($supplier);
                if ($result) {
                    echo '<div class="bg-success">New asisten added</div>';
                } else {
                    echo '<div class="bg-error">Failed to added asisten Data</div>';
                }
            }
        }
        $asisten = $this->asistenDao->fetchAllAsisten();
        include_once 'view/add-asisten-view.php';
    }
}