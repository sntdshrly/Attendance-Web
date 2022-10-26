<?php
class DetailController
{
    private $detailDao;

    public function __construct()
    {
        $this->detailDao = new DetailDaoImpl();
    }

    public function index()
    {
        $detail = $this->detailDao->fetchAllDetail();
        include_once 'view/home-view.php';
    }
    public function addDetail(){
        include_once 'view/form-view.php';
    }
}
