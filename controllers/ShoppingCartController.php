<?php
require_once 'Controller.php';
require_once 'models/ShoppingCartModel.php';

class ShoppingCartController extends Controller{
    function getShoppingCartView(){
        return parent::loadView('shopping-cart');
    }
    function getCheckoutView(){
        return parent::loadView('checkout');
    }
    function addToCart($id){
        $model = new ShoppingCartModel;
        $product = $model->findProductById($id);
        print_r($product);
    }
    function deleteCart(){

    }
}


?>