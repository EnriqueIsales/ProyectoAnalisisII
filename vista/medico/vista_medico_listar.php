<script type="text/javascript" src="../js/medico.js?rev=<?php echo time(); ?>"></script>


<div class="col-md-12">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Mantenimiento de Medico</h3>

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

                        <i class="btn btn-success">Buscar</i> <input type="text" class="global_filter form-control me-2"
                            id="global_filter" placeholder="Ingresar datos a buscar">
                        <span class="input-group-addon"> </span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"> <i
                            class="fa fa-plus" aria-hidden="true"></i> Nuevo Registro</button>



                </div>

            </div>


            <table id="tabla_medico" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Documento</th>
                        <th>Medico</th>
                        <th>No. Colegiatura</th>
                        <th>Especialidad</th>
                        <th>Sexo</th>
                        <th>Celular</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Documento</th>
                        <th>Medico</th>
                        <th>No. Colegiatura</th>
                        <th>Especialidad</th>
                        <th>Sexo</th>
                        <th>Celular</th>
                        <th>Acción</th>
                    </tr>
                </tfoot>
            </table>



        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

 <!-- registro-->

<div class="modal fade" id="modal_registro" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" style="text-align: center;"> <b> Registro de Medico</b></h4>
                <button type="button" class="close" data-dismiss="modal"> &times;</button>
            </div>


            <div class="modal-body">

                <div class="col-lg-12">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="txt_nombres" placeholder="Ingrese Nombre">
                        <br>
                </div>
                
                    <div class="col-lg-8">
                        <label for="">Primer Apellido</label>
                        <input type="text" class="form-control" id="txt_apepat" placeholder="Ingrese Primer Apellido"
                            maxlength="50" onkeypress="return soloLetras(event)">
                            <br>

                    </div>
                    <div class="col-lg-8">
                        <label for="">Segundo Apellido</label>
                        <input type="text" class="form-control" id="txt_apemat" placeholder="Ingrese Segundo apellido"
                            maxlength="50" onkeypress="return soloLetras(event)">
                            <br>
                    </div>
                
                <div class="col-lg-10">
                    <label for="">Dirección</label>
                    <input type="text" class="form-control" id="txt_direccion" placeholder="Ingrese Dirección">
                    <br>
                </div>
                <div class="col-lg-6">
                    <label for="">Movil</label>
                    <input type="text" class="form-control" id="txt_movil" placeholder="Ingrese el numero"
                        onkeypress="return soloNumeros(event)">
                        <br>
                </div>
                <div class="col-lg-6">
                    <label for="">Sexo</label>
                    <select class="js-example-basic-single" name="state" id="cbm_sexo" style="width:100%;">
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    </select> <br> <br>
                </div>

                <div class="col-lg-5">
                    <label for="">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="txt_fecnac">
                    <br>
                </div>

                <div class="col-lg-10">
                    <label for="">No. de documento</label>
                    <input type="text" class="form-control" id="txt_ndoc" placeholder="Ingrese documento"
                        onkeypress="return soloNumeros(event)">
                    <br>
                </div>
                <div class="col-lg-10">
                    <label for="">No. Colegiatura</label>
                    <input type="text" class="form-control" id="txt_ncol" placeholder="Ingrese Primer Apellido"
                        onkeypress="return soloNumeros(event)">
                    <br>
                </div>

                <div class="col-lg-10">
                <label for="">Especialidad</label>
                <select class="js-example-basic-single" name="state" id="cbm_especialidad" style="width:100%;"></select>
                    
                    <br><br>
                </div>


                <div class="col-lg-12" style="text-align: center;">
                        <b>---DATOS DEL USUARIO----</b>
                        <br>
                        <br>               
                </div>

                <div class="col-lg-10">
                    <label for="">USUARIO</label>
                    <input type="text" class="form-control" id="txt_USU" placeholder="Ingrese Usuario">
                    <br>
                </div>
                <div class="col-lg-10">
                    <label for="">CONTRASEÑA</label>
                    <input type="text" class="form-control" id="txt_contra" placeholder="Ingrese contraseña">
                    <br>
                </div>

                <div class="col-lg-10">
                <label for="">Rol</label>
                <select class="js-example-basic-single" name="state" id="cbm_rol" style="width:100%;"></select>
                    
                    <br><br>
                </div>

                <div class="col-lg-10">
                <label for="">Email</label>
                    <input type="text" class="form-control" id="txt_email" placeholder="Ingrese Email">
                    <label for="" id="emailOK" style="color:red"></label>
                    <input type="text" id="validar_email" hidden >
                    <br>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registrar_Medico()"><i
                        class="fa fa-check"><b>&nbsp;Registrar</b></i> </button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"
                        aria-hidden="true"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
    </div>
</div>

 <!-- /registro-->

 <!-- editar-->
 <div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" style="text-align: center;"> <b>Editar de Medico</b></h4>
                <button type="button" class="close" data-dismiss="modal"> &times;</button>
            </div>


            <div class="modal-body">

                <div class="col-lg-12">
                    <input type="text" id="id_medico" hidden>
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="txt_nombres_editar" placeholder="Ingrese Nombre">
                        <br>
                </div>
                
                    <div class="col-lg-8">
                        <label for="">Primer Apellido</label>
                        <input type="text" class="form-control" id="txt_apepat_editar" placeholder="Ingrese Primer Apellido"
                            maxlength="50" onkeypress="return soloLetras(event)">
                            <br>

                    </div>
                    <div class="col-lg-8">
                        <label for="">Segundo Apellido</label>
                        <input type="text" class="form-control" id="txt_apemat_editar" placeholder="Ingrese Segundo apellido"
                            maxlength="50" onkeypress="return soloLetras(event)">
                            <br>
                    </div>
                
                <div class="col-lg-10">
                    <label for="">Dirección</label>
                    <input type="text" class="form-control" id="txt_direccion_editar" placeholder="Ingrese Dirección">
                    <br>
                </div>
                <div class="col-lg-6">
                    <label for="">Movil</label>
                    <input type="text" class="form-control" id="txt_movil_editar" placeholder="Ingrese el numero"
                        onkeypress="return soloNumeros(event)">
                        <br>
                </div>
                <div class="col-lg-6">
                    <label for="">Sexo</label>
                    <select class="js-example-basic-single" name="state" id="cbm_sexo_editar" style="width:100%;">
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    </select> <br> <br>
                </div>

                <div class="col-lg-5">
                    <label for="">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="txt_fecnac_editar">
                    <br>
                </div>

                <div class="col-lg-10">
                    <label for="">No. de documento</label>
                    <input type="text"  id="txt_ndoc_editar_actual" hidden>
                    <input type="text" class="form-control" id="txt_ndoc_editar_nuevo" placeholder="Ingrese documento"
                        onkeypress="return soloNumeros(event)">
                    <br>
                </div>
                <div class="col-lg-10">
                    <label for="">No. Colegiatura</label>
                    <input type="text"  id="txt_ncol_editar_actual" hidden>
                        <input type="text" class="form-control" id="txt_ncol_editar_nuevo" placeholder="Ingrese Primer Apellido"
                        onkeypress="return soloNumeros(event)">
                    <br>
                </div>

                <div class="col-lg-10">
                <label for="">Especialidad</label>
                <select class="js-example-basic-single" name="state" id="cbm_especialidad_editar" style="width:100%;"></select>
                    
                    <br><br>
                </div>


                <div class="col-lg-12" style="text-align: center;">
                        <b>---DATOS DEL USUARIO----</b>
                        <br>
                        <br>               
                </div>

                <div class="col-lg-10">
                    <input type="text"  id="id_usuario" hidden>
                    <label for="">USUARIO</label>
                    <input type="text" class="form-control" id="txt_USU_editar" placeholder="Ingrese Usuario" disabled>
                    <br>
                </div>

                <div class="col-lg-10">
                <label for="">Rol</label>
                <select class="js-example-basic-single" name="state" id="cbm_rol_editar" style="width:100%;" disabled></select>
                    
                    <br><br>
                </div>

                <div class="col-lg-10">
                <label for="">Email</label>
                    <input type="text" class="form-control" id="txt_email_editar" placeholder="Ingrese Email">
                    <label for="" id="emailOK_editar" style="color:red"></label>
                    <input type="text" id="validar_email_editar" hidden >
                    <br>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Editar_Medico()"><i
                        class="fa fa-check"><b>&nbsp;Editar</b></i> </button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"
                        aria-hidden="true"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
    </div>
</div>

  <!-- /.editar-->







<script>
$(document).ready(function() {
    listar_medico();
    listar_combo_rol();
    listar_combo_especialidad();
    $('.js-example-basic-single').select2();
    $("#modal_registro").on('shown.bs.modal', function() {
        $("#txt_nombres").focus();
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