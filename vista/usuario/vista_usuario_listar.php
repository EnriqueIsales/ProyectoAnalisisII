<script type="text/javascript" src="../js/usuario.js?rev=<?php echo time(); ?>"></script>


<div class="col-md-12">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Bienvenido al contenido del usuario</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- Condenido -->
        <div class="card-body">

            <!-- div de busqueda -->
            <div class="form-group row">
                <div class="col-lg-10">
                    <div class="input-group">

                        <i class="btn btn-success">Buscar</i> <input type="text" class="global_filter form-control me-2" id="global_filter" placeholder="Ingresar datos a buscar">
                        <span class="input-group-addon"> </span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"> <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Registro</button>



                </div>

            </div>


            <table id="tabla_usuario" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Sexo</th>
                        <th>Estatus</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Sexo</th>
                        <th>Estatus</th>
                        <th>Accion</th>
                    </tr>
                </tfoot>
            </table>



        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<form autocomplete="false" onsubmit="return false">

    <div class="modal fade" id="modal_registro" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">

                    
                    <h4 class="modal-title"> <b> Registro de Usuarios</b></h4>
                    <button type="button" class="close" data-dismiss="modal"> &times; </button>
                </div>


                <div class="modal-body">

                    <div class="col-lg-12">
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" id="txt_usu" placeholder="Ingrese usuario"> <br>

                    </div>

                    <div class="col-lg-12">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="txt_email" placeholder="Ingrese email"> <br>
                            <label for="" id="emailOK" style="color:red"></label>
                            <input type="text" id="validar_email" hidden >
                    </div>

                    <div class="col-lg-12">
                        <label for="">Contraseña</label>
                        <input type="password" class="form-control" id="txt_con1" placeholder="Ingrese contraseña"><br>

                    </div>

                    <div class="col-lg-12">
                        <label for="">Repita la Contraseña</label>
                        <input type="password" class="form-control" id="txt_con2" placeholder="Repita la contraseña"><br>

                    </div>

                    <div class="col-lg-12">
                        <label for="">Sexo</label>
                        <select class="js-example-basic-single" name="state"  id="cbm_sexo" style="width:100%;" >
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                        </select> <br> <br>
                    </div>


                    <div class="col-lg-12">
                        <label for="">Rol</label>
                        <select class="js-example-basic-single" name="state" style="width:100%;" id="cbm_rol">

                        </select> <br> <br>
                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary"  onclick="Registrar_Usuario()" ><i class="fa fa-check"><b>&nbsp;Registrar</b></i>  </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"><b>&nbsp;Cerrar</b></i></button>
                </div>
            </div>
        </div>
    </div>

</form>


<!-- Formulario para editar-->
<form autocomplete="false" onsubmit="return false">

    <div class="modal fade" id="modal_editar" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal"> &times; </button>
                    <h4 class="modal-title"> <b> Editar datos del Usuarios</b></h4>
                </div>


                <div class="modal-body">

                    <div class="col-lg-12">
                        <input type="text" id="txtidusuario" hidden>
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" id="txt_usu_editar" placeholder="Ingrese usuario" disabled> <br>

                    </div>
                    <div class="col-lg-12">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="txt_email_editar" placeholder="Ingrese email"> <br>
                            <label for="" id="emailOK_editar" style="color:red"></label>
                            <input type="text" id="validar_email_editar" hidden >
                    </div>


                    <div class="col-lg-12">
                        <label for="">Sexo</label>
                        <select class="js-example-basic-single" name="state"  id="cbm_sexo_editar" style="width:100%;" >
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                        </select> <br> <br>
                    </div>


                    <div class="col-lg-12">
                        <label for="">Rol</label>
                        <select class="js-example-basic-single" name="state" style="width:100%;" id="cbm_rol_editar">

                        </select> <br> <br>
                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary"  onclick="Modificar_Usuario()" ><i class="fa fa-check"><b>&nbsp;Modificar</b></i>  </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"><b>&nbsp;Cerrar</b></i></button>
                </div>
            </div>
        </div>
    </div>

</form>



<script>
    $(document).ready(function() {
        listar_usuario();
        $('.js-example-basic-single').select2();
        listar_combo_rol();
        $("#modal_registro").on('shown.bs.modal', function() {
            $("#txt_usu").focus();
        })

    });

    document.getElementById('txt_email').addEventListener('input', function(){
        campo=event.target;
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if(emailRegex.test(campo.value)){
            $(this).css("border","");
            $("#emailOK").html("");
            $("#validar_email").val("Correcto");
        }else{
            $(this).css("border","1px solid red");
            $("#emailOK").html("Email Incorrecto");
            $("#validar_email").val("incorrecto");
        }
    });


    document.getElementById('txt_email_editar').addEventListener('input', function(){
        campo=event.target;
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if(emailRegex.test(campo.value)){
            $(this).css("border","");
            $("#emailOK_editar").html("");
            $("#validar_email_editar").val("Correcto");
        }else{
            $(this).css("border","1px solid red");
            $("#emailOK_editar").html("Email Incorrecto");
            $("#validar_email_editar").val("incorrecto");
        }
    });






</script>