<?php
require_once 'Controller.php';
require_once 'models/ProductTypeModel.php';

class ProductTypeController extends Controller{
    function loadProductType(){
        if(!isset($_GET['url'])){
            header('Location:home'); // home ~ index.php
            return;
        }
        $model = new ProductTypeModel;
        $url = $_GET['url'];
        $type = $model->getProductTypeByUrl($url);
        if($type){
            $title = $type->name;
            $leftCategories = $model->getCategoriesWithProductCount();
            $data = [
                'leftCategories'=>$leftCategories
            ];
            return parent::loadView('product-type',$title,$data);
        }
        else{
            echo '404';
        }
        
    }
}


?>