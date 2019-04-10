<?php
require_once 'Controller.php';
require_once 'models/IndexModel.php';

class IndexController extends Controller{
    
    function getHomePage(){
        $model = new IndexModel();
        $slides = $model->getSlide();

        print_r($slides);
        die;

        return parent::loadView('index');
    }

}

/**
 * create route
 * code controller
 * call view
 */

?>