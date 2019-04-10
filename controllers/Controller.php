<?php

class Controller{
    public function loadView(string $view="index", array $data=[]){
        require_once "views/master.view.php";
    }
}


?>