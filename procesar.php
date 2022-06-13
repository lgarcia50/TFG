<?php
header('Content-Type: application/json');
require("conexion.php");


switch ($_GET['accion']) {
    case 'listar':
        $respuesta = mysqli_query($con, "select codigo, descripcion from categorias");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'agregar':
        $respuesta = mysqli_query($con, "insert into categorias(descripcion) values ('$_POST[descripcion]')");
        echo json_encode($respuesta);
        break;
    case 'recuperar':
        $respuesta = mysqli_query($con, "select codigo, descripcion from categorias where codigo=$_POST[codigo]");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'borrar':
        $respuesta = mysqli_query($con, "delete from categorias where codigo=".$_POST['codigo']);
        $respuesta = mysqli_query($con, "delete from productos where codigocategoria=".$_POST['codigo']);
        echo json_encode($respuesta);
        break;
    case 'modificar':
        $respuesta = mysqli_query($con, "update categorias set descripcion='$_POST[descripcion]' where codigo=$_POST[codigo]");
        echo json_encode($respuesta);
        break;        
}

?>