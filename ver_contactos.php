<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

  <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css">
</head>

<body>
  <?require("layout/head.php")?>

  <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-12">
          <h1 class="mb-3">Mis contactos</h1>
        </div>
      </div>
      <div class="row" id="contacto_list">
        
        
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
    </div>
  </div>
  <div class="modal fade" id="modal_info">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Información de Contacto</h5> <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="mx-auto col-lg-12 col-md-12">
              <ul>
                <li class="mb-2">Nombre:&nbsp; <span id="nombres"></span></li>
                <li class="mb-2">Celular: <span id="celular"></span></li>
                <li class="mb-2">Correo:&nbsp; <span id="correo"></span></li>
                <li class="mb-2">Dirección:&nbsp; <span id="direccion"></span></li>
                <!-- <li class="mb-2">Otros: <span id="m_"></span></li> -->
              </ul>
            </div>
          </div>
        </div>
        <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script>
    
    $(document).ready(function() {
      verListado();
    });
    function verListado(){
      $.post('controller/gestionUsuariosController.php', {
        action: "getListContactos"
      }, function(res) {
        // console.log(res);
        $("#contacto_list").html("");
        for( i in res ){
          // console.log(res[i]);
          row ='<div class="col-lg-3 col-6 p-4"> '
              +'  <img class="img-fluid d-block mb-3 mx-auto '
              +'  rounded-circle" src="https://static.pingendo.com/img-placeholder-1.svg" '
              +'  width="100" alt="Card image cap">'
              +'  <h4> <b>'+res[i].con_fullname+'</b> </h4>'
              +'  <p>'+res[i].con_celular+'</p>'
              +'  <p class="mb-0"> <i>"'+res[i].correo+'"</i> </p>'
              +'  <a class="btn btn-primary" href="javascript:userInfo('+res[i].id_usuario+')">Ver mas</a>'
              +'</div>';
          $("#contacto_list").append(row);
        }
      },"json");
    }
    function userInfo(id){
      $.post("controller/gestionUsuariosController.php",{
        action:"info"
        ,idus: id
      },function(res){
        console.log(res);

        $("#nombres").html(res.con_fullname);
        $("#celular").html(res.con_celular);
        $("#correo").html(res.correo);
        $("#direccion").html(res.con_direccion);

        $("#modal_info").modal("show");
      },"json")
    }
  </script>
</body>
</html>