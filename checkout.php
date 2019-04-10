<?php
require_once 'controllers/ShoppingCartController.php';

$c = new ShoppingCartController;
return $c->getCheckoutView();


?>