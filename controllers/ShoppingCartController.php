<?php
require_once 'Controller.php';

class ShoppingCartController extends Controller{
    function getShoppingCartView(){
        return parent::loadView('shopping-cart');
    }
    function getCheckoutView(){
        return parent::loadView('checkout');
    }
    function addToCart(){
        echo $_POST['id'];
    }
    function deleteCart(){
        
    }
}


?>