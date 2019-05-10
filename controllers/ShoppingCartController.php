<?php
require_once 'Controller.php';

class ShoppingCartController extends Controller{
    function getShoppingCartView(){
        return parent::loadView('shopping-cart');
    }
    function getCheckoutView(){
        return parent::loadView('checkout');
    }
    function addToCart($id){
        echo 'id='.$id;
    }
    function deleteCart(){

    }
}


?>