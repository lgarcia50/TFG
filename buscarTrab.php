<?php 
header('Content-Type: application/json');
require("conexion.php");

$nombre='$_POST[nombre]';
$query= "select 
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
                                              join dentistas as den on den.codigoclinica= clin.codigo where t.nombre= '$nombre'";
echo '<table class="table table-striped mt-5 mr-5">
      <thead>
        <tr>
          <th>Código</th>
          <th>Clinica</th>
          <th>Dentista</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Trabajo</th>
          <th>Cantidad</th>
          <th>Color</th>
          <th>Piezas</th>
          <th>Estado</th>
          <th>Precio</th>
          <th>Edición</th>
        </tr>
      </thead>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["codigo"];
        $field2name = $row["codigoclinica"];
        $field3name = $row["codigodentista"];
        $field4name = $row["nombre"];
        $field5name = $row["apellidos"]; 
        $field6name = $row["codigoproducto"]; 
        $field7name = $row["cantidad"]; 
        $field8name = $row["color"]; 
        $field9name = $row["piezas"]; 
        $field10name = $row["estado"]; 
        $field11name = $row["total"]; 

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
                  <td>'.$field6name.'</td> 
                  <td>'.$field7name.'</td> 
                  <td>'.$field8name.'</td> 
                  <td>'.$field9name.'</td> 
                  <td>'.$field10name.'</td> 
                  <td>'.$field11name.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
