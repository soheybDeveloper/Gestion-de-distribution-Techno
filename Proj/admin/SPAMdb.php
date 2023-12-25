<?php
require('PDOConnection.php');
class SPAMdb{

private $DBConn;
private $DB;
private $countRow =0;
function __construct(){

 $this -> DBConn = new DBConnection();
$this-> DB = $this -> DBConn -> getConnection();
 // $this->DB = new PDO("mysql:host=localhost;dbname=pfc",'root','');
   

}

function readSPAM(){
    
    $info = $this-> DB  -> prepare("SELECT S.Titre,S.Cause,S.SType,S.Description,S.SDate,S.Stime,S.ChefID,C.Nom AS fnameCHEF,C.Prenom as lnameCHEF,S.RefProd,P.Categorie  
    From spam S 
    INNER JOIN chef_depot C ON S.ChefID=C.ChefID
    INNER JOIN produits P ON S.RefProd=P.Ref
    order by SDate,Stime,ChefID,RefProd; ");
    $info -> execute();
    return $info -> fetchAll();

}
function insertSPAM($Titre,$Cause,$SType,$Description,$ChefID,$RefProd){
    $info =$this-> DB-> prepare("INSERT INTO SPAM (Titre,Cause,SType,Description,SDate,Stime,ChefID,RefProd) VALUES(?,?,?,?,curdate(),CURRENT_TIME(),?,?);");
   $info ->execute(array($Titre,$Cause,$SType,$Description,$ChefID,$RefProd));
 
return true;
}

// function getrowCount(){
    
//     $info= $this-> DB  -> query("SELECT ChefID From SPAM;");
//      return $info -> rowCount();
// }


}

?>