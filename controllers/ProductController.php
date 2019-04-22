<?php
require_once 'Controller.php';
require_once "models/ProductModel.php";

class ProductController extends Controller{
    function loadProduct(){
        if(isset($_GET['url']) && $_GET['id']){
            $url = $_GET['url']; //iphone-x-64gb-gray
            $id = $_GET['id']; // 105
            $model = new ProductModel;
            $product = $model->getProductDetail($url,$id);
            // print_r($product);die;
            if($product){
                $relatedProducts = $model->getRelatedProduct($product->id_type,$product->id);
                $title = $product->name;
                $data = [
                    'product'=>$product,
                    'relatedProducts'=>$relatedProducts
                ];
                return parent::loadView('product',$title,$data);
            }
            else{
                header('Location: 404.error.php');
            }
        }
        else{
            header('Location: 404.error.php');
        }
    }
}


?>