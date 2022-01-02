<?php
    include_once "bd/conexion.php";
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT * FROM licencias";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $licencias = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="css/main.css">

    <!-- Icons Materialize -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <header class="bg-primary rounded">
        <div class="container p-3 mb-4">
            <h1 class="text-center text-white text-uppercase">Vencimiento de Dominios - OEK</h1>
        </div>
    </header>

    <!-- DataTable -->
    <section class="container">
        <button id="btn_nuevo" class="btn btn-dark mb-4 btnNuevo">
                Agregar
            </button>
        <table id="tb_licencias" class="table table-striped table-bordered table-dark" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Nombre de Dominio</th>
                    <th>Fecha de Registro</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Estado de Renovacion</th>
                    <th>Status</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($licencias as $licencias) {
                    ?>
                <tr>
                    <td><?php echo $licencias["id_dominio"]?></td>
                    <td><?php echo $licencias["nombre_dominio"]?></td>
                    <td><?php echo $licencias["fecha_registro"]?></td>
                    <td><?php echo $licencias["fecha_vencimiento"]?></td>
                    <td><?php echo $licencias["estado_renovacion"]?></td>
                    <td><?php echo $licencias["status"]?></td>
                    <td></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
            <!--
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="text-center">
                            <div class="btn-group">
                                <button class="btn btn-primary btnEditar">
                                       Editar
                                    </button>
                                <button class="btn btn-danger btnBorrar">
                                        Eliminar
                                    </button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
            -->
        </table>
    </section>

    <!-- CRUD - Modal -->
    <div class="modal fade" id="modalCrud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formLicencias">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="licencia-url" class="col-form-label">URL del dominio:</label>
                            <input type="text" class="form-control" id="licencia-url">
                        </div>
                        <div class="form-group">
                            <label for="fecha-registro" class="col-form-label">Fecha de Registro:</label>
                            <input type="date" class="form-control" id="fecha-registro">
                        </div>
                        <div class="form-group">
                            <label for="fecha-vencimiento" class="col-form-label">Fecha de Vencimiento:</label>
                            <input type="date" class="form-control" id="fecha-vencimiento">
                        </div>
                        <div class="form-group">
                            <label for="estado" class="col-form-label">Estado Renovacion:</label>
                            <input type="text" class="form-control" id="estado">
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status:</label>
                            <input type="text" class="form-control" id="status">
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!-- Archivo JavaScript -->
    <script src="js/main.js"></script>

</body>

</html>