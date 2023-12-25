<?php
class DBConnection{
    
private $host;
private $user;
private $password;
private $database;
public $connect;
/*function __costruct($host,$user,$password,$database){
      $this->host=$host;
$this->user=$user;
 $this->password=$password;
 $this->database=$database;
  
} */
function __costruct(){
    $this->host="127.0.0.1";
$this->user="root";
 $this->password="1234";
 $this->database="PFC";
}
 function Connect(){
        $this->connect = mysqli_connect($host,$user,$password,$database);
        if(mysqli_connect_errno()){
            die("cannot connect to database field:". mysqli_connect_errno());
          
        } else { echo"database coonected"; }
        
    }
    
    function Deconnect(){
    mysqli_close($this->connect) ;
        
    }


}
?>

