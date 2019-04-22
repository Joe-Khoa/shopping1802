<?php
require_once 'DBConnect.php';

class ProductModel extends DBConnect{
    function getProductDetail($url, $id){
        // $sql = "SELECT p.*
        //         FROM products p
        //         INNER JOIN page_url u
        //         ON p.id_url = u.id
        //         WHERE u.url = '$url'
        //         AND p.id = $id";
        // return $this->getOneRow($sql);

        $sql = "SELECT p.*
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE u.url = ?
                AND p.id = ?";
        return $this->getOneRow($sql,[$url,$id]);
    }
}



?>