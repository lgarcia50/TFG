<!doctype html>
<html>

<head>
  <title>GARCIA DENTAL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
      <link href="style1.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>

<body>
<header>
<div class="wrapper hover_collapse">
  <div class="top_navbar">
    <div class="logo">GARCIA DENTAL</div>
    <div class="menu">
      <div class="hamburger">
        <i class="fas fa-bars"></i>
      </div>
      <div class="logout">
        <a href="logout.php">
        <i class="fas fa-door-open"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="sidebar close">
    <ul class="nav-links">
      <li>
        <div class="iocn-link">
          <a href="trabajos.html">
            <i class="fas fa-folder-open"></i>
            <span class="link_name">Trabajos</span>
          </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="trabajos.html">Trabajos</a></li>
        </ul>
      </div>
      </li>
        <li>
        <div class="iocn-link">
          <a href="inventario.html">
          <i class="fas fa-shopping-cart"></i>
            <span class="link_name">Inventario</span>
          </a>
          <ul class="sub-menu blank">
          <li><a class="link_name" href="inventario.html">Inventario</a></li>
        </ul>
        </div>
      </li>
      <li>
        <div class="iocn-link">
          <a href="buscar.html">
            <i class="fas fa-search"></i>
            <span class="link_name">Buscar</span>
          </a>
         <ul class="sub-menu blank">
          <li><a class="link_name" href="buscar.html">Buscar</a></li>
        </ul>
        </div>
      </li>
</ul>
  </div>
</div>
</header>
<hr class="mt-5">
  <div class="container mt-5 mr-5">
    <h1>BUSCAR</h1>
      <div class="row" style="margin:1em">
      <div class="col-12 text-center">
          <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Buscar</span>
  </div>
  <input id="FiltrarContenido" type="text" class="form-control" placeholder="Ingrese nombre del trabajo" aria-label="Alumno" aria-describedby="basic-addon1">
</div>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nº</th>
            <th>Clinica</th>
            <th>Dentista</th>            
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Trabajo</th>
            <th>Cantidad</th>
            <th>Color</th>
            <th>Piezas</th>
            <th>Estado</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody class="BusquedaRapida">
<?php
include("conexion.php");
$consulta = "select 
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
                                              join dentistas as den on den.codigoclinica= clin.codigo";
$resultado = mysqli_query($con , $consulta);
$contador=0;

while($misdatos = mysqli_fetch_assoc($resultado)){ $contador++;?>
<tr>
  <td><?php echo $misdatos["codigo"]; ?></td>
  <td><?php echo $misdatos["descripcionclinica"]; ?></td>
  <td><?php echo $misdatos["descripciondentista"]; ?></td>
  <td><?php echo $misdatos["nombre"]; ?></td>
  <td><?php echo $misdatos["apellidos"]; ?></td>
  <td><?php echo $misdatos["descripcionproducto"]; ?></td>
  <td><?php echo $misdatos["cantidad"]; ?></td>
  <td><?php echo $misdatos["color"]; ?></td>
  <td><?php echo $misdatos["piezas"]; ?></td>
  <td><?php echo $misdatos["estado"]; ?></td>
  <td><?php echo $misdatos["total"]; ?></td>
  </tr>
          
<?php }?>          

</tbody>
      </table>  
    </div>
    </div>


<script type="text/javascript">
$(document).ready(function () {
   (function($) {
       $('#FiltrarContenido').keyup(function () {
            var ValorBusqueda = new RegExp($(this).val(), 'i');
            $('.BusquedaRapida tr').hide();
             $('.BusquedaRapida tr').filter(function () {
                return ValorBusqueda.test($(this).text());
              }).show();
                })
      }(jQuery));
});
</script> 
    <script>
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".hamburger");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
var hamburger = document.querySelector(".hamburger");
var wrapper = document.querySelector(".wrapper");
hamburger.addEventListener("click", () => {

  hamburger.closest(".wrapper").classList.toggle("hover_collapse");
})

</script>

</body>

</html>
