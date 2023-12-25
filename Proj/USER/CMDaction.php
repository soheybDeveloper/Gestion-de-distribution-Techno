<?php

require_once 'PRODdb.php';
  $DBConn = new DBConnection();
 $db= $DBConn -> getConnection();




if(isset($_POST['action']) && $_POST['action']=="view"){

    $query= $db-> query("SELECT ref, Categorie as Cat ,  PrixProduction as PP, PrixVente as PV From produits order by ref");

    echo json_encode($query ->fetchALL());

}
if(isset($_POST['action']) && $_POST['action']=="createCMD"){
try{
    
    $query = $db -> prepare("INSERT  into datecmd(DateC)value(curdate());");
   $query -> execute();
  //  $queryGetDate = $db -> query("SELECT MAX(dateC) from Datecmd");
    //$data = $queryGetDate -> fetch();
$query = $db -> prepare("INSERT into commande(DateC,CTime)values(curdate(),CURRENT_TIME());");
$query -> execute();
  $query = $db -> query("SELECT MAX(CmdID) as id from commande"); 
  echo json_encode($query -> fetch()) ;

}

catch(PDOException $e){
    echo $e->getMessage();
}
}
if(isset($_POST['action']) && $_POST['action']=="insertLine"){

$query = $db -> prepare("INSERT INTO `lignecommande` (`ChefID`, `CmdID`, `Ref`, `Quantite`) VALUES (?, ?, ?, ?);");
$query -> execute(array($_POST['ChefID'],$_POST['cmdid'],$_POST['ref'],$_POST['qte']));
    
}
?>