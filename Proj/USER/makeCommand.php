




<section class="postinfo col-xl-10 p-5" id="style-1">
    <article class="artc bg-white p-5 rounded">
        
<header> <h1 class=" display-3"><i class="fa fa-fw" aria-hidden="true" ></i> make an order </h1></header>
<article>

<hr class="my-2"> 
<div class="row">
<div class="table-responsive col-md-10 col-xl-12 col-sm-10 my-3">

<table class="mb-0 table table-striped"id="CMDtab">
            <thead>
            <tr>
                <th>Ref</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Production price (Da)</th>
                <th>Selling price (Da)</th>
                <th>Drop a line</th>
            </tr>
            </thead>
            <tbody id="cmdLines">
           
               
            </tbody>
        </table>
        
        </div>
        <div><button class="btn btn-primary ml-3 mt-2 refresh" id="addrowP" > <i class="fa fa-fw" aria-hidden="true" ></i>&nbsp;add a product</button>
        <button class="btn btn-success ml-3 col-3  mt-2" id="CommCMD"><i class="fa fa-fw fa-lg" style="font: size 25px;" aria-hidden="true"></i>&nbsp;Commit</button></div></div>
</article>
<footer></footer>
<div class="d-flex justify-content-center px-5"><img src="orders.PNG" class="img-fluid" ></div>

    </article>


    <script>

$(document).ready(
  function(e){
    // var i=0;
    var Product ;
  
   
   getAllProduct();
   
 
   
   $('#CommCMD').click(function(e){

    //main function here
    
     e.preventDefault();
     var CmdID ;
    createCmd();
    function createCmd(){
    $.ajax({
       url:'CMDaction.php',
       type:'POST',
       data:{action:"createCMD"},
       success:function(id){
         idd =jQuery.parseJSON(id);
         CmdID=idd["id"];
         //alert(idd["id"]) ;


         LinesArray = $('#cmdLines').children();
 // alert(CmdID);
console.log(LinesArray);
LinesArray.each(function( index, element ){
 // tested it's working well
console.log($(this).find('#refPC').val());
console.log($(this).find('#setQTEC').val());
refP=$(this).find('#refPC').val()
Qte=$(this).find('#setQTEC').val();
//alert(CmdID)
ChefID=<?=$_SESSION['idUser']?>;
insertLineCMD(ChefID,CmdID,refP,Qte);

LinesArray.fadeOut('slow', function(){ LinesArray.remove(); });

// LinesArray;
})



     }})
    }

  
   })

  

   
   $('#testLine').click(function(){ line=0;
    //insertLineCMD(line)
   })


   function insertLineCMD(Chefid,CMDid,RefProduct,Qte){
$.ajax({
  url:'CMDaction.php',
    type:'POST',
    data:{ChefID:Chefid,cmdid:CMDid,ref:RefProduct,qte:Qte,action:"insertLine"},
    success:function(resp){
      console.log(resp);
      Swal.fire(
         
         'your order :'+CMDid+' was sent successfully !',
         ' thank you for your feedback!',
         'success'
       )
                            }
        })
                                     }


function getAllProduct(){
  $.ajax({
    url:'CMDaction.php',
    type:'POST',
    data:{action:"view"},
    success:function(data){
Product= jQuery.parseJSON(data);
// console.log(data);
    }})
    }
    var pos=0;
$('body').on('click','#addrowP', function(e){
  e.preventDefault();
 

tableBody=$('#CMDtab tbody');
   row='<tr><th scope="row"class="col-2"> <select class="form-select bg-white field" id="refPC"><option value="" selected disabled>--- select a ref ---</option> ';
   cat='<td class="col-3"> <select class="form-select bg-white fieldCat" id="CatDroplist"> <option value="" selected disabled>--- select a product ---</option>';
   $.each(Product, function( index, element ){
row+='<option id="'+element['ref']+'" >'+element['ref']+'</option >';
cat+='<option class="">'+element['Cat']+'</option >';
   })
   row+='</select> </th>';  
   cat+='</select> </th>';
row+=cat;
row+='<td class="col-2"><input name="storage" type="number" id="setQTEC" placeholder="100.."  class="form-control"></td>';
row+='<td class="col-2"><input name="PPC" type="number" id="setPPC" placeholder="99.00"  class="form-control"readonly></td>';
 row+='<td class="col-2"><input name="PVC" type="number" id="setPVC" placeholder="99.00"  class="form-control"readonly></td>';
 row+='<td class="col-1 text-center"><a href="#" id="'+pos+++'"class=" btn btn-danger dropLine"><i class="fa fa-fw" aria-hidden="true" style="font-size:24px;" title="Copy to use times"></i><td></tr>'
 //add row 

 tableBody.fadeIn('slow', function(){ tableBody.append(row) });

// if(i++==0)$("#cmdbtn").html('<button class="btn btn-success ml-3  mt-2">Commit</button>')

$('.field').change(function() {
    //alert('ypppp');
      refSelected=$(this).val();
    
      rowTarg=$($(this).parent()).parent();
      rowitems=rowTarg.children();
    
    $.each( Product,function( index, element ){
      if (element['ref']==refSelected) {
       //  alert(element['Cat'])
    
       $(rowitems[1]).children().val(element['Cat'])
       
       $(rowitems[3]).children().val(element['PP'])
       $(rowitems[4]).children().val(element['PV'])
   
      }
    }) });
$('.dropLine').click(function(e){
  e.preventDefault();
  rowTarget=$($(this).parent()).parent();
  rowTarget.fadeIn('slow', function(){ rowTarget.remove(); });

})
    $('.fieldCat').change(function() {
    //alert('ypppp');
      refSelected=$(this).val();
    
      rowTarg=$($(this).parent()).parent();
      rowitems=rowTarg.children();
     
    $.each( Product,function( index, element ){
      if (element['Cat']==refSelected) {
       //  alert(element['Cat'])
    
       $(rowitems[0]).children().val(element['ref'])
       
       $(rowitems[3]).children().val(element['PP'])
       $(rowitems[4]).children().val(element['PV'])
   
      }
    }) });

})


 


}) // JQUERY end

</script>


</section>






