<?php
require_once 'controllers/OrderController.php';
$c = new OrderController;
return $c->acceptOrder();


?>