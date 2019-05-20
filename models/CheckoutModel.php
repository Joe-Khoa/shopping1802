<?php
require 'DBConnect.php';

class CheckoutModel extends DBConnect{
    // insert customer
    function insertCustomer($name, $gender, $email, $phone, $address){
        $sql = "INSERT INTO customers
                (name, gender, email, address, phone)
                VALUES('$name','$gender','$email','$address','$phone')";
        $this->executeQuery($sql);
    }

    // insert bill
    function insertBill($idCustomer, $dateOrder, $total, $promtPrice, $paymentMethod, $note, $token, $tokenDate){
        $sql = "INSERT INTO bills(id_customer, date_order, total, promt_price, payment_method, note, token, token_date)
        VALUES ($idCustomer, '$dateOrder', $total, $promtPrice, '$paymentMethod', '$note', '$token', '$tokenDate')";
        $this->executeQuery($sql);
    }

    // insert bill detail
}


?>