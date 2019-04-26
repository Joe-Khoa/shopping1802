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

            // $page = 1;
            // if(isset($_GET['page'])){
            //     $page = $_GET['page'];
            // }
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $quantity = 9;
            $position = ($page-1)*$quantity;
            $productByType = $model->getProductByType($type->id,$position,$quantity); 
            // print_r($productByType);die;
            
            $data = [
                'leftCategories'=>$leftCategories,
                'productByType'=>$productByType
            ];
            return parent::loadView('product-type',$title,$data);
        }
        else{
            header('Location:404.html');
            return;
        }

        
        
    }
}


?>