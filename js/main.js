//Inicializar tabla
$(document).ready(function() {
    $table = $("#tb_licencias").DataTable({
        "language": { //Cambia el lenguaje del datatable
            "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
        },
        "columnDefs": [{ //Se definen los botones de editar y borrar de manera dinamica
            "target": -1,
            "data": null,
            "defaulContent": '<div class="text-center"><div class="btn-group"><button class="btn btn-primary btnEditar">Editar</button><button class="btn btn-danger btnBorrar">Eliminar</button></div></div>'
        }]
    });
    $("#btn_nuevo").click(function() {
        $(".modal-title").text("Nuevo Dominio"); //Agrega un titulo al form
        $(".modal-header").css("background-color", "black"); //Cambia el color donde esta el titulo
        $(".modal-header").css("color", "white"); //Cambia el color del titulo

        $("#formLicencias").trigger("reset"); //Resetea los input del form
        $("#modalCrud").modal("show"); //Mostrar ventana modal
    });

    $("#formLicencias").submit(function(e) {
        e.preventDefault(); //Previene acciones por defecto
        id_dom = $.trim($("#id").value());
        nom_dominio = $.trim($("#licencia-url").value());
        fecha_registro = $.trim($("#fecha-registro").value());
        fecha_vencimiento = $.trim($("#fecha-vencimiento").value());
        estado_dom = $.trim($("#estado").value());
        status_dom = $.trim($("#status").value());

        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            datatype: "json",
            data: [id_dom, nom_dominio, fecha_registro, fecha_vencimiento, estado_dom, status_dom],
            success: function(data) {
                var datos = JSON.parse(data);
                id_dom = datos[0].id_dom,
                    nom_dominio = datos[0].nom_dominio,
                    fecha_registro = datos[0].fecha_registro,
                    fecha_vencimiento = datos[0].fecha_vencimiento,
                    estado_dom = datos[0].estado_dom,
                    status_dom = datos[0].status_dom,
                    table.row.add([id_dom, nom_dominio, fecha_registro, fecha_vencimiento, estado_dom, status_dom]).draw();
            }
        });
        $("#modalCrud").modal("hide");
    });
});