<?php
require_once 'DBConnect.php';
class OrderModel extends DBConnect{
    // order = bill
    function findOrderByToken($token){
        $sql = "SELECT * FROM bills
                WHERE token='$token'";
        return $this->getOneRow($sql);
    }
}


?>