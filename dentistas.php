<?php
header('Content-Type: application/json');
require("conexion.php");



switch ($_GET['accion']) {
    case 'listar':
        $respuesta = mysqli_query($con,"select 
                                                 den.codigo as codigo,
                                                 den.nombre nombre,
                                                 clin.nombre descripcionclinica   
                                              from dentistas as den
                                              join clinicas as clin on clin.codigo=den.codigoclinica");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'agregar':
        $respuesta = mysqli_query($con, "insert into dentistas(nombre,codigoclinica) values ('$_POST[nombre]',$_POST[codigoclinica])");
        echo json_encode($respuesta);
        break;
    case 'recuperar':
        $respuesta = mysqli_query($con, "select codigo, nombre, codigoclinica from dentistas where codigo=$_POST[codigo]");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'borrar':
        $respuesta = mysqli_query($con, "delete from dentistas where codigo=" . $_POST['codigo']);
        echo json_encode($respuesta);
        break;
    case 'modificar':
        $respuesta = mysqli_query($con, "update dentistas set nombre='$_POST[nombre]', codigoclinica=$_POST[codigoclinica] where codigo=$_POST[codigo]");
        echo json_encode($respuesta);
        break;
    case 'listarcategorias':
        $respuesta = mysqli_query($con, "select codigo, nombre, telefono, mail, direccion from clinicas");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
}
?>