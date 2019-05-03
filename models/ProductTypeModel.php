<?php
require 'DBConnect.php';

class ProductTypeModel extends DBConnect{

    // ALTER TABLE `categories` ADD `status` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '1_show, 0_hide' AFTER `icon`;
    function getAllCategories(){
        $sql = "SELECT c.name, c.icon, u.url
                FROM categories c
                INNER JOIN page_url u
                ON c.id_url = u.id
                WHERE c.status=1";// 1: show
        return $this->getMoreRow($sql);
    }
    function getCategoriesWithProductCount(){
        // count product by type
        // LEFT JOIN if select soluong=0
        $sql = "SELECT c.id, c.name, 
                    count(p.id) as soluong
                FROM categories c
                INNER JOIN products p 
                ON c.id = p.id_type
                GROUP BY c.id";
        return $this->getMoreRow($sql);
    }
    function getProductTypeByUrl($url){
        $sql = "SELECT c.*
                FROM categories c
                INNER JOIN page_url u
                ON c.id_url = u.id
                WHERE u.url = '$url'
                AND c.status = 1";
        return $this->getOneRow($sql);
    }
    function getProductByType($idType, $position=0, $quantity=0){
        $sql = "SELECT p.*, u.url
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE p.id_type = $idType
                AND p.deleted = 0
                LIMIT $position,$quantity";
        return $this->getMoreRow($sql);
        // page = 1 => 0,10
        // page = 2 => 10,10
        // page = 3 => 20,10
        // page = n => (page-1)*10
    }
    function countProductByType($idType){
        $sql = "SELECT count(p.id) as tongSP
                FROM products p
                WHERE id_type=$idType
                AND deleted=0";
        return $this->getOneRow($sql);
    }
}

?>