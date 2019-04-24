<?php
require_once 'Controller.php';
require_once 'models/ProductTypeModel.php';

class ProductTypeController extends Controller{
    function loadProductType(){
        $model = new ProductTypeModel;
        $leftCategories = $model->getCategoriesWithProductCount();

        $title = '...'; // not yet
        $data = [
            'leftCategories'=>$leftCategories
        ];
        return parent::loadView('product-type',$title,$data);
    }
}


?>