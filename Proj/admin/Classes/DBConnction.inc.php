<?php
class DBConnection{
 private $db;   
// private $host;
// private $user;
// private $password;
// private $database;
// public $connect;
/*function __costruct($host,$user,$password,$database){
      $this->host=$host;
$this->user=$user;
 $this->password=$password;
 $this->database=$database;
  
} */
function __costruct(){
  try{
    $db = new PDO("mysql:host=localhost;dbname=pfc",'root','');
  }
  catch(PDOException $e){
echo $e->getMessage();
  }
}
 function getConnection(){
return $db;
        
    }
    
    function Deconnect(){
//not completed
        
    }


}
?>

