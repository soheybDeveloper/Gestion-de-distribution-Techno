
<?php 

 require('USER/PDOConnection.php');
 $DBConn = new DBConnection();
 $db= $DBConn -> getConnection();
?> 
  <?php 
                  $db1= $db -> prepare("SELECT Ref,Categorie,PrixProduction,PrixVente, IMG FROM produits;");
            $db1 -> execute();
             $TabtProd= $db1 -> fetchALL();
?>
<html>
    <head>
<title>Techno</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">

    </head>
    <body id="style-1">
<header>

    <nav class="nav1 shadow">
       
    
 
        <h1>Techno</h1>
            <ul>
                <li> Home </li>
                <!-- <li> <a href="#store"> Store </a> </li> -->
               
                <li> <a href="#aboutus"> About US </a> </li>
                <li> Contact </li> <li > <a href="USER"> Login </a> </li>
            </ul>
       
    </nav>
   
 
 <div class="head0"> 
 <br />
  <br />
<br />


   <div class="head1 row">
     <div class="col-xl-4 col-md-4  rounded p-4 text-white mx-5" style="background-color: rgba(0,0,0,.5);">
   <div class="head3"> <!-- <span class ="op">#</span> --><h1 class="fw-bold">Techno<br>Campany</h1> </div>
        <h3>Welcome ! any do ?,how can i help ?,</h3>
        
       <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.  </p> -->
              <div class ="controls"> 
              <a href="admin"> 
                  <div class="btn btn-outline-primary mx-2" id="btn1" ><b> Admin </b></div> </a>
        <a href="USER"> 
        <div class="btn btn-light " id="btn" >  User </div></a> </div> 
    </div>
  </div> 
</div> 
</header>


<section class="store shadow" id="style-1">


<!-- Not Completed -->    

  </br></br></br>
    <h1 class="title fw-bold">OUR PRODUCT</h1>
 <div class="article-body d-flex" style="overflow-x: scroll;" id="style-3">
<?php

foreach($TabtProd as $element){ ?>


        <div class='col-xl-3 col-md-4 col-sm-6 col-lg-4 col-xs-8 p-3 '>
        <div class="card  bg-primar ">
      <div class=" card-header "><h4 class="dispaly-5"> Ref. <b> <?= $element['Ref'] ?></b> </h4>
      <hr class="my-1">
      </div>
     <div class="card-body">
    
     <?php
        $img =$element['IMG'] ;
     echo $element['IMG']='<img src="data:image/jpg;base64,'.base64_encode( $img).'" class="img-fluid" />';
     ?> </div> 
<div class="card-footer lead row">
        <hr class="my-1">
        <span>Category &nbsp;<b><?= $element['Categorie'] ?>&nbsp;</b></span>
        
        <span>Selling price &nbsp;<b><?= $element['PrixVente'] ?>&nbsp;Da</b></span></div>
      </div> </div><?php } ?></div>
<!--</details>  -->

</section>
<section class="aboutUS " id="aboutus">
    <br/><br/>
    <h1 class="title fw-bold">About US</h1><br/>
    <aside><img src="4.png" ></aside>
    <br />
    <Article>
        <h2>Techno company</h2>
        <p>
<b>What exactly is Techno Stationery?</b>
Techno Stationery is the first Algerian self-service distribution chain (founded in 2006), it offers a concept aimed at the democratization of cultural products (Office, School, IT, Technical and Fine Arts) for professionals and families.
</p><br/>
<p>Techno offers you a wide range of international brands studied for: The pleasure of learning, Comfort at work, Inspiration for creativity in each range you can find entry-level, mid-range and high-end products. Which will allow you to make the choice according to your use and budget, all this without affecting the quality of the product which always meets international standards in the field.</p>
    </Article>
  
</section>


<?php include('footer.php') ?>
<!-- <footer>
<div class="mainfooter">
<div class="footerItem1"> 
    <h3>About US</h3> <p>
<b>What exactly is Techno Stationery?</b>
Techno Stationery is the first Algerian self-service distribution chain (founded in 2006), it offers a concept aimed at the democratization of cultural products (Office, School, IT, Technical and Fine Arts) for professionals and families.</p>
</div>
<div class="footerItem2"> 
    <h3> QUICK LINKS </h3>
   <ul> 
    <li><a>About Us</a></li>
    <li>Contact Us</li>
    <li>Contribute</li>
    <li>Privacy Policy</li>
   </ul> 
</div>
<div class="footerItem3"> <h3>Follow US</h3> <h4>Social media links</h4> </div>
</div>
<div class="postInfoFooter"> <span> R copyright 2021 </span></div>
</footer> -->

</body>
</html>
