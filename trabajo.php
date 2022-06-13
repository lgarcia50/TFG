<?php
header('Content-Type: application/json');
require("conexion.php");



switch ($_GET['accion']) {
    case 'listar':
        $respuesta = mysqli_query($con, "select 
                                                 t.codigo as codigo,
                                                 clin.nombre descripcionclinica,
                                                 den.nombre descripciondentista,
                                                 t.nombre nombre,
                                                 t.apellidos apellidos,
                                                 pro.nombre descripcionproducto,
                                                 t.cantidad cantidad,
                                                 t.color color,
                                                 t.piezas piezas,
                                                 t.estado estado,
                                                 round(t.cantidad*pro.precio) total
                                              from trabajos as t
                                              join productos as pro on pro.codigo= t.codigoproducto
                                              join clinicas as clin on clin.codigo=t.codigoclinica
                                              join dentistas as den on den.codigoclinica= clin.codigo");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'agregar':
        $respuesta = mysqli_query($con, "insert into trabajos(codigoclinica,codigodentista,nombre,apellidos,codigoproducto,cantidad,color,piezas,estado) values ('$_POST[codigoclinica]','$_POST[codigodentista]','$_POST[nombre]','$_POST[apellidos]','$_POST[codigoproducto]','$_POST[cantidad]','$_POST[color]','$_POST[piezas]','$_POST[estado]')");
        echo json_encode($respuesta);
        break;
    case 'recuperar':
        $respuesta = mysqli_query($con, "select codigo,codigoclinica,codigodentista,nombre,apellidos,codigoproducto,cantidad,color,piezas,estado from trabajos where codigo='$_POST[codigo]'");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'borrar':
        $respuesta = mysqli_query($con, "delete from trabajos where codigo=" . $_POST['codigo']);
        echo json_encode($respuesta);
        break;
    case 'modificar':
        $respuesta = mysqli_query($con, "update trabajos set codigoclinica='$_POST[codigoclinica]',codigodentista='$_POST[codigodentista]',nombre='$_POST[nombre]', apellidos='$_POST[apellidos]',codigoproducto='$_POST[codigoproducto]',cantidad='$_POST[cantidad]',color='$_POST[color]',piezas='$_POST[piezas]',estado='$_POST[estado]' where codigo=$_POST[codigo]");
        echo json_encode($respuesta);
        break;
    case 'listarclinicas':
        $respuesta = mysqli_query($con, "select den.codigo as codigo, den.nombre nombre, clin.nombre nom from dentistas as den join clinicas as clin on clin.codigo= den.codigoclinica");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    case 'listarproductos':
        $respuesta = mysqli_query($con, "select codigo,nombre from productos");
        $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;
    }
?>