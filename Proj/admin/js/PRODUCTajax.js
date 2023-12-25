$(document).ready(function(){
    showPROD();


    function showPROD(){
$.ajax({
    url:'./PRODaction.php',
    type:'POST',
    data:{action:"view"},
    success:function(data){

       // console.log(data);

        
        result = jQuery.parseJSON( data);
        // console.log(result);
  datahtml=('<table class="table table-striped" id="tabS"><thead><tr><th >Ref.</th><th >Category</th><th class="col-sm-1" >Qte</th><th>Production price</th><th>Selling price</th> <th class="col-sm-1">Add new Qte</th> <th class="col-sm-1">Change Price</th><th >action</th> </tr></thead><tbody >');

         $.each( result, function( index, element ){
          
            Ref=element['ref'];
            Cat=element['Categorie'];  
             Qte=element['QteStock'];
             PP=element['PrixProduction'];
            PV=element['PrixVente'];

            datahtml+=('<tr><th scope="row">'+Ref+'</th><td >'+Cat+'</td><td >'+Qte+'</td><td>'+PP+'</td><td>'+PV+'</td><td class="" style="justify-item :center"><button type="button" id="'+Ref+'" class="btn btn-primary px-2 py-0 addQte" >Add</button></td><td><button type="button" id="'+Ref+'" class="btn btn-outline-dark px-2 py-0 ChPrice">Change</button></td> ');
            datahtml+='<td class=""> <a href="#" class="text-success infoProdlink " id="Prod'+Ref+'" ><i class="fa fa-info-circle fa-lg "  aria-hidden="true"></i></a>&nbsp;';
            datahtml+='<a href="#" class="text-primary editProdbtn "id="Prod'+Ref+'" ><i class="fa fa-edit fa-lg" aria-hidden="true" title="Copy to use edit">&nbsp;</i></a>';
            datahtml+='<a href="#" class="text-danger trashProdbtn  "id="Prod'+Ref+'" ><i class="fa fa-trash fa-lg" aria-hidden="true" title="Copy to use edit"></i></a></td> </tr>';

     });

     datahtml+='</thead><tbody >';
$("#showprod").html(datahtml);

$("#tabS").DataTable({

dom: 'lBfrtip',

buttons: [ {
    extend: 'excel',
    text: '<i class="fa fa-fw" aria-hidden="true" title="Export it!"></i>&nbsp;&nbsp;Export to excel',
     className: 'btn btn-success my-2 glyphicon glyphicon-list-alt',
    title: 'Products List'
}, {
    extend: 'pdf',
    text: '<i class="fa fa-file-pdf-o" aria-hidden="true" title="Export it!"></i>&nbsp;&nbsp;Export to PDF',
    className: 'btn btn-danger my-2 glyphicon glyphicon-list-alt',
    title: 'Products List'
}, 
{
    extend: 'print',
    text: '<i class="fa fa-print" aria-hidden="true" title="Export it!"></i>&nbsp;&nbsp;Print',
    className: 'btn btn-secondary my-2 ',
    title: 'Products List'
}
],
"lengthMenu": [5,10,25,50,100],   
});
 }}) }

// insert a new product


// insert
$("#ConfirmInsertProduct").click(function(e){
    if($(".addProdform")[0].checkValidity()){
        e.preventDefault();
        $.ajax({
    url:"PRODaction.php",
    type:'POST',

    data: {
        Cat:$('#setCateg').val(),
        Qte: Math.abs($("#setQTE").val()) ,
        PP:  Math.abs($("#setPP").val()) ,
        PV:  Math.abs($("#setPV").val()) ,
       // File : $("#setFile").val(),
       IMG: $("setIMGPROD").html(),
        action:"insert"},

    success:function(resp){
     //  alert(resp);
        showPROD();
        $(".addProdform")[0].reset();
        $("#addProd").modal('hide');
        
         
        swal(
      'Product inserted!',
      '...',
      'success'
    );
   
    }
        })
    }
    });

//begin update storage

 $('body').on('click','.addQte',function(e){

e.preventDefault();
ref=$(this).attr('id');
  
      
      $("#RefQT").val(ref);   
$("#QTEE").modal('show');


 });
//  $('#ADDQTE').click(function(e){

//  })

 $('body').on('click','#ADDQTE',function(e){
// e.preventDefault();
 ref=$("#RefQT").val();
 QTE=Math.abs($("#newQTE").val()); 
//  alert(REF);
$.ajax({
    url:'./PRODaction.php',
    type:'POST',
    data:{REF:ref,
        QTE:QTE,
        action:"UpdateQTE"},
  success: function(bol){
//    Sweet Alert
         showPROD();
        $("#QTEform")[0].reset();
      $("#QTEE").modal('hide');
      
  }
});
})

//end update storage


//begin update storage

$('body').on('click','.ChPrice',function(e){

    e.preventDefault();
    ref=$(this).attr('id');
    

          $("#Refprice").val(ref);   
    $("#PriceMod").modal('show');
    
    
     });
    //  $('#ADDQTE').click(function(e){
    
    //  })
    
     $('body').on('click','#ChangePrice',function(e){
    // e.preventDefault();
     ref=$("#Refprice").val();
    
     PP=Math.abs($("#newPP").val()); 
     PV=Math.abs($("#newPV").val()); 
    //  alert(REF);
    $.ajax({
        url:'./PRODaction.php',
        type:'POST',
        data:{REF:ref,
            PP:PP,PV:PV,
            action:"UpdatePrice"},
      success: function(bol){
    //    Sweet Alert
             showPROD();
            $("#PRICEform")[0].reset();
          $("#PriceMod").modal('hide');
          
      }
    });
    })
    
    //end update storage
    

    //delete a product

    $("body").on("click",".trashProdbtn",function(e){
      
        e.preventDefault();
        Ref= $(this).attr('id');
        //console.log(Ref);
       
        $("#DeleteProd").modal("show");
   $("#itg").click(function(o){
        o.preventDefault();
      //  console.log("1 deleted well");
        $.ajax({
    url:"./PRODaction.php",
    type:"POST",
    data:{REF:Ref
        ,action:"remove"},
    success:function(resp){
    alert(resp);
    showPROD();
    $("#DeleteProd").modal('hide');
                       }
    });
    })
    
    
    
    });

// edit a Product

$("body").on("click",".editProdbtn",function(e){
    //get id user
    idel='#';
    idel+= $(this).attr('id');
    //console.log(idel);
    // move to the parent row tr who got all informations
    info=$($(idel).parent()).parent();
    //console.log(info);
    //get all data user and initialze array values
    var data = {};
    info.children().each( function( index, element ){
      console.log(1);
      data[index]=$.trim($(this).text());
  });
  console.log(data)
  idel='';
  $("#refProductt").val(data[0]);
 $("#editCateg").val(data[1]);
 $("#editQTE").val(data[2]);
 $("#editPP").val(data[3]);
 $("#editPV").val(data[4]);
//  $("#editFile").val(datauser[t]);
 
 $("#editProd").modal('show');
 });
 
 
 $("body").on("click","#ConfirmEditProduct",function(e){
 
     e.preventDefault();
     $.ajax({
        url:"PRODaction.php",
        type:'POST',
    
        data: {
            REF: $('#refProductt').val(),
            Cat:$('#editCateg').val(),
            Qte: Math.abs($("#editQTE").val()) ,
            PP:  Math.abs($("#editPP").val()) ,
            PV:  Math.abs($("#editPV").val()) ,
           // File : $("#editFile").val(),
          //  IMG: $("#import").val(),
            action:"edit"},
    
        success:function(resp){
     
     alert(resp);
     showPROD();
     $(".editProdform")[0].reset();
     $("#editProd").modal('hide');
    
  
 }
     });});
 
// INFO MODAL 
$("body").on("click",".infoProdlink",function(e){
    //get id user

  idel='#';
  idel+= $(this).attr('id');
  //console.log(idel);
  // move to the parent row tr who got all informations
  info=$($(idel).parent()).parent();
  //console.log(info);
  //get all data user and initialze array values
  var dataSPAM = {};
  info.children().each( function( index, element ){
   
dataSPAM[index]=$.trim($(this).text());

});
$.ajax({
    url:'PRODaction.php',
    type:'POST',
    data:{REF:dataSPAM[0],action:'getIMG'},
    success :function(img){
        //console.log(img);
       
        $('#imginfoPROD').html(img);
    }
})

$('#refprodinfo').text(dataSPAM[0]);
$('#Catprodinfo').text(dataSPAM[1]);
$('#Qteprodinfo').text(dataSPAM[2]);
$('#PPprodinfo').text(dataSPAM[3]);
$('#PVprodinfo').text(dataSPAM[4]);
$('#infoProdmod').modal('show');

});

$('body').on('click',"#restinfoPROD",function(e){
    $('#refprodinfo').text('');
    $('#Catprodinfo').text('');
    $('#Qteprodinfo').text('');
    $('#PPprodinfo').text('');
    $('#PVprodinfo').text(''); 
    $('#infoProdmod').modal('hide');
})

})