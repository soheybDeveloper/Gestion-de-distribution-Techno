<?php
require('PDOConnection.php');
class PRODdb{

    //private $DBConn;
    private $DB;
    private $countRow=0;
    
    function __construct(){
    
        $this -> DBConn = new DBConnection();
        $this-> DB = $this -> DBConn -> getConnection();
         // $this->DB = new PDO("mysql:host=localhost;dbname=pfc",'root','');
           
    }
    
    function getALLProducts(){
        
        $info= $this-> DB  -> query("SELECT ref,Categorie , QteStock ,  PrixProduction , PrixVente From produits order by ref");
        $this -> countRow = $info ->rowCount();
        
         return $info -> fetchALL();
    
    }
    function getIMG($REF){
        $info= $this-> DB  -> prepare("SELECT * From produits WHERE Ref = ? ");
        $info -> execute(array($REF));
         return $info -> fetch();
    }
    function insertProduct($Cat,$Qte,$PP,$PV){
        $info =$this-> DB-> prepare("INSERT INTO produits (Categorie, QteStock, PrixProduction, PrixVente) VALUES ( ? , ? , ? , ? );");
       $info ->execute(array($Cat,$Qte,$PP,$PV));
     
    return true;
    }
    function deleteProduct($REF){
        $info = $this-> DB-> prepare("DELETE FROM produits WHERE Ref = ? LIMIT 1");
         $info -> execute(array($REF));
    return true;
    
    }
    function getrowCount(){
        
        $info= $this-> DB  -> query("SELECT ref From produits");
         return $info ->rowCount();
    }
    function updatePRICEProduct($REF,$PP,$PV){
        $info = $this-> DB->prepare(" UPDATE produits SET PrixProduction = ?, PrixVente = ? WHERE Ref = ?; ");
        $info ->execute(array($PP,$PV,$REF));
    return true;
    }
    function updateQteProduct($REF,$Qte){
        $info = $this-> DB->prepare(" UPDATE `produits` SET `QteStock` = `QteStock`+ ? WHERE `produits`.`Ref` = ? ");
        
        $info ->execute(array($Qte,$REF));
    return true;
    }
    function editProductinfo($REF,$Cat,$Qte,$PP,$PV){
    
        
        $info = $this-> DB->prepare("UPDATE `produits` SET  `Categorie` = ?, `QteStock` = ?, `PrixProduction` = ?,
        `PrixVente` = ? WHERE `produits`.`Ref` = ?;");
         
        $info ->execute(array($Cat,$Qte,$PP,$PV,$REF));
    return true;
    
    }

}

?>