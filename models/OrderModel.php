<?php
require_once 'DBConnect.php';
class OrderModel extends DBConnect {
    // order = bill
    function findOrderByToken($token){
        $sql = "SELECT * FROM bills
                WHERE token='$token'";
        return $this->getOneRow($sql);
    }

    function updateStatusBill($id){
        $sql = "UPDATE bills
                SET token=null,
                token_date=null,
                status = 1
                WHERE id=$id";
        return $this->executeQuery($sql);
    }
}


?>