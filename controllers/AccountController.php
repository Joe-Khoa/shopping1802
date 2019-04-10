<?php
require_once 'Controller.php';

class AccountController extends Controller{
    function loadAccountPage(){
        return parent::loadView('account');
    }
}


?>