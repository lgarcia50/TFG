<?php
header('Content-Type: application/json');
require("conexion.php");


switch ($_GET['accion']) {
    case 'listar':
        $respuesta = mysqli_query($con, "select codigo, nombre, telefono, mail, direccion from clinicas");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'agregar':
        $respuesta = mysqli_query($con, "insert into clinicas(nombre,telefono,mail,direccion) values ('$_POST[nombre]','$_POST[telefono]','$_POST[mail]','$_POST[direccion]')");
        echo json_encode($respuesta);
        break;
    case 'recuperar':
        $respuesta = mysqli_query($con, "select codigo, nombre,telefono,mail,direccion from clinicas where codigo=$_POST[codigo]");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'borrar':
        $respuesta = mysqli_query($con, "delete from clinicas where codigo=".$_POST['codigo']);
        echo json_encode($respuesta);
        break;
    case 'modificar':
        $respuesta = mysqli_query($con, "update clinicas set nombre='$_POST[nombre]',telefono='$_POST[telefono]',mail='$_POST[mail]', direccion='$_POST[direccion]' where codigo=$_POST[codigo]");
        echo json_encode($respuesta);
        break;        
}

?>