<?php
require_once 'models/ProductTypeModel.php';
require_once 'helpers/Cart.php';
session_start();

class Controller{
    function __construct(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function loadView(string $view="index", string $title='Home', array $data=[]){
        if(isset($_SESSION['cart'])){
            $oldCart = $_SESSION['cart'];
            $cart = new Cart($oldCart);
            $totalItemCart = $cart->totalQty;
        }
        else $totalItemCart = 0;
        $model = new ProductTypeModel();
        $categories = $model->getAllCategories();
        require_once "views/master.view.php";

    }

    function loadViewAjax($view, $data=[]){
        require_once "views/ajax/$view.view.php";
    }
}


?>