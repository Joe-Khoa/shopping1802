<?php
require_once 'Controller.php';
require_once 'models/IndexModel.php';

class IndexController extends Controller{
    
    function getHomePage(){
        $model = new IndexModel();
        $slides = $model->getSlide();
        $specialProducts = $model->getSpecialProducts();
        $bestSellerProducts = $model->getBestSellerProducts();
        $data = [
            'slides'=>$slides,
            'specialProducts'=>$specialProducts,
            'bestSellerProducts'=>$bestSellerProducts
        ];
        return parent::loadView('index','Trang chủ',$data);
    }

}

/**
 * create route
 * code controller
 * call view
 */

?>