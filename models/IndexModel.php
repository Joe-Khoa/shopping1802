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
                AND p.deleted = 0
                ORDER BY id DESC";
        return $this->getMoreRow($sql);
    }
    function getBestSellerProducts(){
        $sql = "SELECT p.*, sum(d.quantity) as tongSL
                FROM products p
                INNER JOIN bill_detail d
                ON p.id = d.id_product
                INNER JOIN page_url pu
                ON pu.id = p.id_url
                WHERE p.deleted = 0
                GROUP BY d.id_product
                ORDER BY tongSL DESC
                LIMIT 0,10";
        return $this->getMoreRow($sql);
    }
}


?>