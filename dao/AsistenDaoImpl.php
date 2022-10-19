<?php

class OrderDaoImpl
{
    public function fetchAllAsisten(){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM asisten';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Order');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

}