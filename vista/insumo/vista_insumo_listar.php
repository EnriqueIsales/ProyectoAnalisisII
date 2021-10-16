<script type="text/javascript" src="../js/insumo.js?rev=<?php echo time(); ?>"></script>


<div class="col-md-12">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Mantenimiento de Insumo</h3>

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


            <table id="tabla_insumo" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Fecha de Registro</th>
                        <th>Estatus</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Fecha de Registro</th>
                        <th>Estatus</th>
                        <th>Acción</th>
                    </tr>
                </tfoot>
            </table>



        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


 <!-- formulario para registar datos -->
<div class="modal fade" id="modal_registro" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" style="text-align: center;"> <b> Registro de Insumo</b></h4>
                <button type="button" class="close" data-dismiss="modal"> &times;</button>
            </div>


            <div class="modal-body">

                <div class="col-lg-12">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="txt_insumo" placeholder="Ingrese insumo" maxlength="50" onkeypress="return soloLetras(event)">
                    <br>

                </div>

                <div class="col-lg-12">
                    <label for="">Stock</label>
                    <input type="text" class="form-control" id="txt_stock" placeholder="Ingrese stock" maxlength="5" onkeypress="return soloNumeros(event)">
                    <br>

                </div>

                <div class="col-lg-12">
                    <label for="">Estatus</label>
                    <select class="js-example-basic-single" name="state" id="cbm_estatus" style="width:100%;">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                        <option value="AGOTADO">AGOTADO</option>
                    </select> <br> <br>
                </div>




            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registrar_Insumo()"><i
                        class="fa fa-check"><b>&nbsp;Registrar</b></i> </button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"
                        aria-hidden="true"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
    </div>
</div>
<!-- /formulario para registar datos -->


 <!-- formulario para editar datos -->
 <div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" style="text-align: center;"> <b> Editar de Insumo</b></h4>
                <button type="button" class="close" data-dismiss="modal"> &times;</button>
            </div>


            <div class="modal-body">

                <div class="col-lg-12">
                    <input type="text" id="txt_idinsumo" hidden>
                    <label for="">Nombre</label>
                    <input type="text" id="txt_insumo_actual_editar" placeholder="Ingrese insumo" maxlength="50" onkeypress="return soloLetras(event)" hidden>
                    <input type="text" class="form-control" id="txt_insumo_nuevo_editar" placeholder="Ingrese insumo" maxlength="50" onkeypress="return soloLetras(event)" >
                    <br>

                </div>

                <div class="col-lg-12">
                    <label for="">Stock</label>
                    <input type="text" class="form-control" id="txt_stock_editar" placeholder="Ingrese stock" maxlength="5" onkeypress="return soloNumeros(event)">
                    <br>

                </div>

                <div class="col-lg-12">
                    <label for="">Estatus</label>
                    <select class="js-example-basic-single" name="state" id="cbm_estatus_editar" style="width:100%;">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                        <option value="AGOTADO">AGOTADO</option>
                    </select> <br> <br>
                </div>




            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Modificar_Insumo()"><i
                        class="fa fa-check"><b>&nbsp;Modificar</b></i> </button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"
                        aria-hidden="true"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
    </div>
</div>







<script>
$(document).ready(function() {
    listar_insumo();
    $('.js-example-basic-single').select2();
    $("#modal_registro").on('shown.bs.modal', function() {
        $("#txt_insumo").focus();
    })

});
</script>