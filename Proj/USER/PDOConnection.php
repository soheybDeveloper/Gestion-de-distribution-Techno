<?php
class DBConnection{
 private $db;   

function __costruct(){
  
}
 function getConnection(){

try{
  return  $this -> db = new PDO("mysql:host=localhost;dbname=pfc",'root','');
}
catch(PDOException $e){
echo $e-> getMessage();
}
    }
    
    function Deconnect(){
//not completed
        
    }


}
?>

