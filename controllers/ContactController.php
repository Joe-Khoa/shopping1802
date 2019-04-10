<?php

require_once 'Controller.php';

class ContactController extends Controller{
    function loadViewContact(){
        return parent::loadView('contact');
    }
}


?>