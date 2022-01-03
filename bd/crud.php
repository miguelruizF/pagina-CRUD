?<php>
    include_once "../js/conexion.php";
    $objeto = new Conexion();
    $conexion = $objeto -> Conectar();

    //Recibir datos enviados desde el metodo POST en JS
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : ''; //Condicional que valida si la variable esta vacia o nula
    $f_inicio = (isset($_POST['f_inicio'])) ? $_POST['f_inicio'] : '';
    $f_final = (isset($_POST['f_final'])) ? $_POST['f_final'] : '';
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
    $status_dom = (isset($_POST['status_dom'])) ? $_POST['status_dom'] : '';

    $consulta = "INSERT INTO licencias (nombre_dominio,fecha_registro,fecha_vencimiento,estado_renovacion,status) VALUES ('$nombre','$f_inicio','$f_final','$estado','$status_dom')";
    $resultado = $conexion ->prepare($consulta);
    $resultado->execute();

    $data = $resultado->fetchALL(PDO::FETCH_ASSOC);
    print json_encode($data, JSON_UNESCAPED_UNICODE);
    $conexion = NULL;
    