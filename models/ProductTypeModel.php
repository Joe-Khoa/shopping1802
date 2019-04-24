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
}

?>