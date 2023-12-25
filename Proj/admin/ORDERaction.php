<?php 

 require('PDOConnection.php');
 $DBConn = new DBConnection();
 $db= $DBConn -> getConnection();




 if(isset($_POST["action"]) && $_POST["action"]=="view" ){
try{
   $query =$db -> query("SELECT C.CmdID as cmdid,C.DateC dateCrea,C.CTime timeCrea,C.dist dist,C.DateD dateDist,Ch.ChefID Chefid,Ch.Nom CHnom,Ch.Prenom CHPnom,D.DepotID Dep FROM commande C INNER JOIN lignecommande L ON C.CmdID =L.CmdID INNER JOIN chef_depot Ch ON Ch.ChefID=L.ChefID INNER JOIN depot D ON Ch.ChefID=D.ChefID GROUP BY cmdid,Chefid");
  echo json_encode($query -> fetchALL()) ;
}
   catch(PDOException $e){
    echo $e->getMessage();
}
}
if(isset($_POST["action"]) && $_POST["action"]=="CMDvalide" ){

$query = $db -> prepare("INSERT IGNORE into Datedist value(?);");
   $query -> execute(array($_POST['DateD']));
  
$query = $db -> prepare("UPDATE commande SET DateD = ? where CmdID= ?;");
$query -> execute(array($_POST['DateD'],$_POST['cmdID']));
echo true;

}
if(isset($_POST["action"]) && $_POST["action"]=="getOrderLineByOrderID" ){
   $cmdID = $_POST['cmdID'];

$query =$db -> query('SELECT L.*,Categorie from lignecommande L INNER JOIN produits P on L.Ref = P.Ref where CmdID='.$cmdID.'; ');
echo json_encode($query -> fetchALL()) ;
}
if(isset($_POST["action"]) && $_POST["action"]=="getOrderLineByChefID" ){
    
 $chefID=$_POST['chefID'];
 $query =$db -> query('SELECT * from lignecommande where ChefID='.$chefID.' ;');
 echo json_encode($query -> fetchALL()) ;
 }
?> 

