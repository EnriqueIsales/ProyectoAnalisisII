<?php
session_start();
if (!isset($_SESSION['S_IDUSUARIO'])) {
    header('Location: ../vista/login.php');
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clinica</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plantilla/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plantilla/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">


    <!-- Theme style -->
    <link rel="stylesheet" href="../plantilla/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plantilla/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plantilla/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plantilla/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="../plantilla/plugins/DataTables/datatables.min.css">
    <link rel="stylesheet" href="../plantilla/plugins/select2/select2.min.css">





</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- 

  Preloader 

  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Inicio</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">





                <!--boton de Cerrar session-->
                <li><a href="../controlador/usuario/controlador_cerrar_session.php"
                        class=" btn btn-warning btn-app-flat">Salir&nbsp;&nbsp; <i class="fa fa-window-close"
                            aria-hidden="true"></i> </a>
                </li>







                <!-- Configuraciones -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-cog"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Opciones</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> Opcion 1
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" onclick="AbrirModalEditarContra()" class="dropdown-item btn btn-light btn-app-flat">
                            <i class="fas fa-edit"></i>&nbsp; editar contraseña
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> Opcion 3
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>

                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>


























                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Clinica S.A</span>
            </a>




            <!-- Sidebar -->
            <div class="sidebar">





                <!-- Sidebar user panel (optional) -->
                <!-- -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
                    <div class="image">
                        <img id="img_nav" class="img-circle elevation-2" alt="User Image">
                    </div>

                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['S_USER']; ?></a>
                    </div>

                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Inicio
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a onclick="cargar_contenido('contenido_principal','usuario/vista_usuario_listar.php')"
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Usuario

                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a onclick="cargar_contenido('contenido_principal','procedimiento/vista_procedimiento_listar.php')"
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Procedimiento

                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a onclick="cargar_contenido('contenido_principal','insumo/vista_insumo_listar.php')"
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Insumos

                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a onclick="cargar_contenido('contenido_principal','medico/vista_medico_listar.php')"
                                class="nav-link">
                                <i class="nav-icon fa fa-user-md"></i>
                                <p>
                                    Medico

                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Pacientes
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista de pacientes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>pagos</p>
                                    </a>
                                </li>
                            </ul>

                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                                <p>
                                    Citas
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista de Citas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agregar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Hoy</p>
                                    </a>
                                </li>
                            </ul>

                        </li>







                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-medkit" aria-hidden="true"></i>
                                <p>
                                    Medicina
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a onclick="cargar_contenido('contenido_principal','medicamento/vista_medicamento_listar.php')"
                                        class="nav-link">
                                        <i class="fa fa-plus-square"></i>
                                        <p>
                                            Medicamentos

                                        </p>
                                    </a>

                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-heartbeat" aria-hidden="true"></i>
                                <p>
                                    Farmacia
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista de ventas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agregar Farmacia</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Gastos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Gastos Categoria</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pagos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-address-card" aria-hidden="true"></i>
                                <p>
                                    Prescripcion
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                        </li>

                        <li class="nav-header">RECURSOS</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                                <p>
                                    Recursos Humanos
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                
                            <li class="nav-item">
                                    <a onclick="cargar_contenido('contenido_principal','especialidad/vista_especialidad_listar.php')"
                                        class="nav-link">
                                        <i class="fa fa-gratipay" aria-hidden="true"></i>
                                        <p>
                                            Especialidades

                                        </p>
                                    </a>

                                </li>
                                
                            </ul>

                        </li>



                        <li class="nav-header">OPCIONES</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-cog" aria-hidden="true"></i>
                                <p>
                                    Configuracion
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Empresa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contraseña</p>
                                    </a>
                                </li>
                            </ul>

                        </li>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">/</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!--********************* Contenido dentro del dashboard *-***************************-->
            <section class="content">
                <input type="text" id="txtidprincipal" value="<?php echo $_SESSION['S_IDUSUARIO'] ?>" hidden>
                <input type="text" id="usuarioprincipal" value="<?php echo $_SESSION['S_USER'] ?>" hidden>

                <div class="row" id="contenido_principal">

                    <div class="col-md-12">
                        <div class="card card-danger">

                            <div class="card-header">
                                <h3 class="card-title">Bienvenido al contenido principal</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                            class="fas fa-expand"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                Contenido Principal
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>


                </div>


            </section>



            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong> Proyecto de Desarrollo WEB</strong>
            UMG Zacapa.
            <div class="float-right d-none d-sm-inline-block">
                <b>Enrique Isales</b>
                1190-17-6929
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <div class="modal fade" id="modal_editar_contra" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal"> &times; </button>
                    <h4 class="modal-title"> <b> Modificar Contraseña</b></h4>
                </div>


                <div class="modal-body">

                    <div class="col-lg-12">
                        <input type="text" id="txtcontra_bd" hidden>
                        <label for="">Contraseña Actual</label>
                        <input type="text" class="form-control" id="txtcontraactual_editar"
                            placeholder="Contraseña Actual"> <br>
                    </div>

                    <div class="col-lg-12">
                        <label for="">Nueva Contraseña </label>
                        <input type="password" class="form-control" id="txtcontranu_editar"
                            placeholder="Nueva Contraseña"> <br>
                    </div>

                    <div class="col-lg-12">
                        <label for="">Repetir Contraseña </label>
                        <input type="password" class="form-control" id="txtcontrare_editar"
                            placeholder="Repetir Contraseña"> <br>
                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="Editar_Contra()"><i
                            class="fa fa-check"><b>&nbsp;Editar</b></i> </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"
                            aria-hidden="true"><b>&nbsp;Cerrar</b></i></button>
                </div>
            </div>
        </div>
    </div>












    <!-- jQuery -->
    <script src="../plantilla/plugins/jquery/jquery.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plantilla/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    var idioma_espanol = {
        select: {
            rows: "%d fila seleccionada"
        },
        "sProcessing": "Procesando.....",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encuentran resultados",
        "sEmptyTable": "Ning&uacute;n dato disponible en eta tabla",
        "sInfo": "Registros del (_START_ al _END_) total de _TOTAL_ registros",
        "sInfoEmpty": "Registros del (0 al 0) total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPosFix": "",
        "sSearch": "Busccar",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "<b>No se encontraron datos</b>",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Ultimo",
            "sNext": "Siguiente",
            "s": "",
            "sPrevious": "Anterior"


        },
        "oAria": {
            "sSortAscending": ":Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ":Activar para ordenar la columna de manera descendente"
        }
    }











    function cargar_contenido(contenedor, contenido) {
        $("#" + contenedor).load(contenido);

    }



    $.widget.bridge('uibutton', $.ui.button)






    function soloNumeros(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla == 8) {
            return true;
        }
        // Patron de entrada, en este caso solo acepta numeros
        patron = /[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }

    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = "8-37-39-46";
        tecla_especial = false
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            return false;
        }
    }
    </script>





















    <!-- Bootstrap 4 -->
    <script src="../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../plantilla/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../plantilla/plugins/sparklines/sparkline.js"></script>





    <!-- jQuery Knob Chart -->
    <script src="../plantilla/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../plantilla/plugins/moment/moment.min.js"></script>
    <script src="../plantilla/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plantilla/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../plantilla/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plantilla/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../plantilla/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../plantilla/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../plantilla/dist/js/pages/dashboard.js"></script>

    <script src="../plantilla/plugins/DataTables/datatables.min.js"></script>
    <script src="../plantilla/plugins/select2/select2.min.js"></script>

    <script src="../plantilla/plugins/sweetalert2/sweetalert2.js"></script>
    <script src="../js/usuario.js"></script>




    <script>
    TraerDatosUsuario();
    </script>
    <!-- AbrirModalEditarContra(); -->



</body>

</html>