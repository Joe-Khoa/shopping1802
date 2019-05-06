<?php
require_once 'controllers/ProductTypeController.php';

$c = new ProductTypeController;
if(isset($_POST['id'])){
    return $c->postTypeAjax();
}
return $c->loadProductType();



?>