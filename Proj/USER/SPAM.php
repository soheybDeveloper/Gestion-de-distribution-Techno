

    <section class="postinfo col-xl-10 p-5" id="style-1">

     <h1 class="display-3">SPAM</h1>
     <div class="  row col-12">

                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">SPAM form</h5>


                        <form class="" action="" method="POST" id="SPAMform">
                       
                            <div class="position-relative row form-group">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                 <input name="title" placeholder="set a Title.." type="text" id="SPAMtitle" class="form-control">
                                </div>
                            </div>
                            <div class="position-relative row mt-3 form-group">
                                <label class="col-sm-2 col-form-label">Cause</label>
                                <div class="col-sm-10"><input name="text" placeholder="set a cause.." id="SPAMcause" type="text" class="form-control"></div>
                            </div>
                            <div class="position-relative row mt-3 form-group">
                                <label class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                <select name="select" class="form-control" id="SPAMtype">
                                <option id='T1'>An opinion</option>
                                <option id='T2'>Recommendation</option>
                                <option id='T3'>Problem detection</option>
                                <option id='T4'>Complaint</option>

                                </select>
                                </div>
                            </div>
                            
                            <div class="position-relative row mt-3 form-group"><label for="exampleText" class="col-sm-2 col-form-label" >Select a product </label>
                                <div class="col-sm-10">
                                    <select name="select" class="form-select" id="SPAMprod">
                                        <!-- requet SQl for prodects -->
                                        
                                        <?php
                                        $db1= $db -> prepare("SELECT Ref,Categorie FROM produits;");
                                       $db1 -> execute();
                                       $cpt  =  $db1 -> rowCount();
                                        $Prod = $db1 -> fetchALL();
                                       
                                         ?>
                                      <!-- <script> alert($cpt)
                                           </script> -->
                                       <?php foreach ($Prod as $key => $value) { ?>  
                                        <option class="dropdown-item px-1 my-3" id="<?= $value["Ref"] ?>"><?= $value["Ref"] ?>&nbsp;-&nbsp;<?= $value["Categorie"] ?> </option> 
                                         <?php } ?>   
                                     
  
                                       


                                         <!-- <script>
                                             var sel= document.getElementById('prod');
                                         var prod = <?php //echo $Prod ?>
                                         prod.forEach(element => { 
                                            sel.innerHTML+="<option>"+elemnt['Catigorie']+"</option>";
                                          });
                                         </script> -->
                                                        
                                                    </select></div>
                            </div>

                            <div class="position-relative row mt-2 form-group"><label for="exampleText" class="col-sm-2 col-form-label" >Description</label>
                                <div class="col-sm-10"><textarea name="spamDescription" id="SPAMdescrp" placeholder="type somthing..." class="form-control" ></textarea></div>
                            </div>
                            
                          
                            </div>
                     
                           
                            
                        </form>
                        <div class="position-relative row my-3 form-check">
                                <div class="col-sm-10 offset-sm-2"><label class="col-sm-0 col-form-label" ></label>
                                   
                        <button class="btn btn-primary col-3 mb-5" id="sub">Submit</button>
  
                                </div>
                            </div>
                    </div>
                </div>
     </div>

     
    </section>


    <!-- <script src="js/SweetAlert.min.js"></script> -->
    <script>

$(document).ready(
        function(){
            //alert("showProdList work well");
    //showSPAMList();
    $("#spam").modal("show");
function showSPAMList(){
    
     $.ajax({
         url:'SPAMaction.php',
         type:'POST',
         data:{action:"view"},
         success: function(data){
             // convert html element to json
// obj=JSON.stringify(datauser);
// convert html element to json
 // result = jQuery.parseJSON(data);
          alert(data);
         }
     });
    }

  // insert SPAM
    $("#sub").click(function(e){
   
    if($("#SPAMform")[0].checkValidity()){
     
        e.preventDefault();
        
        Type=$("#SPAMtype option:selected").val();
        if (Type ="An opinion") Type="opinion"; //for sweetAlert
        Type.toLowerCase();
        $.ajax({
            url:"SPAMaction.php",
    type:'POST',
    data: {
        title:$("#SPAMtitle").val(),
        cause: $("#SPAMcause").val(),
        type: $("#SPAMtype option:selected").val(),
        descrp: $("#SPAMdescrp").val(),
        // time:jQuery.now(),
        // date:Date.now(),
         prod: $("#SPAMprod option:selected").attr('id'),
        ChefID:<?=$_SESSION['idUser']?>,
        action:"insert"},
    success:function(resp){
      Swal.fire(
         
  'your spam was sent successfully !',
  ' thank you for your feedback!',
  'success'
)
       $("#SPAMform")[0].reset();
       
    
 }
        });}
   });
 
});
</script>
    
<!-- 
refSelected=$(this).val();
    //alert(refSelected);
      rowTarg=$($(this).parent()).parent();
      rowitems=rowTarg.children();
     alert($(rowitems[2]).children().val());
    $.each( Product,function( index, element ){
      if (element['ref']==refSelected) {
       //  alert(element['Cat'])
    
       $(rowitems[1]).children().val(element['Cat']);
       
       $(rowitems[3]).children().val(element['PP']);
       $(rowitems[4]).children().val(element['PV']);
        break;
     -->