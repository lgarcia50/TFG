<?php

$error;

$servername="localhost";
$username="root";
$password="";
$DB="Dental";
$db_table_name="Usuario";

$conn= new mysqli($servername,$username,$password,$DB);

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$usu 	= $_POST["txtusuario"];
$pass 	= $_POST["txtpassword"];
$rol 	= $_POST["rol"];



$queryusuario = mysqli_query($conn,"SELECT * FROM Usuario WHERE nombre ='$usu' and contraseña = '$pass' and rol = '$rol'");
$nr = mysqli_num_rows($queryusuario);  
if(!empty($_POST['txtusuario'])&& !empty($_POST['txtpassword'])&& !empty($_POST['rol'])){
$usu 	= $_POST["txtusuario"];
$pass 	= $_POST["txtpassword"];
$rol 	= $_POST["rol"];

if ($nr == 1 ){ 
		if($rol=="1"){	
				header("Location: admin.html");
			}else if ($rol=="2"){
				header("Location:user.html");
			}
	} else{
	     $error="incorrecto";
	     header("Location:index.php?error=$error");
	}
}else{
	$error="vacio";
	header("Location:index.php?error=$error");
}

?>