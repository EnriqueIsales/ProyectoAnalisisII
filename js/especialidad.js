

//variable global
var tableespecialidad;


function listar_especialidad() {
    tableespecialidad = $("#tabla_especialidad").DataTable({
        "ordering": false,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../controlador/especialidad/controlador_especialidad_listar.php",
            type: 'POST'
        },
        "order":[[1,'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "especialidad_nombre" },
            { "data": "especialidad_fregistro" },
            { "data": "especialidad_estatus",
                render: function (data, type, row) {
                    if (data == 'ACTIVO') {
                        return "<span class='badge bg-success' >" + data + "</span>";
                    }else {
                        return "<span class='badge bg-danger' >" + data + "</span>";
                    }
                 }
            },
           
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i> </button>&nbsp;" }
        ],

        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_especialidad_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });

    tableespecialidad.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_especialidad').DataTable().page.info();
        tableespecialidad.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );

}

//funcion para busqueda
function filterGlobal() {
    $('#tabla_especialidad').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}



 
function AbrirModalRegistro(){
    $("#modal_registro").modal({ backdrop: 'static', keyboard: false })
    $("#modal_registro").modal('show');
}


$('#tabla_especialidad').on('click','.editar',function(){
    var data = tableespecialidad.row($(this).parents('tr')).data();// detecta en que fila hago click y me captura los datos en la variable data
    if(tableespecialidad.row(this).child.isShown()){// hace lo mismo en tamaño pequeño
        var data = tableespecialidad.row(this).data();
    }
    
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
    $("#modal_editar").modal('show');
    $("#id_especialidad").val(data.especialidad_id);
    $("#txt_especialidad_actual_editar").val(data.especialidad_nombre);
    $("#txt_especialidad_nueva_editar").val(data.especialidad_nombre);
    $("#cbm_estatus_editar").val(data.especialidad_estatus).trigger("change");
    
})
 

function Registrar_Especialidad(){
    var especialidad = $('#txt_especialidad').val();
    var estatus = $('#cbm_estatus').val();
    if(especialidad.length==0 || estatus.length==0 ){
        Swal.fire("Mensaje de Advertencia","Llene los campos vacios","warning");
    }else{
    $.ajax({
        "url":"../controlador/especialidad/controlador_especialidad_registro.php",
        type: 'POST',
        data:{
            especialidad:especialidad,
            estatus:estatus

        }
    }).done(function(resp){
        
        if(resp>0){
            
                if(resp==1){
                 $("#modal_registro").modal('hide');
                    listar_especialidad();
                    Limpiar_Campos();
                 Swal.fire("Mensaje de Confirmacion"," Datos guardados correctamente","success");
                }else{
                    Limpiar_Campos();
                 Swal.fire("Mensaje de Advertencia","La especialidad ya esta registrado","warning");
                }     

        }else{
            Swal.fire("Mensaje de Error","Lo sentimos el registro no se pudo completar","error");
        }



    })
}
}

function Limpiar_Campos(){
    $("#txt_especialidad").val("");
    
}



        
function Editar_Especialidad(){
    var id = $('#id_especialidad').val();
    var especialidadactual = $('#txt_especialidad_actual_editar').val();
    var especialidadnueva = $('#txt_especialidad_nueva_editar').val();
    var estatus = $('#cbm_estatus_editar').val();
      if(especialidadactual.length==0 || especialidadnueva.length==0 || estatus.length==0 ){
        Swal.fire("Mensaje de Advertencia","Llene los campos vacios","warning");
    }else{
    $.ajax({
        "url":"../controlador/especialidad/controlador_especialidad_modificar.php",
        type: 'POST',
        data:{
            id:id,
            espeac:especialidadactual,
            espenu:especialidadnueva,
            estatus:estatus

        }
    }).done(function(resp){
        
        if(resp>0){
            
            if(resp==1){
             $("#modal_editar").modal('hide');
                listar_especialidad();
                
             Swal.fire("Mensaje de Confirmacion"," Datos Actualizados correctamente","success");
            }else{
                
             Swal.fire("Mensaje de Advertencia","la especialidad ya esta registrado","warning");
            }     

    }else{
        Swal.fire("Mensaje de Error","Lo sentimos el registro no se pudo completar","error");
    }


    })
}
}  