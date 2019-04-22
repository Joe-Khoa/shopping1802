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
    function getRelatedProduct($idType,$idProduct){
        // $idProduct la san pham dang xem
        $sql = "SELECT p.*, u.url
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE p.id_type=$idType
                AND p.id <> $idProduct
                ORDER BY id DESC
                LIMIT 0,10";
        return $this->getMoreRow($sql);
    }
}



?>