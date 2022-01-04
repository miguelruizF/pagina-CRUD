<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$f_inicial = (isset($_POST['f_inicial'])) ? $_POST['f_inicial'] : '';
$f_final = (isset($_POST['f_final'])) ? $_POST['f_final'] : '';
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
$status_dom = (isset($_POST['status_dom'])) ? $_POST['status_dom'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch ($opcion){
    case 1:
        $consulta = "INSERT INTO licencias (nombre_dominio, fecha_registro, fecha_vencimiento, estado_renovacion, status_dom) VALUES ('$nombre','$f_inicial','$f_final','$estado','$status_dom')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 2:
        $consulta = "UPDATE licencias SET nombre_dominio = '$nombre', fecha_registro='$f_inicial', fecha_vencimiento= '$f_final', estado_renovacion='$estado', status_dom='$status_dom' WHERE id_dominio = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT * FROM licencias WHERE id_dominio='$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 3:
        $consulta = "DELETE FROM licencias WHERE id_dominio = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 4:
        $consulta = 'SELECT * FROM licencias';
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;