<?php 
require('Userdb.php');
$db=new DBusers();
$info = $db-> readUsers();
// var_dump($info);
?>

<section class="postinfo " id="style-1">
<article class="card bg-white  p-5">
    <h1 class="display-4">User space</h1>
<div class="row" > 
<hr class="my-1" >
<div >
<button class="my-2 mr-2   btn-transition btn btn-outline-success"> <i class="fa fa-fw" aria-hidden="true" ></i> Export to excel
                                        </button>
 <button class="my-2 mr-2   btn-transition btn btn-primary"> <i class="fa fa-fw" aria-hidden="true" ></i> Insert new User
   </button>
</div>
<div class="table-responsive col-md-10 col-xl-12 col-sm-10 my-3" > 

    <table class=" table table-hover" id="tabU">
        <thead>
        <tr>
            <th class="col-xl-1">#</th>
            <th class="col-xl-7">name</th>
            <th class="col-xl-2">birthDate</th>
            <th class="col-xl-2">Email</th>
            <th class="col-xl-2">Contact</th>
        </tr>
        </thead>
        <tbody>
    <?php foreach($info as $element){ ?>
        <tr class="tabProdelem">
        <th scope="row"><?= $element["ChefID"] ?></th>
        <td><?= $element["Nom"] ?> <?= $element["Prenom"] ?> </td>
        <td><?= $element["DateNaiss"] ?></td>
        <td><?= $element['Email'] ?></td>
        <td><?= $element["Numero_Tel"] ?></td>

    </tr>

    <?php } ?>
        </tbody>
    </table>


</div> </div>
</article>





<script>
    $(document).ready(function(){
        $("#tabU").DataTable();
    });
    
</script>

</section>