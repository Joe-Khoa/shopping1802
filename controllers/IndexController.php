<?php
require_once 'Controller.php';
require_once 'models/IndexModel.php';

class IndexController extends Controller{
    
    function getHomePage(){
        $model = new IndexModel();
        $slides = $model->getSlide();
        $specialProducts = $model->getSpecialProducts();
        // print_r($specialProducts);
        // die;
        $data = [
            'slides'=>$slides,
            'specialProducts'=>$specialProducts
        ];
        return parent::loadView('index',$data);
    }

}

/**
 * create route
 * code controller
 * call view
 */

?>