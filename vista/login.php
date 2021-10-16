<?php 
session_start();
if(isset($_SESSION['S_IDUSUARIO'])){
  header('Location: ../vista/index.php');
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Clinica</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../plantilla/dist/css/adminlte.min.css">



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    body {
  height: 400px;
  background-image: url("../assets/img/banner1.jpg");
  background-size: cover;
  background-repeat:no-repeat;
  background-position: center center;
}
  </style>

  
</head>

<body class="hold-transition login-page" >

  <div class="login-box" >
  

    <!-- /.login-logo -->
    <div class="card card-outline card-primary  ">
      <div class="card-header text-center">
        <a href="../vista/index.php" class="h1"><b>Clinica</b>S.A</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Iniciar sesión</p>

        <form action="#" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Usuario" id="txt_usu"  autocomplete="new-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="contraseña" id="txt_con">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Recuerdame
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-success " onclick="VerificarUsuario()">Iniciar Sesión</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mt-2 mb-3">
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Iniciar sesión con Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Iniciar sesión con Google+
          </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="#" onclick="AbrirModalRestablecer()">Olvide mi contraseña</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Registrarse</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <div class="modal fade" id="modal_restablecer_contra" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="text-aling:left;">

                    
                    <h4 class="modal-title"> <b> Restablecer Contraseña</b></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


                <div class="modal-body">

                    <div class="col-lg-12">
                        <label for=""><b>Ingrese Correo del Usuario para Restablecer la contraseña</b></label>
                        <input type="text" class="form-control" id="txt_email" placeholder="Ingrese Email" > <br>

                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary"  onclick="Restablecer_contra()" ><i class="fa fa-check"><b>&nbsp;Enviar</b></i>  </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"><b>&nbsp;Cerrar</b></i></button>
                </div>
            </div>
        </div>
    </div>



 
  <!-- jQuery -->
  <script src="../plantilla/plugins/jquery/jquery.js"></script>

  <!-- Bootstrap 4 -->
  <script src="../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../plantilla/dist/js/adminlte.min.js"></script>

  <script src="../js/usuario.js"></script>


  <script src="../assets/Sweetalert2/Sweetalert2.js"></script>
  



</body>

<script >
txt_usu.focus();


</script>





</html>