<?php
require_once 'Controller.php';

class ProductTypeController extends Controller{
    function loadProductType(){
        return parent::loadView('product-type');
    }
}


?>