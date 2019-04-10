<?php
require_once 'controllers/ProductTypeController.php';

$c = new ProductTypeController;
return $c->loadProductType();



?>