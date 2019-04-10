<?php
require_once 'DBConnect.php';

class IndexModel extends DBConnect{

    function getSlide($status=1){
        $sql = "SELECT * FROM slide WHERE status=$status";
        return parent::getMoreRow($sql);
    }
}


?>