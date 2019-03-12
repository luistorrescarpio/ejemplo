<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/mytheme.css">

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
  <?require_once("layout/head.php")?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="list-group contacto_list">
            
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="btn-group">
          <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Dropdown </button>
          <div class="dropdown-menu"> <a class="dropdown-item" href="#">Action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </div>
  <!-- Button trigger modal -->
<button onclick="search('con_fullname')" class="btn btn-primary btn-sm">
  Nombres
</button>

<button onclick="search('con_celular')" class="btn btn-primary btn-sm">
  Telefonos
</button>

<button onclick="search('con_fech_register')" class="btn btn-primary btn-sm">
  Fechas
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="list-group modal_contacto_list">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="py-5"><div class="container"><div class="row"><div class="col-md-12"><div class="card">
    <div class="card-header"> Header </div>
    <div class="card-body">
      <h4>Title</h4>
      <p>Some quick example text to build on the card title .</p>
    </div>
  </div></div></div></div></div>
<script>
  $(document).ready(function() {
    $.post('consulta.php', {
      action: "search"
    }, function(res) {
      console.log(res);
      for( i in res ){
        row = '<a href="#" class="list-group-item list-group-item-action"> '+res[i].con_fullname+' '+res[i].con_celular+'</a>';
        $(".contacto_list").append(row);
      }
    },"json");
  });

  function search(opcion){
      $.post('consulta.php', {
        action: 'viewCol'
        ,columna: opcion
      }, function(datos) {
        console.log(datos);
        res = datos.rows;
        $(".modal_contacto_list").html("");
        for( i in res ){
          row = '<a href="#" class="list-group-item list-group-item-action">'+res[i][opcion]+'</a>';
          $(".modal_contacto_list").append(row);
          $("#exampleModal").modal("show");
        }
      },"json");
  }
</script>
</body>
</html>