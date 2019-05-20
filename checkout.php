<?php
require_once 'controllers/ShoppingCartController.php';

$c = new ShoppingCartController;
if(isset($_POST['btnCheckout']))
return $c->postCheckout();
return $c->getCheckoutView();
    


?>