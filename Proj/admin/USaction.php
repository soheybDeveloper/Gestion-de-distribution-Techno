 
<?php 
require_once 'Userdb.php';
$db=new DBusers();

if( isset($_POST['action']) && $_POST['action'] == "view"){
    $output='';
  
   $info = $db-> readUsers();
    // print_r($info);
if($db -> getrowCount() > 0){
    //echo $db -> getrowCount();
    $output .='<table class=" table table-striped" id="tab">
    <thead>
    <tr >
        <th >#</th>
        <th >name</th>
        <th >birthDate</th>
        <th >Email</th>
        <th >Contact</th>
        <th> Action&nbsp;</th>
    </tr>
    </thead>
    <tbody >
';
   foreach($info as $element){ 
    $output .='<tr class="tabProdelem" title="Chef Depot">
        <th scope="row">'.$element["ChefID"].'</th>
        <td><span class="fistName'.$element["ChefID"].'">'.$element["Nom"].'</span>&nbsp;<span class="lastName'.$element["ChefID"].'">'.$element["Prenom"].'</span></td>
        <td>'. $element["DateNaiss"] .'</td>
        <td>'. $element["Email"] .'</td>
        <td>'. $element["Numero_Tel"] .' </td> 
        <td class="text-center"><a href="#" class="text-success infobtn " id="'.$element["ChefID"].'"><i class="fa fa-info-circle fa-lg" id="infobtn"  aria-hidden="true">&nbsp;info</i></a>&nbsp;&nbsp;
        <a href="#" class="text-primary editbtn" onclick="edit('.$element["ChefID"].')" id="'.$element["ChefID"].'"><i class="fa fa-edit fa-lg" aria-hidden="true" title="Copy to use edit">&nbsp;edit</i></a>&nbsp;&nbsp;
        <a href="#" class="text-danger trashbtn" id="'.$element["ChefID"].'"><i class="fa fa-trash fa-lg" aria-hidden="true" title="Copy to use edit">&nbsp;delete</i></a> </td>
     </tr>  </tr>';
 } ;
 $output .=' </tbody >
 </table>

';
     echo $output;
}else{
    echo '<h1> no data users </h1> ';
}

}

if(isset($_POST['action']) && $_POST['action'] == "insert"){

 
    $fname=trim($_POST['fname']);
    $lname=trim($_POST['lname']);
    $birthDate=$_POST['birthDate'];
    $Contact=trim($_POST['contact']);
    $email=trim($_POST['email']);
   
    $temp = $db -> insertUser ($fname, $lname,$birthDate,$email,$Contact);
 //$info = $db -> insertUser($idChef,$fname,$lname,$birthDate,$email,$Contact);


 if($temp){
    echo "data inserted well" ;
      }else {
    echo "insert faild";
 }

}
if(isset($_POST['action']) && $_POST['action'] == "remove"){
$info = $db -> deleteUser($_POST['id']);
echo $info;
}
if(isset($_POST['action']) && $_POST['action'] == "edit"){
     echo var_dump($_POST['id']);
    $id=trim($_POST['id']);
    $fname=trim($_POST['fname']);
    $lname=trim($_POST['lname']);
    $birthDate=$_POST['birthDate'];
    $Contact=trim($_POST['contact']);
    $email=trim($_POST['email']);
    
    $temp = $db ->  modifyUser($id,$fname,$lname,$birthDate,$email,$Contact);
    if($temp) echo "row edited successfuly";
     else echo "error :edit row";

}

?>
