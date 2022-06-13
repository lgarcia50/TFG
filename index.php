<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Garcia Dental</title>
     <link rel="stylesheet" href="login.css">
     <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<div class="login-box">
  <img src="dental.png" class="avatar" alt="Avatar Image">
  <h1>Iniciar Sesión</h1>
<form method="post" action="procesar1.php">
       <?php
if(isset($_GET['error'])){
  $error = $_GET['error'];
  if($error == "incorrecto"){
     echo'<script type="text/javascript"> alert("Usuario o contraseña incorrecta");</script>';
  }
  if($error == "vacio"){
     echo'<script type="text/javascript"> alert("No has introducido datos");</script>';
  }
}
?>
<div class="ub1">&#128273; Ingresar usuario</div>
<input type="text" name="txtusuario" placeholder="nombre">
<div class="ub1">&#128274; Ingresar password</div>

<input type="password" name="txtpassword" id="txtpassword" placeholder="contraseña">
<i class="fas fa-eye" onclick="verpassword()"></i>

<div class="ub1">Rol</div>
<select name="rol">
<option value="0" style="display:none;"><label>Seleccionar</label></option>

<option value="1">Administrador</option>
<option value="2">Usuario</option>
</select>

<div align="center">
<input type="submit" value="Ingresar">
</div>
</form>
</div>
</div>
</body>
<script>
  function verpassword(){
      var tipo = document.getElementById("txtpassword");
      if(tipo.type == "password")
    {
          tipo.type = "text";
      }
    else
    {
          tipo.type = "password";
      }
  }
</script>
</html>
