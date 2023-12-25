<html>

    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- @import bootstrap 5 css file-->
         <link rel="stylesheet" href="bootstrap-5.0.0-dist/css/bootstrap.min.css">
<!-- @import DATA table css file-->
        <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> 
<!-- jQuery library -->
<script src="js/jquery.min.js"></script>
<!-- Popper JS -->
<script src="js/popper.min.js"></script>



        </head>
        <body>
            <section class="postinfo m-5">

<article >
<div class="row" > 
<hr class="my-1" >
<div class="table-responsive col-md-8 col-xl-6 col-sm-10 my-5" > 

    <table class="mb-0 table table-hover" id="tab">
        <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
        </tr>
                <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>


</div> </div>
</article>


</section>


<script>
    $(document).ready(function(){
        $("#tab").DataTable();
    });
    
</script>
<!--!start scripts links --> 

 <!-- @import bootstrap 5 js file-->
<script src="bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
<!-- @import DATA table js file-->
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<!-- !end scripts links --> 

        </body>


</html>