<?php 
require_once 'SPAMdb.php';
$db=new SPAMdb();

if(isset($_POST["action"]) && $_POST["action"]=="view" ){

    
    if ($db-> getrowCount()>0){
        $info =  json_encode($db-> readSPAM());
       echo $info;
    }else{
        echo "no data on spam table"; 
    }
   }
   if(isset($_POST["action"]) && $_POST["action"]=="insert" ){
    
        $title=$_POST["title"];
        $cause=$_POST["cause"];
        $type=$_POST["type"];
        $descrp=$_POST["descrp"];
        $prodID=$_POST["prod"];
        $ChefID=$_POST["ChefID"];
        // $Date=$_POST["date"];
        // $time=$_POST["time"];
        $info=$db-> insertSPAM($title,$cause,$type,$descrp,$ChefID,$prodID);
        if($info){
      echo"data inserted well";
        }
        else {
            echo"data not inserted";
        }
      
   }


?>