<?php
header('Content-Type: application/json');
require("conexion.php");



switch ($_GET['accion']) {
    case 'listar':
        $respuesta = mysqli_query($con, "select usu.codigo as codigo,usu.nombre nombre,
                                                 rol.descripcion descripcionrol,
                                                 usu.contraseña
                                              from usuarios as usu
                                              join rol as rol on rol.codigo=usu.codigorol");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'agregar':
        $respuesta = mysqli_query($con, "insert into usuarios(nombre,contraseña,codigorol) values ('$_POST[nombre]','$_POST[contraseña]','$_POST[codigorol]')");
        echo json_encode($respuesta);
        break;
    case 'recuperar':
        $respuesta = mysqli_query($con, "select codigo, nombre, contraseña, codigorol from usuarios where codigo=$_POST[codigo]");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'borrar':
        $respuesta = mysqli_query($con, "delete from usuarios where codigo=" . $_POST['codigo']);
        echo json_encode($respuesta);
        break;
    case 'modificar':
        $respuesta = mysqli_query($con, "update usuarios set nombre='$_POST[nombre]', contraseña='$_REQUEST[contraseña]', codigorol='$_POST[codigorol]' where codigo='$_POST[codigo]'");
        echo json_encode($respuesta);
        break;
    case 'listarcategorias':
        $respuesta = mysqli_query($con, "select codigo, descripcion from rol");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
}
?>