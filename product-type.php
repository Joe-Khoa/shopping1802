<?php
require_once 'controllers/ProductTypeController.php';

$c = new ProductTypeController;
if(isset($_POST['id'])){
    echo $_POST['id'];
    die;
}
return $c->loadProductType();



?>