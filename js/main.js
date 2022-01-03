//Inicializar tabla
$(document).ready(function() {
    $table = $("#tb_licencias").DataTable({
        "language": { //Cambia el lenguaje del datatable
            "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
        },
        "columnDefs": [{ //Se definen los botones de editar y borrar de manera dinamica
            "targets": -1,
            "data": null,
            "defaulContent": '' /*'<div class="text-center"><div class="btn-group"><button class="btn btn-primary btnEditar">Editar</button><button class="btn btn-danger btnBorrar">Eliminar</button></div></div>'*/
        }]
    });
    $("#btn_nuevo").click(function() {
        $(".modal-title").text("Nuevo Dominio"); //Agrega un titulo al form
        $(".modal-header").css("background-color", "black"); //Cambia el color donde esta el titulo
        $(".modal-header").css("color", "white"); //Cambia el color del titulo

        $("#formLicencias").trigger("reset"); //Resetea los input del form
        $("#modalCrud").modal("show"); //Mostrar ventana modal

        id = null;
    });

    $("#formLicencias").submit(function(e) {
        e.preventDefault(); //Previene acciones por defecto
        id = $.trim($("#id").val());
        nombre = $.trim($("#url_dom").val());
        f_inicio = $.trim($("#f_registro").val());
        f_final = $.trim($("#f_vencimiento").val());
        estado = $.trim($("#estado").val());
        status_dom = $.trim($("#status").val());

        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: { id: id, nombre: nombre, f_inicio: f_inicio, f_final: f_final, estado: estado, status_dom: status_dom },
            success: function(data) {
                //var datos = JSON.parse(data);
                id = data[0].id;
                nombre = data[0].nombre;
                f_inicio = data[0].f_inicio;
                f_final = data[0].f_final;
                estado = data[0].estado;
                status_dom = data[0].status_dom;
                table.row.add([id, nombre, f_inicio, f_final, estado, status_dom]).draw();
            }
        });
        $("#modalCrud").modal("hide");
    });
});