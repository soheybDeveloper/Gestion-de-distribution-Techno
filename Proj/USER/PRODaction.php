<?php

require_once 'PRODdb.php';
$db= new PRODdb();

if(isset($_POST['action']) && $_POST['action']=="getIMG"){
    $REF=$_POST['REF'];
    $img=$db ->getIMG($REF)[5];
     

    echo'<img src="data:image/jpeg;base64,'.base64_encode( $img ).'" class="img-fluid" />';
  

}
if(isset($_POST['action']) && $_POST['action']=="view"){

    echo json_encode($db ->getALLProducts());

}
if(isset($_POST['action']) && $_POST['action']=="UpdateQTE"){

return $db ->updateQteProduct($_POST['REF'],$_POST['QTE']);

}
if(isset($_POST['action']) && $_POST['action']=="UpdatePrice"){

echo    $db ->updatePRICEProduct($_POST['REF'],$_POST['PP'],$_POST['PV']);
}

if(isset($_POST['action']) && $_POST['action']=="remove"){

    echo $_POST['REF'];   $db ->deleteProduct($_POST['REF']);
}
if(isset($_POST['action']) && $_POST['action']=="insert"){
    
   // $img=addslashes(file_get_contents($_FILES['IMG']['tmp_name'])); 
echo $db -> insertProduct($_POST['Cat'],$_POST['Qte'],$_POST['PP'],$_POST['PV']);
}
if(isset($_POST['action']) && $_POST['action']=="edit"){
    echo $db -> editProductinfo($_POST['REF'],$_POST['Cat'],$_POST['Qte'],$_POST['PP'],$_POST['PV']);
    }


?>