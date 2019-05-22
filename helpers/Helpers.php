<?php
class Helpers{
    function createTokenString(){
        $token = '';
        $initString = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGKLZXCVBNM1234567890';
        for($i = 1; $i<=40; $i++){
            $position = rand(0, strlen($initString)-1);
            $token .= $initString[$position];
        }
        return $token;
    }
}
// $h = new Helpers;
// echo $h->createTokenString();

?>