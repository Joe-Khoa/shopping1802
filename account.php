<?php
require_once 'controllers/AccountController.php';

$c = new AccountController;
return $c->loadAccountPage()();



?>