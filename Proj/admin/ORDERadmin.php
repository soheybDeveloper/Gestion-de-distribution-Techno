


<section class=" postinfo bg-light col-sm-10" id="style-1" >
<article class="card bg-white  p-5">
    <h1 class="display-4">Orders manager</h1>
   
<div class="row" > 
<hr class="my-1" >
<div style="float:right" >
<button type="button" id="refordbtn" class="btn btn-outline-secondary">refresh table</button>

</div>
<div class="table-responsive col-md-12 col-xl-12 col-sm-12  " id="showORDR" > 


</div> </div>
<div class="d-flex justify-content-center pt-5"><img src="users.PNG" class="img-fluid" ></div>

</article>

<!-- Models -->
<!-- insertmodel -->


<!-- Delete Modal -->
<!-- <article class="modal fade Modal-T- " id="Delete" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-center text-white" id="mdu"><i class="fa fa-trash fa-lg" aria-hidden="true" title="supp. ChefDepot"></i>&nbsp;&nbsp;Confirmation</h5>
        <button type="button" class=" btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      are you sure ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
       <button type="button" class="btn btn-danger" id="removeit"><i class="fa fa-trash fa-lg" aria-hidden="true" title="supp. ChefDepot" data-bs-toggle="modal" data-bs-target="#Delete"></i>&nbsp;Remove that user</button> 
      </div>
    </div>
  </div>
</article> -->



<!-- Info Modal -->
<div class="modal fade  " id="LineOrderDetails" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-center text-white" id="mdu">Order details(Order line)</h5>
        <button type="button" class=" btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-3 py-3" id="Lineordbody" >
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
       <!-- <button type="button" class="btn btn-danger" id="removeit"><i class="fa fa-trash fa-lg" aria-hidden="true" title="Copy to use edit" data-bs-toggle="modal" data-bs-target="#Delete"></i>&nbsp;Remove that user</button>  -->
      </div>
    </div>
  </div>
</div>
<!-- edit Modal -->
<!-- <div class="modal fade Modal-T-" id="editmod" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-center text-white" id="mdu"><i class="fa fa-edit fa-lg" aria-hidden="true" title=" edit"></i>&nbsp;&nbsp;Edit User</h5>
        <button type="button" class=" btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-3 py-3" id="editmodbody" >
      <div class="row justify-centre my-4 text-primary" title="infoCHEF"><i class="fa fa-edit fa-lg text-center" style="font-size:120px"id="infobtn" aria-hidden="true"></i></div>'
      <form class ="row" id ="editform" method="POST" action="">
       <div class="mt-2"><input name="idchef" id="editid" placeholder="nom" type="text" class="form-control" readonly></div>
       <div class="mt-2"><input name="fname" id="editfname" placeholder="nom" type="text" class="form-control"></div>
       <div class="mt-2"><input name="lname" id="editlname" placeholder="prenom" type="text" class="form-control"></div>
       <div class="mt-2"><input name="birthDate" id="editbirth" placeholder="date de naicc" type="date" class="form-control"></div>
       <div class="mt-2"><input name="contact" id="editcontact" placeholder="contact" type="text" class="form-control"></div>
       <div class="mt-2"><input name="email" id="editemail" placeholder="exp121@gmail.com" type="text" class="form-control"></div>
      
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
       <button type="button" class="btn btn-primary" id="editIt"><i class="fa fa-edit fa-lg" aria-hidden="true" title=" edit"></i>&nbsp;Edit it!</button> 
      </div>
    </div>
  </div>
</div> -->



<!-- Refresh TAble -->
<div class="modal fade " id="refrord" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-center text-white" id="mdu"><i class="fa fa-fw" aria-hidden="true" title="refresh"></i>&nbsp;Table refreshed</h5>
        <button type="button" class=" btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-3 py-3" >
      
      <span class="lead">Table refreshed</span>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>



<script>

 $(document).ready(
        function(){
     
      showAllcmd();
function showAllcmd(){
  // alert("order")
    $.ajax({
       url:'ORDERaction.php',
       type:'POST',
       data:{action:"view"},
       success:function(dataCMD){
        result = jQuery.parseJSON( dataCMD);
        //  console.log(result);
  datahtml=('<table class="table table-striped" id="tabOrd"><thead><tr><th >Order ID</th><th >Dep ID</th><th>ChefID</th><th >Name CHEF</th><th >Creating date</th><th class="col-sm-1" >Creating time</th><th>show order</th><th >Validation</th> </tr></thead><tbody >');

         $.each( result, function( index, element ){
        
            cmdid=element["cmdid"];
            ChefID=element['Chefid'];
            Datec=element['dateCrea'];  
             TimeC=element['timeCrea'];
             dist=element['dist'];
            DateDist=element['dateDist'];
            console.log(cmdid)
            
            ChefFirstname=element['CHnom'];
            Cheflastname=element['CHPnom'];
            Dep =element['Dep'];
            
            datahtml+=('<tr><th scope="row">'+cmdid+'</th><td >'+Dep+'</td><td >'+ChefID+'</td><td>'+ChefFirstname+' '+Cheflastname+'</td><td>'+Datec+'<td>'+TimeC+'</td></td><td class="" style="justify-item :center"><button type="button" id="order'+cmdid+'" class="btn btn-danger px-2 py-0 showOrder" >show</button></td><td><button type="button" id="orderValide'+cmdid+'" class="btn btn-success px-2 py-0 " >Valide</button></td></tr>');
          

     });

     datahtml+='</thead><tbody >';
     $('#showORDR').html(datahtml);

     $('#tabOrd').DataTable( {

dom: 'lBfrtip',
buttons: [ {
    extend: 'excel',
    text: '<i class="fa fa-fw" aria-hidden="true" title="Export it!"></i>&nbsp;&nbsp;Export to excel',
     className: 'btn btn-success my-2 glyphicon glyphicon-list-alt',
    title: 'ChefDepot List'
}, {
    extend: 'pdf',
    text: '<i class="fa fa-file-pdf-o" aria-hidden="true" title="Export it!"></i>&nbsp;&nbsp;Export to PDF',
    className: 'btn btn-danger my-2 glyphicon glyphicon-list-alt',
    title: 'ChefDepot List'
}, 
{
    extend: 'print',
    text: '<i class="fa fa-print" aria-hidden="true" title="Export it!"></i>&nbsp;&nbsp;Print',
    className: 'btn btn-secondary my-2 ',
    title: 'ChefDepot List'
}
],
"lengthMenu": [10,25,50,100,1000],   
} );
       } 
    })
}

$('body').on('click','.showOrder',function(e){

e.preventDefault();
// idel='#';
  idel= $(this).attr('id');
 idcmd=idel.substring(5);
//  alert(idcmd);
$.ajax({

  url:'ORDERaction.php',
       type:'POST',
       data:{cmdID:idcmd,action:"getOrderLineByOrderID"},
       success:function(LineOrderData){
//console.log(LineOrderData);

result = jQuery.parseJSON( LineOrderData);
$.each( result, function( index, element ){
          
          cmdid=element["CmdID"];
          ChefID=element['ChefID'];})
        // console.log(result);
        datahtml='<div class="my-5 " style="font-size:30; "><span><b>Order ID :</b>&nbsp;'+cmdid+'</span>&nbsp;&nbsp;&nbsp;&nbsp;<span><b>CHEF ID:</b> &nbsp;'+ChefID+'</span><div>'
        datahtml+='<div class="table-responsive col-md-12 col-xl-12 col-sm-12 mt-5 "  >';
  datahtml+=('<table class="table table-striped" id="tabOrdDetails"><thead><th scope="row">Ref.</th><th >Category</th><th >Quantity</th></tr></thead><tbody >');

         $.each( result, function( index, element ){
          
            Ref=element['Ref'];  
             Qte=element['Quantite'];
            Category=element['Categorie'];
            
            datahtml+=('<tr><th scope="row">'+Ref+'</th><td >'+Category+'</td><td >'+Qte+'</td></tr>');
          

     });

     datahtml+='</thead><tbody ></div>';
     $('#Lineordbody').html(datahtml);
$('#LineOrderDetails').modal('show');

       }

})
})
    
})

</script>


</section>






