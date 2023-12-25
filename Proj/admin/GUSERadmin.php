


<section class=" postinfo bg-light col-sm-10" id="style-1" >
<article class="card bg-white  p-5">
    <h1 class="display-4">Users manager</h1>
   
<div class="row" > 
<hr class="my-1" >
<div style="float:right" >
<button type="button" id="refus" class="btn btn-outline-secondary">refresh table</button>
 <button class="my-3 mr-4 btn-transition btn btn-primary  " data-bs-toggle="modal" data-bs-target="#usdq"> <i class="fa fa-fw" aria-hidden="true" title="Add new Chef"></i>&nbsp;&nbsp;Insert new User </button>
</div>
<div class="table-responsive col-md-12 col-xl-12 col-sm-12  " id="showUsers" > 


</div> </div>
<div class="d-flex justify-content-center pt-5"><img src="users.PNG" class="img-fluid" ></div>

</article>

<!-- Models -->
<!-- insertmodel -->
<!-- Modal -->
<div class="modal fade Modal-T-  " id="Usdq" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="mdu"> <i class="fa fa-fw text-white" aria-hidden="true" title="Add new Chef"></i>&nbsp;&nbsp;Add new Chef</h5>
        <button type="button" class=" btn-close btn-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form class ="row" id ="addform" method="POST" action="">
       <div class="mt-2"><input name="fname" id="fname" placeholder="nom" type="text" class="form-control"></div>
       <!-- <div class="input-group"> <div class="input-group-prepend"><span class="input-group-text">@</span></div>
     <input placeholder="username" type="text" class="form-control"></div> -->
       <div class="mt-2"><input name="lname" id="lname" placeholder="prenom" type="text" class="form-control"></div>
       <div class="mt-2"><input name="birthDate" id="birth" placeholder="date de naicc" type="date" class="form-control"></div>
       <div class="mt-2"><input name="contact" id="contact" placeholder="contact" type="text" class="form-control"></div>
       <div class="mt-2"><input name="email" id="email" placeholder="exp121@gmail.com" type="text" class="form-control"></div>
       <div class="mt-4"><input name="Insert" type="submit" id="Insert" class="btn btn-danger form-control"></div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
   
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<article class="modal fade Modal-T- " id="Delete" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
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
</article>



<!-- Info Modal -->
<div class="modal fade Modal-T- " id="infomod" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-center text-white" id="mdu">UserInfo</h5>
        <button type="button" class=" btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-3 py-3" id="infomodbody" >
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
       <!-- <button type="button" class="btn btn-danger" id="removeit"><i class="fa fa-trash fa-lg" aria-hidden="true" title="Copy to use edit" data-bs-toggle="modal" data-bs-target="#Delete"></i>&nbsp;Remove that user</button>  -->
      </div>
    </div>
  </div>
</div>
<!-- edit Modal -->
<div class="modal fade Modal-T-" id="editmod" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
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
</div>



<!-- Refresh TAble -->
<div class="modal fade " id="RefUStab" tabindex="-1" aria-labelledby="mdu" aria-hidden="true">
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


<!--!start scripts links --> 
<!-- @import jquery Ajax User for database  js file-->
<script src="js/AjaxUserdb.js"></script>
<!-- @import SweetAlert2 -->
<script src="js/SweetAlert.min.js"></script>
 <!-- @import bootstrap 5 js file-->
 <script src="bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
<!-- @import DATA table js file-->
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<!-- !end scripts links --> 


</section>






