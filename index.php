<?php
print_r($_SERVER);
die;


require_once 'controllers/IndexController.php';

$c = new IndexController;
return $c->getHomePage();



?>