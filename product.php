<?php
require_once 'controllers/ProductController.php';
$c = new ProductController;
return $c->loadProduct();


?>