
<section class=" postinfo col-sm-10" id="style-1" >
<article class="card bg-white  p-5">
    <h1 class="display-4">SPAM <span style=" letter-spacing:.2px; font-weight: bold ;">INBOXING</span></h1>
<div class="d-flex justify-content-center px-5"><img src="spam1.PNG" class="img-fluid" ></div>
<div class="row" > 
<hr class="my-2" >
<div class="my-4">
<button type="button" id="refrspbtn" class="btn btn-outline-primary">refresh table</button>
</div>
<div class="table-responsive col-md-12 col-xl-12 col-sm-12  " id="showSPAM" > 


</div> 
</div>
</article>


<!-- Info Modal -->
<div class="modal fade  Modal-T- " id="infomoddd" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-center text-white" id="mdu">SPAM INBOXING </h5>
        <button type="button" class=" btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-3 py-3" id="infomodddbody" >
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
       <!-- <button type="button" class="btn btn-danger" id="removeit"><i class="fa fa-trash fa-lg" aria-hidden="true" title="Copy to use edit" data-bs-toggle="modal" data-bs-target="#Delete"></i>&nbsp;Remove that user</button>  -->
      </div>
    </div>
  </div>
</div>

<!-- refresh table Modal -->
<div class="modal fade  Modal-T- " id="refrsp" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
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
            //alert("showProdList work well");
            
            $("body").on("click","#refrspbtn",function(e){
                e.preventDefault();
                showSPAMList();
                $("#refrsp").modal('show')
            })
    showSPAMList();
  //  $("#spam").modal("show");
    

function showSPAMList(){
    
     $.ajax({
         url:'SPAMaction.php',
         type:'POST',
         data:{action:"view"},
         success: function(responce){

 
 
 dataSpam =jQuery.parseJSON(responce);
 
        // console.log(result);
  datahtml=('<table class="table table-striped" id="tabSSS"><thead><tr><th >Title</th><th >Type</th><th >Date</th><th>Time</th><th>ChefID</th> <th>nameCHEF</th> <th>RefProd</th><th>Categorie</th><th class="d-none">Cause</th><th class="d-none">Description</th><th>View details</th> </tr></thead><tbody >');

         $.each( dataSpam, function( index, element ){
            // Titre=element['Titre']
            // SType=element['SType']
            // SDate=element['SDate']
            // Stime=element['Stime']
            // ChefID=element['ChefID']
            // fnameCHEF=element['fnameCHEF']
            // lnameCHEF=element['lnameCHEF']
            // RefProd=element['RefProd']
            // Categorie=element['Categorie']
            // Cause=element['Cause']
            // Description=element['Description']
            if(!element['Titre'].trim()) Titre='***empty';else Titre=element['Titre'];
            if(!element['SType'].trim()) SType='***empty';else SType=element['SType'];
            if(!element['SDate'].trim()) SDate='***empty';else SDate=element['SDate'];
            if(!element['Stime'].trim()) Stime='***empty';else Stime=element['Stime'];
            if(!element['ChefID'].trim()) ChefID='***empty';else ChefID=element['ChefID'];
            if(!element['fnameCHEF'].trim()) fnameCHEF='***empty';else fnameCHEF=element['fnameCHEF'];
            if(!element['lnameCHEF'].trim()) lnameCHEF='***empty';else lnameCHEF=element['lnameCHEF'];
            if(!element['RefProd'].trim()) RefProd='***empty';else RefProd=element['RefProd'];
            if(!element['Categorie'].trim()) Categorie='***empty';else Categorie=element['Categorie'];  
            if(!element['Cause'].trim()) Cause='***empty';else Cause=element['Cause'];
            if(!element['Description'].trim()) Description='***empty';else Description=element['Description'];







            datahtml+=('<tr><th scope="row">'+Titre+'</th><td >'+SType+'</td><td >'+SDate+'</td><td>'+Stime+'</td><td>'+ChefID+'</td> <td>'+fnameCHEF+' '+lnameCHEF+'</td> <td>'+RefProd+'</td><td>'+Categorie+'</td><td class="d-none">'+Cause+'</td><td class="d-none">'+Description+'</td><td ><a href="#" class="nav-link infolink" id=Spam'+index+'><i class="fa fa-fw" aria-hidden="true" style="font-size:25px;" title="Copy to use eye"></i>&nbsp;&nbsp;<span style="font-size:15px;">View</span></a></td> </tr>');

    //   console.log(element['Titre']);
    //   console.log(element['SType']);
    //   console.log(element['SDate']);
    //   console.log(element['Stime']);
    //   console.log(element['ChefID']);
    //   console.log(element['nameCHEF']);
    //   console.log(element['RefProd']);
    //   console.log(element['Categorie']);
    //   console.log(element['Cause']);
    //   console.log(element['Description']);

     });
     datahtml+='</thead><tbody >';
$("#showSPAM").html(datahtml);

$("#tabSSS").DataTable({});






         }
     });
    }




// GET info user function

$("body").on("click",".infolink",function(e){
    //get id user

  idel='#';
  idel+= $(this).attr('id');
  //console.log(idel);
  // move to the parent row tr who got all informations
  info=$($(idel).parent()).parent();
  //console.log(info);
  //get all data user and initialze array values
  // alert(idel)
  var dataSPAM = {};
  info.children().each( function( index, element ){
   
dataSPAM[index]=$.trim($(this).text());

});

finalcontent='<div class="row p-4">'


finalcontent+=('<div class="row justify-centre mb-5 mt-3 text-dark text-center" title="infoCHEF"><i class="fa fa-envelope-square " style="font-size:120px"id="infobtn" aria-hidden="true"></i><span style="font-size:40px">INBOXING</span></div>');
    finalcontent+='<div id="SPAMtitle" class="position-relative row form-group"><label class="col-sm-2 col-form-label"><b>Title</b></label><div class="col-sm-10"> <span>'+dataSPAM[0]+'</span></div></div>';
    finalcontent+=' <hr class="my-2" >';
     finalcontent+='<div id="SPAMtitle" class="position-relative row form-group"><label class="col-sm-2 col-form-label"><b>Type</b></label><div class="col-sm-10"><span>'+dataSPAM[1]+'</span></div></div>';
     finalcontent+=' <hr class="my-2" >';finalcontent+='<div id="SPAMtitle" class="position-relative row form-group"><label class="col-sm-2 col-form-label"><b>DaTE/Time</b></label><div class="col-sm-10"><span>'+dataSPAM[2]+' - '+dataSPAM[3]+'</span></div></div>'
     finalcontent+=' <hr class="my-2" >';       finalcontent+='<div id="SPAMtitle" class="position-relative row form-group"><label class="col-sm-2 col-form-label"><b>Chef</b></label><div class="col-sm-10"><span>'+dataSPAM[4]+' - '+dataSPAM[5]+'</span></div></div>';
     finalcontent+=' <hr class="my-2" >';   finalcontent+= '<div id="SPAMtitle" class="position-relative row form-group"><label class="col-sm-2 col-form-label"><b>Prod</b></label><div class="col-sm-10"><span>'+dataSPAM[6]+'-'+dataSPAM[7]+'</span></div></div>';
     finalcontent+=' <hr class="my-2" >';  finalcontent+='<div id="SPAMtitle" class="position-relative row form-group"><label class="col-sm-2 col-form-label"><b>Cause</b></label><div class="col-sm-10"><span>'+dataSPAM[8]+'</span></div></div>';
     finalcontent+=' <hr class="my-2" >';finalcontent+='<div id="SPAMtitle" class="position-relative row form-group"><label class="col-sm-2 col-form-label"><b>Description</b></label><div class="col-sm-10"><span>'+dataSPAM[9]+'</span></div></div>';
                             
 

finalcontent+='</div>';
//display all data user into the last modal or distination
$('#infomodddbody').html(finalcontent);
//console.log(finalcontent);
$("#infomoddd").modal('show');

//WaW   ana smart ge3 haka !!!


});



        });

        </script>
</section>


