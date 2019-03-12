<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css">
</head>

<body>
  <div class="py-5 text-center" style="background-image: url('https://static.pingendo.com/cover-bubble-dark.svg');background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-6 col-10 bg-white p-5">
          <h1 class="mb-4">Acceder</h1>
          <span>
            <div class="form-group"> <input type="email" class="form-control" placeholder="Enter email" id="correo" value="luitor@gmail.com"> </div>
            <div class="form-group mb-3"> <input type="password" class="form-control" placeholder="Password" id="password"> <small class="form-text text-muted text-right">
                <a href="#"> Recover password</a>
              </small> </div> <button type="submit" class="btn btn-primary" onclick="logear()">Ingresar</button>
          </span>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      
    });
    function logear(){
      $.post("controller/accesosController.php",{
        action: "logear"
        ,correo: $("#correo").val()
        ,password: $("#password").val()
      },function(res){
        console.log(res);
        if(!res.success){
          alert(res.message);
          return;
        }
        window.location.href="ver_contactos.php";

      },"json");
    }
  </script>
</body>
</html>