<?
  
?>
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
        <div class="mx-auto col-lg-6 col-10">
          <h1>Registro</h1>
          <p class="mb-3">Debe completar todos los campos de registro</p>
          <form class="text-left" id="form_registro">
            <div class="form-group"> <label for="con_fullname">Nombres completos</label> <input type="text" class="form-control" id="con_fullname" required> </div>
            <div class="form-group"> <label for="con_celular">Celular</label> <input type="text" class="form-control" id="con_celular"> </div>
            <div class="form-row">
              <div class="form-group col-md-6"> <label for="con_edad">EDAD</label> <input type="text" class="form-control" id="con_edad"> </div>
              <div class="form-group col-md-6"> <label for="con_sexo">SEXO</label>
                <select class="form-control" id="con_sexo">
                  <option value="">Seleccione...</option>
                  <option value="hombre">Hombre</option>
                  <option value="mujer">Mujer</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6"> <label for="correo">Correo</label> <input type="email" class="form-control" id="correo" placeholder="ejemplo@gmail.com" required> </div>
              <div class="form-group col-md-6"> <label for="password">Contraseña</label> <input type="password" class="form-control" id="password" placeholder="••••" required> </div>
            </div>

            <div class="form-group"> <label for="con_direccion">Dirección</label> <input type="email" class="form-control" id="con_direccion"> </div>
            <div class="form-group">
              <div class="form-check"> <input class="form-check-input" type="checkbox" id="form21" value="on" checked="checked"> <label class="form-check-label" for="form21">Acepto los terminos y condiciones</label> </div>
            </div> 
            <button type="submit" class="btn btn-primary">Unirme</button>
            <button type="reset" class="btn btn-primary">Limpiar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      //Action al terminar de cargar la pagina
      $("#form_registro").submit(function(event) {
        event.preventDefault();
        registrar();
      });
    });
    function registrar(){
      $.post("controller/gestionUsuariosController.php",{
        action: "registrar"
        ,con_fullname: $("#con_fullname").val()
        ,con_celular: $("#con_celular").val()
        ,con_direccion: $("#con_direccion").val()
        ,con_edad: $("#con_edad").val()
        ,con_sexo: $("#con_sexo").val()
        ,correo: $("#correo").val()
        ,password: $("#password").val()
      },function(res){
        console.log(res);


      },"json");
    }
  </script>
</body>
</html>