<?php
require_once 'Controller.php';

class IndexController extends Controller{
    
    function getHomePage(){
        return parent::loadView('index');
        // index:view name
    }
}


?>