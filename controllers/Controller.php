<?php
require_once 'models/ProductTypeModel.php';

class Controller{

    public function loadView(string $view="index", string $title='Home', array $data=[]){
        $model = new ProductTypeModel();
        $categories = $model->getAllCategories();
        require_once "views/master.view.php";

    }

    function loadViewAjax($view, $data=[]){
        require_once "views/ajax/$view.view.php";
    }
}


?>