<?php
require_once 'DBConnect.php';
class ShoppingCartModel extends DBConnect{
    function findProductById($id){
        $sql = "SELECT id, name, image, price, promotion_price
                FROM products
                WHERE id=$id
                AND deleted=0";
        return $this->getOneRow($sql);
    }
}

?>