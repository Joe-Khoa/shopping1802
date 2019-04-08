<?php
 
class DBConnect{
    private $options = [];
    private $connect = null;
    private $stmt = null;
    /**
     * Connect to database
     */
    function __construct($dbName='php1802_shopping',$username='root', $password=''){
        try{
            $this->connect = new PDO("mysql:dbname=$dbName;host=127.0.0.1",$username,$password,$this->options);
            $this->connect->exec('set names utf8');
        }
        catch(PDOException $e){
            echo $e->getMessage();
            die('Connect fail!');
        }
    }

    /**
     * Use for INSERT | UPDATE | DELETE 
     * @param string $sql
     * @param array $values = []
     * @return bool
     */
    function executeQuery(string $sql, array $values=[]){
        $this->stmt = $this->connect->prepare($sql);
        for($i=1; $i<=count($values); $i++){
            $this->stmt->bindValue($i,$values[$i-1]);
        }
        return $this->stmt->execute();
    }
    /**
     * Use for SELECT return only 1 row
     * @param string $sql
     * @param array $values = []
     * @return object (row)
     */
    function getOneRow($sql, $values=[]){
        $this->executeQuery($sql,$values);
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    /**
     * Use for SELECT return >=2 rows
     * @param string $sql
     * @param array $values = []
     * @return array objects (rows)
     */

    function getMoreRow($sql, $values=[]){
        $this->executeQuery($sql,$values);
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
}


?>