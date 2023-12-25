

<section class=" postinfo col-xl-10 p-5" id="style-1" >
<article class="card bg-white  p-5">
    
  <h1 class="display-4">PRODUCT <span style=" letter-spacing:.2px; font-weight: bold ;">AREA</span></h1>
  <div class="d-flex justify-content-center p-5"><img src="Product1.png" class="img-fluid" ></div>
<div class="row" > 
<hr class="my-2" >
<div class="my-4 " style=" float:right; clear:both;">
<button type="button" id="refTab" class="btn btn-outline-primary">refresh table</button>
<button type="button" id="insertprod" class="mx-2 btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#addProd" ><b>add a new product</b></button>
</div>
<div class="table-responsive col-md-12 col-xl-12 col-sm-12  " id="showprod" > 


</div> 
</div>
</article>



<!-- Models -->
<!-- insertmodel -->

<!-- Modal -->
<div class="modal fade  " id="addProd" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="mdu"> <i class="fa fa-fw text-white" aria-hidden="true" title="Add new Prod"></i>&nbsp;&nbsp;Add a new product</h5>
        <button type="button" class=" btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-4">
       
      <form class="addProdform" method="POST" action="">
      
                        <div class="position-relative row form-group mt-4">
                             <label class="col-md-4 col-form-label lead ">Category</label>
                               <div class="col-md-8"> <input name="Category" type="text" id="setCateg" placeholder="Black pencil HB2"  class="form-control"></div>
                        </div>
                        
                             <div class="position-relative row form-group mt-2">
                           <label class="col-md-4 col-form-label lead ">STORAGE</label>
                                  <div class="col-md-8"> <input name="QTE" type="number" id="setQTE" placeholder="100."  class="form-control"></div>
                              </div>    
                              <div class="position-relative row form-group mt-2">
      <label class="col-sm-4 col-form-label lead">Set a Prod PRICE</label>
      <div class="col-sm-8">
      <input name="PP" type="number" id="setPP" placeholder="99.00"  class="form-control"></div>
      </div><div class="position-relative row form-group mt-2">
      <label class="col-sm-4 col-form-label lead">Set a buy PRICE</label>
      <div class="col-sm-8">
      <input name="PV" type="number" id="setPV" placeholder="999.99"  class="form-control"></div></div>
       
                                            <div class="position-relative row form-group mt-4"><label for="File" class="col-sm-4 col-form-label lead">Import</label>
                                                <div class="col-sm-8"><input name="file" id="setFile" type="file" class="form-control-file" accept="image/*">
                                                    <small class="form-text text-muted">chose some image. you look so tired today!</small>
                                                </div>
                                            </div>
                                            
                                            
                                           
                                        </form>
                                        <div class="position-relative row form-group mt-0"><label class="col-md-4 col-form-label"></label>
  <div class="col-md-8"><button id="ConfirmInsertProduct" class="btn btn-danger px-3 col-12 col-md-12" >Confirm</button></div></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
   
      </div>
    </div>
  </div>
</div>


<!-- ADD A NEW STORAGE Modal -->
<div class="modal fade  " id="QTEE" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-center text-white" id="mdu"><i class="fa fa-fw" aria-hidden="true" title="refresh"></i>&nbsp;ADD QTE</h5>
        <button type="button" class=" btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-3 py-3" id="QTEbod">
      
   
 <div class ="row" >
 <form id ="QTEform" method="POST" action="">
 <div class="position-relative row form-group mt-4"> 
 <label class="col-md-4 col-form-label">Ref.</label>
  <div class="col-md-8">   <input name="QTE" type="number" id="RefQT"  class="form-control col-sm-2" readonly></div>
  </div><div class="position-relative row form-group mt-4">
  <label class="col-md-4 col-form-label "><b>add a new STORAGE</b></label>
  <div class="col-md-8"> <input name="QTE" type="number" id="newQTE" placeholder="STORAGE"  class="form-control"></div>
  </div></div></form><div class="position-relative row form-group mt-0"><label class="col-md-4 col-form-label"></label>
  <div class="col-md-8"><button id="ADDQTE" class="btn btn-primary px-3" >ADD</button></div></div>
   
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>







<!-- CHange Price MODAL -->
<div class="modal fade " id="PriceMod" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-center text-white" id="mdu"><i class="fa fa-fw" aria-hidden="true" title="refresh"></i>&nbsp;Table refreshed</h5>
        <button type="button" class=" btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-3 py-3" id="priceBod">

      
     <div class ="row" ><form id ="PRICEform" method="POST" >
     <div class="position-relative row form-group mt-2">
      <label class="col-md-4 col-form-label">Ref.</label> 
      <div class="col-md-8">   <input name="QTE" type="number" id="Refprice"  class="form-control col-sm-4" readonly>
      </div></div><div class="position-relative row form-group mt-2">
      <label class="col-sm-4 col-form-label">Set a Prod PRICE</label>
      <div class="col-sm-8">
      <input name="PP" type="number" id="newPP" placeholder="set a new Price"  class="form-control"></div>
      </div><div class="position-relative row form-group mt-2">
      <label class="col-sm-4 col-form-label">Set a buy PRICE</label>
      <div class="col-sm-8">
      <input name="PV" type="number" id="newPV" placeholder="set a new price"  class="form-control"></div></div>
       </div></form><div class="position-relative row form-group ">
       <label class="col-sm-4 col-form-label"></label>
       <div class="col-sm-8"><button class="btn btn-primary" id="ChangePrice">Change it!</button>
       </div></div>
     
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>



<!-- Delete Modal -->
<article class="modal fade Modal-T- " id="DeleteProd" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
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
             <button type="button" class="btn btn-danger" id="itg"><i class="fa fa-trash fa-lg" aria-hidden="true" title="Copy to use edit" data-bs-toggle="modal" data-bs-target="#Delete"></i>&nbsp;Remove that user</button> 

      </div>
    </div>
  </div>
</article>



<!-- Refresh TAble -->
<div class="modal fade   " id="refrTab" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
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

<!-- editProduct -->
<div class="modal fade  " id="editProd" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="mdu"> <i class="fa fa-fw text-white" aria-hidden="true" title="Add new Prod"></i>&nbsp;&nbsp;edit this product</h5>
        <button type="button" class=" btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-4">
       
      <div class="row justify-centre my-4 text-primary" title="Product"><i class="fa fa-edit fa-lg text-center" style="font-size:120px"id="infobtn" aria-hidden="true"></i></div>'
      
      <form class="editProdform" method="POST" action="">
      
      <div class="position-relative row form-group mt-2">
      <label class="col-md-4 col-form-label">Ref.</label> 
      <div class="col-md-8">   <input name="QTE" type="number" id="refProductt"  class="form-control col-sm-4" readonly>
      </div></div>
                        <div class="position-relative row form-group mt-4">
                             <label class="col-md-4 col-form-label lead ">Category</label>
                               <div class="col-md-8"> <input name="Category" type="text" id="editCateg" placeholder="Black pencil HB2"  class="form-control"></div>
                        </div>
                        
                             <div class="position-relative row form-group mt-2">
                           <label class="col-md-4 col-form-label lead ">STORAGE</label>
                                  <div class="col-md-8"> <input name="QTE" type="number" id="editQTE" placeholder="100."  class="form-control"></div>
                              </div>    
                              <div class="position-relative row form-group mt-2">
      <label class="col-sm-4 col-form-label lead">Set a Prod PRICE</label>
      <div class="col-sm-8">
      <input name="PP" type="number" id="editPP" placeholder="99.00"  class="form-control"></div>
      </div><div class="position-relative row form-group mt-2">
      <label class="col-sm-4 col-form-label lead">Set a buy PRICE</label>
      <div class="col-sm-8">
      <input name="PV" type="number" id="editPV" placeholder="999.99"  class="form-control"></div></div>
       
                                            <div class="position-relative row form-group mt-4"><label for="File" class="col-sm-4 col-form-label lead">Import</label>
                                                <div class="col-sm-8"><input name="img" id="editIMGprod" type="file" accept="image/*" class="form-control-file">
                                               
                                                    <small class="form-text text-muted">chose some image. you look so tired today!</small>
                                                </div>
                                            </div>
                                            
                                            
                                           
                                        </form>
                                        <div class="position-relative row form-group mt-0"><label class="col-md-4 col-form-label"></label>
  <div class="col-md-8"><button id="ConfirmEditProduct" class="btn btn-primary px-3 col-12 col-md-12" >edit</button></div></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
   
      </div>
    </div>
  </div>
</div>


<!-- Info Modal -->

<div class="modal fade  Modal-T- " id="infoProdmod" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-center text-white" id="mdu">Product information </h5>
        <button type="button" class=" btn-close bg-white" id="restinfoPROD" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-3 py-3" id="infomodbody" >
   

     <div class="row p-4">


<div class="row justify-centre mb-5 mt-3 text-dark text-center"><div id="imginfoPROD">IMG here!</div></div>
    
    <hr class="my-2" >
     <div class="position-relative row form-group"><label class="col-sm-6 col-form-label lead">Ref - Category</label><div class="col-sm-6 my-1"><b><span id="refprodinfo"></span>&nbsp;-&nbsp;<span id="Catprodinfo"></span></b></div></div>
    <hr class="my-2" >
    <div class="position-relative row form-group"><label class="col-sm-6 col-form-label lead">Quantity</label><div class="col-sm-6 my-1"><b><span id="Qteprodinfo"></span></b></div></div>
    <hr class="my-2" >
    <div class="position-relative row form-group"><div class="col-sm-6 col-form-label "><label class="lead">Production price </label>&nbsp;&nbsp;&nbsp;<b><span id="PPprodinfo"></span>&nbsp;Da</b></div><div class="col-sm-6 my-1"><label class="lead">Selling price </label>&nbsp;&nbsp;&nbsp;<b><span id="PVprodinfo"></span>&nbsp;Da</b></div></div>
  
   
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" id="restinfoPROD">Close</button>
      </div>
    </div>
  </div>
</div>







<!--!start scripts links --> 
<!-- @import jquery Ajax User for database  js file-->
<script src="js/PRODUCTajax.js"></script>



</section>