<?php
require_once 'Controller.php';

class ProductController extends Controller{
    function loadProduct(){
        return parent::loadView('product');
    }
}


?>