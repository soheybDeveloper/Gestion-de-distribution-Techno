
<html>
<head>
<title> Login Techno </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="Style">
<link rel="stylesheet" href="bootstrap-5.0.0-dist/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="js/jquery.min.js"></script>

</head>
<body class="bg-light ">

<?php 
session_start();
 require('PDOConnection.php');
 $DBConn = new DBConnection();
 $db= $DBConn -> getConnection();
?> 


<script>
$(document).ready(
  function(){

<?php
//$db = new PDO("mysql:host=localhost;dbname=pfc",'root','');

$t=0;
if(isset($_POST['submit'])) {
$t=1;
  $user=trim($_POST['user']);
  $pass=trim($_POST['pass']);

  ?>
  
 
  
  Swal.fire({
      title :'Please wait !',
      didOpen: () => {
          Swal.showLoading()},
    html : 'I will close in <b></b> milliseconds.',
     timer: 1000,
    timerProgressBar: true,
    result:true
    }).then(result =>{
<?php


  if($user =='' || $pass ==''){
?> 

    Swal.fire({
        icon: 'error',
        title: 'password or user name was empty!',
        text: 'Check your username or your password again',
        confirmButtonText:"ok"
}).then(result =>{
  if (result.isConfirmed) {    <?php
     unset($_POST['submit']); unset($_POST['user']); unset($_POST['pass']);
      header('location:login.php');
      
      ?>
   
      }
      })
    
<?php 
  }else{
    
   
    $db1= $db -> prepare("SELECT * FROM chef_depot WHERE  Nom_utilisateurCD = ? and Mot_de_passeCD = ?");
    $db1 -> execute(array($user,$pass));
       $cpt  =  $db1 -> rowCount();
   
       switch($cpt){
         case 0: ?>
     
  Swal.fire({
  icon: 'error',
  title: 'Something went wrong!',
  text: 'Check your username or your password again',
  // footer: '<a href="">Why do I have this issue?</a>'
  confirmButtonText:"ok"
}).then(result =>{
  if (result.isConfirmed) {  
      <?php
     unset($_POST['submit']); unset($_POST['user']); unset($_POST['pass']); 
     //header('location:login.php');
      ?>
      }
      })


         <?php
         
           break;
           case 1 :   
           $INFO =$db1 ->fetch();
           $_SESSION['idUser']=$INFO["ChefID"];      
           $_SESSION['FirstName']=$INFO["Nom"];   
           $_SESSION['LastName']=$INFO["Prenom"];   
           $_SESSION['Birth']=$INFO["DateNaiss"];   
           $_SESSION['email']=$INFO["Email"];
           $_SESSION['Contact']=$INFO["Numero_Tel"];       
             header("location:Userarea.php?id=".  $_SESSION['idUser']) ; 
       
             break;
   
       }

  }


   
?>


  })
  

  <?php  } ?>
})

</script>


     <a  href="index.php" > <div class=" btn btn-outline-primary col-primary" id="btn2" >Take a back</div></a> 


<div id="hello"></div>


 
<section class="container bg-white shadow col-5 my-5  p-5 d-flex justify-content-center  rounded ">
<div class="row">
<form action="login.php" method="post" class="formLog">
<h1 class="display-5 mt-4"><b>Welcome User ! </b></h1>

  <div class="mb-3">

    <label  class="form-label">Username</label>
     <!--<div class="row d-flex ">
      <span class="input-group-text col-1" id="inputGroupPrepend">A0</span> -->
    <input type="text" name="user" id="USERNAME" class="form-control col-10" >
    <!--</div> -->
    <div id="Help" class="form-text">We'll never share your Username with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">password</label>
    <input type="password" id="PASSWORd" name="pass" class="form-control" id="">
  </div>
  <button type="submit" name="submit" id="Loglog"class="btn btn-danger mt-3 col-12 ">Login</button>
</form>
  
</div>

</section>


setcookie("tem_username", "", time() - 3000, "/");





<footer class ="footer container-fluid p-5 mt-5 bg-white d-grid"style="color:black">
<div class="mainfooter row">
<div class="footerItem1  col-sm-6 "> 
    <h1 class="display-5 ">Techno</h1> 
<p class="text-muted "> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           </p> 
</div>
<div class="footerItem2 col-sm"> 
    <h6 class="display-6 "> QUICK LINKS </h6>
   <ul class="navbar-nav"> 
    <li class ="nav-item"><a href="#" class="nav-link">About US </a></li>
    <li class ="nav-item"><a href="#" class="nav-link">Contact Us</a></li>
    <li class ="nav-item"><a href="#" class="nav-link">Contribute</a></li>
    <li class ="nav-item"><a href="#" class="nav-link">Privacy Policy</a></li>
   </ul> 
</div>
<div class="footerItem3 col-sm minzwwidth-6"> <h6 class="display-6">Follow US</h6> <p>Social media links</p> </div>
</div>
<div class="postInfoFooter"> <span class="text-muted">  copyright 2021 </span></div>
</footer>

<!-- @import SweetAlert2 -->
<script src="js/SweetAlert.min.js"></script>

</body>
</html>
