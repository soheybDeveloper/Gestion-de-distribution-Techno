<section class="postinfo" id="style-1">




<div class="row">
<aside class="wrapper side ">
    <div class="sidebar-header">
    <?php if (isset($_SESSION["idUser"]) AND (($_SESSION["idUser"]) == $_GET["id"]  ))
         {
     
  ?>
  
  <?php } ?>
        <h3>Chef Depot </h3>
        <strong></strong>
    </div>
        <nav class=""></nav>
    <ul class="navbar-nav">
    <?php foreach ($info as $key ) {
    
     
  ?>
   <div>
   <li class="nav-item" style = "display:flex; ">
   <div> <?= $key["CmdID"] ?> </div>  <div> <?= $key["ChefID"] ?> </div>
   </li>
   </div>
  <?php } ?>
        <li class="nav-item"></li>
       
    </ul>

</aside>
</div>
<form action="" method="post">
<input name="Logout" type="Submit" class="btn btn-primary p-1 m-3" value="Log out">
         </form>
         </section>