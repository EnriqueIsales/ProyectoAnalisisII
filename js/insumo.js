

//variable global
var tableinsumo;


function listar_insumo() {
    tableinsumo = $("#tabla_insumo").DataTable({
        "ordering": false,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../controlador/insumo/controlador_insumo_listar.php",
            type: 'POST'
        },
        "order":[[1,'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "insumo_nombre" },
            { "data": "insumo_stock" },
            { "data": "insumo_feregistro" },
            { "data": "insumo_estatus",
                render: function (data, type, row) {
                    if (data == 'ACTIVO') {
                        return "<span class='badge bg-success' >" + data + "</span>";
                    }
                    if (data == 'INACTIVO') {
                        return "<span class='badge bg-danger' >" + data + "</span>";
                    }
                    if (data == 'AGOTADO') {
                        return "<span class='badge bg-black' style='background:black' >" + data + "</span>";
                    }
                }
            },
           
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i> </button>&nbsp;" }
        ],

        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_insumo_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });

    tableinsumo.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_insumo').DataTable().page.info();
        tableinsumo.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );

}



function AbrirModalRegistro(){
    $("#modal_registro").modal({ backdrop: 'static', keyboard: false })
    $("#modal_registro").modal('show');
}


$('#tabla_insumo').on('click','.editar',function(){
    var data = tableinsumo.row($(this).parents('tr')).data();// detecta en que fila hago click y me captura los datos en la variable data
    if(tableinsumo.row(this).child.isShown()){// hace lo mismo en tamaño pequeño
        var data = tableinsumo.row(this).data();
    }
    
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
    $("#modal_editar").modal('show');
    $("#txt_idinsumo").val(data.insumo_id);
    $("#txt_insumo_actual_editar").val(data.insumo_nombre);
    $("#txt_insumo_nuevo_editar").val(data.insumo_nombre);
    $("#txt_stock_editar").val(data.insumo_stock);
    $("#cbm_estatus_editar").val(data.insumo_estatus).trigger("change");
    
})









//funcion para busqueda
function filterGlobal() {
    $('#tabla_insumo').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}


function Registrar_Insumo(){
    var insumo = $('#txt_insumo').val();
    var stock = $('#txt_stock').val();
    var estatus = $('#cbm_estatus').val();
    if(stock<0){
        Swal.fire("Mensaje de Advertencia","El stock no puede ser negativo","warning");
    }
    if(insumo.length==0 || stock.length==0 || estatus.length==0 ){
        Swal.fire("Mensaje de Advertencia","Llene los campos vacios","warning");
    }else{
    $.ajax({
        "url":"../controlador/insumo/controlador_insumo_registro.php",
        type: 'POST',
        data:{
            in:insumo,
            st:stock,
            es:estatus

        }
    }).done(function(resp){
        
        if(resp>0){
            
                if(resp==1){
                 $("#modal_registro").modal('hide');
                    listar_insumo();
                    Limpiar_Campos();
                 Swal.fire("Mensaje de Confirmacion"," Datos guardados correctamente","success");
                }else{
                    Limpiar_Campos();
                 Swal.fire("Mensaje de Advertencia","El insumo ya esta registrado","warning");
                }     

        }else{
            Swal.fire("Mensaje de Error","Lo sentimos el registro no se pudo completar","error");
        }



    })
}
}

function Limpiar_Campos(){
    $("#txt_insumo").val("");
    $("#txt_stock").val("");
}



function Modificar_Insumo(){
    var id = $('#txt_idinsumo').val();
    var insumoactual = $('#txt_insumo_actual_editar').val();
    var insumonuevo = $('#txt_insumo_nuevo_editar').val();
    var stock = $('#txt_stock_editar').val();
    var estatus = $('#cbm_estatus_editar').val();
    if(stock<0){
        Swal.fire("Mensaje de Advertencia","El stock no puede ser negativo","warning");
    }
    if(insumoactual.length==0 || insumonuevo.length==0 ||stock.length==0 || estatus.length==0 ){
        Swal.fire("Mensaje de Advertencia","Llene los campos vacios","warning");
    }
    $.ajax({
        "url":"../controlador/insumo/controlador_insumo_modificar.php",
        type: 'POST',
        data:{
            id:id,
            inac:insumoactual,
            innu:insumonuevo,
            st:stock,
            es:estatus

        }
    }).done(function(resp){
        
        if(resp>0){
            
            if(resp==1){
             $("#modal_editar").modal('hide');
                listar_insumo();
                
             Swal.fire("Mensaje de Confirmacion"," Datos Actualizados correctamente","success");
            }else{
                
             Swal.fire("Mensaje de Advertencia","El insumo ya esta registrado","warning");
            }     

    }else{
        Swal.fire("Mensaje de Error","Lo sentimos el registro no se pudo completar","error");
    }


    })
}