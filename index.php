
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

    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <button id="btnNuevo" type="button" class="btn btn-dark mb-4 btnNuevo" data-toggle="modal">
                        Agregar
                </button>
            </div>
        </div>

        <!-- DataTable -->
        <div class="row caja">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tbDominio" class="table table-striped table-bordered table-dark" style="width:100%">
                            <thead class="bg-primary text-white text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre de Dominio</th>
                                    <th>Fecha Registro</th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Estado Renovacion</th>
                                    <th>Status</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- CRUD - Modal -->
    <div class="modal fade" id="modalCrud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white">&times;</span>
                    </button>
                </div>

                <form id="formDominios">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="col-form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre">
                        </div> 
                    
                       <div class="row">
                           <div class="col-lg-6">
                                <label for="" class="col-form-label">Fecha Registro</label>
                                <input type="date" class="form-control" id="f_inicial">
                           </div>
                           <div class="col-lg-6">
                                <label for="" class="col-form-label">Fecha Vencimiento</label>
                                <input type="date" class="form-control" id="f_final">
                           </div>
                       </div>
                        <div class="form-group mt-4 mr-4 mb-4">
                            <label for="estado" class="col-form-label">Estado Renovacion:</label>
                            <select id="estado" name="estado">
                                <option value="Activo" selected>Activo</option>
                            </select>
                        </div> 
                        <div class="form-group mt-4 mr-4 mb-4">
                            <label for="status" class="col-form-label">Status:</label>
                            <select id="status" name="status">
                                <option value="Activo" selected>Activo</option>
                                <option value="Pediente">Pendiente</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
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