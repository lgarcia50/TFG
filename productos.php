<?php
header('Content-Type: application/json');
require("conexion.php");



switch ($_GET['accion']) {
    case 'listar':
        $respuesta = mysqli_query($con, "select 
                                                 pro.codigo as codigo,
                                                 pro.nombre nombre,
                                                 cat.descripcion descripcioncategoria,
                                                 precio
                                              from productos as pro
                                              join categorias as cat on cat.codigo=pro.codigocategoria");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'agregar':
        $respuesta = mysqli_query($con, "insert into productos(nombre,precio,codigocategoria) values ('$_POST[nombre]',$_POST[precio],$_POST[codigocategoria])");
        echo json_encode($respuesta);
        break;
    case 'recuperar':
        $respuesta = mysqli_query($con, "select codigo, nombre, precio, codigocategoria from productos where codigo=$_POST[codigo]");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'borrar':
        $respuesta = mysqli_query($con, "delete from productos where codigo=" . $_POST['codigo']);
        echo json_encode($respuesta);
        break;
    case 'modificar':
        $respuesta = mysqli_query($con, "update productos set nombre='$_POST[nombre]', precio=$_REQUEST[precio], codigocategoria=$_POST[codigocategoria] where codigo=$_POST[codigo]");
        echo json_encode($respuesta);
        break;
    case 'listarcategorias':
        $respuesta = mysqli_query($con, "select codigo, descripcion from categorias");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
}
?>