<?php
require_once 'controllers/IndexController.php';

$c = new IndexController;
return $c->getHomePage();



?>