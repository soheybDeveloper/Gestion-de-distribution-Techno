


    $(document).ready(
        function(){
$("body").on('click',"#refus",function(e){
    e.preventDefault();
    showALLUsers();
    $("#RefUStab").modal('show');
    // sweetalert here
})
            
            showALLUsers();
        
function showALLUsers(){
    $.ajax({
url:"USaction.php",
type:'POST',
data: { action:"view"},
success: function(data){
  //console.log(data);
   $("#showUsers").html(data);
  $("#tab").DataTable( {

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
  
 //  $("p").html("Hello <b>world!</b>");
}
    });
}

// insert user
$("#Insert").click(function(e){
if($("#addform")[0].checkValidity()){
    e.preventDefault();
    
    $.ajax({
        url:"USaction.php",
type:'POST',
data: {fname:$("#fname").val(),
    lname: $("#lname").val(),
    birthDate: $("#birth").val(),
    contact: $("#contact").val(),
    email: $("#email").val(),action:"insert"},
success:function(resp){
    console.log(resp);
     // $("#Usdq").modal('hide');
    Swal.fire({
        title: '<b>'+$("#fname").val()+' '+$("#lname").val()+'</b> added successfully !',
        text: 'check it!',
        icon: 'success'
     } )

    
   
    $("#addform")[0].reset();
    showALLUsers();
 
   
}
    })
}
});
$("body").on("click",".trashbtn",function(e){
    e.preventDefault();
    idCH= $(this).attr('id');
    console.log(idCH);
   
    $("#Delete").modal("show");
if($("#removeit").click(function(o){
    o.preventDefault();
  //  console.log("1 deleted well");
    $.ajax({
url:"USaction.php",
type:"POST",
data:{id:idCH,action:"remove"},
success:function(resp){
console.log(resp);
$("#Delete").modal('hide');
    showALLUsers();
}
});
})
);

});



// GET info user function
$("body").on("click",".infobtn",function(e){
    //get id user
  idel='#';
  idel+= $(this).attr('id');
  //console.log(idel);
  // move to the parent row tr who got all informations
  info=$($(idel).parent()).parent();
  //console.log(info);
  //get all data user and initialze array values
  var datauser = {};
  info.children().each( function( index, element ){
    console.log(1);
    datauser[index]=$.trim($(this).text());
});
// convert html array to json
obj=JSON.stringify(datauser);
// convert json element to array
  //obj = jQuery.parseJSON( info);
 // console.log(obj);
 // convert array data user into html element
finalcontent='<div class="row">'
// for(i=0;i<5;i++){
    finalcontent+=('<div class="row justify-centre my-5 text-success" title="infoCHEF"><i class="fa fa-info-circle fa-lg text-center" style="font-size:120px"id="infobtn" aria-hidden="true"></i></div>');
    finalcontent+=('<ul class="navbar-nav lead px-4" ><li class="nav-item mt-2"><span class="text-muted"><b>ID :&nbsp;</b></span>'+datauser[0]+'</li>');
    finalcontent+=('<li class="nav-item mt-1"><span class="text-muted"><b>Name :&nbsp;</b></span>'+datauser[1]+'</li>');
    finalcontent+=('<li class="nav-item mt-1"><span class="text-muted"><b>birth date :&nbsp;</b></span>'+datauser[2]+'</li>');
    finalcontent+=('<li class="nav-item mt-1"><span class="text-muted"><b>email :&nbsp;</b></span> '+datauser[3]+'</li>');
    finalcontent+=('<li class="nav-item mt-1"><span class="text-muted"><b>Contact :&nbsp;</b></span> '+datauser[4]+'</li></ul>');

//}
finalcontent+='</div>';
//display all data user into the last modal or distination
$('#infomodbody').html(finalcontent);
console.log(finalcontent);
$("#infomod").modal('show');

//WaW   ana smart ge3 haka !!!


});

// edit User 

$("body").on("click",".editbtn",function(e){
   //get id user
   idel='#';
   idel+= $(this).attr('id');
   //console.log(idel);
   // move to the parent row tr who got all informations
   info=$($(idel).parent()).parent();
   //console.log(info);
   //get all data user and initialze array values
   var datauser = {};
   info.children().each( function( index, element ){
     console.log(1);
     datauser[index]=$.trim($(this).text());
 });
 idel='';
 $("#editid").val(datauser[0]);
$("#editfname").val();
$("#editlname").val();
$("#editbirth").val(datauser[2]);
$("#editcontact").val(datauser[4]);
$("#editemail").val(datauser[3]);

$("#editmod").modal('show');
});


$("body").on("click","#editIt",function(e){

    e.preventDefault();
    $.ajax({
        url:"USaction.php",
type:'POST',
data: {id:$("#editid").val(),
    fname:$("#editfname").val(),
    lname: $("#editlname").val(),
    birthDate: $("#editbirth").val(),
    contact: $("#editcontact").val(),
    email: $("#editemail").val(),
    action:"edit"},
// data: $("form").serialize()+"&action=insert",
success: function(resp){
    tempId=0;
    console.log(resp);
    $("#editform")[0].reset();
    $("#editmod").modal('hide');
    showALLUsers();
 
}
    });});

 });

 
