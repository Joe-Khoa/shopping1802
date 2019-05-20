<?php
require 'DBConnect.php';

class CheckoutModel extends DBConnect{
    // insert customer
    function insertCustomer($name, $gender, $email, $phone, $address){
        $sql = "INSERT INTO customers
                (name, gender, email, address, phone)
                VALUES('$name','$gender','$email','$address','$phone')";
        return $this->executeQuery($sql) == true ? $this->getIDInserted() : false;
    }

    // insert bill
    function insertBill($idCustomer, $dateOrder, $total, $promtPrice, $paymentMethod, $note, $token, $tokenDate){
        $sql = "INSERT INTO bills(id_customer, date_order, total, promt_price, payment_method, note, token, token_date)
        VALUES ($idCustomer, '$dateOrder', $total, $promtPrice, '$paymentMethod', '$note', '$token', '$tokenDate')";
        return $this->executeQuery($sql) ? $this->getIDInserted() : false;
    }

    // insert bill detail
    function insertBillDetail($idBill, $idProduct, $quantity, $price, $discountPrice){
        $sql = "INSERT INTO bill_detail(id_bill, id_product, quantity, price, discount_price)
        VALUES($idBill, $idProduct, $quantity, $price, $discountPrice)";
        return $this->executeQuery($sql);
    }
}


?>