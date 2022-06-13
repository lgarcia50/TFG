<?php
header('Content-Type: application/json');
require("conexion.php");


switch ($_GET['accion']) {
    case 'listar':
        $respuesta = mysqli_query($con, "select codigo, descripcion, stock  from inventarios");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'agregar':
        $respuesta = mysqli_query($con, "insert into inventarios(descripcion,stock) values ('$_POST[descripcion]','$_POST[stock]')");
        echo json_encode($respuesta);
        break;
    case 'recuperar':
        $respuesta = mysqli_query($con, "select codigo, descripcion,stock from inventarios where codigo=$_POST[codigo]");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'borrar':
        $respuesta = mysqli_query($con, "delete from inventarios where codigo=".$_POST['codigo']);
        echo json_encode($respuesta);
        break;
    case 'modificar':
        $respuesta = mysqli_query($con, "update inventarios set descripcion='$_POST[descripcion]',stock='$_POST[stock]' where codigo=$_POST[codigo]");
        echo json_encode($respuesta);
        break;        
}

?>