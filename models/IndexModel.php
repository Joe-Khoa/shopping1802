<?php
require_once 'DBConnect.php';

class IndexModel extends DBConnect{

    function getSlide($status=1){
        $sql = "SELECT * FROM slide WHERE status=$status";
        return parent::getMoreRow($sql);
    }
    function getSpecialProducts(){
        $sql = "SELECT p.*, pu.url 
                FROM products p
                INNER JOIN page_url pu
                ON p.id_url = pu.id
                WHERE status = 1
                ORDER BY id DESC";
        return $this->getMoreRow($sql);
    }
}


?>