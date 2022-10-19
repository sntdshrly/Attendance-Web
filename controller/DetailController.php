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
        var_dump($detail);
        include_once 'view/home-view.php';

    }
}
