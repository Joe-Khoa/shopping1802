<?php

class Controller{
    public function loadView(string $view="index", string $title='Home', array $data=[]){
        require_once "views/master.view.php";
    }
}


?>