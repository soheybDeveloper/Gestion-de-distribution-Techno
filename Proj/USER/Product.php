<section class="postinfo col-xs-12 col-xl-10 p-5" id="style-1">
<article class="card bg-white  p-5">
    <h1 class="display-4">PRODUCT INFO</h1>
    <div class="d-flex justify-content-center px-5"><img src="Product1.PNG" class="img-fluid" ></div>
<div class="row" > 
<hr class="my-1" >
<div class="table-responsive col-md-10 col-xl-12 col-sm-10 my-3" > 

    <table class=" table table-hover" id="tab">
        <thead>
        <tr>
            <th class="col-xl-1">Ref.</th>
            <th class="col-xl-7">Category</th>
            <th class="col-xl-2">Production price</th>
            <th class="col-xl-2">Selling price</th>
        </tr>
        </thead>
        <tbody>
        <?php 
                  $db1= $db -> prepare("SELECT Ref,Categorie,PrixProduction,PrixVente, IMG FROM produits;");
            $db1 -> execute();
             $TabtProd= $db1 -> fetchALL();
?>

<?php foreach($TabtProd as $element){ ?>

<tr class="tabProdelem">
        <th scope="row"><?= $element['Ref'] ?></th>
        <td><?= $element['Categorie'] ?></td>
        <td><?= $element['PrixProduction'] ?></td>
        <td><?= $element['PrixVente'] ?></td>
    </tr>


<?php } ?>

        </tbody>
    </table>


</div> </div>
</article>

<article class="bg-dark p-4 my-5"  >

<div class="article-header text-center text-white  my-5 ">
<h1><b>OUR PRODUCT</b></h1></div>
<div class="article-body d-flex" style="overflow-x: scroll;" id="style-3">
<?php

foreach($TabtProd as $element){ ?>


        <div class='col-xl-4 col-md-6 col-sm-12 col-lg-6  p-2 '>
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
        <span>Production price&nbsp;<b><?= $element['PrixProduction'] ?>&nbsp;Da</b></span>
        <span>Selling price &nbsp;<b><?= $element['PrixVente'] ?>&nbsp;Da</b></span></div>
      </div> </div><?php } ?></div>



</article>


<article class="  my-5">

<div class="article-header text-center  my-5 ">
<h1 class="display-1">OUR PRODUCT</h1></div>
<div class="article-body row">
<?php

foreach($TabtProd as $element){ ?>


        <div class='col-xl-4 col-md-6 col-sm-12 col-lg-4  py-3 '>
        <div class="card border-dark bg-white text-dark shado " style="overflow:hidden">
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
        <span>Production price&nbsp;<b><?= $element['PrixProduction'] ?>&nbsp;Da</b></span>
        <span>Selling price &nbsp;<b><?= $element['PrixVente'] ?>&nbsp;Da</b></span></div>
      </div> </div><?php } ?>



</article>


</section>


<script>
    $(document).ready(function(){
    

        $("#tab").DataTable({

dom: 'lBfrtip',
buttons: [ {
    extend: 'excel',
    text: '<i class="fa fa-fw" aria-hidden="true" title="Export it!"></i>&nbsp;&nbsp;Export to excel',
     className: 'btn btn-success my-2 glyphicon glyphicon-list-alt',
    title: 'Product List'
}, {
    extend: 'pdf',
    text: '<i class="fa fa-file-pdf-o" aria-hidden="true" title="Export it!"></i>&nbsp;&nbsp;Export to PDF',
    className: 'btn btn-danger my-2 glyphicon glyphicon-list-alt',
    title: 'Product List'
}, 
{
    extend: 'print',
    text: '<i class="fa fa-print" aria-hidden="true" title="Export it!"></i>&nbsp;&nbsp;Print',
    className: 'btn btn-secondary my-2 ',
    title: 'ChefDepot List'
}
],
"lengthMenu": [5,10,50,100],   
});
    });
    
</script>

</section>