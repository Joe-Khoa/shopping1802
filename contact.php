<?php
require_once 'controllers/ContactController.php';

$c = new ContactController;
return $c->loadViewContact();


?>