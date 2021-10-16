



var tableprocedimiento;
function listar_procedimiento() {
    tableprocedimiento = $("#tabla_procedimiento").DataTable({
        "ordering": false,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../controlador/procedimiento/controlador_procedimiento_listar.php",
            type: 'POST'
        },
        "order":[[1,'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "procedimiento_nombre" },
            { "data": "procedimiento_fecregistro" },
            { "data": "procedimiento_estatus",
                render: function (data, type, row) {
                    if (data == 'ACTIVO') {
                        return "<span class='badge bg-success' >" + data + "</span>";
                    } else {
                        return "<span class='badge bg-danger' >" + data + "</span>";
                    }
                }
            },
           
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i> </button>&nbsp; " }
        ],

        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_procedimiento_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });

    tableprocedimiento.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_procedimiento').DataTable().page.info();
        tableprocedimiento.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );







}

//funcion para busqueda
function filterGlobal() {
    $('#tabla_procedimiento').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}


function AbrirModalRegistro(){
    $("#modal_registro").modal({ backdrop: 'static', keyboard: false })
    $("#modal_registro").modal('show');

}

function Registro_procedimiento(){
    var procedimiento = $("#txt_procedimiento").val();
    var estatus = $("#cbm_estatus").val();
    if(procedimiento.length==0){
        Swal.fire("Mensaje de Advertencia"," El campo procedimiento debe tener datos","warning");
    }else{
    $.ajax({
        url:'../controlador/procedimiento/controlador_procedimiento_registro.php',
        type:'POST',
        data:{
            p:procedimiento,
            e:estatus
        }
    }).done(function(resp){
        if(resp>0){
           if(resp==1){
            $("#modal_registro").modal('hide');
               listar_procedimiento();
               Limpiar_Campos();
            Swal.fire("Mensaje de Confirmacion"," Datos guardados correctamente","success");
           }else{
            Limpiar_Campos();
            Swal.fire("Mensaje de Advertencia","El Procedimiento ya esta registrado","warning");
           }

        }
    })
    }
}




   //editar procedimiento
   $('#tabla_procedimiento').on('click','.editar',function(){
    var data = tableprocedimiento.row($(this).parents('tr')).data();// detecta en que fila hago click y me captura los datos en la variable data
    if(tableprocedimiento.row(this).child.isShown()){// hace lo mismo en tamaño pequeño
        var data = tableprocedimiento.row(this).data();
    }
    
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
    $("#modal_editar").modal('show');
    $("#txt_idprocedimiento").val(data.procedimiento_id);
    $("#txt_procedimiento_actual_editar").val(data.procedimiento_nombre);
    $("#txt_procedimiento_nuevo_editar").val(data.procedimiento_nombre);
    $("#cbm_estatus_editar").val(data.procedimiento_estatus).trigger("change");
    
})





function Modificar_Procedimiento(){
    //vamos a llevar el actual y el nuevo, para luego en nuestro procedure hacer una condicional
    //si el procedimiento actual es nuevoo, entonces actualice el estatus, si es diferente entonces
    //busque en bd si existe o no
    var id= $("#txt_idprocedimiento").val();
    var procedimientoactual =$("#txt_procedimiento_actual_editar").val();
    var procedimientonuevo =$("#txt_procedimiento_nuevo_editar").val();
    var estatus = $("#cbm_estatus_editar").val();
    if(id.length==0){
        Swal.fire("Mensaje de Advertencia"," El id del campo esta vacio","warning");

    }
    if(procedimientonuevo.length==0){
        Swal.fire("Mensaje de Advertencia"," Debe de ingresar un procedimiento","warning");
    }

    $.ajax({
        url:'../controlador/procedimiento/controlador_procedimiento_modificar.php',
        type: 'POST',
        data:{
            id:id,
            procedimientoactual:procedimientoactual,
            procedimientonuevo:procedimientonuevo,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
            $("#modal_editar").modal('hide');
            if(resp==1){
                listar_procedimiento();
                
                Swal.fire("Mensaje de Confirmacion","Datos actualizados correctamente","success");

            }else{
                Swal.fire("Mensaje de Advertencia"," El procedimiento ya se encuentra en nuestra base de datos","warning");
            }

        }else{
            Swal.fire("Mensaje de Error"," Dlo sentimos no se pudo completar su actualizacion","error");
        }
    })

}

function Limpiar_Campos(){
    $("#txt_procedimiento").val("");
    
}