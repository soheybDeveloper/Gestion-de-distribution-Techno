<?php session_start();
if($_SESSION['idAdmin'] == null ||     
$_SESSION['FirstName'] == null || 
$_SESSION['LastName']== null) header("location:deconect.php");
// var_dump($_SESSION["idUser"]);
require('PDOConnection.php');
 ?>
 
 <?php // temp sql
 
$DBConn = new DBConnection();
$db= $DBConn -> getConnection();
 //$db = new PDO("mysql:host=localhost;dbname=pfc",'root','');
  $db1= $db -> prepare("SELECT * FROM commande");
  $db1 ->execute();

$info = $db1->fetchALL();

 ?>



  <?php // Logout proccesss
 if(isset($_POST["Logout"])){
header("location:deconect.php");
 }
 ?>
 <html>
<head>
<title> Login Techno </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="Style/ChefArea.css">


<!-- @import bootstrap 5 css file-->
<link rel="stylesheet" href="bootstrap-5.0.0-dist/css/bootstrap.min.css">


 <!-- jQuery library -->
<script src="js/jquery.min.js"></script>
<!-- Popper JS -->
<script src="js/popper.min.js"></script>

   <!-- @import bootstrap 5 js file-->
 <script src="bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
    
      <!-- @import SweetAlert2 -->
<script src="js/SweetAlert.min.js"></script>
<!-- @import DATA table css file-->
        <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> 
<link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
</head>


<body class="bg-light" >




<nav class="mainNav sb-topnav navbar navbar-expand navbar-dark bg-dark ">
            <!-- Navbar Brand-->
            <a class=" text-muted navbar-brand ps-3 " href="index.html">Admin area</a>
          
            <!-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><svg class="svg-inline--fa fa-bars fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg><i class="fas fa-bars"></i> Font Awesome fontawesome.com</button> -->
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><svg class="svg-inline--fa fa-user fa-w-14 fa-fw" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img"  viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg><!-- <i class="fas fa-user fa-fw"></i> Font Awesome fontawesome.com --></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Create Commande</a></li>
                        <li><a class="dropdown-item" href="#!">Show Commandes</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <!-- log out button -->
            <form action="" method="post">
<input name="Logout" type="Submit" class="btn btn-primary px-3 py-1  " value="Log out">
         </form>
        </nav>







         <div class="mainContent container-fluid d-flex  ">
<aside class="mainSadNav bg-dark scrollbar col-xl-2 col-xs-12 " id="style-3">
<div class="position-sticky bg-dark" >
        
        <div class="navpart mx-2">
            <h4 class="  text-center   " style=" color:white">
                <span class="display-5"> Welcome</span></br> <span class="text-secondary mt-1"><?= $_SESSION['FirstName']; ?> <?= $_SESSION['LastName'];  ?> </span>
        </h4>
       
            </div>        
        
        <div class="navpart mx-2">
        <ul class="navbar-nav">
        <li class="nav-item nv-it"><a class="nav-link " href="#" >Home</a></li>
            <li class="nav-item nv-it"><a class="nav-link " href="#" onclick="" >Setting</a></li>
         
        
        </div>
        <div class="navpart  ">
        <span class="text-muted  " ><b>Users management</b> 
        </span>
        <ul class="Navg  navbar-nav">
        <li class="nav-item nv-it"><a class="nav-link " href="#" onclick="showsec(0)">deposit managers</a></li>
        
        </ul>
        </div>
         <div class="navpart ">
        <span class="text-muted  " ><b>Product management</b> 
        </span>
        <ul class="Navg  navbar-nav">
        <li class="nav-item nv-it"><a class="nav-link " href="#" onclick="showsec(1)">Product info</a></li>
        
        </ul>
        </div>
        
        <div class="navpart">
        <span class="sb-sidenav-menu-heading text-muted cmd"><b>SPAMBOX</b> 
        </span>
        <ul class="Navg  navbar-nav">
        <li class="nav-item nv-it " ><a class="nav-link " href="#" onclick="showsec(2)">> SPAM</a></li> 
        </ul>
        </div>
       <div class="navpart  ">
        <span class="text-muted  " ><b>Order management</b> 
        </span>
        <ul class="Navg  navbar-nav">
        <li class="nav-item nv-it"><a class="nav-link " href="#" onclick="showsec(3)" >Orders</a> </li>

        
        </ul>
        </div>
        <div class="navpart ">
         
        <ul class="text-muted my-1 navbar-nav">
            <h5>Contact </h5>
            <li class="nav-item"> <b>Email : </b> <?= $_SESSION['email']; ?></li>
            
        
        </ul>
            </div>
        </div>
</aside>




<?php include("GUSERadmin.php"); ?>
<?php include("PRODUCTadmin.php"); ?>
<?php include("SPAMadmin.php"); ?>
<?php include("ORDERadmin.php"); ?>

</div>

    




 





<!--!start scripts links --> 

<script src="js/showSections.js"></script>  
<script src="js/SweetAlert.min.js"></script> 
<!-- <script src="js/SPAM.js"></script>  -->

<!-- @import DATA table js file-->
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<!-- !end scripts links --> 



<script>

var data = document.getElementsByClassName('postinfo');

function showsec(index){
 
for (let i = 0; i < data.length; i++) data[i].style.display='none';
data[index].style.display='block'; 
                       }
</script>
<script>

showsec(0);
</script>


</body>
</html>