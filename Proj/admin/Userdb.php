<?php
require('PDOConnection.php');
class DBusers{

private $DBConn;
private $DB;
private $countRow=0;

function __construct(){

$this -> DBConn = new DBConnection();
$this-> DB= $this -> DBConn -> getConnection();
 //$this->DB = new PDO("mysql:host=localhost;dbname=pfc",'root','');
   

}

function readUsers(){
    
    $info= $this-> DB  -> query("SELECT * From chef_depot order by ChefID");
    $this -> countRow = $info ->rowCount();
     return $info -> fetchALL();

}
function insertUser($fname,$lname,$birthDate,$email,$Contact){
    $info =$this-> DB-> prepare("INSERT INTO chef_depot (Nom,Prenom,DateNaiss,Numero_Tel,Email,Nom_utilisateurCD,Mot_de_passeCD) VALUES(:fname,:lname,:birth,:Contact,:email,'user','user');");
   $info ->execute(['fname'=>$fname,'lname'=>$lname,'birth'=>$birthDate,'Contact'=>$Contact,'email'=>$email]);
 
return true;
}
function deleteUser($id){
    $info = $this->DB->prepare("DELETE FROM chef_depot WHERE ChefID=:id LIMIT 1");
     $info -> execute(['id'=>$id]);
return true;

}
function getrowCount(){
    
    $info= $this-> DB  -> query("SELECT ChefID From chef_depot");
     return $info ->rowCount();
}
function modifyUser($id,$fname,$lname,$birthDate,$email,$Contact){

    
    $info = $this-> DB->prepare("UPDATE chef_depot SET Nom=:fname, Prenom=:lname, DateNaiss= :birth,Email=:email , Numero_Tel=:Contact WHERE ChefID =:id LIMIT 1 ");
    $info ->execute(['fname'=>$fname,'lname'=>$lname,'birth'=>$birthDate,'email'=>$email,'Contact'=>$Contact,'id'=>$id]);
return true;

}

}

?>